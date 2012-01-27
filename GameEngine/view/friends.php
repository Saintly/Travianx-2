<?php
require_once( LANG_UI_PATH."friends.php" );
echo "<h1>";
echo LANGUI_Friends_T1;
echo "</h1>\r\n<form action=\"friends.php\" method=\"POST\">\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"links\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
echo LANGUI_Friends_T2;
echo "</th>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>";
echo LANGUI_Friends_T3;
echo "</td>\r\n            <td><input type=\"text\" name=\"playerName\" value=\"\" /></td>\r\n\t\t</tr>\r\n        <tr>\r\n        \t<td colspan=\"2\"><div class=\"btn\"><input title=\"";
echo LANGUI_Friends_T4;
echo "\" type=\"image\" value=\"\" name=\"s1\" id=\"btn_send\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
echo LANGUI_Friends_T4;
echo "\" tabindex=\"4;\"></div></td>\r\n        </tr>\r\n    </tbody>\r\n</table><br />\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"links\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"4\">";
echo LANGUI_Friends_T5;
echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
echo LANGUI_Friends_T6;
echo "</td>\r\n            <td>";
echo LANGUI_Friends_T7;
echo "</td>\r\n            <td>";
echo LANGUI_Friends_T8;
echo "</td>\r\n            <td>";
echo LANGUI_Friends_T9;
echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
$_c = 0;
while ( $this->friends->next( ) )
{
    ++$_c;
    $c = $_c + $this->pageIndex * $this->pageSize;
    $playername = $this->friends->row['playerid1'] == $this->player->playerId ? $this->friends->row['playername2'] : $this->friends->row['playername1'];
    $playerid = $this->friends->row['playerid1'] == $this->player->playerId ? $this->friends->row['playerid2'] : $this->friends->row['playerid1'];
    $State = $this->friends->row['accept'] == 1 ? LANGUI_Friends_T10 : LANGUI_Friends_T11;
    $confirmStat = $this->friends->row['accept'] == 0 && $this->friends->row['playerid2'] == $this->player->playerId ? "|&nbsp;<a href=\"friends.php?CFid=".$this->friends->row['ID']."\">".LANGUI_Friends_T12."</a>" : "";
    echo "\t\t<tr>\r\n\t\t\t<td class=\"nr\">";
    echo $c++;
    echo "</td>\r\n\t\t\t<td class=\"nam\"><a href=\"snprofile.php?uid=";
    echo $playerid;
    echo "\">";
    echo $playername;
    echo "</a></td>\r\n            <td class=\"nam\">";
    echo $State."&nbsp;".$confirmStat;
    echo "</td>\r\n\t\t\t<td class=\"link\"><a href=\"friends.php?DFid=";
    echo htmlspecialchars( $this->friends->row['ID'] );
    echo "\"><img alt=\"\" title=\"\" border=\"0\" src=\"assets/default/img/a/del.gif\" /></a></td>\r\n\t\t</tr>\r\n\t\t";
}
echo "        <tr>\r\n            <td colspan=\"3\" class=\"table_body\"><div align=\"center\">";
echo $this->getPreviousLink( );
echo " &nbsp; | &nbsp; ";
echo $this->getNextLink( );
echo "</div></td>\r\n            <td class=\"table_body\"><div align=\"center\">\r\n\t\t\t";
echo "<select name=\"p\" onchange=\"window.location.href=('badwords.php?p='+this.value)\">\r\n            ";
$i = 1;
$c = 0;
while ( $i <= $this->pageCount )
{
    echo "            \t<option value=\"";
    echo $c;
    echo "\"";
    if ( isset( $_GET['p'] ) && $_GET['p'] == $c )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n            ";
    ++$i;
    ++$c;
}
echo "            </select>\r\n            </div></td>\r\n        </tr>\r\n\t</tbody>\r\n</table>\r\n</form>";
?>
