<?php
require_once( MODEL_PATH."report.php" );
require_once( MODEL_PATH."mutex.php" );
class QueueJobModel extends ModelBase
{

    public function processQueue( )
    {
        $mutex = new MutexModel( );
        $mutex->releaseOnTimeout( );
        if ( $mutex->lock( ) )
        {
            $this->processTaskQueue( );
            if ( date( "w" ) == 5 )
            {
                $row = $this->provider->fetchRow( "SELECT gs.cur_week w1, CEIL((TO_DAYS(NOW())-TO_DAYS(gs.start_date))/7) w2 FROM g_settings gs" );
                if ( $row['w1'] < $row['w2'] )
                {
                   // $this->provider->executeQuery( "UPDATE g_settings gs SET gs.cur_week=%s", array( intval( $row['w2'] ) ) );
                   // $this->setWeeklyMedals( intval( $row['w2'] ) );
                }
            }
            $mutex->release( );
        }
    }

    public function processTaskQueue( )
    {
        $result = $this->provider->fetchResultSet( "SELECT \r\n\t\t\t\tq.id, q.player_id, q.village_id, q.to_player_id, q.to_village_id, q.proc_type, q.building_id, q.proc_params, q.threads, q.execution_time,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(q.end_date, NOW())) remainingTimeInSeconds\r\n\t\t\tFROM p_queue q\r\n\t\t\tWHERE\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF((q.end_date - INTERVAL (q.execution_time*(q.threads-1)) SECOND), NOW())) <= 0\r\n\t\t\tORDER BY\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF((q.end_date - INTERVAL (q.execution_time*(q.threads-1)) SECOND), NOW())) ASC" );
        do
        {
            if ( !$result->next( ) )
            {
                break;
            }
            else
            {
                $remain = $result->row['remainingTimeInSeconds'];
            }
            if ( $remain < 0 )
            {
                $remain = 0;
            }
            $result->row['threads_completed_num'] = $result->row['execution_time'] <= 0 ? $result->row['threads'] : floor( ( $result->row['threads'] * $result->row['execution_time'] - $remain ) / $result->row['execution_time'] );
        } while ( !$this->processTask( $result->row ) );
        $result->free( );
        $this->processTaskQueue( );
        return;
    }

    public function setWeeklyMedals( $week )
    {
        require_once( MODEL_PATH."statistics.php" );
        $keyArray = array( "week_dev_points" => 1, "week_attack_points" => 2, "week_defense_points" => 3, "week_thief_points" => 4 );
        $sm = new StatisticsModel( );
        foreach ( $keyArray as $columnName => $index )
        {
            $result = $sm->getTop10( TRUE, $columnName );
            if ( $result != NULL )
            {
                $i = 0;
                while ( $result->next( ) )
                {
                    $medal = $index.":".++$i.":".$week;
                    $this->provider->executeQuery( "UPDATE p_players SET medals=CONCAT_WS(',', medals, '%s') WHERE id=%s", array( $medal, $result->row['id'] ) );
                }
            }
            $result = $sm->getTop10( FALSE, $columnName );
            if ( $result != NULL )
            {
                $i = 0;
                do
                {
                    if ( $result->next( ) )
                    {
                        $medal = ( ( ( ( $index + 4 ).":" ).++$i ).":" ).$week;
                        $this->provider->executeQuery( "UPDATE p_alliances SET medals=CONCAT_WS(',', medals, '%s') WHERE id=%s", array( $medal, $result->row['id'] ) );
                        break;
                    }
                } while ( 1 );
            }
        }
        $this->provider->executeQuery( "UPDATE p_players   SET week_dev_points=0, week_attack_points=0, week_defense_points=0, week_thief_points=0" );
        $this->provider->executeQuery( "UPDATE p_alliances SET week_dev_points=0, week_attack_points=0, week_defense_points=0, week_thief_points=0" );
        $sm->dispose( );
    }

    public function processTask( $taskRow )
    {
        $customAction = FALSE;
        switch ( $taskRow['proc_type'] )
        {
            case QS_ACCOUNT_DELETE :
                $this->deletePlayer( $taskRow['player_id'] );
                break;
            case QS_BUILD_CREATEUPGRADE :
                $customAction = $this->executeBuildingTask( $taskRow );
                break;
            case QS_BUILD_DROP :
                $customAction = $this->executeBuildingDropTask( $taskRow );
                break;
            case QS_TROOP_RESEARCH :
                break;
            case QS_TROOP_UPGRADE_ATTACK :
                break;
            case QS_TROOP_UPGRADE_DEFENSE :
        }
        $this->executeTroopUpgradeTask( $taskRow );
        break;
        switch ( $taskRow['proc_type'] )
        {
            case QS_TROOP_TRAINING :
                $this->executeTroopTrainingTask( $taskRow );
                break;
            case QS_TROOP_TRAINING_HERO :
                $this->executeHeroTask( $taskRow );
                break;
            case QS_TOWNHALL_CELEBRATION :
                $this->executeCelebrationTask( $taskRow );
                break;
            case QS_MERCHANT_GO :
                $customAction = $this->executeMerchantTask( $taskRow );
                break;
            case QS_MERCHANT_BACK :
                break;
            case QS_WAR_REINFORCE :
                break;
            case QS_WAR_ATTACK :break;
			//if(FALSE){
			//	break;
			//}
			//else{
			case QS_WAR_ATTACK_SPY : break;
            //    }
            case QS_CREATEVILLAGE :
        }
        $customAction = $this->executeWarTask( $taskRow );
        break;
        switch ( $taskRow['proc_type'] )
        {
            case QS_LEAVEOASIS :
                $this->executeLeaveOasisTask( $taskRow );
                break;
            case QS_PLUS1 :
                $this->provider->executeQuery( "UPDATE p_players p SET p.active_plus_account=0 WHERE p.id=%s", array( intval( $taskRow['player_id'] ) ) );
                break;
            case QS_PLUS2 :
                $this->executePlusTask( $taskRow, 1 );
                break;
            case QS_PLUS3 :
                $this->executePlusTask( $taskRow, 2 );
                break;
            case QS_PLUS4 :
                $this->executePlusTask( $taskRow, 3 );
                break;
            case QS_PLUS5 :
                $this->executePlusTask( $taskRow, 4 );
                break;
            case QS_TATAR_RAISE :
                $this->createTatarVillages( );
                break;
            case QS_SITE_RESET :
                $this->dispose( );
                header( "location: index.php?ssb939ca8b5fed1cbbfdgf6f893b9c206e4cgfb843" );
                exit( 0 );
                return;
        }
        if ( !$customAction )
        {
            $remaining_thread = $taskRow['threads'] - $taskRow['threads_completed_num'];
            if ( $remaining_thread <= 0 )
            {
                $this->provider->executeQuery( "DELETE FROM p_queue WHERE id=%s", array( intval( $taskRow['id'] ) ) );
            }
            else
            {
                $this->provider->executeQuery( "UPDATE p_queue q SET q.threads=%s WHERE q.id=%s", array( intval( $remaining_thread ), intval( $taskRow['id'] ) ) );
            }
        }
        return $customAction;
    }

