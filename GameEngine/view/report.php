<?php
require_once( LANG_UI_PATH."report.php" );
echo "<h1>";
echo LANGUI_RPT_T1;
echo "</h1>\r<div id=\"textmenu\">\r   <a href=\"report.php\"";
if ( $this->selectedTabIndex == 0 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_RPT_T2;
echo "</a>\r | <a href=\"report.php?t=1\"";
if ( $this->selectedTabIndex == 1 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_RPT_T3;
echo "</a>\r | <a href=\"report.php?t=2\"";
if ( $this->selectedTabIndex == 2 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_RPT_T4;
echo "</a>\r | <a href=\"report.php?t=3\"";
if ( $this->selectedTabIndex == 3 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_RPT_T5;
echo "</a>\r | <a href=\"report.php?t=4\"";
if ( $this->selectedTabIndex == 4 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_RPT_T6;
echo "</a>\r</div>\r";
if ( $this->showList )
{
    echo "<form method=\"post\" action=\"report.php?p=";
    echo $this->pageIndex;
    if ( 0 < $this->selectedTabIndex )
    {
        echo "&t=".$this->selectedTabIndex;
    }
    echo "\" name=\"msg\">\r<table cellpadding=\"1\" cellspacing=\"1\" id=\"overview\" class=\"row_table_data\">\r\t<thead>\r\t\t<tr>\r\t\t\t<th colspan=\"2\">";
    echo LANGUI_RPT_T7;
    echo "</th>\r\t\t\t<th class=\"sent\">";
    echo LANGUI_RPT_T8;
    echo "</th>\r\t\t</tr>\r\t</thead>\r\t<tbody>\r\t";
    $_c = 0;
    while ( $this->dataList->next( ) )
    {
        ++$_c;
        $isAttack = $this->dataList->row['from_player_id'] == $this->player->playerId;
        $rptRelativeResult = ReportHelper::getreportresultrelative( $this->dataList->row['rpt_result'], $isAttack );
        $btext = ReportHelper::getreportresulttext( $rptRelativeResult );
        $_rptResultCss = $rptRelativeResult == 100 ? 10 : $rptRelativeResult;
        echo "\t\t<tr>\r\t\t\t<td class=\"sel\"><input class=\"check\" type=\"checkbox\" name=\"dr[]\" value=\"";
        echo $this->dataList->row['id'];
        echo "\"></td>\r\t\t\t<td class=\"sub\"><img src=\"assets/x.gif\" class=\"iReport iReport";
        echo $_rptResultCss;
        echo "\" alt=\"";
        echo $btext;
        echo "\" title=\"";
        echo $btext;
        echo "\"><div><a href=\"report.php?id=";
        echo $this->dataList->row['id'];
        echo "\">";
        echo $this->getVillageName( $this->dataList->row['from_player_id'], $this->dataList->row['from_village_name'] );
        echo ReportHelper::getreportactiontext( $this->dataList->row['rpt_cat'] );
        echo $this->getVillageName( $this->dataList->row['to_player_id'], $this->dataList->row['to_village_name'] );
        echo "</a>";
        if ( !$this->dataList->row['is_readed'] )
        {
            echo " ".LANGUI_RPT_T9;
        }
        echo "</div></td>\r\t\t\t<td class=\"dat\">";
        echo $this->dataList->row['mdate'];
        echo "</td>\r\t\t</tr>\r\t";
    }
    if ( $_c == 0 )
    {
        echo "\t\t<tr><td colspan=\"3\" class=\"none\">";
        echo LANGUI_RPT_T10;
        echo "</td></tr>\r\t";
    }
    echo "\t</tbody>\r\t<tfoot>\r\t\t<tr>\r\t\t\t<th>&nbsp;</th>\r\t\t\t<th class=\"buttons\">";
    if ( 0 < $_c )
    {
        echo "<input name=\"delmsg\" value=\"";
        echo LANGUI_RPT_T11;
        echo "\" type=\"image\" id=\"btn_delete\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_RPT_T11;
        echo "\">";
    }
    echo "</th>\r\t\t\t<th class=\"navi\">";
    echo $this->getPreviousLink( );
    echo " ";
    echo $this->getNextLink( );
    echo "</th>\r\t\t</tr>\r\t</tfoot>\r</table>\r</form>\r";
}
else if ( $this->reportData['rpt_cat'] == 1 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"report_surround\">\r\t<thead>\r\t\t<tr>\r\t\t\t<th>";
    echo LANGUI_RPT_T7;
    echo ":</th>\r\t\t\t<th>";
    echo $this->getVillageName( $this->reportData['from_player_id'], $this->reportData['from_village_name'] );
    echo ReportHelper::getreportactiontext( $this->reportData['rpt_cat'] );
    echo $this->getVillageName( $this->reportData['to_player_id'], $this->reportData['to_village_name'] );
    echo "</th>\r\t\t</tr>\r\t\t<tr>\r\t\t\t<td class=\"sent\">";
    echo LANGUI_RPT_T8;
    echo ":</td>\r\t\t\t<td>";
    echo text_in_lang;
    echo " ";
    echo $this->reportData['mdate'];
    echo " ";
    echo "<s";
    echo "pan>";
    echo time_hour_lang2;
    echo " ";
    echo $this->reportData['mtime'];
    echo "</span></td>\r\t\t</tr>\r\t</thead>\r\t<tbody>\r\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\t\t<tr><td colspan=\"2\" class=\"report_content\">\r\t\t\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"trade\">\r\t\t\t\t<thead>\r\t\t\t\t\t<tr>\r\t\t\t\t\t\t<td>&nbsp;</td>\r\t\t\t\t\t\t<td>";
    if ( 0 < intval( $this->reportData['from_player_id'] ) )
    {
        echo "<a href=\"profile.php?uid=";
        echo $this->reportData['from_player_id'];
        echo "\">";
        echo $this->reportData['from_player_name'];
        echo "</a> ";
        echo LANGUI_RPT_T12;
        echo " <a href=\"village3.php?id=";
        echo $this->reportData['from_village_id'];
        echo "\">";
        echo $this->getVillageName( $this->reportData['from_player_id'], $this->reportData['from_village_name'] );
        echo "</a>";
    }
    else
    {
        echo "<s";
        echo "pan class=\"none\">";
        echo $this->reportData['from_player_name'];
        echo "</span> ";
        echo LANGUI_RPT_T12;
        echo " ";
        echo "<s";
        echo "pan class=\"none\">[?]</span>";
    }
    echo "</td>\r\t\t\t\t\t</tr>\r\t\t\t\t</thead>\r\t\t\t\t<tbody>\r\t\t\t\t\t<tr>\r\t\t\t\t\t\t<th>";
    echo LANGUI_RPT_T13;
    echo "</th>\r\t\t\t\t\t\t<td><img class=\"r1\" src=\"assets/x.gif\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo $this->reportData['resources'][0];
    echo " | <img class=\"r2\" src=\"assets/x.gif\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo $this->reportData['resources'][1];
    echo " | <img class=\"r3\" src=\"assets/x.gif\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo $this->reportData['resources'][2];
    echo " | <img class=\"r4\" src=\"assets/x.gif\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo $this->reportData['resources'][3];
    echo "</td>\r\t\t\t\t\t</tr>\r\t\t\t\t</tbody>\r\t\t\t</table>\r\t\t</td></tr>\r\t</tbody>\r</table>\r";
}
else if ( $this->reportData['rpt_cat'] == 2 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"report_surround\">\r\t<thead>\r\t\t<tr>\r\t\t\t<th>";
    echo LANGUI_RPT_T7;
    echo ":</th>\r\t\t\t<th>";
    echo $this->getVillageName( $this->reportData['from_player_id'], $this->reportData['from_village_name'] );
    echo ReportHelper::getreportactiontext( $this->reportData['rpt_cat'] );
    echo $this->getVillageName( $this->reportData['to_player_id'], $this->reportData['to_village_name'] );
    echo "</th>\r\t\t</tr>\r\t\t<tr>\r\t\t\t<td class=\"sent\">";
    echo LANGUI_RPT_T8;
    echo ":</td>\r\t\t\t<td>";
    echo text_in_lang;
    echo " ";
    echo $this->reportData['mdate'];
    echo " ";
    echo "<s";
    echo "pan>";
    echo time_hour_lang2;
    echo " ";
    echo $this->reportData['mtime'];
    echo "</span></td>\r\t\t</tr>\r\t</thead>\r\t<tbody>\r\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\t\t<tr><td colspan=\"2\" class=\"report_content\">\r\t\t\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"reinforcement\">\r\t\t\t\t<thead>\r\t\t\t\t\t<tr>\r\t\t\t\t\t\t<td class=\"role\">";
    echo LANGUI_RPT_T23;
    echo "</td>\r\t\t\t\t\t\t<td colspan=\"";
    echo $this->reportData['troopsTable']['hasHero'] ? 11 : 10;
    echo "\">";
    if ( 0 < intval( $this->reportData['from_player_id'] ) )
    {
        echo "<a href=\"profile.php?uid=";
        echo $this->reportData['from_player_id'];
        echo "\">";
        echo $this->reportData['from_player_name'];
        echo "</a> ";
        echo LANGUI_RPT_T12;
        echo " <a href=\"village3.php?id=";
        echo $this->reportData['from_village_id'];
        echo "\">";
        echo $this->getVillageName( $this->reportData['from_player_id'], $this->reportData['from_village_name'] );
        echo "</a>";
    }
    else
    {
        echo "<s";
        echo "pan class=\"none\">";
        echo $this->reportData['from_player_name'];
        echo "</span> ";
        echo LANGUI_RPT_T12;
        echo " ";
        echo "<s";
        echo "pan class=\"none\">[?]</span>";
    }
    echo "</td>\r\t\t\t\t\t</tr>\r\t\t\t\t</thead>\r\t\t\t\t<tbody class=\"units\">\r\t\t\t\t\t<tr>\r\t\t\t\t\t\t<td>&nbsp;</td>\r\t\t\t\t\t\t";
    foreach ( $this->reportData['troopsTable']['troops'] as $tid => $tnum )
    {
        echo "\t\t\t\t\t\t<td><img src=\"assets/x.gif\" class=\"unit u";
        echo $tid;
        echo "\" title=\"";
        echo constant( "troop_".$tid );
        echo "\" alt=\"";
        echo constant( "troop_".$tid );
        echo "\"></td>\r\t\t\t\t\t\t";
    }
    echo "\t\t\t\t\t\t";
    if ( $this->reportData['troopsTable']['hasHero'] )
    {
        echo "\t\t\t\t\t\t<td><img src=\"assets/x.gif\" class=\"unit uhero\" title=\"";
        echo troop_hero;
        echo "\" alt=\"";
        echo troop_hero;
        echo "\"></td>\r\t\t\t\t\t\t";
    }
    echo "\t\t\t\t\t</tr>\r\t\t\t\t\t<tr>\r\t\t\t\t\t\t<th>";
    echo LANGUI_RPT_T14;
    echo "</th>\r\t\t\t\t\t\t";
    foreach ( $this->reportData['troopsTable']['troops'] as $tid => $tnum )
    {
        echo "\t\t\t\t\t\t";
        if ( $tnum <= 0 )
        {
            echo "<td class=\"none\">0</td>";
        }
        else
        {
            echo "<td>";
            echo $tnum;
            echo "</td>";
        }
        echo "\t\t\t\t\t\t";
    }
    echo "\t\t\t\t\t\t";
    if ( $this->reportData['troopsTable']['hasHero'] )
    {
        echo "\t\t\t\t\t\t<td>1</td>\r\t\t\t\t\t\t";
    }
    echo "\t\t\t\t\t</tr>\r\t\t\t\t</tbody>\r\t\t\t\t<tbody class=\"infos\">\r\t\t\t\t\t<tr>\r\t\t\t\t\t\t<th>";
    echo LANGUI_RPT_T15;
    echo "</th>\r\t\t\t\t\t\t<td colspan=\"";
    echo $this->reportData['troopsTable']['hasHero'] ? 11 : 10;
    echo "\">";
    echo $this->reportData['cropConsume'];
    echo "<img src=\"assets/x.gif\" class=\"r4\" title=\"";
    echo item_title_4;
    echo "\" alt=\"";
    echo item_title_4;
    echo "\">";
    echo LANGUI_RPT_T16;
    echo "</td>\r\t\t\t\t\t</tr>\r\t\t\t\t</tbody>\r\t\t\t</table>\r\t\t</td></tr>\r\t</tbody>\r</table>\r";
}
else if ( $this->reportData['rpt_cat'] == 3 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"report_surround\">\r\t<thead>\r\t\t<tr>\r\t\t\t<th>";
    echo LANGUI_RPT_T7;
    echo ":</th>\r\t\t\t<th>";
    echo $this->getVillageName( $this->reportData['from_player_id'], $this->reportData['from_village_name'] );
    echo ReportHelper::getreportactiontext( $this->reportData['rpt_cat'] );
    echo $this->getVillageName( $this->reportData['to_player_id'], $this->reportData['to_village_name'] );
    echo "</th>\r\t\t</tr>\r\t\t<tr>\r\t\t\t<td class=\"sent\">";
    echo LANGUI_RPT_T8;
    echo ":</td>\r\t\t\t<td>";
    echo text_in_lang;
    echo " ";
    echo $this->reportData['mdate'];
    echo " ";
    echo "<s";
    echo "pan>";
    echo time_hour_lang2;
    echo " ";
    echo $this->reportData['mtime'];
    echo "</span></td>\r\t\t</tr>\r\t</thead>\r\t<tbody>\r\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\t\t<tr><td colspan=\"2\" class=\"report_content\">\r\t\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"attacker\">\r\t\t\t<thead>\r\t\t\t\t<tr>\r\t\t\t\t\t<td class=\"role\">";
    echo LANGUI_RPT_T17;
    echo "</td>\r\t\t\t\t\t<td colspan=\"";
    echo 0 < $this->reportData['attackTroopsTable']['heros']['number'] ? 11 : 10;
    echo "\">";
    if ( 0 < intval( $this->reportData['from_player_id'] ) )
    {
        echo "<a href=\"profile.php?uid=";
        echo $this->reportData['from_player_id'];
        echo "\">";
        echo $this->reportData['from_player_name'];
        echo "</a> ";
        echo LANGUI_RPT_T12;
        echo " <a href=\"village3.php?id=";
        echo $this->reportData['from_village_id'];
        echo "\">";
        echo $this->getVillageName( $this->reportData['from_player_id'], $this->reportData['from_village_name'] );
        echo "</a>";
    }
    else
    {
        echo "<s";
        echo "pan class=\"none\">";
        echo $this->reportData['from_player_name'];
        echo "</span> ";
        echo LANGUI_RPT_T12;
        echo " ";
        echo "<s";
        echo "pan class=\"none\">[?]</span>";
    }
    echo "</td>\r\t\t\t\t</tr>\r\t\t\t</thead>\r\t\t\t<tbody class=\"units\">\r\t\t\t\t<tr>\r\t\t\t\t<td>&nbsp;</td>\r\t\t\t\t";
    foreach ( $this->reportData['attackTroopsTable']['troops'] as $tid => $tprop )
    {
        echo "\t\t\t\t<td><img src=\"assets/x.gif\" class=\"unit u";
        echo $tid;
        echo "\" title=\"";
        echo constant( "troop_".$tid );
        echo "\" alt=\"";
        echo constant( "troop_".$tid );
        echo "\"></td>\r\t\t\t\t";
    }
    echo "\t\t\t\t";
    if ( 0 < $this->reportData['attackTroopsTable']['heros']['number'] )
    {
        echo "<td><img src=\"assets/x.gif\" class=\"unit uhero\" title=\"";
        echo troop_hero;
        echo "\" alt=\"";
        echo troop_hero;
        echo "\"></td>";
    }
    echo "\t\t\t\t</tr>\r\t\t\t\t\r\t\t\t\t<tr><th>";
    echo LANGUI_RPT_T14;
    echo "</th>\r\t\t\t\t";
    foreach ( $this->reportData['attackTroopsTable']['troops'] as $tid => $tprop )
    {
        $tnum = $tprop['number'];
        echo "\t\t\t\t";
        if ( $tnum <= 0 )
        {
            echo "<td class=\"none\">0</td>";
        }
        else
        {
            echo "<td>";
            echo $tnum;
            echo "</td>";
        }
        echo "\t\t\t\t";
    }
    echo "\t\t\t\t";
    if ( 0 < $this->reportData['attackTroopsTable']['heros']['number'] )
    {
        echo "<td";
        if ( $this->reportData['attackTroopsTable']['heros']['number'] == 0 )
        {
            echo " class=\"none\"";
        }
        echo ">";
        echo $this->reportData['attackTroopsTable']['heros']['number'];
        echo "</td>";
    }
    echo "\t\t\t\t</tr>\r\t\t\t\t\r\t\t\t\t<tr><th>";
    echo LANGUI_RPT_T18;
    echo "</th>\r\t\t\t\t";
    foreach ( $this->reportData['attackTroopsTable']['troops'] as $tid => $tprop )
    {
        $tnum = $tprop['dead_number'];
        echo "\t\t\t\t";
        if ( $tnum <= 0 )
        {
            echo "<td class=\"none\">0</td>";
        }
        else
        {
            echo "<td>";
            echo $tnum;
            echo "</td>";
        }
        echo "\t\t\t\t";
    }
    echo "\t\t\t\t";
    if ( 0 < $this->reportData['attackTroopsTable']['heros']['number'] )
    {
        echo "<td";
        if ( $this->reportData['attackTroopsTable']['heros']['dead_number'] == 0 )
        {
            echo " class=\"none\"";
        }
        echo ">";
        echo $this->reportData['attackTroopsTable']['heros']['dead_number'];
        echo "</td>";
    }
    echo "\t\t\t\t</tr>\r\t\t\t</tbody>\r\t\t\t";
    if ( !$this->reportData['all_attackTroops_dead'] )
    {
        echo "\t\t\t<tbody class=\"goods\">\r\t\t\t\t<tr>\r\t\t\t\t\t<th>";
        echo LANGUI_RPT_T24;
        echo "</th>\r\t\t\t\t\t<td colspan=\"";
        echo 0 < $this->reportData['attackTroopsTable']['heros']['number'] ? 11 : 10;
        echo "\">\r\t\t\t\t\t\t<div class=\"res\">\r\t\t\t\t\t\t\t<img class=\"r1\" src=\"assets/x.gif\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">";
        echo $this->reportData['harvest_resources'][0];
        echo " | \r\t\t\t\t\t\t\t<img class=\"r2\" src=\"assets/x.gif\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">";
        echo $this->reportData['harvest_resources'][1];
        echo " |\r\t\t\t\t\t\t\t<img class=\"r3\" src=\"assets/x.gif\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">";
        echo $this->reportData['harvest_resources'][2];
        echo " |\r\t\t\t\t\t\t\t<img class=\"r4\" src=\"assets/x.gif\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">";
        echo $this->reportData['harvest_resources'][3];
        echo "</div>\r\t\t\t\t\t\t<div class=\"carry\"><img class=\"car\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_RPT_T19;
        echo "\" title=\"";
        echo LANGUI_RPT_T19;
        echo "\">";
        echo $this->reportData['total_harvest_carry_load'];
        echo "/";
        echo $this->reportData['total_carry_load'];
        echo "</div>\r\t\t\t\t\t</td>\r\t\t\t\t</tr>\r\t\t\t</tbody>\r\t\t\t";
    }
    echo "\t\t\t";
    if ( $this->reportData['all_attackTroops_dead'] )
    {
        echo "\t\t\t<tbody class=\"infos\">\r\t\t\t\t<tr><th>";
        echo LANGUI_RPT_T20;
        echo "</th><td colspan=\"";
        echo 0 < $this->reportData['attackTroopsTable']['heros']['number'] ? 11 : 10;
        echo "\">";
        echo LANGUI_RPT_T21;
        echo "</td></tr>\r\t\t\t</tbody>\r\t\t\t";
    }
    else
    {
        echo "\t\t\t\r\t\t\t";
        if ( isset( $this->reportData['captureResult'] ) )
        {
            echo "\t\t\t<tbody class=\"infos\">\r\t\t\t\t<tr><th>";
            echo LANGUI_RPT_T20;
            echo "</th><td colspan=\"";
            echo 0 < $this->reportData['attackTroopsTable']['heros']['number'] ? 11 : 10;
            echo "\">";
            echo $this->reportData['captureResult'];
            echo "</td></tr>\r\t\t\t</tbody>\r\t\t\t";
        }
        echo "\t\t\t";
        if ( isset( $this->reportData['oasisResult'] ) )
        {
            echo "\t\t\t<tbody class=\"infos\">\r\t\t\t\t<tr><th>";
            echo LANGUI_RPT_T20;
            echo "</th><td colspan=\"";
            echo 0 < $this->reportData['attackTroopsTable']['heros']['number'] ? 11 : 10;
            echo "\">";
            echo $this->reportData['oasisResult'];
            echo "</td></tr>\r\t\t\t</tbody>\r\t\t\t";
        }
        echo "\t\t\t\r\t\t\t";
        if ( isset( $this->reportData['wallDestructionResult'] ) )
        {
            echo "\t\t\t<tbody class=\"infos\">\r\t\t\t\t<tr><th>";
            echo LANGUI_RPT_T20;
            echo "</th><td colspan=\"";
            echo 0 < $this->reportData['attackTroopsTable']['heros']['number'] ? 11 : 10;
            echo "\">";
            echo $this->reportData['wallDestructionResult'];
            echo "</td></tr>\r\t\t\t</tbody>\r\t\t\t";
        }
        echo "\t\t\t";
        if ( isset( $this->reportData['buildingDestructionResult'] ) )
        {
            echo "\t\t\t";
            foreach ( $this->reportData['buildingDestructionResult'] as $bResult )
            {
                echo "\t\t\t<tbody class=\"infos\">\r\t\t\t\t<tr><th>";
                echo LANGUI_RPT_T20;
                echo "</th><td colspan=\"";
                echo 0 < $this->reportData['attackTroopsTable']['heros']['number'] ? 11 : 10;
                echo "\">";
                echo $bResult;
                echo "</td></tr>\r\t\t\t</tbody>\r\t\t\t";
            }
            echo "\t\t\t";
        }
        echo "\t\t\t";
    }
    echo "\t\t</table>\r\t\t";
    if ( !$this->reportData['all_attackTroops_dead'] || intval( $this->reportData['to_player_id'] ) == $this->player->playerId || $this->reportData['to_player_alliance_id'] == $this->data['alliance_id'] && 0 < intval( $this->data['alliance_id'] ) )
    {
        echo "\t\t";
        $t = 0;
        foreach ( $this->reportData['defenseTroopsTable'] as $defTable )
        {
            ++$t;
            echo "\t\t<table cellpadding=\"1\" cellspacing=\"1\" class=\"defender\">\r\t\t\t<thead>\r\t\t\t\t<tr>\r\t\t\t\t<td class=\"role\">";
            echo LANGUI_RPT_T22;
            echo "\t\t\t\t</td><td colspan=\"";
            echo 0 < $defTable['heros']['number'] ? 11 : 10;
            echo "\">";
            if ( $t == 1 )
            {
                echo "\t\t\t\t";
                if ( 0 < intval( $this->reportData['to_player_id'] ) )
                {
                    echo "<a href=\"profile.php?uid=";
                    echo $this->reportData['to_player_id'];
                    echo "\">";
                    echo $this->reportData['to_player_name'];
                    echo "</a> ";
                    echo LANGUI_RPT_T12;
                    echo " <a href=\"village3.php?id=";
                    echo $this->reportData['to_village_id'];
                    echo "\">";
                    echo $this->getVillageName( $this->reportData['to_player_id'], $this->reportData['to_village_name'] );
                    echo "</a>";
                }
                else
                {
                    echo "<s";
                    echo "pan class=\"none\">";
                    echo $this->reportData['to_player_name'];
                    echo "</span> ";
                    echo LANGUI_RPT_T12;
                    echo " ";
                    echo "<s";
                    echo "pan class=\"none\">[?]</span>";
                }
                echo "\t\t\t\t";
            }
            else
            {
                echo LANGUI_RPT_T4;
            }
            echo "</td>\r\t\t\t\t</tr>\r\t\t\t</thead>\r\t\t\t<tbody class=\"units\">\r\t\t\t\t<tr>\r\t\t\t\t<td>&nbsp;</td>\r\t\t\t\t";
            foreach ( $defTable['troops'] as $tid => $tprop )
            {
                echo "\t\t\t\t<td><img src=\"assets/x.gif\" class=\"unit u";
                echo $tid;
                echo "\" title=\"";
                echo constant( "troop_".$tid );
                echo "\" alt=\"";
                echo constant( "troop_".$tid );
                echo "\"></td>\r\t\t\t\t";
            }
            echo "\t\t\t\t";
            if ( 0 < $defTable['heros']['number'] )
            {
                echo "<td><img src=\"assets/x.gif\" class=\"unit uhero\" title=\"";
                echo troop_hero;
                echo "\" alt=\"";
                echo troop_hero;
                echo "\"></td>";
            }
            echo "\t\t\t\t</tr>\r\t\t\t\t\r\t\t\t\t<tr><th>";
            echo LANGUI_RPT_T14;
            echo "</th>\r\t\t\t\t";
            foreach ( $defTable['troops'] as $tid => $tprop )
            {
                $tnum = $tprop['number'];
                echo "\t\t\t\t";
                if ( $tnum <= 0 )
                {
                    echo "<td class=\"none\">0</td>";
                }
                else
                {
                    echo "<td>";
                    echo $tnum;
                    echo "</td>";
                }
                echo "\t\t\t\t";
            }
            echo "\t\t\t\t";
            if ( 0 < $defTable['heros']['number'] )
            {
                echo "<td";
                if ( $defTable['heros']['number'] == 0 )
                {
                    echo " class=\"none\"";
                }
                echo ">";
                echo $defTable['heros']['number'];
                echo "</td>";
            }
            echo "\t\t\t\t</tr>\r\t\t\t\t\r\t\t\t\t<tr><th>";
            echo LANGUI_RPT_T18;
            echo "</th>\r\t\t\t\t";
            foreach ( $defTable['troops'] as $tid => $tprop )
            {
                $tnum = $tprop['dead_number'];
                echo "\t\t\t\t";
                if ( $tnum <= 0 )
                {
                    echo "<td class=\"none\">0</td>";
                }
                else
                {
                    echo "<td>";
                    echo $tnum;
                    echo "</td>";
                }
                echo "\t\t\t\t";
            }
            echo "\t\t\t\t";
            if ( 0 < $defTable['heros']['number'] )
            {
                echo "<td";
                if ( $defTable['heros']['dead_number'] == 0 )
                {
                    echo " class=\"none\"";
                }
                echo ">";
                echo $defTable['heros']['dead_number'];
                echo "</td>";
            }
            echo "\t\t\t\t</tr>\r\t\t\t</tbody>\r\t\t</table>\r\t\t";
        }
        echo "\t\t";
    }
    echo "\t\t</td></tr>\r\t</tbody>\r</table>\r<p></p>";
    echo $this->getFlashContent( "assets/anm/war/attack.swf", 500, 200 );
}
else if ( $this->reportData['rpt_cat'] == 4 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"report_surround\">\r\t<thead>\r\t\t<tr>\r\t\t\t<th>";
    echo LANGUI_RPT_T7;
    echo ":</th>\r\t\t\t<th>";
    echo $this->getVillageName( $this->reportData['from_player_id'], $this->reportData['from_village_name'] );
    echo ReportHelper::getreportactiontext( $this->reportData['rpt_cat'] );
    echo $this->getVillageName( $this->reportData['to_player_id'], $this->reportData['to_village_name'] );
    echo "</th>\r\t\t</tr>\r\t\t<tr>\r\t\t\t<td class=\"sent\">";
    echo LANGUI_RPT_T8;
    echo ":</td>\r\t\t\t<td>";
    echo text_in_lang;
    echo " ";
    echo $this->reportData['mdate'];
    echo " ";
    echo "<s";
    echo "pan>";
    echo time_hour_lang2;
    echo " ";
    echo $this->reportData['mtime'];
    echo "</span></td>\r\t\t</tr>\r\t</thead>\r\t<tbody>\r\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\t\t<tr><td colspan=\"2\" class=\"report_content\">\r\t\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"attacker\">\r\t\t\t<thead>\r\t\t\t\t<tr>\r\t\t\t\t\t<td class=\"role\">";
    echo LANGUI_RPT_T17;
    echo "</td>\r\t\t\t\t\t<td colspan=\"";
    echo 0 < $this->reportData['attackTroopsTable']['heros']['number'] ? 11 : 10;
    echo "\">";
    if ( 0 < intval( $this->reportData['from_player_id'] ) )
    {
        echo "<a href=\"profile.php?uid=";
        echo $this->reportData['from_player_id'];
        echo "\">";
        echo $this->reportData['from_player_name'];
        echo "</a> ";
        echo LANGUI_RPT_T12;
        echo " <a href=\"village3.php?id=";
        echo $this->reportData['from_village_id'];
        echo "\">";
        echo $this->getVillageName( $this->reportData['from_player_id'], $this->reportData['from_village_name'] );
        echo "</a>";
    }
    else
    {
        echo "<s";
        echo "pan class=\"none\">";
        echo $this->reportData['from_player_name'];
        echo "</span> ";
        echo LANGUI_RPT_T12;
        echo " ";
        echo "<s";
        echo "pan class=\"none\">[?]</span>";
    }
    echo "</td>\r\t\t\t\t</tr>\r\t\t\t</thead>\r\t\t\t<tbody class=\"units\">\r\t\t\t\t<tr>\r\t\t\t\t<td>&nbsp;</td>\r\t\t\t\t";
    foreach ( $this->reportData['attackTroopsTable']['troops'] as $tid => $tprop )
    {
        echo "\t\t\t\t<td><img src=\"assets/x.gif\" class=\"unit u";
        echo $tid;
        echo "\" title=\"";
        echo constant( "troop_".$tid );
        echo "\" alt=\"";
        echo constant( "troop_".$tid );
        echo "\"></td>\r\t\t\t\t";
    }
    echo "\t\t\t\t";
    if ( 0 < $this->reportData['attackTroopsTable']['heros']['number'] )
    {
        echo "<td><img src=\"assets/x.gif\" class=\"unit uhero\" title=\"";
        echo troop_hero;
        echo "\" alt=\"";
        echo troop_hero;
        echo "\"></td>";
    }
    echo "\t\t\t\t</tr>\r\t\t\t\t\r\t\t\t\t<tr><th>";
    echo LANGUI_RPT_T14;
    echo "</th>\r\t\t\t\t";
    foreach ( $this->reportData['attackTroopsTable']['troops'] as $tid => $tprop )
    {
        $tnum = $tprop['number'];
        echo "\t\t\t\t";
        if ( $tnum <= 0 )
        {
            echo "<td class=\"none\">0</td>";
        }
        else
        {
            echo "<td>";
            echo $tnum;
            echo "</td>";
        }
        echo "\t\t\t\t";
    }
    echo "\t\t\t\t";
    if ( 0 < $this->reportData['attackTroopsTable']['heros']['number'] )
    {
        echo "<td";
        if ( $this->reportData['attackTroopsTable']['heros']['number'] == 0 )
        {
            echo " class=\"none\"";
        }
        echo ">";
        echo $this->reportData['attackTroopsTable']['heros']['number'];
        echo "</td>";
    }
    echo "\t\t\t\t</tr>\r\t\t\t\t\r\t\t\t\t<tr><th>";
    echo LANGUI_RPT_T18;
    echo "</th>\r\t\t\t\t";
    foreach ( $this->reportData['attackTroopsTable']['troops'] as $tid => $tprop )
    {
        $tnum = $tprop['dead_number'];
        echo "\t\t\t\t";
        if ( $tnum <= 0 )
        {
            echo "<td class=\"none\">0</td>";
        }
        else
        {
            echo "<td>";
            echo $tnum;
            echo "</td>";
        }
        echo "\t\t\t\t";
    }
    echo "\t\t\t\t";
    if ( 0 < $this->reportData['attackTroopsTable']['heros']['number'] )
    {
        echo "<td";
        if ( $this->reportData['attackTroopsTable']['heros']['dead_number'] == 0 )
        {
            echo " class=\"none\"";
        }
        echo ">";
        echo $this->reportData['attackTroopsTable']['heros']['dead_number'];
        echo "</td>";
    }
    echo "\t\t\t\t</tr>\r\t\t\t</tbody>\r\t\t\t";
    if ( isset( $this->reportData['harvest_resources'] ) )
    {
        echo "\t\t\t<tbody class=\"goods\">\r\t\t\t\t<tr>\r\t\t\t\t\t<th>";
        echo LANGUI_RPT_T13;
        echo "</th>\r\t\t\t\t\t<td colspan=\"";
        echo 0 < $this->reportData['attackTroopsTable']['heros']['number'] ? 11 : 10;
        echo "\">\r\t\t\t\t\t\t<div class=\"res\">\r\t\t\t\t\t\t\t<img class=\"r1\" src=\"assets/x.gif\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">";
        echo $this->reportData['harvest_resources'][0];
        echo " | \r\t\t\t\t\t\t\t<img class=\"r2\" src=\"assets/x.gif\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">";
        echo $this->reportData['harvest_resources'][1];
        echo " |\r\t\t\t\t\t\t\t<img class=\"r3\" src=\"assets/x.gif\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">";
        echo $this->reportData['harvest_resources'][2];
        echo " |\r\t\t\t\t\t\t\t<img class=\"r4\" src=\"assets/x.gif\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">";
        echo $this->reportData['harvest_resources'][3];
        echo "\t\t\t\t\t\t</div>\r\t\t\t\t\t</td>\r\t\t\t\t</tr>\r\t\t\t</tbody>\r\t\t\t";
    }
    echo "\t\t\t";
    if ( isset( $this->reportData['harvest_info'] ) )
    {
        echo "\t\t\t<tbody class=\"infos\">\r\t\t\t\t<tr><th>";
        echo LANGUI_RPT_T20;
        echo "</th><td colspan=\"10\">";
        echo $this->reportData['harvest_info'];
        echo "</td></tr>\r\t\t\t</tbody>\r\t\t\t";
    }
    echo "\t\t</table>\r\t\t";
    if ( !$this->reportData['all_spy_dead'] || intval( $this->reportData['to_player_id'] ) == $this->player->playerId || $this->reportData['to_player_alliance_id'] == $this->data['alliance_id'] && 0 < intval( $this->data['alliance_id'] ) )
    {
        echo "\t\t";
        $t = 0;
        foreach ( $this->reportData['defenseTroopsTable'] as $defTable )
        {
            ++$t;
            echo "\t\t<table cellpadding=\"1\" cellspacing=\"1\" class=\"defender\">\r\t\t\t<thead>\r\t\t\t\t<tr>\r\t\t\t\t<td class=\"role\">";
            echo LANGUI_RPT_T22;
            echo "\t\t\t\t</td><td colspan=\"";
            echo 0 < $defTable['heros']['number'] ? 11 : 10;
            echo "\">";
            if ( $t == 1 )
            {
                echo "\t\t\t\t";
                if ( 0 < intval( $this->reportData['to_player_id'] ) )
                {
                    echo "<a href=\"profile.php?uid=";
                    echo $this->reportData['to_player_id'];
                    echo "\">";
                    echo $this->reportData['to_player_name'];
                    echo "</a> ";
                    echo LANGUI_RPT_T12;
                    echo " <a href=\"village3.php?id=";
                    echo $this->reportData['to_village_id'];
                    echo "\">";
                    echo $this->getVillageName( $this->reportData['to_player_id'], $this->reportData['to_village_name'] );
                    echo "</a>";
                }
                else
                {
                    echo "<s";
                    echo "pan class=\"none\">";
                    echo $this->reportData['to_player_name'];
                    echo "</span> ";
                    echo LANGUI_RPT_T12;
                    echo " ";
                    echo "<s";
                    echo "pan class=\"none\">[?]</span>";
                }
                echo "\t\t\t\t";
            }
            else
            {
                echo LANGUI_RPT_T4;
            }
            echo "</td>\r\t\t\t\t</tr>\r\t\t\t</thead>\r\t\t\t<tbody class=\"units\">\r\t\t\t\t<tr>\r\t\t\t\t<td>&nbsp;</td>\r\t\t\t\t";
            foreach ( $defTable['troops'] as $tid => $tprop )
            {
                echo "\t\t\t\t<td><img src=\"assets/x.gif\" class=\"unit u";
                echo $tid;
                echo "\" title=\"";
                echo constant( "troop_".$tid );
                echo "\" alt=\"";
                echo constant( "troop_".$tid );
                echo "\"></td>\r\t\t\t\t";
            }
            echo "\t\t\t\t";
            if ( 0 < $defTable['heros']['number'] )
            {
                echo "<td><img src=\"assets/x.gif\" class=\"unit uhero\" title=\"";
                echo troop_hero;
                echo "\" alt=\"";
                echo troop_hero;
                echo "\"></td>";
            }
            echo "\t\t\t\t</tr>\r\t\t\t\t\r\t\t\t\t<tr><th>";
            echo LANGUI_RPT_T14;
            echo "</th>\r\t\t\t\t";
            foreach ( $defTable['troops'] as $tid => $tprop )
            {
                $tnum = $tprop['number'];
                echo "\t\t\t\t";
                if ( $tnum <= 0 )
                {
                    echo "<td class=\"none\">0</td>";
                }
                else
                {
                    echo "<td>";
                    echo $tnum;
                    echo "</td>";
                }
                echo "\t\t\t\t";
            }
            echo "\t\t\t\t";
            if ( 0 < $defTable['heros']['number'] )
            {
                echo "<td";
                if ( $defTable['heros']['number'] == 0 )
                {
                    echo " class=\"none\"";
                }
                echo ">";
                echo $defTable['heros']['number'];
                echo "</td>";
            }
            echo "\t\t\t\t</tr>\r\t\t\t\t\r\t\t\t\t<tr><th>";
            echo LANGUI_RPT_T18;
            echo "</th>\r\t\t\t\t";
            foreach ( $defTable['troops'] as $tid => $tprop )
            {
                $tnum = $tprop['dead_number'];
                echo "\t\t\t\t";
                if ( $tnum <= 0 )
                {
                    echo "<td class=\"none\">0</td>";
                }
                else
                {
                    echo "<td>";
                    echo $tnum;
                    echo "</td>";
                }
                echo "\t\t\t\t";
            }
            echo "\t\t\t\t";
            if ( 0 < $defTable['heros']['number'] )
            {
                echo "<td";
                if ( $defTable['heros']['dead_number'] == 0 )
                {
                    echo " class=\"none\"";
                }
                echo ">";
                echo $defTable['heros']['dead_number'];
                echo "</td>";
            }
            echo "\t\t\t\t</tr>\r\t\t\t</tbody>\r\t\t</table>\r\t\t";
        }
        echo "\t\t";
    }
    echo "\t\t</td></tr>\r\t</tbody>\r</table>\t\r";
}
?>
