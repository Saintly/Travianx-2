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

require_once( LANG_UI_PATH."alliancerole.php" );
echo "<h1><img class=\"point\" src=\"assets/x.gif\" alt=\"\" title=\"\">";
echo LANGUI_ALLIROL_T1;
echo "</h1>\r\n<p></p>\r\n<form method=\"post\" action=\"alliancerole.php?uid=";
echo intval( $_GET['uid'] );
echo "\">\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"position\" class=\"small_option\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
echo LANGUI_ALLIROL_T1;
echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
echo LANGUI_ALLIROL_T2;
echo ":</th>\r\n\t\t\t<td>";
echo $this->playerName;
echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
echo LANGUI_ALLIROL_T3;
echo "</th>\r\n\t\t\t<td><input class=\"name text\" type=\"text\" name=\"a_titel\" value=\"";
//echo htmlspecialchars( $this->playerRoles['name'] );
echo print_r($this->playerRoles['name']);
echo "\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table><p></p>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"rights\" class=\"small_option\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
echo LANGUI_ALLIROL_T4;
echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><input class=\"check\" type=\"checkbox\" name=\"e1\" ";
echo $this->getAllianceRoleCheckValue( ALLIANCE_ROLE_SETROLES );
echo "></td>\r\n\t\t\t<td>";
echo LANGUI_ALLIROL_T5;
echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><input class=\"check\" type=\"checkbox\" name=\"e2\" ";
echo $this->getAllianceRoleCheckValue( ALLIANCE_ROLE_REMOVEPLAYER );
echo "></td>\r\n\t\t\t<td>";
echo LANGUI_ALLIROL_T6;
echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><input class=\"check\" type=\"checkbox\" name=\"e3\" ";
echo $this->getAllianceRoleCheckValue( ALLIANCE_ROLE_EDITNAMES );
echo "></td>\r\n\t\t\t<td>";
echo LANGUI_ALLIROL_T7;
echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><input class=\"check\" type=\"checkbox\" name=\"e4\" ";
echo $this->getAllianceRoleCheckValue( ALLIANCE_ROLE_EDITCONTRACTS );
echo "></td>\r\n\t\t\t<td>";
echo LANGUI_ALLIROL_T8;
echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><input class=\"check\" type=\"checkbox\" name=\"e5\" ";
echo $this->getAllianceRoleCheckValue( ALLIANCE_ROLE_SENDMESSAGE );
echo "></td>\r\n\t\t\t<td>";
echo LANGUI_ALLIROL_T9;
echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><input class=\"check\" type=\"checkbox\" name=\"e6\" ";
echo $this->getAllianceRoleCheckValue( ALLIANCE_ROLE_INVITEPLAYERS );
echo "></td>\r\n\t\t\t<td>";
echo LANGUI_ALLIROL_T10;
echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<p><input type=\"image\" value=\"ok\" name=\"s1\" id=\"btn_save\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
echo text_save_lang;
echo "\"></p>\r\n</form>\r\n\r\n";
if ( $this->isPost( ) )
{
    echo "<p class=\"error\">";
    echo text_newssaved_lang;
    echo "</p>";
}
?>
