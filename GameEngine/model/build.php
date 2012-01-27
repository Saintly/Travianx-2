<?php
class BuildModel extends ModelBase{

    public function getVillageOases( $villageOasesid )
    {
        if ( $villageOasesid == "" )
        {
            return NULL;
        }
        return $this->provider->fetchResultSet( "SELECT\r\n\t\t\t\tv.id,\r\n\t\t\t\tv.rel_x, v.rel_y, \r\n\t\t\t\tv.image_num, \r\n\t\t\t\tv.allegiance_percent\r\n\t\t\tFROM\r\n\t\t\t\tp_villages v \r\n\t\t\tWHERE\r\n\t\t\t\tv.id IN (%s)", array( $villageOasesid ) );
    }

    public function getChildVillagesFor( $villageIds )
    {
        if ( $villageIds == "" )
        {
            return NULL;
        }
        return $this->provider->fetchResultSet( "SELECT\r\n\t\t\t\tv.id,\r\n\t\t\t\tv.village_name,\r\n\t\t\t\tv.people_count,\r\n\t\t\t\tv.rel_x, v.rel_y,\r\n\t\t\t\tDATE_FORMAT(v.creation_date, '%%Y/%%m/%%d') creation_date\r\n\t\t\tFROM\r\n\t\t\t\tp_villages v \r\n\t\t\tWHERE\r\n\t\t\t\tv.id IN (%s)", array( $villageIds ) );
    }

    public function getVillagesCp( $villages_id )
    {
        return $this->provider->fetchResultSet( "SELECT\r\n\t\t\t\tv.cp,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds\r\n\t\t\tFROM p_villages v\r\n\t\t\tWHERE v.id IN (%s)", array( $villages_id ) );
    }

    public function getVillageDataByName( $villagesName )
    {
        return $this->provider->fetchRow( "SELECT v.id, v.rel_x, v.rel_y, v.village_name, v.player_id, v.player_name FROM p_villages v WHERE v.is_oasis=0 AND v.village_name='%s'", array( $villagesName ) );
    }

    public function getVillageDataById( $villagesId )
    {
        return $this->provider->fetchRow( "SELECT v.id, v.rel_x, v.rel_y, v.village_name, v.player_id, v.player_name FROM p_villages v WHERE v.id='%s' AND NOT ISNULL(v.player_id) AND v.is_oasis=0", array( $villagesId ) );
    }

    public function getVillageName( $villageId )
    {
        return $this->provider->fetchScalar( "SELECT v.village_name FROM p_villages v WHERE v.id=%s", array( $villageId ) );
    }

    public function getPlayerName( $playerId )
    {
        return $this->provider->fetchScalar( "SELECT p.name FROM p_players p WHERE p.id=%s", array( $playerId ) );
    }

    public function getPlayType( $player_id )
    {
        return $this->provider->fetchScalar( "SELECT p.player_type FROM p_players p WHERE p.id=%s", array( $player_id ) );
    }

    public function getPlayerAllianceId( $Var_0 )
    {
        return $this->provider->fetchScalar( "SELECT p.alliance_id FROM p_players p WHERE p.id=%s", array( $playerId ) );
    }

    public function getOffers( $villageId )
    {
        return $this->provider->fetchResultSet( "SELECT m.* FROM p_merchants m WHERE m.village_id=%s ORDER BY m.id ASC", array( $villageId ) );
    }

    public function getAllOffersCount( $villageId, $x, $y, $radius, $speed )
    {
        $angle = $radius / 180;
        $x /= $angle;
        $y /= $angle;
        return $this->provider->fetchScalar( "SELECT \r\n\t\t\t\tCOUNT(*)\r\n\t\t\tFROM p_merchants m \r\n\t\t\tWHERE\r\n\t\t\t\tm.village_id!=%s\r\n\t\t\t\tAND IF(m.max_time>0, \r\n\t\t\t\t\t((ACOS(SIN(%s * PI() / 180) * SIN(m.village_x/%s * PI() / 180) + COS(%s * PI() / 180) * COS(m.village_x/%s * PI() / 180) * COS((%s - m.village_y/%s) * PI() / 180)) * 180 / PI()) * %s)/%s*3600\r\n\t\t\t\t\t<=m.max_time*3600,\r\n\t\t\t\t1)", array( $villageId, $x, $angle, $x, $angle, $y, $angle, $angle, $speed ) );
    }

