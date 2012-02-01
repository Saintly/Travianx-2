<?php 
require('.'.DIRECTORY_SEPARATOR.'GameEngine'.DIRECTORY_SEPARATOR.'boot.php');
require_once( MODEL_PATH."activate.php" );
class GPage extends GamePage{

	public $playerStatus = -1;
	public $uid;
	public $uname;

	public function GPage(){
		parent::GamePage();
		$this->viewFile = "activate.php";
		$this->contentCssClass = "activate";
	}

	public function load(){
		parent::load();
		$m = new ActivateModel( );
		if(isset($_GET['id'])){
			$this->playerStatus = $m->doActivation( $_GET['id'] ) ? 1 : 2;
		}
		elseif(isset($_GET['uid'])){
			$this->uid = intval($_GET['uid']);
			$row = $m->getPlayerData($this->uid);
			if($row == NULL){
				$this->uid = 0 - 1;
			}
			else{
				$this->uname = $row['name'];
				if ( $this->isPost( ) && isset( $_POST['pw'] ) && md5( $_POST['pw'] ) == $row['pwd'] ){
					$mj = new QueueJobModel( );
					$mj->deletePlayer( $this->uid );
					$this->playerStatus = 3;
				}
			}
		}
		$m->dispose();
	}
}
$p = new GPage();
$p->run();