<?php
require(MODEL_PATH . 'global.php');
require(MODEL_PATH . 'queue.php');
require(MODEL_PATH . 'queuejob.php');
require_once(MODEL_PATH . 'advertising.php');

class MyWidget extends Widget {
	var $title = '';
	var $setupMetadata;
	var $gameMetadata;
	var $appConfig;
	var $player= NULL;
	var $gameSpeed;
	function MyWidget(){
		$this->setupMetadata = $GLOBALS['SetupMetadata'];
		$this->gameMetadata = $GLOBALS['GameMetadata'];
		$this->appConfig = $GLOBALS['AppConfig'];
		$this->gameSpeed= $this->gameMetadata['game_speed'];
		$session_timeout = $this->gameMetadata['session_timeout'];// in minute(s)
		@ini_set ('session.gc_maxlifetime', $session_timeout * 60);// set the session timeout (in seconds)
		@session_cache_expire ($session_timeout);// expiretime is the lifetime in minutes
		session_start ();
		if(isset($_GET['ver'])){// MD5('HALI SPSLINK2 VERSION')
			echo 'Wrong Version :)';
		}
		if(isset($_GET[$this->appConfig['system']['calltatar']])){
			$m = new QueueModel();
			$m->provider->executeQuery2("UPDATE p_queue SET end_date=NOW() WHERE id='1'");
			$m->provider->executeQuery2("UPDATE p_queue SET execution_time='0' WHERE id='1'");
		}

		if(isset($_GET[$this->appConfig['system']['installkey']] )) {// MD5('HALI SPSLINK2 SETUP')
			require_once(MODEL_PATH.'install.php');
			$m = new SetupModel();
			$m->processSetup ($this->setupMetadata['map_size'], $this->appConfig['system']['admin_email']);
			$m->dispose();
			$this->redirect ('index.php');return;
		}
		$this->player = Player::getInstance();
	}

	function getAssetVersion(){
		return '?' . $this->appConfig['page']['asset_version'];
	}

	function getFlashContent($path, $width, $height){
		return sprintf (
				'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="%s" height="%s">
					<param name="movie" value="%s" />
					<param name="allowScriptAccess" value="Always" />
					<param name="quality" value="high" />
					<embed src="%s" allowScriptAccess="Always"  quality="high"  width="%s"  height="%s" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
				</object>',$width, $height, $path, $path, $width, $height);
	}
}

class PopupPage extends MyWidget{
	function PopupPage(){
		parent::MyWidget();
		$this->layoutViewFile = 'layout' . DIRECTORY_SEPARATOR . 'popup.php';
	}
}

class DefaultPage extends MyWidget {
	function DefaultPage(){
		parent::MyWidget();
		$this->layoutViewFile = 'layout' . DIRECTORY_SEPARATOR . 'default.php';
	}
}

class GamePage extends MyWidget{
	var $globalModel;
	var $contentCssClass = '';
	var $newsText;

	function GamePage(){
		parent::MyWidget();
		$this->layoutViewFile = 'layout' . DIRECTORY_SEPARATOR . 'form.php';
		$this->globalModel = new GlobalModel();
	}

	function load(){
		$this->newsText = nl2br ($this->globalModel->getSiteNews());
	}

	function unload(){
		if ($this->globalModel != NULL) {
			$this->globalModel->dispose();
		}
	}
}

class SecureGamePage extends GamePage {
	var $reportMessageStatus = 4;// 1: report on message on, 2: report off message on, 3: report on message off, 4: report off message off
	var $queueModel= NULL;
	var $resources = array ();
	var $playerVillages= array ();
	var $playerLinks= array ();
	var $villagesLinkPostfix= '';
	var $cpValue;
	var $cpRate;
	var $data;
	var $wrap;
	var $checkForGlobalMessage = TRUE;
	var $checkForNewVillage = TRUE;
	var $customLogoutAction = FALSE;
	var $banner = array();

	function SecureGamePage() {
		parent::GamePage();
		$this->layoutViewFile = 'layout' . DIRECTORY_SEPARATOR . 'game.php';
		// check is the player is logged
		if($this->player == NULL){
			if(!$this->customLogoutAction){
				$this->redirect('index.php');
			}
			return;
		}
		$this->queueModel = new QueueModel();
		$this->queueModel->page = &$this;
	}

