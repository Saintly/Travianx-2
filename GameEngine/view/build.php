<?php
require_once( LANG_UI_PATH."build.php" );
if(!$this->buildProperties['emptyPlace']){
    echo "<div id=\"build\" class=\"gid";
    echo $this->buildProperties['building']['item_id'];
    echo "\">\r\n\t<a href=\"\" onclick=\"return showManual(4, ";
    echo $this->buildProperties['building']['item_id'];
    echo ");\" class=\"build_logo\"><img class=\"building g";
    echo $this->buildProperties['building']['item_id'];
    echo "\" src=\"assets/x.gif\" alt=\"";
    echo htmlspecialchars( constant( "item_".$this->buildProperties['building']['item_id'] ) );
    echo "\" title=\"";
    echo htmlspecialchars( constant( "item_".$this->buildProperties['building']['item_id'] ) );
    echo "\"></a>\r\n\t<h1>";
    echo constant( "item_".$this->buildProperties['building']['item_id'] );
    echo " ";
    echo "<s";
    echo "pan class=\"level\">";
    echo level_lang;
    echo " ";
    echo $this->buildProperties['building']['level'];
    echo "</span></h1>\r\n\t<p class=\"build_desc\"></p>\r\n\t<p>";
    echo constant( "item_desc_".$this->buildProperties['building']['item_id'] );
    echo "</p>\r\n\t<p></p>\r\n\r\n\t";
    if ( 4 < $this->buildProperties['building']['item_id'] && 0 < $this->buildProperties['building']['update_state'] && $this->buildProperties['building']['level'] == 0 )
    {
        echo "\t<p></p><br/><p></p><p class=\"none\">";
        echo LANGUI_BUILD_T1;
        echo ".</p><p></p><br/><p></p>\r\n\t";
    }
    else
    {
        if ( $this->productionPane )
        {
            echo "\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"build_value\">\r\n\t\t<tbody>\r\n\t\t\t<tr>\r\n\t\t\t\t<th>";
            echo constant( "item_curprod_".$this->buildProperties['building']['item_id'] );
            echo ":</th>\r\n\t\t\t\t<td><b>";
            echo $this->buildProperties['level']['current_value'];
            echo "</b> ";
            echo constant( "item_unit_".$this->buildProperties['building']['item_id'] );
            echo "</td>\r\n\t\t\t</tr>\r\n\t\t\t";
            if ( $this->buildProperties['building']['level'] < $this->buildProperties['maxLevel'] )
            {
                echo "\t\t\t<tr>\r\n\t\t\t\t<th>";
                echo constant( "item_nextprod_".$this->buildProperties['building']['item_id'] );
                echo " ";
                echo $this->buildProperties['nextLevel'];
                echo ":</th>\r\n\t\t\t\t<td><b>";
                echo $this->buildProperties['level']['value'];
                echo "</b> ";
                echo constant( "item_unit_".$this->buildProperties['building']['item_id'] );
                echo "</td>\r\n\t\t\t</tr>\r\n\t\t\t";
            }
            echo "\t\t</tbody>\r\n\t</table>\r\n\t";
        }
        if ( $this->buildingView != "" )
        {
            require( VIEW_PATH."buildings/".$this->buildingView.".phtml" );
        }
    }
    echo "\t";
    if ( $this->buildProperties['maxLevel'] <= $this->buildProperties['building']['level'] )
    {
        echo "\t<p class=\"none\">";
        echo LANGUI_BUILD_T2;
        echo " ";
        echo constant( "item_".$this->buildProperties['building']['item_id'] );
        echo " ";
        echo LANGUI_BUILD_T3;
        echo "</p>\r\n\t";
    }
    else if ( $this->buildProperties['maxLevel'] <= $this->buildProperties['upgradeToLevel'] && 0 < $this->buildProperties['building']['update_state'] )
    {
        echo "\t<p class=\"none\">";
        echo LANGUI_BUILD_T4;
        echo " ";
        echo constant( "item_".$this->buildProperties['building']['item_id'] );
        echo " ";
        echo LANGUI_BUILD_T3;
        echo "</p>\r\n\t";
    }
    else
    {
        echo "\t<p id=\"contract\">\r\n\t\t<b>";
        echo LANGUI_BUILD_T5;
        echo " </b> ";
        echo LANGUI_BUILD_T6;
        echo " ";
        echo $this->buildProperties['nextLevel'];
        echo ":<br>\r\n\t\t<img class=\"r1\" src=\"assets/x.gif\" alt=\"";
        echo item_title_1;
        echo "\" title=\"";
        echo item_title_1;
        echo "\">";
        echo $this->buildProperties['level']['resources'][1];
        echo " | \r\n\t\t<img class=\"r2\" src=\"assets/x.gif\" alt=\"";
        echo item_title_2;
        echo "\" title=\"";
        echo item_title_2;
        echo "\">";
        echo $this->buildProperties['level']['resources'][2];
        echo " | \r\n\t\t<img class=\"r3\" src=\"assets/x.gif\" alt=\"";
        echo item_title_3;
        echo "\" title=\"";
        echo item_title_3;
        echo "\">";
        echo $this->buildProperties['level']['resources'][3];
        echo " | \r\n\t\t<img class=\"r4\" src=\"assets/x.gif\" alt=\"";
        echo item_title_4;
        echo "\" title=\"";
        echo item_title_4;
        echo "\">";
        echo $this->buildProperties['level']['resources'][4];
        echo " | \r\n\t\t<img class=\"r5\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_BUILD_T7;
        echo "\" title=\"";
        echo LANGUI_BUILD_T7;
        echo "\">";
        echo $this->buildProperties['level']['people_inc'];
        echo " | \r\n\t\t<img class=\"clock\" src=\"assets/x.gif\" alt=\"";
        echo text_period_lang;
        echo "\" title=\"";
        echo text_period_lang;
        echo "\">";
        echo WebHelper::secondstostring( $this->buildProperties['level']['calc_consume'] );
        echo "\t\t";
        echo $this->getResourceGoldExchange( $this->buildProperties['level']['resources'], $this->buildProperties['building']['item_id'], $this->buildingIndex );
        echo "\t\t<br>";
        echo $this->getActionText( $this->buildProperties['level']['resources'], $this->buildProperties['building']['item_id'] <= 4, TRUE, $this->buildProperties['building']['item_id'] );
        echo "\t</p>\r\n\t";
    }
    echo "</div>\r\n";
    if ( $this->buildProperties['building']['item_id'] <= 4 )
    {
        echo $this->getFlashContent( "assets/anm/res/r".$this->buildProperties['building']['item_id'].".swf", 130, 160 );
    }
}
else
{
    echo "<s";
    echo "cript language=\"JavaScript\" type=\"text/javascript\">\r\nfunction showPane(list) {\r\n\tvar build_list = _('build_list_'+list);\r\n\tvar link = _(list+'_link');\r\n\r\n\tif (build_list.className == 'hide') {\r\n\t\tbuild_list.className = '';\t\t\r\n\t\tlink.innerHTML = '";
    echo LANGUI_BUILD_T8;
    echo "';\r\n\t} else {\r\n\t\tbuild_list.className = 'hide';\r\n\t\tlink.innerHTML = '";
    echo LANGUI_BUILD_T9;
    echo "';\r\n\t}\r\n}\r\n</script>\r\n<div id=\"build\" class=\"gid0\"><h1>";
    echo LANGUI_BUILD_T10;
    echo "</h1>\r\n\r\n";
    foreach ( $this->newBuilds['available'] as $buildArray )
    {
        foreach ( $buildArray as $item_id => $build )
        {
            if ( $this->data['is_special_village'] )
            {
                do
                {
                    if ( $_GET['id'] == 25 || $_GET['id'] == 26 || $_GET['id'] == 29 || $_GET['id'] == 30 || $_GET['id'] == 33 )
                    {
                        if ( !( $item_id != 40 ) )
                        {
                            break;
                        }
                        else
                        {
                            continue;
                        }
                    }
                    if ( !( $item_id == 40 ) )
                    {
                        break;
                    }
                    continue;
                } while ( 0 );
            }
            if ( $_GET['id'] == 39 && $item_id != 16 )
            {
                continue;
            }
            if ( $_GET['id'] == 40 && $item_id != 31 && $item_id != 32 && $item_id != 33 )
            {
                continue;
            }
            if ( $_GET['id'] != 39 && $_GET['id'] != 40 && ( $item_id == 16 || $item_id == 31 || $item_id == 32 || $item_id == 33 ) )
            {
                continue;
            }
            $neededResources = $build['levels'][0]['resources'];
            echo "<h2>";
            echo constant( "item_".$item_id );
            echo "</h2>\r\n<table class=\"new_building\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td class=\"desc\"><p>";
            echo constant( "item_desc_".$item_id );
            echo "</p></td>\r\n\t\t\t<td rowspan=\"3\" class=\"bimg\">\r\n\t\t\t\t<a href=\"#\" onclick=\"return showManual(4, ";
            echo $item_id;
            echo ");\"><img class=\"building g";
            echo $item_id;
            echo "\" src=\"assets/x.gif\" alt=\"";
            echo htmlspecialchars( constant( "item_".$item_id ) );
            echo "\" title=\"";
            echo htmlspecialchars( constant( "item_".$item_id ) );
            echo "\"></a>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"res\">\r\n\t\t\t\t<img class=\"r1\" src=\"assets/x.gif\" alt=\"";
            echo item_title_1;
            echo "\" title=\"";
            echo item_title_1;
            echo "\">";
            echo $neededResources[1];
            echo " | \r\n\t\t\t\t<img class=\"r2\" src=\"assets/x.gif\" alt=\"";
            echo item_title_2;
            echo "\" title=\"";
            echo item_title_2;
            echo "\">";
            echo $neededResources[2];
            echo " | \r\n\t\t\t\t<img class=\"r3\" src=\"assets/x.gif\" alt=\"";
            echo item_title_3;
            echo "\" title=\"";
            echo item_title_3;
            echo "\">";
            echo $neededResources[3];
            echo " | \r\n\t\t\t\t<img class=\"r4\" src=\"assets/x.gif\" alt=\"";
            echo item_title_4;
            echo "\" title=\"";
            echo item_title_4;
            echo "\">";
            echo $neededResources[4];
            echo " | \r\n\t\t\t\t<img class=\"r5\" src=\"assets/x.gif\" alt=\"";
            echo LANGUI_BUILD_T7;
            echo "\" title=\"";
            echo LANGUI_BUILD_T7;
            echo "\">";
            echo $build['levels'][0]['people_inc'];
            echo " | \r\n\t\t\t\t<img class=\"clock\" src=\"assets/x.gif\" alt=\"";
            echo text_period_lang;
            echo "\" title=\"";
            echo text_period_lang;
            echo "\">";
            echo WebHelper::secondstostring( $build['levels'][0]['time_consume'] / $this->gameSpeed * ( $this->data['time_consume_percent'] / 100 ) );
            echo "\t\t\t\t";
            echo $this->getResourceGoldExchange( $neededResources, $item_id, $this->buildingIndex );
            echo "\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"link\">";
            echo $this->getActionText( $neededResources, FALSE, FALSE, $item_id );
            echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
        }
    }
    echo "\r\n";
    if ( $_GET['id'] != 39 && $_GET['id'] != 40 && !( $this->data['is_special_village'] && ( $_GET['id'] == 25 || $_GET['id'] == 26 || $_GET['id'] == 29 || $_GET['id'] == 30 || $_GET['id'] == 33 ) ) )
    {
        echo "<p class=\"switch\"><a id=\"soon_link\" href=\"javascript:showPane('soon');\">";
        echo LANGUI_BUILD_T9;
        echo "</a></p>\r\n<div id=\"build_list_soon\" class=\"hide\">\r\n\r\n";
        foreach ( $this->newBuilds['soon'] as $buildArray )
        {
            foreach ( $buildArray as $item_id => $build )
            {
                echo "<h2>";
                echo constant( "item_".$item_id );
                echo "</h2>\r\n<table class=\"new_building\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td class=\"desc\"><p>";
                echo constant( "item_desc_".$item_id );
                echo "</p></td>\r\n\t\t\t<td rowspan=\"3\" class=\"bimg\">\r\n\t\t\t\t<a href=\"#\" onclick=\"return showManual(4, ";
                echo $item_id;
                echo ");\"><img class=\"building g";
                echo $item_id;
                echo "\" src=\"assets/x.gif\" alt=\"";
                echo htmlspecialchars( constant( "item_".$item_id ) );
                echo "\" title=\"";
                echo htmlspecialchars( constant( "item_".$item_id ) );
                echo "\"></a>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"requ\">";
                echo LANGUI_BUILD_T11;
                echo ":</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>\r\n\t\t\t";
                $flag = FALSE;
                foreach ( $build['pre_requests'] as $reqId => $reqValue )
                {
                    echo "\t\t\t";
                    if ( $flag )
                    {
                        echo ", ";
                    }
                    echo "<a href=\"#\" onclick=\"return showManual(4,";
                    echo $reqId;
                    echo ");\">";
                    if ( $reqValue == NULL )
                    {
                        echo "<strike>";
                    }
                    echo constant( "item_".$reqId );
                    if ( $reqValue == NULL )
                    {
                        echo "</strike>";
                    }
                    echo "</a>";
                    if ( $reqValue != NULL )
                    {
                        echo "<s";
                        echo "pan title=\"";
                        echo $build['pre_requests_dependencyCount'][$reqId] < 0 ? ">" : "+".$build['pre_requests_dependencyCount'][$reqId];
                        echo "\"> ";
                        echo level_lang;
                        echo " ";
                        echo $reqValue;
                    }
                    echo "</span>\r\n\t\t\t";
                    $flag = TRUE;
                }
                echo "\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
            }
        }
        echo "</div>\r\n";
    }
    echo "</div>\r\n";
}
?>
