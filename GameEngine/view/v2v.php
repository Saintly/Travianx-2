<?php
/**
*
* @ This file is created by Decodeby.US
* @ deZender Public (PHP5 Decompiler)
*
* @	Version			:	1.0.0.0
* @	Author			:	Ps2Gamer & Cyko
* @	Release on		:	30.05.2011
* @	Official site	:	http://decodeby.us
*
*/

require_once( LANG_UI_PATH."v2v.php" );
if ( $this->pageState == 1 )
{
    echo "<h1>";
    echo LANGUI_V2V_T1;
    echo "</h1>\r\n\r\n<form method=\"post\" name=\"snd\" action=\"v2v.php\">\r\n<table id=\"troops\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td class=\"line-first column-first\"><img class=\"unit u";
    echo $this->troops[0]['troopId'];
    echo "\" src=\"assets/x.gif\" title=\"";
    echo constant( "troop_".$this->troops[0]['troopId'] );
    echo "\" alt=\"";
    echo constant( "troop_".$this->troops[0]['troopId'] );
    echo "\"";
    if ( 0 < $this->troops[0]['number'] )
    {
        echo " onclick=\"_('t1').value=''; return false;\"";
    }
    echo "> <input type=\"text\" class=\"text";
    if ( $this->troops[0]['number'] <= 0 )
    {
        echo " disabled";
    }
    echo "\" name=\"t[";
    echo $this->troops[0]['troopId'];
    echo "]\" id=\"t1\" value=\"\" maxlength=\"6\"> ";
    if ( $this->troops[0]['number'] <= 0 )
    {
        echo "<s";
        echo "pan class=\"none\">(0)</span>";
    }
    else
    {
        echo "<a href=\"#\" onclick=\"_('t1').value=";
        echo $this->troops[0]['number'];
        echo "; return false;\">(";
        echo $this->troops[0]['number'];
        echo ")</a>";
    }
    echo "</td>\r\n\t\t\t<td class=\"line-first\"><img class=\"unit u";
    echo $this->troops[3]['troopId'];
    echo "\" src=\"assets/x.gif\" title=\"";
    echo constant( "troop_".$this->troops[3]['troopId'] );
    echo "\" alt=\"";
    echo constant( "troop_".$this->troops[3]['troopId'] );
    echo "\"";
    if ( 0 < $this->troops[3]['number'] )
    {
        echo " onclick=\"_('t4').value=''; return false;\"";
    }
    echo "> <input type=\"text\" class=\"text";
    if ( $this->troops[3]['number'] <= 0 )
    {
        echo " disabled";
    }
    echo "\" name=\"t[";
    echo $this->troops[3]['troopId'];
    echo "]\" id=\"t4\" value=\"\" maxlength=\"6\"> ";
    if ( $this->troops[3]['number'] <= 0 )
    {
        echo "<s";
        echo "pan class=\"none\">(0)</span>";
    }
    else
    {
        echo "<a href=\"#\" onclick=\"_('t4').value=";
        echo $this->troops[3]['number'];
        echo "; return false;\">(";
        echo $this->troops[3]['number'];
        echo ")</a>";
    }
    echo "</td>\r\n\t\t\t<td class=\"line-first\"><img class=\"unit u";
    echo $this->troops[6]['troopId'];
    echo "\" src=\"assets/x.gif\" title=\"";
    echo constant( "troop_".$this->troops[6]['troopId'] );
    echo "\" alt=\"";
    echo constant( "troop_".$this->troops[6]['troopId'] );
    echo "\"";
    if ( 0 < $this->troops[6]['number'] )
    {
        echo " onclick=\"_('t7').value=''; return false;\"";
    }
    echo "> <input type=\"text\" class=\"text";
    if ( $this->troops[6]['number'] <= 0 )
    {
        echo " disabled";
    }
    echo "\" name=\"t[";
    echo $this->troops[6]['troopId'];
    echo "]\" id=\"t7\" value=\"\" maxlength=\"6\"> ";
    if ( $this->troops[6]['number'] <= 0 )
    {
        echo "<s";
        echo "pan class=\"none\">(0)</span>";
    }
    else
    {
        echo "<a href=\"#\" onclick=\"_('t7').value=";
        echo $this->troops[6]['number'];
        echo "; return false;\">(";
        echo $this->troops[6]['number'];
        echo ")</a>";
    }
    echo "</td>\r\n\t\t\t<td class=\"line-first column-last\"><img class=\"unit u";
    echo $this->troops[8]['troopId'];
    echo "\" src=\"assets/x.gif\" title=\"";
    echo constant( "troop_".$this->troops[8]['troopId'] );
    echo "\" alt=\"";
    echo constant( "troop_".$this->troops[8]['troopId'] );
    echo "\"";
    if ( 0 < $this->troops[8]['number'] )
    {
        echo " onclick=\"_('t9').value=''; return false;\"";
    }
    echo "> <input type=\"text\" class=\"text";
    if ( $this->troops[8]['number'] <= 0 )
    {
        echo " disabled";
    }
    echo "\" name=\"t[";
    echo $this->troops[8]['troopId'];
    echo "]\" id=\"t9\" value=\"\" maxlength=\"6\"> ";
    if ( $this->troops[8]['number'] <= 0 )
    {
        echo "<s";
        echo "pan class=\"none\">(0)</span>";
    }
    else
    {
        echo "<a href=\"#\" onclick=\"_('t9').value=";
        echo $this->troops[8]['number'];
        echo "; return false;\">(";
        echo $this->troops[8]['number'];
        echo ")</a>";
    }
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"column-first\"><img class=\"unit u";
    echo $this->troops[1]['troopId'];
    echo "\" src=\"assets/x.gif\" title=\"";
    echo constant( "troop_".$this->troops[1]['troopId'] );
    echo "\" alt=\"";
    echo constant( "troop_".$this->troops[1]['troopId'] );
    echo "\"";
    if ( 0 < $this->troops[1]['number'] )
    {
        echo " onclick=\"_('t2').value=''; return false;\"";
    }
    echo "> <input type=\"text\" class=\"text";
    if ( $this->troops[1]['number'] <= 0 )
    {
        echo " disabled";
    }
    echo "\" name=\"t[";
    echo $this->troops[1]['troopId'];
    echo "]\" id=\"t2\" value=\"\" maxlength=\"6\"> ";
    if ( $this->troops[1]['number'] <= 0 )
    {
        echo "<s";
        echo "pan class=\"none\">(0)</span>";
    }
    else
    {
        echo "<a href=\"#\" onclick=\"_('t2').value=";
        echo $this->troops[1]['number'];
        echo "; return false;\">(";
        echo $this->troops[1]['number'];
        echo ")</a>";
    }
    echo "</td>\r\n\t\t\t<td><img class=\"unit u";
    echo $this->troops[4]['troopId'];
    echo "\" src=\"assets/x.gif\" title=\"";
    echo constant( "troop_".$this->troops[4]['troopId'] );
    echo "\" alt=\"";
    echo constant( "troop_".$this->troops[4]['troopId'] );
    echo "\"";
    if ( 0 < $this->troops[4]['number'] )
    {
        echo " onclick=\"_('t5').value=''; return false;\"";
    }
    echo "> <input type=\"text\" class=\"text";
    if ( $this->troops[4]['number'] <= 0 )
    {
        echo " disabled";
    }
    echo "\" name=\"t[";
    echo $this->troops[4]['troopId'];
    echo "]\" id=\"t5\" value=\"\" maxlength=\"6\"> ";
    if ( $this->troops[4]['number'] <= 0 )
    {
        echo "<s";
        echo "pan class=\"none\">(0)</span>";
    }
    else
    {
        echo "<a href=\"#\" onclick=\"_('t5').value=";
        echo $this->troops[4]['number'];
        echo "; return false;\">(";
        echo $this->troops[4]['number'];
        echo ")</a>";
    }
    echo "</td>\r\n\t\t\t<td><img class=\"unit u";
    echo $this->troops[7]['troopId'];
    echo "\" src=\"assets/x.gif\" title=\"";
    echo constant( "troop_".$this->troops[7]['troopId'] );
    echo "\" alt=\"";
    echo constant( "troop_".$this->troops[7]['troopId'] );
    echo "\"";
    if ( 0 < $this->troops[7]['number'] )
    {
        echo " onclick=\"_('t8').value=''; return false;\"";
    }
    echo "> <input type=\"text\" class=\"text";
    if ( $this->troops[7]['number'] <= 0 )
    {
        echo " disabled";
    }
    echo "\" name=\"t[";
    echo $this->troops[7]['troopId'];
    echo "]\" id=\"t8\" value=\"\" maxlength=\"6\"> ";
    if ( $this->troops[7]['number'] <= 0 )
    {
        echo "<s";
        echo "pan class=\"none\">(0)</span>";
    }
    else
    {
        echo "<a href=\"#\" onclick=\"_('t8').value=";
        echo $this->troops[7]['number'];
        echo "; return false;\">(";
        echo $this->troops[7]['number'];
        echo ")</a>";
    }
    echo "</td>\r\n\t\t\t<td class=\"column-last\"><img class=\"unit u";
    echo $this->troops[9]['troopId'];
    echo "\" src=\"assets/x.gif\" title=\"";
    echo constant( "troop_".$this->troops[9]['troopId'] );
    echo "\" alt=\"";
    echo constant( "troop_".$this->troops[9]['troopId'] );
    echo "\"";
    if ( 0 < $this->troops[9]['number'] )
    {
        echo " onclick=\"_('t10').value=''; return false;\"";
    }
    echo "> <input type=\"text\" class=\"text";
    if ( $this->troops[9]['number'] <= 0 )
    {
        echo " disabled";
    }
    echo "\" name=\"t[";
    echo $this->troops[9]['troopId'];
    echo "]\" id=\"t10\" value=\"\" maxlength=\"6\"> ";
    if ( $this->troops[9]['number'] <= 0 )
    {
        echo "<s";
        echo "pan class=\"none\">(0)</span>";
    }
    else
    {
        echo "<a href=\"#\" onclick=\"_('t10').value=";
        echo $this->troops[9]['number'];
        echo "; return false;\">(";
        echo $this->troops[9]['number'];
        echo ")</a>";
    }
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"line-last column-first\"><img class=\"unit u";
    echo $this->troops[2]['troopId'];
    echo "\" src=\"assets/x.gif\" title=\"";
    echo constant( "troop_".$this->troops[2]['troopId'] );
    echo "\" alt=\"";
    echo constant( "troop_".$this->troops[2]['troopId'] );
    echo "\"";
    if ( 0 < $this->troops[2]['number'] )
    {
        echo " onclick=\"_('t3').value=''; return false;\"";
    }
    echo "> <input type=\"text\" class=\"text";
    if ( $this->troops[2]['number'] <= 0 )
    {
        echo " disabled";
    }
    echo "\" name=\"t[";
    echo $this->troops[2]['troopId'];
    echo "]\" id=\"t3\" value=\"\" maxlength=\"6\"> ";
    if ( $this->troops[2]['number'] <= 0 )
    {
        echo "<s";
        echo "pan class=\"none\">(0)</span>";
    }
    else
    {
        echo "<a href=\"#\" onclick=\"_('t3').value=";
        echo $this->troops[2]['number'];
        echo "; return false;\">(";
        echo $this->troops[2]['number'];
        echo ")</a>";
    }
    echo "</td>\r\n\t\t\t<td class=\"line-last\"><img class=\"unit u";
    echo $this->troops[5]['troopId'];
    echo "\" src=\"assets/x.gif\" title=\"";
    echo constant( "troop_".$this->troops[5]['troopId'] );
    echo "\" alt=\"";
    echo constant( "troop_".$this->troops[5]['troopId'] );
    echo "\"";
    if ( 0 < $this->troops[5]['number'] )
    {
        echo " onclick=\"_('t6').value=''; return false;\"";
    }
    echo "> <input type=\"text\" class=\"text";
    if ( $this->troops[5]['number'] <= 0 )
    {
        echo " disabled";
    }
    echo "\" name=\"t[";
    echo $this->troops[5]['troopId'];
    echo "]\" id=\"t6\" value=\"\" maxlength=\"6\"> ";
    if ( $this->troops[5]['number'] <= 0 )
    {
        echo "<s";
        echo "pan class=\"none\">(0)</span>";
    }
    else
    {
        echo "<a href=\"#\" onclick=\"_('t6').value=";
        echo $this->troops[5]['number'];
        echo "; return false;\">(";
        echo $this->troops[5]['number'];
        echo ")</a>";
    }
    echo "</td>\r\n\t\t\t<td class=\"line-last\"></td>\r\n\t\t\t<td class=\"line-last column-last\">";
    if ( $this->hasHero )
    {
        echo "<img class=\"unit uhero\" src=\"assets/x.gif\" title=\"";
        echo troop_hero;
        echo "\" onclick=\"_('_t').value=''; return false;\" alt=\"";
        echo troop_hero;
        echo "\"> <input type=\"text\" class=\"text\" id=\"_t\" name=\"_t\" value=\"\" maxlength=\"1\"> <a href=\"#\" onclick=\"_('_t').value=1; return false;\">(1)</a>";
    }
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<table id=\"coords\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><label><input type=\"radio\" class=\"radio\" name=\"c\" value=\"2\"";
    if ( $this->disableFirstTwoAttack )
    {
        echo " disabled=\"disabled\"";
    }
    else if ( $this->transferType == 2 )
    {
        echo " checked=\"\"";
    }
    echo "> ";
    echo LANGUI_V2V_T2;
    echo "</label></td>\r\n\t\t\t<td class=\"vil\">";
    echo "<s";
    echo "pan>";
    echo LANGUI_V2V_T3;
    echo "</span><input type=\"text\" class=\"text\" name=\"dname\" value=\"\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><label><input type=\"radio\" class=\"radio\" name=\"c\" value=\"3\"";
    if ( $this->disableFirstTwoAttack )
    {
        echo " disabled=\"disabled\"";
    }
    else if ( $this->transferType == 3 )
    {
        echo " checked=\"\"";
    }
    echo "> ";
    echo LANGUI_V2V_T4;
    echo "</label></td>\r\n\t\t\t<td class=\"or\">";
    echo text_or_lang;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><label><input type=\"radio\" class=\"radio\" name=\"c\" value=\"4\"";
    if ( $this->disableFirstTwoAttack )
    {
        echo " checked=\"\"";
    }
    else if ( $this->transferType == 4 )
    {
        echo " checked=\"\"";
    }
    echo "> ";
    echo LANGUI_V2V_T5;
    echo "</label></td>\r\n\t\t\t<td class=\"target\">";
    echo "<s";
    echo "pan>X:</span><input type=\"text\" class=\"text\" name=\"x\" value=\"";
    if ( $this->targetVillage['x'] !== NULL )
    {
        echo $this->targetVillage['x'];
    }
    echo "\" maxlength=\"4\"> ";
    echo "<s";
    echo "pan>Y:</span><input type=\"text\" class=\"text\" name=\"y\" value=\"";
    if ( $this->targetVillage['y'] !== NULL )
    {
        echo $this->targetVillage['y'];
    }
    echo "\" maxlength=\"4\"></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<input type=\"image\" value=\"ok\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_okdone_lang;
    echo "\">\r\n</form>\r\n\r\n";
    if ( $this->errorTable != NULL )
    {
        echo "<p class=\"error\">";
        echo $this->errorTable;
        echo "</p>";
    }
}
else if ( $this->pageState == 2 )
{
    echo "<h1><p>";
    echo $this->targetVillage['transferType'];
    echo "</p></h1>\r\n<form method=\"post\" name=\"snd\" action=\"v2v.php\">\r\n<table id=\"short_info\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_V2V_T6;
    echo ":</th>\r\n\t\t\t<td><a href=\"village3.php?id=";
    echo $this->targetVillage['villageId'];
    echo "\">";
    echo $this->targetVillage['villageName'];
    echo "</a></td>\r\n\t\t</tr>\r\n\t\t";
    if ( trim( $this->targetVillage['playerName'] ) != "" )
    {
        echo "\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_V2V_T7;
        echo ":</th>\r\n\t\t\t<td>";
        if ( $this->targetVillage['playerId'] == 0 )
        {
            echo $this->targetVillage['playerName'];
        }
        else
        {
            echo "<a href=\"profile.php?uid=";
            echo $this->targetVillage['playerId'];
            echo "\">";
            echo $this->targetVillage['playerName'];
            echo "</a>";
        }
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo "\t</tbody>\r\n</table>\r\n\r\n<table class=\"troop_details\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo $this->data['village_name'];
    echo "</td>\r\n\t\t\t<td colspan=\"11\"><p class=\"custDir\">";
    echo $this->targetVillage['transferType']." ".$this->targetVillage['playerName'];
    echo "</p></td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody class=\"units\">\r\n\t\t<tr>\r\n\t\t\t<td></td>\r\n\t\t\t";
    foreach ( $this->targetVillage['troops'] as $tid => $tnum )
    {
        echo "\t\t\t<td><img src=\"assets/x.gif\" class=\"unit u";
        echo $tid;
        echo "\" title=\"";
        echo constant( "troop_".$tid );
        echo "\" alt=\"";
        echo constant( "troop_".$tid );
        echo "\"></td>\r\n\t\t\t";
    }
    echo "\t\t\t";
    if ( $this->targetVillage['hasHero'] )
    {
        echo "\t\t\t<td><img src=\"assets/x.gif\" class=\"unit uhero\" title=\"";
        echo troop_hero;
        echo "\" alt=\"";
        echo troop_hero;
        echo "\"></td>\r\n\t\t\t";
    }
    echo "\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_V2V_T8;
    echo "</th>\r\n\t\t\t";
    foreach ( $this->targetVillage['troops'] as $tid => $tnum )
    {
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
        echo "\t\t\t";
    }
    echo "\t\t\t";
    if ( $this->targetVillage['hasHero'] )
    {
        echo "\t\t\t\t<td>1</td>\r\n\t\t\t";
    }
    echo "\r\n\t\t</tr>\r\n\t</tbody>\r\n\t";
    if ( $this->transferType == 1 )
    {
        echo "\t<tbody class=\"options\">\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_V2V_T9;
        echo "</th>\r\n\t\t\t<td colspan=\"11\">\r\n\t\t\t\t<img class=\"r1\" src=\"assets/x.gif\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">";
        echo $this->newVillageResources[1];
        echo " | \r\n\t\t\t\t<img class=\"r2\" src=\"assets/x.gif\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">";
        echo $this->newVillageResources[2];
        echo " | \r\n\t\t\t\t<img class=\"r3\" src=\"assets/x.gif\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">";
        echo $this->newVillageResources[3];
        echo " | \r\n\t\t\t\t<img class=\"r4\" src=\"assets/x.gif\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">";
        echo $this->newVillageResources[4];
        echo "\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n\t";
    }
    else if ( $this->targetVillage['spy'] )
    {
        echo "\t<tbody class=\"options\">\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_V2V_T10;
        echo "</th>\r\n\t\t\t<td colspan=\"11\">\r\n\t\t\t\t<input class=\"radio\" type=\"radio\" name=\"spy\" value=\"1\" checked=\"\">";
        echo LANGUI_V2V_T11;
        echo "<br>\r\n\t\t\t\t";
        if ( !$this->onlyOneSpyAction )
        {
            echo "<input class=\"radio\" type=\"radio\" name=\"spy\" value=\"2\">";
            echo LANGUI_V2V_T12;
        }
        echo "\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n\t";
    }
    else if ( $this->attackWithCatapult )
    {
        echo "\t<tbody class=\"options\">\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_V2V_T6;
        echo "</th>\r\n\t\t\t<td colspan=\"11\">\r\n\t\t\t\t";
        echo "<s";
        echo "elect name=\"dtg\" class=\"dropdown\">\r\n\t\t\t\t\t <option value=\"99\">";
        echo LANGUI_V2V_T13;
        echo "</option>\r\n\t\t\t\t\t ";
        echo $this->availableCatapultTargetsString;
        echo "\t\t\t\t</select>\r\n\t\t\t\t";
        echo "<s";
        echo "pan class=\"info\">(";
        echo LANGUI_V2V_T14;
        echo ")</span>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n\t";
        if ( $this->rallyPointLevel == 20 && 20 <= $this->totalCatapultTroopsCount )
        {
            echo "\t<tbody class=\"options\">\r\n\t\t<tr>\r\n\t\t\t<th>";
            echo LANGUI_V2V_T15;
            echo "</th>\r\n\t\t\t<td colspan=\"11\">\r\n\t\t\t\t";
            echo "<s";
            echo "elect name=\"dtg1\" class=\"dropdown\">\r\n\t\t\t\t\t <option value=\"99\">";
            echo LANGUI_V2V_T13;
            echo "</option>\r\n\t\t\t\t\t ";
            echo $this->availableCatapultTargetsString;
            echo "\t\t\t\t</select>\r\n\t\t\t\t";
            echo "<s";
            echo "pan class=\"info\">(";
            echo LANGUI_V2V_T14;
            echo ")</span>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n\t";
        }
        echo "\t";
    }
    echo "\t<tbody class=\"infos\">\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_V2V_T16;
    echo "</th>\r\n\t\t\t<td colspan=\"11\">";
    echo text_in_lang;
    echo " ";
    echo WebHelper::secondstostring( $this->targetVillage['needed_time'] );
    echo " ";
    echo LANGUI_V2V_T17;
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<input type=\"hidden\" name=\"id\" value=\"";
    echo $this->targetVillage['villageId'];
    echo "\">\r\n<input type=\"hidden\" name=\"c\" value=\"";
    echo isset( $_POST['c'] ) ? $_POST['c'] : 4;
    echo "\">\r\n";
    foreach ( $this->targetVillage['troops'] as $tid => $tnum )
    {
        echo "<input type=\"hidden\" name=\"t[";
        echo $tid;
        echo "]\" value=\"";
        echo $tnum;
        echo "\">\r\n";
    }
    if ( $this->targetVillage['hasHero'] )
    {
        echo "<input type=\"hidden\" name=\"_t\" value=\"1\">\r\n";
    }
    echo "<p class=\"btn\"><input type=\"image\" value=\"ok\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_okdone_lang;
    echo "\"></p>\r\n</form>\r\n";
}
else if ( $this->pageState == 3 )
{
    $colspan = $this->backTroopsProperty['backTroops']['hasHero'] ? 11 : 10;
    echo "<h1>";
    echo $this->backTroopsProperty['headerText'];
    echo "</h1>\r\n<form method=\"POST\" action=\"v2v.php?";
    echo $this->backTroopsProperty['queryString'];
    echo "\">\r\n<table class=\"troop_details\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<td class=\"role\">";
    echo $this->backTroopsProperty['action1'];
    echo "</td>\r\n\t\t\t<td colspan=\"";
    echo $colspan;
    echo "\">";
    echo $this->backTroopsProperty['action2'];
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody class=\"units\">\r\n\t\t<tr>\r\n\t\t\t<th>&nbsp;</th>\r\n\t\t\t";
    foreach ( $this->backTroopsProperty['backTroops']['troops'] as $tid => $tnum )
    {
        echo "\t\t\t<td><img src=\"assets/x.gif\" class=\"unit u";
        echo $tid;
        echo "\" title=\"";
        echo constant( "troop_".$tid );
        echo "\" alt=\"";
        echo constant( "troop_".$tid );
        echo "\"></td>\r\n\t\t\t";
    }
    echo "\t\t\t";
    if ( $this->backTroopsProperty['backTroops']['hasHero'] )
    {
        echo "\t\t\t<td><img src=\"assets/x.gif\" class=\"unit uhero\" title=\"";
        echo troop_hero;
        echo "\" alt=\"";
        echo troop_hero;
        echo "\"></td>\r\n\t\t\t";
    }
    echo "\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_V2V_T8;
    echo "</th>\r\n\t\t\t";
    foreach ( $this->backTroopsProperty['backTroops']['troops'] as $tid => $tnum )
    {
        echo "\t\t\t\t";
        if ( $tnum <= 0 )
        {
            echo "<td class=\"none\">0</td>";
        }
        else
        {
            echo "<td><input type=\"text\" name=\"t[";
            echo $tid;
            echo "]\" class=\"text\" value=\"";
            echo $tnum;
            echo "\" maxlength=\"5\"></td>";
        }
        echo "\t\t\t";
    }
    echo "\t\t\t";
    if ( $this->backTroopsProperty['backTroops']['hasHero'] )
    {
        echo "\t\t\t\t<td><input type=\"text\" name=\"_t\" class=\"text\" value=\"1\" maxlength=\"5\"></td>\r\n\t\t\t";
    }
    echo "\t\t</tr>\r\n\t</tbody>\r\n\t<tbody class=\"infos\">\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_V2V_T16;
    echo "</th>\r\n\t\t\t<td colspan=\"";
    echo $colspan;
    echo "\"><div class=\"in\">";
    echo text_in_lang;
    echo " ";
    echo WebHelper::secondstostring( $this->backTroopsProperty['time'] );
    echo " ";
    echo LANGUI_V2V_T17;
    echo "</div></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<p class=\"btn\"><input type=\"image\" value=\"ok\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_okdone_lang;
    echo "\"></p>\r\n</form>\r\n";
}
?>
