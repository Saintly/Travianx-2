<?php
require_once( LANG_UI_PATH."over.php" );
echo "<h2>";
echo LANGUI_OVER_T1;
echo "</h2>\r\n<br><br>\r\n\r\n<table border=0 cellspacing=0 cellpadding=0>\r\n\t<tr>\r\n\t\t<td><img src=\"assets/default/img/ww_start.jpg\" border=\"0\" alt=\"";
echo LANGUI_OVER_T2;
echo "\"></td>\r\n\t\t<td>\r\n<p class=\"custDir\">\r\n";
echo LANGUI_OVER_T3;
echo " <a href=\"profile.php?uid=";
echo $this->playerData['id'];
echo "\">";
echo $this->playerData['name'];
echo "</a>\r\n<br/>\r\n";
if ( 0 < intval( $this->playerData['alliance_id'] ) )
{
    echo LANGUI_OVER_T4;
    echo " <a href=\"alliance.php?id=";
    echo $this->playerData['alliance_id'];
    echo "\">";
    echo $this->playerData['alliance_name'];
    echo "</a>";
}
echo "</p>\r\n\t\t</td>\r\n\t</tr>\r\n</table>\r\n<br/><br/><br/>\r\n<p class=\"f16\" align=\"center\"><a href=\"village1.php\">";
echo text_gotonext_lang;
echo "</a></p>";
?>