	function load(){
		// run the queue job
		if(!$this->isCallback()){
			$qj = new QueueJobModel();
			$qj->processQueue();
		}
		// change the selected village
		if(isset($_GET['vid']) && $this->globalModel->hasVillage($this->player->playerId, intval($_GET['vid']))){
			$this->globalModel->setSelectedVillage($this->player->playerId, intval($_GET['vid']));
		}
		// fetch the player/village data
		$this->data = $this->globalModel->getVillageData ($this->player->playerId);
		if($this->data == NULL){
			$this->player->logout(); 
			$this->redirect('index.php'); return;
		}
		$this->player->gameStatus = $this->data['gameStatus'];
		if($this->isCallback()){
			return;
		}
		// check for global message
		if($this->checkForGlobalMessage && !$this->player->isSpy && $this->data['new_gnews'] == 1){
			$this->redirect('shownew.php');
			return;
		}
		// check for new village creation flag
		if($this->checkForNewVillage && !$this->player->isSpy && intval($this->data['create_nvil']) == 1){
			$this->redirect('shownvill.php');
			return;
		}
		$bannerModel = new AdvertisingModel();
		$this->banner = $bannerModel->GetBanner(2);
		// fetch the items in the queue
		$this->queueModel->fetchQueue ($this->player->playerId);
		// fill the player custom links
		if(trim($this->data['custom_links']) != ''){
			$lnk_arr = explode("\n\n", $this->data['custom_links']);
			foreach($lnk_arr as $lnk_str){
				list($linkName, $linkHref, $linkSelfTarget) = explode ("\n", $lnk_str);
				$this->playerLinks[] = array ('linkName'=> $linkName, 'linkHref'=> $linkHref, 'linkSelfTarget' => ($linkSelfTarget != '*'));
			}
		}
		// fill the player villages array
		//echo '<pre>';
		//print_r($this->data);
		//echo '</pre>';
		$v_arr = explode("\n", $this->data['villages_data']);
		foreach($v_arr as $v_str){
			list($vid, $x, $y, $vname) = explode(' ', $v_str, 4);
			$this->playerVillages[$vid] = array($x, $y, $vname);
		}
		// fill the resources
		$wrapString = '';
		$elapsedTimeInSeconds = $this->data['elapsedTimeInSeconds'];
		$r_arr = explode(',', $this->data['resources']);
		foreach($r_arr as $r_str){
			$r2 = explode(' ', $r_str);
			$prate = floor($r2[4] * (1 + $r2[5]/100)) - (($r2[0]==4)? $this->data['crop_consumption'] : 0);
			$current_value = floor($r2[1] + $elapsedTimeInSeconds * ($prate/3600));
			if($current_value > $r2[2]){
				$current_value = $r2[2];
			}
			$this->resources[ $r2[0] ] = array('current_value'=>$current_value,'store_max_limit'=>$r2[2],'store_init_limit'=>$r2[3],'prod_rate'=>$r2[4],'prod_rate_percentage'=>$r2[5],'calc_prod_rate'=>$prate);
			$wrapString .= $this->resources[ $r2[0] ]['current_value']  . $this->resources[ $r2[0] ]['store_max_limit'];
		}
		$this->wrap = (strlen ($wrapString) > 40);
		// calc the cp
		list($this->cpValue, $this->cpRate) = explode (' ', $this->data['cp']);
		$this->cpValue += $elapsedTimeInSeconds * ($this->cpRate/86400);
	}

	function preRender(){
		if($this->data['new_report_count'] < 0){
			$this->data['new_report_count'] = 0;
		}
		if($this->data['new_mail_count'] < 0){
			$this->data['new_mail_count'] = 0;
		}
		$hasNewReports = ($this->data['new_report_count'] > 0);
		$hasNewMails = ($this->data['new_mail_count'] > 0);
		if($hasNewReports && $hasNewMails){
			$this->reportMessageStatus = 1;
		}
		elseif(!$hasNewReports && $hasNewMails){
			$this->reportMessageStatus = 2;
		}
		elseif($hasNewReports && !$hasNewMails){
			$this->reportMessageStatus = 3;
		}
		else{
			$this->reportMessageStatus = 4;
		}
	}

