<?php
class StatisticsModel extends ModelBase{

	public function tatarRaised(){
		return $this->provider->fetchScalar( "SELECT COUNT(*) FROM p_queue q WHERE q.proc_type=%s", array( QS_TATAR_RAISE ) ) == 0;
	}

	public function getTatarVillagesList(){
		return $this->provider->fetchResultSet( "SELECT  v.id, v.player_id, v.alliance_id, v.player_name, v.village_name, v.alliance_name, v.buildings FROM p_villages v WHERE v.is_capital=0 AND v.is_special_village=1 ORDER BY v.id ASC" );
	}

	public function getPlayerListCount($tribeId){
		return $tribeId == 0 ? $this->provider->fetchScalar( "SELECT COUNT(*) FROM p_players p WHERE p.player_type!=%s", array( PLAYERTYPE_TATAR ) ) : $this->provider->fetchScalar( "SELECT COUNT(*) FROM p_players p WHERE p.player_type!=%s AND p.tribe_id=%s", array( PLAYERTYPE_TATAR, $tribeId ) );
	}

	public function getPlayerList($pageIndex, $pageSize, $tribeId){
		return $tribeId == 0 ? $this->provider->fetchResultSet( "SELECT  p.id, p.player_type, p.is_blocked, p.gold_num, p.name, p.alliance_id, p.alliance_name, p.total_people_count, p.villages_count FROM p_players p WHERE  p.player_type!=%s ORDER BY (p.total_people_count*10+p.villages_count) DESC, p.id ASC LIMIT %s,%s", array( PLAYERTYPE_TATAR, $pageIndex * $pageSize, $pageSize ) ) : $this->provider->fetchResultSet( "SELECT  p.id, p.player_type, p.is_blocked, p.gold_num, p.name, p.alliance_id, p.alliance_name, p.total_people_count, p.villages_count FROM p_players p WHERE  p.player_type!=%s AND p.tribe_id=%s ORDER BY (p.total_people_count*10+p.villages_count) DESC, p.id ASC LIMIT %s,%s", array( PLAYERTYPE_TATAR, $tribeId, $pageIndex * $pageSize, $pageSize ) );
	}

	public function getPlayerRankById($playerId, $tribeId){
		$row = $this->provider->fetchRow( "SELECT  p.id, (p.total_people_count*10+p.villages_count) score FROM p_players p WHERE  p.id=%s AND p.player_type!=%s LIMIT 1", array( $playerId, PLAYERTYPE_TATAR ) );
		return $this->getPlayerRank( $row['id'], $row['score'], $tribeId );
	}

	public function getPlayerRankByName( $playerName, $tribeId ){
		$row = $this->provider->fetchRow( "SELECT  p.id, (p.total_people_count*10+p.villages_count) score FROM p_players p WHERE  p.player_type!=%s AND p.name LIKE '%s%%' LIMIT 1", array( PLAYERTYPE_TATAR, $playerName ) );
		return $this->getPlayerRank( $row['id'], $row['score'], $tribeId );
	}

	public function getPlayerRank( $playerId, $score, $tribeId ){
		$score = intval( $score );
		$playerId = intval( $playerId );
		$tribeId = intval( $tribeId );
		return $tribeId == 0 ? $this->provider->fetchScalar( "SELECT ( (SELECT \tCOUNT(*) FROM p_players p WHERE p.player_type!=%s AND (p.total_people_count*10+p.villages_count)>%s)  + (SELECT  \tCOUNT(*) FROM p_players p WHERE p.player_type!=%s  \tAND p.id<%s  \tAND (p.total_people_count*10+p.villages_count)=%s) ) + 1 rank", array( PLAYERTYPE_TATAR, $score, PLAYERTYPE_TATAR, $playerId, $score ) ) : $this->provider->fetchScalar( "SELECT ( (SELECT \tCOUNT(*) FROM p_players p WHERE p.player_type!=%s AND (p.total_people_count*10+p.villages_count)>%s AND p.tribe_id=%s)  + (SELECT  \tCOUNT(*) FROM p_players p WHERE p.player_type!=%s  \tAND p.id<%s  \tAND (p.total_people_count*10+p.villages_count)=%s AND p.tribe_id=%s) ) + 1 rank", array( PLAYERTYPE_TATAR, $score, $tribeId, PLAYERTYPE_TATAR, $playerId, $score, $tribeId ) );
	}

