<?php

class ReportModel extends ModelBase{

	public $maxReportBoxSize = 25;

	public function getPlayerAllianceId($playerId){
		return $this->provider->fetchScalar( "SELECT p.alliance_id FROM p_players p WHERE p.id=%s", array($playerId));
	}

	public function getReportListCount($playerId, $cat){
		$expr = $cat == 0 ? "" : " AND r.rpt_cat=".$cat;
		return $this->provider->fetchScalar("SELECT COUNT(*) FROM p_rpts r WHERE ( (r.to_player_id=%s AND r.delete_status!=1) OR (r.from_player_id=%s AND r.delete_status!=2) )%s", array( $playerId, $playerId, $expr ) );
	}

	public function getReportList($playerId, $cat, $pageIndex, $pageSize){
		$expr = $cat == 0 ? "" : " AND r.rpt_cat=".$cat;
		return $this->provider->fetchResultSet( "SELECT  r.id, r.to_player_id, r.from_player_id, r.from_village_name, r.to_village_name, r.rpt_cat, r.rpt_result, IF(r.to_player_id=%s, r.read_status=1 OR r.read_status=3, r.read_status=2 OR r.read_status=3) is_readed, DATE_FORMAT(r.creation_date, '%%y/%%m/%%d %%H:%%i') mdate FROM p_rpts r WHERE  ( (r.to_player_id=%s AND r.delete_status!=1) OR (r.from_player_id=%s AND r.delete_status!=2) )%s ORDER BY r.creation_date DESC LIMIT %s,%s", array( $playerId, $playerId, $playerId, $expr, $pageIndex * $pageSize, $pageSize ) );
	}

	public function deleteReport($playerId, $reportId){
		$result = $this->provider->fetchResultSet( "SELECT  r.to_player_id, r.from_player_id, r.read_status, r.delete_status FROM p_rpts r  WHERE  r.id=%s AND (r.from_player_id=%s OR r.to_player_id=%s)", array( $reportId, $playerId, $playerId ) );
		if(!$result->next()){
			return FALSE;
		}
		$deleteStatus = $result->row['delete_status'];
		$toPlayerId = $result->row['to_player_id'];
		$fromPlayerId = $result->row['from_player_id'];
		$readStatus = $result->row['read_status'];
		$result->free();
		if($deleteStatus != 0 || $fromPlayerId == $toPlayerId){
			$this->provider->executeQuery( "DELETE FROM p_rpts WHERE  id=%s AND (from_player_id=%s OR to_player_id=%s)", array( $reportId, $playerId, $playerId ) );
		}
		else{
			$this->provider->executeQuery( "UPDATE p_rpts r SET  r.delete_status=%s WHERE  r.id=%s AND (r.from_player_id=%s OR r.to_player_id=%s)", array( $toPlayerId == $playerId ? 1 : 2, $reportId, $playerId, $playerId ) );
		}
		if($toPlayerId == $playerId){
			if($readStatus == 0 || $readStatus == 2){
				$this->markReportAsReaded( $playerId, $toPlayerId, $reportId, $readStatus );
				return TRUE;
			}
		}
		if($readStatus == 0 || $readStatus == 1){
			$this->markReportAsReaded( $playerId, $toPlayerId, $reportId, $readStatus );
			return TRUE;
		}
		return FALSE;
	}

	public function markReportAsReaded($playerId, $rtoPlayerId, $reportId, $read_status){
		$newReadStatus = ( $playerId == $rtoPlayerId ? 1 : 2 ) + $read_status;
		$this->provider->executeQuery( "UPDATE p_rpts r SET r.read_status=%s WHERE r.id=%s", array( $newReadStatus, $reportId ) );
		$this->provider->executeQuery( "UPDATE p_players p SET p.new_report_count=IF(p.new_report_count-1<0, 0, p.new_report_count-1) WHERE p.id=%s", array($playerId));
	}