    public function getAllOffers( $villageId, $x, $y, $radius, $speed, $pageIndex, $pageSize )
    {
        $angle = $radius / 180;
        $x /= $angle;
        $y /= $angle;
        return $this->provider->fetchResultSet( "SELECT \r\n\t\t\t\tm.*,\r\n\t\t\t\t((ACOS(SIN(%s * PI() / 180) * SIN(m.village_x/%s * PI() / 180) + COS(%s * PI() / 180) * COS(m.village_x/%s * PI() / 180) * COS((%s - m.village_y/%s) * PI() / 180)) * 180 / PI()) * %s)/m.merchants_speed*3600  timeInSeconds\r\n\t\t\tFROM p_merchants m \r\n\t\t\tHAVING\r\n\t\t\t\tm.village_id!=%s\r\n\t\t\t\tAND IF(m.max_time>0, timeInSeconds*m.merchants_speed/%s<=m.max_time*3600,1)\r\n\t\t\tORDER BY timeInSeconds ASC\r\n\t\t\tLIMIT %s,%s", array( $x, $angle, $x, $angle, $y, $angle, $angle, $villageId, $speed, $pageIndex * $pageSize, $pageSize ) );
    }

    public function getOffer( $offerId, $playerId, $villageId )
    {
        return $this->provider->fetchRow( "SELECT m.* FROM p_merchants m WHERE id=%s AND player_id=%s AND village_id=%s", array( $offerId, $playerId, $villageId ) );
    }

    public function getOffer2( $offerId, $x, $y, $radius )
    {
        $angle = $radius / 180;
        $x /= $angle;
        $y /= $angle;
        return $this->provider->fetchRow( "SELECT \r\n\t\t\t\tm.*,\r\n\t\t\t\t((ACOS(SIN(%s * PI() / 180) * SIN(m.village_x/%s * PI() / 180) + COS(%s * PI() / 180) * COS(m.village_x/%s * PI() / 180) * COS((%s - m.village_y/%s) * PI() / 180)) * 180 / PI()) * %s)/m.merchants_speed*3600  timeInSeconds\r\n\t\t\tFROM p_merchants m \r\n\t\t\tWHERE \r\n\t\t\t\tid=%s", array( $x, $angle, $x, $angle, $y, $angle, $angle, $offerId ) );
    }

    public function removeMerchantOffer( $offerId, $playerId, $villageId )
    {
        $merchants_num = intval( $this->provider->fetchScalar( "SELECT merchants_num FROM p_merchants WHERE id=%s", array( intval( $offerId ) ) ) );
        if ( $merchants_num <= 0 )
        {
        }
        else
        {
            $this->provider->executeQuery( "UPDATE p_villages v SET \r\n\t\t\tv.offer_merchants_count=IF(v.offer_merchants_count-%s<0, 0, v.offer_merchants_count-%s)\r\n\t\t\tWHERE\r\n\t\t\t\tv.id=%s", array( $merchants_num, $merchants_num, $villageId ) );
            $this->provider->executeQuery( "DELETE FROM p_merchants WHERE id=%s AND player_id=%s AND village_id=%s", array( intval( $offerId ), $playerId, $villageId ) );
        }
    }

