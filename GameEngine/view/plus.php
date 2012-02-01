<?php
require_once( LANG_UI_PATH."plus.php" );
echo "<h1><p><b>";
echo LANGUI_PLUS_T1;
echo " <font color=\"#FF6F0F\">";
echo LANGUI_PLUS_T2;
echo "</font></b></p></h1>\r\n<div id=\"textmenu\">\r\n   <a href=\"plus.php\"";
if ( $this->selectedTabIndex == 0 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_PLUS_T3;
echo "</a>\r\n | <a href=\"plus.php?t=1\"";
if ( $this->selectedTabIndex == 1 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_PLUS_T4;
echo "</a>\r\n | <a href=\"plus.php?t=2\"";
if ( $this->selectedTabIndex == 2 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_PLUS_T5;
echo "</a>\r\n</div>\r\n";
if ( $this->selectedTabIndex == 0 )
{
    if ( $this->packageIndex < 0 )
    {
        echo "<div id=\"products\">\r\n\t";
        $_c = 0;
        foreach ( $this->appConfig['plus']['packages'] as $package )
        {
            ++$_c;
            echo "\t<table class=\"product lang_rtl lang_ar\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t\t<thead>\r\n\t\t\t<tr><th>";
            echo $package['name'];
            echo "</th></tr>\r\n\t\t</thead>\r\n        <tbody>\r\n\t\t\t<tr><td class=\"pic\"><a href=\"?id=";
            echo $_c;
            echo "\"><img src=\"assets/default/plus/";
            echo htmlspecialchars( $package['image'] );
            echo "\" style=\"width:100px;height:100px;\" alt=\"";
            echo htmlspecialchars( $package['name'] );
            echo "\"></a></td></tr>\r\n            <tr><td>";
            echo $package['gold'];
            echo "&nbsp;";
            echo LANGUI_PLUS_T6;
            echo "</td></tr>\r\n            <tr><td>";
            echo $package['cost'];
            echo "&nbsp;";
            echo $package['currency'];
            echo "</td></tr>\r\n\t\t\t<tr><td><a href=\"?id=";
            echo $_c;
            echo "\">";
            echo LANGUI_PLUS_T7;
            echo "</a></td></tr>\r\n\t\t</tbody>\r\n\t</table>\r\n\t";
        }
        echo "\t<div class=\"clear\"></div>\r\n</div>\r\n";
    }
    else
    {
        $_c = 0;
        foreach ( $this->appConfig['plus']['payments'] as $paymentKey => $payment )
        {
            ++$_c;
            echo "<table class=\"rate_details lang_rtl lang_ar\" cellpadding=\"1\" cellspacing=\"1\">\r\n    <thead>\r\n        <tr><th colspan=\"2\">";
            echo $_c.". ".$payment['name'];
            echo "</th></tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\">\r\n\t\t\t\t<img src=\"assets/default/plus/";
            echo htmlspecialchars( $this->appConfig['plus']['packages'][$this->packageIndex]['image'] );
            echo "\" style=\"width:100px;height:100px;\" alt=\"";
            echo htmlspecialchars( $this->appConfig['plus']['packages'][$this->packageIndex]['name'] );
            echo "\">\r\n                <div>";
            echo text_period_lang;
            echo ": ";
            echo constant( "payments_".$paymentKey."_period" );
            echo "</div>\r\n            </td>\r\n            <td class=\"desc\">\r\n                ";
            echo constant( "payments_".$paymentKey."_description" );
            echo "<br>\r\n                <a href=\"#\" onclick=\"window. open('payment.php?p=";
            echo $paymentKey;
            echo "&pg=";
            echo $this->packageIndex;
            echo "','tgpay','scrollbars=yes,status=yes,resizable=yes,toolbar=yes,width=800,height=600');return false;\">\r\n                <img src=\"assets/default/plus/";
            echo htmlspecialchars( $payment['image'] );
            echo "\" style=\"width:119px; height:58px;\" alt=\"";
            echo htmlspecialchars( $payment['name'] );
            echo "\"></a><br>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n";
        }
    }
}
else if ( $this->selectedTabIndex == 1 )
{
    echo "<table id=\"plus_features\" class=\"features\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\"><p class=\"custDir\">";
    echo LANGUI_PLUS_T8;
    echo "</p></th>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T9;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"p1\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T9;
    echo "\" title=\"";
    echo LANGUI_PLUS_T9;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T10;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T11;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"xxl_map\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T11;
    echo "\" title=\"";
    echo LANGUI_PLUS_T11;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T12;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T13;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"p7\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T13;
    echo "\" title=\"";
    echo LANGUI_PLUS_T13;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T14;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T15;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"p8\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T15;
    echo "\" title=\"";
    echo LANGUI_PLUS_T15;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T16;
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<table id=\"gold_features\" class=\"features\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
    echo LANGUI_PLUS_T17;
    echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T18;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"p1_25\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T18;
    echo "\" title=\"";
    echo LANGUI_PLUS_T18;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T19;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T20;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"p2_25\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T20;
    echo "\" title=\"";
    echo LANGUI_PLUS_T20;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T21;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T22;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"p3_25\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T22;
    echo "\" title=\"";
    echo LANGUI_PLUS_T22;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T23;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T24;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"p4_25\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T24;
    echo "\" title=\"";
    echo LANGUI_PLUS_T24;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T25;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T26;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"bau0\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T26;
    echo "\" title=\"";
    echo LANGUI_PLUS_T26;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T27;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T45;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"gid19\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T45;
    echo "\" title=\"";
    echo LANGUI_PLUS_T45;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T46;
    echo "</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"2\">";
    echo LANGUI_PLUS_T28;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"preview\"><img class=\"npc\" src=\"assets/x.gif\" alt=\"";
    echo LANGUI_PLUS_T28;
    echo "\" title=\"";
    echo LANGUI_PLUS_T28;
    echo "\"></td>\r\n\t\t\t<td class=\"text\">";
    echo LANGUI_PLUS_T29;
    echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
}
else if ( $this->selectedTabIndex == 2 )
{
    echo "<p>";
    if ( 0 < $this->data['gold_num'] )
    {
        echo LANGUI_PLUS_T30;
        echo " ";
        echo $this->data['gold_num'];
        echo " ";
        echo LANGUI_PLUS_T31;
    }
    else
    {
        echo LANGUI_PLUS_T32;
    }
    echo "</p>\r\n<table class=\"plusFunctions\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"5\">";
    echo LANGUI_PLUS_T33;
    echo "</th></tr>\r\n\t\t<tr><td></td><td>";
    echo LANGUI_PLUS_T34;
    echo "</td><td>";
    echo text_period_lang;
    echo "</td><td>";
    echo LANGUI_PLUS_T2;
    echo "</td><td>";
    echo LANGUI_PLUS_T35;
    echo "</td></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td class=\"man\"><a href=\"#\" onclick=\"return showManual(5,0);\"><img class=\"help\" src=\"assets/x.gif\" alt=\"\" title=\"\"></a></td>\r\n\t\t\t<td class=\"desc\">\r\n\t\t\t\t<p><b><font color=\"#71D000\"> ";
    echo LANGUI_PLUS_T36;
    echo "  </p><br>\r\n\t\t\t\t";
    echo "<s";
    echo "pan class=\"run\">&nbsp;";
    echo $this->getRemainingPlusTime( 0 );
    echo "</span>\r\n\t\t\t</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->plusTable[0]['time'] == 0 ? LANGUI_PLUS_T37 : $this->plusTable[0]['time']." ".LANGUI_PLUS_T38;
    echo "</td>\r\n\t\t\t<td class=\"cost\"><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
    echo LANGUI_PLUS_T6;
    echo "\" title=\"";
    echo LANGUI_PLUS_T6;
    echo "\">";
    echo $this->plusTable[0]['cost'];
    echo "</td>\r\n\t\t\t<td class=\"act\">";
    echo $this->getPlusAction( 0 );
    echo "</td>\r\n\t\t</tr>\t\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"5\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t\r\n\t\t<tr>\r\n\t\t\t<td class=\"man\"><a href=\"#\" onclick=\"return showManual(5,1);\"><img class=\"help\" src=\"assets/x.gif\" alt=\"\" title=\"\"></a></td>\r\n\t\t\t<td class=\"desc\">\r\n\t\t\t\t+<b>25</b>% <img class=\"r1\" src=\"assets/x.gif\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\"> ";
    echo LANGUI_PLUS_T39;
    echo "<br>\r\n\t\t\t\t";
    echo "<s";
    echo "pan class=\"run\">&nbsp;";
    echo $this->getRemainingPlusTime( 1 );
    echo "</span>\r\n\t\t\t</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->plusTable[1]['time'] == 0 ? LANGUI_PLUS_T37 : $this->plusTable[1]['time']." ".LANGUI_PLUS_T38;
    echo "</td>\r\n\t\t\t<td class=\"cost\"><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
    echo LANGUI_PLUS_T6;
    echo "\" title=\"";
    echo LANGUI_PLUS_T6;
    echo "\">";
    echo $this->plusTable[1]['cost'];
    echo "</td>\r\n\t\t\t<td class=\"act\">";
    echo $this->getPlusAction( 1 );
    echo "</td>\r\n\t\t</tr>\r\n\t\r\n\t\t<tr>\r\n\t\t\t<td class=\"man\"><a href=\"#\" onclick=\"return showManual(5,2);\"><img class=\"help\" src=\"assets/x.gif\" alt=\"\" title=\"\"></a></td>\r\n\t\t\t<td class=\"desc\">\r\n\t\t\t\t+<b>25</b>% <img class=\"r2\" src=\"assets/x.gif\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\"> ";
    echo LANGUI_PLUS_T40;
    echo "<br>\r\n\t\t\t\t";
    echo "<s";
    echo "pan class=\"run\">&nbsp;";
    echo $this->getRemainingPlusTime( 2 );
    echo "</span>\r\n\t\t\t</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->plusTable[2]['time'] == 0 ? LANGUI_PLUS_T37 : $this->plusTable[2]['time']." ".LANGUI_PLUS_T38;
    echo "</td>\r\n\t\t\t<td class=\"cost\"><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
    echo LANGUI_PLUS_T6;
    echo "\" title=\"";
    echo LANGUI_PLUS_T6;
    echo "\">";
    echo $this->plusTable[2]['cost'];
    echo "</td>\r\n\t\t\t<td class=\"act\">";
    echo $this->getPlusAction( 2 );
    echo "</td>\r\n\t\t</tr>\r\n\t\r\n\t\t<tr>\r\n\t\t\t<td class=\"man\"><a href=\"#\" onclick=\"return showManual(5,3);\"><img class=\"help\" src=\"assets/x.gif\" alt=\"\" title=\"\"></a></td>\r\n\t\t\t<td class=\"desc\">\r\n\t\t\t\t+<b>25</b>% <img class=\"r3\" src=\"assets/x.gif\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\"> ";
    echo LANGUI_PLUS_T41;
    echo "<br>\r\n\t\t\t\t";
    echo "<s";
    echo "pan class=\"run\">&nbsp;";
    echo $this->getRemainingPlusTime( 3 );
    echo "</span>\r\n\t\t\t</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->plusTable[3]['time'] == 0 ? LANGUI_PLUS_T37 : $this->plusTable[3]['time']." ".LANGUI_PLUS_T38;
    echo "</td>\r\n\t\t\t<td class=\"cost\"><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
    echo LANGUI_PLUS_T6;
    echo "\" title=\"";
    echo LANGUI_PLUS_T6;
    echo "\">";
    echo $this->plusTable[3]['cost'];
    echo "</td>\r\n\t\t\t<td class=\"act\">";
    echo $this->getPlusAction( 3 );
    echo "</td>\r\n\t\t</tr>\r\n\t\r\n\t\t<tr>\r\n\t\t\t<td class=\"man\"><a href=\"#\" onclick=\"return showManual(5,4);\"><img class=\"help\" src=\"assets/x.gif\" alt=\"\" title=\"\"></a></td>\r\n\t\t\t<td class=\"desc\">\r\n\t\t\t\t+<b>25</b>% <img class=\"r4\" src=\"assets/x.gif\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\"> ";
    echo LANGUI_PLUS_T42;
    echo "<br>\r\n\t\t\t\t";
    echo "<s";
    echo "pan class=\"run\">&nbsp;";
    echo $this->getRemainingPlusTime( 4 );
    echo "</span>\r\n\t\t\t</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->plusTable[4]['time'] == 0 ? LANGUI_PLUS_T37 : $this->plusTable[4]['time']." ".LANGUI_PLUS_T38;
    echo "</td>\r\n\t\t\t<td class=\"cost\"><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
    echo LANGUI_PLUS_T6;
    echo "\" title=\"";
    echo LANGUI_PLUS_T6;
    echo "\">";
    echo $this->plusTable[4]['cost'];
    echo "</td>\r\n\t\t\t<td class=\"act\">";
    echo $this->getPlusAction( 4 );
    echo "</td>\r\n\t\t</tr>\r\n\t\r\n\t\t<tr>\r\n\t\t\t<td colspan=\"5\" class=\"empty\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"man\"><a href=\"#\" onclick=\"return showManual(5,5);\"><img class=\"help\" src=\"assets/x.gif\" alt=\"\" title=\"\"></a></td>\r\n\t\t\t<td class=\"desc\">";
    echo LANGUI_PLUS_T43;
    echo "</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->plusTable[5]['time'] == 0 ? LANGUI_PLUS_T37 : $this->plusTable[5]['time']." ".LANGUI_PLUS_T38;
    echo "</td>\r\n\t\t\t<td class=\"cost\"><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
    echo LANGUI_PLUS_T6;
    echo "\" title=\"";
    echo LANGUI_PLUS_T6;
    echo "\">";
    echo $this->plusTable[5]['cost'];
    echo "</td>\r\n\t\t\t<td class=\"act\">";
    echo $this->getPlusAction( 5 );
    echo "</td>\r\n\t\t</tr>\t\r\n\t\t<tr>\r\n\t\t\t<td class=\"man\"><a href=\"#\" onclick=\"return showManual(5,8);\"><img class=\"help\" src=\"assets/x.gif\" alt=\"\" title=\"\"></a></td>\r\n\t\t\t<td class=\"desc\">";
    echo LANGUI_PLUS_T45;
    echo "</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->plusTable[7]['time'] == 0 ? LANGUI_PLUS_T37 : $this->plusTable[7]['time']." ".LANGUI_PLUS_T38;
    echo "</td>\r\n\t\t\t<td class=\"cost\"><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
    echo LANGUI_PLUS_T6;
    echo "\" title=\"";
    echo LANGUI_PLUS_T6;
    echo "\">";
    echo $this->plusTable[7]['cost'];
    echo "</td>\r\n\t\t\t<td class=\"act\">";
    echo $this->getPlusAction( 7 );
    echo "</td>\r\n\t\t</tr>\t\r\n\t\t<tr>\r\n\t\t\t<td class=\"man\"><a href=\"#\" onclick=\"return showManual(5,7);\"><img class=\"help\" src=\"assets/x.gif\" alt=\"\" title=\"\"></a></td>\r\n\t\t\t<td class=\"desc\">";
    echo LANGUI_PLUS_T44;
    echo "</td>\r\n\t\t\t<td class=\"dur\">";
    echo $this->plusTable[6]['time'] == 0 ? LANGUI_PLUS_T37 : $this->plusTable[6]['time']." ".LANGUI_PLUS_T38;
    echo "</td>\r\n\t\t\t<td class=\"cost\"><img src=\"assets/x.gif\" class=\"gold\" alt=\"";
    echo LANGUI_PLUS_T6;
    echo "\" title=\"";
    echo LANGUI_PLUS_T6;
    echo "\">";
    echo $this->plusTable[6]['cost'];
    echo "</td>\r\n\t\t\t<td class=\"act\">";
    echo $this->getPlusAction( 6 );
    echo "</td>\r\n\t\t</tr>\t\r\n\t</tbody>\r\n</table>\r\n";
}
?>
