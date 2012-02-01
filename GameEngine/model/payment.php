<?php 
class PaymentModel extends ModelBase{

	public function incrementPlayerGold($playerId, $goldNumber){
		$this->provider->executeQuery("UPDATE p_players p SET p.gold_num=gold_num+%s WHERE p.id=%s", array($goldNumber, $playerId));
	}
}