    public function addMerchantOffer( $playerId, $playerName, $villageId, $x, $y, $merchantNum, $offer, $allianceOnly, $maxTime, $merchantsSpeed )
    {
        $this->provider->executeQuery( "INSERT INTO p_merchants SET \r\n\t\t\tplayer_id=%s,\r\n\t\t\tplayer_name='%s',\r\n\t\t\tvillage_id=%s,\r\n\t\t\tvillage_x=%s,\r\n\t\t\tvillage_y=%s,\r\n\t\t\toffer='%s',\r\n\t\t\talliance_only=%s,\r\n\t\t\tmax_time=%s,\r\n\t\t\tmerchants_num=%s,\r\n\t\t\tmerchants_speed=%s", array( $playerId, $playerName, $villageId, $x, $offer, $allianceOnly ? 1 : 0, $maxTime, $merchantNum, $merchantsSpeed ) );
        $this->provider->executeQuery( "UPDATE p_villages v SET \r\n\t\t\tv.offer_merchants_count=v.offer_merchants_count+%s\r\n\t\t\tWHERE\r\n\t\t\t\tv.id=%s", array( $merchantNum, $villageId ) );
    }

    public function makeVillageAsCapital( $playerId, $villageId )
    {
        $mq = new QueueJobModel( );
        $capitalRow = $this->provider->fetchRow( "SELECT v.id, v.buildings FROM p_villages v WHERE  v.player_id=%s AND v.is_capital=1", array( $playerId ) );
        $buildingArr = explode( ",", $capitalRow['buildings'] );
        $c = 0;
        foreach ( $buildingArr as $buildingItem )
        {
            ++$c;
            $update_state = explode( " ", $buildingItem[2] );
            $level = explode( " ", $buildingItem[1] );
            $item_id = explode( " ", $buildingItem[0] );
            if ( $item_id == 0 )
            {
                continue;
            }
            $max_lvl_in_non_capital = $GLOBALS['GameMetadata']['items'][$item_id]['max_lvl_in_non_capital'];
            if ( $max_lvl_in_non_capital == NULL || $level + $update_state <= $max_lvl_in_non_capital )
            {
                continue;
            }
            $dropLevels = $level + $update_state - $max_lvl_in_non_capital;
            do
            {
                if ( 0 < $dropLevels-- )
                {
                    $mq->upgradeBuilding( $capitalRow['id'], $c, $item_id, TRUE );
                }
            } while ( 1 );
        }
        $this->provider->executeQuery( "UPDATE p_villages v SET v.is_capital=0 WHERE v.player_id=%s", array( $playerId ) );
        $this->provider->executeQuery( "UPDATE p_villages v SET v.is_capital=1 WHERE v.id=%s AND v.player_id=%s", array( $villageId, $playerId ) );
    }

    public function changeHeroName( $playerId, $heroName )
    {
        $this->provider->executeQuery( "UPDATE p_players p SET p.hero_name='%s' WHERE p.id=%s", array( $heroName, $playerId ) );
    }

    public function decreaseGoldNum( $playerId, $goldCost )
    {
        $this->provider->executeQuery( "UPDATE p_players p SET p.gold_num=p.gold_num-%s WHERE p.id=%s", array( $goldCost, $playerId ) );
    }

    public function allianceExists( $allianceName )
    {
        return 0 < intval( $this->provider->fetchScalar( "SELECT a.id FROM p_alliances a WHERE a.name='%s'", array( $allianceName ) ) );
    }

    public function createAlliance( $playerId, $allianceName, $allianceName2, $maxPlayer )
    {
        $allianceRoles = ( ALLIANCE_ROLE_SETROLES | ALLIANCE_ROLE_REMOVEPLAYER | ALLIANCE_ROLE_EDITNAMES | ALLIANCE_ROLE_EDITCONTRACTS | ALLIANCE_ROLE_SENDMESSAGE | ALLIANCE_ROLE_INVITEPLAYERS )." ".alliance_creator;
        $this->provider->executeQuery( "INSERT INTO p_alliances \r\n\t\t\tSET \r\n\t\t\t\tname='%s', \r\n\t\t\t\tname2='%s', \r\n\t\t\t\tcreator_player_id=%s, \r\n\t\t\t\trating=0, \r\n\t\t\t\tcreation_date=NOW(),\r\n\t\t\t\tplayer_count=1,\r\n\t\t\t\tmax_player_count=%s,\r\n\t\t\t\tplayers_ids='%s'", array( $allianceName, $allianceName2, $playerId, $maxPlayer, $playerId ) );
        $aid = $this->provider->fetchScalar( "SELECT LAST_INSERT_ID() FROM p_alliances" );
        $this->provider->executeQuery( "UPDATE p_players p SET p.alliance_id=%s, p.alliance_name='%s', p.alliance_roles='%s' WHERE p.id=%s", array( $aid, $allianceName, $allianceRoles, $playerId ) );
        $this->provider->executeQuery( "UPDATE p_villages v SET v.alliance_id=%s, v.alliance_name='%s' WHERE v.player_id=%s", array( $aid, $allianceName, $playerId ) );
        return $aid;
    }

