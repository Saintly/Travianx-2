<?php
echo "﻿";
require_once( LANG_UI_PATH."manual.php" );
echo "<link rel=stylesheet type=\"text/css\" href=\"assets/un_main2_";
echo $this->appConfig['system']['lang'];
echo ".css";
echo $this->getAssetVersion( );
echo "\"/>\r\n<br/><br/>\r\n<div id=\"lmid1\"> \r\n\t\t<div id=\"lmid2\"><div class=\"headline\"><h1>";
echo LANGUI_MANUAL_T109;
echo "</h1></div>\r\n\t\t<div class=\"wholebox\"><a href=\"manual.php\">";
echo LANGUI_MANUAL_T1;
echo "</a> | <a href=\"manual.php?t=1\">";
echo LANGUI_MANUAL_T2;
echo "</a> | <a href=\"manual.php?t=2\">";
echo LANGUI_MANUAL_T3;
echo "</a></div>\r\n\t\t<div class=\"wholebox\"><div id=\"ce\"></div>\r\n\r\n";
if ( !isset( $_GET['t'] ) )
{
    echo "\t\t<p class=\"f9\">";
    echo LANGUI_MANUAL_T4;
    echo ".</p>\r\n\r\n\t\t\r\n\t\t<div id=\"roemer\" style=\"color:black;\">\t<div id=\"desc\">\t\t<h2>";
    echo tribe_6;
    echo "</h2>\t\t<p class=\"f9\">\r\n\t\t<img align=\"right\" src=\"assets/default/img/un/h/dboor.jpg\" width=\"102\" height=\"118\" border=\"0\" alt=\"R?mer\">";
    echo LANGUI_MANUAL_T5;
    echo ". .</p><br clear=\"all\"/>\t</div>\t\r\n\t\t\r\n<div id=\"tab\">\r\n<table cellspacing=\"1\" cellpadding=\"2\" class=\"tbg\">\r\n<tr class=\"rbg\"> \r\n\t<td colspan=\"12\">";
    echo LANGUI_MANUAL_T6;
    echo "</td> \r\n</tr> \r\n <tr class=\"cbg1\"> \r\n\t<td colspan=\"2\">&nbsp;</td> \r\n\t<td><img src=\"assets/default/img/un/h/att_all.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T7;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T7;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/h/def_i.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T8;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T8;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/h/def_c.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T9;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T9;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_1;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_2;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_3;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_4;
    echo "\"/></td> \r\n\t<td title=\"";
    echo LANGUI_MANUAL_T11;
    echo "\">";
    echo LANGUI_MANUAL_T10;
    echo "</td> \r\n</tr>\r\n";
    foreach ( $this->gameMetadata['troops'] as $troopId => $troop )
    {
        if ( $troop['for_tribe_id'] == 6 && $troop['is_cavalry'] !== NULL )
        {
            echo "<tr>\r\n\t<td width=\"25\" align=\"center\"><img src=\"assets/default/img/u/";
            echo $troopId;
            echo ".gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"\"></td> \r\n\t<td class=\"s7\" width=\"135\">";
            echo "<s";
            echo "pan class=\"f9\" nowrap> ";
            echo constant( "troop_".$troopId );
            echo "</span></td> \r\n\t<td width=\"25\">";
            echo $troop['attack_value'];
            echo "</td> \r\n\t<td>";
            echo $troop['defense_infantry'];
            echo "</td> \r\n\t<td>";
            echo $troop['defense_cavalry'];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][1];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][2];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][3];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][4];
            echo "</td> \r\n\t<td>";
            echo $troop['velocity'] * $this->gameMetadata['game_speed'];
            echo "</td> \r\n</tr>\r\n";
        }
    }
    echo "</table>\r\n<br/></div>\r\n\r\n<div class=\"f9\"  style=\"color:black; width:100%\">";
    echo "<s";
    echo "trong>";
    echo LANGUI_MANUAL_T12;
    echo "</strong><br/></div><div class=\"lbox\" style=\"color:black; font-weight:normal; width:100%;\"><ul>\r\n<li>";
    echo LANGUI_MANUAL_T13;
    echo " ";
    echo round( $this->gameMetadata['tribes'][2]['crannyFactor'], 2 );
    echo " </li> \r\n<li>";
    echo LANGUI_MANUAL_T14;
    echo " </li> \r\n<li>";
    echo LANGUI_MANUAL_T15;
    echo " </li> \r\n<li>";
    echo LANGUI_MANUAL_T16;
    echo " ";
    echo $this->gameMetadata['tribes'][6]['merchants_capacity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T19;
    echo " (";
    echo LANGUI_MANUAL_T10;
    echo " : ";
    echo $this->gameMetadata['tribes'][6]['merchants_velocity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T20;
    echo ") </li> \r\n<li>";
    echo LANGUI_MANUAL_T17;
    echo ".</li> \r\n<li>";
    echo LANGUI_MANUAL_T18;
    echo " .</li></ul><br/></div></div>\r\n\r\n\t\t\r\n\t\t<div id=\"roemer\" style=\"color:black;\">\t<div id=\"desc\">\t\t<h2>";
    echo tribe_7;
    echo "</h2>\t\t<p class=\"f9\">\r\n\t\t<img align=\"right\" src=\"assets/default/img/un/h/arab.png\" width=\"102\" height=\"118\" border=\"0\" alt=\"R?mer\">";
    echo LANGUI_MANUAL_T21;
    echo " .</p><br clear=\"all\"/>\t</div>\t\r\n\t\t\r\n<div id=\"tab\">\r\n<table cellspacing=\"1\" cellpadding=\"2\" class=\"tbg\">\r\n<tr class=\"rbg\"> \r\n\t<td colspan=\"12\">";
    echo LANGUI_MANUAL_T22;
    echo "</td> \r\n</tr> \r\n <tr class=\"cbg1\"> \r\n\t<td colspan=\"2\">&nbsp;</td> \r\n\t<td><img src=\"assets/default/img/un/h/att_all.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T7;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T7;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/h/def_i.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T8;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T8;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/h/def_c.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T9;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T9;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_1;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_2;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_3;
    echo "\"/></td> \r\n\t<td><img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_4;
    echo "\"/></td> \r\n\t<td title=\"";
    echo LANGUI_MANUAL_T11;
    echo "\">";
    echo LANGUI_MANUAL_T10;
    echo "</td> \r\n</tr>\r\n";
    foreach ( $this->gameMetadata['troops'] as $troopId => $troop )
    {
        if ( $troop['for_tribe_id'] == 7 && $troop['is_cavalry'] !== NULL )
        {
            echo "<tr>\r\n\t<td width=\"25\" align=\"center\"><img src=\"assets/default/img/u/";
            echo $troopId;
            echo ".gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"\"></td> \r\n\t<td class=\"s7\" width=\"135\">";
            echo "<s";
            echo "pan class=\"f9\" nowrap> ";
            echo constant( "troop_".$troopId );
            echo "</span></td> \r\n\t<td width=\"25\">";
            echo $troop['attack_value'];
            echo "</td> \r\n\t<td>";
            echo $troop['defense_infantry'];
            echo "</td> \r\n\t<td>";
            echo $troop['defense_cavalry'];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][1];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][2];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][3];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][4];
            echo "</td> \r\n\t<td>";
            echo $troop['velocity'] * $this->gameMetadata['game_speed'];
            echo "</td> \r\n</tr>\r\n";
        }
    }
    echo "</table>\r\n<br/></div>\r\n\r\n<div class=\"f9\"  style=\"color:black; width:100%\">";
    echo "<s";
    echo "trong>";
    echo LANGUI_MANUAL_T12;
    echo "</strong><br/></div><div class=\"lbox\" style=\"color:black; font-weight:normal; width:100%;\"><ul><li>";
    echo LANGUI_MANUAL_T14;
    echo " </li> \r\n<li>";
    echo LANGUI_MANUAL_T15;
    echo " </li> \r\n<li>";
    echo LANGUI_MANUAL_T16;
    echo " ";
    echo $this->gameMetadata['tribes'][7]['merchants_capacity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T19;
    echo " (";
    echo LANGUI_MANUAL_T10;
    echo " : ";
    echo $this->gameMetadata['tribes'][7]['merchants_velocity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T20;
    echo ") </li> \r\n<li>";
    echo LANGUI_MANUAL_T17;
    echo ".</li> \r\n<li>";
    echo LANGUI_MANUAL_T18;
    echo " .</li></ul><br/></div></div>\r\n\r\n\r\n<div id=\"roemer\" style=\"color:black;\">\t<div id=\"desc\">\t\t<h2>";
    echo tribe_1;
    echo "</h2>\t\t<p class=\"f9\">\r\n\t\t<img align=\"right\" src=\"assets/default/img/un/h/roemer.jpg\" width=\"128\" height=\"156\" border=\"0\" alt=\"R?mer\">";
    echo LANGUI_MANUAL_T23;
    echo " .</p><br clear=\"all\"/>\t</div>\t\r\n\r\n<div id=\"tab\"><table cellspacing=\"1\" cellpadding=\"2\" class=\"tbg\"><tr class=\"rbg\"> \r\n<td colspan=\"12\">";
    echo LANGUI_MANUAL_T24;
    echo "</td> \r\n</tr> \r\n <tr class=\"cbg1\"> \r\n<td colspan=\"2\">&nbsp;</td> \r\n<td><img src=\"assets/default/img/un/h/att_all.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T7;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T7;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/h/def_i.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T8;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T8;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/h/def_c.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T9;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T9;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_1;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_2;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_3;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_4;
    echo "\"/></td> \r\n<td title=\"";
    echo LANGUI_MANUAL_T11;
    echo "\">";
    echo LANGUI_MANUAL_T10;
    echo "</td> \r\n</tr>\r\n";
    foreach ( $this->gameMetadata['troops'] as $troopId => $troop )
    {
        if ( $troop['for_tribe_id'] == 1 && $troop['is_cavalry'] !== NULL )
        {
            echo "<tr>\r\n\t<td width=\"25\" align=\"center\"><img src=\"assets/default/img/u/";
            echo $troopId;
            echo ".gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"\"></td> \r\n\t<td class=\"s7\" width=\"135\">";
            echo "<s";
            echo "pan class=\"f9\" nowrap> ";
            echo constant( "troop_".$troopId );
            echo "</span></td> \r\n\t<td width=\"25\">";
            echo $troop['attack_value'];
            echo "</td> \r\n\t<td>";
            echo $troop['defense_infantry'];
            echo "</td> \r\n\t<td>";
            echo $troop['defense_cavalry'];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][1];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][2];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][3];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][4];
            echo "</td> \r\n\t<td>";
            echo $troop['velocity'] * $this->gameMetadata['game_speed'];
            echo "</td> \r\n</tr>\r\n";
        }
    }
    echo "</table><br/>\r\n\r\n</div><div class=\"f9\"  style=\"color:black; width:100%\">";
    echo "<s";
    echo "trong>";
    echo LANGUI_MANUAL_T12;
    echo "</strong><br/></div><div class=\"lbox\" style=\"color:black; font-weight:normal; width:100%;\"><ul><li>";
    echo LANGUI_MANUAL_T14;
    echo " </li> \r\n<li>";
    echo LANGUI_MANUAL_T15;
    echo " </li> \r\n<li>";
    echo LANGUI_MANUAL_T16;
    echo " ";
    echo $this->gameMetadata['tribes'][1]['merchants_capacity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T19;
    echo " (";
    echo LANGUI_MANUAL_T10;
    echo " : ";
    echo $this->gameMetadata['tribes'][1]['merchants_velocity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T20;
    echo ") </li> \r\n<li>";
    echo LANGUI_MANUAL_T25;
    echo " ,</li> \r\n<li>";
    echo LANGUI_MANUAL_T18;
    echo " .</li></ul><br/></div></div><div id=\"gallier\" style=\"color:black;\"><div id=\"desc\"><h2>";
    echo tribe_3;
    echo "</h2> \r\n \r\n<p class=\"f9\"><img align=\"right\" src=\"assets/default/img/un/h/gallier.jpg\" width=\"96\" height=\"156\" border=\"0\" alt=\"Gallier\"> ";
    echo LANGUI_MANUAL_T27;
    echo "</p><br clear=\"all\"/></div> \r\n \r\n<div id=\"tab\"> \r\n<table cellspacing=\"1\" cellpadding=\"2\" class=\"tbg\"> \r\n<tr class=\"rbg\"> \r\n<td colspan=\"12\">";
    echo LANGUI_MANUAL_T28;
    echo "</td> \r\n</tr> \r\n \r\n<tr class=\"cbg1\"> \r\n<td colspan=\"2\">&nbsp;</td> \r\n<td><img src=\"assets/default/img/un/h/att_all.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T7;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T7;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/h/def_i.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T8;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T8;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/h/def_c.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T9;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T9;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_1;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_2;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_3;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_4;
    echo "\"/></td> \r\n<td title=\"";
    echo LANGUI_MANUAL_T11;
    echo "\">";
    echo LANGUI_MANUAL_T10;
    echo "</td> \r\n</tr>\r\n";
    foreach ( $this->gameMetadata['troops'] as $troopId => $troop )
    {
        if ( $troop['for_tribe_id'] == 3 && $troop['is_cavalry'] !== NULL )
        {
            echo "<tr>\r\n\t<td width=\"25\" align=\"center\"><img src=\"assets/default/img/u/";
            echo $troopId;
            echo ".gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"\"></td> \r\n\t<td class=\"s7\" width=\"135\">";
            echo "<s";
            echo "pan class=\"f9\" nowrap> ";
            echo constant( "troop_".$troopId );
            echo "</span></td> \r\n\t<td width=\"25\">";
            echo $troop['attack_value'];
            echo "</td> \r\n\t<td>";
            echo $troop['defense_infantry'];
            echo "</td> \r\n\t<td>";
            echo $troop['defense_cavalry'];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][1];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][2];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][3];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][4];
            echo "</td> \r\n\t<td>";
            echo $troop['velocity'] * $this->gameMetadata['game_speed'];
            echo "</td> \r\n</tr>\r\n";
        }
    }
    echo "</table><br/>\r\n\r\n</div><div class=\"f9\" style=\"color:black; width:100%\"><b>";
    echo LANGUI_MANUAL_T12;
    echo "</b><br/></div><div class=\"lbox\" style=\"color:black; font-weight:normal; width:100%;\"><ul><li>";
    echo LANGUI_MANUAL_T29;
    echo "</li> \r\n<li>";
    echo LANGUI_MANUAL_T30;
    echo "</li> \r\n<li>";
    echo LANGUI_MANUAL_T16;
    echo " ";
    echo $this->gameMetadata['tribes'][3]['merchants_capacity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T19;
    echo " (";
    echo LANGUI_MANUAL_T10;
    echo " : ";
    echo $this->gameMetadata['tribes'][3]['merchants_velocity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T20;
    echo ") </li> \r\n<li>";
    echo LANGUI_MANUAL_T31;
    echo "</li> \r\n<li>";
    echo LANGUI_MANUAL_T32;
    echo "</li> \r\n<li>";
    echo LANGUI_MANUAL_T33;
    echo "</li></ul><br/></div></div><div id=\"germanen\"  style=\"color:black;\"><div id=\"desc\"><h2>";
    echo tribe_2;
    echo "</h2>\r\n \r\n<p class=\"f9\"><img align=\"left\" src=\"assets/default/img/un/h/germane.jpg\" width=\"104\" height=\"151\" border=\"0\" alt=\"Germane\">";
    echo LANGUI_MANUAL_T34;
    echo "</p><br clear=\"all\"> </div> \r\n \r\n<div id=\"tab\"> \r\n<table cellspacing=\"1\" cellpadding=\"2\" class=\"tbg\"> \r\n<tr class=\"rbg\"> \r\n<td colspan=\"12\">";
    echo LANGUI_MANUAL_T35;
    echo "</td> \r\n</tr> \r\n \r\n<tr class=\"cbg1\"> \r\n<td colspan=\"2\">&nbsp;</td> \r\n<td><img src=\"assets/default/img/un/h/att_all.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T7;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T7;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/h/def_i.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T8;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T8;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/h/def_c.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T9;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T9;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_1;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_2;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_3;
    echo "\"/></td> \r\n<td><img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"";
    echo item_title_4;
    echo "\"/></td> \r\n<td title=\"";
    echo LANGUI_MANUAL_T11;
    echo "\">";
    echo LANGUI_MANUAL_T10;
    echo "</td> \r\n</tr>\r\n";
    foreach ( $this->gameMetadata['troops'] as $troopId => $troop )
    {
        if ( $troop['for_tribe_id'] == 2 && $troop['is_cavalry'] !== NULL )
        {
            echo "<tr>\r\n\t<td width=\"25\" align=\"center\"><img src=\"assets/default/img/u/";
            echo $troopId;
            echo ".gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"\"></td> \r\n\t<td class=\"s7\" width=\"135\">";
            echo "<s";
            echo "pan class=\"f9\" nowrap> ";
            echo constant( "troop_".$troopId );
            echo "</span></td> \r\n\t<td width=\"25\">";
            echo $troop['attack_value'];
            echo "</td> \r\n\t<td>";
            echo $troop['defense_infantry'];
            echo "</td> \r\n\t<td>";
            echo $troop['defense_cavalry'];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][1];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][2];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][3];
            echo "</td> \r\n\t<td>";
            echo $troop['training_resources'][4];
            echo "</td> \r\n\t<td>";
            echo $troop['velocity'] * $this->gameMetadata['game_speed'];
            echo "</td> \r\n</tr>\r\n";
        }
    }
    echo "</table><br/>\r\n\r\n</div><div class=\"f9\" style=\"color:black; width:100%\"><b>";
    echo LANGUI_MANUAL_T12;
    echo "</b><br/></div><div class=\"lbox\" style=\"color:black; font-weight:normal; width:100%\"><ul>\r\n<li>";
    echo LANGUI_MANUAL_T13;
    echo " ";
    echo round( $this->gameMetadata['tribes'][2]['crannyFactor'], 2 );
    echo " </li> \r\n<li>";
    echo LANGUI_MANUAL_T37;
    echo " </li> \r\n<li>";
    echo LANGUI_MANUAL_T16;
    echo " ";
    echo $this->gameMetadata['tribes'][2]['merchants_capacity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T19;
    echo " (";
    echo LANGUI_MANUAL_T10;
    echo " : ";
    echo $this->gameMetadata['tribes'][2]['merchants_velocity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T20;
    echo ") </li> \r\n<li>";
    echo LANGUI_MANUAL_T38;
    echo " </li> \r\n<li>";
    echo LANGUI_MANUAL_T39;
    echo " </li></ul><br/></div></div> \r\n\r\n";
}
else if ( $_GET['t'] == 1 )
{
    echo "<div class=\"wholebox\"><p class=\"f9\">";
    echo LANGUI_MANUAL_T40;
    echo "</p><h1>";
    echo LANGUI_MANUAL_T41;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid15.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T41;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T41;
    echo "\" align=\"left\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T42;
    echo " .<br><br> \r\n<b>";
    echo LANGUI_MANUAL_T43;
    echo " :</b><br> \r\n";
    echo LANGUI_MANUAL_T44;
    echo ".<br><br> \r\n \r\n";
    $__bid = 15;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T48;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid10.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T48;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T48;
    echo "\" align=\"right\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T49;
    echo ".<br><br> \r\n \r\n";
    $__bid = 10;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T50;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid11.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T50;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T50;
    echo "\" align=\"right\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T51;
    echo ".<br><br> \r\n\r\n";
    $__bid = 11;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n \r\n<h1>";
    echo LANGUI_MANUAL_T52;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid23.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T52;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T52;
    echo "\" align=\"left\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T53;
    echo ". \r\n<br><br> \r\n<b>";
    echo LANGUI_MANUAL_T108;
    echo ":</b><br> \r\n";
    echo LANGUI_MANUAL_T54;
    echo ". <br> \r\n";
    echo LANGUI_MANUAL_T55;
    echo ".<br><br> \r\n \r\n";
    $__bid = 23;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T56;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid18.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T56;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T56;
    echo "\" align=\"right\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T57;
    echo ".<br><br> \r\n\r\n";
    $__bid = 18;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n \r\n<h1>";
    echo LANGUI_MANUAL_T58;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid16.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T58;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T58;
    echo "\" align=\"right\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T59;
    echo ".<br><br> \r\n \r\n";
    $__bid = 16;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T60;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid17.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T60;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T60;
    echo "\" align=\"left\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T61;
    echo ".\r\n<br><br> \r\n \r\n<b>";
    echo LANGUI_MANUAL_T108;
    echo ":</b><br> \r\n";
    $__tid_ = 7;
    echo constant( "tribe_".$__tid_ );
    echo ": ";
    echo LANGUI_MANUAL_T16;
    echo " ";
    echo $this->gameMetadata['tribes'][$__tid_]['merchants_capacity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T19;
    echo " (";
    echo LANGUI_MANUAL_T10;
    echo " : ";
    echo $this->gameMetadata['tribes'][$__tid_]['merchants_velocity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T20;
    echo ")<br>\r\n";
    $__tid_ = 1;
    echo constant( "tribe_".$__tid_ );
    echo ": ";
    echo LANGUI_MANUAL_T16;
    echo " ";
    echo $this->gameMetadata['tribes'][$__tid_]['merchants_capacity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T19;
    echo " (";
    echo LANGUI_MANUAL_T10;
    echo " : ";
    echo $this->gameMetadata['tribes'][$__tid_]['merchants_velocity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T20;
    echo ")<br>\r\n";
    $__tid_ = 2;
    echo constant( "tribe_".$__tid_ );
    echo ": ";
    echo LANGUI_MANUAL_T16;
    echo " ";
    echo $this->gameMetadata['tribes'][$__tid_]['merchants_capacity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T19;
    echo " (";
    echo LANGUI_MANUAL_T10;
    echo " : ";
    echo $this->gameMetadata['tribes'][$__tid_]['merchants_velocity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T20;
    echo ")<br>\r\n";
    $__tid_ = 3;
    echo constant( "tribe_".$__tid_ );
    echo ": ";
    echo LANGUI_MANUAL_T16;
    echo " ";
    echo $this->gameMetadata['tribes'][$__tid_]['merchants_capacity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T19;
    echo " (";
    echo LANGUI_MANUAL_T10;
    echo " : ";
    echo $this->gameMetadata['tribes'][$__tid_]['merchants_velocity'] * $this->gameMetadata['game_speed'];
    echo " ";
    echo LANGUI_MANUAL_T20;
    echo ")<br>\r\n<br>\r\n \r\n";
    $__bid = 17;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T64;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid19.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T64;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T64;
    echo "\" align=\"left\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T65;
    echo " .<br><br> \r\n\r\n";
    $__bid = 19;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T66;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid20.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T66;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T66;
    echo "\" align=\"left\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T67;
    echo ".<br><br> \r\n\r\n";
    $__bid = 20;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br> \r\n\r\n<h1>";
    echo LANGUI_MANUAL_T68;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid21.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T68;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T68;
    echo "\" align=\"left\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T69;
    echo " .<br><br> \r\n\r\n";
    $__bid = 21;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T70;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid22.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T70;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T70;
    echo "\" align=\"right\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T71;
    echo ".<br><br> \r\n\r\n";
    $__bid = 22;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T72;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid12.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T72;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T72;
    echo "\" align=\"left\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T73;
    echo ".<br><br> \r\n\r\n";
    $__bid = 12;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T74;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid13.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T74;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T74;
    echo "\" align=\"right\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T75;
    echo " .<br><br> \r\n\r\n";
    $__bid = 13;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T76;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid26.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T6;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T76;
    echo "\" align=\"left\"/> <p class=\"f9\"><p> \r\n";
    echo LANGUI_MANUAL_T77;
    echo "</p><br><br> \r\n\r\n";
    $__bid = 26;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T78;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid25.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T78;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T78;
    echo "\" align=\"left\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T79;
    echo ".<br><br> \r\n \r\n";
    $__bid = 25;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br>\r\n\r\n<h1>";
    echo LANGUI_MANUAL_T80;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid28.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T80;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T80;
    echo "\" align=\"left\"/> <p class=\"f9\">";
    echo LANGUI_MANUAL_T81;
    echo ".<br><br> \r\n\r\n";
    $__bid = 28;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br> \r\n\r\n<h1>";
    echo LANGUI_MANUAL_T82;
    echo "</h1><br> \r\n<img src=\"assets/default/img/un/h/gid14.gif\" width=\"166\" height=\"150\" border=\"0\" alt=\"";
    echo LANGUI_MANUAL_T82;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T82;
    echo "\" align=\"left\"/> <p class=\"f9\"><br>";
    echo LANGUI_MANUAL_T83;
    echo ".<br><br> \r\n\r\n";
    $__bid = 14;
    $a = $this->gameMetadata['items'][$__bid];
    $b = $a['levels'][0];
    echo " \r\n \r\n";
    echo LANGUI_MANUAL_T45;
    echo " :<br>\r\n<img src=\"assets/default/img/un/res/1.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $b['resources'][1];
    echo " | \r\n<img src=\"assets/default/img/un/res/2.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $b['resources'][2];
    echo " | \r\n<img src=\"assets/default/img/un/res/3.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $b['resources'][3];
    echo " | \r\n<img src=\"assets/default/img/un/res/4.gif\" width=\"18\" height=\"12\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $b['resources'][4];
    echo " | \r\n<img src=\"assets/default/img/un/res/5.gif\" alt=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" title=\"";
    echo LANGUI_MANUAL_T107;
    echo "\" width=\"18\" height=\"12\">";
    echo $b['people_inc'];
    echo " | \r\n";
    echo "<s";
    echo "pan class=\"dur\"><img alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/default/img/un/h/clock.gif\" width=\"18\" height=\"12\">";
    echo WebHelper::secondstostring( $b['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n\r\n<br> <b>";
    echo LANGUI_MANUAL_T46;
    echo ":</b><br>\r\n";
    $flag = FALSE;
    foreach ( $a['pre_requests'] as $reqId => $reqValue )
    {
        if ( $flag )
        {
            echo ", ";
        }
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_MANUAL_T47;
    }
    echo "<br><br> \r\n</div> \r\n   \t\r\n";
}
else if ( $_GET['t'] == 2 )
{
    echo "<div class=\"wholebox\"><img src=\"assets/default/img/un/h/faq_vp.jpg\" width=\"116\" height=\"128\" border=\"0\" alt=\"Versammlungsplatz\" title=\"Versammlungsplatz\" align=\"right\"><p class=\"f10 e b\">\r\n";
    echo LANGUI_MANUAL_T84;
    echo " </p> \r\n<div class=\"f10\">";
    echo LANGUI_MANUAL_T85;
    echo " </div> \r\n<img src=\"assets/default/img/un/h/faq_botschaft.jpg\" width=\"122\" height=\"150\" border=\"0\" alt=\"Botschaft\" title=\"Botschaft\" align=\"left\"><p class=\"f10 e b\">";
    echo LANGUI_MANUAL_T86;
    echo " </p> \r\n<div class=\"f10\"> ";
    echo LANGUI_MANUAL_T87;
    echo " . </div> \r\n<p class=\"f10 e b\">";
    echo LANGUI_MANUAL_T88;
    echo " </p> \r\n<div class=\"f10\"> \r\n\t";
    echo LANGUI_MANUAL_T89;
    echo "</div> \r\n<p class=\"f10 e b\">";
    echo LANGUI_MANUAL_T90;
    echo " </p> \r\n<div class=\"f10\"> \r\n\t";
    echo LANGUI_MANUAL_T91;
    echo " .</div> \r\n<p class=\"f10 e b\">";
    echo LANGUI_MANUAL_T92;
    echo "</p> \r\n<div class=\"f10\"> \r\n\t";
    echo LANGUI_MANUAL_T93;
    echo ".</div> \r\n<p class=\"f10 e b\"> ";
    echo LANGUI_MANUAL_T94;
    echo "</p> \r\n<div class=\"f10\"> \r\n\t";
    echo LANGUI_MANUAL_T95;
    echo ".</div> \r\n<p class=\"f10 e b\">";
    echo LANGUI_MANUAL_T96;
    echo " </p> \r\n<div class=\"f10\"> \r\n\t";
    echo LANGUI_MANUAL_T97;
    echo " <img src=\"assets/default/img/un/res/5.gif\" width=\"18\" \r\n\r\n height=\"12\" border=\"0\" alt=\"Getreideverbrauch\" title=\"";
    echo LANGUI_MANUAL_T106;
    echo "\">.</div> \r\n<p class=\"f10 e b\">";
    echo LANGUI_MANUAL_T98;
    echo "</p> \r\n<div class=\"f10\"> \r\n\t";
    echo LANGUI_MANUAL_T99;
    echo " <img src=\"assets/default/img/un/res/5.gif\" width=\"18\" height=\"12\" border=\"0\" alt=\"Getreideverbrauch\" title=\"";
    echo LANGUI_MANUAL_T106;
    echo " \"> 15/5</div> \r\n<p class=\"f10 e b\">";
    echo LANGUI_MANUAL_T100;
    echo " </p> \r\n<div class=\"f10\"> \r\n\t";
    echo LANGUI_MANUAL_T101;
    echo ".</div> \r\n<p class=\"f10 e b\">";
    echo LANGUI_MANUAL_T102;
    echo " </p> \r\n<div class=\"f10\"> \r\n\t";
    echo LANGUI_MANUAL_T103;
    echo ".</div> \r\n<p class=\"f10 e b\">";
    echo LANGUI_MANUAL_T104;
    echo " </p> \r\n<div class=\"f10\"> \r\n\t";
    echo LANGUI_MANUAL_T105;
    echo ".</div> \r\n<p></p>\r\n\t\t</div> \r\n";
}
echo "</div>\r\n   \t</div> \r\n   \t</div> ";
?>
