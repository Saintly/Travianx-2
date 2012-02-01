<?php
echo "﻿";
require_once( LANG_UI_PATH."training.php" );
echo "<link rel=stylesheet type=\"text/css\" href=\"assets/un_main2_";
echo $this->appConfig['system']['lang'];
echo ".css";
echo $this->getAssetVersion( );
echo "\"/>\r\n<br/><br/>\r\n<div id=\"lmid1\"> \r\n\t\t<div id=\"lmid2\"><div class=\"headline\"><h1>";
echo LANGUI_TRAINING_T23;
echo "</h1></div>\r\n\r\n";
if ( !isset( $_GET['t'] ) )
{
    echo "<div class=\"wholebox\"><h2>";
    echo LANGUI_TRAINING_T24;
    echo "</h2></div>\r\n<div class=\"wholebox\">\r\n\t<table id=\"tut_img\"><tr>\r\n\t<td><img src=\"assets/default/img/tut/dorf_klein.jpg\"  width=\"200\" height=\"170\" alt=\"\"><br>";
    echo LANGUI_TRAINING_T1;
    echo "</td>\r\n\t<td><img src=\"assets/default/img/tut/dorf_gross.jpg\"  width=\"200\" height=\"170\" alt=\"\"><br>";
    echo LANGUI_TRAINING_T2;
    echo "</td>\r\n\t</tr></table>\r\n\t<table id=\"tut_txt\"><tr>\r\n\t<td colspan=\"2\"><br>";
    echo LANGUI_TRAINING_T3;
    echo "</td>\r\n\t</tr></table>\r\n</div>\r\n<div class=\"wholebox\">\r\n\t<div id=\"tut_left\"><a href=\"index.php\">&laquo; ";
    echo LANGUI_TRAINING_T4;
    echo "</a></div>\r\n\t<div id=\"tut_right\"><a href=\"training.php?t=1\">";
    echo LANGUI_TRAINING_T5;
    echo " &raquo;</a></div>\r\n</div>\r\n\r\n";
}
else if ( $_GET['t'] == 1 )
{
    echo "<div class=\"wholebox\"><h2>";
    echo LANGUI_TRAINING_T25;
    echo "</h2></div>\r\n<div class=\"wholebox\">\r\n\t<table id=\"tut_img\"><tr>\r\n\t\t<td><img src=\"assets/default/img/tut/rohstofffeld.gif\" width=\"200\" height=\"183\" alt=\"\"><br>";
    echo LANGUI_TRAINING_T6;
    echo "</td>\r\n\t\t<td><img src=\"assets/default/img/tut/rohstofffeld2.gif\" width=\"200\" height=\"183\" alt=\"\"><br>";
    echo LANGUI_TRAINING_T7;
    echo "</td>\r\n\t</tr></table>\r\n\t<table id=\"tut_txt\"><tr>\r\n\t\t<td colspan=\"2\"><br>";
    echo LANGUI_TRAINING_T8;
    echo "</td>\r\n\t</tr></table>\r\n</div>\r\n<div class=\"wholebox\">\r\n\t<div id=\"tut_left\"><a href=\"training.php\">&laquo; ";
    echo LANGUI_TRAINING_T4;
    echo "</a></div>\r\n\t<div id=\"tut_right\"><a href=\"training.php?t=2\">";
    echo LANGUI_TRAINING_T5;
    echo " &raquo;</a></div>\r\n</div>\r\n\r\n";
}
else if ( $_GET['t'] == 2 )
{
    echo "<div class=\"wholebox\"><h2>";
    echo LANGUI_TRAINING_T26;
    echo "</h2></div>\r\n<div class=\"wholebox\">\r\n\t<table id=\"tut_img\"><tr>\r\n\t\t<td><img src=\"assets/default/img/tut/dorfzentrum1.gif\" width=\"200\" height=\"183\" alt=\"\"><br>";
    echo LANGUI_TRAINING_T9;
    echo "</td>\r\n\t\t<td><img src=\"assets/default/img/tut/dorfzentrum2.gif\" width=\"200\" height=\"183\" alt=\"\"><br>";
    echo LANGUI_TRAINING_T10;
    echo "</td>\r\n\t</tr></table>\r\n\t<table id=\"tut_txt\"><tr>\r\n\t\t<td colspan=\"2\"><br>";
    echo LANGUI_TRAINING_T11;
    echo "</td>\r\n\t</tr></table>\r\n</div>\r\n<div class=\"wholebox\">\r\n\t<div id=\"tut_left\"><a href=\"training.php?t=1\">&laquo; ";
    echo LANGUI_TRAINING_T4;
    echo "</a></div>\r\n\t<div id=\"tut_right\"><a href=\"training.php?t=3\">";
    echo LANGUI_TRAINING_T5;
    echo " &raquo;</a></div>\r\n</div>\r\n\r\n";
}
else if ( $_GET['t'] == 3 )
{
    echo "<div class=\"wholebox\"><h2>";
    echo LANGUI_TRAINING_T27;
    echo "</h2></div>\r\n<div class=\"wholebox\">\r\n\t<table id=\"tut_img\"><tr>\r\n\t\t<td><img src=\"assets/default/img/tut/karte.jpg\" width=\"468\" height=\"200\" alt=\"\"><br>";
    echo LANGUI_TRAINING_T12;
    echo "</td>\r\n\t</tr></table>\r\n\t<table id=\"tut_txt\"><tr>\r\n\t\t<td colspan=\"2\">";
    echo LANGUI_TRAINING_T13;
    echo "</td>\r\n\t</tr></table>\r\n</div>\r\n<div class=\"wholebox\">\r\n\t<div id=\"tut_left\"><a href=\"training.php?t=2\">&laquo; ";
    echo LANGUI_TRAINING_T4;
    echo "</a></div>\r\n\t<div id=\"tut_right\"><a href=\"training.php?t=4\">";
    echo LANGUI_TRAINING_T5;
    echo " &raquo;</a></div>\r\n</div>\r\n\r\n";
}
else if ( $_GET['t'] == 4 )
{
    echo "<div class=\"wholebox\"><h2>";
    echo LANGUI_TRAINING_T28;
    echo "</h2></div>\r\n<div class=\"wholebox\">\r\n\t<table id=\"tut_img\" style=\"height:40px;\"><tr>\r\n\t\t<td colspan=\"2\"><img src=\"assets/default/img/tut/navi.jpg\" width=\"468\" height=\"100\" alt=\"\"><br>";
    echo LANGUI_TRAINING_T14;
    echo "</td>\r\n\t</tr></table>\r\n\t<table id=\"tut_txt\"><tr>\r\n\t\t<td colspan=\"2\">\r\n\t\t\t<ol start=\"1\" type=\"1\" class=\"f10\">\r\n\t\t\t\t<li>";
    echo LANGUI_TRAINING_T15;
    echo "</li> \r\n\t\t\t\t<li>";
    echo LANGUI_TRAINING_T16;
    echo "</li> \r\n\t\t\t\t<li>";
    echo LANGUI_TRAINING_T17;
    echo "</li> \r\n\t\t\t\t<li>";
    echo LANGUI_TRAINING_T18;
    echo "</li> \r\n\t\t\t\t<li>";
    echo LANGUI_TRAINING_T19;
    echo "</li> \r\n\t\t\t\t<li>";
    echo LANGUI_TRAINING_T20;
    echo "</li>\r\n\t\t\t</ol>\r\n\t\t\t";
    echo LANGUI_TRAINING_T21;
    echo "</td>\r\n\t</tr></table>\r\n</div>\r\n<div class=\"wholebox\">\r\n\t<div id=\"tut_left\"><a href=\"training.php?t=3\">&laquo; ";
    echo LANGUI_TRAINING_T4;
    echo "</a></div>\r\n\t<div id=\"tut_right\"><a href=\"register.php\"  id=\"link2\">";
    echo LANGUI_TRAINING_T22;
    echo " &raquo;</a></div>\r\n</div>\r\n";
}
echo "\r\n<div style=\"clear:both;\"></div>\r\n</div></div>";
?>
