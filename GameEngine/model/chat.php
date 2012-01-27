<?php 
class ChatModel extends ModelBase{

	public function SendToChat($username, $id, $text){
		$this->provider->executeQuery( "INSERT INTO `g_chat` SET `username` = '%s', `userid` = '%s', `date` = '%s', `text` = '%s';", array($username,$id,time(),$text));
	}

	public function GetFromChat(){
		return $this->provider->fetchResultSet( "SELECT * FROM `g_chat` ORDER BY `ID` DESC LIMIT 50;" );
	}

	public function DeleteOldChat(){
		$count = $this->provider->fetchScalar( "SELECT COUNT(*) FROM `g_chat` ;" );
		if(50 < $count){
			$limit = $count - 50;
			$this->provider->executeQuery( "DELETE FROM `g_chat` ORDER BY `ID` ASC LIMIT %s ;", array( $limit ) );
		}
	}
}