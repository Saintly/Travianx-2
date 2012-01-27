<?php 
class SNprofileModel extends ModelBase{

	public function SendNews($post){
		$this->provider->executeQuery( "INSERT INTO `p_profile` SET `userid` = '%s', `message` = '%s', `image` = '%s', `url` = '%s', `youtube` = '%s', `date` = '%s' ;", array( $post['userid'], $post['message'], $post['image'], $post['url'], $post['youtube'], time( ) ) );
	}

	public function SendComment($post){
		$this->provider->executeQuery( "INSERT INTO `p_comment` SET `userid` = '%s', `username` = '%s', `to_userid` = '%s', `topicid` = '%s', `comment` = '%s', `date` = '%s' ;", array( $post['userid'], $post['username'], $post['to_userid'], $post['topicid'], $post['comment'], time( ) ) );
	}

	public function DeleteNews($newsID, $playerId){
		$this->provider->executeQuery( "DELETE FROM `p_profile` WHERE `ID` = '%s' AND `userid` = '%s' ;", array( $newsID, $playerId ) );
	}

	public function DeleteComment($commentID, $playerId){
		$this->provider->executeQuery( "DELETE FROM `p_comment` WHERE `ID` = '%s' AND (`userid` = '%s' OR `to_userid` = '%s') ;", array($commentID,$playerId,$playerId));
	}

	public function GetComments($NewsId){
		return $this->provider->fetchResultSet( "SELECT `p_comment`.*,`p_players`.`avatar` FROM `p_comment` LEFT JOIN `p_players` ON (`p_comment`.`userid` = `p_players`.`id`) WHERE `p_comment`.`topicid` = '%s';", array( $NewsId ) );
	}

	public function GetNews($playerId, $pageIndex, $pageSize){
		return $this->provider->fetchResultSet('SELECT * FROM `p_profile` WHERE `userid` = "%s" ORDER BY `date` DESC LIMIT %s,%s', array($playerId, $pageIndex*$pageSize, $pageSize));
	}

	public function getuserData($playerId){
		return $this->provider->fetchRow( "SELECT `id`,`avatar`,`name` FROM `p_players` WHERE `id` = '%s';", array( $playerId ) );
	}

	public function getNewsCount($playerId){
		return $this->provider->fetchScalar( "SELECT COUNT(*) FROM `p_profile` WHERE `userid` = '%s';", array( $playerId ) );
	}

	public function getFriendsList($playerId){
		return $this->provider->fetchResultSet("SELECT * FROM `p_friends` WHERE `accept`='1' AND (`playerid1`='%s' OR `playerid2`='%s');",array($playerId,$playerId));
	}

	public function getFriendData($playerId){
		return $this->provider->fetchRow('SELECT TIME_TO_SEC(TIMEDIFF(NOW(), `last_login_date`)) `last_login_sec`,`avatar` FROM `p_players` WHERE `id` = "%s"', array($playerId));
	}
}