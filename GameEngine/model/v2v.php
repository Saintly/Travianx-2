<?php 
class WarModel extends ModelBase{

	public function getPlayerDataById($playerId){
		$GameMetadata = $GLOBALS['GameMetadata'];
		$protectionPeriod = intval( $GameMetadata['player_protection_period'] / $GameMetadata['game_speed'] );
		return $this->provider->fetchRow( "SELECT p.id, p.is_blocked, p.name, TIME_TO_SEC(TIMEDIFF(DATE_ADD(p.registration_date, INTERVAL %s SECOND), NOW())) protection_remain_sec FROM p_players p WHERE p.id=%s", array( $protectionPeriod, $playerId ) );
	}

	public function getVillageDataById($villageId){
		return $this->provider->fetchRow( "SELECT v.id, v.rel_x, v.rel_y, v.village_name, v.player_id, v.player_name, v.is_oasis FROM p_villages v WHERE v.id=%s", array( $villageId ) );
	}

	public function getVillageDataByName($villageName){
		return $this->provider->fetchRow( "SELECT v.id, v.rel_x, v.rel_y, v.village_name, v.player_id, v.player_name, v.is_oasis FROM p_villages v WHERE v.village_name='%s'", array( $villageName ) );
	}

	public function getVillageData2ById($villageId){
		return $this->provider->fetchRow( "SELECT v.id, v.rel_x, v.rel_y, v.village_name, v.player_id, v.player_name, v.is_oasis, v.troops_num, v.troops_out_num, v.troops_intrap_num, v.troops_out_intrap_num, v.village_oases_id FROM p_villages v WHERE v.id=%s", array( $villageId ) );
	}

	public function backTroopsFrom( $fromVillageId, $column1, $troops1, $toVillageId, $column2, $troops2 ){
		$this->provider->executeQuery( "UPDATE p_villages v SET v.%s='%s' WHERE v.id=%s", array( $column1, $troops1, $fromVillageId ) );
		$this->provider->executeQuery( "UPDATE p_villages v SET v.%s='%s' WHERE v.id=%s", array( $column2, $troops2, $toVillageId ) );
	}

	public function hasNewVillageTask($playerId){
		return $this->provider->fetchScalar( "SELECT COUNT(*) FROM p_queue q WHERE q.player_id=%s AND q.proc_type=%s", array( $playerId, QS_CREATEVILLAGE ) );
	}

	public function getPlayType($player_id){
		return $this->provider->fetchScalar( "SELECT p.player_type FROM p_players p WHERE p.id=%s", array( $player_id ) );
	}
}