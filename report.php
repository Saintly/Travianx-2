<?php
require( ".".DIRECTORY_SEPARATOR."GameEngine".DIRECTORY_SEPARATOR."boot.php" );
require_once( MODEL_PATH."report.php" );
class GPage extends SecureGamePage
{

    public $showList;
    public $selectedTabIndex;
    public $reportData;
    public $dataList;
    public $pageSize = 10;
    public $pageCount;
    public $pageIndex;

    public function GPage( )
    {
        parent::securegamepage( );
        $this->viewFile = "report.php";
        $this->contentCssClass = "reports";
    }

    public function load( )
    {
        parent::load( ); 
        $this->showList = !( isset( $_GET['id'] ) && 0 < intval( $_GET['id'] ) );
        $this->selectedTabIndex = $this->showList && isset( $_GET['t'] ) && is_numeric( $_GET['t'] ) && 1 <= intval( $_GET['t'] ) && intval( $_GET['t'] ) <= 4 ? intval( $_GET['t'] ) : 0;
        $m = new ReportModel( );
        if ( !$this->isPost( ) )
        {
            if ( !$this->showList )
            {
                $this->selectedTabIndex = 0;
                $reportId = intval( $_GET['id'] );
                $result = $m->getReport( $reportId );
                if ( $result->next( ) )
                {
                    $readStatus = $result->row['read_status'];
                    $deleteStatus = $result->row['delete_status'];
                    $this->reportData = array( );
                    $this->reportData['messageDate'] = $result->row['mdate'];
                    $this->reportData['messageTime'] = $result->row['mtime'];
                    $this->reportData['from_player_id'] = $from_player_id = intval( $result->row['from_player_id'] );
                    $this->reportData['to_player_id'] = $to_player_id = intval( $result->row['to_player_id'] );
                    $this->reportData['from_village_id'] = intval( $result->row['from_village_id'] );
                    $this->reportData['to_village_id'] = intval( $result->row['to_village_id'] );
                    $this->reportData['from_player_name'] = $result->row['from_player_name'];
                    $this->reportData['to_player_name'] = $result->row['to_player_name'];
                    $this->reportData['to_village_name'] = $result->row['to_village_name'];
                    $this->reportData['from_village_name'] = $result->row['from_village_name'];
                    $this->reportData['rpt_body'] = $result->row['rpt_body'];
                    $this->reportData['rpt_cat'] = $result->row['rpt_cat'];
                    $this->reportData['mdate'] = $result->row['mdate'];
                    $this->reportData['mtime'] = $result->row['mtime'];
                    $this->reportData['to_player_alliance_id'] = $m->getPlayerAllianceId( $to_player_id );
                    switch ( $this->reportData['rpt_cat'] )
                    {
                        case 1 :
                            $this->reportData['resources'] = explode( " ", $this->reportData['rpt_body'] );
                            break;
                        case 2 :
                            $troopsStr = explode( "|", $this->reportData['rpt_body'] );
                            list( $troopsStr ) = $troopsStr;
                            $this->reportData['troopsTable'] = array( "troops" => array( ), "hasHero" => FALSE );
                            $troopsStrArr = explode( ",", $troopsStr );
                            foreach ( $troopsStrArr as $t )
                            {
                                $tnum = explode( " ", $t );
                                $tid = explode( " ", $t );
                                list( $tid, $tnum ) = $tid;
                                if ( $tnum == 0 - 1 )
                                {
                                    $this->reportData['troopsTable']['hasHero'] = TRUE;
                                }
                                else
                                {
                                    $this->reportData['troopsTable']['troops'][$tid] = $tnum;
                                }
                            }
                            break;
                        case 3 :
                            $bodyArr = explode( "|", $this->reportData['rpt_body'] );
                            $harvestResources = $bodyArr;
                            $total_carry_load = $bodyArr;
                            $defenseTableTroopsStr = $bodyArr;
                            $attackTroopsStr = $bodyArr;
                            list( $attackTroopsStr, $defenseTableTroopsStr, $total_carry_load, $harvestResources ) = $attackTroopsStr;
                            $wallDestructionResult = isset( $bodyArr[4] ) ? $bodyArr[4] : "";
                            $catapultResult = isset( $bodyArr[5] ) ? $bodyArr[5] : "";
                            $oasisResult = isset( $bodyArr[6] ) ? $bodyArr[6] : "";
                            $captureResult = isset( $bodyArr[7] ) ? $bodyArr[7] : "";
                            $this->reportData['total_carry_load'] = $total_carry_load;
                            $this->reportData['total_harvest_carry_load'] = 0;
                            $this->reportData['harvest_resources'] = array( );
                            $res = explode( " ", $harvestResources );
                            foreach ( $res as $r )
                            {
                                    $this->reportData['total_harvest_carry_load'] += $r;
                                    $this->reportData['harvest_resources'][] = $r;
                            }
                             $attackTroopsStrArr = explode( ",", $attackTroopsStr );
                                $this->reportData['attackTroopsTable'] = array(
                                    "troops" => array( ),
                                    "heros" => array( "number" => 0, "dead_number" => 0 )
                                );
                                $totalAttackTroops_live = 0;
                                $totalAttackTroops_dead = 0;
                                $attackWallDestrTroopId = 0;
                                $attackCatapultTroopId = 0;
                                $kingTroopId = 0;
                            foreach ( $attackTroopsStrArr as $s )
                            {
                                    $deadNum = explode( " ", $s );
                                    $num = explode( " ", $s );
                                    $tid = explode( " ", $s );
                                    list( $tid, $num, $deadNum ) = $tid;                                   
                                    $totalAttackTroops_live += $num;
                                    $totalAttackTroops_dead += $deadNum;
                                if ( $tid == 7 || $tid == 17 || $tid == 27 || $tid == 106 || $tid == 57 )
                                {
                                    $attackWallDestrTroopId = $tid;
                                }
                                else if ( $tid == 8 || $tid == 18 || $tid == 28 || $tid == 107 || $tid == 58 )
                                {
                                    $attackCatapultTroopId = $tid;
                                }
                                else if ( $tid == 9 || $tid == 19 || $tid == 29 || $tid == 108 || $tid == 59 )
                                {
                                    $kingTroopId = $tid;
                                }
                                if ( $tid == 0 - 1 )
                                {
                                    $this->reportData['attackTroopsTable']['heros']['number'] = $num;
                                    $this->reportData['attackTroopsTable']['heros']['dead_number'] = $deadNum;
                                }
                                else
                                {
                                    $this->reportData['attackTroopsTable']['troops'][$tid] = array( "number" => $num, "dead_number" => $deadNum );
                                }
                            }
                            $this->reportData['all_attackTroops_dead'] = $totalAttackTroops_live <= $totalAttackTroops_dead;
                            $this->reportData['defenseTroopsTable'] = array( );
                            $troopsTableStrArr = trim( $defenseTableTroopsStr ) == "" ? array( ) : explode( "#", $defenseTableTroopsStr );
                            $j = 0 - 1;
                            foreach ( $troopsTableStrArr as $defenseTableTroopsStr2 )
                            {
                                ++$j;
                                $defenseTroopsStrArr = explode( ",", $defenseTableTroopsStr2 );
                                $this->reportData['defenseTroopsTable'][$j] = array( "troops" => array( ), "heros" => array( "number" => 0, "dead_number" => 0 ) );
                                foreach ( $defenseTroopsStrArr as $s )
                                {
                                   $deadNum = explode( " ", $s );
                                    $num = explode( " ", $s );
                                    $tid = explode( " ", $s );
                                    list( $tid, $num, $deadNum ) = $tid;                                   
                                    if ( $tid == 0 - 1 )
                                    {
                                        $this->reportData['defenseTroopsTable'][$j]['heros']['number'] = $num;
                                        $this->reportData['defenseTroopsTable'][$j]['heros']['dead_number'] = $deadNum;
                                    }
                                    else
                                    {
                                        $this->reportData['defenseTroopsTable'][$j]['troops'][$tid] = array( "number" => $num, "dead_number" => $deadNum );
                                    }
                                }
                            }
                            if ( $captureResult != "" )
                            {
                                $wstr = "";
                                if ( $captureResult == "+" )
                                {
                                    $wstr = report_p_villagecaptured;
                                }
                                else
                                {
                                    $warr = explode( "-", $captureResult );
                                    $wstr = report_p_allegiancelowered." ".$warr[0]." ".report_p_to." ".$warr[1];
                                }
                                if ( $wstr != "" )
                                {
                                    $wstr = "<img src=\"assets/x.gif\" class=\"unit u".$kingTroopId."\" align=\"center\" /> ".$wstr;
                                }
                                $this->reportData['captureResult'] = $wstr;
                            }
                            if ( $oasisResult != "" )
                            {
                                $wstr = "";
                                if ( $oasisResult == "+" )
                                {
                                    $wstr = report_p_oasiscaptured;
                                }
                                else
                                {
                                    $warr = explode( "-", $oasisResult );
                                    $wstr = report_p_allegiancelowered." ".$warr[0]." ".report_p_to." ".$warr[1];
                                }
                                if ( $wstr != "" )
                                {
                                    $wstr = "<img src=\"assets/x.gif\" class=\"unit uhero\" align=\"center\" /> ".$wstr;
                                }
                                $this->reportData['oasisResult'] = $wstr;
                            }
                            if ( $wallDestructionResult != "" )
                            {
                                $wstr = "";
                                if ( $wallDestructionResult == "-" )
                                {
                                    $wstr = report_p_wallnotdestr;
                                }
                                else if ( $wallDestructionResult == "+" )
                                {
                                    $wstr = report_p_nowall;
                                }
                                else
                                {
                                    $warr = explode( "-", $wallDestructionResult );
                                    if ( intval( $warr[1] ) == 0 )
                                    {
                                        $wstr = report_p_walldestr;
                                    }
                                    $wstr = report_p_walllowered." ".$warr[0]." ".report_p_to." ".$warr[1];
                                }
                                if ( $wstr != "" )
                                {
                                    $wstr = "<img src=\"assets/x.gif\" class=\"unit u".$attackWallDestrTroopId."\" align=\"center\" /> ".$wstr;
                                }
                                $this->reportData['wallDestructionResult'] = $wstr;
                            }
                            if ( $catapultResult != "" )
                            {
                                $bdestArr = array( );
                                if ( $catapultResult == "+" )
                                {
                                    $bdestArr[] = "<img src=\"assets/x.gif\" class=\"unit u".$attackCatapultTroopId."\" align=\"center\" /> ".report_p_totallydestr;
                                }
                                else
                                {
                                    $catapultResultArr = explode( "#", $catapultResult );
                                    foreach ( $catapultResultArr as $catapultResultInfo )
                                    {
                                       
                                            $toLevel = explode( " ", $catapultResultInfo );
                                            $fromLevel = explode( " ", $catapultResultInfo );
                                            $itemId = explode( " ", $catapultResultInfo );
                                            list( $itemId, $fromLevel, $toLevel ) = $itemId;                                            
                                            if ( $toLevel == 0 - 1 )
                                        {
                                            $bdestArr[] = "<img src=\"assets/x.gif\" class=\"unit u".$attackCatapultTroopId."\" align=\"center\" /> ".report_p_notdestr." ".constant( "item_".$itemId );
                                        }
                                        else if ( $toLevel == 0 )
                                        {
                                            $bdestArr[] = "<img src=\"assets/x.gif\" class=\"unit u".$attackCatapultTroopId."\" align=\"center\" /> ".report_p_wasdestr." ".constant( "item_".$itemId );
                                        }
                                        else
                                        {
                                            $bdestArr[] = "<img src=\"assets/x.gif\" class=\"unit u".$attackCatapultTroopId."\" align=\"center\" /> ".report_p_waslowered." ".constant( "item_".$itemId )." ".report_p_fromlevel." ".$fromLevel." ".report_p_to." ".$toLevel;
                                        }
                                    }
                                }
                                $this->reportData['buildingDestructionResult'] = $bdestArr;
                            }
                            break;
                        case 4 :
                            $spyType = explode( "|", $this->reportData['rpt_body'] );
                            $harvestInfo = explode( "|", $this->reportData['rpt_body'] );
                            $harvestResources = explode( "|", $this->reportData['rpt_body'] );
                            $defenseTableTroopsStr = explode( "|", $this->reportData['rpt_body'] );
                            $attackTroopsStr = explode( "|", $this->reportData['rpt_body'] );
                             list( $attackTroopsStr, $defenseTableTroopsStr, $harvestResources, $harvestInfo, $spyType ) = $attackTroopsStr;
                            if ( trim( $harvestResources ) != "" && $spyType == 1 )
                            {
                                $this->reportData['harvest_resources'] = explode( " ", trim( $harvestResources ) );
                            }
                            if ( trim( $harvestInfo ) != "" && $spyType == 2 )
                            {
                                $level = explode( " ", $harvestInfo );
                                $itemId = explode( " ", $harvestInfo );
                                list( $itemId, $level ) = $itemId;
                                $this->reportData['harvest_info'] = constant( "item_".$itemId )." ".level_lang." ".$level;
                            }
                            $this->reportData['all_spy_dead'] = FALSE;
                            if ( $spyType == 3 )
                            {
                                $this->reportData['all_spy_dead'] = TRUE;
                                $this->reportData['harvest_info'] = report_p_allkilled;
                            }
                            $attackTroopsStrArr = explode( ",", $attackTroopsStr );
                            $this->reportData['attackTroopsTable'] = array( "troops" => array( ), "heros" => array( "number" => 0, "dead_number" => 0 ) );
                            foreach ( $attackTroopsStrArr as $s )
                            {
                                $deadNum = explode( " ", $s );
                                $num = explode( " ", $s );
                                $tid = explode( " ", $s );
                                list( $tid, $num, $deadNum ) = $tid;
                                if ( $tid == 0 - 1 )
                                {
                                    $this->reportData['attackTroopsTable']['heros']['number'] = $num;
                                    $this->reportData['attackTroopsTable']['heros']['dead_number'] = $deadNum;
                                }
                                else
                                {
                                    $this->reportData['attackTroopsTable']['troops'][$tid] = array( "number" => $num, "dead_number" => $deadNum );
                                }
                            }
                            $this->reportData['defenseTroopsTable'] = array( );
                            $troopsTableStrArr = trim( $defenseTableTroopsStr ) == "" ? array( ) : explode( "#", $defenseTableTroopsStr );
                            $j = 0 - 1;
                            foreach ( $troopsTableStrArr as $defenseTableTroopsStr2 )
                            {
                                ++$j;
                                $defenseTroopsStrArr = explode( ",", $defenseTableTroopsStr2 );
                                $this->reportData['defenseTroopsTable'][$j] = array( "troops" => array( ), "heros" => array( "number" => 0, "dead_number" => 0 ) );
                                foreach ( $defenseTroopsStrArr as $s )
                                {
                                    $deadNum = explode( " ", $s );
                                    $num = explode( " ", $s );
                                    $tid = explode( " ", $s );
                                    list( $tid, $num, $deadNum ) = $tid;
                                    if ( $tid == 0 - 1 )
                                    {
                                        $this->reportData['defenseTroopsTable'][$j]['heros']['number'] = $num;
                                        $this->reportData['defenseTroopsTable'][$j]['heros']['dead_number'] = $deadNum;
                                    }
                                    else
                                    {
                                        $this->reportData['defenseTroopsTable'][$j]['troops'][$tid] = array( "number" => $num, "dead_number" => $deadNum );
                                    }
                                }
                            }
                    }
                    $isDeleted = FALSE;
                    if ( !$isDeleted )
                    {
                        $canOpenReport = TRUE;
                        if ( $this->player->playerId != $from_player_id && $this->player->playerId != $to_player_id )
                        {
                            $canOpenReport = 0 < intval( $this->data['alliance_id'] ) && ( $this->data['alliance_id'] == $m->getPlayerAllianceId( $to_player_id ) || $this->data['alliance_id'] == $m->getPlayerAllianceId( $from_player_id ) );
                        }
                        if ( $canOpenReport )
                        {
                            if ( !$this->player->isSpy )
                            {
                                if ( $to_player_id == $this->player->playerId )
                                {
                                    if ( $readStatus == 0 || $readStatus == 2 )
                                    {
                                        $m->markReportAsReaded( $this->player->playerId, $to_player_id, $reportId, $readStatus );
                                        --$this->data['new_report_count'];
                                    }
                                }
                                else
                                {
                                    if ( $from_player_id == $this->player->playerId && ( $readStatus == 0 || $readStatus == 1 ) )
                                    {
                                        $m->markReportAsReaded( $this->player->playerId, $to_player_id, $reportId, $readStatus );
                                        --$this->data['new_report_count'];
                                    }
                                }
                            }
                        }
                        else
                        {
                            $this->showList = TRUE;
                        }
                    }
                    else
                    {
                        $this->showList = TRUE;
                    }
                }
                else
                {
                    $this->showList = TRUE;
                }
                $result->free( );
            }
        }
        else if ( isset( $_POST['dr'] ) && isset( $_POST['dr'] ) )
        {
            foreach ( $_POST['dr'] as $reportId )
            {
                if ( $m->deleteReport( $this->player->playerId, $reportId ) )
                {
                    --$this->data['new_report_count'];
                }
            }
        }
        if ( $this->showList )
        {
            $rowsCount = $m->getReportListCount( $this->player->playerId, $this->selectedTabIndex );
            $this->pageCount = 0 < $rowsCount ? ceil( $rowsCount / $this->pageSize ) : 1;
            $this->pageIndex = isset( $_GET['p'] ) && is_numeric( $_GET['p'] ) && intval( $_GET['p'] ) < $this->pageCount ? intval( $_GET['p'] ) : 0;
            $this->dataList = $m->getReportList( $this->player->playerId, $this->selectedTabIndex, $this->pageIndex, $this->pageSize );
            if ( 0 < $this->data['new_report_count'] )
            {
                $this->data['new_report_count'] = $m->syncReports( $this->player->playerId );
            }
        }
        $m->dispose( );
    }

