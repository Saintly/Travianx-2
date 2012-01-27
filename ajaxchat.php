<?php
require(".".DIRECTORY_SEPARATOR."GameEngine".DIRECTORY_SEPARATOR."boot.php");
require_once(MODEL_PATH."chat.php");
require_once(MODEL_PATH."wordsfilter.php");
class GPage  extends securegamepage{

	public $chats = NULL;
	public $Filter = NULL;

	public function GPage(){
		$this->customLogoutAction = TRUE;
		parent::securegamepage();
		if($this->player == NULL ) exit(0);
		$this->layoutViewFile = $this->viewFile = NULL;
		$GLOBALS['_GET']['_a1_'] = "";
    }

    public function load(){
		parent::load();
		$this->Filter = new FilterWordsModel();
		$m = new ChatModel();
		$this->chats = $m->GetFromChat();
		$storCtat = array();
		while($this->chats->next()){
			$text = $this->Filter->FilterWords( $this->chats->row['text'] );
			$storCtat[$this->chats->row['ID']] = array(date( "g:i A", $this->chats->row['date'] ),$this->chats->row['username'],$text,$this->chats->row['userid']);
		}
		ksort($storCtat);
		foreach($storCtat as $ChatLine){
			echo "<div class=\"msgln\">(".$ChatLine[0].") <b><a href=\"profile.php?uid=".$ChatLine[3]."\" target=\"_blank\">".$ChatLine[1]."</a></b>: ".$ChatLine[2]."<br></div>";
		}
		$m->dispose();
	}
}
$p = new GPage();
$p->run();