    public function cropBalance( $playerId, $villageId )
    {
        $row = $this->provider->fetchRow( "SELECT\r\n\t\t\t\tv.crop_consumption, \r\n\t\t\t\tv.people_count,\r\n\t\t\t\tv.resources, v.cp,\r\n\t\t\t\tv.troops_num, v.troops_out_num, v.troops_intrap_num,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.creation_date)) oasisElapsedTimeInSeconds\r\n\t\t\tFROM p_villages v \r\n\t\t\tWHERE v.id=%s AND v.player_id=%s", array( intval( $villageId ), intval( $playerId ) ) );
        if ( $row == NULL )
        {
        }
        else
        {
        }
    }

    public function createTatarVillages( )
    {
        require_once( MODEL_PATH."register.php" );
        $map_size = $GLOBALS['SetupMetadata']['map_size'];
        $m = new RegisterModel( );
        $result = $m->createNewPlayer( tatar_tribe_player, "", "", 5, 0, tatar_tribe_villages, $map_size, PLAYERTYPE_TATAR, 13 );
        if ( $result['hasErrors'] )
        {
        }
        else
        {
            $this->provider->executeQuery( "UPDATE p_players p SET p.total_people_count=15045, p.description1='%s', p.guide_quiz='-1' WHERE id=%s", array( tatar_tribe_desc, intval( $result['playerId'] ) ) );
            $troop_ids = array( );
            foreach ( $GLOBALS['GameMetadata']['troops'] as $k => $v )
            {
                if ( $v['for_tribe_id'] == 5 )
                {
                    $troop_ids[] = $k;
                }
            }
            $firstFlag = TRUE;
            foreach ( $result['villages'] as $createdVillage => $v )
            {
                $troops_num = "";
                foreach ( $troop_ids as $tid )
                {
                    if ( $troops_num != "" )
                    {
                        $troops_num .= ",";
                    }
                    $num = $tid == 49 || $tid == 50 ? 0 : mt_rand( 42300, 117600 );
                    $troops_num .= sprintf( "%s %s", $tid, $num );
                }
                $troops_num = "-1:".$troops_num;
                $this->provider->executeQuery( "UPDATE p_villages v SET v.troops_num='%s', v.is_capital=%s, v.people_count=%s WHERE v.id=%s", array( $troops_num, $firstFlag ? "1" : "0", $firstFlag ? "864" : "163" ) );
                $firstFlag = FALSE;
            }
            $m->dispose( );
        }
    }

