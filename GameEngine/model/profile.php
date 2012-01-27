<?php
class ProfileModel extends ModelBase{

	public function getPlayerIdByName($playerName){
		return $this->provider->fetchScalar('SELECT id FROM p_players WHERE name="%s"', array($playerName));
	}

	public function getPlayerAgentForById($playerId){
		return $this->provider->fetchScalar('SELECT agent_for_players FROM p_players WHERE id=%s', array($playerId));
	}

	public function getPlayerMyAgentById($playerId){
		return $this->provider->fetchScalar('SELECT my_agent_players FROM p_players WHERE id=%s', array($playerId));
	}

	public function setMyAgents($playerId, $playerName, $agents, $newAgentId){
		$agentStr = '';
		foreach($agents as $agentId => $agentName){
			if($agentStr != ''){
				$agentStr .= ',';
			}
			$agentStr .= $agentId.' '.$agentName;
		}
		$this->provider->executeQuery('UPDATE p_players SET my_agent_players="%s" WHERE id=%s', array($agentStr, $playerId));
		$agentFor = $playerId.' '.$playerName;
		$this->provider->executeQuery('UPDATE p_players SET agent_for_players=IF(ISNULL(agent_for_players) OR agent_for_players="", "%s", CONCAT_WS(",", agent_for_players, "%s")) WHERE id=%s', array($agentFor, $agentFor, $newAgentId));
	}

	public function removeMyAgents($playerId, $agents, $aid){
		$agentStr = '';
		foreach($agents as $agentId => $agentName){
			if($agentStr != ''){
				$agentStr .= ',';
			}
			$agentStr .= $agentId.' '.$agentName;
		}
		$this->provider->executeQuery('UPDATE p_players SET my_agent_players="%s" WHERE id=%s', array($agentStr, $playerId));
		$agentForStr = $this->getPlayerAgentForById($aid);
		$agentForPlayers = trim($agentForStr) == '' ? array() : explode(',', $agentForStr);
		$i = 0;
		$c = sizeof($agentForPlayers);
		while($i < $c){
			$agent = $agentForPlayers[$i];
			$agentName = explode(' ', $agent[1]);
            $agentId = explode(' ', $agent[0]);
			if($agentId == $playerId){
				unset($agentForPlayers[$i]);
			}
			++$i;
		}
		$agentForStr = implode(',', $agentForPlayers);
		$this->provider->executeQuery('UPDATE p_players SET agent_for_players="%s" WHERE id=%s', array($agentForStr, $aid));
	}

	public function removeAgentsFor($playerId, $agents, $aid){
		$agentStr = '';
		foreach($agents as $agentId => $agentName){
			if($agentStr != ''){
				$agentStr .= ',';
			}
			$agentStr .= $agentId.' '.$agentName;
		}
		$this->provider->executeQuery('UPDATE p_players SET agent_for_players="%s" WHERE id=%s', array($agentStr, $playerId));
		$agentForStr = $this->getPlayerMyAgentById($aid);
		$agentForPlayers = trim($agentForStr) == '' ? array() : explode(',', $agentForStr);
		$i = 0;
		$c = sizeof($agentForPlayers);
		while($i < $c){
			$agent = $agentForPlayers[$i];
			$agentName = explode(' ', $agent[1]);
            $agentId = explode(' ', $agent[0]);
			if($agentId == $playerId){
				unset($agentForPlayers[$i]);
			}
			++$i;
		}
		$agentForStr = implode(',', $agentForPlayers);
		$this->provider->executeQuery('UPDATE p_players SET my_agent_players="%s" WHERE id=%s', array($agentForStr, $aid));
	}

	public function editPlayerProfile($playerId, $data){
		$selected_village_id = $this->provider->fetchScalar('SELECT selected_village_id FROM p_players WHERE id=%s', array($playerId));
		$villages_data_arr = array();
		$villages_id_arr = explode("\n", $data['villages']);
		$i = 0;
		$c = sizeof($villages_id_arr);
		while($i < $c){
			$vname = explode(' ', $villages_id_arr[$i][3], 4);
			$y = explode(' ', $villages_id_arr[$i][2], 4);
			$x = explode(' ', $villages_id_arr[$i][1], 4);
			$vid = explode(' ', $villages_id_arr[$i][0], 4);
			if($vid == $selected_village_id){
				$vname = $data['village_name'];
				$villages_id_arr[$i] = $vid.' '.$x.' '.$y.' '.$vname;
			}
			$villages_data_arr[$vname][] = $villages_id_arr[$i];
			++$i;
		}
		ksort($villages_data_arr);
		$villages_data = '';
		foreach($villages_data_arr as $k => $v){
			foreach($villages_data_arr[$k] as $v2){
				if($villages_data != ''){
					$villages_data .= "\n";
				}
				$villages_data .= $v2;
			}
		}
		$this->provider->executeQuery('UPDATE p_players SET birth_date="%s", gender=%s, house_name="%s", description1="%s", description2="%s", villages_data="%s", avatar="%s" WHERE id=%s', array($data['birthData'], $data['gender'], $data['house_name'], $data['description1'], $data['description2'], $villages_data, $data['avatar'], $playerId));
		$village_name = trim($data['village_name']);
		if($village_name != ''){
			$this->provider->executeQuery('UPDATE p_villages SET village_name="%s" WHERE id=%s', array($village_name, $selected_village_id));
		}
	}

	public function changePlayerPassword($playerId, $newPassword){
		$this->provider->executeQuery('UPDATE p_players SET pwd="%s" WHERE id=%s', array($newPassword, $playerId));
	}

	public function changePlayerEmail($playerId, $newEmail){
		if(0 < intval($this->provider->fetchScalar('SELECT COUNT(*) FROM p_players WHERE email="%s"', array($newEmail)))){}
		else{
			$this->provider->executeQuery('UPDATE p_players SET email="%s" WHERE id=%s', array($newEmail, $playerId));
		}
	}

	public function getPlayerRank($playerId, $score){
		//return $Var_240;
	}

	public function getWinnerPlayer(){
		$playerId = intval($this->provider->fetchScalar('SELECT win_pid FROM g_settings'));
		return $this->getPlayerDataById($playerId);
	}

	public function getPlayerDataById($playerId){
		$protectionPeriod = intval( $GLOBALS['GameMetadata']['player_protection_period'] / $GLOBALS['GameMetadata']['game_speed'] );
		return $this->provider->fetchRow('SELECT id, tribe_id, alliance_id, alliance_name, house_name, is_blocked, birth_date, gender, description1, description2, medals, total_people_count, villages_count, name, avatar, villages_id, DATE_FORMAT(registration_date, "%%Y/%%m/%%d %%H:%%i") registration_date, TIMEDIFF(DATE_ADD(registration_date, INTERVAL %s SECOND), NOW()) protection_remain, TIME_TO_SEC(TIMEDIFF(DATE_ADD(registration_date, INTERVAL %s SECOND), NOW())) protection_remain_sec, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(birth_date)), "%%Y")+0 age FROM p_players WHERE id=%s', array($protectionPeriod, $protectionPeriod, $playerId));
	}

	public function getVillagesSummary($villages_id){
		return $this->provider->fetchResultSet('SELECT id, rel_x, rel_y, village_name, people_count, is_capital FROM p_villages WHERE id IN (%s) ORDER BY people_count DESC', array($villages_id));
	}

	public function resetGNewsFlag($playerId){
		$this->provider->executeQuery('UPDATE p_players SET new_gnews=0 WHERE id=%s', array($playerId));
	}
}