	public function getVillageListCount( ){
		return $this->provider->fetchScalar( "SELECT COUNT(*)  FROM p_villages v WHERE NOT ISNULL(v.player_id) AND v.is_oasis=0" );
	}

	public function getVillagesList( $pageIndex, $pageSize ){
		return $this->provider->fetchResultSet( "SELECT  v.id, v.player_id, v.village_name, v.player_name, v.people_count, v.rel_x, v.rel_y FROM p_villages v WHERE NOT ISNULL(v.player_id) AND v.is_oasis=0 ORDER BY v.people_count DESC, v.id DESC LIMIT %s,%s", array( $pageIndex * $pageSize, $pageSize ) );
	}

	public function getVillageRankByName( $villageName ){
		$row = $this->provider->fetchRow( "SELECT  v.id, (v.people_count) score FROM p_villages v WHERE  NOT ISNULL(v.player_id) AND v.is_oasis=0 AND v.village_name LIKE '%s%%' LIMIT 1", array( $villageName ) );
		return $this->getVillageRank( $row['id'], $row['score'] );
	}

    public function getVillageRankById( $villageId )
    {
        $row = $this->provider->fetchRow( "SELECT  v.id, (v.people_count) score FROM p_villages v WHERE  v.id=%s AND NOT ISNULL(v.player_id) AND v.is_oasis=0 LIMIT 1", array( $villageId ) );
        return $this->getVillageRank( $row['id'], $row['score'] );
    }

    public function getVillageRank( $villageId, $score )
    {
        $score = intval( $score );
        $villageId = intval( $villageId );
        return $this->provider->fetchScalar( "SELECT ( (SELECT COUNT(*) FROM p_villages v WHERE  NOT ISNULL(v.player_id) AND v.is_oasis=0 AND v.people_count>%s) + (SELECT  COUNT(*) FROM p_villages v WHERE  NOT ISNULL(v.player_id) AND v.is_oasis=0 AND v.people_count=%s AND v.id>%s) ) + 1 rank", array( $score, $score, $villageId ) );
    }

    public function getAllianceListCount( )
    {
        return $this->provider->fetchScalar( "SELECT COUNT(*)  FROM p_alliances a" );
    }

    public function getAlliancesList( $pageIndex, $pageSize )
    {
        return $this->provider->fetchResultSet( "SELECT  a.id, a.name, a.player_count, a.rating FROM p_alliances a ORDER BY a.rating DESC, a.player_count DESC, a.id ASC LIMIT %s,%s", array( $pageIndex * $pageSize, $pageSize ) );
    }

    public function getAllianceRankByName( $allianceName )
    {
        $row = $this->provider->fetchRow( "SELECT  a.id, (a.rating*100+a.player_count) score FROM p_alliances a WHERE a.name LIKE '%s%%' LIMIT 1", array( $allianceName ) );
        return intval( $row['id'] ) == 0 ? 0 : $this->getAllianceRank( intval( $row['id'] ), intval( $row['score'] ) );
    }

    public function getAllianceRankById( $allianceId )
    {
        $row = $this->provider->fetchRow( "SELECT  a.id, (a.rating*100+a.player_count) score FROM p_alliances a WHERE  a.id=%s LIMIT 1", array( $allianceId ) );
        return intval( $row['id'] ) == 0 ? 0 : $this->getAllianceRank( intval( $row['id'] ), intval( $row['score'] ) );
    }

