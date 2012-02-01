<?php 
class GuideModel extends ModelBase{

	public function setGuideTask($playerId, $guideQuiz){
		$this->provider->executeQuery( "UPDATE p_players p SET p.guide_quiz='%s' WHERE p.id=%s", array( $guideQuiz, $playerId ) );
	}

	public function increaseGoldNumber($playerId, $golds){
		$this->provider->executeQuery( "UPDATE p_players p SET p.gold_num=p.gold_num+%s WHERE p.id=%s", array( $golds, $playerId ) );
	}

	public function getPlayerRank($playerId, $score){
		return $this->provider->fetchScalar( "SELECT ((SELECT COUNT(*) FROM p_players p WHERE p.player_type!=%s AND (p.total_people_count*10+p.villages_count)>%s) + (SELECT COUNT(*) FROM p_players p WHERE p.player_type!=%s AND p.id<%s AND (p.total_people_count*10+p.villages_count)=%s) ) + 1 rank", array( PLAYERTYPE_TATAR, $score, PLAYERTYPE_TATAR, $playerId, $score ) );
	}

	public function isOpenedMessage($messageId){
		return $this->provider->fetchScalar( "SELECT IF(m.is_readed=1 OR m.delete_status>0, 1, 0) FROM p_msgs m WHERE m.id=%s", array( $messageId ) ) == 1;
	}

	public function addResourcesTo($villageId, $resourcesArray){
		$resourceStr = $this->provider->fetchScalar( "SELECT v.resources FROM p_villages v WHERE v.id=%s", array( $villageId ) );
		$r_arr = explode( ",", $resourceStr );
		$resourceStr = "";
		$Var_360 = 0;
		$i = 0;
		foreach($r_arr as $r_str){
			$r2 = explode(" ", $r_str);
			$resources[$r2[0]] = array(
					"current_value" => $r2[1] + $resourcesArray[$i++],
					"store_max_limit" => $r2[2],
					"store_init_limit" => $r2[3],
					"prod_rate" => $r2[4],
					"prod_rate_percentage" => $r2[5]
			);
			if($resources[$r2[0]]['store_max_limit'] < $resources[$r2[0]]['current_value']){
				$resources[$r2[0]]['current_value'] = $resources[$r2[0]]['store_max_limit'];
			}
			if($resourceStr != ""){
				$resourceStr .= ",";
			}
			$resourceStr .= $r2[0]." ".$resources[$r2[0]]['current_value']." ".$resources[$r2[0]]['store_max_limit']." ".$resources[$r2[0]]['store_init_limit']." ".$resources[$r2[0]]['prod_rate']." ".$resources[$r2[0]]['prod_rate_percentage'];
		}
		$this->provider->executeQuery( "UPDATE p_villages v SET v.resources='%s' WHERE v.id=%s", array( $resourceStr, $villageId ) );
	}

	public function getVillagesMatrix($matrixStr){
		return $this->provider->fetchResultSet("SELECT v.id, v.rel_x, v.rel_y, v.village_name, v.is_oasis, v.player_id FROM p_villages v  WHERE v.id IN (%s)", array($matrixStr));
	}

	public function guideTroopsReached($queueId){
		return $this->provider->fetchScalar( "SELECT COUNT(*) FROM p_queue q WHERE q.id=%s", array( $queueId ) ) == 0;
	}

	public function isOpenedReport($playerId){
		return $this->provider->fetchScalar( "SELECT IF(r.read_status=1 OR r.delete_status>0, 1, 0) FROM p_rpts r WHERE r.from_player_id=0 AND r.from_village_id=0 AND r.rpt_cat=2 AND r.to_player_id=%s", array( intval( $playerId ) ) ) == 1 || $this->provider->fetchScalar( "SELECT COUNT(*) FROM p_rpts r WHERE r.from_player_id=0 AND r.from_village_id=0 AND r.rpt_cat=2 AND r.to_player_id=%s", array( intval( $playerId ) ) ) == 0;
	}
}