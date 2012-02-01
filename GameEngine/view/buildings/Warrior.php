<?php
require_once( LANG_UI_PATH."custbuilds.php" );
echo "<p></p>\r\n<form method=\"post\" name=\"snd\" action=\"build.php?id=";
echo $this->buildingIndex;
echo "\">\r\n<table cellpadding=\"1\" cellspacing=\"1\" class=\"build_details\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<td>";
echo LANGUI_CUSTBU_TRP_t4;
echo "</td>\r\n\t\t\t<td>";
echo LANGUI_CUSTBU_TRP_t17;
echo "</td>\r\n\t\t\t<td>";
echo LANGUI_CUSTBU_TRP_t5;
echo "</td>\r\n\t\t\t<td>";
echo LANGUI_CUSTBU_TRP_t6;
echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
$_ac = 0;
foreach ( $this->troopsUpgrade as $tid )
{
    ++$_ac;
    $buildingMetadata = $this->gameMetadata['troops'][$tid];
    $maxNumber = floor( $this->data['gold_num'] / $buildingMetadata['gold_needed'] );
    $manual = $tid == 99 ? "4,36" : "3,".$tid;
    echo "\t\t<tr>\r\n\t\t\t<td class=\"desc\">\r\n\t\t\t\t<div class=\"tit\"><img class=\"unit u";
    echo $tid;
    echo "\" src=\"assets/x.gif\" alt=\"";
    echo constant( "troop_".$tid );
    echo "\" title=\"";
    echo constant( "troop_".$tid );
    echo "\"><a href=\"#\" onclick=\"return showManual(";
    echo $manual;
    echo ");\">";
    echo constant( "troop_".$tid );
    echo "</a> ";
    echo "<s";
    echo "pan class=\"info\">(";
    echo LANGUI_CUSTBU_TRP_t7;
    echo ": ";
    echo $this->troops[$tid];
    echo ")</span></div>\r\n\t\t\t</td>\r\n\t\t\t<td class=\"max\"><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
    echo LANGUI_CUSTBU_TRP_t18;
    echo "\" title=\"";
    echo LANGUI_CUSTBU_TRP_t18;
    echo "\"> ";
    echo $buildingMetadata['gold_needed'];
    echo "</td>\r\n\t\t\t<td class=\"val\"><input type=\"text\" class=\"text\" id=\"_tf";
    echo $tid;
    echo "\" name=\"tf[";
    echo $tid;
    echo $tid;
    echo "').value=";
    echo $maxNumber;
    echo "; return false;\">(";
    echo $maxNumber;
    echo ")</a></td>\r\n\t\t</tr>\r\n\t\t";
}
echo "\t\t";
if ( $_ac == 0 )
{
    echo "\t\t<tr><td colspan=\"4\">";
    echo "<s";
    echo "pan class=\"none\">";
    echo LANGUI_CUSTBU_TRP_t8;
    echo "</span></td></tr>\r\n\t\t";
}
echo "\t</tbody>\r\n</table>\r\n";
if ( $this->warriorMessage != "" )
{
    echo "<p";
    echo $this->warriorMessage == 1 ? "" : " class=\"error\"";
    echo "><b>";
    echo $this->warriorMessage == 1 ? LANGUI_CUSTBU_TRP_t19 : LANGUI_CUSTBU_TRP_t20;
    echo "</b></p>";
}
if ( 0 < $_ac )
{
    echo "<p><input type=\"image\" id=\"btn_train\" class=\"dynamic_img\" value=\"ok\" name=\"s1\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_CUSTBU_TRP_t9;
    echo "\"></p>";
}
echo "</form>";
?>
