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

require_once( LANG_UI_PATH."guide.php" );
if ( $this->taskNumber == 0 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T1;
    echo "</h1><br>\r\n\t<i>";
    echo LANGUI_GUIDE_T2;
    echo ".</i><br><br>\r\n\t";
    echo "<s";
    echo "pan id=\"qst_accpt\">\r\n\t\t<a class=\"qle\" href=\"javascript:goto_guide('s');\">";
    echo LANGUI_GUIDE_T3;
    echo "</a>&nbsp;\r\n\t\t<a class=\"qri\" href=\"javascript: free_guide();\">";
    echo LANGUI_GUIDE_T4;
    echo "</a><br><br><br>\r\n\t\t<a class=\"qri\" href=\"javascript: goto_guide('n');\">";
    echo LANGUI_GUIDE_T5;
    echo "</a>\r\n\t</span>\r\n</div>\r\n<div id=\"qstbg\" class=\"intro\"></div>\r\n";
}
else if ( $this->taskNumber == 1 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T6;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T7;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T8;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T9;
        echo "</i><br><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"wood\"></div>\r\n";
}
else if ( $this->taskNumber == 2 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T11;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T12;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T14;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T15;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p>";
        echo LANGUI_GUIDE_T157;
        echo " ";
        echo LANGUI_GUIDE_T16;
        echo "<br></div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"farm\"></div>\r\n";
}
else if ( $this->taskNumber == 3 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T17;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T18;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T19;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T20;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">30&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">60&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">30&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">20&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"village_name\"></div>\r\n";
}
else if ( $this->taskNumber == 4 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T22;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T23;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T24;
        echo "</div><br>\r\n\t<input id=\"qst_val\" class=\"text\" type=\"text\"> <input onclick=\"goto_guide(_('qst_val').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\t\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T25;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T24;
        echo "</div><br>\r\n\t<input id=\"qst_val\" class=\"text\" type=\"text\"> <input onclick=\"goto_guide(_('qst_val').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\t\r\n\t";
    }
    else if ( $this->taskState == 2 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T26;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">40&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">30&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">20&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">30&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    else if ( $this->taskState == 3 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T27;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">40&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">30&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">20&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">30&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    else if ( $this->taskState == 4 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T28;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">40&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">30&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">20&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">30&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"rank\"></div>\r\n";
}
else if ( $this->taskNumber == 5 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T29;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T30;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p><ul><li>";
        echo LANGUI_GUIDE_T31;
        echo "</li><li>";
        echo LANGUI_GUIDE_T32;
        echo "</li></ul></div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T33;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">50&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">60&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">30&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">30&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"clay_iron\"></div>\r\n";
}
else if ( $this->taskNumber == 6 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T34;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T35;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T36;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T37;
        echo ".<br><br>";
        echo LANGUI_GUIDE_T38;
        echo " <a href=\"plus.php?id=3\"><font color=\"#000000\">";
        echo LANGUI_GUIDE_T39;
        echo "</font> <b>";
        echo LANGUI_GUIDE_T40;
        echo "</b></a> ";
        echo LANGUI_GUIDE_T41;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p>20 ";
        echo LANGUI_GUIDE_T42;
        echo "<br></div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"msg\"></div>\r\n";
}
else if ( $this->taskNumber == 7 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T43;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T44;
        echo " <b>";
        echo $this->guideData['vname'];
        echo "</b>.<br><br>\r\n\t";
        echo LANGUI_GUIDE_T45;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T46;
        echo " \" <b>";
        echo $this->guideData['vname'];
        echo "</b> \" ";
        echo LANGUI_GUIDE_T47;
        echo "</div><br>\r\n\t";
        echo "<s";
        echo "pan class=\"qcoords\">(<input id=\"qst_val_x\" class=\"text\" type=\"text\" name=\"qstinx\" maxlength=\"4\">|<input id=\"qst_val_y\" class=\"text\" type=\"text\" name=\"qstiny\" maxlength=\"4\">)</span> \r\n\t<input onclick=\"goto_guide(_('qst_val_x').value + '|' + _('qst_val_y').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T49;
        echo " \"";
        echo $this->guideData['vname'];
        echo "\". ";
        echo LANGUI_GUIDE_T50;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T46;
        echo " \" <b>";
        echo $this->guideData['vname'];
        echo "</b> \" ";
        echo LANGUI_GUIDE_T47;
        echo "</div><br>\r\n\t";
        echo "<s";
        echo "pan class=\"qcoords\">(<input id=\"qst_val_x\" class=\"text\" type=\"text\" name=\"qstinx\" maxlength=\"4\">|<input id=\"qst_val_y\" class=\"text\" type=\"text\" name=\"qstiny\" maxlength=\"4\">)</span> \r\n\t<input onclick=\"goto_guide(_('qst_val_x').value + '|' + _('qst_val_y').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\t\r\n\t";
    }
    else if ( $this->taskState == 2 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T51;
        echo " \" <b>";
        echo $this->guideData['vname'];
        echo "</b> \". ";
        echo LANGUI_GUIDE_T52;
        echo "!</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">60&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">30&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">40&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">90&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"neighbour\"></div>\r\n";
}
else if ( $this->taskNumber == 8 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T53;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T54;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T55;
        echo "</div><br>\r\n\t<img class=\"r4\" src=\"assets/x.gif\" title=\"";
        echo item_title_4;
        echo "\" alt=\"";
        echo item_title_4;
        echo "\">200 \r\n\t<input onclick=\"goto_guide('send')\" name=\"qstin\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T56;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T57;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T55;
        echo "</div><br>\r\n\t<img class=\"r4\" src=\"assets/x.gif\" title=\"";
        echo item_title_4;
        echo "\" alt=\"";
        echo item_title_4;
        echo "\">200 \r\n\t<input onclick=\"goto_guide('send')\" name=\"qstin\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T56;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 2 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T58;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p>";
        echo LANGUI_GUIDE_T59;
        echo "<br></div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"army\"></div>\r\n";
}
else if ( $this->taskNumber == 9 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T60;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T61;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T62;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T63;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">100&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">80&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">40&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">40&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"allres\"></div>\r\n";
}
else if ( $this->taskNumber == 10 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T64;
    echo "!</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T65;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T66;
        echo "</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T67;
        echo "......</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p>2 ";
        echo LANGUI_GUIDE_T68;
        echo "<br></div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"army\"></div>\r\n";
}
else if ( $this->taskNumber == 11 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T69;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T70;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T71;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T72;
        echo "!</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">75&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">140&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">40&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">230&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"msg\"></div>\r\n";
}
else if ( $this->taskNumber == 12 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T73;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T74;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T75;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T76;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">75&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">80&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">30&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">50&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"allres\"></div>\r\n";
}
else if ( $this->taskNumber == 13 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T77;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T78;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T79;
        echo " <b>[#0]</b> ";
        echo LANGUI_GUIDE_T80;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T81;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">120&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">200&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">140&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">100&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"medal\"></div>\r\n";
}
else if ( $this->taskNumber == 14 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T82;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T83;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T84;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T85;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">150&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">180&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">30&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">130&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"hide\"></div>\r\n";
}
else if ( $this->taskNumber == 15 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T86;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T87;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T88;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T89;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">60&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">50&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">40&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">30&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"allres\"></div>\r\n";
}
else if ( $this->taskNumber == 16 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T90;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T91;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T92;
        echo "</div><br>\r\n\t<input id=\"qst_val\" class=\"text\" type=\"text\" name=\"qstin\"> <input onclick=\"goto_guide(_('qst_val').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T93;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T92;
        echo "</div><br>\r\n\t<input id=\"qst_val\" class=\"text\" type=\"text\" name=\"qstin\"> <input onclick=\"goto_guide(_('qst_val').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 2 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T94;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T92;
        echo "</div><br>\r\n\t<input id=\"qst_val\" class=\"text\" type=\"text\" name=\"qstin\"> <input onclick=\"goto_guide(_('qst_val').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 3 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T95;
        echo " ";
        echo $this->guideData['wood'];
        echo " ";
        echo LANGUI_GUIDE_T96;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">50&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">30&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">60&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">20&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"cost\"></div>\r\n";
}
else if ( $this->taskNumber == 17 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T97;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T98;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T99;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T100;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">75&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">75&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">40&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">40&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"main\"></div>\r\n";
}
else if ( $this->taskNumber == 18 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T101;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T102;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T24;
        echo "</div><br>\r\n\t<input id=\"qst_val\" class=\"text\" type=\"text\" name=\"qstin\"> <input onclick=\"goto_guide(_('qst_val').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T103;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T24;
        echo "</div><br>\r\n\t<input id=\"qst_val\" class=\"text\" type=\"text\" name=\"qstin\"> <input onclick=\"goto_guide(_('qst_val').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 2 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T104;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T24;
        echo "</div><br>\r\n\t<input id=\"qst_val\" class=\"text\" type=\"text\" name=\"qstin\"> <input onclick=\"goto_guide(_('qst_val').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 3 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T105;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T24;
        echo "</div><br>\r\n\t<input id=\"qst_val\" class=\"text\" type=\"text\" name=\"qstin\"> <input onclick=\"goto_guide(_('qst_val').value)\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T48;
        echo "\"><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 4 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T106;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">100&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">90&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">100&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">60&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"rank\"></div>\r\n";
}
else if ( $this->taskNumber == 19 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T107;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T108;
        echo "</i><br><br>\r\n\t<input onclick=\"goto_guide(1);\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T109;
        echo "\" class=\"qb1\">\r\n\t<input onclick=\"goto_guide(2);\" type=\"button\" value=\"";
        echo LANGUI_GUIDE_T110;
        echo "\" class=\"qb2\">\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T111;
        echo " <a href=\"build.php?id=39\">";
        echo LANGUI_GUIDE_T112;
        echo "</a> ";
        echo LANGUI_GUIDE_T113;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T114;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\t\r\n\t";
    }
    else if ( $this->taskState == 2 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T115;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T116;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 3 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T117;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">80&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">90&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">60&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">40&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    else if ( $this->taskState == 4 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T118;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">80&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">90&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">60&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">40&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"granary_rally\"></div>\r\n";
}
else if ( $this->taskNumber == 20 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\">";
    if ( $this->taskState == 0 || $this->taskState == 1 )
    {
        echo " ";
        echo LANGUI_GUIDE_T119;
    }
    else
    {
        echo " ";
        echo LANGUI_GUIDE_T120;
    }
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T121;
        echo "!</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T122;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T123;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">70&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">120&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">90&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">50&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    else if ( $this->taskState == 2 )
    {
        echo "    <i>";
        echo LANGUI_GUIDE_T124;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T125;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 3 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T126;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">70&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">100&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">90&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">100&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide()\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    echo "</div>\r\n";
    if ( $this->taskState == 0 || $this->taskState == 1 )
    {
        echo "<div id=\"qstbg\" class=\"warehouse\"></div>";
    }
    else
    {
        echo "<div id=\"qstbg\" class=\"barracks\"></div>";
    }
}
else if ( $this->taskNumber == 21 )
{
    echo "<div id=\"qstd\">\r\n\t<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    if ( $this->taskState == 0 || $this->taskState == 1 )
    {
        echo LANGUI_GUIDE_T127;
    }
    else
    {
        echo LANGUI_GUIDE_T128;
    }
    echo "</h1><br>\t\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T129;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T130;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T131;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">200&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">200&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">700&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">450&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    else if ( $this->taskState == 2 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T132;
        echo " ";
        echo $this->guideData['troop_name'];
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T133;
        echo " ";
        echo $this->guideData['troop_name'];
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 3 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T134;
        echo " <a href=\"warsm.php\">";
        echo LANGUI_GUIDE_T135;
        echo "</a> ";
        echo LANGUI_GUIDE_T136;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">300&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">320&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">360&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">570&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide()\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\r\n\t";
    }
    echo "</div>\r\n";
    if ( $this->taskState == 0 || $this->taskState == 1 )
    {
        echo "<div id=\"qstbg\" class=\"market\"></div>";
    }
    else
    {
        echo "<div id=\"qstbg\" class=\"units\"></div>";
    }
}
else if ( $this->taskNumber == 22 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T137;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T138;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T139;
        echo "</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T140;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p>15 ";
        echo LANGUI_GUIDE_T42;
        echo "<br></div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"allres\"></div>\r\n";
}
else if ( $this->taskNumber == 23 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T141;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T142;
        echo ".</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T162;
        echo "</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T143;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">100&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">60&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">90&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">40&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"><a href=\"javascript:goto_guide();\">";
        echo LANGUI_GUIDE_T10;
        echo "</a></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"intro\"></div>\r\n";
}
else if ( $this->taskNumber == 24 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T144;
    echo "</h1><br>\r\n\t";
    if ( $this->taskState == 0 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T145;
        echo "</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T13;
        echo "</p>";
        echo LANGUI_GUIDE_T146;
        echo "</div><br>";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\r\n\t";
    }
    else if ( $this->taskState == 1 )
    {
        echo "\t<i>";
        echo LANGUI_GUIDE_T147;
        echo ".</i><br><br>\r\n\t<div class=\"rew\"><p class=\"ta_aw\">";
        echo LANGUI_GUIDE_T21;
        echo "</p><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">395&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">315&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">345&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">230&nbsp;&nbsp;</div><br>\r\n\t";
        echo "<s";
        echo "pan id=\"qst_accpt\"></span>\t\r\n\t";
    }
    echo "</div>\r\n<div id=\"qstbg\" class=\"new_village\"></div>\r\n";
}
else if ( $this->taskNumber == 200 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T148;
    echo "</h1><br>\r\n\t<i>";
    echo LANGUI_GUIDE_T149;
    echo "</i><br><br>\r\n\t";
    echo "<s";
    echo "pan id=\"qst_accpt\">\r\n\t<a class=\"qle\" href=\"javascript: goto_guide('y');\">";
    echo LANGUI_GUIDE_T150;
    echo "</a>\r\n\t<a class=\"qri\" href=\"javascript: goto_guide('c');\">";
    echo LANGUI_GUIDE_T151;
    echo "</a>\r\n\t</span>\r\n</div>\r\n<div id=\"qstbg\" class=\"intro\"></div>\r\n";
}
else if ( $this->taskNumber == 201 )
{
    echo "<div id=\"qstd\">\r\n\t<h1> <img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\"> ";
    echo LANGUI_GUIDE_T152;
    echo "</h1><br>\r\n\t<table class=\"altquest\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t <thead>\r\n\t\t<tr><th colspan=\"4\">";
    echo LANGUI_GUIDE_T153;
    echo "</th></tr>\r\n\t\t <tr>\r\n\t\t\t<td></td>\r\n\t\t\t<td>";
    echo LANGUI_GUIDE_T154;
    echo "</td>\r\n\t\t\t<td>";
    echo LANGUI_GUIDE_T155;
    echo "</td>\r\n\t\t\t<td>";
    echo LANGUI_GUIDE_T156;
    echo "</td>\r\n\t\t </tr>\r\n\t </thead>\r\n\t<tbody>\r\n\t\t<tr ";
    if ( $this->guideData['quizStep'] == 0 )
    {
        echo "class=\"hl\"";
    }
    else if ( 0 < $this->guideData['quizStep'] )
    {
        echo "class=\"none\"";
    }
    echo ">\r\n\t\t\t<td class=\"fc ra\">1</td>\r\n\t\t\t<td class=\"desc\">";
    echo LANGUI_GUIDE_T157;
    echo " ";
    echo LANGUI_GUIDE_T16;
    echo "<br>15 ";
    echo LANGUI_GUIDE_T42;
    echo "<br></td>\r\n\t\t\t<td class=\"dur\">0:00:00</td>\r\n\t\t\t<td class=\"lc stat\">";
    if ( $this->guideData['quizStep'] == 0 )
    {
        echo "<div id=\"qst_reshere\"><a href=\"javascript: goto_guide('y');\">";
        echo LANGUI_GUIDE_T158;
        echo "</a></div>";
    }
    else
    {
        echo LANGUI_GUIDE_T159;
    }
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr ";
    if ( $this->guideData['quizStep'] == 1 )
    {
        echo "class=\"hl\"";
    }
    else if ( 1 < $this->guideData['quizStep'] )
    {
        echo "class=\"none\"";
    }
    echo ">\r\n\t\t\t<td class=\"fc ra\">2</td>\r\n\t\t\t<td class=\"desc\"><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">217&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">247&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">177&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">207&nbsp;&nbsp;</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->guideData['quiztime'];
    echo "</td>\r\n\t\t\t<td class=\"lc stat\">";
    if ( $this->guideData['quizStep'] < 1 )
    {
        echo LANGUI_GUIDE_T160;
    }
    else if ( $this->guideData['quizStep'] == 1 )
    {
        if ( $this->guideData['pended'] )
        {
            echo "<s";
            echo "pan id=\"timer1\">";
            echo WebHelper::secondstostring( $this->guideData['remainingSeconds'] );
            echo "</span>";
        }
        else
        {
            echo "<div id=\"qst_reshere\"><a href=\"javascript: goto_guide('y');\">";
            echo LANGUI_GUIDE_T158;
            echo "</a></div>";
        }
    }
    else
    {
        echo LANGUI_GUIDE_T159;
    }
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr ";
    if ( $this->guideData['quizStep'] == 2 )
    {
        echo "class=\"hl\"";
    }
    else if ( 2 < $this->guideData['quizStep'] )
    {
        echo "class=\"none\"";
    }
    echo ">\r\n\t\t\t<td class=\"fc ra\">3</td>\r\n\t\t\t<td class=\"desc\"><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">217&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">247&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">177&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">207&nbsp;&nbsp;</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->guideData['quiztime'];
    echo "</td>\r\n\t\t\t<td class=\"lc stat\">";
    if ( $this->guideData['quizStep'] < 2 )
    {
        echo LANGUI_GUIDE_T160;
    }
    else if ( $this->guideData['quizStep'] == 2 )
    {
        if ( $this->guideData['pended'] )
        {
            echo "<s";
            echo "pan id=\"timer1\">";
            echo WebHelper::secondstostring( $this->guideData['remainingSeconds'] );
            echo "</span>";
        }
        else
        {
            echo "<div id=\"qst_reshere\"><a href=\"javascript: goto_guide('y');\">";
            echo LANGUI_GUIDE_T158;
            echo "</a></div>";
        }
    }
    else
    {
        echo LANGUI_GUIDE_T159;
    }
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr ";
    if ( $this->guideData['quizStep'] == 3 )
    {
        echo "class=\"hl\"";
    }
    else if ( 3 < $this->guideData['quizStep'] )
    {
        echo "class=\"none\"";
    }
    echo ">\r\n\t\t\t<td class=\"fc ra\">4</td>\r\n\t\t\t<td class=\"desc\"><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">217&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">247&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">177&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">207&nbsp;&nbsp;</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->guideData['quiztime'];
    echo "</td>\r\n\t\t\t<td class=\"lc stat\">";
    if ( $this->guideData['quizStep'] < 3 )
    {
        echo LANGUI_GUIDE_T160;
    }
    else if ( $this->guideData['quizStep'] == 3 )
    {
        if ( $this->guideData['pended'] )
        {
            echo "<s";
            echo "pan id=\"timer1\">";
            echo WebHelper::secondstostring( $this->guideData['remainingSeconds'] );
            echo "</span>";
        }
        else
        {
            echo "<div id=\"qst_reshere\"><a href=\"javascript: goto_guide('y');\">";
            echo LANGUI_GUIDE_T158;
            echo "</a></div>";
        }
    }
    else
    {
        echo LANGUI_GUIDE_T159;
    }
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr ";
    if ( $this->guideData['quizStep'] == 4 )
    {
        echo "class=\"hl\"";
    }
    else if ( 4 < $this->guideData['quizStep'] )
    {
        echo "class=\"none\"";
    }
    echo ">\r\n\t\t\t<td class=\"fc ra\">5</td>\r\n\t\t\t<td class=\"desc\"><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">217&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">247&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">177&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">207&nbsp;&nbsp;</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->guideData['quiztime'];
    echo "</td>\r\n\t\t\t<td class=\"lc stat\">";
    if ( $this->guideData['quizStep'] < 4 )
    {
        echo LANGUI_GUIDE_T160;
    }
    else if ( $this->guideData['quizStep'] == 4 )
    {
        if ( $this->guideData['pended'] )
        {
            echo "<s";
            echo "pan id=\"timer1\">";
            echo WebHelper::secondstostring( $this->guideData['remainingSeconds'] );
            echo "</span>";
        }
        else
        {
            echo "<div id=\"qst_reshere\"><a href=\"javascript: goto_guide('y');\">";
            echo LANGUI_GUIDE_T158;
            echo "</a></div>";
        }
    }
    else
    {
        echo LANGUI_GUIDE_T159;
    }
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr ";
    if ( $this->guideData['quizStep'] == 5 )
    {
        echo "class=\"hl\"";
    }
    else if ( 5 < $this->guideData['quizStep'] )
    {
        echo "class=\"none\"";
    }
    echo ">\r\n\t\t\t<td class=\"fc ra\">6</td>\r\n\t\t\t<td class=\"desc\"><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">217&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r2\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">247&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r3\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">177&nbsp;&nbsp;<img src=\"assets/x.gif\" class=\"r4\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">207&nbsp;&nbsp;</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->guideData['quiztime'];
    echo "</td>\r\n\t\t\t<td class=\"lc stat\">";
    if ( $this->guideData['quizStep'] < 5 )
    {
        echo LANGUI_GUIDE_T160;
    }
    else if ( $this->guideData['quizStep'] == 5 )
    {
        if ( $this->guideData['pended'] )
        {
            echo "<s";
            echo "pan id=\"timer1\">";
            echo WebHelper::secondstostring( $this->guideData['remainingSeconds'] );
            echo "</span>";
        }
        else
        {
            echo "<div id=\"qst_reshere\"><a href=\"javascript: goto_guide('y');\">";
            echo LANGUI_GUIDE_T158;
            echo "</a></div>";
        }
    }
    else
    {
        echo LANGUI_GUIDE_T159;
    }
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr ";
    if ( $this->guideData['quizStep'] == 6 )
    {
        echo "class=\"hl\"";
    }
    else if ( 6 < $this->guideData['quizStep'] )
    {
        echo "class=\"none\"";
    }
    echo ">\r\n\t\t\t<td class=\"fc ra\">7</td>\r\n\t\t\t<td class=\"desc\">2 ";
    echo LANGUI_GUIDE_T161;
    echo " ";
    echo LANGUI_GUIDE_T16;
    echo "<br>20 ";
    echo LANGUI_GUIDE_T42;
    echo "<br></td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->guideData['quiztime'];
    echo "</td>\r\n\t\t\t<td class=\"lc stat\">";
    if ( $this->guideData['quizStep'] < 6 )
    {
        echo LANGUI_GUIDE_T160;
    }
    else if ( $this->guideData['quizStep'] == 6 && $this->quiz != GUIDE_QUIZ_COMPLETED )
    {
        if ( $this->guideData['pended'] )
        {
            echo "<s";
            echo "pan id=\"timer1\">";
            echo WebHelper::secondstostring( $this->guideData['remainingSeconds'] );
            echo "</span>";
        }
        else
        {
            echo "<div id=\"qst_reshere\"><a href=\"javascript: goto_guide('y');\">";
            echo LANGUI_GUIDE_T158;
            echo "</a></div>";
        }
    }
    else
    {
        echo LANGUI_GUIDE_T159;
    }
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n\t</table>\r\n\t";
    echo "<s";
    echo "pan id=\"qst_accpt\"></span>\r\n</div>\r\n<div id=\"qstbg\" class=\"intro\"></div>\r\n";
}
?>
