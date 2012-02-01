<?php
require_once( LANG_UI_PATH."custbuilds.php" );
if ( 0 < intval( $this->data['alliance_id'] ) )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"ally_info\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
    echo LANGUI_CUSTBU_EMB_t1;
    echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_CUSTBU_EMB_t2;
    echo ":</th>\r\n\t\t\t<td>";
    echo $this->data['alliance_name'];
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\"><a href=\"alliance.php?id=";
    echo $this->data['alliance_id'];
    echo "\">&nbsp;» ";
    echo LANGUI_CUSTBU_EMB_t3;
    echo "</a></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
}
else
{
    if ( 3 <= $this->embassyProperty['level'] )
    {
        echo "<form method=\"post\" name=\"snd\" action=\"build.php?id=";
        echo $this->buildingIndex;
        echo "\">\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"found\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
        echo LANGUI_CUSTBU_EMB_t4;
        echo "</th>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_CUSTBU_EMB_t2;
        echo ":</th>\r\n\t\t\t<td class=\"tag\">\r\n\t\t\t\t<input class=\"text\" name=\"ally1\" value=\"";
        echo $this->embassyProperty['ally1'];
        echo "\" maxlength=\"8\">\r\n\t\t\t\t";
        if ( $this->embassyProperty['error'] == 1 || $this->embassyProperty['error'] == 3 )
        {
            echo "<s";
            echo "pan class=\"error\"> ";
            echo LANGUI_CUSTBU_EMB_t5;
            echo "</span>";
        }
        echo "\t\t\t\t";
        if ( $this->embassyProperty['error'] == 4 )
        {
            echo "<s";
            echo "pan class=\"error\">";
            echo LANGUI_CUSTBU_EMB_t6;
            echo "</span>";
        }
        echo "\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_CUSTBU_EMB_t7;
        echo ":</th>\r\n\t\t\t<td class=\"nam\">\r\n\t\t\t\t<input class=\"text\" name=\"ally2\" value=\"";
        echo $this->embassyProperty['ally2'];
        echo "\" maxlength=\"25\">\r\n\t\t\t\t";
        if ( $this->embassyProperty['error'] == 2 || $this->embassyProperty['error'] == 3 )
        {
            echo "<s";
            echo "pan class=\"error\"> ";
            echo LANGUI_CUSTBU_EMB_t8;
            echo "</span>";
        }
        echo "\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<p><input type=\"image\" value=\"ok\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_CUSTBU_EMB_t9;
        echo "\"></p>\r\n</form>\r\n";
    }
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"join\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"3\">";
    echo LANGUI_CUSTBU_EMB_t10;
    echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    $_c = 0;
    foreach ( $this->embassyProperty['invites'] as $aid => $aname )
    {
        ++$_c;
        echo "\t\t<tr>\r\n\t\t\t<td class=\"abo\"><a href=\"build.php?id=";
        echo $this->buildingIndex;
        echo "&d=";
        echo $aid;
        echo "\"><img class=\"del\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_CUSTBU_EMB_t11;
        echo "\" title=\"";
        echo LANGUI_CUSTBU_EMB_t11;
        echo "\"></a></td>\r\n\t\t\t<td class=\"nam\"><a href=\"alliance.php?id=";
        echo $aid;
        echo "\">";
        echo $aname;
        echo "</a></td>\r\n\t\t\t<td class=\"acc\"><a href=\"build.php?id=";
        echo $this->buildingIndex;
        echo "&a=";
        echo $aid;
        echo "\">";
        echo LANGUI_CUSTBU_EMB_t12;
        echo "</a></td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo "\t\t";
    if ( $_c == 0 )
    {
        echo "\t\t<tr>\r\n\t\t\t<td colspan=\"3\" class=\"none\">";
        echo LANGUI_CUSTBU_EMB_t13;
        echo "</td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo "\t</tbody>\r\n</table>\r\n";
    if ( isset( $this->embassyProperty['error'] ) && $this->embassyProperty['error'] == 15 )
    {
        echo "<b><p class=\"error\">";
        echo LANGUI_CUSTBU_EMB_t14;
        echo "</p></b>\r\n";
    }
}
?>
