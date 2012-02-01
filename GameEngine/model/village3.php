<?php 
class VillageModel extends ModelBase{

	public function getLatestReports($playerId, $villageId){
		return $this->provider->fetchResultSet( "SELECT r.id, r.rpt_result, DATE_FORMAT(r.creation_date, '%%y/%%m/%%d') mdate, DATE_FORMAT(r.creation_date, '%%H:%%i') mtime, FALSE isAttack FROM p_rpts WHERE r.to_player_id=%s AND r.to_village_id=%s AND (r.rpt_cat=3 OR (r.rpt_cat=4 AND r.rpt_result!=100)) ORDER BY r.creation_date DESC LIMIT 5", array( $playerId, $villageId ) );
	}

	public function getLatestReports2($fromPlayerIds, $playerId, $villageId){
		return $this->provider->fetchResultSet( "SELECT r.id, r.rpt_result, DATE_FORMAT(r.creation_date, '%%y/%%m/%%d') mdate, DATE_FORMAT(r.creation_date, '%%H:%%i') mtime, TRUE isAttack FROM p_rpts r WHERE r.to_player_id=%s AND r.to_village_id=%s AND r.from_player_id IN (%s) AND (r.rpt_cat=3 OR r.rpt_cat=4) ORDER BY r.creation_date DESC LIMIT 5", array( $playerId, $villageId, $fromPlayerIds ) );
	}

	public function getAlliancePlayersId($alliance_id){
		return $this->provider->fetchScalar( "SELECT a.players_ids FROM p_alliances a WHERE a.id=%s", array( $alliance_id ) );
	}

	public function getPlayType($player_id){
		return $this->provider->fetchScalar( "SELECT p.player_type FROM p_players p WHERE p.id=%s", array( $player_id ) );
	}

	public function getMapItemData($villageId){
		return $this->provider->fetchRow( "SELECT v.id, v.rel_x, v.rel_y, v.field_maps_id, v.is_capital, v.image_num, v.tribe_id, v.player_id, v.alliance_id, v.parent_id, v.player_name, v.village_name, v.alliance_name, v.people_count, v.is_oasis, v.troops_num, v.allegiance_percent, TIME_TO_SEC(TIMEDIFF(NOW(), v.creation_date)) elapsedTimeInSeconds FROM p_villages v WHERE v.id=%s", array( $villageId ) );
	}

	public function getVillageName($villageId){
		return $this->provider->fetchScalar( "SELECT v.village_name FROM p_villages v WHERE v.id=%s", array( $villageId ) );
	}
}