    public function deletePlayer( $playerId )
    {
        $playerId = intval( $playerId );
        if ( $playerId <= 0 )
        {
        }
        else
        {
            $row = $this->provider->fetchRow( "SELECT p.alliance_id, p.villages_id, p.tribe_id, p.is_active FROM p_players p WHERE id=%s", array( $playerId ) );
            if ( $row == NULL )
            {
            }
            else
            {
                $this->provider->executeQuery( "UPDATE p_msgs m SET m.to_player_id=IF(m.to_player_id=%s, NULL, m.to_player_id), m.from_player_id=IF(m.from_player_id=%s, NULL, m.from_player_id)", array( $playerId, $playerId ) );
                $this->provider->executeQuery( "UPDATE p_rpts r SET r.to_player_id=IF(r.to_player_id=%s, NULL, r.to_player_id), r.from_player_id=IF(r.from_player_id=%s, NULL, r.from_player_id)", array( $playerId, $playerId ) );
                if ( 0 < intval( $row['alliance_id'] ) )
                {
                    $this->provider->executeQuery( "UPDATE p_alliances SET player_count=player_count-1 WHERE id=%s", array( intval( $row['alliance_id'] ) ) );
                    $_aRow = $this->provider->fetchRow(  );
                    if ( $_aRow['player_count'] <= 0 )
                    {
                        $this->provider->executeQuery( "DELETE FROM p_alliances WHERE id=%s", array( intval( $row['alliance_id'] ) ) );
                    }
                    else
                    {
                        $aplayers_ids = $_aRow['players_ids'];
                        if ( trim( $aplayers_ids ) != "" )
                        {
                            $newPlayers_ids = "";
                            $aplayers_idsArr = explode( ",", $aplayers_ids );
                            foreach ( $aplayers_idsArr as $pid )
                            {
                                if ( $pid == $playerId )
                                {
                                    continue;
                                }
                                if ( $newPlayers_ids != "" )
                                {
                                    $newPlayers_ids .= ",";
                                }
                                $newPlayers_ids .= $pid;
                            }
                            $this->provider->executeQuery( "UPDATE p_alliances SET players_ids='%s' WHERE id=%s", array( $newPlayers_ids, intval( $row['alliance_id'] ) ) );
                        }
                    }
                }
                $this->provider->executeQuery( "DELETE FROM p_merchants WHERE player_id=%s", array( $playerId ) );
                $this->provider->executeQuery( "UPDATE p_villages v \r\n\t\t\tSET \r\n\t\t\t\tv.tribe_id=IF(v.is_oasis=1, 4, 0),\r\n\t\t\t\tv.parent_id=NULL,\r\n\t\t\t\tv.player_id=NULL,\r\n\t\t\t\tv.alliance_id=NULL,\r\n\t\t\t\tv.player_name=NULL,\r\n\t\t\t\tv.village_name=NULL,\r\n\t\t\t\tv.alliance_name=NULL,\r\n\t\t\t\tv.is_capital=0,\r\n\t\t\t\tv.people_count=2,\r\n\t\t\t\tv.crop_consumption=2,\r\n\t\t\t\tv.time_consume_percent=100,\r\n\t\t\t\tv.offer_merchants_count=0,\r\n\t\t\t\tv.resources=NULL,\r\n\t\t\t\tv.cp=NULL,\r\n\t\t\t\tv.buildings=NULL,\r\n\t\t\t\tv.troops_training=NULL,\r\n\t\t\t\tv.child_villages_id=NULL,\r\n\t\t\t\tv.village_oases_id=NULL,\r\n\t\t\t\tv.troops_trapped_num=0,\r\n\t\t\t\tv.allegiance_percent=100,\r\n\t\t\t\tv.troops_num=IF(v.is_oasis=1, '-1:31 0,34 0,37 0', NULL),\r\n\t\t\t\tv.troops_out_num=NULL,\r\n\t\t\t\tv.troops_intrap_num=NULL,\r\n\t\t\t\tv.troops_out_intrap_num=NULL,\r\n\t\t\t\tv.creation_date=NOW()\r\n\t\t\tWHERE v.player_id=%s", array( $playerId ) );
                $this->provider->executeQuery( "DELETE FROM p_players WHERE id=%s", array( $playerId ) );
                $this->provider->executeQuery( "DELETE FROM p_profile WHERE userid=%s", array( $playerId ) );
                $this->provider->executeQuery( "DELETE FROM p_comment WHERE userid=%s OR to_userid=%s", array( $playerId, $playerId ) );
                $this->provider->executeQuery( "DELETE FROM p_friends WHERE playerid1=%s OR playerid2=%s", array( $playerId, $playerId ) );
                $this->provider->executeQuery( "UPDATE g_summary \r\n\t\t\tSET \r\n\t\t\t\tplayers_count=players_count-1,\r\n\t\t\t\tactive_players_count=active_players_count-%s,\r\n\t\t\t\tDboor_players_count=Dboor_players_count-%s,\r\n\t\t\t\tArab_players_count=Arab_players_count-%s,\r\n\t\t\t\tRoman_players_count=Roman_players_count-%s,\r\n\t\t\t\tTeutonic_players_count=Teutonic_players_count-%s,\r\n\t\t\t\tGallic_players_count=Gallic_players_count-%s", array( $row['is_active'] ? 1 : 0, $row['tribe_id'] == 6 ? 1 : 0, $row['tribe_id'] == 7 ? 1 : 0, $row['tribe_id'] == 1 ? 1 : 0, $row['tribe_id'] == 2 ? 1 : 0, $row['tribe_id'] == 3 ? 1 : 0 ) );
            }
        }
    }