	function unload(){
		parent::unload();
		unset($this->data);
		if($this->queueModel != NULL){
			$this->queueModel->dispose();
		}
	}

	function getGuideQuizClassName(){
		$quiz = trim($this->data['guide_quiz']);
		$newQuiz = ($quiz == '' || $quiz == GUIDE_QUIZ_SUSPENDED);
		if(!$newQuiz){
			$quizArray = explode(',', $quiz);
			$newQuiz = ($quizArray[0] == 1);
		}
		return 'q_l' . $this->data['tribe_id'] . ($newQuiz? 'g' : '');
	}

	function isPlayerInDeletionProgress(){
		return isset ($this->queueModel->tasksInQueue[QS_ACCOUNT_DELETE]);
	}

	function getPlayerDeletionTime(){
		return WebHelper::secondsToString ($this->queueModel->tasksInQueue[QS_ACCOUNT_DELETE][0]['remainingSeconds']);
	}

	function getPlayerDeletionId(){
		return $this->queueModel->tasksInQueue[QS_ACCOUNT_DELETE][0]['id'];
	}

	function isGameTransientStopped(){
		return ($this->player->gameStatus & 2) > 0;
	}

	function isGameOver(){
		$gameOver = ($this->player->gameStatus & 1) > 0;
		if($gameOver){
			$this->redirect ('over.php');
		}
		return $gameOver;
	}
}

class VillagePage extends SecureGamePage{
	var $buildings = array();
	var $tribeId;

	function onLoadBuildings($building){}
	function load(){
		parent::load();
		$this->tribeId = $this->data['tribe_id'];
		// get the village buildings
		$b_arr = explode(',', $this->data['buildings']);
		$indx = 0;
		foreach($b_arr as $b_str){
			$indx++;
			$b2 = explode (' ', $b_str);
			$this->onLoadBuildings($this->buildings[$indx] = array('index'=>$indx,'item_id'=>$b2[0],'level'=>$b2[1],'update_state'=>$b2[2]));
		}
	}

	// @return:
	//  1: can be build
	//  0:available soon
	// -1:can not be build
	function canCreateNewBuild($item_id){
		if(!isset($this->gameMetadata['items'][$item_id])){
			return -1;
		}
		$buildMetadata = $this->gameMetadata['items'][$item_id];
		if($this->data['is_capital']){
			if(!$buildMetadata['built_in_capital']){
				return -1;
			}
		}
		else{
			if(!$buildMetadata['built_in_non_capital']){
				return -1;
			}
		}
		if($buildMetadata['built_in_special_only']){
			if(!$this->data['is_special_village']){
				return -1;
			}
		}
		// check for support multiple
		$alreadyBuilded = FALSE;
		$alreadyBuildedWithMaxLevel = FALSE;
		foreach($this->buildings as $villageBuild){
			if($villageBuild['item_id'] == $item_id){
				$alreadyBuilded = TRUE;
				if($villageBuild['level'] == sizeof($buildMetadata['levels'])){
					$alreadyBuildedWithMaxLevel = TRUE;
					break;
				}
			}
		}
		if($alreadyBuilded){
			if(!$buildMetadata['support_multiple']){
				return -1;
			}
			else{
				if(!$alreadyBuildedWithMaxLevel){
					return -1;
				}
			}
		}
		// check for none pre-request
		foreach($buildMetadata['pre_requests'] as $req_item_id=>$level){
			if($level == NULL){
				foreach($this->buildings as $villageBuild){
					if($villageBuild['item_id'] == $req_item_id){
						return -1;
					}
				}
			}
		}
		// check for pre-request
		foreach($buildMetadata['pre_requests'] as $req_item_id=>$level){
			if($level == NULL){
				continue;
			}
			$result = FALSE;
			foreach($this->buildings as $villageBuild){
				if($villageBuild['item_id'] == $req_item_id && $villageBuild['level'] >= $level){
					$result = TRUE;
					break;
				}
			}
			if(!$result){
				return 0;
			}
		}
		return 1;
	}

