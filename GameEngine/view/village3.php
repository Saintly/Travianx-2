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

require_once( LANG_UI_PATH."village3.php" );
if ( $this->pageState == 1 )
{
    echo "<h1>";
    echo LANGUI_VIL3_T1;
    echo " (";
    echo $this->mapItemData['rel_x'];
    echo "|";
    echo $this->mapItemData['rel_y'];
    echo ")</h1>\r";
    $mdist = $this->setupMetadata['field_maps_summary'][$this->mapItemData['field_maps_id']];
    $mdistArray = explode( "-", $mdist );
    echo "<img src=\"assets/x.gif\" id=\"detailed_map\" class=\"f";
    echo $this->mapItemData['field_maps_id'];
    echo "\" alt=\"";
    echo $mdist;
    echo "\" title=\"";
    echo $mdist;
    echo "\">\r<div id=\"map_details\">\r\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"distribution\" class=\"tableNone\">\r\t\t<thead>\r\t\t\t<tr><th colspan=\"3\">";
    echo LANGUI_VIL3_T2;
    echo ":</th></tr>\r\t\t</thead>\r\t\t<tbody>\r\t\t\t<tr>\r\t\t\t\t<td class=\"ico\"><img class=\"r1\" src=\"assets/x.gif\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\"></td>\r\t\t\t\t<td class=\"val\">";
    echo $mdistArray[0];
    echo "</td>\r\t\t\t\t<td class=\"desc\">";
    echo LANGUI_VIL3_T3;
    echo "</td>\r\t\t\t</tr>\r\t\t\t<tr>\r\t\t\t\t<td class=\"ico\"><img class=\"r2\" src=\"assets/x.gif\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\"></td>\r\t\t\t\t<td class=\"val\">";
    echo $mdistArray[1];
    echo "</td>\r\t\t\t\t<td class=\"desc\">";
    echo LANGUI_VIL3_T4;
    echo "</td>\r\t\t\t</tr>\r\t\t\t<tr>\r\t\t\t\t<td class=\"ico\"><img class=\"r3\" src=\"assets/x.gif\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\"></td>\r\t\t\t\t<td class=\"val\">";
    echo $mdistArray[2];
    echo "</td>\r\t\t\t\t<td class=\"desc\">";
    echo LANGUI_VIL3_T5;
    echo "</td>\r\t\t\t</tr>\r\t\t\t<tr>\r\t\t\t\t<td class=\"ico\"><img class=\"r4\" src=\"assets/x.gif\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\"></td>\r\t\t\t\t<td class=\"val\">";
    echo $mdistArray[3];
    echo "</td>\r\t\t\t\t<td class=\"desc\">";
    echo LANGUI_VIL3_T6;
    echo "</td>\r\t\t\t</tr>\r\t\t</tbody>\r\t</table>\r</div>\r\r<table cellpadding=\"1\" cellspacing=\"1\" id=\"options\" class=\"tableNone\">\r\t<thead>\r\t\t<tr><th>";
    echo LANGUI_VIL3_T7;
    echo ":</th></tr>\r\t</thead>\r\t<tbody>\r\t\t<tr><td><a href=\"map.php?id=";
    echo $this->mapItemData['id'];
    echo "\">";
    echo LANGUI_VIL3_T8;
    echo "</a></td></tr>\r";
    $builderTroopId = 10;
    switch ( $this->data['tribe_id'] )
    {
    case 2 :
        $builderTroopId = 20;
        break;
    case 3 :
        $builderTroopId = 30;
        break;
    case 6 :
        $builderTroopId = 60;
        break;
    case 7 :
        $builderTroopId = 109;
    }
    if ( $this->itemTroops[$builderTroopId] < 3 )
    {
        echo "\t\t<tr><td class=\"none\">";
        echo LANGUI_VIL3_T9;
        echo " (";
        echo $this->itemTroops[$builderTroopId];
        echo LANGUI_VIL3_T10;
        echo ")</td></tr>\r";
    }
    else
    {
        echo "\t\t<tr><td><a href=\"v2v.php?id=";
        echo $this->mapItemData['id'];
        echo "\">";
        echo LANGUI_VIL3_T9;
        echo "</a></td></tr>\r";
    }
    echo "\t</tbody>\r</table>\r";
}
else if ( $this->pageState == 2 )
{
    echo "<h1><div>";
    echo $this->mapItemData['village_name'];
    echo "</div>&nbsp;(";
    echo $this->mapItemData['rel_x'];
    echo "|";
    echo $this->mapItemData['rel_y'];
    echo ")</h1>\r";
    if ( $this->mapItemData['is_capital'] )
    {
        echo "<div id=\"dmain\">(";
        echo LANGUI_VIL3_T11;
        echo ")</div>";
    }
    $mdist = $this->setupMetadata['field_maps_summary'][$this->mapItemData['field_maps_id']];
    $mdistArray = explode( "-", $mdist );
    echo "<img src=\"assets/x.gif\" id=\"detailed_map\" class=\"f";
    echo $this->mapItemData['field_maps_id'];
    echo "\" alt=\"";
    echo $mdist;
    echo "\" title=\"";
    echo $mdist;
    echo "\">\r\r<div id=\"map_details\">\r\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"village_info\" class=\"tableNone\">\r\t\t<tbody>\r\t\t\t<tr>\r\t\t\t\t<th>";
    echo LANGUI_VIL3_T12;
    echo ":</th>\r\t\t\t\t<td>";
    echo constant( "tribe_".$this->mapItemData['tribe_id'] );
    echo "</td>\r\t\t\t</tr>\r\t\t\t<tr>\r\t\t\t\t<th>";
    echo LANGUI_VIL3_T13;
    echo ":</th>\r\t\t\t\t<td>";
    if ( 0 < intval( $this->mapItemData['alliance_id'] ) )
    {
        echo "<a href=\"alliance.php?id=";
        echo $this->mapItemData['alliance_id'];
        echo "\">";
        echo $this->mapItemData['alliance_name'];
        echo "</a>";
    }
    echo "</td>\r\t\t\t</tr>\r\t\t\t<tr>\r\t\t\t\t<th>";
    echo LANGUI_VIL3_T14;
    echo ":</th>\r\t\t\t\t<td><a href=\"profile.php?uid=";
    echo $this->mapItemData['player_id'];
    echo "\">";
    echo $this->mapItemData['player_name'];
    echo "</a></td>\r\t\t\t</tr>\r\t\t\t<tr>\r\t\t\t\t<th>";
    echo LANGUI_VIL3_T15;
    echo ":</th>\r\t\t\t\t<td>";
    echo $this->mapItemData['people_count'];
    echo "</td>\r\t\t\t</tr>\r\t\t</tbody>\r\t</table>\r\r\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"troop_info\" class=\"tableNone rep\">\r\t\t<thead>\r\t\t\t<tr><th>";
    echo LANGUI_VIL3_T16;
    echo ":</th></tr>\r\t\t</thead>\r\t\t<tbody>\r\t\t";
    $c = 0;
    while ( $this->lastReport != NULL && $this->lastReport->next( ) )
    {
        ++$c;
        $isAttack = $this->lastReport->row['isAttack'];
        $rptRelativeResult = ReportHelper::getreportresultrelative( $this->lastReport->row['rpt_result'], $isAttack );
        $btext = ReportHelper::getreportresulttext( $rptRelativeResult );
        $_rptResultCss = $rptRelativeResult == 100 ? 10 : $rptRelativeResult;
        echo "\t\t<tr><td><img src=\"assets/x.gif\" class=\"iReport iReport";
        echo $_rptResultCss;
        echo "\" alt=\"";
        echo $btext;
        echo "\" title=\"";
        echo $btext;
        echo "\"> <a href=\"report.php?id=";
        echo $this->lastReport->row['id'];
        echo "\" title=\"";
        echo $this->lastReport->row['mtime'];
        echo "\">";
        echo $this->lastReport->row['mdate'];
        echo "</a></td></tr>\r\t\t";
    }
    if ( $c == 0 )
    {
        echo "\t\t<tr><td>";
        echo LANGUI_VIL3_T17;
        echo "</td></tr>\r\t\t";
    }
    echo "\t\t</tbody>\r\t</table>\r</div>\r\r<table cellpadding=\"1\" cellspacing=\"1\" id=\"options\" class=\"tableNone\">\r\t<thead>\r\t\t<tr><th>";
    echo LANGUI_VIL3_T7;
    echo ":</th></tr>\r\t</thead>\r\t<tbody>\r\t\t<tr><td><a href=\"map.php?id=";
    echo $this->mapItemData['id'];
    echo "\">";
    echo LANGUI_VIL3_T8;
    echo "</a></td></tr>\r";
    if ( $this->mapItemData['id'] != $this->data['selected_village_id'] )
    {
        echo "\t\t";
        if ( $this->hasRallyPoint )
        {
            echo "\t\t<tr>";
            if ( $this->mapItemData['playerType'] == PLAYERTYPE_ADMIN )
            {
                echo "<td class=\"none\">";
                echo LANGUI_VIL3_T18;
            }
            else
            {
                echo "<td><a href=\"v2v.php?id=";
                echo $this->mapItemData['id'];
                echo "\">";
                echo LANGUI_VIL3_T19;
                echo "</a>";
            }
            echo "</td></tr>\r\t\t";
        }
        else
        {
            echo "\t\t<tr><td class=\"none\">";
            echo LANGUI_VIL3_T20;
            echo "</td></tr>\r\t\t";
        }
        echo "\t\t";
        if ( $this->hasMarketplace )
        {
            echo "\t\t<tr>";
            if ( $this->mapItemData['playerType'] == PLAYERTYPE_ADMIN )
            {
                echo "<td class=\"none\">";
                echo LANGUI_VIL3_T21;
            }
            else
            {
                echo "<td><a class=\"\" href=\"build.php?bid=17&vid2=";
                echo $this->mapItemData['id'];
                echo "\">";
                echo LANGUI_VIL3_T22;
                echo "</a>";
            }
            echo "</td></tr>\r\t\t";
        }
        else
        {
            echo "\t\t<tr><td class=\"none\">";
            echo LANGUI_VIL3_T23;
            echo "</td></tr>\r\t\t";
        }
    }
    echo "\t</tbody>\r</table>\r";
}
else if ( $this->pageState == 3 )
{
    echo "<h1>";
    echo LANGUI_VIL3_T24;
    echo " (";
    echo $this->mapItemData['rel_x'];
    echo "|";
    echo $this->mapItemData['rel_y'];
    echo ")";
    if ( $this->mapItemData['player_id'] == $this->player->playerId && $this->mapItemData['allegiance_percent'] < 100 )
    {
        echo "<div id=\"loyality\" class=\"";
        echo $this->mapItemData['allegiance_percent'] <= 60 ? "re" : "gr";
        echo "\">";
        echo LANGUI_VIL3_T25;
        echo " ";
        echo $this->mapItemData['allegiance_percent'];
        echo "%</div>";
    }
    echo "</h1>\r";
    $oid = $this->setupMetadata['oasis'][$this->mapItemData['image_num']];
    $str = "";
    foreach ( $oid as $k => $v )
    {
        if ( $str != "" )
        {
            $str .= PHP_EOL." ".text_and_lang." ";
        }
        $str .= LANGUI_VIL3_T26." ".constant( "item_title_".$k )." ".$v."%";
    }
    $str .= " ".LANGUI_VIL3_T27;
    echo "<img src=\"assets/x.gif\" id=\"detailed_map\" class=\"w";
    echo $this->mapItemData['image_num'];
    echo "\" alt=\"";
    echo $str;
    echo "\" title=\"";
    echo $str;
    echo "\">\r\r<div id=\"map_details\">\r\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"village_info\" class=\"tableNone\">\r\t\t<tbody>\r\t\t\t<tr>\r\t\t\t\t<th>";
    echo LANGUI_VIL3_T12;
    echo ":</th>\r\t\t\t\t<td>";
    echo constant( "tribe_".$this->mapItemData['tribe_id'] );
    echo "</td>\r\t\t\t</tr>\r\t\t\t<tr>\r\t\t\t\t<th>";
    echo LANGUI_VIL3_T13;
    echo ":</th>\r\t\t\t\t<td>";
    if ( 0 < intval( $this->mapItemData['alliance_id'] ) )
    {
        echo "<a href=\"alliance.php?id=";
        echo $this->mapItemData['alliance_id'];
        echo "\">";
        echo $this->mapItemData['alliance_name'];
        echo "</a>";
    }
    echo "</td>\r\t\t\t</tr>\r\t\t\t<tr>\r\t\t\t\t<th>";
    echo LANGUI_VIL3_T14;
    echo ":</th>\r\t\t\t\t<td><a href=\"profile.php?uid=";
    echo $this->mapItemData['player_id'];
    echo "\">";
    echo $this->mapItemData['player_name'];
    echo "</a></td>\r\t\t\t</tr>\r\t\t\t<tr>\r\t\t\t\t<th>";
    echo LANGUI_VIL3_T28;
    echo ":</th>\r\t\t\t\t<td><a href=\"village3.php?id=";
    echo $this->mapItemData['parent_id'];
    echo "\">";
    echo $this->mapItemData['village_name'];
    echo "</a></td>\r\t\t\t</tr>\r\t\t</tbody>\r\t</table>\r\r\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"troop_info\" class=\"tableNone rep\">\r\t\t<thead>\r\t\t\t<tr><th>";
    echo LANGUI_VIL3_T16;
    echo ":</th></tr>\r\t\t</thead>\r\t\t<tbody>\r\t\t";
    $c = 0;
    while ( $this->lastReport != NULL && $this->lastReport->next( ) )
    {
        ++$c;
        $isAttack = $this->lastReport->row['isAttack'];
        $rptRelativeResult = ReportHelper::getreportresultrelative( $this->lastReport->row['rpt_result'], $isAttack );
        $btext = ReportHelper::getreportresulttext( $rptRelativeResult );
        $_rptResultCss = $rptRelativeResult == 100 ? 10 : $rptRelativeResult;
        echo "\t\t<tr><td><img src=\"assets/x.gif\" class=\"iReport iReport";
        echo $_rptResultCss;
        echo "\" alt=\"";
        echo $btext;
        echo "\" title=\"";
        echo $btext;
        echo "\"> <a href=\"report.php?id=";
        echo $this->lastReport->row['id'];
        echo "\" title=\"";
        echo $this->lastReport->row['mtime'];
        echo "\">";
        echo $this->lastReport->row['mdate'];
        echo "</a></td></tr>\r\t\t";
    }
    if ( $c == 0 )
    {
        echo "\t\t<tr><td>";
        echo LANGUI_VIL3_T17;
        echo "</td></tr>\r\t\t";
    }
    echo "\t\t</tbody>\r\t</table>\r</div>\r\r<table cellpadding=\"1\" cellspacing=\"1\" id=\"options\" class=\"tableNone\">\r\t<thead>\r\t\t<tr><th>";
    echo LANGUI_VIL3_T7;
    echo ":</th></tr>\r\t</thead>\r\t<tbody>\r\t\t<tr><td><a href=\"map.php?id=";
    echo $this->mapItemData['id'];
    echo "\">";
    echo LANGUI_VIL3_T8;
    echo "</a></td></tr>\r\t\t";
    if ( $this->hasRallyPoint )
    {
        echo "\t\t<tr>";
        if ( $this->mapItemData['playerType'] == PLAYERTYPE_ADMIN )
        {
            echo "<td class=\"none\">";
            echo LANGUI_VIL3_T18;
        }
        else
        {
            echo "<td><a href=\"v2v.php?id=";
            echo $this->mapItemData['id'];
            echo "\">";
            echo LANGUI_VIL3_T19;
            echo "</a>";
        }
        echo "</td></tr>\r\t\t";
    }
    else
    {
        echo "\t\t<tr><td class=\"none\">";
        echo LANGUI_VIL3_T20;
        echo "</td></tr>\r\t\t";
    }
    echo "\t</tbody>\r</table>\r";
}
else if ( $this->pageState == 4 )
{
    echo "<h1>";
    echo LANGUI_VIL3_T29;
    echo " (";
    echo $this->mapItemData['rel_x'];
    echo "|";
    echo $this->mapItemData['rel_y'];
    echo ")</h1>\r";
    $oid = $this->setupMetadata['oasis'][$this->mapItemData['image_num']];
    $str = "";
    $formatedString = "";
    foreach ( $oid as $k => $v )
    {
        if ( $str != "" )
        {
            $str .= PHP_EOL." ".text_and_lang." ";
        }
        $curString = LANGUI_VIL3_T26." ".constant( "item_title_".$k )." ".$v."%";
        $str .= $curString;
        $formatedString .= "<li>".$curString." ".LANGUI_VIL3_T27."</li>";
    }
    $str .= " ".LANGUI_VIL3_T27;
    $formatedString = "<ul>".$formatedString."</ul>";
    echo "<img src=\"assets/x.gif\" id=\"detailed_map\" class=\"w";
    echo $this->mapItemData['image_num'];
    echo "\" alt=\"";
    echo $str;
    echo "\" title=\"";
    echo $str;
    echo "\">\r\r<div id=\"map_details\">\r\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"troop_info\" class=\"tableNone\">\r\t\t<thead>\r\t\t\t<tr><th colspan=\"3\">";
    echo LANGUI_VIL3_T30;
    echo ":</th></tr>\r\t\t</thead>\r\t\t<tbody>\r\t\t\t";
    $_c = 0;
    foreach ( $this->itemTroops as $k => $v )
    {
        if ( $v <= 0 )
        {
            continue;
        }
        ++$_c;
        echo "\t\t\t<tr>\r\t\t\t\t<td class=\"ico\"><img class=\"unit u";
        echo $k;
        echo "\" src=\"assets/x.gif\" alt=\"";
        echo htmlspecialchars( constant( "troop_".$k ) );
        echo "\" title=\"";
        echo htmlspecialchars( constant( "troop_".$k ) );
        echo "\"></td>\r\t\t\t\t<td class=\"val\">";
        echo $v;
        echo "</td>\r\t\t\t\t<td class=\"desc\">";
        echo constant( "troop_".$k );
        echo "</td>\r\t\t\t</tr>\r\t\t\t";
    }
    echo "\t\t\t";
    if ( $_c == 0 )
    {
        echo "\t\t\t\t<tr><td>";
        echo LANGUI_VIL3_T31;
        echo "</td></tr>\r\t\t\t";
    }
    echo "\t\t</tbody>\r\t</table>\r\t\r\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"troop_info\" class=\"tableNone\">\r\t\t<thead>\r\t\t\t<tr><th>";
    echo LANGUI_VIL3_T32;
    echo ":</th></tr>\r\t\t</thead>\r\t\t<tbody>\r\t\t\t<tr><td>";
    echo $formatedString;
    echo "</td></tr>\r\t\t</tbody>\r\t</table>\r</div>\r\r<table cellpadding=\"1\" cellspacing=\"1\" id=\"options\" class=\"tableNone\">\r\t<thead>\r\t\t<tr><th>";
    echo LANGUI_VIL3_T7;
    echo ":</th></tr>\r\t</thead>\r\t<tbody>\r\t\t<tr><td><a href=\"map.php?id=";
    echo $this->mapItemData['id'];
    echo "\">";
    echo LANGUI_VIL3_T8;
    echo "</a></td></tr>\r\t\t";
    if ( $this->hasRallyPoint )
    {
        echo "\t\t<tr><td><a href=\"v2v.php?id=";
        echo $this->mapItemData['id'];
        echo "\">";
        echo LANGUI_VIL3_T33;
        echo "</a></td></tr>\r\t\t";
    }
    else
    {
        echo "\t\t<tr><td class=\"none\">";
        echo LANGUI_VIL3_T34;
        echo "</td></tr>\r\t\t";
    }
    echo "\t\t\r\t</tbody>\r</table>\r";
}
?>