	public function getAllianceRank($allianceId, $score){
		return $this->provider->fetchScalar( "
				SELECT (
						(SELECT COUNT(*) FROM p_alliances a WHERE  (a.rating*100+a.player_count)>%s) + 
						(SELECT  COUNT(*) FROM p_alliances a WHERE  (a.rating*100+a.player_count)=%s AND a.id<%s)
				) + 1 rank", $allianceId);
	}

    public function getHeroListCount( )
    {
        return $this->provider->fetchScalar( "SELECT COUNT(*)  FROM p_players p WHERE p.player_type!=%s AND p.hero_troop_id>0", array( PLAYERTYPE_TATAR ) );
    }

	public function getHerosList( $pageIndex, $pageSize ){
		return $this->provider->fetchResultSet( "SELECT  p.id, p.name, p.hero_troop_id, p.hero_level, p.hero_points, IFNULL(p.hero_name, p.name) hero_name FROM p_players p WHERE p.player_type!=%s AND p.hero_troop_id>0 ORDER BY (p.hero_points*10+p.hero_level) DESC, p.id ASC LIMIT %s,%s", array( PLAYERTYPE_TATAR, $pageIndex * $pageSize, $pageSize ) );
	}

    public function getHeroRankById( $playerId )
    {
        $row = $this->provider->fetchRow( "SELECT  p.id, p.hero_troop_id, (p.hero_points*10+p.hero_level) score FROM p_players p WHERE  p.id=%s AND p.player_type!=%s AND p.hero_troop_id>0 LIMIT 1", array( $playerId, PLAYERTYPE_TATAR ) );
        return intval( $row['hero_troop_id'] ) == 0 ? 0 : $this->getHeroRank( $row['id'], $row['score'] );
    }

    public function getHeroRankByName( $playerName )
    {
        $row = $this->provider->fetchRow( "SELECT  p.id, p.hero_troop_id, (p.hero_points*10+p.hero_level) score FROM p_players p WHERE  p.player_type!=%s AND p.hero_troop_id>0 AND IFNULL(p.hero_name, p.name) LIKE '%s%%' LIMIT 1", array( PLAYERTYPE_TATAR, $playerName ) );
        return intval( $row['hero_troop_id'] ) == 0 ? 0 : $this->getHeroRank( $row['id'], $Var_432 );
    }

    public function getHeroRank( $playerId, $score )
    {
        $score = intval( $score );
        $playerId = intval( $playerId );
        return $this->provider->fetchScalar( "SELECT ( (SELECT COUNT(*) FROM p_players p WHERE  (p.hero_points*10+p.hero_level)>%s AND p.player_type!=%s AND p.hero_troop_id>0) + (SELECT  COUNT(*) FROM p_players p WHERE (p.hero_points*10+p.hero_level)=%s AND p.id<%s AND p.player_type!=%s AND p.hero_troop_id>0) ) + 1 rank", array( $score, PLAYERTYPE_TATAR, $score, $playerId, PLAYERTYPE_TATAR ) );
    }

    public function getGeneralSummary( )
    {
        $sessionTimeoutInSeconds = $GLOBALS['GameMetadata']['session_timeout'] * 60;
        $row = $this->provider->fetchRow( "SELECT  gs.players_count, gs.active_players_count,  gs.Dboor_players_count, gs.Arab_players_count, gs.Roman_players_count, gs.Teutonic_players_count, gs.Gallic_players_count FROM g_summary gs" );
        $row['online_players_count'] = $this->provider->fetchScalar( "SELECT COUNT(*) FROM p_players p WHERE TIME_TO_SEC(TIMEDIFF(NOW(), p.last_login_date)) <= %s", array( $sessionTimeoutInSeconds ) );
        return $row;
    }

    public function getPlayersPointsListCount( )
    {
        return $this->provider->fetchScalar( "SELECT COUNT(*)  FROM p_players p WHERE p.player_type!=%s", array( PLAYERTYPE_TATAR ) );
    }

    public function getPlayersPointsList( $pageIndex, $pageSize, $isDefense )
    {
        return $this->provider->fetchResultSet( "SELECT  p.id, p.name, p.total_people_count, p.villages_count, p.%s points FROM p_players p WHERE  p.player_type!=%s ORDER BY (p.%s) DESC, p.id ASC LIMIT %s,%s", array( $isDefense ? "defense_points" : "attack_points", PLAYERTYPE_TATAR, $isDefense ? "defense_points" : "attack_points", $pageIndex * $pageSize, $pageSize ) );
    }

    public function getPlayersPointsById($playerId, $isDefense){
		$row = $this->provider->fetchRow( "SELECT  p.id, p.%s score FROM p_players p WHERE  p.id=%s AND p.player_type!=%s LIMIT 1", array( $isDefense ? "defense_points" : "attack_points", $playerId, PLAYERTYPE_TATAR ) );
		return $this->getPlayersPointsRank( $playerId, $row['score'], $isDefense );
	}

    public function getPlayersPointsByName( $playerName, $isDefense )
    {
        $row = $this->provider->fetchRow( "SELECT  p.id, p.%s score FROM p_players p WHERE  p.player_type!=%s AND p.name LIKE '%s%%' LIMIT 1", array( $isDefense ? "defense_points" : "attack_points", PLAYERTYPE_TATAR, $playerName ) );
        return $this->getPlayersPointsRank( $row['id'], $row['score'], $isDefense );
    }

    public function getPlayersPointsRank( $playerId, $score, $isDefense )
    {
        $score = intval( $score );
        $playerId = intval( $playerId );
        return $this->provider->fetchScalar( "SELECT ( (SELECT COUNT(*) FROM p_players p WHERE p.player_type!=%s AND p.%s>%s) + (SELECT  COUNT(*) FROM p_players p WHERE p.player_type!=%s AND p.id<%s AND p.%s=%s) ) + 1 rank", array( PLAYERTYPE_TATAR, $isDefense ? "defense_points" : "attack_points", $score, PLAYERTYPE_TATAR, $playerId, $isDefense ? "defense_points" : "attack_points", $score ) );
    }

    public function getAlliancePointsListCount( )
    {
        return $this->provider->fetchScalar( "SELECT COUNT(*)  FROM p_alliances a" );
    }

    public function getAlliancePointsList( $pageIndex, $pageSize, $isDefense )
    {
        return $this->provider->fetchResultSet( "SELECT  a.id, a.name, a.player_count, a.%s points FROM p_alliances a ORDER BY a.%s DESC, a.id ASC LIMIT %s,%s", array( $isDefense ? "defense_points" : "attack_points", $isDefense ? "defense_points" : "attack_points", $pageIndex * $pageSize, $pageSize ) );
    }

    public function getAlliancePointsRankByName( $allianceName, $isDefense )
    {
        $row = $Var_72->fetchRow( "SELECT  a.id, a.%s score FROM p_alliances a WHERE a.name LIKE '%s%%' LIMIT 1", array( $isDefense ? "defense_points" : "attack_points", $allianceName ) );
        return intval( $row['id'] ) == 0 ? 0 : $this->getAlliancePointsRank( intval( $row['id'] ), intval( $row['score'] ), $isDefense );
    }

    public function getAlliancePointsRankById( $allianceId, $isDefense )
    {
        $row = $this->provider->fetchRow( "SELECT  a.id, a.%s score FROM p_alliances a WHERE  a.id=%s LIMIT 1", array( $isDefense ? "defense_points" : "attack_points", $allianceId ) );
        return intval( $row['id'] ) == 0 ? 0 : $this->getAlliancePointsRank( intval( $row['id'] ), intval( $row['score'] ), $isDefense );
    }

    public function getAlliancePointsRank( $allianceId, $score, $isDefense )
    {
        return $this->provider->fetchScalar( "SELECT ( (SELECT COUNT(*) FROM p_alliances a WHERE  a.%s>%s) + (SELECT  COUNT(*) FROM p_alliances a WHERE  a.%s=%s AND a.id<%s) ) + 1 rank", array( $isDefense ? "defense_points" : "attack_points", $score, $isDefense ? "defense_points" : "attack_points", $score, $allianceId ) );
    }

    public function getTop10( $isPlayer, $columnName )
    {
        return $this->provider->fetchResultSet( "SELECT t.id, t.name, t.%s points FROM %s t WHERE  t.%s>0 ORDER BY t.%s DESC, t.id ASC LIMIT 10", array( $columnName, $isPlayer ? "p_players" : "p_alliances", $columnName, $columnName ) );
    }

    public function getAlliancePoint( $id, $columnName )
    {
        return $this->provider->fetchScalar( "SELECT t.%s points FROM p_alliances t WHERE t.id=%s", array( $columnName, $id ) );
    }

    public function getPlayerType( $playerId )
    {
        return $this->provider->fetchScalar( "SELECT p.player_type FROM p_players p WHERE p.id=%s", array( $playerId ) );
    }

    public function togglePlayerStatus( $playerId )
    {
        $this->provider->executeQuery( "UPDATE p_players p SET p.is_blocked=IF(p.is_blocked=1, 0, 1) WHERE  p.id=%s AND p.player_type=%s", array( $playerId, PLAYERTYPE_NORMAL ) );
    }

    public function setPlayerGold( $playerId, $goldNum )
    {
        $this->provider->executeQuery( "UPDATE p_players p SET p.gold_num=%s WHERE  p.id=%s", array( $goldNum, $playerId ) );
    }
}