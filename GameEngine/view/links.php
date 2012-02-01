<?php
require_once( LANG_UI_PATH."links.php" );
echo "<h1>";
echo LANGUI_LNKS_T1;
echo "</h1><p></p>\r\n<form action=\"links.php\" method=\"POST\">\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"links\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th><a href=\"#\" onclick=\"return showManual(5,6);\"><img class=\"help\" src=\"assets/x.gif\" alt=\"";
echo text_helptip_lang;
echo "\" title=\"";
echo text_helptip_lang;
echo "\"></a></th>\r\n\t\t\t<th colspan=\"2\">";
echo LANGUI_LNKS_T1;
echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
echo LANGUI_LNKS_T2;
echo "</td><td>";
echo LANGUI_LNKS_T3;
echo "</td><td>";
echo LANGUI_LNKS_T4;
echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
$_c = 1;
foreach ( $this->playerLinks as $link )
{
    echo "\t\t<tr>\r\n\t\t\t<td class=\"nr\"><input class=\"text\" type=\"text\" name=\"nr[]\" value=\"";
    echo $_c++;
    echo "\" size=\"1\" maxlength=\"3\"></td>\r\n\t\t\t<td class=\"nam\"><input class=\"text\" type=\"text\" name=\"linkname[]\" value=\"";
    echo htmlspecialchars( $link['linkName'] );
    echo "\" maxlength=\"30\"></td>\r\n\t\t\t<td class=\"link\"><input class=\"text\" type=\"text\" name=\"linkurl[]\" value=\"";
    echo htmlspecialchars( $link['linkHref'].( $link['linkSelfTarget'] ? "" : "*" ) );
    echo "\" maxlength=\"255\"></td>\r\n\t\t</tr>\r\n\t\t";
}
echo "\t\t<tr>\r\n\t\t\t<td class=\"nr\"><input class=\"text\" type=\"text\" name=\"nr[]\" value=\"";
echo $_c;
echo "\" size=\"1\" maxlength=\"3\"></td>\r\n\t\t\t<td class=\"nam\"><input class=\"text\" type=\"text\" name=\"linkname[]\" value=\"\" maxlength=\"30\"></td>\r\n\t\t\t<td class=\"link\"><input class=\"text\" type=\"text\" name=\"linkurl[]\" value=\"\" maxlength=\"255\"></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<p class=\"btn\"><input type=\"image\" value=\"\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
echo text_okdone_lang;
echo "\"></p>\r\n</form>";
?>
