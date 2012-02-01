<?php
require_once( LANG_UI_PATH."activate.php" );
if ( $this->playerStatus == 0 - 1 )
{
    echo "<h6>";
    echo LANGUI_ACTIVATE_T1;
    echo "</h6>\r\n<p><b>";
    echo LANGUI_ACTIVATE_T2;
    echo "</b></p>\r\n<p class=\"f10 e b\">";
    echo LANGUI_ACTIVATE_T3;
    echo ":</p>\r\n<div class=\"f10\">\r\n\t<li><p>";
    echo LANGUI_ACTIVATE_T4;
    echo "</p></li>\r\n\t<li><p>";
    echo LANGUI_ACTIVATE_T5;
    echo "</p></li>\r\n\t<li><p>";
    echo LANGUI_ACTIVATE_T6;
    echo "</p></li>\r\n\t<li><p>";
    echo LANGUI_ACTIVATE_T7;
    echo "</p></li>\r\n</div>\r\n";
    if ( 0 < $this->uid )
    {
        echo "<p><b><br><br>";
        echo LANGUI_ACTIVATE_T8;
        echo ".</b></p>\r\n<form action=\"activate.php?uid=";
        echo $this->uid;
        echo "\" method=\"post\">\r\n<table cellpadding=\"1\" cellspacing=\"1\">\r\n\t<tbody>\r\n\t\t<tr class=\"top\">\r\n\t\t\t<th>";
        echo LANGUI_ACTIVATE_T9;
        echo ":</th>\r\n\t\t\t<td class=\"name\">";
        echo $this->uname;
        echo "</td>\r\n\t\t</tr>\r\n\t\t<tr class=\"btm\">\r\n\t\t\t<th>";
        echo LANGUI_ACTIVATE_T10;
        echo "</th>\r\n\t\t\t<td><input class=\"text\" type=\"password\" name=\"pw\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<p class=\"btn\"><input type=\"image\" src=\"assets/x.gif\" class=\"dynamic_img \" id=\"btn_delete\" alt=\"";
        echo LANGUI_ACTIVATE_T11;
        echo "\" value=\"";
        echo LANGUI_ACTIVATE_T11;
        echo "\" name=\"delreports\"></p>\r\n</form>\r\n";
    }
}
else if ( $this->playerStatus == 3 )
{
    echo "<p class=\"info2\">";
    echo LANGUI_ACTIVATE_T12;
    echo "</p>\r\n<p><a href=\"register.php\">";
    echo LANGUI_ACTIVATE_T13;
    echo "</a></p>\r\n";
}
else if ( $this->playerStatus == 1 )
{
    echo "<p class=\"f9\">";
    echo LANGUI_ACTIVATE_T14;
    echo ".</p>\r\n<p class=\"f9\">";
    echo LANGUI_ACTIVATE_T15;
    echo " <a href=\"index.php\">";
    echo LANGUI_ACTIVATE_T16;
    echo "</a></p>\r\n";
}
else if ( $this->playerStatus == 2 )
{
    echo "<p class=\"f9\">";
    echo LANGUI_ACTIVATE_T17;
    echo ".</p>\r\n";
}
?>
