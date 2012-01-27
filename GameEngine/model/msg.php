<?php
class MessageModel extends ModelBase{

	public $maxMailBoxSize = 50;

	public function getPlayerIdByName($playerName){
		return $this->provider->fetchScalar( "SELECT p.id FROM p_players p WHERE p.name='%s'", array( $playerName ) );
	}

	public function getPlayerNameById($playerId){
		return $this->provider->fetchScalar( "SELECT p.name FROM p_players p WHERE p.id=%s", array( $playerId ) );
	}

	public function getMessageListCount($playerId, $inbox){
		return $this->provider->fetchScalar( $inbox ? "SELECT COUNT(*) FROM p_msgs m WHERE m.to_player_id=%s AND m.delete_status!=1" : "SELECT COUNT(*) FROM p_msgs m WHERE m.from_player_id=%s AND m.delete_status!=2", array( $playerId ) );
	}

	public function getMessageList($playerId, $inbox, $pageIndex, $pageSize){
		return $this->provider->fetchResultSet( $inbox ? "SELECT   m.id,  m.from_player_id uid,  m.from_player_name uname,  m.msg_title,  m.msg_body,  m.is_readed,  DATE_FORMAT(m.creation_date, '%%y/%%m/%%d %%H:%%i') mdate FROM p_msgs m  WHERE   m.to_player_id=%s  AND m.delete_status!=1 ORDER BY m.creation_date DESC LIMIT %s,%s" : "SELECT   m.id,  m.to_player_id uid,  m.to_player_name uname,  m.msg_title,  m.msg_body,  m.is_readed,  DATE_FORMAT(m.creation_date, '%%y/%%m/%%d %%H:%%i') mdate FROM p_msgs m  WHERE   m.from_player_id=%s  AND m.delete_status!=2 ORDER BY m.creation_date DESC LIMIT %s,%s", array( $playerId, $pageIndex * $pageSize, $pageSize ) );
	}

	public function getMessage($playerId, $messageId){
		return $this->provider->fetchResultSet( "SELECT  m.from_player_id, m.to_player_id, m.from_player_name, m.to_player_name, m.msg_title, m.msg_body, m.is_readed, m.delete_status, DATE_FORMAT(m.creation_date, '%%y/%%m/%%d') mdate, DATE_FORMAT(m.creation_date, '%%H:%%i:%%s') mtime FROM p_msgs m WHERE  m.id=%s AND (m.from_player_id=%s OR m.to_player_id=%s) AND IF(m.to_player_id=%s, m.delete_status!=1, m.delete_status!=2)", array( $messageId, $playerId, $playerId, $playerId ) );
	}

	public function _getSafeMessage( $playerId, $messageId ){
		return $this->provider->fetchResultSet( "SELECT  m.to_player_id, m.is_readed, m.delete_status FROM p_msgs m WHERE  m.id=%s AND (m.from_player_id=%s OR m.to_player_id=%s)", array( $messageId, $playerId, $playerId ) );
	}

	public function deleteMessage( $playerId, $messageId ){
		$result = $this->_getSafeMessage( $playerId, $messageId );
		if ( !$result->next( ) ){
			return FALSE;
		}
		$deleteStatus = $result->row['delete_status'];
		$toPlayerId = $result->row['to_player_id'];
		$isReaded = $result->row['is_readed'];
		$result->free( );
		if ( $deleteStatus != 0 ){
			$this->provider->executeQuery( "DELETE FROM p_msgs WHERE  id=%s AND (from_player_id=%s OR to_player_id=%s)", array( $messageId, $playerId, $playerId ) );
		}
		else{
			$this->provider->executeQuery( "UPDATE p_msgs m SET  m.delete_status=%s WHERE  id=%s AND (from_player_id=%s OR to_player_id=%s)", array( $toPlayerId == $playerId ? 1 : 2, $messageId, $playerId, $playerId ) );
		}
		if ( !$isReaded && $toPlayerId == $playerId ){
			$this->changeUnReadedMessages( $playerId, 0 - 1 );
			return TRUE;
		}
		return FALSE;
	}

	public function markMessageAsReaded( $playerId, $messageId ){
		$this->provider->executeQuery( "UPDATE p_msgs m SET m.is_readed=1 WHERE m.id=%s", array( $messageId ) );
		$this->changeUnReadedMessages( $playerId, 0 - 1 );
	}

	public function saveFriendList( $playerId ){
		$this->provider->executeQuery( "UPDATE p_players p SET p.friend_players='%s' WHERE p.id=%s", array( $friends, $playerId ) );
	}

	public function sendMessage($fromPlayerId, $fromPlayerName, $toPlayerId, $toPlayerName, $subject, $body){
		$this->provider->executeQuery("INSERT p_msgs SET from_player_id=%s, to_player_id=%s, from_player_name='%s', to_player_name='%s', msg_title='%s', msg_body='%s', creation_date=NOW(), is_readed=0", array( $fromPlayerId, $toPlayerId, $fromPlayerName, $toPlayerName, $subject, $body ) );
		$messageId = $this->provider->fetchScalar( "SELECT LAST_INSERT_ID() FROM p_msgs" );
		$this->changeUnReadedMessages( $toPlayerId, 1 );
		while ( 0 < ( $mid = $this->provider->fetchScalar( "SELECT MIN(m.id) id FROM p_msgs m WHERE m.delete_status!=2 AND m.from_player_id=%s GROUP BY m.from_player_id HAVING COUNT(*)>%s", array( $fromPlayerId, $this->maxMailBoxSize ) ) ) ){
			$this->deleteMessage( $fromPlayerId, $mid );
		}
		return $messageId;
	}

	public function changeUnReadedMessages( $playerId, $offset ){
		$this->provider->executeQuery( "UPDATE p_players p SET p.new_mail_count=IF((p.new_mail_count+%s)<0, 0, p.new_mail_count+%s) WHERE p.id=%s", array( $offset, $offset, $playerId ) );
	}

	public function getAlliancePlayersId( $allianceId ){
		return $this->provider->fetchScalar( "SELECT a.players_ids FROM p_alliances a WHERE a.id=%s", array( $allianceId ) );
	}

	public function syncMessages( $playerId ){
		$newCount = intval( $this->provider->fetchScalar( "SELECT COUNT(*) FROM p_msgs m WHERE  m.to_player_id=%s AND m.is_readed=0 AND m.delete_status!=1", array( $playerId ) ) );
		if ( $newCount < 0 ){
			$newCount = 0;
		}
		$this->provider->executeQuery( "UPDATE p_players p SET p.new_mail_count=%s WHERE p.id=%s", array( $newCount, $playerId ) );
		return $newCount;
	}
}