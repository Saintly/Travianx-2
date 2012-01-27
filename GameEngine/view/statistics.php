<?php
require_once( LANG_UI_PATH."statistics.php" );
echo "<h1>";
echo LANGUI_STAT_T1;
echo "</h1>\r\n\r\n<div id=\"textmenu\">\r\n <a href=\"statistics.php\"";
if ( $this->selectedTabIndex == 0 || $this->selectedTabIndex == 5 || $this->selectedTabIndex == 6 || $this->selectedTabIndex == 7 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_STAT_T2;
echo "</a>\r\n | <a href=\"statistics.php?t=1\"";
if ( $this->selectedTabIndex == 1 || $this->selectedTabIndex == 8 || $this->selectedTabIndex == 9 || $this->selectedTabIndex == 10 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_STAT_T3;
echo "</a>\r\n | <a href=\"statistics.php?t=2\"";
if ( $this->selectedTabIndex == 2 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_STAT_T4;
echo "</a>\r\n | <a href=\"statistics.php?t=3\"";
if ( $this->selectedTabIndex == 3 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_STAT_T5;
echo "</a>\r\n ";
if ( $this->tatarRaised )
{
    echo "| <a href=\"statistics.php?t=11\"";
    if ( $this->selectedTabIndex == 11 )
    {
        echo " class=\"selected\"";
    }
    echo ">";
    echo LANGUI_STAT_T6;
    echo "</a>";
}
echo " | <a href=\"statistics.php?t=4\"";
if ( $this->selectedTabIndex == 4 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_STAT_T7;
echo "</a>\r\n</div>\r\n";
if ( $this->selectedTabIndex == 0 )
{
    echo "\r\n";
    if ( $this->isAdmin )
    {
        echo "<s";
        echo "cript type=\"text/javascript\">\r\nfunction confirmDel (p) { return confirm (\"";
        echo LANGUI_STAT_T8;
        echo "\\n[\" + p + \"]\"); }\r\n\r\nfunction setGold(id) {\r\n\tvar txt = _(\"_g\" + id);\r\n\tif (txt != null) { window.location = \"statistics.php?_gd=\" + id + \"&_g=\" + txt.value ";
        if ( 0 < $this->_tb )
        {
            echo " + \"&tb=".$this->_tb."\"";
        }
        if ( 0 < $this->pageIndex )
        {
            echo " + \"&p=".$this->pageIndex."\"";
        }
        echo "; }\r\n}\r\n</script>\r\n";
    }
    echo "\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"player\" class=\"row_table_data\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"";
    echo $this->isAdmin ? 8 : 5;
    echo "\">\r\n\t\t\t";
    echo LANGUI_STAT_T9;
    echo " ";
    if ( 0 < $this->_tb )
    {
        echo constant( "tribe_".$this->_tb );
    }
    echo "\t\t\t<div id=\"submenu\">\r\n\t\t\t\t<a title=\"";
    echo LANGUI_STAT_T10;
    echo "\" href=\"statistics.php?t=5\"><img class=\"btn_top10\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T10;
    echo "\"></a><a title=\"";
    echo LANGUI_STAT_T11;
    echo "\" href=\"statistics.php?t=6\"><img class=\"btn_def\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T11;
    echo "\"></a><a title=\"";
    echo LANGUI_STAT_T12;
    echo "\" href=\"statistics.php?t=7\"><img class=\"btn_off\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t</div>\r\n\t\t\t<div id=\"submenu2\">\r\n\t\t\t\t<a title=\"";
    echo tribe_6;
    echo "\" href=\"";
    echo $this->_tb != 6 ? "?tb=6" : "?";
    echo "\"><img class=\"";
    if ( $this->_tb == 6 )
    {
        echo "active ";
    }
    echo "btn_v6\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo tribe_7;
    echo "\" href=\"";
    echo $this->_tb != 7 ? "?tb=7" : "?";
    echo "\"><img class=\"";
    if ( $this->_tb == 7 )
    {
        echo "active ";
    }
    echo "btn_v7\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo tribe_1;
    echo "\" href=\"";
    echo $this->_tb != 1 ? "?tb=1" : "?";
    echo "\"><img class=\"";
    if ( $this->_tb == 1 )
    {
        echo "active ";
    }
    echo "btn_v1\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo tribe_2;
    echo "\" href=\"";
    echo $this->_tb != 2 ? "?tb=2" : "?";
    echo "\"><img class=\"";
    if ( $this->_tb == 2 )
    {
        echo "active ";
    }
    echo "btn_v2\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo tribe_3;
    echo "\" href=\"";
    echo $this->_tb != 3 ? "?tb=3" : "?";
    echo "\"><img class=\"";
    if ( $this->_tb == 3 )
    {
        echo "active ";
    }
    echo "btn_v3\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t</div>\r\n\t\t</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td></td><td>";
    echo LANGUI_STAT_T2;
    echo "</td><td>";
    echo LANGUI_STAT_T13;
    echo "</td><td>";
    echo LANGUI_STAT_T14;
    echo "</td><td>";
    echo LANGUI_STAT_T4;
    echo "</td>";
    if ( $this->isAdmin )
    {
        echo "<td><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
        echo LANGUI_STAT_T16;
        echo "\" title=\"";
        echo LANGUI_STAT_T16;
        echo "\"> ";
        echo LANGUI_STAT_T15;
        echo "</td><td></td><td></td>";
    }
    echo "\t\t</tr>\r\n\t\t";
    if ( $this->adminActionMessage != "" )
    {
        echo "<tr><td colspan=\"8\"><div class=\"error\"><b>";
        echo $this->adminActionMessage;
        echo "</b></div></td><tr>";
    }
    echo "\t</thead>\r\n\t<tbody>\r\n\t\t";
    $rowIndex = 0;
    while ( $this->dataList->next( ) )
    {
        ++$rowIndex;
        $rank = $rowIndex + $this->pageIndex * $this->pageSize;
        echo "\t\t<tr";
        if ( $this->selectedRank == $rank )
        {
            echo " class=\"hl\"";
        }
        echo ">\r\n\t\t   <td class=\"ra\">";
        echo $rank;
        echo ".</td>\r\n\t\t   <td class=\"pla\"><a href=\"profile.php?uid=";
        echo $this->dataList->row['id'];
        echo "\">\r\n\t\t   ";
        if ( $this->dataList->row['player_type'] == PLAYERTYPE_ADMIN )
        {
            echo "<span style=\"color:#0000ff;\" title=\"".LANGUI_STAT_T17."\" alt=\"".LANGUI_STAT_T17."\">";
        }
        echo "\t\t   ";
        echo $this->dataList->row['name'];
        echo "\t\t   ";
        if ( $this->dataList->row['player_type'] == PLAYERTYPE_ADMIN )
        {
            echo "</span>";
        }
        echo "\t\t   </a> </td>\r\n\t\t   <td class=\"al\">";
        if ( 0 < intval( $this->dataList->row['alliance_id'] ) )
        {
            echo "<a href=\"alliance.php?id=";
            echo $this->dataList->row['alliance_id'];
            echo "\">";
            echo $this->dataList->row['alliance_name'];
            echo "</a>";
        }
        echo "</td>\r\n\t\t   <td class=\"pop\">";
        echo $this->dataList->row['total_people_count'];
        echo "</td>\r\n\t\t   <td class=\"vil\">";
        echo $this->dataList->row['villages_count'];
        echo "</td>\r\n\t\t   ";
        if ( $this->isAdmin )
        {
            echo "\t\t   <td><input type=\"text\" style=\"width:25px;\" id=\"_g";
            echo $this->dataList->row['id'];
            echo "\" name=\"g";
            echo $this->dataList->row['id'];
            echo "\" value=\"";
            echo $this->dataList->row['gold_num'];
            echo "\" maxlength=\"8\" class=\"text year\"> <a href=\"javascript:setGold('";
            echo $this->dataList->row['id'];
            echo "')\"><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
            echo LANGUI_STAT_T18;
            echo "\" title=\"";
            echo LANGUI_STAT_T18;
            echo "\"></a></td>\r\n\t\t   <td>";
            if ( $this->dataList->row['player_type'] == PLAYERTYPE_NORMAL )
            {
                echo "<a href=\"statistics.php?_cs=";
                echo $this->dataList->row['id'].( 0 < $this->_tb ? "&tb=".$this->_tb : "" ).( 0 < $this->pageIndex ? "&p=".$this->pageIndex : "" );
                echo "\"><img class=\"online";
                echo $this->dataList->row['is_blocked'] ? 4 : 2;
                echo "\" src=\"assets/x.gif\" alt=\"";
                echo $this->dataList->row['is_blocked'] ? LANGUI_STAT_T51 : LANGUI_STAT_T52;
                echo "\" title=\"";
                echo $this->dataList->row['is_blocked'] ? LANGUI_STAT_T51 : LANGUI_STAT_T52;
                echo "\"></a>";
            }
            echo "</td>\r\n\t\t   <td>";
            if ( $this->dataList->row['player_type'] == PLAYERTYPE_NORMAL )
            {
                echo "<a onclick=\"return confirmDel('";
                echo htmlspecialchars( str_replace( "'", "`", $this->dataList->row['name'] ) );
                echo "');\" href=\"statistics.php?_dp=";
                echo $this->dataList->row['id'].( 0 < $this->_tb ? "&tb=".$this->_tb : "" ).( 0 < $this->pageIndex ? "&p=".$this->pageIndex : "" );
                echo "\"><img class=\"del\" src=\"assets/x.gif\" alt=\"";
                echo LANGUI_STAT_T19;
                echo "\" title=\"";
                echo LANGUI_STAT_T19;
                echo "\"></a>";
            }
            echo "</td>\r\n\t\t   ";
        }
        echo "\t\t</tr>\r\n\t\t";
    }
    echo " </tbody>\r\n</table>\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"search_navi\">\r\n\t<tbody>\r\n\t\t<tr>\t\t\t\t\t\t\r\n\t\t\t<td>\r\n\t\t\t<form method=\"post\" action=\"statistics.php";
    if ( 0 < $this->selectedTabIndex )
    {
        echo "?t=".$this->selectedTabIndex;
    }
    else if ( 0 < $this->_tb )
    {
        echo "?tb=".$this->_tb;
    }
    echo "\">\r\n\t\t\t\t<div class=\"search\">\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>:";
    echo LANGUI_STAT_T20;
    echo "<input type=\"text\" class=\"text ra\" maxlength=\"5\" name=\"rank\" value=\"";
    if ( 0 < $this->selectedRank )
    {
        echo $this->selectedRank;
    }
    echo "\"></span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan class=\"or\">";
    echo text_or_lang;
    echo "</span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>";
    echo LANGUI_STAT_T21;
    echo "<input type=\"text\" class=\"text name\" maxlength=\"20\" name=\"name\" value=\"\"></span>\r\n\t\t\t\t\t<input type=\"image\" value=\"submit\" name=\"submit\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_okdone_lang;
    echo "\">\r\n\t\t\t\t</div>\r\n\t\t\t</form>\r\n\t\t\t<div class=\"navi\">";
    echo $this->getPreviousLink( );
    echo "|";
    echo $this->getNextLink( );
    echo "</div>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
}
else if ( $this->selectedTabIndex == 1 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"alliance\" class=\"row_table_data\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"4\">";
    echo LANGUI_STAT_T22;
    echo "<div id=\"submenu\"><a title=\"";
    echo LANGUI_STAT_T10;
    echo "\" href=\"statistics.php?t=8\"><img class=\"btn_top10\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T10;
    echo "\"></a><a title=\"";
    echo LANGUI_STAT_T11;
    echo "\" href=\"statistics.php?t=9\"><img class=\"btn_def\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T11;
    echo "\"></a><a title=\"";
    echo LANGUI_STAT_T12;
    echo "\" href=\"statistics.php?t=10\"><img class=\"btn_off\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a></div></th></tr>\r\n\t\t<tr>\r\n\t\t\t<td></td><td>";
    echo LANGUI_STAT_T13;
    echo "</td><td>";
    echo LANGUI_STAT_T2;
    echo "</td><td>";
    echo LANGUI_STAT_T23;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $rowIndex = 0;
    while ( $this->dataList->next( ) )
    {
        ++$rowIndex;
        $rank = $rowIndex + $this->pageIndex * $this->pageSize;
        echo "\t\t<tr";
        if ( $this->selectedRank == $rank )
        {
            echo " class=\"hl\"";
        }
        echo ">\r\n\t\t   <td class=\"ra\">";
        echo $rank;
        echo ".</td>\r\n\t\t   <td class=\"al\"><a href=\"alliance.php?id=";
        echo $this->dataList->row['id'];
        echo "\">";
        echo $this->dataList->row['name'];
        echo "</a></td>\r\n\t\t   <td class=\"pla\">";
        echo $this->dataList->row['player_count'];
        echo "</td>\r\n\t\t   <td class=\"po\">";
        echo $this->dataList->row['rating'];
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo " </tbody>\r\n</table>\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"search_navi\">\r\n\t<tbody>\r\n\t\t<tr>\t\t\t\t\t\t\r\n\t\t\t<td>\r\n\t\t\t<form method=\"post\" action=\"statistics.php";
    if ( 0 < $this->selectedTabIndex )
    {
        echo "?t=".$this->selectedTabIndex;
    }
    echo "\">\r\n\t\t\t\t<div class=\"search\">\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>:";
    echo LANGUI_STAT_T20;
    echo "<input type=\"text\" class=\"text ra\" maxlength=\"5\" name=\"rank\" value=\"";
    if ( 0 < $this->selectedRank )
    {
        echo $this->selectedRank;
    }
    echo "\"></span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan class=\"or\">";
    echo text_or_lang;
    echo "</span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>";
    echo LANGUI_STAT_T21;
    echo "<input type=\"text\" class=\"text name\" maxlength=\"20\" name=\"name\" value=\"\"></span>\r\n\t\t\t\t\t<input type=\"image\" value=\"submit\" name=\"submit\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_okdone_lang;
    echo "\">\r\n\t\t\t\t</div>\r\n\t\t\t</form>\r\n\t\t\t<div class=\"navi\">";
    echo $this->getPreviousLink( );
    echo "|";
    echo $this->getNextLink( );
    echo "</div>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
}
else if ( $this->selectedTabIndex == 2 )
{
    if ( $this->isAdmin )
    {
        echo "<s";
        echo "cript type=\"text/javascript\">\r\nfunction openResourceSet(vid) {\r\n\tp = document.getElementById(\"ce\");\r\n\tif (p!=null) {\r\n\t\tp.innerHTML = '<div id=\"_pwin\" class=\"popup3\"><div id=\"drag\" onmousedown=\"dragStart(event, \\'_pwin\\')\"></div><a href=\"#\" onClick=\"hideManual(); return false;\"><img src=\"assets/x.gif\" border=\"1\" class=\"popup4\" alt=\"Move\"></a><iframe frameborder=\"0\" id=\"Frame\" src=\"resources.php?avid='+vi";
        echo "d+'\" width=\"412\" height=\"440\" border=\"0\"></iframe></div>';\r\n\t}\r\n\r\n\treturn false;\r\n}\r\n</script>\r\n";
        
        echo "<s";
        echo "cript type=\"text/javascript\">\r\nfunction openTroopSet(vid) {\r\n\tp = document.getElementById(\"ce\");\r\n\tif (p!=null) {\r\n\t\tp.innerHTML = '<div id=\"_pwin\" class=\"popup3\"><div id=\"drag\" onmousedown=\"dragStart(event, \\'_pwin\\')\"></div><a href=\"#\" onClick=\"hideManual(); return false;\"><img src=\"assets/x.gif\" border=\"1\" class=\"popup5\" alt=\"Move\"></a><iframe frameborder=\"0\" id=\"Frame\" src=\"troops.php?avid='+vi";
        echo "d+'\" width=\"412\" height=\"440\" border=\"0\"></iframe></div>';\r\n\t}\r\n\r\n\treturn false;\r\n}\r\n</script>\r\n";
    
    }
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"villages\" class=\"row_table_data\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"";
    echo $this->isAdmin ? "6" : "5";
    echo "\">";
    echo LANGUI_STAT_T24;
    echo "</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td></td><td>";
    echo LANGUI_STAT_T25;
    echo "</td><td>";
    echo LANGUI_STAT_T2;
    echo "</td><td>";
    echo LANGUI_STAT_T14;
    echo "</td><td>";
    echo LANGUI_STAT_T26;
    echo "</td>\r\n\t\t\t";
    if ( $this->isAdmin )
    {
        echo "<td>&nbsp;</td>";
    }
    echo "\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $rowIndex = 0;
    while ( $this->dataList->next( ) )
    {
        ++$rowIndex;
        $rank = $rowIndex + $this->pageIndex * $this->pageSize;
        echo "\t\t<tr";
        if ( $this->selectedRank == $rank )
        {
            echo " class=\"hl\"";
        }
        echo ">\r\n\t\t   <td class=\"ra\">";
        echo $rank;
        echo ".</td>\r\n\t\t   <td class=\"vil\"><a href=\"village3.php?id=";
        echo $this->dataList->row['id'];
        echo "\">";
        echo $this->dataList->row['village_name'];
        echo "</a> </td>\r\n\t\t   <td class=\"pla\"><a href=\"profile.php?uid=";
        echo $this->dataList->row['player_id'];
        echo "\">";
        echo $this->dataList->row['player_name'];
        echo "</a></td>\r\n\t\t   <td class=\"hab\">";
        echo $this->dataList->row['people_count'];
        echo "</td>\r\n\t\t   <td class=\"aligned_coords \"><div class=\"cox\">(";
        echo $this->dataList->row['rel_x'];
        echo "</div><div class=\"pi\">|</div><div class=\"coy\">";
        echo $this->dataList->row['rel_y'];
        echo ")</div></td>\r\n\t\t   ";
        if ( $this->isAdmin )
        {
            echo "<td class=\"ra\"><a href=\"#\" onclick=\"return openResourceSet(";
            echo $this->dataList->row['id'];
            echo ");\"><img src=\"assets/x.gif\" class=\"r4\" alt=\"";
            echo LANGUI_STAT_T27;
            echo "\" title=\"";
            echo LANGUI_STAT_T27;
            echo "\"></a></td>";
        }
        if ( $this->isAdmin )
        {
            echo "<td class=\"ra\"><a href=\"#\" onclick=\"return openTroopSet(";
            echo $this->dataList->row['id'];
            echo ");\"><img src=\"assets/x.gif\" class=\"unit uhero\" alt=\"";
            echo LANGUI_STAT_T27a;
            echo "\" title=\"";
            echo LANGUI_STAT_T27a;
            echo "\"></a></td>";
        }
        echo "\t\t</tr>\r\n\t\t";
    }
    echo " </tbody>\r\n</table>\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"search_navi\">\r\n\t<tbody>\r\n\t\t<tr>\t\t\t\t\t\t\r\n\t\t\t<td>\r\n\t\t\t<form method=\"post\" action=\"statistics.php";
    if ( 0 < $this->selectedTabIndex )
    {
        echo "?t=".$this->selectedTabIndex;
    }
    echo "\">\r\n\t\t\t\t<div class=\"search\">\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>:";
    echo LANGUI_STAT_T20;
    echo "<input type=\"text\" class=\"text ra\" maxlength=\"5\" name=\"rank\" value=\"";
    if ( 0 < $this->selectedRank )
    {
        echo $this->selectedRank;
    }
    echo "\"></span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan class=\"or\">";
    echo text_or_lang;
    echo "</span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>";
    echo LANGUI_STAT_T21;
    echo "<input type=\"text\" class=\"text name\" maxlength=\"20\" name=\"name\" value=\"\"></span>\r\n\t\t\t\t\t<input type=\"image\" value=\"submit\" name=\"submit\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_okdone_lang;
    echo "\">\r\n\t\t\t\t</div>\r\n\t\t\t</form>\r\n\t\t\t<div class=\"navi\">";
    echo $this->getPreviousLink( );
    echo "|";
    echo $this->getNextLink( );
    echo "</div>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
}
else if ( $this->selectedTabIndex == 3 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"heroes\" class=\"row_table_data\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"5\">";
    echo LANGUI_STAT_T28;
    echo "</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td></td><td>";
    echo LANGUI_STAT_T29;
    echo "</td><td>";
    echo LANGUI_STAT_T2;
    echo "</td><td>";
    echo level_lang2;
    echo "</td><td>";
    echo LANGUI_STAT_T30;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $rowIndex = 0;
    while ( $this->dataList->next( ) )
    {
        ++$rowIndex;
        $rank = $rowIndex + $this->pageIndex * $this->pageSize;
        echo "\t\t<tr";
        if ( $this->selectedRank == $rank )
        {
            echo " class=\"hl\"";
        }
        echo ">\r\n\t\t   <td class=\"ra\">";
        echo $rank;
        echo ".</td>\r\n\t\t   <td class=\"hero\"><img class=\"unit u";
        echo $this->dataList->row['hero_troop_id'];
        echo "\" alt=\"";
        echo constant( "troop_".$this->dataList->row['hero_troop_id'] );
        echo "\" title=\"";
        echo constant( "troop_".$this->dataList->row['hero_troop_id'] );
        echo "\" src=\"assets/x.gif\"> &nbsp;";
        echo $this->dataList->row['hero_name'];
        echo "</td>\r\n\t\t   <td class=\"pla\"><a href=\"profile.php?uid=";
        echo $this->dataList->row['id'];
        echo "\">";
        echo $this->dataList->row['name'];
        echo "</a></td>\r\n\t\t   <td class=\"lev\">";
        echo $this->dataList->row['hero_level'];
        echo "</td>\r\n\t\t   <td class=\"xp\">";
        echo $this->dataList->row['hero_points'];
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo " </tbody>\r\n</table>\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"search_navi\">\r\n\t<tbody>\r\n\t\t<tr>\t\t\t\t\t\t\r\n\t\t\t<td>\r\n\t\t\t<form method=\"post\" action=\"statistics.php";
    if ( 0 < $this->selectedTabIndex )
    {
        echo "?t=".$this->selectedTabIndex;
    }
    echo "\">\r\n\t\t\t\t<div class=\"search\">\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>:";
    echo LANGUI_STAT_T20;
    echo "<input type=\"text\" class=\"text ra\" maxlength=\"5\" name=\"rank\" value=\"";
    if ( 0 < $this->selectedRank )
    {
        echo $this->selectedRank;
    }
    echo "\"></span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan class=\"or\">";
    echo text_or_lang;
    echo "</span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>";
    echo LANGUI_STAT_T21;
    echo "<input type=\"text\" class=\"text name\" maxlength=\"20\" name=\"name\" value=\"\"></span>\r\n\t\t\t\t\t<input type=\"image\" value=\"submit\" name=\"submit\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_okdone_lang;
    echo "\">\r\n\t\t\t\t</div>\r\n\t\t\t</form>\r\n\t\t\t<div class=\"navi\">";
    echo $this->getPreviousLink( );
    echo "|";
    echo $this->getNextLink( );
    echo "</div>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
}
else if ( $this->selectedTabIndex == 11 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"villages\" class=\"row_table_data\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"5\">";
    echo LANGUI_STAT_T24;
    echo "</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td></td>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T2;
    echo "</td>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T25;
    echo "</td>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T13;
    echo "</td>\r\n\t\t\t<td>";
    echo level_lang;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $rowIndex = 0;
    while ( $this->dataList->next( ) )
    {
        ++$rowIndex;
        echo "\t\t<tr>\r\n\t\t   <td class=\"ra\">";
        echo $rowIndex;
        echo ".</td>\r\n\t\t   <td class=\"pla\"><a href=\"profile.php?uid=";
        echo $this->dataList->row['player_id'];
        echo "\">";
        echo $this->dataList->row['player_name'];
        echo "</a></td>\r\n\t\t   <td class=\"vil\"><a href=\"village3.php?id=";
        echo $this->dataList->row['id'];
        echo "\">";
        echo $this->dataList->row['village_name'];
        echo "</a> </td>\r\n\t\t   <td class=\"vil\">";
        if ( 0 < intval( $this->dataList->row['alliance_id'] ) )
        {
            echo "<a href=\"alliance.php?id=";
            echo $this->dataList->row['alliance_id'];
            echo "\">";
            echo $this->dataList->row['alliance_name'];
            echo "</a>";
        }
        echo "</td>\r\n\t\t   <td class=\"ra\" style=\"text-align:center;\">";
        echo $this->getWonderLandLevel( $this->dataList->row['buildings'] );
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo " </tbody>\r\n</table>\r\n";
}
else if ( $this->selectedTabIndex == 4 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"world_player\" class=\"world\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
    echo LANGUI_STAT_T2;
    echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_STAT_T31;
    echo "</th>\r\n\t\t\t<td>";
    echo $this->generalData['players_count'];
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_STAT_T32;
    echo "</th>\r\n\t\t\t<td>";
    echo $this->generalData['active_players_count'];
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_STAT_T33;
    echo "</th>\r\n\t\t\t<td>";
    echo $this->generalData['online_players_count'];
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"world_tribes\" class=\"world\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"3\">";
    echo LANGUI_STAT_T34;
    echo "</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T49;
    echo "</td>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T35;
    echo "</td>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T36;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo tribe_6;
    echo "</td>\r\n\t\t\t<td>";
    echo $this->generalData['Dboor_players_count'];
    echo "</td>\r\n\t\t\t<td>";
    echo round( $this->generalData['Dboor_players_count'] / $this->generalData['players_count'] * 100, 2 );
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo tribe_7;
    echo "</td>\r\n\t\t\t<td>";
    echo $this->generalData['Arab_players_count'];
    echo "</td>\r\n\t\t\t<td>";
    echo round( $this->generalData['Arab_players_count'] / $this->generalData['players_count'] * 100, 2 );
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo tribe_1;
    echo "</td>\r\n\t\t\t<td>";
    echo $this->generalData['Roman_players_count'];
    echo "</td>\r\n\t\t\t<td>";
    echo round( $this->generalData['Roman_players_count'] / $this->generalData['players_count'] * 100, 2 );
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo tribe_2;
    echo "</td>\r\n\t\t\t<td>";
    echo $this->generalData['Teutonic_players_count'];
    echo "</td>\r\n\t\t\t<td>";
    echo round( $this->generalData['Teutonic_players_count'] / $this->generalData['players_count'] * 100, 2 );
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo tribe_3;
    echo "</td>\r\n\t\t\t<td>";
    echo $this->generalData['Gallic_players_count'];
    echo "</td>\r\n\t\t\t<td>";
    echo round( $this->generalData['Gallic_players_count'] / $this->generalData['players_count'] * 100, 2 );
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
}
else if ( $this->selectedTabIndex == 6 || $this->selectedTabIndex == 7 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"player_off\" class=\"row_table_data\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"5\">";
    if ( $this->selectedTabIndex == 6 )
    {
        echo LANGUI_STAT_T37;
    }
    else
    {
        echo LANGUI_STAT_T38;
    }
    echo "\t\t\t<div id=\"submenu\">\r\n\t\t\t\t<a title=\"";
    echo LANGUI_STAT_T10;
    echo "\" href=\"statistics.php?t=5\"><img class=\"btn_top10\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T10;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo LANGUI_STAT_T11;
    echo "\" href=\"statistics.php";
    echo $this->selectedTabIndex == 6 ? "" : "?t=6";
    echo "\"><img class=\"";
    echo $this->selectedTabIndex == 6 ? "active btn_def" : "btn_def";
    echo "\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T11;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo LANGUI_STAT_T12;
    echo "\" href=\"statistics.php";
    echo $this->selectedTabIndex == 7 ? "" : "?t=7";
    echo "\"><img class=\"";
    echo $this->selectedTabIndex == 7 ? "active btn_off" : "btn_off";
    echo "\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t</div>\r\n\t\t\t<div id=\"submenu2\">\r\n\t\t\t\t<a title=\"";
    echo tribe_6;
    echo "\" href=\"";
    echo $this->_tb != 6 ? "?tb=6" : "?";
    echo "\"><img class=\"";
    if ( $this->_tb == 6 )
    {
        echo "active ";
    }
    echo "btn_v6\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo tribe_7;
    echo "\" href=\"";
    echo $this->_tb != 7 ? "?tb=7" : "?";
    echo "\"><img class=\"";
    if ( $this->_tb == 7 )
    {
        echo "active ";
    }
    echo "btn_v7\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo tribe_1;
    echo "\" href=\"";
    echo $this->_tb != 1 ? "?tb=1" : "?";
    echo "\"><img class=\"";
    if ( $this->_tb == 1 )
    {
        echo "active ";
    }
    echo "btn_v1\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo tribe_2;
    echo "\" href=\"";
    echo $this->_tb != 2 ? "?tb=2" : "?";
    echo "\"><img class=\"";
    if ( $this->_tb == 2 )
    {
        echo "active ";
    }
    echo "btn_v2\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo tribe_3;
    echo "\" href=\"";
    echo $this->_tb != 3 ? "?tb=3" : "?";
    echo "\"><img class=\"";
    if ( $this->_tb == 3 )
    {
        echo "active ";
    }
    echo "btn_v3\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t</div>\r\n\t\t</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td></td><td>";
    echo LANGUI_STAT_T2;
    echo "</td><td>";
    echo LANGUI_STAT_T14;
    echo "</td><td>";
    echo LANGUI_STAT_T4;
    echo "</td><td>";
    echo LANGUI_STAT_T23;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $rowIndex = 0;
    while ( $this->dataList->next( ) )
    {
        ++$rowIndex;
        $rank = $rowIndex + $this->pageIndex * $this->pageSize;
        echo "\t\t<tr";
        if ( $this->selectedRank == $rank )
        {
            echo " class=\"hl\"";
        }
        echo ">\r\n\t\t   <td class=\"ra\">";
        echo $rank;
        echo ".</td>\r\n\t\t   <td class=\"pla\"><a href=\"profile.php?uid=";
        echo $this->dataList->row['id'];
        echo "\">";
        echo $this->dataList->row['name'];
        echo "</a> </td>\r\n\t\t   <td class=\"pop\">";
        echo $this->dataList->row['total_people_count'];
        echo "</td>\r\n\t\t   <td class=\"vil\">";
        echo $this->dataList->row['villages_count'];
        echo "</td>\r\n\t\t   <td class=\"po\">";
        echo $this->dataList->row['points'];
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo " </tbody>\r\n</table>\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"search_navi\">\r\n\t<tbody>\r\n\t\t<tr>\t\t\t\t\t\t\r\n\t\t\t<td>\r\n\t\t\t<form method=\"post\" action=\"statistics.php";
    if ( 0 < $this->selectedTabIndex )
    {
        echo "?t=".$this->selectedTabIndex;
    }
    echo "\">\r\n\t\t\t\t<div class=\"search\">\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>:";
    echo LANGUI_STAT_T20;
    echo "<input type=\"text\" class=\"text ra\" maxlength=\"5\" name=\"rank\" value=\"";
    if ( 0 < $this->selectedRank )
    {
        echo $this->selectedRank;
    }
    echo "\"></span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan class=\"or\">";
    echo text_or_lang;
    echo "</span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>";
    echo LANGUI_STAT_T21;
    echo "<input type=\"text\" class=\"text name\" maxlength=\"20\" name=\"name\" value=\"\"></span>\r\n\t\t\t\t\t<input type=\"image\" value=\"submit\" name=\"submit\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_okdone_lang;
    echo "\">\r\n\t\t\t\t</div>\r\n\t\t\t</form>\r\n\t\t\t<div class=\"navi\">";
    echo $this->getPreviousLink( );
    echo "|";
    echo $this->getNextLink( );
    echo "</div>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
}
else if ( $this->selectedTabIndex == 9 || $this->selectedTabIndex == 10 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"alliance\" class=\"row_table_data\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"4\">";
    if ( $this->selectedTabIndex == 9 )
    {
        echo LANGUI_STAT_T39;
    }
    else
    {
        echo LANGUI_STAT_T40;
    }
    echo "\t\t\t<div id=\"submenu\">\r\n\t\t\t\t<a title=\"";
    echo LANGUI_STAT_T10;
    echo "\" href=\"statistics.php?t=8\"><img class=\"btn_top10\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T10;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo LANGUI_STAT_T11;
    echo "\" href=\"statistics.php?";
    echo $this->selectedTabIndex == 9 ? "t=1" : "t=9";
    echo "\"><img class=\"";
    if ( $this->selectedTabIndex == 9 )
    {
        echo "active ";
    }
    echo "btn_def\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T11;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo LANGUI_STAT_T12;
    echo "\" href=\"statistics.php?";
    echo $this->selectedTabIndex == 10 ? "t=1" : "t=10";
    echo "\"><img class=\"";
    if ( $this->selectedTabIndex == 10 )
    {
        echo "active ";
    }
    echo "btn_off\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t</div>\r\n\t\t</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td></td><td>";
    echo LANGUI_STAT_T13;
    echo "</td><td>";
    echo LANGUI_STAT_T2;
    echo "</td><td>";
    echo LANGUI_STAT_T23;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $rowIndex = 0;
    while ( $this->dataList->next( ) )
    {
        ++$rowIndex;
        $rank = $rowIndex + $this->pageIndex * $this->pageSize;
        echo "\t\t<tr";
        if ( $this->selectedRank == $rank )
        {
            echo " class=\"hl\"";
        }
        echo ">\r\n\t\t   <td class=\"ra\">";
        echo $rank;
        echo ".</td>\r\n\t\t   <td class=\"al\"><a href=\"alliance.php?id=";
        echo $this->dataList->row['id'];
        echo "\">";
        echo $this->dataList->row['name'];
        echo "</a></td>\r\n\t\t   <td class=\"pla\">";
        echo $this->dataList->row['player_count'];
        echo "</td>\r\n\t\t   <td class=\"po\">";
        echo $this->dataList->row['points'];
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo " </tbody>\r\n</table>\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"search_navi\">\r\n\t<tbody>\r\n\t\t<tr>\t\t\t\t\t\t\r\n\t\t\t<td>\r\n\t\t\t<form method=\"post\" action=\"statistics.php";
    if ( 0 < $this->selectedTabIndex )
    {
        echo "?t=".$this->selectedTabIndex;
    }
    echo "\">\r\n\t\t\t\t<div class=\"search\">\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>:";
    echo LANGUI_STAT_T20;
    echo "<input type=\"text\" class=\"text ra\" maxlength=\"5\" name=\"rank\" value=\"";
    if ( 0 < $this->selectedRank )
    {
        echo $this->selectedRank;
    }
    echo "\"></span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan class=\"or\">";
    echo text_or_lang;
    echo "</span>\r\n\t\t\t\t\t";
    echo "<s";
    echo "pan>";
    echo LANGUI_STAT_T21;
    echo "<input type=\"text\" class=\"text name\" maxlength=\"20\" name=\"name\" value=\"\"></span>\r\n\t\t\t\t\t<input type=\"image\" value=\"submit\" name=\"submit\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_okdone_lang;
    echo "\">\r\n\t\t\t\t</div>\r\n\t\t\t</form>\r\n\t\t\t<div class=\"navi\">";
    echo $this->getPreviousLink( );
    echo "|";
    echo $this->getNextLink( );
    echo "</div>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
}
else if ( $this->selectedTabIndex == 5 || $this->selectedTabIndex == 8 )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th>";
    if ( $this->selectedTabIndex == 5 )
    {
        echo LANGUI_STAT_T41;
    }
    else
    {
        echo LANGUI_STAT_T42;
    }
    echo "\t\t\t\r\n\t\t\t<div id=\"submenu\">\r\n\t\t\t\t<a title=\"";
    echo LANGUI_STAT_T10;
    echo "\" href=\"statistics.php";
    echo $this->selectedTabIndex == 5 ? "" : "?t=1";
    echo "\"><img class=\"active btn_top10\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T10;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo LANGUI_STAT_T11;
    echo "\" href=\"statistics.php?t=";
    echo $this->selectedTabIndex == 5 ? 6 : 9;
    echo "\"><img class=\"btn_def\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T11;
    echo "\"></a>\r\n\t\t\t\t<a title=\"";
    echo LANGUI_STAT_T12;
    echo "\" href=\"statistics.php?t=";
    echo $this->selectedTabIndex == 5 ? 7 : 10;
    echo "\"><img class=\"btn_off\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T12;
    echo "\"></a>\r\n\t\t\t</div>\r\n\t\t\t";
    if ( $this->selectedTabIndex == 5 )
    {
        echo "\t\t\t<div id=\"submenu2\">\r\n\t\t\t\t<a title=\"";
        echo tribe_6;
        echo "\" href=\"";
        echo $this->_tb != 6 ? "?tb=6" : "?";
        echo "\"><img class=\"";
        if ( $this->_tb == 6 )
        {
            echo "active ";
        }
        echo "btn_v6\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_STAT_T12;
        echo "\"></a>\r\n\t\t\t\t<a title=\"";
        echo tribe_7;
        echo "\" href=\"";
        echo $this->_tb != 7 ? "?tb=7" : "?";
        echo "\"><img class=\"";
        if ( $this->_tb == 7 )
        {
            echo "active ";
        }
        echo "btn_v7\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_STAT_T12;
        echo "\"></a>\r\n\t\t\t\t<a title=\"";
        echo tribe_1;
        echo "\" href=\"";
        echo $this->_tb != 1 ? "?tb=1" : "?";
        echo "\"><img class=\"";
        if ( $this->_tb == 1 )
        {
            echo "active ";
        }
        echo "btn_v1\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_STAT_T12;
        echo "\"></a>\r\n\t\t\t\t<a title=\"";
        echo tribe_2;
        echo "\" href=\"";
        echo $this->_tb != 2 ? "?tb=2" : "?";
        echo "\"><img class=\"";
        if ( $this->_tb == 2 )
        {
            echo "active ";
        }
        echo "btn_v2\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_STAT_T12;
        echo "\"></a>\r\n\t\t\t\t<a title=\"";
        echo tribe_3;
        echo "\" href=\"";
        echo $this->_tb != 3 ? "?tb=3" : "?";
        echo "\"><img class=\"";
        if ( $this->_tb == 3 )
        {
            echo "active ";
        }
        echo "btn_v3\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_STAT_T12;
        echo "\"></a>\r\n\t\t\t</div>\r\n\t\t\t";
    }
    echo "\t\t\t</th>\r\n\t\t</tr>\r\n\t</thead>\r\n</table>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"top10_offs\" class=\"top10 row_table_data\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th><a href=\"#\" onclick=\"return showManual(6,";
    echo $this->selectedTabIndex == 5 ? 0 : 1;
    echo ");\"><img class=\"help\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T43;
    echo "\" title=\"";
    echo LANGUI_STAT_T43;
    echo "\"></a></th>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_STAT_T44;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T20;
    echo "</td>\r\n\t\t\t<td>";
    if ( $this->selectedTabIndex == 5 )
    {
        echo LANGUI_STAT_T2;
    }
    else
    {
        echo LANGUI_STAT_T13;
    }
    echo "</td>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T23;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $_c = 0;
    while ( $this->top10Result['ATTACK']->next( ) )
    {
        ++$_c;
        echo "\t\t<tr";
        if ( $this->top10Result['TARGETID'] == $this->top10Result['ATTACK']->row['id'] )
        {
            echo " class=\"hl\"";
        }
        echo ">\r\n\t\t\t<td class=\"ra fc\">";
        echo $_c;
        echo ".&nbsp;</td>\r\n\t\t\t<td class=\"pla\"><a href=\"";
        echo $this->top10Result['URL'].$this->top10Result['ATTACK']->row['id'];
        echo "\">";
        echo $this->top10Result['ATTACK']->row['name'];
        echo "</a></td>\r\n\t\t\t<td class=\"val lc\">";
        echo $this->top10Result['ATTACK']->row['points'];
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo "\t\t <tr>\r\n\t\t\t<td colspan=\"3\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t \t <tr class=\"own hl\">\r\n\t\t\t<td class=\"ra fc\">?</td>\r\n\t\t\t<td class=\"pla\"><a href=\"";
    echo $this->top10Result['URL'].$this->top10Result['TARGETID'];
    echo "\">";
    echo $this->top10Result['TARGETNAME'];
    echo "</a></td>\r\n\t\t\t<td class=\"val lc\">";
    echo $this->top10Result['TARGEPOINT_ATTACK'];
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"top10_defs\" class=\"top10 row_table_data\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th><a href=\"#\" onclick=\"return showManual(6,";
    echo $this->selectedTabIndex == 5 ? 0 : 1;
    echo ");\"><img class=\"help\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T43;
    echo "\" title=\"";
    echo LANGUI_STAT_T43;
    echo "\"></a></th>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_STAT_T45;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T20;
    echo "</td>\r\n\t\t\t<td>";
    if ( $this->selectedTabIndex == 5 )
    {
        echo LANGUI_STAT_T2;
    }
    else
    {
        echo LANGUI_STAT_T13;
    }
    echo "</td>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T23;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $_c = 0;
    while ( $this->top10Result['DEFENSE']->next( ) )
    {
        ++$_c;
        echo "\t\t<tr";
        if ( $this->top10Result['TARGETID'] == $this->top10Result['DEFENSE']->row['id'] )
        {
            echo " class=\"hl\"";
        }
        echo ">\r\n\t\t\t<td class=\"ra fc\">";
        echo $_c;
        echo ".&nbsp;</td>\r\n\t\t\t<td class=\"pla\"><a href=\"";
        echo $this->top10Result['URL'].$this->top10Result['DEFENSE']->row['id'];
        echo "\">";
        echo $this->top10Result['DEFENSE']->row['name'];
        echo "</a></td>\r\n\t\t\t<td class=\"val lc\">";
        echo $this->top10Result['DEFENSE']->row['points'];
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo "\t\t <tr>\r\n\t\t\t<td colspan=\"3\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t \t <tr class=\"own hl\">\r\n\t\t\t<td class=\"ra fc\">?</td>\r\n\t\t\t<td class=\"pla\"><a href=\"";
    echo $this->top10Result['URL'].$this->top10Result['TARGETID'];
    echo "\">";
    echo $this->top10Result['TARGETNAME'];
    echo "</a></td>\r\n\t\t\t<td class=\"val lc\">";
    echo $this->top10Result['TARGEPOINT_DEFENSE'];
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<div class=\"clear\"></div>\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"top10_climbers\" class=\"top10 row_table_data\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th><a href=\"#\" onclick=\"return showManual(6,";
    echo $this->selectedTabIndex == 5 ? 0 : 1;
    echo ");\"><img class=\"help\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T43;
    echo "\" title=\"";
    echo LANGUI_STAT_T43;
    echo "\"></a></th>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_STAT_T46;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T20;
    echo "</td>\r\n\t\t\t<td>";
    if ( $this->selectedTabIndex == 5 )
    {
        echo LANGUI_STAT_T2;
    }
    else
    {
        echo LANGUI_STAT_T13;
    }
    echo "</td>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T50;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $_c = 0;
    while ( $this->top10Result['DEV']->next( ) )
    {
        ++$_c;
        echo "\t\t<tr";
        if ( $this->top10Result['TARGETID'] == $this->top10Result['DEV']->row['id'] )
        {
            echo " class=\"hl\"";
        }
        echo ">\r\n\t\t\t<td class=\"ra fc\">";
        echo $_c;
        echo ".&nbsp;</td>\r\n\t\t\t<td class=\"pla\"><a href=\"";
        echo $this->top10Result['URL'].$this->top10Result['DEV']->row['id'];
        echo "\">";
        echo $this->top10Result['DEV']->row['name'];
        echo "</a></td>\r\n\t\t\t<td class=\"val lc\">";
        echo $this->top10Result['DEV']->row['points'];
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo "\t\t <tr>\r\n\t\t\t<td colspan=\"3\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t \t <tr class=\"own hl\">\r\n\t\t\t<td class=\"ra fc\">?</td>\r\n\t\t\t<td class=\"pla\"><a href=\"";
    echo $this->top10Result['URL'].$this->top10Result['TARGETID'];
    echo "\">";
    echo $this->top10Result['TARGETNAME'];
    echo "</a></td>\r\n\t\t\t<td class=\"val lc\">";
    echo $this->top10Result['TARGEPOINT_DEV'];
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"top10_raiders\" class=\"top10 row_table_data\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th><a href=\"#\" onclick=\"return showManual(6,";
    echo $this->selectedTabIndex == 5 ? 0 : 1;
    echo ");\"><img class=\"help\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_STAT_T43;
    echo "\" title=\"";
    echo LANGUI_STAT_T43;
    echo "\"></a></th>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_STAT_T47;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T20;
    echo "</td>\r\n\t\t\t<td>";
    if ( $this->selectedTabIndex == 5 )
    {
        echo LANGUI_STAT_T2;
    }
    else
    {
        echo LANGUI_STAT_T13;
    }
    echo "</td>\r\n\t\t\t<td>";
    echo LANGUI_STAT_T48;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $_c = 0;
    while ( $this->top10Result['THIEF']->next( ) )
    {
        ++$_c;
        echo "\t\t<tr";
        if ( $this->top10Result['TARGETID'] == $this->top10Result['THIEF']->row['id'] )
        {
            echo " class=\"hl\"";
        }
        echo ">\r\n\t\t\t<td class=\"ra fc\">";
        echo $_c;
        echo ".&nbsp;</td>\r\n\t\t\t<td class=\"pla\"><a href=\"";
        echo $this->top10Result['URL'].$this->top10Result['THIEF']->row['id'];
        echo "\">";
        echo $this->top10Result['THIEF']->row['name'];
        echo "</a></td>\r\n\t\t\t<td class=\"val lc\">";
        echo $this->top10Result['THIEF']->row['points'];
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo "\t\t <tr>\r\n\t\t\t<td colspan=\"3\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t \t <tr class=\"own hl\">\r\n\t\t\t<td class=\"ra fc\">?</td>\r\n\t\t\t<td class=\"pla\"><a href=\"";
    echo $this->top10Result['URL'].$this->top10Result['TARGETID'];
    echo "\">";
    echo $this->top10Result['TARGETNAME'];
    echo "</a></td>\r\n\t\t\t<td class=\"val lc\">";
    echo $this->top10Result['TARGEPOINT_THIEF'];
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
}
?>
