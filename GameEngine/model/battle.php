<?php
class BattleModel extends ModelBase{

	public function executeWarResult($taskRow){
		$taskRow['village_id'] = intval($taskRow['village_id']);
		$fromVillageRow = $this->_getVillageInfo($taskRow['village_id']);
		$toVillageRow = $this->_getVillageInfo($taskRow['to_village_id']);
		$paramsArray = explode("|", $taskRow['proc_params']);
		$troopsArrStr = explode(",", $paramsArray[0]);
		$troopsArray = array( "troops" => array(), "onlyHero" => FALSE, "heroTroopId" => 0, "hasHero" => FALSE, "hasKing" => FALSE, "hasWallDest" => FALSE, "cropConsumption" => 0);
		$_onlyHero = TRUE;
		foreach($troopsArrStr as $_t){
			$tnum = explode(" ", $_t[1]);
			$tid = explode(" ", $_t[0]);
			if($tnum == 0 - 1){
				$troopsArray['hasHero'] = TRUE;
				$troopsArray['heroTroopId'] = $tid;
				$tnum = 1;
			}
			else{
				$troopsArray['troops'][$tid] = $tnum;
				if(0 < $tnum){
					$_onlyHero = FALSE;
				}
				else{
					continue;
				}
				if($tid == 9 || $tid == 19 || $tid == 29 || $tid == 108 || $tid == 59){
					$troopsArray['hasKing'] = TRUE;
				}
				if ( $tid == 7 || $tid == 17 || $tid == 27 || $tid == 106 || $tid == 57 ){
					$troopsArray['hasWallDest'] = TRUE;
				}
			}
			$troopsArray += "cropConsumption";
		}
		if ( $_onlyHero && $troopsArray['hasHero'] ){
			$troopsArray['onlyHero'] = TRUE;
		}
		$procInfo = array( "troopsArray" => $troopsArray, "hasHero" => $paramsArray[1] == 1, "spyAction" => $paramsArray[2], "catapultTarget" => $paramsArray[3], "harvestResources" => $paramsArray[4], "spyInfo" => $paramsArray[5], "catapultResult" => $paramsArray[6], "troopBack" => $paramsArray[7] == 1 );
		if ( $taskRow['proc_type'] == QS_CREATEVILLAGE && ( $toVillageRow['is_oasis'] || 0 < intval( $toVillageRow['player_id'] ) ) ){
			$taskRow['proc_type'] = QS_WAR_ATTACK_PLUNDER;
		}
		switch($taskRow['proc_type']){
			case QS_WAR_REINFORCE :
				require_once(MODEL_PATH.DIRECTORY_SEPARATOR."battles".DIRECTORY_SEPARATOR."reinforcement.php");
				$reinforceModel = new ReInforcementBattleModel();
			case QS_WAR_ATTACK :
				break;
			case QS_WAR_ATTACK_PLUNDER :
				require_once( MODEL_PATH.DIRECTORY_SEPARATOR."battles".DIRECTORY_SEPARATOR."war.php");
				$warModel = new WarBattleModel();
				return $warModel->handleWarAttack($taskRow, $toVillageRow, $fromVillageRow, $procInfo);
			case QS_WAR_ATTACK_SPY :
				require_once(MODEL_PATH.DIRECTORY_SEPARATOR."battles".DIRECTORY_SEPARATOR."spy.php");
				$spyModel = new SpyBattleModel();
				return $spyModel->handleWarSpy($taskRow, $toVillageRow, $fromVillageRow, $procInfo);
			case QS_CREATEVILLAGE :
				require_once(MODEL_PATH.DIRECTORY_SEPARATOR."battles".DIRECTORY_SEPARATOR."createnewvillage.php");
				$newVillageModel = new NewVillageBattleModel();
				return $newVillageModel->handleCreateNewVillage($taskRow, $toVillageRow, $fromVillageRow, $troopsArray['cropConsumption']);
		}
		return FALSE;
	}

