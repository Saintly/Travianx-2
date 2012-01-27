<?php
require(".".DIRECTORY_SEPARATOR."GameEngine".DIRECTORY_SEPARATOR."boot.php");
require_once( MODEL_PATH."build.php" );
class GPage extends VillagePage
{

    public $productionPane = TRUE;
    public $buildingView = "";
    public $buildingIndex = -1;
    public $buildProperties = NULL;
    public $newBuilds = NULL;
    public $troopsUpgrade;
    public $troopsUpgradeType;
    public $buildingTribeFactor;
    public $troops = array( );
    public $selectedTabIndex = 0;
    public $villageOases;
    public $childVillages;
    public $hasHero = FALSE;
    public $totalCpRate;
    public $totalCpValue;
    public $neededCpValue;
    public $childVillagesCount;
    public $showBuildingForm;
    public $embassyProperty;
    public $merchantProperty;
    public $rallyPointProperty;
    public $crannyProperty = array( 'buildingCount' => 0, 'totalSize' => 0 );
    public $warriorMessage = "";
    public $dataList;
    public $pageSize = 40;
    public $pageCount;
    public $pageIndex;

    public function GPage( )
    {
        parent::VillagePage( );
        $this->viewFile = "build.php";
        $this->contentCssClass = "build";
    }

    public function onLoadBuildings( $building )
    {
        $GameMetadata = $GLOBALS['GameMetadata'];
        if ( $this->buildingIndex == 0 - 1 && isset( $_GET['bid'] ) && is_numeric( $_GET['bid'] ) && $_GET['bid'] == $building['item_id'] )
        {
            $this->buildingIndex = $building['index'];
        }
        if ( $building['item_id'] == 23 && 0 < $building['level'] )
        {
            ++$this->crannyProperty['buildingCount'];
            $this->crannyProperty += "totalSize";
        }
    }