    public function captureOasis( $oasisId, $playerId, $villageId, $capture = TRUE )
    {
        $villageRow = $this->provider->fetchRow( "SELECT\r\n\t\t\t\tv.player_id,\r\n\t\t\t\tv.tribe_id,\r\n\t\t\t\tv.alliance_id,\r\n\t\t\t\tv.player_name,\r\n\t\t\t\tv.alliance_name,\r\n\t\t\t\tv.resources,\r\n\t\t\t\tv.cp,\r\n\t\t\t\tv.crop_consumption,\r\n\t\t\t\tv.village_oases_id,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds \r\n\t\t\tFROM p_villages v\r\n\t\t\tWHERE v.id=%s", array( intval( $villageId ) ) );
        if ( intval( $villageRow['player_id'] ) == 0 || intval( $villageRow['player_id'] ) != $playerId )
        {
        }
        else
        {
            if ( $capture )
            {
                $this->provider->executeQuery( "UPDATE p_villages v\r\n\t\t\t\tSET\r\n\t\t\t\t\tv.parent_id=%s,\r\n\t\t\t\t\tv.tribe_id=%s,\r\n\t\t\t\t\tv.player_id=%s,\r\n\t\t\t\t\tv.alliance_id=%s,\r\n\t\t\t\t\tv.player_name='%s',\r\n\t\t\t\t\tv.alliance_name='%s',\r\n\t\t\t\t\tv.troops_num=NULL,\r\n\t\t\t\t\tv.troops_out_num=NULL,\r\n\t\t\t\t\tv.troops_intrap_num=NULL,\r\n\t\t\t\t\tv.troops_out_intrap_num=NULL,\r\n\t\t\t\t\tv.allegiance_percent=100,\r\n\t\t\t\t\tv.creation_date=NOW(),\r\n\t\t\t\t\tv.last_update_date=NOW()\r\n\t\t\t\tWHERE v.id=%s", array( intval( $villageId ), $this->provider->executeQuery( $villageRow['tribe_id'] ), intval( $villageRow['player_id'] ), 0 < intval( $villageRow['alliance_id'] ) ? intval( $villageRow['alliance_id'] ) : "NULL", $villageRow['player_name'], $villageRow['alliance_name'], intval( $oasisId ) ) );
            }
            else
            {
                $this->provider->executeQuery( "UPDATE p_villages v \r\n\t\t\t\tSET \r\n\t\t\t\t\tv.tribe_id=4,\r\n\t\t\t\t\tv.parent_id=NULL,\r\n\t\t\t\t\tv.player_id=NULL,\r\n\t\t\t\t\tv.alliance_id=NULL,\r\n\t\t\t\t\tv.player_name=NULL,\r\n\t\t\t\t\tv.village_name=NULL,\r\n\t\t\t\t\tv.alliance_name=NULL,\r\n\t\t\t\t\tv.troops_num='-1:31 0,34 0,37 0',\r\n\t\t\t\t\tv.troops_out_num=NULL,\r\n\t\t\t\t\tv.troops_intrap_num=NULL,\r\n\t\t\t\t\tv.troops_out_intrap_num=NULL,\t\t\t\t\t\r\n\t\t\t\t\tv.allegiance_percent=100,\r\n\t\t\t\t\tv.creation_date=NOW()\r\n\t\t\t\tWHERE v.id=%s", array( intval( $oasisId ) ) );
            }
            $village_oases_id = "";
            if ( $capture )
            {
                $village_oases_id = trim( $villageRow['village_oases_id'] );
                if ( $village_oases_id != "" )
                {
                    $village_oases_id .= ",";
                }
                $village_oases_id .= $oasisId;
            }
            else if ( trim( $villageRow['village_oases_id'] ) != "" )
            {
                $village_oases_idArr = explode( ",", $villageRow['village_oases_id'] );
                foreach ( $village_oases_idArr as $oid )
                {
                    if ( $oid == $oasisId )
                    {
                        continue;
                    }
                    if ( $village_oases_id != "" )
                    {
                        $village_oases_id .= ",";
                    }
                    $village_oases_id .= $oid;
                }
            }
            $resultArr = $this->_getResourcesArray( $villageRow['resources'], $villageRow['elapsedTimeInSeconds'], $villageRow['crop_consumption'], $villageRow['cp'] );
            $oasisIndex = $this->provider->fetchScalar( "SELECT v.image_num FROM p_villages v WHERE v.id=%s", array( intval( $oasisId ) ) );
            $oasisRes = $GLOBALS['SetupMetadata']['oasis'][$oasisIndex];
            $factor = $capture ? 1 : 0 - 1;
            foreach ( $oasisRes as $k => $v )
            {
                $resultArr['resources'][$k] += "prod_rate_percentage";
                if ( $resultArr['resources'][$k]['prod_rate_percentage'] < 0 )
                {
                    $resultArr['resources'][$k]['prod_rate_percentage'] = 0;
                }
            }
            $this->provider->executeQuery( "UPDATE p_villages v \r\n\t\t\tSET\r\n\t\t\t\tv.resources='%s',\r\n\t\t\t\tv.cp='%s',\r\n\t\t\t\tv.village_oases_id='%s',\r\n\t\t\t\tv.last_update_date=NOW()\r\n\t\t\tWHERE v.id=%s", array( $this->_getResourcesString( $resultArr['resources'] ), $resultArr['cp']['cpValue']." ".$resultArr['cp']['cpRate'], $village_oases_id, intval( $villageId ) ) );
        }
    }

    public function executeLeaveOasisTask( $taskRow )
    {
        $this->captureOasis( $taskRow['building_id'], $taskRow['player_id'], $taskRow['village_id'], FALSE );
    }

    public function executeMerchantTask( $taskRow )
    {
        $villageRow = $this->provider->fetchRow( "SELECT\r\n\t\t\t\tv.player_id,\r\n\t\t\t\tv.resources,\r\n\t\t\t\tv.cp,\r\n\t\t\t\tv.crop_consumption,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds \r\n\t\t\tFROM p_villages v\r\n\t\t\tWHERE v.id=%s", array( intval( $taskRow['to_village_id'] ) ) );
        if ( 0 < intval( $villageRow['player_id'] ) )
        {
            $resultArr = $this->_getResourcesArray( $villageRow['resources'], $villageRow['elapsedTimeInSeconds'], $villageRow['crop_consumption'], $villageRow['cp'] );
            $resourcesStr = explode( "|", $taskRow['proc_params'][1] );
            $merchantNum = explode( "|", $taskRow['proc_params'][0] );
            $resources = explode( " ", $resourcesStr );
            $i = 0;
            foreach ( $resources as $v )
            {
                $resultArr['resources'][++$i] += "current_value";
                if ( $resultArr['resources'][$i]['store_max_limit'] < $resultArr['resources'][$i]['current_value'] )
                {
                    $resultArr['resources'][$i]['current_value'] = $resultArr['resources'][$i]['store_max_limit'];
                }
            }
            $this->provider->executeQuery( "UPDATE p_villages v \r\n\t\t\t\tSET\r\n\t\t\t\t\tv.resources='%s',\r\n\t\t\t\t\tv.cp='%s',\r\n\t\t\t\t\tv.last_update_date=NOW()\r\n\t\t\t\tWHERE v.id=%s", array( $this->_getResourcesString( $resultArr['resources'] ), $resultArr['cp']['cpValue']." ".$resultArr['cp']['cpRate'], intval( $taskRow['to_village_id'] ) ) );
        }
        if ( intval( $this->provider->fetchScalar( "SELECT v.player_id FROM p_villages v WHERE v.id=%s", array( intval( $taskRow['village_id'] ) ) ) ) == 0 )
        {
            return FALSE;
        }
        $this->provider->executeQuery( "UPDATE p_queue q \r\n\t\t\tSET \r\n\t\t\t\tq.proc_type=%s,\r\n\t\t\t\tq.end_date=(q.end_date + INTERVAL q.execution_time SECOND)\r\n\t\t\tWHERE q.id=%s", array( QS_MERCHANT_BACK, intval( $taskRow['id'] ) ) );
        $timeInSeconds = $taskRow['remainingTimeInSeconds'];
        $body = explode( "|", $taskRow['proc_params'][1] );
        $merchantsNum = explode( "|", $taskRow['proc_params'][0] );
        $res = explode( " ", $body );
        $maxValue = 0;
        $maxIndex = 0 - 1;
        $n = 0;
        foreach ( $res as $v )
        {
            ++$n;
            if ( $maxValue < $v )
            {
                $maxValue = $v;
                $maxIndex = $n;
            }
        }
        $reportResult = 10 + $maxIndex;
        $r = new ReportModel( );
        $r->createReport( $taskRow['player_id'], $taskRow['to_player_id'], $taskRow['village_id'], $taskRow['to_village_id'], 1, $reportResult, $body, $timeInSeconds );
        return TRUE;
    }

