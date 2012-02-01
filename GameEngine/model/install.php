<?php
require_once( MODEL_PATH."register.php" );
require_once( MODEL_PATH."queue.php" );
class SetupModel extends ModelBase
{

    public function processSetup( $map_size, $adminEmail )
    {
        $this->_createTables( );
        $this->_createMap( $map_size );
        if ( $this->_createAdminPlayer( $map_size, $adminEmail ) )
        {
            $raiseTime = 10 / $GLOBALS['GameMetadata']['game_speed'];
            $raiseTime *= 2592000;
            $raiseTime = intval( $raiseTime );
            if ( $raiseTime < 2592000 )
            {
                $raiseTime = 2592000;
            }
            $queueModel = new QueueModel( );
            $queueModel->addTask( new QueueTask( QS_TATAR_RAISE, 0, $raiseTime ) );
            ( ( ) );
        }
    }

    public function _createTables( )
    {
        $this->provider->executeBatchQuery( "
DROP TABLE IF EXISTS `g_settings`;
DROP TABLE IF EXISTS `g_summary`;
DROP TABLE IF EXISTS `p_alliances`;
DROP TABLE IF EXISTS `p_merchants`;
DROP TABLE IF EXISTS `p_msgs`;
DROP TABLE IF EXISTS `p_players`;
DROP TABLE IF EXISTS `p_queue`;
DROP TABLE IF EXISTS `p_rpts`;
DROP TABLE IF EXISTS `p_villages`;
DROP TABLE IF EXISTS `g_chat`;
DROP TABLE IF EXISTS `g_comment`;
DROP TABLE IF EXISTS `g_profile`;
DROP TABLE IF EXISTS `p_friends`;
DROP TABLE IF EXISTS `privatechat`;

CREATE TABLE `privatechat` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `from` varchar(255) character set utf8 NOT NULL default '',
  `from_img` varchar(200) NOT NULL default 'nophoto.gif',
  `from_id` int(11) NOT NULL default '0',
  `to` varchar(255) character set utf8 NOT NULL default '',
  `to_img` varchar(200) NOT NULL default 'nophoto.gif',
  `to_id` int(11) NOT NULL default '0',
  `message` text character set utf8 NOT NULL,
  `sent` datetime NOT NULL default '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `p_profile` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT '0',
  `message` text,
  `date` varchar(250) DEFAULT NULL,
  `image` VARCHAR(250) NOT NULL DEFAULT '',
  `url` VARCHAR(250) NOT NULL DEFAULT '',
  `youtube` VARCHAR(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `p_comment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT '0',
  `to_userid` int(11) DEFAULT '0',
  `topicid` int(11) DEFAULT '0',
  `date` varchar(30) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `p_friends` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `playerid1` int(11) DEFAULT '0',
  `playername1` varchar(70) DEFAULT NULL,
  `playerid2` int(11) DEFAULT '0',
  `playername2` varchar(70) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `accept` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `g_words` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `g_banner` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `cat` int(11) DEFAULT '1',
  `image` varchar(200) DEFAULT NULL,
  `type` enum('image','flash') DEFAULT 'image',
  `date` varchar(30) DEFAULT NULL,
  `visit` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `g_chat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `text` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `g_settings` (
  `start_date` datetime DEFAULT NULL,
  `license_key` varchar(50) DEFAULT NULL,
  `game_over` tinyint(1) DEFAULT '0',
  `game_transient_stopped` tinyint(1) DEFAULT '0',
  `cur_week` smallint(6) DEFAULT '0',
  `win_pid` bigint(20) DEFAULT '0',
  `qlocked_date` datetime DEFAULT NULL,
  `qlocked` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `g_summary` (
  `players_count` bigint(20) DEFAULT '0',
  `active_players_count` bigint(20) DEFAULT '0',
  `Dboor_players_count` bigint(20) DEFAULT '0',
  `Arab_players_count` bigint(20) DEFAULT '0',
  `Roman_players_count` bigint(20) DEFAULT '0',
  `Teutonic_players_count` bigint(20) DEFAULT '0',
  `Gallic_players_count` bigint(20) DEFAULT '0',
  `news_text` text,
  `gnews_text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `p_alliances` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `name2` varchar(255) DEFAULT NULL,
  `creator_player_id` bigint(20) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `contracts_alliance_id` text,
  `player_count` tinyint(4) DEFAULT NULL,
  `max_player_count` tinyint(4) DEFAULT '1',
  `players_ids` text,
  `invites_player_ids` text,
  `description1` text,
  `description2` text,
  `medals` varchar(300) DEFAULT NULL,
  `attack_points` bigint(20) DEFAULT '0',
  `defense_points` bigint(20) DEFAULT '0',
  `week_attack_points` bigint(20) DEFAULT '0',
  `week_defense_points` bigint(20) DEFAULT '0',
  `week_dev_points` bigint(20) DEFAULT '0',
  `week_thief_points` bigint(20) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`name`),
  KEY `NewIndex2` (`rating`),
  KEY `NewIndex3` (`attack_points`),
  KEY `NewIndex4` (`defense_points`),
  KEY `NewIndex5` (`week_attack_points`),
  KEY `NewIndex6` (`week_defense_points`),
  KEY `NewIndex7` (`week_dev_points`),
  KEY `NewIndex8` (`week_thief_points`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `p_players` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tribe_id` tinyint(4) DEFAULT NULL,
  `alliance_id` bigint(20) DEFAULT NULL,
  `alliance_name` varchar(255) DEFAULT NULL,
  `alliance_roles` text,
  `invites_alliance_ids` text,
  `name` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `is_blocked` tinyint(1) DEFAULT '0',
  `player_type` tinyint(4) DEFAULT '0',
  `active_plus_account` tinyint(1) DEFAULT '0',
  `activation_code` varchar(255) DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `last_ip` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `description1` text,
  `description2` text,
  `house_name` varchar(255) DEFAULT NULL,
  `registration_date` datetime DEFAULT NULL,
  `gold_num` int(11) DEFAULT '0',
  `agent_for_players` varchar(255) DEFAULT NULL,
  `my_agent_players` varchar(255) DEFAULT NULL,
  `custom_links` text,
  `medals` varchar(300) DEFAULT NULL,
  `total_people_count` bigint(20) DEFAULT '2',
  `selected_village_id` bigint(20) DEFAULT NULL,
  `villages_count` tinyint(4) DEFAULT '1',
  `villages_id` text,
  `villages_data` text,
  `friend_players` text,
  `notes` text,
  `hero_troop_id` tinyint(4) DEFAULT NULL,
  `hero_level` tinyint(4) DEFAULT '0',
  `hero_points` bigint(20) DEFAULT '0',
  `hero_name` varchar(300) DEFAULT NULL,
  `hero_in_village_id` bigint(20) DEFAULT NULL,
  `attack_points` bigint(20) DEFAULT '0',
  `defense_points` bigint(20) DEFAULT '0',
  `week_attack_points` bigint(20) DEFAULT '0',
  `week_defense_points` bigint(20) DEFAULT '0',
  `week_dev_points` bigint(20) DEFAULT '0',
  `week_thief_points` bigint(20) DEFAULT '0',
  `new_report_count` smallint(6) DEFAULT '0',
  `new_mail_count` smallint(6) DEFAULT '0',
  `guide_quiz` varchar(50) DEFAULT NULL,
  `new_gnews` tinyint(1) DEFAULT '0',
  `create_nvil` tinyint(4) DEFAULT '0',
  `snid` bigint(11) NOT NULL DEFAULT '0',
  `avatar`  varchar(255) NULL DEFAULT '/assets/default/img/q/l6.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`name`),
  UNIQUE KEY `NewIndex2` (`activation_code`),
  UNIQUE KEY `NewIndex4` (`email`),
  KEY `NewIndex3` (`attack_points`),
  KEY `NewIndex6` (`defense_points`),
  KEY `NewIndex5` (`last_login_date`),
  KEY `NewIndex7` (`week_attack_points`),
  KEY `NewIndex8` (`week_defense_points`),
  KEY `NewIndex9` (`week_dev_points`),
  KEY `NewIndex10` (`week_thief_points`),
  KEY `NewIndex11` (`snid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `p_villages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rel_x` smallint(6) DEFAULT NULL,
  `rel_y` smallint(6) DEFAULT NULL,
  `field_maps_id` tinyint(4) DEFAULT NULL,
  `image_num` tinyint(4) DEFAULT NULL,
  `rand_num` int(11) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `tribe_id` tinyint(4) DEFAULT NULL,
  `player_id` bigint(20) DEFAULT NULL,
  `alliance_id` bigint(20) DEFAULT NULL,
  `player_name` varchar(300) DEFAULT NULL,
  `village_name` varchar(255) DEFAULT NULL,
  `alliance_name` varchar(300) DEFAULT NULL,
  `is_capital` tinyint(1) DEFAULT '0',
  `is_special_village` tinyint(1) DEFAULT '0',
  `is_oasis` tinyint(1) DEFAULT NULL,
  `people_count` int(11) DEFAULT '2',
  `crop_consumption` int(11) DEFAULT '2',
  `time_consume_percent` float DEFAULT '100',
  `offer_merchants_count` tinyint(4) DEFAULT '0',
  `resources` varchar(300) DEFAULT NULL,
  `cp` varchar(300) DEFAULT NULL,
  `buildings` varchar(300) DEFAULT NULL,
  `troops_training` varchar(200) DEFAULT NULL,
  `troops_num` text,
  `troops_out_num` text,
  `troops_intrap_num` text,
  `troops_out_intrap_num` text,
  `troops_trapped_num` int(11) DEFAULT '0',
  `allegiance_percent` int(11) DEFAULT '100',
  `child_villages_id` text,
  `village_oases_id` text,
  `creation_date` datetime DEFAULT NULL,
  `update_key` varchar(5) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `NewIndex2` (`player_id`),
  KEY `rand_num` (`rand_num`),
  KEY `field_maps_id` (`field_maps_id`),
  KEY `NewIndex3` (`is_special_village`),
  KEY `NewIndex4` (`is_oasis`),
  KEY `NewIndex5` (`people_count`),
  KEY `NewIndex1` (`village_name`),
  KEY `NewIndex6` (`player_id`,`is_oasis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `p_queue` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `player_id` bigint(20) NOT NULL DEFAULT '0',
  `village_id` bigint(20) DEFAULT NULL,
  `to_player_id` bigint(20) DEFAULT NULL,
  `to_village_id` bigint(20) DEFAULT NULL,
  `proc_type` tinyint(4) DEFAULT NULL,
  `building_id` bigint(20) DEFAULT NULL,
  `proc_params` text,
  `threads` int(11) DEFAULT '1',
  `end_date` datetime DEFAULT NULL,
  `execution_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`player_id`),
  KEY `NewIndex2` (`village_id`),
  KEY `NewIndex3` (`to_player_id`),
  KEY `NewIndex4` (`to_village_id`),
  KEY `NewIndex5` (`end_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `p_msgs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `from_player_id` bigint(20) DEFAULT NULL,
  `to_player_id` bigint(20) DEFAULT NULL,
  `from_player_name` varchar(300) DEFAULT NULL,
  `to_player_name` varchar(300) DEFAULT NULL,
  `msg_title` varchar(255) DEFAULT NULL,
  `msg_body` text,
  `creation_date` datetime DEFAULT NULL,
  `is_readed` tinyint(1) DEFAULT '0',
  `delete_status` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`from_player_id`),
  KEY `NewIndex2` (`to_player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `p_merchants` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `player_id` bigint(20) DEFAULT NULL,
  `player_name` varchar(255) DEFAULT NULL,
  `village_id` bigint(20) DEFAULT NULL,
  `village_x` smallint(6) DEFAULT NULL,
  `village_y` smallint(6) DEFAULT NULL,
  `offer` varchar(300) DEFAULT NULL,
  `merchants_num` tinyint(4) DEFAULT NULL,
  `merchants_speed` tinyint(4) DEFAULT NULL,
  `alliance_only` tinyint(1) DEFAULT NULL,
  `max_time` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`player_id`),
  KEY `village_x` (`village_x`),
  KEY `village_y` (`village_y`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `p_rpts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `from_player_id` bigint(20) DEFAULT NULL,
  `from_player_name` varchar(300) DEFAULT NULL,
  `from_village_id` bigint(20) DEFAULT NULL,
  `from_village_name` varchar(300) DEFAULT NULL,
  `to_player_id` bigint(20) DEFAULT NULL,
  `to_player_name` varchar(300) DEFAULT NULL,
  `to_village_id` bigint(20) DEFAULT NULL,
  `to_village_name` varchar(300) DEFAULT NULL,
  `rpt_body` text,
  `creation_date` datetime DEFAULT NULL,
  `read_status` tinyint(2) DEFAULT '0',
  `delete_status` tinyint(2) DEFAULT '0',
  `rpt_cat` tinyint(4) DEFAULT NULL,
  `rpt_result` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`from_player_id`),
  KEY `NewIndex2` (`to_player_id`),
  KEY `NewIndex3` (`rpt_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `g_settings`(`start_date`,`license_key`) VALUES (NOW(),NULL);
INSERT INTO `g_summary`(`players_count`,`active_players_count`,`Arab_players_count`,`Roman_players_count`,`Teutonic_players_count`,`Gallic_players_count`,`news_text`) VALUES ( '0','0','0','0','0','0',NULL);" );
    }

    public function _createMap( $map_size )
    {
        $maphalf_size = floor( $map_size / 2 );
        $oasis_troop_ids = array( );
        foreach ( $GLOBALS['GameMetadata']['troops'] as $k => $v )
        {
            if ( $v['for_tribe_id'] == 4 )
            {
                $oasis_troop_ids[] = $k;
            }
        }
        $i = 0;
        while ( $i < $map_size )
        {
            $queryBatch = array( );
            $j = 0;
            while ( $j < $map_size )
            {
                $rel_x = $maphalf_size < $i ? $i - $map_size : $i;
                $rel_y = $maphalf_size < $j ? $j - $map_size : $j;
                $troops_num = "";
                $field_maps_id = 0;
                $rand_num = "NULL";
                $creation_date = "NULL";
                if ( $rel_x == 0 && $rel_y == 0 )
                {
                    $r = 1;
                }
                else
                {
                    $r_arr = array( 1, 1, 1, 1, 1, 1, 0, 1, mt_rand( 0, 1 ), mt_rand( 0, 1 ), 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, mt_rand( 0, 1 ) );
                    $r = $r_arr[mt_rand( 0, 48 )];
                }
                if ( $r == 1 )
                {
                    $image_num = mt_rand( 0, 9 );
                    $is_oasis = 0;
                    $tribe_id = 0;
                    if ( $rel_x == 0 && $rel_y == 0 )
                    {
                        $field_maps_id = 3;
                    }
                    else
                    {
                        $fr_arr = array( 3, mt_rand( 1, 12 ), 3, mt_rand( 1, 4 ), mt_rand( 1, 5 ), 3, mt_rand( 1, 12 ), 3, mt_rand( 7, 11 ), mt_rand( 7, 12 ), 3, 3, mt_rand( 1, 12 ) );
                        $field_maps_id = $fr_arr[mt_rand( 0, 12 )];
                    }
                    if ( $field_maps_id == 3 )
                    {
                        $pr_arr = array( 0, 1, 0, 0, mt_rand( 0, 1 ) );
                        $pr = $pr_arr[mt_rand( 0, 4 )];
                        $rand_num = $pr == 1 ? abs( $rel_x ) + abs( $rel_y ) : 310;
                    }
                }
                else
                {
                    $image_num = mt_rand( 1, 12 );
                    $is_oasis = 1;
                    $tribe_id = 4;
                    $creation_date = "NOW()";
                    $troops_num = $oasis_troop_ids[mt_rand( 0, 2 )]." ".mt_rand( 1, 5 );
                    $troops_num .= ",".$oasis_troop_ids[mt_rand( 3, 5 )]." ".mt_rand( 2, 6 );
                    $troops_num .= ",".$oasis_troop_ids[mt_rand( 6, 8 )]." ".mt_rand( 3, 7 );
                    if ( mt_rand( 0, 1 ) == 1 )
                    {
                        $troops_num .= ",".$oasis_troop_ids[9]." ".mt_rand( 2, 8 );
                    }
                    $troops_num = "-1:".$troops_num;
                }
                $queryBatch[] = "(".$rel_x.",".$rel_y.",".$image_num.",".$rand_num.",".$field_maps_id.",".$tribe_id.",".$is_oasis.",'".$troops_num."',".$creation_date.")";
                ++$j;
            }
             $this->provider->executeQuery( "INSERT INTO p_villages (rel_x,rel_y,image_num,rand_num,field_maps_id,tribe_id,is_oasis,troops_num,creation_date) VALUES".implode( ",", $queryBatch ) );
            unset( $queryBatch );
            $queryBatch = NULL;
            ++$i;
        }
    }

    public function _createAdminPlayer( $map_size, $adminEmail )
    {
        $m = new RegisterModel( );
        $adminName = $GLOBALS['AppConfig']['system']['adminName'];
        $result = $m->createNewPlayer( $adminName, $adminEmail, $GLOBALS['AppConfig']['system']['adminPassword'], 6, 0, $adminName, $map_size, PLAYERTYPE_ADMIN );
        if ( $result['hasErrors'] )
        {
            return FALSE;
        }
        $m->dispose( );
        return TRUE;
    }
}