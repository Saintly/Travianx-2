<?php
require_once( LANG_UI_PATH."village2.php" );
echo "<h1>";
echo $this->data['village_name'];
echo "</h1>\r\r<map name=\"map1\" id=\"map1\">\r\t<area href=\"build.php?id=40\" ";
echo $this->getBuildingTitle( 40 );
echo " coords=\"325,225,180\" shape=\"circle\">\r\t<area href=\"build.php?id=40\" ";
echo $this->getBuildingTitle( 40 );
echo " coords=\"220,230,185\" shape=\"circle\">\r</map>\r<map name=\"map2\" id=\"map2\">\r\t";
if ( $this->data['is_special_village'] )
{
    echo "<area href=\"build.php?id=25\" ";
    echo $this->getBuildingTitle( 25 );
    echo " coords=\"180,160,80\" shape=\"circle\">";
}
echo "\t\r\t<area href=\"build.php?id=19\" ";
echo $this->getBuildingTitle( 19 );
echo " coords=\"53,91,53,37,128,37,128,91,91,112\" shape=\"poly\">\r\t<area href=\"build.php?id=20\" ";
echo $this->getBuildingTitle( 20 );
echo " coords=\"136,66,136,12,211,12,211,66,174,87\" shape=\"poly\">\r\t<area href=\"build.php?id=21\" ";
echo $this->getBuildingTitle( 21 );
echo " coords=\"196,56,196,2,271,2,271,56,234,77\" shape=\"poly\">\r\t<area href=\"build.php?id=22\" ";
echo $this->getBuildingTitle( 22 );
echo " coords=\"270,69,270,15,345,15,345,69,308,90\" shape=\"poly\">\r\t<area href=\"build.php?id=23\" ";
echo $this->getBuildingTitle( 23 );
echo " coords=\"327,117,327,63,402,63,402,117,365,138\" shape=\"poly\">\r\t<area href=\"build.php?id=24\" ";
echo $this->getBuildingTitle( 24 );
echo " coords=\"14,129,14,75,89,75,89,129,52,150\" shape=\"poly\">\r\t";
if ( !$this->data['is_special_village'] )
{
    echo "<area href=\"build.php?id=25\" ";
    echo $this->getBuildingTitle( 25 );
    echo " coords=\"97,137,97,83,172,83,172,137,135,158\" shape=\"poly\">";
}
echo "\t";
if ( !$this->data['is_special_village'] )
{
    echo "<area href=\"build.php?id=26\" ";
    echo $this->getBuildingTitle( 26 );
    echo " coords=\"182,119,182,65,257,65,257,119,220,140\" shape=\"poly\">";
}
echo "\t<area href=\"build.php?id=27\" ";
echo $this->getBuildingTitle( 27 );
echo " coords=\"337,156,375,136,411,156,375,177\" shape=\"poly\">\r\t<area href=\"build.php?id=28\" ";
echo $this->getBuildingTitle( 28 );
echo " coords=\"2,199,2,145,77,145,77,199,40,220\" shape=\"poly\">\r\t";
if ( !$this->data['is_special_village'] )
{
    echo "<area href=\"build.php?id=29\" ";
    echo $this->getBuildingTitle( 29 );
    echo " coords=\"129,164,129,110,204,110,204,164,167,185\" shape=\"poly\">";
}
echo "\t";
if ( !$this->data['is_special_village'] )
{
    echo "<area href=\"build.php?id=30\" ";
    echo $this->getBuildingTitle( 30 );
    echo " coords=\"92,189,92,135,167,135,167,189,130,210\" shape=\"poly\">";
}
echo "\t<area href=\"build.php?id=31\" ";
echo $this->getBuildingTitle( 31 );
echo " coords=\"342,216,380,196,416,216,380,237\" shape=\"poly\">\r\t<area href=\"build.php?id=32\" ";
echo $this->getBuildingTitle( 32 );
echo " coords=\"22,238,60,218,96,238,60,259\" shape=\"poly\">\r\t";
if ( !$this->data['is_special_village'] )
{
    echo "<area href=\"build.php?id=33\" ";
    echo $this->getBuildingTitle( 33 );
    echo " coords=\"167,232,205,212,241,232,205,253\" shape=\"poly\">";
}
echo "\t<area href=\"build.php?id=34\" ";
echo $this->getBuildingTitle( 34 );
echo " coords=\"290,251,328,231,364,251,328,272\" shape=\"poly\">\r\t<area href=\"build.php?id=35\" ";
echo $this->getBuildingTitle( 35 );
echo " coords=\"95,273,133,253,169,273,133,294\" shape=\"poly\">\r\t<area href=\"build.php?id=36\" ";
echo $this->getBuildingTitle( 36 );
echo " coords=\"222,284,260,264,296,284,260,305\" shape=\"poly\">\r\t<area href=\"build.php?id=37\" ";
echo $this->getBuildingTitle( 37 );
echo " coords=\"80,306,118,286,154,306,118,327\" shape=\"poly\">\r\t<area href=\"build.php?id=38\" ";
echo $this->getBuildingTitle( 38 );
echo " coords=\"199,316,237,296,273,316,237,337\" shape=\"poly\">\r\t<area href=\"build.php?id=39\" ";
echo $this->getBuildingTitle( 39 );
echo " coords=\"270,158,303,135,316,155,318,178,304,211,288,227,263,238,250,215\" shape=\"poly\">\r\t<area href=\"build.php?id=40\" ";
echo $this->getBuildingTitle( 40 );
echo " coords=\"312,338,347,338,377,320,406,288,421,262,421,222,396,275,360,311\" shape=\"poly\">\r\t<area href=\"build.php?id=40\" ";
echo $this->getBuildingTitle( 40 );
echo " coords=\"49,338,0,274,0,240,33,286,88,338\" shape=\"poly\">\r\t<area href=\"build.php?id=40\" ";
echo $this->getBuildingTitle( 40 );
echo " coords=\"0,144,34,88,93,39,181,15,252,15,305,31,358,63,402,106,421,151,421,93,378,47,280,0,175,0,78,28,0,92\" shape=\"poly\">\r</map>\r\r<div id=\"village_map\" class=\"";
echo $this->getWallCssName( );
echo "\">\r\t";
if ( $this->data['is_special_village'] && $this->buildings[25]['item_id'] == 40 )
{
    echo "<img src=\"assets/x.gif\" class=\"";
    echo $this->getBuildingTitleClass( 25 );
    echo "\" style=\"position:absolute; z-index:20; left:161px;\" width=\"214\">";
}
echo "\t\r\t<img src=\"assets/x.gif\" class=\"building d1 ";
echo $this->getBuildingTitleClass( 19 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d2 ";
echo $this->getBuildingTitleClass( 20 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d3 ";
echo $this->getBuildingTitleClass( 21 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d4 ";
echo $this->getBuildingTitleClass( 22 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d5 ";
echo $this->getBuildingTitleClass( 23 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d6 ";
echo $this->getBuildingTitleClass( 24 );
echo "\">\r\t";
if ( !$this->data['is_special_village'] )
{
    echo "<img src=\"assets/x.gif\" class=\"building d7 ";
    echo $this->getBuildingTitleClass( 25 );
    echo "\">";
}
echo "\t";
if ( !$this->data['is_special_village'] )
{
    echo "<img src=\"assets/x.gif\" class=\"building d8 ";
    echo $this->getBuildingTitleClass( 26 );
    echo "\">";
}
echo "\t<img src=\"assets/x.gif\" class=\"building d9 ";
echo $this->getBuildingTitleClass( 27 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d10 ";
echo $this->getBuildingTitleClass( 28 );
echo "\">\r\t";
if ( !$this->data['is_special_village'] )
{
    echo "<img src=\"assets/x.gif\" class=\"building d11 ";
    echo $this->getBuildingTitleClass( 29 );
    echo "\">";
}
echo "\t";
if ( !$this->data['is_special_village'] )
{
    echo "<img src=\"assets/x.gif\" class=\"building d12 ";
    echo $this->getBuildingTitleClass( 30 );
    echo "\">";
}
echo "\t<img src=\"assets/x.gif\" class=\"building d13 ";
echo $this->getBuildingTitleClass( 31 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d14 ";
echo $this->getBuildingTitleClass( 32 );
echo "\">\r\t";
if ( !$this->data['is_special_village'] )
{
    echo "<img src=\"assets/x.gif\" class=\"building d15 ";
    echo $this->getBuildingTitleClass( 33 );
    echo "\">";
}
echo "\t<img src=\"assets/x.gif\" class=\"building d16 ";
echo $this->getBuildingTitleClass( 34 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d17 ";
echo $this->getBuildingTitleClass( 35 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d18 ";
echo $this->getBuildingTitleClass( 36 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d19 ";
echo $this->getBuildingTitleClass( 37 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"building d20 ";
echo $this->getBuildingTitleClass( 38 );
echo "\">\r\t<img src=\"assets/x.gif\" class=\"dx1 ";
echo $this->getBuildingTitleClass( 39 );
echo "\">\r\t<div id=\"levels\" class=\"";
echo $this->showLevelsStr;
echo "\">\r\t";
$i = 0;
foreach ( $this->buildings as $id => $build )
{
    if ( $id < 19 )
    {
        continue;
    }
    ++$i;
    if ( $this->data['is_special_village'] && ( $id == 25 || $id == 26 || $id == 29 || $id == 30 || $id == 33 ) )
    {
        continue;
    }
    if ( 0 < $build['level'] || 0 < $build['update_state'] )
    {
        $cssClass = $id == 39 || $id == 40 ? "l".$id : "d".$i;
        echo "<div class=\"".$cssClass."\">".$build['level']."</div>";
    }
}
echo "\t</div>\r\t<img class=\"map1\" usemap=\"#map1\" src=\"assets/x.gif\" alt=\"\">\r\t<img class=\"map2\" usemap=\"#map2\" src=\"assets/x.gif\" alt=\"\">\r</div>\r<img src=\"assets/x.gif\" id=\"lswitch\" class=\"";
echo $this->showLevelsStr;
echo "\" onclick=\"toggleLevels()\" alt=\"\">\r";
if ( isset( $this->queueModel->tasksInQueue[QS_BUILD_CREATEUPGRADE] ) )
{
    echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"building_contract\">\r\t<thead>\r\t\t<tr><th colspan=\"3\">\r\t\t\t";
    echo LANGUI_VIL2_T3;
    echo ":\r\t\t\t";
    if ( !$this->data['is_special_village'] && $this->gameMetadata['plusTable'][5]['cost'] <= $this->data['gold_num'] )
    {
        echo "\t\t\t<a href=\"village2.php?bfs&k=";
        echo $this->data['update_key'];
        echo "\" title=\"";
        echo LANGUI_VIL2_T1;
        echo "\">\r\t\t\t<img class=\"clock\" alt=\"";
        echo LANGUI_VIL2_T1;
        echo "\" src=\"assets/x.gif\"></a>\r\t\t\t";
    }
    echo "\t\t</th></tr>\r\t</thead>\r\t<tbody>\r\t\t";
    $tmpBuilding = array( );
    foreach ( $this->queueModel->tasksInQueue[QS_BUILD_CREATEUPGRADE] as $qtask )
    {
        $index = $qtask['proc_params'];
        $itemId = $qtask['building_id'];
        if ( !isset( $tmpBuilding[$index] ) )
        {
            $tmpBuilding[$index] = 0;
        }
        ++$tmpBuilding[$index];
        $level = $this->buildings[$index]['level'] + $tmpBuilding[$index];
        echo "\t\t<tr>\r\t\t\t<td class=\"ico\"><a href=\"?id=";
        echo $qtask['id'];
        echo "&d&k=";
        echo $this->data['update_key'];
        echo "\"><img src=\"assets/x.gif\" class=\"del\" title=\"";
        echo LANGUI_VIL2_T2;
        echo "\" alt=\"";
        echo LANGUI_VIL2_T2;
        echo "\"></a></td>\r\t\t\t<td>";
        echo constant( "item_".$itemId );
        echo " (";
        echo level_lang;
        echo " ";
        echo $level;
        echo ")</td>\r\t\t\t<td>";
        echo time_remain_lang;
        echo " ";
        echo "<s";
        echo "pan id=\"timer1\">";
        echo WebHelper::secondstostring( $qtask['remainingSeconds'] );
        echo "</span> ";
        echo time_hour_lang;
        echo "</td>\r\t\t</tr>\r\t\t";
    }
    unset( $tmpBuilding );
    echo "\t</tbody>\r</table>\r";
}
echo "<p></p><p></p>";
?>
