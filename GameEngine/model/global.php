<?php 
class GlobalModel extends ModelBase{

	public function getSiteNews(){
		return $this->provider->fetchScalar( "SELECT gs.news_text FROM g_summary gs" );
	}

	public function setSelectedVillage($playerId, $villageId){
		$this->provider->executeQuery( "UPDATE p_players p SET p.selected_village_id=%s WHERE  p.id=%s", array( $villageId, $playerId ) );
	}

	public function hasVillage( $playerId, $villageId ){
		return intval( $this->provider->fetchScalar( "SELECT v.player_id FROM p_villages v WHERE v.id=%s", array( $villageId ) ) ) == $playerId;
	}

	public function getVillageData( $playerId ){
		$GameMetadata = $GLOBALS['GameMetadata'];
		$protectionPeriod = intval( $GameMetadata['player_protection_period'] / $GameMetadata['game_speed'] );
		$sessionTimeoutInSeconds = $GameMetadata['session_timeout'] * 60;
		$data = $this->provider->fetchRow( "SELECT p.alliance_id, p.alliance_name, p.alliance_roles, p.house_name, p.avatar, p.birth_date, p.gender, p.description1,  p.description2, p.agent_for_players, p.my_agent_players, p.medals, p.total_people_count, p.villages_count, p.player_type, p.active_plus_account, p.name, p.pwd, p.email, p.custom_links, p.new_report_count, p.new_mail_count, p.selected_village_id, p.villages_id,  p.villages_data, p.friend_players, p.gold_num, p.notes, p.week_attack_points, p.week_defense_points, p.week_dev_points, p.week_thief_points, p.hero_troop_id, p.hero_level, p.hero_points, p.hero_name, p.hero_in_village_id, p.invites_alliance_ids, p.guide_quiz, p.new_gnews, p.create_nvil, DATE_FORMAT(p.registration_date, '%%Y/%%m/%%d %%H:%%i') registration_date,  TIMEDIFF(DATE_ADD(p.registration_date, INTERVAL %s SECOND), NOW()) protection_remain, TIME_TO_SEC(TIMEDIFF(DATE_ADD(p.registration_date, INTERVAL %s SECOND), NOW())) protection_remain_sec, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(p.birth_date)), '%%Y')+0 age, TIME_TO_SEC(TIMEDIFF(NOW(), p.last_login_date)) last_login_sec FROM p_players p WHERE p.id=%s", array( $protectionPeriod, $protectionPeriod, $playerId ) );
		if($data == NULL){
			return NULL;
		}
		if ( $sessionTimeoutInSeconds <= $data['last_login_sec'] ){
			$this->provider->executeQuery( "UPDATE p_players p SET p.last_login_date=NOW() WHERE p.id=%s", array( $playerId ) );
		}
		$data2 = $this->provider->fetchRow( "SELECT\r\n\t\t\t\tv.rel_x, v.rel_y,\r\n\t\t\t\tv.parent_id, v.tribe_id,\r\n\t\t\t\tv.field_maps_id,\r\n\t\t\t\tv.village_name,\r\n\t\t\t\tv.is_capital, v.is_special_village,\r\n\t\t\t\tv.people_count,\r\n\t\t\t\tv.crop_consumption,\r\n\t\t\t\tv.time_consume_percent,\r\n\t\t\t\tv.resources, v.buildings, v.cp,\r\n\t\t\t\tv.troops_training, v.troops_num,\r\n\t\t\t\tv.troops_trapped_num, v.troops_intrap_num, v.troops_out_num, v.troops_out_intrap_num, \r\n\t\t\t\tv.allegiance_percent,\r\n\t\t\t\tv.child_villages_id, v.village_oases_id,\r\n\t\t\t\tv.offer_merchants_count,\r\n\t\t\t\tv.update_key,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds\r\n\t\t\tFROM p_villages v\r\n\t\t\tWHERE v.id=%s", array( $data['selected_village_id'] ) );
        if ( $data2 == NULL )
        {
            return NULL;
        }
        foreach ( $data2 as $k => $v )
        {
            $data[$k] = $v;
        }
        unset( $data2 );
        $row = $this->provider->fetchRow( "SELECT g.game_over, g.game_transient_stopped FROM g_settings g" );
        $data['gameStatus'] = intval( $row['game_over'] ) | intval( $row['game_transient_stopped'] ) << 1;
        return $data;
    }

    public function isGameOver( )
    {
        return intval( $this->provider->fetchScalar( "SELECT g.game_over FROM g_settings g" ) ) == 1;
    }

    public function resetNewVillageFlag( $playerId )
    {
        $this->provider->executeQuery( "UPDATE p_players p SET p.create_nvil=0 WHERE p.id=%s", array( $playerId ) );
    }
}