	public function _getTroopWithPower($troops,$troopsPower,$isAttacking,$heroLevel,$peopleCount,$wringerPower = 0,$wallPower = 0,$heroId = -1,$spyAction = FALSE){
		$GameMetadata = $GLOBALS['GameMetadata'];
		$returnTroops = array( 
					"troops" => array( ),
					"total_live_number" => 0,
					"total_spy_live_number" => 0,
					"total_power" => 0,
					"total_carry_load" => 0,
					"total_dead_consumption" => 0,
					"total_dead_number" => 0,
					"hasHero" => 0 - 1 < $heroId,
					"heroTroopId" => $heroId
				);
		$powerFactor = !$spyAction ? floor($peopleCount / 250) + $wringerPower + $heroLevel : 0;
		foreach($troops as $tid => $tnum){
			$tpower = $isAttacking ? $GameMetadata['troops'][$tid]['attack_value'] : $GameMetadata['troops'][$tid]['defense_infantry'];
			$tpower = floor(($tpower + (isset($troopsPower[$tid]) ? $troopsPower[$tid] : 0) + $powerFactor) * (1 + $wallPower / 100));
			if($spyAction){
				$tpower = $tid == 103 || $tid == 54 || $tid == 4 || $tid == 14 || $tid == 23 ? 1 : 0;
			}
			$num = 0 < intval($tnum) ? intval($tnum) : 0;
			if($tid != 99){
				$returnTroops[] += "total_live_number";
				$returnTroops[] += "total_power";
				$returnTroops[] += "total_carry_load";
				if($spyAction && ($tid == 103 || $tid == 54 || $tid == 4 || $tid == 14 || $tid == 23)){
					$returnTroops[] += "total_spy_live_number";
				}
			}
			$returnTroops['troops'][$tid] = array("number" => $num, "live_number" => $num, "single_consumption" => $GameMetadata['troops'][$tid]['crop_consumption'], "single_carry_load" => $GameMetadata['troops'][$tid]['carry_load'], "single_power" => $tpower);
		}
		return $returnTroops;
	}

	public function _getAttackTroopsForVillage($troopsTrainingStr, $troopsArray, $heroLevel, $peopleCount, $wringerLevel, $spyAction){
		$troopsPower = array();
		if(!$spyAction){
			$_c = 0;
			$troopsTrainingStr = trim($troopsTrainingStr);
			if($troopsTrainingStr != ""){
				$_arr = explode(",",$troopsTrainingStr);
				foreach($_arr as $troopStr){
					++$_c;
					$attack_level = explode(" ", $troopStr[3]);
					$defense_level = explode(" ", $troopStr[2]);
					$researches_done = explode(" ", $troopStr[1]);
					$troopId = explode(" ", $troopStr[0]);
					if($troopId != 99 && $_c <= 8){
						$troopsPower[$troopId] = $attack_level;
					}
				}
			}
		}
		return $this->_getTroopWithPower( $troopsArray, $troopsPower, TRUE, $heroLevel, $peopleCount, $wringerLevel, 0, 0 - 1, $spyAction );
	}

	public function _getDefenseTroopsForVillage($vid, $troopsArray, $hasHero, $peopleCount, $wallPower, $spyAction){
		$vrow = $this->provider->fetchRow("SELECT v.player_id, v.troops_training FROM p_villages v WHERE v.id=%s", array(intval($vid)));
		$heroLevel = 0;
		$heroId = 0 - 1;
		$troopsPower = array();
		if($vrow != NULL){
			if($hasHero){
				$_row = $this->provider->fetchRow("SELECT p.hero_level, p.hero_troop_id FROM p_players p WHERE p.id=%s", array(intval($vrow['player_id'])));
				if($_row != NULL){
					$heroLevel = intval($_row['hero_level']);
					$heroId = intval($_row['hero_troop_id']);
				}
			}
			if(!$spyAction){
				$_c = 0;
				$troopsTrainingStr = trim($vrow['troops_training']);
				if($troopsTrainingStr != ""){
					$_arr = explode(",",$troopsTrainingStr);
					foreach($_arr as $troopStr){
						++$_c;
						$attack_level = explode(" ", $troopStr[3]);
						$defense_level = explode(" ", $troopStr[2]);
						$researches_done = explode(" ", $troopStr[1]);
						$troopId = explode(" ", $troopStr[0]);
						if($troopId != 99 && $_c <= 8){
							$troopsPower[$troopId] = $defense_level;
						}
					}
				}
			}
		}
		return $this->_getTroopWithPower($troopsArray, $troopsPower, FALSE, $heroLevel, $peopleCount, 0, $wallPower, $heroId, $spyAction);
	}