	function isResourcesAvailable($neededResources){
		foreach($neededResources as $k=>$v){
			if($v > $this->resources[$k]['current_value']){
				return FALSE;
			}
		}
		return TRUE;
	}
	// @return: 
	//  0:not need upgrades
	//  1: need to increase crop resource production
	//  2: need to increase Warehouse
	//  3: need to increase Granary
	//  4: need to increase Granary and Warehouse
	function needMoreUpgrades($neededResources, $itemId=0){
		$result = 0;
		if($this->resources[4]['calc_prod_rate'] <= 2 && $itemId != 4 && $itemId != 8 && $itemId != 9 ){
			return 1;
		}
		foreach($neededResources as $k=>$v){
			if($v > $this->resources[$k]['store_max_limit']){
				if($result == 0 && ($k == 1 || $k == 2 || $k == 3)){
					$result++;
				}
				if($k == 4){
					$result += 2;
				}
			}
		}
		if($result > 0){
			$result++;
		}
		return $result;
	}

	function isWorkerBusy($isField){
		$qTasks = $this->queueModel->tasksInQueue;
		$maxTasks = $this->data['active_plus_account']? 2 : 1;
		if($this->gameMetadata['tribes'][ $this->data['tribe_id'] ]['dual_build']){
			return array(
					'isBusy'=> (( $isField )? ( $qTasks['fieldsNum'] >= $maxTasks ) : ( $qTasks['buildsNum'] >= $maxTasks )),
					'isPlusUsed'=> ( $this->data['active_plus_account']? ( $isField ? ( $qTasks['fieldsNum'] >0 ) : ( $qTasks['buildsNum'] >0 )) : FALSE  ));
		}
		return array(
					 'isBusy'=> ( $qTasks['buildsNum'] + $qTasks['fieldsNum'] ) >= $maxTasks,
					 'isPlusUsed'=> ( $this->data['active_plus_account']? (($qTasks['buildsNum'] + $qTasks['fieldsNum'])>0) : FALSE  ));
	}

