<?php
require_once(LANG_UI_PATH."badwords.php");
echo "<h1>".LANGUI_BADWORDS_T1."</h1>\r\n<form action=\"badwords.php\" method=\"POST\">\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"links\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
echo LANGUI_BADWORDS_T2;
echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
echo LANGUI_BADWORDS_T3;
echo "</td>\r\n            <td>";
echo LANGUI_BADWORDS_T4;
echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n   ";
$i = 1;
while ( $i <= 10 )
{
    echo "\t\t<tr>\r\n\t\t\t<td class=\"nr\">";
    echo $i;
    echo "</td>\r\n\t\t\t<td class=\"nam\"><input class=\"text\" type=\"text\" name=\"words[]\" value=\"\" maxlength=\"150\"></td>\r\n\t\t</tr>\r\n        ";
    ++$i;
}
echo "        <tr>\r\n        \t<td colspan=\"2\"><div class=\"btn\"><input type=\"image\" value=\"\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" title=\"";
echo LANGUI_BADWORDS_T8;
echo "\" alt=\"";
echo LANGUI_BADWORDS_T8;
echo "\"></div></td>\r\n        </tr>\r\n    </tbody>\r\n</table><br />\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"links\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"3\">";
echo LANGUI_BADWORDS_T5;
echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
echo LANGUI_BADWORDS_T3;
echo "</td>\r\n            <td>";
echo LANGUI_BADWORDS_T4;
echo "</td>\r\n            <td>";
echo LANGUI_BADWORDS_T6;
echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
$_c = 0;
while ( $this->BadWords->next( ) )
{
    ++$_c;
    $c = $_c + $this->pageIndex * $this->pageSize;
    echo "\t\t<tr>\r\n\t\t\t<td class=\"nr\">";
    echo $c++;
    echo "</td>\r\n\t\t\t<td class=\"nam\">";
    echo htmlspecialchars( $this->BadWords->row['word'] );
    echo "</td>\r\n\t\t\t<td class=\"link\"><a href=\"badwords.php?Dword=";
    echo htmlspecialchars( $this->BadWords->row['ID'] );
    echo "\"><img alt=\"";
    echo LANGUI_BADWORDS_T7;
    echo "\" title=\"";
    echo LANGUI_BADWORDS_T7;
    echo "\" border=\"0\" src=\"assets/default/img/a/del.gif\" /></a></td>\r\n\t\t</tr>\r\n\t\t";
}
echo "        <tr>\r\n            <td colspan=\"2\" class=\"table_body\"><div align=\"center\">";
echo $this->getPreviousLink( );
echo " &nbsp; | &nbsp; ";
echo $this->getNextLink( );
echo "</div></td>\r\n            <td class=\"table_body\"><div align=\"center\">\r\n\t\t\t";
echo "<s";
echo "elect name=\"p\" onchange=\"window.location.href=('badwords.php?p='+this.value)\">\r\n            ";
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