    public function _getNewTroops( $troopsStr, $addTroopsArray, $fromVillageId, $isSamePlayer )
    {
        $newTroopsStr = "";
        $heroAddCond = $addTroopsArray['hasHero'] && 0 - 1 < $fromVillageId && !$isSamePlayer;
        $troopsStr = trim( $troopsStr );
        if ( $troopsStr == "" )
        {
            foreach ( $addTroopsArray['troops'] as $tid => $tnum )
            {
                if ( $newTroopsStr != "" )
                {
                    $newTroopsStr .= ",";
                }
                $newTroopsStr .= $tid." ".$tnum;
            }
            if ( $heroAddCond )
            {
                if ( $newTroopsStr != "" )
                {
                    $newTroopsStr .= ",";
                }
                $newTroopsStr .= $addTroopsArray['heroTroopId']." -1";
            }
            $newTroopsStr = $fromVillageId.":".$newTroopsStr;
        }
        else
        {
            $hasTroopsIn = FALSE;
            $troopsStrArr = explode( "|", $troopsStr );
            foreach ( $troopsStrArr as $tvStr )
            {
                if ( $newTroopsStr != "" )
                {
                    $newTroopsStr .= "|";
                }
                $vtroopsStr = explode( ":", $tvStr[1] );
                $vid = explode( ":", $tvStr[0] );
                if ( $vid == $fromVillageId )
                {
                    $hasTroopsIn = TRUE;
                    $curTroopsStr = explode( ",", $vtroopsStr );
                    $curTroops = array( );
                    foreach ( $curTroopsStr as $curTroopsStrItem )
                    {
                        $_tnum = explode( " ", $curTroopsStrItem[1] );
                        $_tid = explode( " ", $curTroopsStrItem[0] );
                        if ( $_tnum == 0 - 1 )
                        {
                            $curTroops[0 - 1] = $_tid;
                        }
                        else
                        {
                            $curTroops[$_tid] = $_tnum;
                        }
                    }
                    $newtvStr = "";
                    foreach ( $addTroopsArray['troops'] as $tid => $tnum )
                    {
                        if ( $newtvStr != "" )
                        {
                            $newtvStr .= ",";
                        }
                        if ( isset( $curTroops[$tid] ) )
                        {
                            $tnum += $curTroops[$tid];
                        }
                        $newtvStr .= $tid." ".$tnum;
                    }
                    if ( isset( $curTroops[99] ) )
                    {
                        if ( $newtvStr != "" )
                        {
                        }
                        $newtvStr .= "99 ".$curTroops[99];
                    }
                    if ( isset( $curTroops[0 - 1] ) )
                    {
                        if ( $newtvStr != "" )
                        {
                            $newtvStr .= ",";
                        }
                        $newtvStr .= $curTroops[0 - 1]." -1";
                    }
                    else if ( $heroAddCond )
                    {
                        if ( $newtvStr != "" )
                        {
                            $newtvStr .= ",";
                        }
                        $newtvStr .= $addTroopsArray['heroTroopId']." -1";
                    }
                    $newTroopsStr .= $vid.":".$newtvStr;
                }
                else
                {
                    $newTroopsStr .= $tvStr;
                }
            }
            if ( !$hasTroopsIn )
            {
                $newTroopsStr = "";
                foreach ( $addTroopsArray['troops'] as $tid => $tnum )
                {
                    if ( $newTroopsStr != "" )
                    {
                        $newTroopsStr .= ",";
                    }
                    $newTroopsStr .= $tid." ".$tnum;
                }
                if ( $heroAddCond )
                {
                    if ( $newTroopsStr != "" )
                    {
                        $newTroopsStr .= ",";
                    }
                    $newTroopsStr .= $addTroopsArray['heroTroopId']." -1";
                }
                $newTroopsStr = $fromVillageId.":".$newTroopsStr;
                if ( $troopsStr != "" )
                {
                    $newTroopsStr = $troopsStr."|".$newTroopsStr;
                }
            }
        }
        return $newTroopsStr;
    }