    public function executeHeroTask( $taskRow )
    {
        $hero_in_village_id = explode( " ", $taskRow['proc_params'][1] );
        $hero_troop_id = explode( " ", $taskRow['proc_params'][0] );
        $playerRow = $this->provider->fetchRow( "SELECT p.villages_id, p.selected_village_id FROM p_players p WHERE p.id=%s", array( intval( $taskRow['player_id'] ) ) );
        if ( $playerRow == NULL || trim( $playerRow['villages_id'] ) == "" )
        {
        }
        else
        {
            $hasVillage = FALSE;
            $villages_idArr = explode( ",", trim( $playerRow['villages_id'] ) );
            foreach ( $villages_idArr as $pvid )
            {
                if ( $pvid == $hero_in_village_id )
                {
                    $hasVillage = TRUE;
                    break;
                    break;
                }
            }
            if ( !$hasVillage )
            {
                $hero_in_village_id = $playerRow['selected_village_id'];
            }
            $this->provider->executeQuery( "UPDATE p_players p SET p.hero_name=p.name, p.hero_troop_id=%s, p.hero_in_village_id=%s WHERE p.id=%s", array( intval( $hero_troop_id ), intval( $hero_in_village_id ), intval( $taskRow['player_id'] ) ) );
        }
    }

    public function executeTroopTrainingTask( $taskRow )
    {
        $villageRow = $this->provider->fetchRow( "SELECT\r\n\t\t\t\tv.player_id,\r\n\t\t\t\tv.resources,\r\n\t\t\t\tv.cp,\r\n\t\t\t\tv.crop_consumption,\r\n\t\t\t\tv.time_consume_percent,\r\n\t\t\t\tv.troops_num,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds \r\n\t\t\tFROM p_villages v\r\n\t\t\tWHERE v.id=%s", array( intval( $taskRow['village_id'] ) ) );
        if ( intval( $villageRow['player_id'] ) == 0 || intval( $villageRow['player_id'] ) != $taskRow['player_id'] )
        {
        }
        else
        {
            $resultArr = $this->_getResourcesArray( $villageRow['resources'], $villageRow['elapsedTimeInSeconds'], $villageRow['crop_consumption'], $villageRow['cp'] );
            $troopId = $taskRow['proc_params'];
            $troopsNumber = $taskRow['threads_completed_num'];
            $troops_crop_consumption = $troopsNumber * $GLOBALS['GameMetadata']['troops'][$troopId]['crop_consumption'];
            $troopsArray = $this->_getTroopsArray( $villageRow['troops_num'] );
            if ( isset( $troopsArray[0 - 1] ) )
            {
                if ( isset( $troopsArray[0 - 1][$troopId] ) )
                {
                    $troopsArray[0 - 1] += $troopId;
                }
                else if ( $troopId == 99 )
                {
                    $troopsArray[0 - 1][$troopId] = $troopsNumber;
                }
            }
            $troopTrainingStr = $this->_getTroopsString( $troopsArray );
            $this->provider->executeQuery( "UPDATE p_villages v \r\n\t\t\tSET\r\n\t\t\t\tv.resources='%s',\r\n\t\t\t\tv.cp='%s',\r\n\t\t\t\tv.crop_consumption=v.crop_consumption+%s,\r\n\t\t\t\tv.troops_num='%s',\r\n\t\t\t\tv.last_update_date=NOW()\r\n\t\t\tWHERE v.id=%s", array( $this->_getResourcesString( $resultArr['resources'] ), $resultArr['cp']['cpValue']." ".$resultArr['cp']['cpRate'], $troops_crop_consumption, $troopTrainingStr, intval( $taskRow['village_id'] ) ) );
        }
    }

    public function executeCelebrationTask( $taskRow )
    {
        $villageRow = $this->provider->fetchRow( "SELECT\r\n\t\t\t\tv.player_id,\r\n\t\t\t\tv.resources,\r\n\t\t\t\tv.cp,\r\n\t\t\t\tv.crop_consumption,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds \r\n\t\t\tFROM p_villages v\r\n\t\t\tWHERE v.id=%s", array( intval( $taskRow['village_id'] ) ) );
        if ( intval( $villageRow['player_id'] ) == 0 )
        {
        }
        $resultArr = $this->_getResourcesArray( $villageRow['resources'], $villageRow['elapsedTimeInSeconds'], $villageRow['crop_consumption'], $villageRow['cp'] );
        $celebrationType = $taskRow['proc_params'] == 1 ? "small" : "large";
        $resultArr['cp'] += "cpValue";
        $this->provider->executeQuery( "UPDATE p_villages v \r\n\t\t\tSET\r\n\t\t\t\tv.resources='%s',\r\n\t\t\t\tv.cp='%s',\r\n\t\t\t\tv.last_update_date=NOW()\r\n\t\t\tWHERE v.id=%s", array( $this->_getResourcesString( $resultArr['resources'] ), $resultArr['cp']['cpValue']." ".$resultArr['cp']['cpRate'], intval( $taskRow['village_id'] ) ) );
    }