    public function acceptAllianceJoining( $playerId, $allianceId )
    {
        $row = $this->provider->fetchRow( "SELECT a.* FROM p_alliances a WHERE a.id=%s", array( $allianceId ) );
        if ( $row == NULL )
        {
            return 0;
        }
        if ( $row['max_player_count'] <= $row['player_count'] )
        {
            return 1;
        }
        $allianceName = $row['name'];
        $players_ids = $row['players_ids'];
        if ( $players_ids != "" )
        {
            $players_ids .= ",";
        }
        $players_ids .= $playerId;
        $this->provider->executeQuery( "UPDATE p_alliances a SET a.player_count=a.player_count+1, a.players_ids='%s' WHERE a.id=%s", array( $players_ids, $allianceId ) );
        $this->provider->executeQuery( "UPDATE p_players p SET p.alliance_id=%s, p.alliance_name='%s' WHERE p.id=%s", array( $allianceId, $allianceName, $playerId ) );
        $this->provider->executeQuery( "UPDATE p_villages v SET v.alliance_id=%s, v.alliance_name='%s' WHERE v.player_id=%s", array( $allianceId, $allianceName, $playerId ) );
        return 2;
    }

    public function _getNewInvite( $invitesString, $removeId )
    {
        if ( $invitesString == "" )
        {
            return "";
        }
        $result = "";
        $arr = explode( "\n", $invitesString );
        foreach ( $arr as $invite )
        {
            $name = explode( " ", $invite[1], 2 );
            $id = explode( " ", $invite[0], 2 );
            if ( $id == $removeId )
            {
                continue;
            }
            if ( $result != "" )
            {
                $result .= "\n";
            }
            $result .= $id." ".$name;
        }
        return $result;
    }

    public function removeAllianceInvites( $playerId, $allianceId )
    {
        $pRow = $this->provider->fetchRow( "SELECT p.name, p.invites_alliance_ids FROM p_players p WHERE p.id=%s", array( $playerId ) );
        $aRow = $this->provider->fetchRow( "SELECT a.name, a.invites_player_ids FROM p_alliances a WHERE a.id=%s", array( $allianceId ) );
        $pInvitesStr = $this->_getNewInvite( trim( $pRow['invites_alliance_ids'] ), $allianceId );
        $aInvitesStr = $this->_getNewInvite( trim( $aRow['invites_player_ids'] ), $playerId );
        $this->provider->executeQuery( "UPDATE p_players p SET p.invites_alliance_ids='%s' WHERE p.id=%s", array( $pInvitesStr, $playerId ) );
        $this->provider->executeQuery( "UPDATE p_alliances a SET a.invites_player_ids='%s' WHERE a.id=%s", array( $aInvitesStr, $allianceId ) );
    }

    public function getVillageData2ById( $villageId )
    {
        return $this->provider->fetchRow( "SELECT v.id, v.tribe_id, v.is_oasis, v.village_name, v.player_id, v.player_name FROM p_villages v WHERE v.id=%s", array( $villageId ) );
    }

    public function getOasesDataById( $villagesId )
    {
        return $this->provider->fetchResultSet( "SELECT v.id, v.tribe_id, v.rel_x, v.rel_y, v.troops_num, v.player_id, v.player_name FROM p_villages v WHERE v.id IN(%s)", array( $villagesId ) );
    }

}

?>
