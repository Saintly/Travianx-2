<?php
define("PLAYERTYPE_NORMAL", 1);
define("PLAYERTYPE_ADMIN", 2);
define("PLAYERTYPE_TATAR", 3);
define("GUIDE_QUIZ_NOTSTARTED", NULL);
define("GUIDE_QUIZ_SUSPENDED", 0 - 2);
define("GUIDE_QUIZ_COMPLETED", 0 - 1);
define("ALLIANCE_ROLE_SETROLES", 1);
define("ALLIANCE_ROLE_REMOVEPLAYER", 2);
define("ALLIANCE_ROLE_EDITNAMES", 4);
define("ALLIANCE_ROLE_EDITCONTRACTS", 8);
define("ALLIANCE_ROLE_SENDMESSAGE", 16);
define("ALLIANCE_ROLE_INVITEPLAYERS", 32);
define("QS_ACCOUNT_DELETE", 1);
define("QS_BUILD_CREATEUPGRADE", 2);
define("QS_BUILD_DROP", 3);
define("QS_TROOP_RESEARCH", 4);
define("QS_TROOP_UPGRADE_ATTACK", 5);
define("QS_TROOP_UPGRADE_DEFENSE", 6);
define("QS_TROOP_TRAINING", 7);
define("QS_TROOP_TRAINING_HERO", 8);
define("QS_TOWNHALL_CELEBRATION", 9);
define("QS_MERCHANT_GO", 10);
define("QS_MERCHANT_BACK", 11);
define("QS_WAR_REINFORCE", 12);
define("QS_WAR_ATTACK", 13);
define("QS_WAR_ATTACK_PLUNDER", 14);
define("QS_WAR_ATTACK_SPY", 15);
define("QS_CREATEVILLAGE", 16);
define("QS_LEAVEOASIS", 17);
define("QS_PLUS1", 18);
define("QS_PLUS2", 19);
define("QS_PLUS3", 20);
define("QS_PLUS4", 21);
define("QS_PLUS5", 22);
define("QS_GUIDENOQUIZ", 23);
define("QS_TATAR_RAISE", 24);
define("QS_SITE_RESET", 25);

class QueueTask{

	public $playerId = NULL;
	public $villageId = NULL;
	public $toPlayerId = NULL;
	public $toVillageId = NULL;
	public $taskType = NULL;
	public $threads = NULL;
	public $executionTime = NULL;
	public $procParams = NULL;
	public $buildingId = NULL;
	public $tag = NULL;

	public function QueueTask($taskType, $playerId, $executionTime){
		$this->threads = 1;
		$this->taskType = $taskType;
		$this->playerId = $playerId;
		$this->executionTime = $executionTime;
	}

	public function isCancelableTask($taskType){
		switch($taskType){
			case QS_ACCOUNT_DELETE :
			case QS_BUILD_CREATEUPGRADE :
			case QS_BUILD_DROP :
			case QS_WAR_REINFORCE :
			case QS_WAR_ATTACK :
			case QS_WAR_ATTACK_PLUNDER :
			case QS_WAR_ATTACK_SPY :
			case QS_LEAVEOASIS :
			return TRUE;
		}
		return FALSE;
	}

	public function getMaxCancelTimeout($taskType){
		switch($taskType){
			case QS_ACCOUNT_DELETE :	return 86400;
			case QS_WAR_REINFORCE :
			case QS_WAR_ATTACK :
			case QS_WAR_ATTACK_PLUNDER :
			case QS_WAR_ATTACK_SPY :	return 90;
		}
		return 0 - 1;
	}
}

class ReportHelper{

	public function getReportResultRelative($result, $isAttack){
		if($result < 15 || $result == 100){
			return $result;
		}
		return intval(substr(strval($result), $isAttack ? 1 : 0, 1));
	}

	public function getReportResultText($result){
		return constant("report_result_text".$result);
	}

	public function getReportActionText($cat){
		return " ".constant("report_action_text".$cat)." ";
	}
}

class Player{

	public $prevPlayerId = NULL;
	public $playerId = NULL;
	public $isAgent = NULL;
	public $isSpy = FALSE;
	public $gameStatus = NULL;

	public function getKey(){
		return md5(WebHelper::getdomain());
	}

	public function getInstance(){
		$key = Player::getkey();
		return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;
	}

	public function save(){
		$_SESSION[Player::getkey()] = $this;
	}

	public function logout(){
		$_SESSION[Player::getkey()] = NULL;
		unset($_SESSION);
		session_destroy();
	}
}

class ClientData{

	public $uname = NULL;
	public $upwd = NULL;
	public $uiLang = NULL;
	public $showLevels = FALSE;

	public function ClientData(){
		$this->uiLang = $GLOBALS['AppConfig']['system']['lang'];
	}

	public function getInstance(){
		$cookie = new ClientData();
		$key = Player::getkey();
		if(isset($_COOKIE[$key])){
			$obj = unserialize(base64_decode($_COOKIE[$key]));
			if($obj != NULL && is_a($obj, "ClientData")){
				$cookie->uname = $obj->uname;
				$cookie->upwd = $obj->upwd;
			}
		}
		if(isset($_COOKIE['lvl'])){
			$cookie->showLevels = $_COOKIE['lvl'] == "1";
		}
		if(isset($_COOKIE['lng'])){
			$cookie->uiLang = $_COOKIE['lng'] == "ar" ? "ar" : "en";
		}
		return $cookie;
	}

	public function save(){
		setcookie(Player::getkey(), base64_encode(serialize($this)), time() + 5 * 12 * 30 * 24 * 3600);
	}

	public function clear(){
		$this->uname = "";
		$this->upwd = "";
		setcookie(Player::getkey());
		setcookie("lvl");
		setcookie("lng");
	}
}