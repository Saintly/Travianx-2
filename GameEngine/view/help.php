<?php
require_once( LANG_UI_PATH."help.php" );
if($this->state == 0){
    echo "<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_HLP_T1;
    echo "</h1><p></p>\r\n<p>";
    echo LANGUI_HLP_T2;
    echo ".</p><p></p>\r\n<img class=\"troops\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_HLP_T3;
    echo "\" title=\"";
    echo LANGUI_HLP_T3;
    echo "\">\r\n<img class=\"buildings\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_HLP_T4;
    echo "\" title=\"";
    echo LANGUI_HLP_T4;
    echo "\">\r\n<ul>\r\n\t<li>";
    echo LANGUI_HLP_T5;
    echo "</li>\r\n\t<ul>\r\n\t\t<li><a href=\"help.php?c=1&id=6\">";
    echo tribe_6;
    echo "</a></li>\r\n\t\t<li><a href=\"help.php?c=1&id=7\">";
    echo tribe_7;
    echo "</a></li>\r\n\t\t<li><a href=\"help.php?c=1&id=1\">";
    echo tribe_1;
    echo "</a></li>\r\n\t\t<li><a href=\"help.php?c=1&id=2\">";
    echo tribe_2;
    echo "</a></li>\r\n\t\t<li><a href=\"help.php?c=1&id=3\">";
    echo tribe_3;
    echo "</a></li>\r\n\t</ul>\r\n\t<br>\r\n\t<li>";
    echo LANGUI_HLP_T4;
    echo "</li>\r\n\t<ul>\r\n\t\t<li><a href=\"help.php?c=2&id=1\">";
    echo LANGUI_HLP_T6;
    echo "</a></li>\r\n\t\t<li><a href=\"help.php?c=2&id=2\">";
    echo LANGUI_HLP_T7;
    echo "</a></li>\r\n\t\t<li><a href=\"help.php?c=2&id=3\">";
    echo LANGUI_HLP_T8;
    echo "</a></li>\r\n\t</ul>\r\n\t<br>\r\n\t<li>\r\n\t\t<a href=\"manual.php\" target=\"_blank\">";
    echo LANGUI_HLP_T9;
    echo " <img class=\"external\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_HLP_T10;
    echo "\" title=\"";
    echo LANGUI_HLP_T10;
    echo "\"></a><br>\r\n\t\t<p><br><br>";
    echo LANGUI_HLP_T11;
    echo ".</p>\r\n\t</li>\r\n\t<br>\r\n</ul>\r\n";
}
else if ( $this->state == 1 )
{
    echo "<h1><img class=\"unit uunits\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_HLP_T12;
    echo " (";
    echo constant( "tribe_".$this->tribeId );
    echo ")</h1>\r\n<ul>\r\n\t";
    foreach ( $this->gameMetadata['troops'] as $troopId => $troop )
    {
        if ( $this->tribeId == $troop['for_tribe_id'] && $troop['is_cavalry'] !== NULL )
        {
            echo "\t<li><a href=\"help.php?c=3&id=";
            echo $troopId;
            echo "\">";
            echo constant( "troop_".$troopId );
            echo "</a></li>\r\n\t";
        }
    }
    echo "</ul>\r\n";
}
else if ( $this->state == 2 )
{
    if ( $this->buildingGroup == 1 )
    {
        echo "<h1><img class=\"unit ugeb\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T13;
        echo "</h1>\r\n<ul>\r\n\t<li><a href=\"help.php?c=4&id=1\">";
        echo item_1;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=2\">";
        echo item_2;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=3\">";
        echo item_3;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=4\">";
        echo item_4;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=5\">";
        echo item_5;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=6\">";
        echo item_6;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=7\">";
        echo item_7;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=8\">";
        echo item_8;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=9\">";
        echo item_9;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=10\">";
        echo item_10;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=11\">";
        echo item_11;
        echo "</a></li>\r\n</ul>\r\n";
    }
    else if ( $this->buildingGroup == 2 )
    {
        echo "<h1><img class=\"unit ugeb\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T14;
        echo "</h1>\r\n<ul>\r\n\t<li><a href=\"help.php?c=4&id=12\">";
        echo item_12;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=13\">";
        echo item_13;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=14\">";
        echo item_14;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=16\">";
        echo item_16;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=19\">";
        echo item_19;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=20\">";
        echo item_20;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=21\">";
        echo item_21;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=22\">";
        echo item_22;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=29\">";
        echo item_29;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=30\">";
        echo item_30;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=36\">";
        echo item_36;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=37\">";
        echo item_37;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=42\">";
        echo item_42;
        echo "</a></li>\r\n</ul>\r\n";
    }
    else if ( $this->buildingGroup == 3 )
    {
        echo "<h1><img class=\"unit ugeb\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T15;
        echo "</h1>\r\n<ul>\r\n\t<li><a href=\"help.php?c=4&id=15\">";
        echo item_15;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=17\">";
        echo item_17;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=18\">";
        echo item_18;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=23\">";
        echo item_23;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=24\">";
        echo item_24;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=25\">";
        echo item_25;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=26\">";
        echo item_26;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=28\">";
        echo item_28;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=34\">";
        echo item_34;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=35\">";
        echo item_35;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=38\">";
        echo item_38;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=39\">";
        echo item_39;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=41\">";
        echo item_41;
        echo "</a></li>\r\n\t<li><a href=\"help.php?c=4&id=40\">";
        echo item_40;
        echo "</a></li>\r\n</ul>\r\n";
    }
}
else if ( $this->state == 3 )
{
    echo "<h1><img class=\"unit u";
    echo $this->troopId;
    echo "\" src=\"assets/x.gif\" alt=\"";
    echo constant( "troop_".$this->troopId );
    echo "\" title=\"";
    echo constant( "troop_".$this->troopId );
    echo "\"> \r\n";
    echo constant( "troop_".$this->troopId );
    echo " ";
    echo "<s";
    echo "pan class=\"tribe\">(";
    echo constant( "tribe_".$this->troop['for_tribe_id'] );
    echo ")</span></h1>\r\n\r\n<table id=\"troop_info\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th><img class=\"att_all\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_HLP_T16;
    echo "\" title=\"";
    echo LANGUI_HLP_T16;
    echo "\"></th>\r\n\t\t\t<th><img class=\"def_i\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_HLP_T17;
    echo "\" title=\"";
    echo LANGUI_HLP_T17;
    echo "\"></th>\r\n\t\t\t<th><img class=\"def_c\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_HLP_T18;
    echo "\" title=\"";
    echo LANGUI_HLP_T18;
    echo "\"></th>\r\n\t\t\t<th><img class=\"r1\" src=\"assets/x.gif\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\"></th>\r\n\t\t\t<th><img class=\"r2\" src=\"assets/x.gif\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\"></th>\r\n\t\t\t<th><img class=\"r3\" src=\"assets/x.gif\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\"></th>\r\n\t\t\t<th><img class=\"r4\" src=\"assets/x.gif\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\"></th>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo $this->troop['attack_value'];
    echo "</td>\r\n\t\t\t<td>";
    echo $this->troop['defense_infantry'];
    echo "</td>\r\n\t\t\t<td>";
    echo $this->troop['defense_cavalry'];
    echo "</td>\r\n\t\t\t<td>";
    echo $this->troop['training_resources'][1];
    echo "</td>\r\n\t\t\t<td>";
    echo $this->troop['training_resources'][2];
    echo "</td>\r\n\t\t\t<td>";
    echo $this->troop['training_resources'][3];
    echo "</td>\r\n\t\t\t<td>";
    echo $this->troop['training_resources'][4];
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<table id=\"troop_details\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_HLP_T19;
    echo ":</th>\r\n\t\t\t<td><b>";
    echo $this->troop['velocity'] * $this->gameMetadata['game_speed'];
    echo "</b> ";
    echo LANGUI_HLP_T20;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_HLP_T21;
    echo ":</th>\r\n\t\t\t<td><b>";
    echo $this->troop['carry_load'];
    echo "</b> ";
    echo LANGUI_HLP_T6;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_HLP_T22;
    echo ":</th>\r\n\t\t\t<td><img class=\"r5\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_HLP_T23;
    echo "\" title=\"";
    echo LANGUI_HLP_T23;
    echo "\"> ";
    echo $this->troop['crop_consumption'];
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_HLP_T24;
    echo ":</th>\r\n\t\t\t<td><img class=\"clock\" src=\"assets/x.gif\" alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\"> ";
    echo WebHelper::secondstostring( intval( $this->troop['training_time_consume'] / $this->gameSpeed ) );
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<img id=\"big_unit\" class=\"big_u";
    echo $this->troopId;
    echo "\" src=\"assets/x.gif\" alt=\"";
    echo constant( "troop_".$this->troopId );
    echo "\" title=\"";
    echo constant( "troop_".$this->troopId );
    echo "\">\r\n<div id=\"t_desc\"><p>\r\n<br>";
    echo constant( "troop_desc_".$this->troopId );
    echo "<br>\r\n</p></div>\r\n\r\n<div id=\"prereqs\"><b>";
    echo LANGUI_HLP_T25;
    echo ":</b><br>\r\n\t";
    $t_pre_request = isset( $this->troop['help_pre_requests'] ) ? $this->troop['help_pre_requests'] : $this->troop['pre_requests'];
    $flag = FALSE;
    foreach ( $t_pre_request as $reqIdStr => $reqValue )
    {
        $reqIds = explode( "|", $reqIdStr );
        $strFlag = FALSE;
        if ( $flag )
        {
            echo ", ";
        }
        foreach ( $reqIds as $reqId )
        {
            if ( !$strFlag )
            {
                $strFlag = TRUE;
            }
            else
            {
                echo " ".text_or_lang;
            }
            echo "\t<a href=\"help.php?c=4&id=";
            echo $reqId;
            echo "\">";
            if ( $reqValue == NULL )
            {
                echo "<strike>";
            }
            echo constant( "item_".$reqId );
            if ( $reqValue == NULL )
            {
                echo "</strike>";
            }
            echo "</a>";
            if ( $reqValue != NULL )
            {
                echo " ";
                echo level_lang;
                echo " ";
                echo $reqValue;
            }
            echo "\t";
        }
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_HLP_T26;
    }
    echo "</div>\r\n";
}
else if ( $this->state == 4 )
{
    echo "<h1><img class=\"unit ugeb\" src=\"assets/x.gif\"> ";
    echo constant( "item_".$this->itemId );
    echo "</h1>\r\n<img class=\"building g";
    echo $this->itemId;
    echo "\" src=\"assets/x.gif\" alt=\"";
    echo constant( "item_".$this->itemId );
    echo "\" title=\"";
    echo constant( "item_".$this->itemId );
    echo "\">";
    echo constant( "item_desc_".$this->itemId );
    echo "<p>\r\n\t<b>";
    echo LANGUI_HLP_T27;
    echo " :<br>\r\n\t<img class=\"r1\" src=\"assets/x.gif\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $this->build['levels'][0]['resources'][1];
    echo " | \r\n\t<img class=\"r2\" src=\"assets/x.gif\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $this->build['levels'][0]['resources'][2];
    echo " | \r\n\t<img class=\"r3\" src=\"assets/x.gif\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $this->build['levels'][0]['resources'][3];
    echo " | \r\n\t<img class=\"r4\" src=\"assets/x.gif\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $this->build['levels'][0]['resources'][4];
    echo " | \r\n\t<img class=\"r5\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_HLP_T23;
    echo "\" title=\"";
    echo LANGUI_HLP_T23;
    echo "\">";
    echo $this->build['levels'][0]['people_inc'];
    echo " | \r\n\t";
    echo "<s";
    echo "pan class=\"dur\"><img class=\"clock\" alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\" src=\"assets/x.gif\">";
    echo WebHelper::secondstostring( $this->build['levels'][0]['time_consume'] / $this->gameMetadata['game_speed'] );
    echo "</span>\r\n</p>\r\n<p>\r\n\t<b>";
    echo LANGUI_HLP_T25;
    echo ":</b><br>\r\n\t";
    $flag = FALSE;
    foreach ( $this->build['pre_requests'] as $reqId => $reqValue )
    {
        echo "\t";
        if ( $flag )
        {
            echo ", ";
        }
        echo "<a href=\"help.php?c=4&id=";
        echo $reqId;
        echo "\">";
        if ( $reqValue == NULL )
        {
            echo "<strike>";
        }
        echo constant( "item_".$reqId );
        if ( $reqValue == NULL )
        {
            echo "</strike>";
        }
        echo "</a>";
        if ( $reqValue != NULL )
        {
            echo " ";
            echo level_lang;
            echo " ";
            echo $reqValue;
        }
        echo "\t";
        $flag = TRUE;
    }
    if ( !$flag )
    {
        echo LANGUI_HLP_T26;
    }
    echo "</p>\r\n";
}
else if ( $this->state == 5 )
{
    echo "\t";
    if ( $this->plusIndex == 0 )
    {
        echo "\t<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\" /> ";
        echo LANGUI_HLP_T28;
        echo "</h1>\r\n\t";
        echo LANGUI_HLP_T29;
        echo ":<br /><br />\r\n\t<ul>\r\n\t\t<li>";
        echo LANGUI_HLP_T30;
        echo "</li>\r\n\t\t<li>";
        echo LANGUI_HLP_T31;
        echo "</li>\r\n\t\t<li>";
        echo LANGUI_HLP_T32;
        echo "</li>\r\n\t\t<li>";
        echo LANGUI_HLP_T33;
        echo "</li>\r\n\t</ul>\r\n\t";
    }
    else if ( $this->plusIndex == 1 )
    {
        echo "\t<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T34;
        echo "</h1>\r\n\t";
        echo LANGUI_HLP_T35;
        echo ". \r\n\t";
    }
    else if ( $this->plusIndex == 2 )
    {
        echo "\t<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T36;
        echo "</h1>\r\n\t";
        echo LANGUI_HLP_T37;
        echo ". \r\n\t";
    }
    else if ( $this->plusIndex == 3 )
    {
        echo "\t<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T38;
        echo "</h1>\r\n\t";
        echo LANGUI_HLP_T39;
        echo ". \r\n\t";
    }
    else if ( $this->plusIndex == 4 )
    {
        echo "\t<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T40;
        echo "</h1>\r\n\t";
        echo LANGUI_HLP_T41;
        echo ". \r\n\t";
    }
    else if ( $this->plusIndex == 5 )
    {
        echo "\t<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T42;
        echo "</h1>\r\n\t";
        echo LANGUI_HLP_T43;
        echo ".\r\n\t";
    }
    else if ( $this->plusIndex == 7 )
    {
        echo "\t<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T44;
        echo "</h1>\r\n\t";
        echo LANGUI_HLP_T45;
        echo ".\r\n\t";
    }
    else if ( $this->plusIndex == 8 )
    {
        echo "\t<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T75;
        echo "</h1>\r\n\t";
        echo LANGUI_HLP_T76;
        echo ".\r\n\t";
    }
    else if ( $this->plusIndex == 6 )
    {
        echo "\t<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T46;
        echo "</h1>\r\n\t<p>";
        echo LANGUI_HLP_T47;
        echo ".</p>\r\n<table id=\"examples\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
        echo LANGUI_HLP_T48;
        echo "</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
        echo LANGUI_HLP_T49;
        echo "</td>\r\n\t\t\t<td>";
        echo LANGUI_HLP_T50;
        echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo item_19;
        echo "</th>\r\n\t\t\t<td>build.php?bid=19</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo item_17;
        echo "</th>\r\n\t\t\t<td>build.php?bid=17</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo item_16;
        echo "</th>\r\n\t\t\t<td>build.php?bid=16</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_HLP_T51;
        echo "</th>\r\n\t\t\t<td>notes.php*</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<p>";
        echo LANGUI_HLP_T52;
        echo ".</p>\r\n\t";
    }
}
else if ( $this->state == 6 )
{
    if ( $this->id == 0 )
    {
        echo "<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T53;
        echo "</h1>\r\n<p></p>\r\n<p>";
        echo LANGUI_HLP_T54;
        echo "</p><p></p>\r\n<table id=\"examples\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
        echo LANGUI_HLP_T55;
        echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_HLP_T56;
        echo "</th>\r\n\t\t\t<td>";
        echo LANGUI_HLP_T57;
        echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_HLP_T58;
        echo "</th>\r\n\t\t\t<td>";
        echo LANGUI_HLP_T59;
        echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_HLP_T60;
        echo "</th>\r\n\t\t\t<td>";
        echo LANGUI_HLP_T61;
        echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_HLP_T62;
        echo "</th>\r\n\t\t\t<td>";
        echo LANGUI_HLP_T63;
        echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<p></p><p>";
        echo LANGUI_HLP_T64;
        echo ":-</p><p></p>\r\n<p class=\"medals\"><img src=\"assets/x.gif\" class=\"medal t1_1\" alt=\"\" title=\"\"><img src=\"assets/x.gif\" class=\"medal t1_2\" alt=\"\" title=\"\"><img src=\"assets/x.gif\" class=\"medal t1_3\" alt=\"\" title=\"\"><img src=\"assets/x.gif\" class=\"medal t1_4\" alt=\"\" title=\"\"></p>\r\n";
    }
    else if ( $this->id == 1 )
    {
        echo "<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
        echo LANGUI_HLP_T65;
        echo "</h1>\r\n<p>";
        echo LANGUI_HLP_T66;
        echo "</p><p></p>\r\n<table id=\"examples\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
        echo LANGUI_HLP_T67;
        echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_HLP_T56;
        echo "</th>\r\n\t\t\t<td>";
        echo LANGUI_HLP_T68;
        echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_HLP_T58;
        echo "</th>\r\n\t\t\t<td>";
        echo LANGUI_HLP_T69;
        echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_HLP_T60;
        echo "</th>\r\n\t\t\t<td>";
        echo LANGUI_HLP_T61;
        echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_HLP_T62;
        echo "</th>\r\n\t\t\t<td>";
        echo LANGUI_HLP_T63;
        echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<p>";
        echo LANGUI_HLP_T70;
        echo "</p>\r\n<p class=\"medals\"><img src=\"assets/x.gif\" class=\"medal a1_1\" alt=\"\" title=\"\"><img src=\"assets/x.gif\" class=\"medal a1_2\" alt=\"\" title=\"\"><img src=\"assets/x.gif\" class=\"medal a1_3\" alt=\"\" title=\"\"><img src=\"assets/x.gif\" class=\"medal a1_4\" alt=\"\" title=\"\"></p>\r\n";
    }
}
else if ( $this->state == 7 )
{
    echo "<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_HLP_T73;
    echo "</h1>\r\n";
    echo LANGUI_HLP_T74;
}
if ( 0 < $this->state )
{
    echo "<map id=\"nav\" name=\"nav\">\r\n\t<area href=\"help.php";
    echo $this->previousLink;
    echo "\" title=\"";
    echo LANGUI_HLP_T71;
    echo "\" coords=\"0,0,45,18\" shape=\"rect\" alt=\"\">\r\n\t<area href=\"help.php\" title=\"";
    echo LANGUI_HLP_T1;
    echo "\" coords=\"46,0,70,18\" shape=\"rect\" alt=\"\">\r\n\t<area href=\"help.php";
    echo $this->nextLink;
    echo "\" title=\"";
    echo LANGUI_HLP_T72;
    echo "\" coords=\"71,0,116,18\" shape=\"rect\" alt=\"\">\r\n</map>\r\n<img usemap=\"#nav\" src=\"assets/x.gif\" class=\"navi\" alt=\"\">\r\n";
}