    public function load( )
    {
        parent::load( ); 
        if ( $this->buildingIndex == 0 - 1 && isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) && isset( $this->buildings[$_GET['id']] ) )
        {
            $this->buildingIndex = intval( $_GET['id'] );
        }
        $this->buildProperties = $this->getBuildingProperties( $this->buildingIndex );
        if ( $this->buildProperties == NULL )
        {
            $this->redirect( "village1.php" );
        }
        else if ( $this->buildProperties['emptyPlace'] )
        {
            //$ && _5712952 .= "villagesLinkPostfix";
            $this->newBuilds = array( "available" => array( ), "soon" => array( ) );
            foreach ( $this->gameMetadata['items'] as $item_id => $build )
            {
                if ( $item_id <= 4 || !isset( $build['for_tribe_id'][$this->tribeId] ) )
                {
                    continue;
                }
                $canBuild = $this->canCreateNewBuild( $item_id );
                if ( !( $canBuild != 0 - 1 ) )
                {
                    continue;
                }
                else if ( $canBuild )
                {
                    if ( !isset( $this->newBuilds['available'][$build['levels'][0]['time_consume']] ) )
                    {
                        $this->newBuilds['available'][$build['levels'][0]['time_consume']] = array( );
                    }
                    $this->newBuilds['available'][$build['levels'][0]['time_consume']][$item_id] = $build;
                }
                else
                {
                    $dependencyCount = 0;
                    foreach ( $build['pre_requests'] as $reqId => $reqValue )
                    {
                        if ( $reqValue != NULL )
                        {
                            $build['pre_requests_dependencyCount'][$reqId] = $reqValue - $this->_getMaxBuildingLevel( $reqId );
                            $dependencyCount += $build['pre_requests_dependencyCount'][$reqId];
                        }
                    }
                    if ( !isset( $this->newBuilds['soon'][$dependencyCount] ) )
                    {
                        $this->newBuilds['soon'][$dependencyCount] = array( );
                    }
                    $this->newBuilds['soon'][$dependencyCount][$item_id] = $build;
                }
            }
            ksort( $this->newBuilds['available'], SORT_NUMERIC );
            ksort( $this->newBuilds['soon'], SORT_NUMERIC );
        }
        else
        {
            $bitemId = $this->buildProperties['building']['item_id'];
            //$ && _39327144 .= "villagesLinkPostfix";
            if ( 4 < $bitemId )
            {
                //$ && _5689752 .= "villagesLinkPostfix";
            }
            $this->buildingTribeFactor = isset( $this->gameMetadata['items'][$bitemId]['for_tribe_id'][$this->data['tribe_id']] ) ? $this->gameMetadata['items'][$bitemId]['for_tribe_id'][$this->data['tribe_id']] : 1;
            if ( $this->buildings[$this->buildingIndex]['level'] == 0 )
            {
            }
            else
            {
                switch($bitemId){
					case 12 :break;
					case 13 :
						$this->productionPane = FALSE;
						$this->buildingView = "Blacksmith_Armoury";
						$this->handleBlacksmithArmoury( );
					break;
					case 15 :
						if(10 <= $this->buildings[$this->buildingIndex]['level']){
							$this->buildingView = "MainBuilding";
							$this->handleMainBuilding();
						}
					break;
					case 16 :
						$this->productionPane = FALSE;
						$this->buildingView = "RallyPoint";
						$this->handleRallyPoint( );
					break;
					case 17 :
						$this->productionPane = FALSE;
						$this->buildingView = "Marketplace";
						$this->handleMarketplace( );
					break;
					case 18 :
						$this->productionPane = FALSE;
						$this->buildingView = "Embassy";
						$this->handleEmbassy( );
					break;
					case 19 :break;
					case 20 :break;
					case 21 :break;
					case 29 :break;
					case 30 :break;
					case 36 :
						$this->_getOnlyMyTroops( );
						$this->productionPane = $bitemId == 36;
						$this->buildingView = "TroopBuilding";
						$this->handleTroopBuilding( );
					break;
					case 22 :
						$this->productionPane = FALSE;
						$this->buildingView = "Academy";
						$this->handleAcademy( );
					break;
					case 23 :
						$this->productionPane = TRUE;
						$this->buildingView = "Cranny";
					break;
					case 24 :
						$this->productionPane = FALSE;
						$this->buildingView = "TownHall";
						$this->handleTownHall( );
					break;
					case 25 :break;
					case 26 :
						$this->productionPane = FALSE;
						$this->buildingView = "Residence_Palace";
						$this->handleResidencePalace();
					break;
					case 37 :
						$this->productionPane = FALSE;
						$this->buildingView = "HerosMansion";
						$this->handleHerosMansion( );
					break;
					case 40 :
						$this->productionPane = FALSE;
					break;
					case 42 :
						$this->_getOnlyMyTroops( );
						$this->productionPane = TRUE;
						$this->buildingView = "Warrior";
						$this->handleWarrior( );
					}
            }
        }
    }

	public function handleBlacksmithArmoury(){
		$this->troopsUpgradeType = $this->buildings[$this->buildingIndex]['item_id'] == 12 ? QS_TROOP_UPGRADE_ATTACK : QS_TROOP_UPGRADE_DEFENSE;
		$this->troopsUpgrade = array();
		$_arr = explode(",", $this->data['troops_training']);
		$_c = 0;
		foreach ( $_arr as $troopStr ){
			++$_c;
			$attack_level = explode( " ", $troopStr[3] );
			$defense_level = explode( " ", $troopStr[2] );
			$researches_done = explode( " ", $troopStr[1] );
			$troopId = explode( " ", $troopStr[0] );
			$tlevel = $this->troopsUpgradeType == QS_TROOP_UPGRADE_ATTACK ? $attack_level : $defense_level;
			if ( $troopId != 99 && $_c <= 8 && $tlevel < 20 && $researches_done == 1 ){
				$this->troopsUpgrade[$troopId] = $tlevel;
			}
		}
		if(!empty($_GET['k']) == $this->data['update_key'] && !isset($this->queueModel->tasksInQueue[$this->troopsUpgradeType] ) && isset( $this->troopsUpgrade[intval( $_GET['a'] )] ) && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
        {
            $troopId = intval( $_GET['a'] );
            $level = $this->troopsUpgrade[$troopId];
            $buildingMetadata = $this->gameMetadata['items'][$this->buildProperties['building']['item_id']]['troop_upgrades'][$troopId][$level];
            if ( !$this->isResourcesAvailable( $buildingMetadata['resources'] ) )
            {
            }
            else
            {
                $calcConsume = intval( $buildingMetadata['time_consume'] / $this->gameSpeed * ( 10 / ( $this->buildProperties['building']['level'] + 9 ) ) );
                $newTask = new QueueTask( $this->troopsUpgradeType, $this->player->playerId, $calcConsume );
                $newTask->villageId = $this->data['selected_village_id'];
                $newTask->procParams = $troopId." ".( $level + 1 );
                $newTask->tag = $buildingMetadata['resources'];
                $this->queueModel->addTask( $newTask );
            }
        }
    }

    public function handleMainBuilding( )
    {
        if ( $this->isPost( ) && isset( $_POST['drbid'] ) && 19 <= intval( $_POST['drbid'] ) && intval( $_POST['drbid'] ) <= sizeof( $this->buildings ) && isset( $this->buildings[$_POST['drbid']] ) && 0 < $this->buildings[$_POST['drbid']]['level'] && !isset( $this->queueModel->tasksInQueue[QS_BUILD_DROP] ) && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
        {
            $item_id = $this->buildings[$_POST['drbid']]['item_id'];
            $calcConsume = intval( $this->gameMetadata['items'][$item_id]['levels'][$this->buildings[$_POST['drbid']]['level'] - 1]['time_consume'] / $this->gameSpeed * ( $this->data['time_consume_percent'] / 400 ) );
            $newTask = new QueueTask( QS_BUILD_DROP, $this->player->playerId, $calcConsume );
            $newTask->villageId = $this->data['selected_village_id'];
            $newTask->buildingId = $item_id;
            $newTask->procParams = $this->buildings[$_POST['drbid']]['index'];
            $this->queueModel->addTask( $newTask );
        }
        else
        {
            if ( !$this->isGameOver( ) )
            {
                $this->queueModel->cancelTask( $this->player->playerId, intval( $_GET['qid'] ) );
            }
        }
    }

    public function handleRallyPoint( )
    {
        if ( isset( $_GET['d'] ) )
        {
            $this->queueModel->cancelTask( $this->player->playerId, intval( $_GET['d'] ) );
        }
        $this->rallyPointProperty = array( "troops_in_village" => array( "troopsTable" => $this->_getTroopsList( "troops_num" ), "troopsIntrapTable" => $this->_getTroopsList( "troops_intrap_num" ) ), "troops_out_village" => array( "troopsTable" => $this->_getTroopsList( "troops_out_num" ), "troopsIntrapTable" => $this->_getTroopsList( "troops_out_intrap_num" ) ), "troops_in_oases" => array( ), "war_to_village" => $this->queueModel->tasksInQueue['war_troops']['to_village'], "war_from_village" => $this->queueModel->tasksInQueue['war_troops']['from_village'], "war_to_oasis" => $this->queueModel->tasksInQueue['war_troops']['to_oasis'] );
        $village_oases_id = trim( $this->data['village_oases_id'] );
        if ( $village_oases_id != "" )
        {
            $m = new BuildModel( );
            $result = $m->getOasesDataById( $village_oases_id );
            while ( $result->next( ) )
            {
                $this->rallyPointProperty['troops_in_oases'][$result->row['id']] = array( "oasisRow" => $result->row, "troopsTable" => $this->_getOasisTroopsList( $result->row['troops_num'] ), "war_to" => isset( $this->rallyPointProperty['war_to_oasis'][$result->row['id']] ) ? $this->rallyPointProperty['war_to_oasis'][$result->row['id']] : NULL );
            }
            $m->dispose( );
        }
    }

    public function _canCancelWarTask( $taskType, $taskId )
    {
        if ( !( $taskType ) )
        {
            return FALSE;
        }
        $timeout = ( $taskType );
        if ( 0 - 1 < $timeout )
        {
            $_task = NULL;
            foreach ( $this->queueModel->tasksInQueue[$taskType] as $t )
            {
                if ( $t['id'] == $taskId )
                {
                    $_task = $t;
                    break;
                    break;
                }
            }
            if ( $_task == NULL )
            {
                return FALSE;
            }
            $elapsedTime = $t['elapsedTime'];
            if ( $timeout < $elapsedTime )
            {
                return FALSE;
            }
        }
        return TRUE;
    }

    public function _getOasisTroopsList( $troops_num )
    {
        $GameMetadata = $GLOBALS['GameMetadata'];
        $m = new BuildModel( );
        $returnTroops = array( );
        if ( trim( $troops_num ) != "" )
        {
            $t_arr = explode( "|", $troops_num );
            foreach ( $t_arr as $t_str )
            {
                $t2_arr = explode( ":", $t_str );
                $vid = $t2_arr[0];
                $villageData = $m->getVillageData2ById( $vid );
                $returnTroops[$vid] = array( "villageData" => $villageData, "cropConsumption" => 0, "hasHero" => FALSE, "troops" => array( ) );
                $t2_arr = explode( ",", $t2_arr[1] );
                foreach ( $t2_arr as $t2_str )
                {
                    $tnum = explode( " ", $t2_str[1] );
                    $tid = explode( " ", $t2_str[0] );
                    if ( $tid == 99 )
                    {
                        continue;
                    }
                    if ( $tnum == 0 - 1 )
                    {
                        $tnum = 1;
                        $returnTroops[$vid]['hasHero'] = TRUE;
                    }
                    else
                    {
                        $returnTroops[$vid]['troops'][$tid] = $tnum;
                    }
                    $returnTroops[$vid] += "cropConsumption";
                }
            }
        }
        $m->dispose( );
        return $returnTroops;
    }

    public function _getTroopsList( $key )
    {
        $GameMetadata = $GLOBALS['GameMetadata'];
        $m = new BuildModel( );
        $returnTroops = array( );
        if ( trim( $this->data[$key] ) != "" )
        {
            $t_arr = explode( "|", $this->data[$key] );
            foreach ( $t_arr as $t_str )
            {
                $t2_arr = explode( ":", $t_str );
                $vid = intval( $t2_arr[0] );
                $villageData = NULL;
                if ( $vid == 0 - 1 )
                {
                    $vid = $this->data['selected_village_id'];
                    $villageData = array( "id" => $vid, "village_name" => $this->data['village_name'], "player_id" => $this->player->playerId, "player_name" => buildings_p_thisvillage );
                }
                else
                {
                    $villageData = $m->getVillageData2ById( $vid );
                }
                $returnTroops[$vid] = array( "villageData" => $villageData, "cropConsumption" => 0, "hasHero" => FALSE, "troops" => array( ) );
                if ( $vid == $Var_1752['selected_village_id'] )
                {
                    $returnTroops[$vid]['hasHero'] = intval( $this->data['hero_in_village_id'] ) == intval( $this->data['selected_village_id'] );
                    if ( $returnTroops[$vid]['hasHero'] )
                    {
                        $returnTroops[$vid] += "cropConsumption";
                    }
                }
                $t2_arr = explode( ",", $t2_arr[1] );
                foreach ( $t2_arr as $t2_str )
                {
                    $tnum = explode( " ", $t2_str[1] );
                    $tid = explode( " ", $t2_str[0] );
                    if ( $tid == 99 )
                    {
                        continue;
                    }
                    if ( $tnum == 0 - 1 )
                    {
                        $tnum = 1;
                        $returnTroops[$vid]['hasHero'] = TRUE;
                    }
                    else
                    {
                        $returnTroops[$vid]['troops'][$tid] = $tnum;
                    }
                    $returnTroops[$vid] += "cropConsumption";
                }
            }
        }
        $m->dispose( );
        return $returnTroops;
    }

    public function handleMarketplace( )
    {
        $this->selectedTabIndex = isset( $_GET['t'] ) && is_numeric( $_GET['t'] ) && 1 <= intval( $_GET['t'] ) && intval( $_GET['t'] ) <= 3 ? intval( $_GET['t'] ) : 0;
        $itemId = $this->buildings[$this->buildingIndex]['item_id'];
        $itemLevel = $this->buildings[$this->buildingIndex]['level'];
        $tribeMetadata = $this->gameMetadata['tribes'][$this->data['tribe_id']];
        $tradeOfficeLevel = $this->_getMaxBuildingLevel( 28 );
        $capacityFactor = $tradeOfficeLevel == 0 ? 1 : $this->gameMetadata['items'][28]['levels'][$tradeOfficeLevel - 1]['value'] / 100;
        $capacityFactor *= $this->gameMetadata['game_speed'];
        $total_merchants_num = $this->gameMetadata['items'][$itemId]['levels'][$itemLevel - 1]['value'];
        $exist_num = $total_merchants_num - $this->queueModel->tasksInQueue['out_merchants_num'] - $this->data['offer_merchants_count'];
        if ( $exist_num < 0 )
        {
            $exist_num = 0;
        }
        $this->merchantProperty = array( "speed" => $tribeMetadata['merchants_velocity'] * $this->gameMetadata['game_speed'], "capacity" => floor( $tribeMetadata['merchants_capacity'] * $capacityFactor ), "total_num" => $total_merchants_num, "exits_num" => $exist_num, "confirm_snd" => FALSE, "same_village" => FALSE, "vRow" => NULL );
        if ( $this->selectedTabIndex == 0 )
        {
            $m = new BuildModel( );
            if ( $this->isPost( ) || isset( $_GET['vid2'] ) )
            {
                $resources = array( "1" => isset( $_POST['r1'] ) ? intval( $_POST['r1'] ) : 0, "2" => isset( $_POST['r2'] ) ? intval( $_POST['r2'] ) : 0, "3" => isset( $_POST['r3'] ) ? intval( $_POST['r3'] ) : 0, "4" => isset( $_POST['r4'] ) ? intval( $_POST['r4'] ) : 0 );
                $this->merchantProperty['confirm_snd'] = $this->isPost( ) ? isset( $_POST['act'] ) && $_POST['act'] == 1 : isset( $_GET['vid2'] );
                $map_size = $this->setupMetadata['map_size'];
                $doSend = FALSE;
                if ( $this->merchantProperty['confirm_snd'] )
                {
                    $vRow = NULL;
                    if ( trim( $_POST['y'] ) != "" )
                    {
                        $vid = $this->__getVillageId( $map_size, $this->__getCoordInRange( $map_size, intval( $_POST['x'] ) ), $this->__getCoordInRange( $map_size, intval( $_POST['y'] ) ) );
                        $vRow = $m->getVillageDataById( $vid );
                    }
                    else
                    {
                        if ( isset( $_POST['vname'] ) && trim( $_POST['vname'] ) != "" )
                        {
                            $vRow = $m->getVillageDataByName( trim( $_POST['vname'] ) );
                        }
                        else
                        {
                            if ( isset( $_GET['vid2'] ) )
                            {
                                $vRow = $m->getVillageDataById( intval( $_GET['vid2'] ) );
                                if ( $vRow != NULL )
                                {
                                    $_POST['x'] = $vRow['rel_x'];
                                    $_POST['y'] = $vRow['rel_y'];
                                }
                            }
                        }
                    }
                }
                else
                {
                    $doSend = TRUE;
                    $vRow = $m->getVillageDataById( intval( $_POST['vid2'] ) );
                    $this->merchantProperty['showError'] = FALSE;
                    $_POST['r1'] = $_POST['r2'] = $_POST['r3'] = $_POST['r4'] = "";
                }
                if ( 0 < intval( $vRow['player_id'] ) && $m->getPlayType( intval( $vRow['player_id'] ) ) == PLAYERTYPE_ADMIN )
                {
                    $this->merchantProperty['showError'] = FALSE;
                    $this->merchantProperty['confirm_snd'] = FALSE;
                }
                else
                {
                    $this->merchantProperty['vRow'] = $vRow;
                    $vid = $this->merchantProperty['to_vid'] = $vRow != NULL ? $vRow['id'] : 0;
                    $rel_x = $vRow['rel_x'];
                    $rel_y = $vRow['rel_y'];
                    $this->merchantProperty['same_village'] = $vid == $this->data['selected_village_id'];
                    $this->merchantProperty['available_res'] = $this->isResourcesAvailable( $resources );
                    $this->merchantProperty['vRow_merchant_num'] = ceil( ( $resources[1] + $resources[2] + $resources[3] + $resources[4] ) / $this->merchantProperty['capacity'] );
                    $this->merchantProperty['confirm_snd'] = 0 < $vid && $this->merchantProperty['available_res'] && 0 < $this->merchantProperty['vRow_merchant_num'] && $this->merchantProperty['vRow_merchant_num'] <= $this->merchantProperty['exits_num'] && !$this->merchantProperty['same_village'];
                    $this->merchantProperty['showError'] = !$this->merchantProperty['confirm_snd'];
                    $distance = WebHelper::getDistance( $this->data['rel_x'], $this->data['rel_y'], $rel_x, $rel_y, $this->setupMetadata['map_size'] / 2 );
                    $this->merchantProperty['vRow_time'] = intval( $distance / $this->merchantProperty['speed'] * 3600 );
                    if ( !$this->merchantProperty['showError'] && $doSend && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
                    {
                        $this->merchantProperty['confirm_snd'] = FALSE;
                        $this->merchantProperty -= "exits_num";
                        $newTask = new QueueTask( QS_MERCHANT_GO, $this->player->playerId, $this->merchantProperty['vRow_time'] );
                        $newTask->villageId = $this->data['selected_village_id'];
                        $newTask->toPlayerId = $vRow['player_id'];
                        $newTask->toVillageId = $vid;
                        $newTask->procParams = $this->merchantProperty['vRow_merchant_num']."|".( $resources[1]." ".$resources[2]." ".$resources[3]." ".$resources[4] );
                        $newTask->tag = $resources;
                        $this->queueModel->addTask( $newTask );
                    }
                }
            }
            $m->dispose( );
        }
        else if ( $this->selectedTabIndex == 1 )
        {
            $m = new BuildModel( );
            $showOfferList = TRUE;
            if ( isset( $_GET['oid'] ) && 0 < intval( $_GET['oid'] ) )
            {
                $oRow = $m->getOffer2( intval( $_GET['oid'] ), $this->data['rel_x'], $this->data['rel_y'], $this->setupMetadata['map_size'] / 2 );
                if ( $oRow != NULL )
                {
                    $aid = 0;
                    if ( $oRow['alliance_only'] && 0 < intval( $this->data['alliance_id'] ) )
                    {
                        $aid = $m->getPlayerAllianceId( $oRow['player_id'] );
                    }
                    $res2 = explode( "|", $oRow['offer'][1] );
                    $res1 = explode( "|", $oRow['offer'][0] );
                    $resArr1 = explode( " ", $res1 );
                    $needResources = array( "1" => $resArr1[0], "2" => $resArr1[1], "3" => $resArr1[2], "4" => $resArr1[3] );
                    $res1_item_id = 0;
                    $res1_value = 0;
                    $i = 0;
                    $_c = sizeof( $resArr1 );
                    while ( $i < $_c )
                    {
                        if ( 0 < $resArr1[$i] )
                        {
                            $res1_item_id = $i + 1;
                            $res1_value = $resArr1[$i];
                            break;
                        }
                        ++$i;
                    }
                    $resArr1 = explode( " ", $res2 );
                    $giveResources = array( "1" => $resArr1[0], "2" => $resArr1[1], "3" => $resArr1[2], "4" => $resArr1[3] );
                    $res2_item_id = 0;
                    $res2_value = 0;
                    $i = 0;
                    $_c = sizeof( $resArr1 );
                    while ( $i < $_c )
                    {
                        if ( 0 < $resArr1[$i] )
                        {
                            $res2_item_id = $i + 1;
                            $res2_value = $resArr1[$i];
                            break;
                        }
                        ++$i;
                    }
                    $distance = $oRow['timeInSeconds'] / 3600 * $oRow['merchants_speed'];
                    $acceptResult = $this->_canAcceptOffer( $needResources, $giveResources, $oRow['village_id'], $oRow['alliance_only'], $aid, $oRow['max_time'], $distance );
                    if ( $acceptResult == 5 && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
                    {
                        $showOfferList = FALSE;
                        $this->merchantProperty['offerProperty'] = array( "player_id" => $oRow['player_id'], "player_name" => $oRow['player_name'], "res1_item_id" => $res1_item_id, "res1_value" => $res1_value, "res2_item_id" => $res2_item_id, "res2_value" => $res2_value );
                        $merchantNum = ceil( ( $giveResources[1] + $giveResources[2] + $giveResources[3] + $giveResources[4] ) / $this->merchantProperty['capacity'] );
                        $newTask = new QueueTask( QS_MERCHANT_GO, $this->player->playerId, $distance / ( $this->gameMetadata['tribes'][$this->data['tribe_id']]['merchants_velocity'] * $this->gameMetadata['game_speed'] ) * 3600 );
                        $newTask->villageId = $this->data['selected_village_id'];
                        $newTask->toPlayerId = $oRow['player_id'];
                        $newTask->toVillageId = $oRow['village_id'];
                        $newTask->procParams = $merchantNum."|".( $giveResources[1]." ".$giveResources[2]." ".$giveResources[3]." ".$giveResources[4] );
                        $newTask->tag = $giveResources;
                        $this->queueModel->addTask( $newTask );
                        $newTask = new QueueTask( QS_MERCHANT_GO, $oRow['player_id'], $oRow['timeInSeconds'] );
                        $newTask->villageId = $oRow['village_id'];
                        $newTask->toPlayerId = $this->player->playerId;
                        $newTask->toVillageId = $this->data['selected_village_id'];
                        $newTask->procParams = $oRow['merchants_num']."|".( $needResources[1]." ".$needResources[2]." ".$needResources[3]." ".$needResources[4] );
                        $newTask->tag = array( "1" => 0, "2" => 0, "3" => 0, "4" => 0 );
                        $this->queueModel->addTask( $newTask );
                        $m->removeMerchantOffer( intval( $_GET['oid'] ), $oRow['player_id'], $oRow['village_id'] );
                    }
                }
            }
            $this->merchantProperty['showOfferList'] = $showOfferList;
            if ( $showOfferList )
            {
                $this->pageCount = 0 < $rowsCount ? ceil( $rowsCount / $this->pageSize ) : 1;
                $this->pageIndex = isset( $_GET['p'] ) && is_numeric( $_GET['p'] ) && intval( $_GET['p'] ) < $this->pageCount ? intval( $_GET['p'] ) : 0;
                $this->merchantProperty['all_offers'] = $m->getAllOffers( $this->data['selected_village_id'], $this->data['rel_x'], $this->data['rel_y'], $this->setupMetadata['map_size'] / 2, $this->gameMetadata['tribes'][$this->data['tribe_id']]['merchants_velocity'] * $this->gameMetadata['game_speed'], $this->pageIndex, $this->pageSize );
            }
            $m->dispose( );
        }
        else
        {
            if ( $this->selectedTabIndex == 2 )
            {
                $m = new BuildModel( );
                $this->merchantProperty['showError'] = FALSE;
                $this->merchantProperty['showError3'] = FALSE;
                if ( $this->isPost( ) )
                {
                    if ( 0 < intval( $_POST['rid2'] ) )
                    {
                        $resources1 = array( "1" => isset( $_POST['rid1'] ) && intval( $_POST['rid1'] ) == 1 ? intval( $_POST['m1'] ) : 0, "2" => isset( $_POST['rid1'] ) && intval( $_POST['rid1'] ) == 2 ? intval( $_POST['m1'] ) : 0, "3" => isset( $_POST['rid1'] ) && intval( $_POST['rid1'] ) == 3 ? intval( $_POST['m1'] ) : 0, "4" => isset( $_POST['rid1'] ) && intval( $_POST['rid1'] ) == 4 ? intval( $_POST['m1'] ) : 0 );
                        $resources2 = array( "1" => isset( $_POST['rid2'] ) && intval( $_POST['rid2'] ) == 1 ? intval( $_POST['m2'] ) : 0, "2" => isset( $_POST['rid2'] ) && intval( $_POST['rid2'] ) == 2 ? intval( $_POST['m2'] ) : 0, "3" => isset( $_POST['rid2'] ) && intval( $_POST['rid2'] ) == 3 ? intval( $_POST['m2'] ) : 0, "4" => isset( $_POST['rid2'] ) && intval( $_POST['rid2'] ) == 4 ? intval( $_POST['m2'] ) : 0 );
                        if ( intval( $_POST['rid1'] ) == intval( $_POST['rid2'] ) || intval( $resources1[1] + $resources1[2] + $resources1[3] + $resources1[4] ) <= 0 || intval( $resources2[1] + $resources2[2] + $resources2[3] + $resources2[4] ) <= 0 )
                        {
                            $this->merchantProperty['showError'] = TRUE;
                        }
                        else if ( 10 < ceil( ( $resources2[1] + $resources2[2] + $resources2[3] + $resources2[4] ) / ( $resources1[1] + $resources1[2] + $resources1[3] + $resources1[4] ) ) )
                        {
                            $this->merchantProperty['showError'] = TRUE;
                            $this->merchantProperty['showError3'] = TRUE;
                        }
                        $this->merchantProperty['available_res'] = $this->isResourcesAvailable( $resources1 );
                        if ( $this->merchantProperty['available_res'] && !$this->merchantProperty['showError'] )
                        {
                            $this->merchantProperty['vRow_merchant_num'] = ceil( ( $resources1[1] + $resources1[2] + $resources1[3] + $resources1[4] ) / $this->merchantProperty['capacity'] );
                            if ( 0 < $this->merchantProperty['vRow_merchant_num'] && $this->merchantProperty['vRow_merchant_num'] <= $this->merchantProperty['exits_num'] )
                            {
                                $this->merchantProperty -= "exits_num";
                                $this->data += "offer_merchants_count";
                                $offer = $resources1[1]." ".$resources1[2]." ".$resources1[3]." ".$resources1[4]."|".( $resources2[1]." ".$resources2[2]." ".$resources2[3]." ".$resources2[4] );
                                $m->addMerchantOffer( $this->player->playerId, $this->data['name'], $this->data['selected_village_id'], $this->data['rel_x'], $this->data['rel_y'], $this->merchantProperty['vRow_merchant_num'], $offer, isset( $_POST['ally'] ), 0 < intval( $_POST['d2'] ) ? intval( $_POST['d2'] ) : 0, $this->gameMetadata['tribes'][$this->data['tribe_id']]['merchants_velocity'] * $this->gameMetadata['game_speed'] );
                                foreach ( $resources1 as $k => $v )
                                {
                                    $this->resources[$k] -= "current_value";
                                }
                                $this->queueModel->_updateVillage( FALSE, FALSE );
                            }
                            else
                            {
                                $this->merchantProperty['showError'] = TRUE;
                            }
                        }
                        else
                        {
                            $this->merchantProperty['showError'] = TRUE;
                        }
                    }
                    else
                    {
                        $this->merchantProperty['showError'] = TRUE;
                        $this->merchantProperty['showError2'] = TRUE;
                    }
                }
                else if ( isset( $_GET['d'] ) && 0 < intval( $_GET['d'] ) )
                {
                    $row = $m->getOffer( intval( $_GET['d'] ), $this->player->playerId, $this->data['selected_village_id'] );
                    if ( $row != NULL )
                    {
                        $this->merchantProperty += "exits_num";
                        $this->data -= "offer_merchants_count";
                        $resources2 = explode( "|", $row['offer'][1] );
                        $resources1 = explode( "|", $row['offer'][0] );
                        $resourcesArray1 = explode( " ", $resources1 );
                        $res = array( );
                        $i = 0;
                        $_c = sizeof( $resourcesArray1 );
                        while ( $i < $_c )
                        {
                            $res[$i + 1] = $resourcesArray1[$i];
                            ++$i;
                        }
                        foreach ( $res as $k => $v )
                        {
                            $this->resources[$k] += "current_value";
                        }
                        $this->queueModel->_updateVillage( FALSE, FALSE );
                        $m->removeMerchantOffer( intval( $_GET['d'] ), $this->player->playerId, $this->data['selected_village_id'] );
                    }
                }
                $this->merchantProperty['offers'] = $m->getOffers( $this->data['selected_village_id'] );
                $m->dispose( );
            }
            else
            {
                if ( $this->selectedTabIndex == 3 && $this->isPost( ) && isset( $_POST['m2'] ) && is_array( $_POST['m2'] ) && sizeof( $_POST['m2'] ) == 4 && $this->gameMetadata['plusTable'][6]['cost'] <= $this->data['gold_num'] )
                {
                    $resources = array( "1" => intval( $_POST['m2'][0] ), "2" => intval( $_POST['m2'][1] ), "3" => intval( $_POST['m2'][2] ), "4" => intval( $_POST['m2'][3] ) );
                    $oldSum = $this->resources[1]['current_value'] + $this->resources[2]['current_value'] + $this->resources[3]['current_value'] + $this->resources[4]['current_value'];
                    $newSum = $resources[1] + $resources[2] + $resources[3] + $resources[4];
                    if ( $newSum <= $oldSum )
                    {
                        foreach ( $resources as $k => $v )
                        {
                            $this->resources[$k]['current_value'] = $v;
                        }
                        $this->queueModel->_updateVillage( FALSE, FALSE );
                        $m = new BuildModel( );
                        $m->decreaseGoldNum( $this->player->playerId, $this->gameMetadata['plusTable'][6]['cost'] );
                        $m->dispose( );
                    }
                }
            }
        }
    }

    public function handleEmbassy( )
    {
        if ( 0 < intval( $this->data['alliance_id'] ) )
        {
        }
        else
        {
            $this->embassyProperty = array( "level" => $this->buildings[$this->buildingIndex]['level'], "invites" => NULL, "error" => 0, "ally1" => "", "ally2" => "" );
            $maxPlayers = $this->gameMetadata['items'][18]['levels'][$this->embassyProperty['level'] - 1]['value'];
            $this->embassyProperty['ally1'] = $ally1 = trim( $_POST['ally1'] );
            $this->embassyProperty['ally2'] = $ally2 = trim( $_POST['ally2'] );
            if ( $ally1 == "" || $ally2 == "" )
            {
                $this->embassyProperty['error'] = $ally1 == "" && $ally2 == "" ? 3 : $ally1 == "" ? 1 : 2;
            }
            else
            {
                $m = new BuildModel( );
                if ( !$m->allianceExists( $this->embassyProperty['ally1'] ) )
                {
                    $this->data['alliance_name'] = $this->embassyProperty['ally1'];
                    $this->data['alliance_id'] = $m->createAlliance( $this->player->playerId, $this->embassyProperty['ally1'], $this->embassyProperty['ally2'], $maxPlayers );
                    $m->dispose( );
                }
                else
                {
                    $this->embassyProperty['error'] = 4;
                    $m->dispose( );
                }
            }
            $invites_alliance_ids = trim( $this->data['invites_alliance_ids'] );
            $this->embassyProperty['invites'] = array( );
            if ( $invites_alliance_ids != "" )
            {
                $_arr = explode( "\n", $invites_alliance_ids );
                foreach ( $_arr as $_s )
                {
                    $allianceName = explode( " ", $_s[1], 2 );
                    $allianceId = explode( " ", $_s[0], 2 );
                    $this->embassyProperty['invites'][$allianceId] = $allianceName;
                }
            }
            if ( !$this->isPost( ) )
            {
                if ( isset( $_GET['a'] ) && 0 < intval( $_GET['a'] ) )
                {
                    $allianceId = intval( $_GET['a'] );
                    if ( isset( $this->embassyProperty['invites'][$allianceId] ) )
                    {
                        $m = new BuildModel( );
                        $acceptResult = $m->acceptAllianceJoining( $this->player->playerId, $allianceId );
                        if ( $acceptResult == 2 )
                        {
                            $this->data['alliance_name'] = $this->embassyProperty['invites'][$allianceId];
                            $this->data['alliance_id'] = $allianceId;
                            unset( $Var_4320['invites'][$allianceId] );
                            $m->removeAllianceInvites( $this->player->playerId, $allianceId );
                        }
                        else if ( $acceptResult == 1 )
                        {
                            $this->embassyProperty['error'] = 15;
                        }
                        $m->dispose( );
                    }
                }
                else
                {
                    if ( isset( $_GET['d'] ) && 0 < intval( $_GET['d'] ) )
                    {
                        $allianceId = intval( $_GET['d'] );
                        if ( isset( $this->embassyProperty['invites'][$allianceId] ) )
                        {
                            unset( $Var_5112['invites'][$allianceId] );
                            $m = new BuildModel( );
                            $m->removeAllianceInvites( $this->player->playerId, $allianceId );
                            $m->dispose( );
                        }
                    }
                }
            }
        }
    }

    public function handleWarrior( )
    {
        $itemId = $this->buildings[$this->buildingIndex]['item_id'];
        $this->troopsUpgrade = array( );
        $_arr = explode( ",", $this->data['troops_training'] );
        foreach ( $_arr as $troopStr )
        {
            $attack_level = explode( " ", $troopStr[3] );
            $defense_level = explode( " ", $troopStr[2] );
            $researches_done = explode( " ", $troopStr[1] );
            $troopId = explode( " ", $troopStr[0] );
            if ( $researches_done == 1 && 0 < $this->gameMetadata['troops'][$troopId]['gold_needed'] )
            {
                $this->troopsUpgrade[$troopId] = $troopId;
            }
        }
        $this->warriorMessage = "";
        if ( $this->isPost( ) && isset( $_POST['tf'] ) && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
        {
            $cropConsume = 0;
            $totalGoldsNeeded = 0;
            foreach ( $_POST['tf'] as $troopId => $num )
            {
                $num = intval( $num );
                if ( $num <= 0 || !isset( $this->troopsUpgrade[$troopId] ) )
                {
                    continue;
                }
                $totalGoldsNeeded += $this->gameMetadata['troops'][$troopId]['gold_needed'] * $num;
                $cropConsume += $this->gameMetadata['troops'][$troopId]['crop_consumption'] * $num;
            }
            if ( $totalGoldsNeeded <= 0 )
            {
            }
            else
            {
                $canProcess = $totalGoldsNeeded <= $this->data['gold_num'];
                $this->warriorMessage = $canProcess ? 1 : 2;
                if ( $canProcess )
                {
                    $troopsString = "";
                    foreach ( $this->troops as $tid => $num )
                    {
                        if ( $tid == 99 )
                        {
                            continue;
                        }
                        $neededNum = isset( $this->troopsUpgrade[$tid], $_POST['tf'][$tid] ) ? $_POST['tf'][$tid] : 0;
                        if ( $troopsString != "" )
                        {
                            $troopsString .= ",";
                        }
                        $troopsString .= $tid." ".$neededNum;
                    }
                    $m = new BuildModel( );
                    $m->decreaseGoldNum( $this->player->playerId, $totalGoldsNeeded );
                    $m->dispose( );
                    $this->data -= "gold_num";
                    $procParams = $troopsString."|0||||||1";
                    $buildingMetadata = $this->gameMetadata['items'][$this->buildProperties['building']['item_id']];
                    $bLevel = $this->buildings[$this->buildingIndex]['level'];
                    $needed_time = $buildingMetadata['levels'][$bLevel - 1]['value'] * 3600;
                    $newTask = new QueueTask( QS_WAR_REINFORCE, 0, $needed_time );
                    $newTask->toPlayerId = $this->player->playerId;
                    $newTask->toVillageId = $this->data['selected_village_id'];
                    $newTask->procParams = $procParams;
                    $newTask->tag = array( "troops" => NULL, "hasHero" => FALSE, "resources" => NULL, "troopsCropConsume" => $cropConsume );
                    $this->queueModel->addTask( $newTask );
                }
            }
        }
    }

	public function handleTroopBuilding(){
		$itemId = $this->buildings[$this->buildingIndex]['item_id'];
        $this->troopsUpgradeType = QS_TROOP_TRAINING;
        //$this->troopsUpgrade = $Tmp_9;
        $this->troopsUpgrade = QS_TROOP_TRAINING;
        $_arr = explode( ",", $this->data['troops_training'] );
        foreach ( $_arr as $troopStr )
        {
            $attack_level = explode( " ", $troopStr[3] );
            $defense_level = explode( " ", $troopStr[2] );
            $researches_done = explode( " ", $troopStr[1] );
            $troopId = explode( " ", $troopStr[0] );
            if ( $researches_done == 1 && $this->_canTrainInBuilding( $troopId, $itemId ) )
            {
                $this->troopsUpgrade[$troopId] = $troopId;
            }
        }
        if ( $this->isPost( ) && $Tmp_50 && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
        {
            foreach ( $_POST['tf'] as $troopId => $num )
            {
                $num = intval( $num );
                if ( $num <= 0 || !isset( $this->troopsUpgrade[$troopId] ) || $this->_getMaxTrainNumber( $troopId, $itemId ) < $num )
                {
                    continue;
                }
                $timeFactor = 1;
                if ( $this->gameMetadata['troops'][$troopId]['is_cavalry'] == TRUE )
                {
                    $flvl = $this->_getMaxBuildingLevel( 41 );
                    if ( 0 < $flvl )
                    {
                        $timeFactor -= $this->gameMetadata['items'][41]['levels'][$flvl - 1]['value'] / 100;
                    }
                }
                $troopMetadata = $this->gameMetadata['troops'][$troopId];
                $calcConsume = intval( $troopMetadata['training_time_consume'] / $this->gameSpeed * ( 10 / ( $this->buildProperties['building']['level'] + 9 ) ) * $timeFactor );
                $newTask = new QueueTask( $this->troopsUpgradeType, $this->player->playerId, $calcConsume );
                $newTask->threads = $num;
                $newTask->villageId = $this->data['selected_village_id'];
                $newTask->buildingId = $this->buildProperties['building']['item_id'];
                $newTask->procParams = $troopId;
                $newTask->tag = array( "1" => $troopMetadata['training_resources'][1] * $this->buildingTribeFactor * $num, "2" => $troopMetadata['training_resources'][2] * $this->buildingTribeFactor * $num, "3" => $troopMetadata['training_resources'][3] * $this->buildingTribeFactor * $num, "4" => $troopMetadata['training_resources'][4] * $this->buildingTribeFactor * $num );
                $this->queueModel->addTask( $newTask );
            }
        }
    }

    public function handleAcademy( )
    {
        $this->troopsUpgradeType = QS_TROOP_RESEARCH;
        $this->troopsUpgrade = array( "available" => array( ), "soon" => array( ) );
        $_arr = explode( ",", $this->data['troops_training'] );
        foreach ( $_arr as $troopStr )
        {
            $attack_level = explode( " ", $troopStr[3] );
            $defense_level = explode( " ", $troopStr[2] );
            $researches_done = explode( " ", $troopStr[1] );
            $troopId = explode( " ", $troopStr[0] );
            if ( $researches_done == 0 )
            {
                $this->troopsUpgrade[$this->_canDoResearches( $troopId ) ? "available" : "soon"][] = $troopId;
            }
        }
        if ( $_GET['k'] == $this->data['update_key'] && !isset( $this->queueModel->tasksInQueue[$this->troopsUpgradeType] ) && $this->_canDoResearches( intval( $_GET['a'] ) ) && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
        {
            $troopId = intval( $_GET['a'] );
            $buildingMetadata = $this->gameMetadata['troops'][$troopId];
            return;
            $calcConsume = intval( $buildingMetadata['research_time_consume'] / $this->gameSpeed );
            $newTask = new QueueTask( $this->troopsUpgradeType, $this->player->playerId, $calcConsume );
            $newTask->villageId = $this->data['selected_village_id'];
            $newTask->procParams = $troopId;
            $newTask->tag = $buildingMetadata['research_resources'];
            $this->queueModel->addTask( $newTask );
        }
    }

    public function handleTownHall( )
    {
        $buildingMetadata = $this->gameMetadata['items'][$this->buildProperties['building']['item_id']];
        $bLevel = $this->buildings[$this->buildingIndex]['level'];
        if ( $_GET['k'] == $this->data['update_key'] && !isset( $this->queueModel->tasksInQueue[QS_TOWNHALL_CELEBRATION] ) && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
        {
            if ( intval( $_GET['a'] ) < 1 || 2 < intval( $_GET['a'] ) || intval( $_GET['a'] ) == 1 && $bLevel < $buildingMetadata['celebrations']['small']['level'] || intval( $_GET['a'] ) == 2 && $bLevel < $buildingMetadata['celebrations']['large']['level'] )
            {
            }
            else
            {
                $key = intval( $_GET['a'] ) == 2 ? "large" : "small";
                if ( !$this->isResourcesAvailable( $buildingMetadata['celebrations'][$key]['resources'] ) )
                {
                }
                else
                {
                    $calcConsume = intval( $buildingMetadata['celebrations'][$key]['time_consume'] / $this->gameSpeed * ( 10 / ( $bLevel + 9 ) ) );
                    //( QS_TOWNHALL_CELEBRATION, $this->player->playerId, $calcConsume );
                    //( QS_TOWNHALL_CELEBRATION, $this->player->playerId, $calcConsume );
                    $newTask->villageId = $this->data['selected_village_id'];
                    $newTask->procParams = intval( $_GET['a'] );
                    $newTask->tag = $buildingMetadata['celebrations'][$key]['resources'];
                    $this->queueModel->addTask( $newTask );
                }
            }
        }
    }

	/*public function handleResidencePalace( ){
		$this->selectedTabIndex = is_numeric($_GET['t']) && 1 <= intval( $_GET['t'] ) && intval( $_GET['t'] ) <= 3 ? intval( $_GET['t'] ) : 0;
        $_bid_ = $this->buildings[$this->buildingIndex]['item_id'];
        if ( $this->selectedTabIndex == 0 )
        {
            if ( isset( $_GET['mc'] ) && !$this->data['is_capital'] && !$this->data['is_special_village'] && $_bid_ == 26 )
            {
                $this->data['is_capital'] = TRUE;
                $m = new BuildModel( );
                $m->makeVillageAsCapital( $this->player->playerId, $this->data['selected_village_id'] );
                $m->dispose( );
            }
            $this->childVillagesCount = 0;
            if ( trim( $this->data['child_villages_id'] ) != "" )
            {
                $this->childVillagesCount = sizeof( explode( ",", $this->data['child_villages_id'] ) );
            }
            $itemId = $this->buildings[$this->buildingIndex]['item_id'];
            $buildingLevel = $this->buildings[$this->buildingIndex]['level'];
            $this->troopsUpgradeType = QS_TROOP_TRAINING;
            $this->_getOnlyMyTroops( );
            $this->troopsUpgrade = array( );
            $_arr = explode( ",", $this->data['troops_training'] );
            foreach ( $_arr as $troopStr )
            {
                $attack_level = explode( " ", $troopStr[3] );
                $defense_level = explode( " ", $troopStr[2] );
                $researches_done = explode( " ", $troopStr[1] );
                $troopId = explode( " ", $troopStr[0] );
                if ( $researches_done == 1 && $this->_canTrainInBuilding( $troopId, $itemId ) )
                {
                    $this->troopsUpgrade[] = array( "troopId" => $troopId, "maxNumber" => $this->_getMaxTrainNumber( $troopId, $itemId ), "currentNumber" => $this->_getCurrentNumberFor( $troopId, $itemId ) );
                }
            }
            $this->showBuildingForm = FALSE;
            if ( $buildingLevel < 10 || 2 <= $this->childVillagesCount && $_bid_ == 25 || 3 <= $this->childVillagesCount && $_bid_ == 26 || $this->childVillagesCount == 1 && $buildingLevel < 20 && $_bid_ == 25 || $this->childVillagesCount == 1 && $buildingLevel < 15 && $_bid_ == 26 || $this->childVillagesCount == 2 && $buildingLevel < 20 && $_bid_ == 26 )
            {
                $this->troopsUpgrade = array( );
            }
            else
            {
                if ( 1 < sizeof( $this->troopsUpgrade ) )
                {
                    if ( 1 <= $this->troopsUpgrade[0]['currentNumber'] || 3 <= $this->troopsUpgrade[1]['currentNumber'] )
                    {
                        $this->troopsUpgrade = array( );
                    }
                    else
                    {
                        if ( 0 < $this->troopsUpgrade[1]['currentNumber'] )
                        {
                            unset( $Var_4224[0] );
                        }
                    }
                }
                else if ( 3 <= $this->troopsUpgrade[0]['currentNumber'] )
                {
                    $this->troopsUpgrade = array( );
                }
                $this->showBuildingForm = 0 < sizeof( $this->troopsUpgrade );
            }
            if ( $this->isPost( ) && isset( $_POST['tf'] ) && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
            {
                foreach ( $_POST['tf'] as $troopId => $num )
                {
                    $num = intval( $num );
                    $existsTroop = FALSE;
                    foreach ( $this->troopsUpgrade as $troop )
                    {
                        if ( $troop['troopId'] == $troopId )
                        {
                            $existsTroop = TRUE;
                            break;
                            break;
                        }
                    }
                    if ( $num <= 0 || !$existsTroop || $this->_getMaxTrainNumber( $troopId, $itemId ) < $num )
                    {
                        continue;
                    }
                    $troopMetadata = $this->gameMetadata['troops'][$troopId];
                    $calcConsume = intval( $troopMetadata['training_time_consume'] / $this->gameSpeed * ( 10 / ( $this->buildProperties['building']['level'] + 9 ) ) );
                    $newTask = new QueueTask( $this->troopsUpgradeType, $this->player->playerId, $calcConsume );
                    $newTask->threads = $num;
                    $newTask->villageId = $this->data['selected_village_id'];
                    $newTask->buildingId = $this->buildProperties['building']['item_id'];
                    $newTask->procParams = $troopId;
                    $newTask->tag = $troopMetadata['training_resources'];
                    $this->queueModel->addTask( $newTask );
                }
            }
        }
        else
        {
            if ( $this->selectedTabIndex == 1 )
            {
                $this->neededCpValue = $this->totalCpRate = $this->totalCpValue = 0;
                $m = new BuildModel( );
                $result = $m->getVillagesCp( $this->data['villages_id'] );
                while ( $result->next( ) )
                {
                    $cpRate = explode( " ", $result->row['cp'][1] );
                    $this->cpValue = explode( " ", $result->row['cp'][0] );
                    //$ && _39643752 += "cpValue";
                    //$ && _39643848 += "totalCpRate";
                    //$ && _39643880 += "totalCpValue";
                    //$ && _39643880 += "neededCpValue";
                }
                $this->totalCpValue = floor( $this->totalCpValue );
                $m->dispose( );
            }
            else
            {
                if ( $this->selectedTabIndex == 3 )
                {
                    $this->childVillages = array( );
                    $m = new BuildModel( );
                    $result = $m->getChildVillagesFor( trim( $this->data['child_villages_id'] ) );
                    while ( $result != NULL && $result->next( ) )
                    {
                        $this->childVillages[$result->row['id']] = array( "id" => $result->row['id'], "rel_x" => $result->row['rel_x'], "rel_y" => $result->row['rel_y'], "village_name" => $result->row['village_name'], "people_count" => $result->row['people_count'], "creation_date" => $result->row['creation_date'] );
                    }
                    $m->dispose( );
                }
            }
        }
    }*/

    public function handleHerosMansion( )
    {
        $this->selectedTabIndex = isset( $_GET['t'] ) && is_numeric( $_GET['t'] ) && intval( $_GET['t'] ) == 1 ? intval( $_GET['t'] ) : 0;
        if ( $this->selectedTabIndex == 0 )
        {
            $this->hasHero = 0 < intval( $this->data['hero_troop_id'] );
            $this->troopsUpgradeType = QS_TROOP_TRAINING_HERO;
            if ( !$this->hasHero )
            {
                $this->_getOnlyMyTroops( TRUE );
                if ( $_GET['k'] == $this->data['update_key'] && !isset( $this->queueModel->tasksInQueue[$this->troopsUpgradeType] ) && isset( $this->troops[intval( $_GET['a'] )] ) && 0 < $this->troops[intval( $_GET['a'] )] && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
                {
                    $troopId = intval( $_GET['a'] );
                    $troopMetadata = $this->gameMetadata['troops'][$troopId];
                    $nResources = array( "1" => $troopMetadata['training_resources'][1] * 2, "2" => $troopMetadata['training_resources'][2] * 2, "3" => $troopMetadata['training_resources'][3] * 2, "4" => $troopMetadata['training_resources'][4] * 2 );
                    if ( !$this->isResourcesAvailable( $nResources ) )
                    {
                    }
                    else
                    {
                        $calcConsume = intval( $troopMetadata['training_time_consume'] / $this->gameSpeed * ( 10 / ( $this->buildProperties['building']['level'] + 9 ) ) ) * 12;
                        $newTask = new QueueTask( $this->troopsUpgradeType, $this->player->playerId, $calcConsume );
                        $newTask->procParams = $troopId." ".$this->data['selected_village_id'];
                        $newTask->tag = $nResources;
                        $this->queueModel->addTask( $newTask );
                    }
                }
            }
            else
            {
                if ( $this->isPost( ) && isset( $_POST['hname'] ) && trim( $_POST['hname'] ) != "" )
                {
                    $this->data['hero_name'] = trim( $_POST['hname'] );
                    $m = new BuildModel( );
                    $m->changeHeroName( $this->player->playerId, $this->data['hero_name'] );
                    $m->dispose( );
                }
            }
        }
        else
        {
            if ( $this->selectedTabIndex == 1 )
            {
                $this->villageOases = array( );
                $m = new BuildModel( );
                $result = $m->getVillageOases( trim( $this->data['village_oases_id'] ) );
                while ( $result != NULL && $result->next( ) )
                {
                    $this->villageOases[$result->row['id']] = array( "id" => $result->row['id'], "rel_x" => $result->row['rel_x'], "rel_y" => $result->row['rel_y'], "image_num" => $result->row['image_num'], "allegiance_percent" => $result->row['allegiance_percent'] );
                }
                $m->dispose( );
                if ( !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
                {
                    $oasisId = intval( $_GET['a'] );
                    $newTask = new QueueTask( QS_LEAVEOASIS, $this->player->playerId, floor( 21600 / $this->gameSpeed ) );
                    $newTask->villageId = $this->data['selected_village_id'];
                    $newTask->buildingId = $oasisId;
                    $newTask->procParams = $this->villageOases[$oasisId]['rel_x']." ".$this->villageOases[$oasisId]['rel_y'];
                    $this->queueModel->addTask( $newTask );
                }
                else
                {
                    if ( isset( $_GET['qid'] ) && 0 < intval( $_GET['qid'] ) )
                    {
                        $this->queueModel->cancelTask( $this->player->playerId, intval( $_GET['qid'] ) );
                    }
                }
            }
        }
    }

    public function preRender( )
    {
        //( );
        if ( isset( $_GET['p'] ) )
        {
            //$ && _41448384 .= "villagesLinkPostfix";
        }
        if ( isset( $_GET['vid2'] ) )
        {
            //$ && _41448784 .= "villagesLinkPostfix";
        }
        if ( 0 < $this->selectedTabIndex )
        {
           // $ && _41448984 .= "villagesLinkPostfix";
        }
    }

    public function __getCoordInRange( $map_size, $x )
    {
        if ( $map_size <= $x )
        {
            $x -= $map_size;
        }
        else if ( $x < 0 )
        {
            $x = $map_size + $x;
        }
        return $x;
    }

    public function __getVillageId( $map_size, $x, $y )
    {
        return $x * $map_size + ( $y + 1 );
    }

    public function _getOnlyMyOuterTroops( )
    {
        $returnTroops = array( );
        if ( trim( $this->data['troops_out_num'] ) != "" )
        {
            $t_arr = explode( "|", $this->data['troops_out_num'] );
            foreach ( $t_arr as $t_str )
            {
                $t2_arr = explode( ":", $t_str );
                $t2_arr = explode( ",", $t2_arr[1] );
                foreach ( $t2_arr as $Var_720 )
                {
                    $t = explode( " ", $t2_str );
                    if ( $t[1] == 0 - 1 )
                    {
                        continue;
                    }
                    if ( isset( $returnTroops[$t[0]] ) )
                    {
                        $returnTroops += $t[0];
                    }
                    else
                    {
                        $returnTroops[$t[0]] = $t[1];
                    }
                }
            }
        }
        if ( trim( $this->data['troops_out_intrap_num'] ) != "" )
        {
            $t_arr = explode( "|", $this->data['troops_out_intrap_num'] );
            foreach ( $t_arr as $t_str )
            {
                $t2_arr = explode( ":", $t_str );
                $t2_arr = explode( ",", $t2_arr[1] );
                foreach ( $t2_arr as $t2_str )
                {
                    $t = explode( " ", $t2_str );
                    if ( $t[1] == 0 - 1 )
                    {
                        continue;
                    }
                    if ( isset( $returnTroops[$t[0]] ) )
                    {
                        $returnTroops += $t[0];
                    }
                    else
                    {
                        $returnTroops[$t[0]] = $t[1];
                    }
                }
            }
        }
        return $returnTroops;
    }

    public function _getOnlyMyTroops( $toBeHero = FALSE )
    {
        $t_arr = explode( "|", $this->data['troops_num'] );
        foreach ( $t_arr as $t_str )
        {
            $t2_arr = explode( ":", $t_str );
            if ( $t2_arr[0] == 0 - 1 )
            {
                $t2_arr = explode( ",", $t2_arr[1] );
                foreach ( $t2_arr as $t2_str )
                {
                    $t = explode( " ", $t2_str );
                    if ( $toBeHero && ( $t[0] == 99 || $t[0] == 7 || $t[0] == 8 || $t[0] == 9 || $t[0] == 10 || $t[0] == 17 || $t[0] == 18 || $t[0] == 19 || $t[0] == 20 || $t[0] == 27 || $t[0] == 28 || $t[0] == 29 || $t[0] == 30 || $t[0] == 106 || $t[0] == 107 || $t[0] == 108 || $t[0] == 109 || $t[0] == 57 || $t[0] == 58 || $t[0] == 59 || $t[0] == 60 ) )
                    {
                        continue;
                    }
                    if ( isset( $this->troops[$t[0]] ) )
                    {
                        $this->troops += $t[0];
                    }
                    else
                    {
                        $this->troops[$t[0]] = $t[1];
                    }
                }
            }
        }
        if ( !$toBeHero && !isset( $this->troops[99] ) )
        {
            $this->troops[99] = 0;
        }
    }

    public function _getMaxBuildingLevel( $itemId )
    {
        $result = 0;
        foreach ( $this->buildings as $villageBuild )
        {
            if ( $villageBuild['item_id'] == $itemId && $result < $villageBuild['level'] )
            {
                $result = $villageBuild['level'];
            }
        }
        return $result;
    }

    public function _getCurrentNumberFor( $troopId, $item )
    {
        $num = 0;
        if ( isset( $this->troops[$troopId] ) )
        {
            $num += $this->troops[$troopId];
        }
        if ( isset( $this->queueModel->tasksInQueue[$this->troopsUpgradeType], $this->queueModel->tasksInQueue[$this->troopsUpgradeType][$item] ) )
        {
            $qts = $this->queueModel->tasksInQueue[$this->troopsUpgradeType][$item];
            foreach ( $qts as $qt )
            {
                if ( $qt['proc_params'] == $troopId )
                {
                    $num += $qt['threads'];
                }
            }
        }
        $num += $this->_getTroopCountInTransfer( $troopId, QS_WAR_REINFORCE );
        $num += $this->_getTroopCountInTransfer( $troopId, QS_WAR_ATTACK );
        $num += $this->_getTroopCountInTransfer( $troopId, QS_WAR_ATTACK_PLUNDER );
        $num += $this->_getTroopCountInTransfer(  );
        $num += $this->_getTroopCountInTransfer( $troopId, QS_CREATEVILLAGE );
        $ts = $this->_getOnlyMyOuterTroops( );
        if ( isset( $ts[$troopId] ) )
        {
            $num += $ts[$troopId];
        }
        return $num;
    }

    public function _getTroopCountInTransfer( $troopId, $type )
    {
        $num = 0;
        if ( isset( $this->queueModel->tasksInQueue[$type] ) )
        {
            $qts = $this->queueModel->tasksInQueue[$type];
            foreach ( $qts as $qt )
            {
                $arr = explode( "|", $qt['proc_params'] );
                $arr = explode( ",", $arr[0] );
                foreach ( $arr as $arrStr )
                {
                    $tnum = explode( " ", $arrStr[1] );
                    $tid = explode( " ", $arrStr[0] );
                    if ( $tid == $troopId )
                    {
                        $num += $tnum;
                    }
                }
            }
        }
        return $num;
    }

    public function _getMaxTrainNumber( $troopId, $item )
    {
        $max = 0;
        $_f = TRUE;
        foreach ( $this->gameMetadata['troops'][$troopId]['training_resources'] as $k => $v )
        {
            $num = floor( $this->resources[$k]['current_value'] / ( $v * $Var_624 ) );
            if ( $num < $max || $_f )
            {
                $_f = FALSE;
                $max = $num;
            }
        }
        if ( $troopId == 99 )
        {
            $buildingMetadata = $this->gameMetadata['items'][$this->buildings[$this->buildingIndex]['item_id']]['levels'][$this->buildProperties['building']['level'] - 1];
            $_maxValue = $buildingMetadata['value'] - $this->troops[$troopId];
            if ( isset( $this->queueModel->tasksInQueue[$this->buildProperties['building']['item_id']],$this->queueModel->tasksInQueue[$this->troopsUpgradeType], $this->queueModel->tasksInQueue[$this->troopsUpgradeType] ) )
            {
                $qts = $this->queueModel->tasksInQueue[$this->troopsUpgradeType][$this->buildProperties['building']['item_id']];
                foreach ( $qts as $qt )
                {
                    if ( $qt['proc_params'] == $troopId )
                    {
                        $_maxValue -= $qt['threads'];
                    }
                }
            }
            if ( $_maxValue < $max )
            {
                $max = $_maxValue;
            }
        }
        else if ( $item == 25 || $item == 26 )
        {
            $_maxValue = $troopId == 9 || $troopId == 19 || $troopId == 29 || $troopId == 108 || $troopId == 59 ? 1 : 3;
            $_maxValue -= $this->_getCurrentNumberFor( $troopId, $item );
            if ( $_maxValue < $max )
            {
                $max = $_maxValue;
            }
        }
        return $max < 0 ? 0 : $max;
    }

    public function _canTrainInBuilding( $troopId, $itemId )
    {
        foreach ( $this->gameMetadata['troops'][$troopId]['trainer_building'] as $buildingId )
        {
            if ( $buildingId == $itemId )
            {
                return TRUE;
                break;
            }
        }
        return FALSE;
    }

    public function _canDoResearches( $troopId )
    {
        foreach ( $this->gameMetadata['troops'][$troopId]['pre_requests'] as $req_item_id => $level )
        {
            $result = FALSE;
            foreach ( $this->buildings as $villageBuild )
            {
                if ( $villageBuild['item_id'] == $req_item_id && $level <= $villageBuild['level'] )
                {
                    $result = TRUE;
                    break;
                }
            }
            if ( !$result )
            {
                return FALSE;
                break;
            }
        }
        return TRUE;
    }

    public function getNeededTime( $neededResources )
    {
        $timeInSeconds = 0;
        foreach ( $neededResources as $k => $v )
        {
            if ( !( $this->resources[$k]['current_value'] < $v ) )
            {
                continue;
            }
            else if ( $this->resources[$k]['calc_prod_rate'] <= 0 )
            {
                return 0 - 1;
            }
            else
            {
                $time = ( $v - $this->resources[$k]['current_value'] ) / $this->resources[$k]['calc_prod_rate'];
                if ( $timeInSeconds < $time )
                {
                    $timeInSeconds = $time;
                }
            }
        }
        return ceil( $timeInSeconds * 3600 );
    }

    public function getActionText4( $neededResources, $url, $text, $Var_72, $buildLevel, $troopLevel )
    {
        if ( isset( $this->queueModel->tasksInQueue[$queueTaskType] ) )
        {
            return "<span class=\"none\">".buildings_p_plwait."</span>";
        }
        if ( $buildLevel <= $troopLevel )
        {
            return "<span class=\"none\">".buildings_p_needmorecapacity."</span>";
        }
        return !$this->isResourcesAvailable( $neededResources ) ? "<span class=\"none\">".buildings_p_notenoughres."</span>" : "<a class=\"build\" href=\"build.php?id=".$this->buildingIndex."&".$url."&k=".$this->data['update_key']."\">".$text."</a>";
    }

    public function getActionText3( $neededResources, $url, $text, $queueTaskType )
    {
        if ( isset( $this->queueModel->tasksInQueue[$queueTaskType] ) )
        {
            return "<span class=\"none\">".buildings_p_plwait."</span>";
        }
        return !$this->isResourcesAvailable( $neededResources ) ? "<span class=\"none\">".buildings_p_notenoughres."</span>" : "<a class=\"build\" href=\"build.php?id=".$this->buildingIndex."&".$url."&k=".$this->data['update_key']."\">".$text."</a>";
    }

    public function getActionText2( $neededResources )
    {
        $needUpgradeType = $this->needMoreUpgrades( $neededResources );
        if ( 0 < $needUpgradeType )
        {
            switch ( $needUpgradeType )
            {
                case 2 :
                    return "<span class=\"none\">".buildings_p_upg1."</span>";
                case 3 :
                    return "<span class=\"none\">".buildings_p_upg2."</span>";
                case 4 :
                    return "<span class=\"none\">".buildings_p_upg3."</span>";
            }
        }
        if ( !$this->isResourcesAvailable( $neededResources ) )
        {
            $neededTime = $this->getNeededTime( $neededResources );
            return "<span class=\"none\">".( 0 < $neededTime ? $Tmp_38 : buildings_p_notenoughres2 )."</span>";
        }
        return "";
    }

    public function getActionText( $neededResources, $isField, $upgrade, $item_id )
    {
        $needUpgradeType = $this->needMoreUpgrades( $neededResources, $item_id );
        if ( 0 < $needUpgradeType )
        {
            switch ( $needUpgradeType )
            {
                case 1 :
                    return "<span class=\"none\">".buildings_p_upg0."</span>";
                case 2 :
                    return "<span class=\"none\">".buildings_p_upg1."</span>";
                case 3 :
                    return "<span class=\"none\">".buildings_p_upg2."</span>";
                case 4 :
                    return "<span class=\"none\">".buildings_p_upg3."</span>";
            }
        }
        else
        {
            $pageNamePostfix = "2";
            $link = "<a class=\"build\" href=\"village2.php?id=".$this->buildingIndex."&b=".$item_id."&k=".$this->data['update_key']."\">".buildings_p_create_newbuild."</a>";
            $workerResult = $this->isWorkerBusy( $isField );
            return $link.( "" );
        }
        $neededTime = $this->getNeededTime( $neededResources );
        return "<span class=\"none\">".( buildings_p_notenoughres2 )."</span>";
    }

    public function _canAcceptOffer( $needResources, $giveResources, $villageId, $onlyForAlliance, $allianceId, $maxTime, $distance )
    {
        if ( $villageId == $this->data['selected_village_id'] )
        {
            return 0;
        }
        if ( !$this->isResourcesAvailable( $giveResources ) )
        {
            return 1;
        }
        $needMerchantCount = ceil( ( $giveResources[1] + $Var_456 + $giveResources[3] + $giveResources[4] ) / $this->merchantProperty['capacity'] );
        if ( $needMerchantCount == 0 || $this->merchantProperty['exits_num'] < $needMerchantCount )
        {
            return 2;
        }
        if ( $onlyForAlliance && ( intval( $this->data['alliance_id'] ) == 0 || $allianceId != intval( $this->data['alliance_id'] ) ) )
        {
            return 3;
        }
        if ( 0 < $maxTime && $maxTime < $distance / $this->merchantProperty['speed'] )
        {
            return 4;
        }
        return 5;
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
        $link = "build.php?id=".$this->buildingIndex."&".$link;
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
        $link = "build.php?id=".$this->buildingIndex."&".$link;
        return "<a href=\"".$Var_744."\">".$text."</a>";
    }

    public function getResourceGoldExchange( $neededResources, $itemId, $buildingIndex, $multiple = FALSE )
    {
        if ( $this->data['gold_num'] < $this->gameMetadata['plusTable'][6]['cost'] || 0 < $this->needMoreUpgrades( $neededResources, $itemId ) || $this->isResourcesAvailable( $neededResources ) && !$multiple )
        {
            return "";
        }
        $s1 = 0;
        $s2 = 0;
        $exchangeResource = "";
        foreach ( $neededResources as $k => $v )
        {
            $s1 += $v;
            $s2 += $this->resources[$k]['current_value'];
            if ( $exchangeResource != "" )
            {
                $exchangeResource .= "&";
            }
            $exchangeResource .= "r".$k."=".$v;
        }
        $canExchange = $s1 <= $s2;
        if ( $multiple && $canExchange )
        {
            $num = floor( $s2 / $s1 );
            $exchangeResource = "";
            foreach ( $neededResources as $k => $v )
            {
                if ( $exchangeResource != "" )
                {
                    $exchangeResource .= "&";
                }
                $exchangeResource .= "r".$k."=".$v * $num;
            }
        }
        return " | <a href=\"build.php?bid=17&t=3&rid=".$buildingIndex."&".$exchangeResource."\" title=\"".buildings_p_m2m."\"><img class=\"npc".( $canExchange ? "" : "_inactive" )."\" src=\"assets/x.gif\" alt=\"".buildings_p_m2m."\" title=\"".buildings_p_m2m."\"></a>";
    }

}

$p = new GPage( );
$p->run( );
?>
