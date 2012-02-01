<?php 
class ActivateModel extends ModelBase{

	public function doActivation($code){
		if($this->provider->executeQuery2("UPDATE p_players p SET p.is_active=1 WHERE p.activation_code='%s' AND p.is_active=0", array($code))){
			$this->provider->executeQuery( "UPDATE g_summary gs SET gs.active_players_count=gs.active_players_count+1" );
			return TRUE;
		}
		return FALSE;
	}

	public function getPlayerData($playerId){
		return $this->provider->fetchRow( "SELECT p.id, p.name, p.pwd FROM p_players p WHERE p.id=%s AND p.is_active=0", array($playerId));
	}
}