<?php
require(".".DIRECTORY_SEPARATOR."GameEngine".DIRECTORY_SEPARATOR."boot.php");
require_once(MODEL_PATH."register.php");
class GPage extends GamePage{

	public $err = array("", "", "", "");
	public $success;
	public $SNdata = NULL;
	public $UserID = 0;

	public function GPage(){
		parent::GamePage();
		$this->viewFile = "register.php";
		$this->contentCssClass = "signup";
	}

	public function load(){
		parent::load();
		$this->SNdata = 0;
		$this->success = FALSE;
		if($this->isPost()){
			if($this->globalModel->isGameOver()){$this->redirect("over.php");}
			else{
				$name = trim($_POST['name']);
				$email = trim($_POST['email']);
				$pwd = trim($_POST['pwd']);

				//Pseduo error < 3character
				$this->err[0] = (strlen($name) < 3) ? register_player_txt_notless3 : "";
				//Pseudo empty
				if($this->err[0] == ""){
					$this->err[0] = preg_match("/[:,\\. \\n\\r\\t\\s]+/", $name) ? register_player_txt_invalidchar : "";
				}
				//pseudo is reserved
				if($name == "[ally]" || $name == "admin" || $name == "administrator" || $name == "????" || $name == "????" || $name == "??????" || $name == "???" || $name == "?????" || $name == $this->appConfig['system']['adminName'] || $name == tatar_tribe_player){
					$this->err[0] = register_player_txt_reserved;
				}
				
				//Mail inavide
				$this->err[1] = !preg_match("/^[^@]+@[a-zA-Z0-9._-]+\\.[a-zA-Z]+$/", $email) ? register_player_txt_invalidemail : "";
				//Password is to short
				$this->err[2] = strlen($pwd) < 4 ? register_player_txt_notless4 : "";
				//tribe invalide
				$this->err[3] = !isset($_POST['tid']) || $_POST['tid'] != 1 && $_POST['tid'] != 2 && $_POST['tid'] != 3 && $_POST['tid'] != 6 && $_POST['tid'] != 7 ? register_player_txt_choosetribe : "";
				//No error -> Next
				if(0 < strlen($this->err[0]) || 0 < strlen($this->err[1]) || 0 < strlen($this->err[2]) || 0 < strlen($this->err[3])){}
				else{
					$m = new RegisterModel();
					//Test pseudo existé
					$this->err[0] = $m->isPlayerNameExists( $name ) ? register_player_txt_usedname : "";
					//Test Email exist
					$this->err[1] = $m->isPlayerEmailExists( $email ) ? register_player_txt_usedemail : "";
					
					if(0 < strlen($this->err[0]) || 0 < strlen($this->err[1])){
						$m->dispose();
					}
					$villageName = new_village_name_prefix." ".$name;
					$result = $m->createNewPlayer($name, $email, $pwd, $_POST['tid'], $_POST['kid'], $villageName, $this->setupMetadata['map_size'], PLAYERTYPE_NORMAL, 1, $this->SNdata);
					if($result['hasErrors']){
						$this->err[3] = register_player_txt_fullserver;
						$m->dispose();
					}
					else{
						$m->dispose();
						$link = "activate.php?id=".$result['activationCode'];
						$to = $email;
						$from = $this->appConfig['system']['email'];
						$subject = register_player_txt_regmail_sub;
						$message = sprintf(register_player_txt_regmail_body, $name, $name, $pwd, $link, $link);
						//WebHelper::sendMail($to, $from, $subject, $message);
						$this->success = TRUE;
					}
				}
			}
		}
	}
}
$p = new GPage();
$p->run();