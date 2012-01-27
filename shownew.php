<?php
require(".".DIRECTORY_SEPARATOR."GameEngine".DIRECTORY_SEPARATOR."boot.php");
require_once(MODEL_PATH."news.php");
class GPage extends securegamepage{

	public $saved = NULL;
	public $siteNews = NULL;

	public function GPage(){
		parent::securegamepage();
		$this->layoutViewFile = "layout".DIRECTORY_SEPARATOR."form.php";
		$this->viewFile = "shownew.php";
		$this->contentCssClass = "messages";
		$this->checkForGlobalMessage = FALSE;
		$this->checkForNewVillage = FALSE;
	}

	public function load(){
		parent::load();
		if(intval($this->data['new_gnews']) == 0 || $this->player->isSpy){
			$this->redirect( "village1.php" );
		}
		else{
			$m = new NewsModel();
			$this->siteNews = $m->getGlobalSiteNews();
			$m->dispose();
		}
	}
}
$p = new GPage();
$p->run();