	public function _updateVillageOutTroops($vid, $invid, $newTroopsStr, $heroKilled, $thisInforcementDied, $uid){
		$pid = $uid;
		$vid = intval($vid);
		if(0 < $vid){
			$row = $this->provider->fetchRow("SELECT v.player_id, v.troops_out_num FROM p_villages v WHERE v.id=%s", array(intval($vid)));
			if($row == NULL){}
			else{
				$pid = $row['player_id'];
				$troops_out_num = "";
				$ts = trim( $row['troops_out_num'] );
				if($ts != ""){
					$tsArr = explode("|", $ts);
					foreach($tsArr as $tsArrStr){
						$_troops = explode(":", $tsArrStr[1]);
						$_vid = explode(":", $tsArrStr[0]);
						if($_vid == $invid){
							if(!$thisInforcementDied){
								if($troops_out_num != ""){
									$troops_out_num .= "|";
								}
								$troops_out_num .= $invid.":".$newTroopsStr;
							}
						}
						else{
							if($troops_out_num != ""){
								$troops_out_num .= "|";
							}
							$troops_out_num .= $tsArrStr;
						}
					}
				}
				$this->provider->executeQuery("UPDATE p_villages v SET v.troops_out_num='%s' WHERE v.id=%s", array($troops_out_num, intval($vid)));
			}
		}
		if($heroKilled){
			$this->provider->executeQuery("UPDATE p_players p SET p.hero_troop_id=NULL, p.hero_in_village_id=NULL WHERE p.id=%s", array(intval($pid)));
		}
	}

	public function _updateVillage($villageRow, $reduceCropConsumption, $heroKilled){
		$resources = array();
		$r_arr = explode(",", $villageRow['resources']);
		foreach($r_arr as $r_str){
			$r2 = explode(" ", $r_str);
			$prate = floor($r2[4] * (1 + $r2[5] / 100)) - ($r2[0] == 4 ? $villageRow['crop_consumption'] : 0);
			$current_value = floor($r2[1] + $elapsedTimeInSeconds * ($prate / 3600));
			if($r2[2] < $current_value){
				$current_value = $r2[2];
			}
			$resources[$r2[0]] = array("current_value" => $current_value, "store_max_limit" => $r2[2], "store_init_limit" => $r2[3], "prod_rate" => $r2[4], "prod_rate_percentage" => $r2[5], "calc_prod_rate" => $prate);
		}
		$cpRate = explode(" ", $villageRow['cp'][1]);
        $cpValue = explode(" ", $villageRow['cp'][0]);
		$cpValue = round($cpValue + $elapsedTimeInSeconds * ($cpRate / 86400), 4);
		$resourcesStr = "";
		foreach($resources as $k => $v){
			if($resourcesStr != ""){
				$resourcesStr .= ",";
			}
			$resourcesStr .= sprintf( "%s %s %s %s %s %s", $k, $v['current_value'], $v['store_max_limit'], $v['store_init_limit'], $v['prod_rate'], $v['prod_rate_percentage'] );
		}
		$cp = $cpValue." ".$cpRate;
		$this->provider->executeQuery("UPDATE p_villages v SET v.resources='%s', v.cp='%s', v.crop_consumption=v.crop_consumption-%s, v.last_update_date=NOW() WHERE  v.id=%s", array($resourcesStr, $cp, $reduceCropConsumption, intval($villageRow['id'])));
		if($heroKilled){
			$this->provider->executeQuery("UPDATE p_players SET hero_troop_id=NULL, hero_in_village_id=NULL WHERE id=%s", array(intval($villageRow['player_id'])));
		}
	}

	public function _getVillageInfo($villageId){
		return $this->provider->fetchRow( "SELECT v.id, v.parent_id, v.tribe_id, v.field_maps_id, v.rel_x, v.rel_y, v.crop_consumption, v.player_id, v.alliance_id, v.village_oases_id, v.village_name, v.player_name, v.alliance_name, v.is_capital, v.is_special_village, v.is_oasis, v.people_count, v.resources, v.buildings, v.cp, v.troops_training, v.troops_num, v.troops_out_num, v.troops_intrap_num, v.troops_out_intrap_num, v.allegiance_percent, v.child_villages_id, TIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds, TIME_TO_SEC(TIMEDIFF(NOW(), v.creation_date)) oasisElapsedTimeInSeconds FROM p_villages v WHERE v.id=%s", array(intval($villageId )));
	}
}