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

require_once( LANG_UI_PATH."advertising.php" );
echo "<h1>";
echo LANGUI_ADV_T1;
echo "</h1>\r\n";
echo "<s";
echo "cript type=\"text/javascript\">\r\n<!--\r\nvar Advs = new Array();\r\nfunction edit(id){\r\n\t_('advtitle').innerHTML \t= '";
echo LANGUI_ADV_T2;
echo "';\r\n\t_('doID').value \t\t\t= 'edit';\r\n\t_('IDID').value \t\t\t= id;\r\n\t_('nameID').value \t\t\t= Advs[id].name;\r\n\t_('imageID').value \t\t\t= Advs[id].img;\r\n\t_('urlID').value \t\t\t= Advs[id].url;\r\n\t_('catID').value \t\t\t= Advs[id].cat;\r\n}\r\nfunction resetForm(){\r\n\t_('advtitle').innerHTML  \t= '";
echo LANGUI_ADV_T3;
echo "';\r\n\t_('doID').value \t\t\t= 'add';\r\n\t_('IDID').value \t\t\t= 0;\r\n\t_('nameID').value \t\t\t= '';\r\n\t_('imageID').value \t\t\t= '';\r\n\t_('urlID').value \t\t\t= '';\r\n\t_('catID').value \t\t\t= 1;\r\n}\r\n-->\r\n</script>\r\n<form action=\"advertising.php\" method=\"POST\">\r\n<input type=\"hidden\" name=\"do\" value=\"add\" id=\"doID\" />\r\n<input type=\"hidden\" name=\"ID\" value=\"0\" id=\"IDID\" />\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"links\">\r\n\t";
echo "<thead>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">\r\n            ";
echo "<s";
echo "amp style=\"float:right\"><a href=\"#\" onclick=\"javascript:resetForm(); return false;\"><img title=\"";
echo LANGUI_ADV_T4;
echo "\" alt=\"";
echo LANGUI_ADV_T4;
echo "\" src=\"assets/default/img/f/plus.gif\" border=\"0\" /></a></samp>\r\n            ";
echo "<s";
echo "amp id=\"advtitle\">";
echo LANGUI_ADV_T3;
echo "</samp></th>\r\n\t\t</tr>\r\n    </thead>\r\n\t<tbody>\r\n    \t<tr>\r\n        \t<td>";
echo LANGUI_ADV_T5;
echo "</td>\r\n            <td><input class=\"text\" type=\"text\" name=\"name\" value=\"\" id=\"nameID\" maxlength=\"150\"></td>\r\n        </tr>\r\n        <tr>\r\n        \t<td>";
echo LANGUI_ADV_T6;
echo " &nbsp;<a href=\"#\" onclick=\"alert('";
echo LANGUI_ADV_T7;
echo "'); return false;\"><img class=\"help\" src=\"assets/x.gif\" alt=\"";
echo LANGUI_ADV_T21;
echo "\" title=\"";
echo LANGUI_ADV_T21;
echo "\"></a></td>\r\n            <td><input class=\"text\" type=\"text\" name=\"image\" value=\"\" id=\"imageID\" maxlength=\"150\"></td>\r\n        </tr>\r\n        <tr>\r\n        \t<td>";
echo LANGUI_ADV_T8;
echo "</td>\r\n            <td><input class=\"text\" type=\"text\" name=\"url\" value=\"\" id=\"urlID\" maxlength=\"150\"></td>\r\n        </tr>\r\n        <tr>\r\n        \t<td>";
echo LANGUI_ADV_T9;
echo "</td>\r\n            <td>";
echo "<s";
echo "elect class=\"text\" name=\"cat\" id=\"catID\">\r\n            \t<option value=\"1\">";
echo LANGUI_ADV_T10;
echo "</option>\r\n                <option value=\"2\">";
echo LANGUI_ADV_T11;
echo "</option>\r\n            </select></td>\r\n        </tr>\r\n        <tr>\r\n        \t<td colspan=\"2\"><div class=\"btn\"><input type=\"image\" value=\"\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" title=\"";
echo LANGUI_ADV_T20;
echo "\" alt=\"";
echo LANGUI_ADV_T20;
echo "\"></div></td>\r\n        </tr>\r\n    </tbody>\r\n</table><br />\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"links\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"6\">";
echo LANGUI_ADV_T12;
echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
echo LANGUI_ADV_T13;
echo "</td>\r\n            <td>";
echo LANGUI_ADV_T5;
echo "</td>\r\n            <td>";
echo LANGUI_ADV_T14;
echo "</td>\r\n            <td>";
echo LANGUI_ADV_T15;
echo "</td>\r\n            <td>";
echo LANGUI_ADV_T9;
echo "</td>\r\n            <td>";
echo LANGUI_ADV_T16;
echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
$_c = 0;
while ( $this->Advertisings->next( ) )
{
    ++$_c;
    $c = $_c + $this->pageIndex * $this->pageSize;
    echo "              ";
    echo "<s";
    echo "cript type=\"text/javascript\">\r\n\t\t\t  <!--\r\n\t\t\t  Advs[";
    echo htmlspecialchars( $this->Advertisings->row['ID'] );
    echo "] = {\r\n\t\t\t\t  name:'";
    echo htmlspecialchars( $this->Advertisings->row['name'] );
    echo "',\r\n\t\t\t\t  url:'";
    echo htmlspecialchars( $this->Advertisings->row['url'] );
    echo "',\r\n\t\t\t\t  img:'";
    echo htmlspecialchars( $this->Advertisings->row['image'] );
    echo "',\r\n\t\t\t\t  cat:'";
    echo htmlspecialchars( $this->Advertisings->row['cat'] );
    echo "'\r\n\t\t\t\t  };\r\n\t\t\t  -->\r\n\t\t\t  </script>\r\n\t\t<tr>\r\n\t\t\t<td class=\"nr\">";
    echo $c++;
    echo "</td>\r\n\t\t\t<td class=\"link\"><a href=\"";
    echo htmlspecialchars( $this->Advertisings->row['url'] );
    echo "\" target=\"_blank\">";
    echo htmlspecialchars( $this->Advertisings->row['name'] );
    echo "</a></td>\r\n            <td class=\"nam\">";
    echo htmlspecialchars( $this->Advertisings->row['visit'] );
    echo "</td>\r\n            <td class=\"nam\">";
    echo htmlspecialchars( $this->Advertisings->row['view'] );
    echo "</td>\r\n            <td class=\"nam\">";
    echo $this->Advertisings->row['cat'] == 1 ? LANGUI_ADV_T10 : LANGUI_ADV_T11;
    echo "</td>\r\n\t\t\t<td class=\"link\">\r\n            <a href=\"";
    echo htmlspecialchars( $this->Advertisings->row['image'] );
    echo "\" target=\"_blank\"><img border=\"0\" src=\"assets/default/img/a/external.gif\" title=\"";
    echo LANGUI_ADV_T17;
    echo "\" alt=\"";
    echo LANGUI_ADV_T17;
    echo "\" /></a>\r\n            &nbsp;\r\n            <a href=\"advertising.php?DAdv=";
    echo htmlspecialchars( $this->Advertisings->row['ID'] );
    echo "\"><img border=\"0\" src=\"assets/default/img/a/del.gif\" title=\"";
    echo LANGUI_ADV_T18;
    echo "\" alt=\"";
    echo LANGUI_ADV_T18;
    echo "\" /></a>\r\n            &nbsp;\r\n            <a href=\"#\" onclick=\"javascript:edit(";
    echo htmlspecialchars( $this->Advertisings->row['ID'] );
    echo "); return false;\"><img border=\"0\" src=\"assets/default/img/f/edit.gif\" title=\"";
    echo LANGUI_ADV_T19;
    echo "\" alt=\"";
    echo LANGUI_ADV_T19;
    echo "\" /></a>\r\n            </td>\r\n\t\t</tr>\r\n\t\t";
}
echo "        <tr>\r\n            <td colspan=\"5\" class=\"table_body\"><div align=\"center\">";
echo $this->getPreviousLink( );
echo " &nbsp; | &nbsp; ";
echo $this->getNextLink( );
echo "</div></td>\r\n            <td class=\"table_body\"><div align=\"center\">\r\n\t\t\t";
echo "<s";
echo "elect name=\"p\" onchange=\"window.location.href=('advertising.php?p='+this.value)\">\r\n            ";
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