    public function executeTroopUpgradeTask( $taskRow )
    {
        $villageRow = $this->provider->fetchRow( "SELECT\r\n\t\t\t\tv.player_id,\r\n\t\t\t\tv.troops_training\r\n\t\t\tFROM p_villages v\r\n\t\t\tWHERE v.id=%s", array( intval( $taskRow['village_id'] ) ) );
        if ( intval( $villageRow['player_id'] ) == 0 || intval( $villageRow['player_id'] ) != $taskRow['player_id'] )
        {
        }
        else
        {
            $this->troopsUpgrade = array( );
            $_arr = explode( ",", $villageRow['troops_training'] );
            foreach ( $_arr as $troopStr )
            {
                $attack_level = explode( " ", $troopStr[3] );
                $defense_level = explode( " ", $troopStr[2] );
                $researches_done = explode( " ", $troopStr[1] );
                $troopId = explode( " ", $troopStr[0] );
                $this->troopsUpgrade[$troopId] = array( "researches_done" => $researches_done, "defense_level" => $defense_level, "attack_level" => $attack_level );
            }
            switch ( $taskRow['proc_type'] )
            {
                case QS_TROOP_RESEARCH :
                    $tid = $taskRow['proc_params'];
                    if ( isset( $this->troopsUpgrade[$tid] ) )
                    {
                        $this->troopsUpgrade[$tid]['researches_done'] = 1;
                    }
                    break;
                case QS_TROOP_UPGRADE_ATTACK :
                    $level = explode( " ", $taskRow['proc_params'][1] );
                    $tid = explode( " ", $taskRow['proc_params'][0] );
                    if ( isset( $this->troopsUpgrade[$tid] ) )
                    {
                        $this->troopsUpgrade[$tid]['attack_level'] = $level;
                    }
                    break;
                case QS_TROOP_UPGRADE_DEFENSE :
                    $level = explode( " ", $taskRow['proc_params'][1] );
                    $tid = explode( " ", $taskRow['proc_params'][0] );
                    if ( isset( $this->troopsUpgrade[$tid] ) )
                    {
                        $this->troopsUpgrade[$tid]['defense_level'] = $level;
                    }
            }
            $troopTrainingStr = "";
            foreach ( $this->troopsUpgrade as $k => $v )
            {
                if ( $troopTrainingStr != "" )
                {
                    $troopTrainingStr .= ",";
                }
                $troopTrainingStr .= $k." ".$v['researches_done']." ".$v['defense_level']." ".$v['attack_level'];
            }
            $this->provider->executeQuery( "UPDATE p_villages v\r\n\t\t\tSET\r\n\t\t\t\tv.troops_training='%s'\r\n\t\t\tWHERE v.id=%s", array( $troopTrainingStr, intval( $taskRow['village_id'] ) ) );
        }
    }

    public function executePlusTask( $taskRow, $resource_id )
    {
        $villageRow = $this->provider->fetchRow( "SELECT\r\n\t\t\t\tv.player_id,\r\n\t\t\t\tv.resources,\r\n\t\t\t\tv.cp,\r\n\t\t\t\tv.crop_consumption,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds \r\n\t\t\tFROM p_villages v\r\n\t\t\tWHERE v.id=%s", array( intval( $taskRow['village_id'] ) ) );
        if ( intval( $villageRow['player_id'] ) == 0 )
        {
        }
        else
        {
            $resultArr = $this->_getResourcesArray( $villageRow['resources'], $villageRow['elapsedTimeInSeconds'], $villageRow['crop_consumption'], $villageRow['cp'] );
            $resultArr['resources'][$resource_id] -= "prod_rate_percentage";
            if ( $resultArr['resources'][$resource_id]['prod_rate_percentage'] < 0 )
            {
                $resultArr['resources'][$resource_id]['prod_rate_percentage'] = 0;
            }
            $this->provider->executeQuery( "UPDATE p_villages v \r\n\t\t\tSET\r\n\t\t\t\tv.resources='%s',\r\n\t\t\t\tv.cp='%s',\r\n\t\t\t\tv.last_update_date=NOW()\r\n\t\t\tWHERE v.id=%s", array( $this->_getResourcesString( $resultArr['resources'] ), $resultArr['cp']['cpValue']." ".$resultArr['cp']['cpRate'], intval( $taskRow['village_id'] ) ) );
        }
    }

    public function executeBuildingTask( $taskRow, $drop = FALSE )
    {
        return $this->upgradeBuilding( $taskRow['village_id'], $taskRow['proc_params'], $taskRow['building_id'], $drop );
    }

    public function executeBuildingDropTask( $taskRow )
    {
        return $this->executeBuildingTask( $taskRow, TRUE );
    }

    public function executeWarTask( $taskRow )
    {
        require_once( MODEL_PATH."battle.php" );
        $m = new BattleModel( );
        return $m->executeWarResult( $taskRow );
    }

