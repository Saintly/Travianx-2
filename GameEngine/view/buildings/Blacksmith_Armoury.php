<?php
require_once( LANG_UI_PATH."custbuilds.php" );
echo "<p></p><p></p>\r\n<table cellpadding=\"1\" cellspacing=\"1\" class=\"build_details\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<td>";
echo $this->troopsUpgradeType == QS_TROOP_UPGRADE_ATTACK ? item_12 : item_13;
echo "</td>\r\n\t\t\t<td>";
echo LANGUI_CUSTBU_BLK_t1;
echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
$_ac = 0;
$buildingMetadata = $this->gameMetadata['items'][$this->buildProperties['building']['item_id']]['troop_upgrades'];
foreach ( $this->troopsUpgrade as $tid => $ulevel )
{
    ++$_ac;
    $lvl = $buildingMetadata[$tid][$ulevel];
    $lvlTime = intval( $lvl['time_consume'] / $this->gameSpeed * ( 10 / ( $this->buildProperties['building']['level'] + 9 ) ) );
    echo "\t\t<tr>\r\n\t\t\t<td class=\"desc\">\r\n\t\t\t\t<div class=\"tit\"><img class=\"unit u";
    echo $tid;
    echo "\" src=\"assets/x.gif\" alt=\"";
    echo constant( "troop_".$tid );
    echo "\" title=\"";
    echo constant( "troop_".$tid );
    echo "\"><a href=\"#\" onclick=\"return showManual(3,";
    echo $tid;
    echo ");\">";
    echo constant( "troop_".$tid );
    echo "</a> ";
    echo "<s";
    echo "pan class=\"info\">(";
    echo level_lang2;
    echo " ";
    echo $ulevel;
    echo ")</span></div>\r\n\t\t\t\t<div class=\"details\">\r\n\t\t\t\t\t<img class=\"r1\" src=\"assets/x.gif\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\">";
    echo "<s";
    echo "pan class=\"little_res\">";
    echo $lvl['resources'][1];
    echo "</span>|<img class=\"r2\" src=\"assets/x.gif\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\">";
    echo "<s";
    echo "pan class=\"little_res\">";
    echo $lvl['resources'][2];
    echo "</span>|<img class=\"r3\" src=\"assets/x.gif\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\">";
    echo "<s";
    echo "pan class=\"little_res\">";
    echo $lvl['resources'][3];
    echo "</span>|<img class=\"r4\" src=\"assets/x.gif\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\">";
    echo "<s";
    echo "pan class=\"little_res\">";
    echo $lvl['resources'][4];
    echo "</span>|<img class=\"clock\" src=\"assets/x.gif\" alt=\"";
    echo text_period_lang;
    echo "\" title=\"";
    echo text_period_lang;
    echo "\">";
    echo ( $lvlTime );
    echo $this->getResourceGoldExchange( $lvl['resources'], 0, $this->buildingIndex );
    echo "\t\t\t\t</div>\r\n\t\t\t\t";
    echo $this->getActionText2( $lvl['resources'] );
    echo "\t\t\t</td>\r\n\t\t\t<td class=\"act\">";
    echo $this->getActionText4( $lvl['resources'], "a=".$tid, LANGUI_CUSTBU_BLK_t4, $this->troopsUpgradeType, $this->buildProperties['building']['level'], $ulevel );
    echo "</td>\r\n\t\t</tr>\r\n\t\t";
}
echo "\t\t";
if ( $_ac == 0 )
{
    echo "\t\t<tr><td colspan=\"2\">";
    echo "<s";
    echo "pan class=\"none\">";
    echo LANGUI_CUSTBU_BLK_t2;
    echo "</span></td></tr>\r\n\t\t";
}
echo "\t</tbody>\r\n</table>\r\n";
if ( isset( $this->queueModel->tasksInQueue[$this->troopsUpgradeType] ) )
{
    $ulevel = explode( " ", $this->queueModel->tasksInQueue[$this->troopsUpgradeType][0]['proc_params'] )[1];
    $tid = explode( " ", $this->queueModel->tasksInQueue[$this->troopsUpgradeType][0]['proc_params'] )[0];
    echo "<table cellpadding=\"1\" cellspacing=\"1\" class=\"under_progress\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<td>";
    echo LANGUI_CUSTBU_BLK_t3;
    echo "</td>\r\n\t\t\t<td>";
    echo text_period_lang;
    echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td class=\"desc\"><img class=\"unit u";
    echo $tid;
    echo "\" src=\"assets/x.gif\" alt=\"";
    echo constant( "troop_".$tid );
    echo "\" title=\"";
    echo constant( "troop_".$tid );
    echo "\">";
    echo constant( "troop_".$tid );
    echo "  ";
    echo "<s";
    echo "pan class=\"info\">(";
    echo level_lang2;
    echo " ";
    echo $ulevel;
    echo ")</span></td>\r\n\t\t\t<td class=\"dur\">";
    echo "<s";
    echo "pan id=\"timer1\">";
    echo (  );
    echo "</span></td>\r\n\t\t</tr>\r\n\t\t<tr class=\"next\"><td colspan=\"2\">&nbsp;</td></tr>\r\n\t</tbody>\r\n</table>\r\n";
}
?>