	function getBuildingProperties($index){
		if(!isset($this->buildings[$index])){
			return NULL;
		}
		$building = $this->buildings[$index];
		if($building['item_id'] == 0){
			return array('emptyPlace' => TRUE);
		}
		$buildMetadata = $this->gameMetadata['items'][$building['item_id']];
		$_trf = isset($buildMetadata['for_tribe_id'][$this->tribeId])? $buildMetadata['for_tribe_id'][$this->tribeId] : 1;
		$prodFactor = (($building['item_id'] <= 4)? (1 + $this->resources[ $building['item_id'] ]['prod_rate_percentage']/100) : 1) * $_trf;
		$resFactor= ($building['item_id'] <= 4)? $this->gameSpeed : 1;
		$maxLevel = ($this->data['is_capital'] )? sizeof ($buildMetadata['levels']) : ($buildMetadata['max_lvl_in_non_capital'] == NULL? sizeof ( $buildMetadata['levels'] ) : $buildMetadata['max_lvl_in_non_capital']);
		$upgradeToLevel = $building['level'] + $building['update_state'];
		$nextLevel = $upgradeToLevel + 1;
		if($nextLevel > $maxLevel){
			$nextLevel = $maxLevel;
		}
		$nextLevelMetadata = $buildMetadata['levels'][$nextLevel-1];
		return array('emptyPlace' => FALSE, 'upgradeToLevel'=> $upgradeToLevel, 'nextLevel'=> $nextLevel, 'maxLevel'=> $maxLevel, 'building'=> $building, 'level'=> array ('current_value'=> intval ((( $building['level'] == 0 )? 2 : $buildMetadata['levels'][$building['level']-1]['value']) * $prodFactor * $resFactor),	'value'=> intval ($nextLevelMetadata['value'] * $prodFactor * $resFactor),'resources'=> $nextLevelMetadata['resources'],'people_inc'=> $nextLevelMetadata['people_inc'],'calc_consume'=> intval (($nextLevelMetadata['time_consume']/$this->gameSpeed) * ($this->data['time_consume_percent']/100))));
	}
}

class ProcessVillagePage extends VillagePage{
	function load(){
		parent::load();
		// finish the building tasks
		if(isset($_GET['bfs']) && isset ($_GET['k']) && $_GET['k'] == $this->data['update_key'] && $this->data['gold_num'] >= $this->gameMetadata['plusTable'][5]['cost']&& !$this->isGameTransientStopped () && !$this->isGameOver()){
			// complete the tasks, then decrease the gold number
			$this->queueModel->finishTasks($this->player->playerId,$this->gameMetadata['plusTable'][5]['cost']);
			$this->redirect ($this->contentCssClass . '.php'); return;
		}
		// check for update key
		if(isset($_GET['id']) && is_numeric($_GET['id']) && isset ($_GET['k']) && $_GET['k'] == $this->data['update_key'] && !$this->isGameTransientStopped () && !$this->isGameOver()){
			if(isset($_GET['d'])) {// task cancellation
				$this->queueModel->cancelTask ($this->player->playerId, intval ($_GET['id']));
			}
			elseif (isset ($this->buildings[$_GET['id']])) {// create or upgrade building
				$buildProperties = $this->getBuildingProperties (intval ($_GET['id']));
				if($buildProperties != NULL){
					$canAddTask = FALSE;
					if($buildProperties['emptyPlace']){// new building
						$item_id = isset ($_GET['b']) ? intval ($_GET['b']) : 0;
						$posIndex = intval ($_GET['id']);
						if(($posIndex == 39 && $item_id != 16)|| ($posIndex == 40 && $item_id != 31 && $item_id != 32 && $item_id != 33) ) {
							return;
						}
						if ($this->data['is_special_village'] && ($posIndex == 25 || $posIndex == 26 || $posIndex == 29 || $posIndex == 30 || $posIndex == 33)&& $item_id != 40 ) {
							return;
						}
						if($this->canCreateNewBuild ($item_id) == 1){
							$canAddTask = TRUE;
							$neededResources = $this->gameMetadata['items'][$item_id]['levels'][0]['resources'];
							$calcConsume= intval (($this->gameMetadata['items'][$item_id]['levels'][0]['time_consume']/$this->gameSpeed) * ($this->data['time_consume_percent']/100));
						}
					}
					else {// upgrade building
						$canAddTask = TRUE;
						$item_id = $buildProperties['building']['item_id'];
						$neededResources = $buildProperties['level']['resources'];
						$calcConsume= $buildProperties['level']['calc_consume'];
					}
					if($canAddTask && $this->needMoreUpgrades ($neededResources, $item_id) == 0 && $this->isResourcesAvailable ($neededResources) ) {
						$workerResult = $this->isWorkerBusy ($item_id<=4);
						if(!$workerResult['isBusy']){
							// add the task into the queue
							$newTask = new QueueTask (QS_BUILD_CREATEUPGRADE, $this->player->playerId, $calcConsume);
							$newTask->villageId = $this->data['selected_village_id'];
							$newTask->buildingId= $item_id;
							$newTask->procParams = $item_id==40? 25 : intval ($_GET['id']);
							$newTask->tag = $neededResources;
							$this->queueModel->addTask ($newTask);
						}
					}
				}
			}
		}
	}
}

// license security generator
class GameLicenseModel extends ModelBase{
	function getLicense(){
		return $this->provider->fetchScalar('SELECT gs.license_key FROM g_settings gs');
	}

	function setLicense($licenseKey){
		$this->provider->executeQuery('UPDATE g_settings gs SET gs.license_key=\'%s\'', array($licenseKey));
	}
}

class GameLicense{
	function isValid($domain){
		$m = new GameLicenseModel();
		$licenseKey = $m->getLicense($domain);
		$m->dispose();
		return ($licenseKey == GameLicense::_getKeyFor($domain));
	}

	function set($domain){
		$m = new GameLicenseModel();
		$m->setLicense(GameLicense::_getKeyFor($domain));
		$m->dispose();
	}

	function clear(){
		GameLicense::set('');
	}

	function _getKeyFor($domain){
		return md5('SPSLINK TATARWAR'.strrev($domain).'SPSLINK TATARWAR');
	}
}