    public function upgradeBuilding( $villageId, $bid, $itemId, $drop = FALSE )
    {
        $customAction = FALSE;
        $GameMetadata = $Var_192['GameMetadata'];
        $villageRow = $this->provider->fetchRow( "SELECT\r\n\t\t\t\tv.player_id,\r\n\t\t\t\tv.alliance_id,\r\n\t\t\t\tv.buildings,\r\n\t\t\t\tv.resources,\r\n\t\t\t\tv.cp,\r\n\t\t\t\tv.crop_consumption,\r\n\t\t\t\tv.time_consume_percent,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds \r\n\t\t\tFROM p_villages v\r\n\t\t\tWHERE v.id=%s", array( intval( $villageId ) ) );
        if ( intval( $villageRow['player_id'] ) == 0 )
        {
            return $customAction;
        }
        $buildings = $this->_getBuildingsArray( $villageRow['buildings'] );
        $build = $buildings[$bid];
        $buildingMetadata = $GameMetadata['items'][$itemId];
        if ( $build['item_id'] != $itemId )
        {
            return $customAction;
        }
        if ( $drop && $build['level'] <= 0 )
        {
            return $customAction;
        }
        $LevelOffset = $drop ? 0 - 1 : 1;
        $_resFactor = $itemId <= 4 ? $GameMetadata['game_speed'] : 1;
        $buildingLevel = $build['level'];
        $oldValue = ( $buildingLevel == 0 ? $itemId <= 4 ? 2 : 0 : $buildingMetadata['levels'][$buildingLevel - 1]['value'] ) * $_resFactor;
        $oldCP = $buildingLevel == 0 ? 0 : $buildingMetadata['levels'][$buildingLevel - 1]['cp'];
        $newBuildingLevel = $buildingLevel + $LevelOffset;
        $newValue = ( $newBuildingLevel == 0 ? $itemId <= 4 ? 2 : 0 : $buildingMetadata['levels'][$newBuildingLevel - 1]['value'] ) * $_resFactor;
        $newCP = $newBuildingLevel == 0 ? 0 : $buildingMetadata['levels'][$newBuildingLevel - 1]['cp'];
        $value_inc = $newValue - $oldValue;
        $people_inc = $drop ? 0 - 1 * $buildingMetadata['levels'][$buildingLevel - 1]['people_inc'] : $buildingMetadata['levels'][$newBuildingLevel - 1]['people_inc'];
        $resultArr = $this->_getResourcesArray( $villageRow['resources'], $villageRow['elapsedTimeInSeconds'], $villageRow['crop_consumption'], $villageRow['cp'] );
        $resultArr['cp'] += "cpRate";
        $allegiance_percent_inc = 0;
        switch ( $itemId )
        {
            case 1 :
                break;
            case 2 :
                break;
            case 3 :
                break;
            case 4 :
        }
        $resultArr['resources'][$itemId] += "prod_rate";
        break;
        switch ( $itemId )
        {
            case 5 :
                break;
            case 6 :
                break;
            case 7 :
                break;
            case 8 :
        }
        $resultArr['resources'][$itemId - 4] += "prod_rate_percentage";
        break;
        switch ( $itemId )
        {
            case 9 :
                $resultArr['resources'][4] += "prod_rate_percentage";
                break;
            case 10 :
                break;
            case 38 :
        }
        $newStorage = $resultArr['resources'][1]['store_max_limit'] == $resultArr['resources'][1]['store_init_limit'] ? 0 : $resultArr['resources'][1]['store_max_limit'];
        $newStorage = $newStorage + $value_inc;
        if ( $newStorage < $resultArr['resources'][1]['store_init_limit'] )
        {
            $newStorage = $resultArr['resources'][1]['store_init_limit'];
        }
        $resultArr['resources'][1]['store_max_limit'] = $resultArr['resources'][2]['store_max_limit'] = $resultArr['resources'][3]['store_max_limit'] = $newStorage;
        break;
        switch ( $itemId )
        {
            case 11 :
                break;
            case 39 :
        }
        $newStorage = $resultArr['resources'][4]['store_max_limit'] == $resultArr['resources'][4]['store_init_limit'] ? 0 : $resultArr['resources'][4]['store_max_limit'];
        $newStorage = $newStorage + $value_inc;
        if ( $newStorage < $resultArr['resources'][4]['store_init_limit'] )
        {
            $newStorage = $resultArr['resources'][4]['store_init_limit'];
        }
        $resultArr['resources'][4]['store_max_limit'] = $newStorage;
        break;
        switch ( $itemId )
        {
            case 15 :
                $villageRow['time_consume_percent'] = $newValue == 0 ? 300 : $newValue;
                break;
            case 18 :
                if ( 0 < intval( $villageRow['alliance_id'] ) && !$drop )
                {
                    $this->provider->executeQuery( "UPDATE p_alliances a\r\n\t\t\t\t\t\tSET\r\n\t\t\t\t\t\t\ta.max_player_count=%s\r\n\t\t\t\t\t\tWHERE a.id=%s AND a.creator_player_id=%s AND a.max_player_count<%s", array( $newValue, intval( $villageRow['alliance_id'] ), intval( $villageRow['player_id'] ), $newValue ) );
                }
                break;
            case 25 :
                break;
            case 26 :
        }
        if ( !$drop )
        {
            $allegiance_percent_inc = 10;
        }
        break;
        switch ( $itemId )
        {
            case 40 :
                if ( $newBuildingLevel == sizeof( $buildingMetadata['levels'] ) )
                {
                    $customAction = TRUE;
                    $this->provider->executeQuery( "DELETE FROM p_queue" );
                    require_once( MODEL_PATH."queue.php" );
                    $resetTime = 259200;
                    $queueModel = new QueueModel( );
                    $queueModel->addTask( new QueueTask( QS_SITE_RESET, 0, $resetTime ) );
                    $this->provider->executeQuery( "UPDATE g_settings gs SET gs.game_over=1, gs.win_pid=%s", array( intval( $villageRow['player_id'] ) ) );
                }
        }
        $buildings[$bid] += "level";
        if ( !$drop )
        {
            --$buildings[$bid]['update_state'];
        }
        else if ( $buildings[$bid]['level'] <= 0 && $buildings[$bid]['update_state'] == 0 && 4 < $buildings[$bid]['item_id'] )
        {
            $buildings[$bid]['item_id'] = 0;
        }
        if ( $buildings[$bid]['update_state'] < 0 )
        {
            $buildings[$bid]['update_state'] = 0;
        }
        $buildingsString = ( $buildings );
        $this->provider->executeQuery( "UPDATE p_villages v \r\n\t\t\tSET\r\n\t\t\t\tv.buildings='%s',\r\n\t\t\t\tv.resources='%s',\r\n\t\t\t\tv.cp='%s',\r\n\t\t\t\tv.crop_consumption=v.crop_consumption+%s,\r\n\t\t\t\tv.people_count=v.people_count+%s,\r\n\t\t\t\tv.time_consume_percent=%s,\r\n\t\t\t\tv.allegiance_percent=IF(v.allegiance_percent+%s>=100, 100, v.allegiance_percent+%s),\r\n\t\t\t\tv.last_update_date=NOW()\r\n\t\t\tWHERE v.id=%s", array( $buildingsString, $this->_getResourcesString( $resultArr['resources'] ), $resultArr['cp']['cpValue']." ".$resultArr['cp']['cpRate'], $people_inc, $people_inc, $villageRow['time_consume_percent'], $allegiance_percent_inc, $allegiance_percent_inc, intval( $villageId ) ) );
        $devPoint = $people_inc;
        $this->provider->executeQuery( "UPDATE p_players p\r\n\t\t\tSET\r\n\t\t\t\tp.total_people_count=p.total_people_count+%s,\r\n\t\t\t\tp.week_dev_points=p.week_dev_points+%s\r\n\t\t\tWHERE p.id=%s", array( $people_inc, $devPoint, intval( $villageRow['player_id'] ) ) );
        if ( 0 < intval( $villageRow['alliance_id'] ) )
        {
            $this->provider->executeQuery( "UPDATE p_alliances a\r\n\t\t\t\tSET\r\n\t\t\t\t\ta.week_dev_points=a.week_dev_points+%s\r\n\t\t\t\tWHERE a.id=%s", array( $devPoint, intval( $villageRow['alliance_id'] ) ) );
        }
        return $customAction;
    }