	public function getReport($reportId){
		return $this->provider->fetchResultSet( "SELECT  r.from_player_id, r.to_player_id, r.from_village_id, r.to_village_id, r.from_player_name, r.to_player_name, r.from_village_name, r.to_village_name, r.rpt_body, r.rpt_cat, r.read_status, r.delete_status, DATE_FORMAT(r.creation_date, '%%y/%%m/%%d') mdate, DATE_FORMAT(r.creation_date, '%%H:%%i:%%s') mtime FROM p_rpts r  WHERE  r.id=%s", array( $reportId ) );
	}

	public function getPlayerName($playerId){
		return $this->provider->fetchScalar( "SELECT p.name FROM p_players p WHERE p.id=%s", array($playerId));
	}

	public function getVillageName($villageId){
		return $this->provider->fetchScalar( "SELECT v.village_name FROM p_villages v WHERE v.id=%s", array($villageId));
	}

	public function createReport($fromPlayerId, $toPlayerId, $fromVillageId, $toVillageId, $reportCategory, $reportResult, $body, $timeInSeconds){
		$fromPlayerId = intval( $fromPlayerId );
		$toPlayerId = intval( $toPlayerId );
		$fromVillageId = intval( $fromVillageId );
		$toVillageId = intval( $toVillageId );
		$fromPlayerName = $this->getPlayerName( $fromPlayerId );
		$toPlayerName = $this->getPlayerName( $toPlayerId );
		$fromVillageName = $this->getVillageName( $fromVillageId );
		$toVillageName = $this->getVillageName( $toVillageId );
		$this->provider->executeQuery( "INSERT p_rpts SET from_player_id=%s, from_player_name='%s', to_player_id=%s, to_player_name='%s', from_village_id=%s, from_village_name='%s', to_village_id=%s, to_village_name='%s', rpt_cat=%s, rpt_result=%s, rpt_body='%s', creation_date=DATE_ADD(NOW(), INTERVAL %s SECOND), read_status=0, delete_status=0", array( $fromPlayerId, $fromPlayerName, $toPlayerId, $toPlayerName, $fromVillageId, $fromVillageName, $toVillageId, $toVillageName, $reportCategory, $reportResult, $body, $timeInSeconds ) );
		$reportId = intval( $this->provider->fetchScalar( "SELECT LAST_INSERT_ID() FROM p_rpts" ) );
		$this->provider->executeQuery( "UPDATE p_players p SET p.new_report_count=p.new_report_count+1 WHERE p.id=%s", array( $fromPlayerId ) );
		if($fromPlayerId != $toPlayerId){
			$this->provider->executeQuery( "UPDATE p_players p SET p.new_report_count=p.new_report_count+1 WHERE p.id=%s", array( $toPlayerId ) );
		}
		while(0 < ( $rid = $this->provider->fetchScalar( "SELECT MIN(r.id) id FROM p_rpts r WHERE r.delete_status!=1 AND r.to_player_id=%s GROUP BY r.from_player_id HAVING COUNT(*)>%s", array( $toPlayerId, $this->maxReportBoxSize ) ) ) ){
			$this->deleteReport( $toPlayerId, $rid );
		}
		while( !( $fromPlayerId != $toPlayerId ) || !( 0 < ( $rid = $this->provider->fetchScalar( "SELECT MIN(r.id) id FROM p_rpts r WHERE r.delete_status!=2 AND r.from_player_id=%s GROUP BY r.from_player_id HAVING COUNT(*)>%s", array( $fromPlayerId, $this->maxReportBoxSize))))){
			$this->deleteReport( $fromPlayerId, $rid );
		}
		return $reportId;
	}

	public function syncReports($playerId){
		$newCount = intval( $this->provider->fetchScalar( "SELECT COUNT(*) FROM p_rpts r WHERE  ((r.to_player_id=%s AND r.delete_status!=1) OR (r.from_player_id=%s AND r.delete_status!=2)) AND (IF(r.to_player_id=%s, r.read_status=1 OR r.read_status=3, r.read_status=2 OR r.read_status=3) = FALSE)", array( $playerId, $playerId, $playerId ) ) );
		if($newCount < 0){
			$newCount = 0;
		}
		$this->provider->executeQuery( "UPDATE p_players p SET p.new_report_count=%s WHERE p.id=%s", array( $newCount, $playerId ) );
		return $newCount;
	}
}