    public function getVillageName( $playerId, $villageName )
    {
        return 0 < intval( $playerId ) ? $villageName : "<span class=\"none\">[?]</span>";
    }

    public function preRender( )
    {
        parent::prerender( );
        if ( isset( $_GET['id'] ) )
        {
            $this->villagesLinkPostfix .= "villagesLinkPostfix";
        }
        if ( isset( $_GET['p'] ) )
        {
            $this->villagesLinkPostfix .= "villagesLinkPostfix";
        }
        if ( 0 < $this->selectedTabIndex )
        {
            $this->villagesLinkPostfix .= "villagesLinkPostfix";
        }
    }

    public function getNextLink( )
    {
        $text = "»";
        if ( $this->pageIndex + 1 == $this->pageCount )
        {
            return $text;
        }
        $link = "";
        if ( 0 < $this->selectedTabIndex )
        {
            $link .= "t=".$this->selectedTabIndex;
        }
        if ( $link != "" )
        {
            $link .= "&";
        }
        $link .= "p=".( $this->pageIndex + 1 );
        $link = "report.php?".$link;
        return "<a href=\"".$link."\">".$text."</a>";
    }

    public function getPreviousLink( )
    {
        $text = "«";
        if ( $this->pageIndex == 0 )
        {
            return $text;
        }
        $link = "";
        if ( 0 < $this->selectedTabIndex )
        {
            $link .= "t=".$this->selectedTabIndex;
        }
        if ( 1 < $this->pageIndex )
        {
            if ( $link != "" )
            {
                $link .= "&";
            }
            $link .= "p=".( $this->pageIndex - 1 );
        }
        if ( $link != "" )
        {
            $link = "?".$link;
        }
        $link = "report.php".$link;
        return "<a href=\"".$link."\">".$text."</a>";
    }

}

$p = new GPage( );
$p->run( );
?>