    public function _getTroopsString( $troopsArray )
    {
        $result = "";
        foreach ( $troopsArray as $vid => $troopsNumArray )
        {
            if ( $result != "" )
            {
                $result .= "|";
            }
            $innerResult = "";
            foreach ( $troopsNumArray as $tid => $num )
            {
                if ( $innerResult != "" )
                {
                    $Var_696 .= ",";
                }
                if ( $tid == 0 - 1 )
                {
                    $innerResult .= $num." ".$tid;
                }
                else
                {
                    $innerResult .= $tid." ".$num;
                }
            }
            $result .= $vid.":".$innerResult;
        }
        return $result;
    }

    public function _getTroopsArray( $troops_num )
    {
        $troopsArray = array( );
        $t_arr = explode( "|", $troops_num );
        foreach ( $t_arr as $t_str )
        {
            $t2_arr = explode( ":", $t_str );
            $vid = $t2_arr[0];
            $troopsArray[$vid] = array( );
            $t2_arr = explode( ",", $t2_arr[1] );
            foreach ( $t2_arr as $t2_str )
            {
                $t = explode( " ", $t2_str );
                if ( $t[1] == 0 - 1 )
                {
                    $troopsArray[$vid][$t[1]] = $t[0];
                }
                else
                {
                    $troopsArray[$vid][$t[0]] = $t[1];
                }
            }
        }
        return $troopsArray;
    }

    public function _getBuildingsArray( $buildingsString )
    {
        $buildings = array( );
        $b_arr = explode( ",", $buildingsString );
        $indx = 0;
        foreach ( $b_arr as $b_str )
        {
            ++$indx;
            $b2 = explode( " ", $b_str );
            $buildings[$indx] = array( "index" => $indx, "item_id" => $b2[0], "level" => $b2[1], "update_state" => $b2[2] );
        }
        return $buildings;
    }

    public function _getResourcesArray( $resourceString, $elapsedTimeInSeconds, $crop_consumption, $cp )
    {
        $resources = array( );
        $r_arr = explode( ",", $resourceString );
        foreach ( $r_arr as $r_str )
        {
            $r2 = explode( " ", $r_str );
            $prate = floor( $r2[4] * ( 1 + $r2[5] / 100 ) ) - ( $r2[0] == 4 ? $crop_consumption : 0 );
            $current_value = floor( $r2[1] + $elapsedTimeInSeconds * ( $prate / 3600 ) );
            if ( $r2[2] < $current_value )
            {
                $current_value = $r2[2];
            }
            $resources[$r2[0]] = array( "current_value" => $current_value, "store_max_limit" => $r2[2], "store_init_limit" => $r2[3], "prod_rate" => $r2[4], "prod_rate_percentage" => $r2[5] );
        }
        $cpRate = explode( " ", $cp[1] );
        $cpValue = explode( " ", $cp[0] );
        $cpValue += $elapsedTimeInSeconds * ( $cpRate / 86400 );
        return array( "resources" => $resources, "cp" => array( "cpValue" => round( $cpValue, 4 ), "cpRate" => $cpRate ) );
    }

    public function _getResourcesString( $resources )
    {
        $result = "";
        foreach ( $resources as $k => $v )
        {
            if ( $result != "" )
            {
                $result .= ",";
            }
            $result .= $k." ".$v['current_value']." ".$v['store_max_limit']." ".$v['store_init_limit']." ".$v['prod_rate']." ".$v['prod_rate_percentage'];
        }
        return $result;
    }

    public function _getBuildingString( $buildings )
    {
        $result = "";
        foreach ( $buildings as $build )
        {
            if ( $result != "" )
            {
                $result .= ",";
            }
            $result .= $build['item_id']." ".$build['level']." ".$build['update_state'];
        }
        return $result;
    }

}
