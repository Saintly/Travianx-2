<?php
require_once( LANG_UI_PATH."warsm.php" );
echo "<h1>";
echo LANGUI_WARSN_T1;
echo "</h1>\r\n<form action=\"warsm.php\" method=\"post\">\r\n";
if ( $this->showWarResult )
{
    echo "<table class=\"results attacker\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<td class=\"role\">";
    echo LANGUI_WARSN_T2;
    echo "</td>\r\n\t\t\t";
    foreach ( $this->warResult['attackTroops']['troops'] as $tid => $tprop )
    {
        echo "\t\t\t<td><img src=\"assets/x.gif\" class=\"unit u";
        echo $tid;
        echo "\" title=\"";
        echo constant( "troop_".$tid );
        echo "\" alt=\"";
        echo constant( "troop_".$tid );
        echo "\"></td>\r\n\t\t\t";
    }
    echo "\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_WARSN_T3;
    echo "</th>\r\n\t\t\t";
    foreach ( $this->warResult['attackTroops']['troops'] as $tid => $tprop )
    {
        $num = $tprop['number'];
        echo "\t\t\t";
        if ( $num <= 0 )
        {
            echo "<td class=\"none\">0</td>";
        }
        else
        {
            echo "<td>";
            echo $num;
            echo "</td>";
        }
        echo "\t\t\t";
    }
    echo "\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_WARSN_T4;
    echo "</th>\r\n\t\t\t";
    foreach ( $this->warResult['attackTroops']['troops'] as $tid => $tprop )
    {
        $num = $tprop['number'] - $tprop['live_number'];
        echo "\t\t\t";
        if ( $num <= 0 )
        {
            echo "<td class=\"none\">0</td>";
        }
        else
        {
            echo "<td>";
            echo $num;
            echo "</td>";
        }
        echo "\t\t\t";
    }
    echo "\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n";
    foreach ( $this->warResult['defenseTroops'] as $vid => $troopTable )
    {
        echo "<table class=\"results defender\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<td class=\"role\">";
        echo LANGUI_WARSN_T5;
        echo "</td>\r\n\t\t\t";
        foreach ( $troopTable['troops'] as $tid => $tprop )
        {
            echo "\t\t\t<td><img src=\"assets/x.gif\" class=\"unit u";
            echo $tid;
            echo "\" title=\"";
            echo constant( "troop_".$tid );
            echo "\" alt=\"";
            echo constant( "troop_".$tid );
            echo "\"></td>\r\n\t\t\t";
        }
        echo "\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_WARSN_T3;
        echo "</th>\r\n\t\t\t";
        foreach ( $troopTable['troops'] as $tid => $tprop )
        {
            $num = $tprop['number'];
            echo "\t\t\t";
            if ( $num <= 0 )
            {
                echo "<td class=\"none\">0</td>";
            }
            else
            {
                echo "<td>";
                echo $num;
                echo "</td>";
            }
            echo "\t\t\t";
        }
        echo "\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_WARSN_T4;
        echo "</th>\r\n\t\t\t";
        foreach ( $troopTable['troops'] as $tid => $tprop )
        {
            $num = $tprop['number'] - $tprop['live_number'];
            echo "\t\t\t";
            if ( $num <= 0 )
            {
                echo "<td class=\"none\">0</td>";
            }
            else
            {
                echo "<td>";
                echo $num;
                echo "</td>";
            }
            echo "\t\t\t";
        }
        echo "\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n";
    }
}
if ( $this->showTroopsTable )
{
    echo "<p>";
    echo LANGUI_WARSN_T6;
    echo ": <b>";
    echo intval( $_POST['ktyp'] ) == 1 ? LANGUI_WARSN_T7 : LANGUI_WARSN_T8;
    echo "</b></p>\r\n\r\n<table id=\"attacker\" class=\"fill_in\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr><th>";
    echo LANGUI_WARSN_T2;
    echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr><th>";
    echo constant( "tribe_".intval( $_POST['a1'] ) );
    echo "</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"details\">\r\n\t\t\t\t<table cellpadding=\"1\" cellspacing=\"1\">\r\n\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t";
    $_c = 0;
    $tribeId = intval( $_POST['a1'] );
    foreach ( $this->troopsMetadata as $troopId => $troopMetadata )
    {
        if ( $troopMetadata['for_tribe_id'] != $tribeId )
        {
            continue;
        }
        ++$_c;
        echo "\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td class=\"ico\"><img src=\"assets/x.gif\" class=\"unit u";
        echo $troopId;
        echo "\" title=\"";
        echo constant( "troop_".$troopId );
        echo "\" alt=\"";
        echo constant( "troop_".$troopId );
        echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"desc\">";
        echo constant( "troop_".$troopId );
        echo "</td>\r\n\t\t\t\t\t\t\t<td class=\"value\"><input class=\"text\" type=\"text\" name=\"t1[";
        echo $tribeId;
        echo "][";
        echo $troopId;
        echo "]\" value=\"";
        if ( isset( $_POST['t1'], $_POST['t1'][$tribeId] ) && isset( $_POST['t1'][$tribeId][$troopId] ) && 0 < intval( $_POST['t1'][$tribeId][$troopId] ) )
        {
            echo intval( $_POST['t1'][$tribeId][$troopId] );
        }
        echo "\" maxlength=\"7\" title=\"";
        echo LANGUI_WARSN_T9;
        echo " ";
        echo constant( "troop_".$troopId );
        echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"research\">";
        if ( $tribeId != 4 && $_c <= 8 )
        {
            echo "<input class=\"text\" type=\"text\" name=\"f1[";
            echo $tribeId;
            echo "][";
            echo $troopId;
            echo "]\" value=\"";
            if ( isset( $_POST['f1'], $_POST['f1'][$tribeId] ) && isset( $_POST['f1'][$tribeId][$troopId] ) && 0 < intval( $_POST['f1'][$tribeId][$troopId] ) )
            {
                echo intval( $_POST['f1'][$tribeId][$troopId] );
            }
            echo "\" maxlength=\"2\" title=\"";
            echo LANGUI_WARSN_T10;
            echo " ";
            echo constant( "troop_".$troopId );
            echo "\">";
        }
        echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t";
    }
    echo "\t\t\t\t\t</tbody>\r\n\t\t\t\t</table>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_WARSN_T11;
    echo "</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"details\">\r\n\t\t\t\t<table cellpadding=\"1\" cellspacing=\"1\">\r\n\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td class=\"ico\"><img src=\"assets/x.gif\" class=\"unit uhab\" alt=\"";
    echo LANGUI_WARSN_T12;
    echo "\" title=\"";
    echo LANGUI_WARSN_T12;
    echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"desc\">";
    echo LANGUI_WARSN_T12;
    echo "</td>\r\n\t\t\t\t\t\t\t<td class=\"value\"><input class=\"text\" type=\"text\" name=\"ew1\" value=\"";
    if ( isset( $_POST['ew1'] ) && 0 < intval( $_POST['ew1'] ) )
    {
        echo intval( $_POST['ew1'] );
    }
    echo "\" maxlength=\"5\" title=\"";
    echo LANGUI_WARSN_T13;
    echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"research\"></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td class=\"ico\"><img src=\"assets/x.gif\" class=\"unit uhero\" title=\"";
    echo troop_hero;
    echo "\" alt=\"";
    echo troop_hero;
    echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"desc\">";
    echo troop_hero;
    echo " (";
    echo level_lang2;
    echo " ";
    echo troop_hero;
    echo ")</td>\r\n\t\t\t\t\t\t\t<td class=\"value\"><input class=\"text\" type=\"text\" name=\"h_off_bonus1\" value=\"";
    if ( isset( $_POST['h_off_bonus1'] ) && 0 < intval( $_POST['h_off_bonus1'] ) )
    {
        echo intval( $_POST['h_off_bonus1'] );
    }
    echo "\" maxlength=\"4\" title=\"";
    echo troop_hero;
    echo " (";
    echo level_lang2;
    echo " ";
    echo troop_hero;
    echo ")\"></td>\r\n\t\t\t\t\t\t\t<td class=\"research\"></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t";
    if ( isset( $this->gameMetadata['items'][35]['for_tribe_id'][$tribeId] ) )
    {
        echo "\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td class=\"ico\"><img src=\"assets/x.gif\" class=\"unit ucata\" alt=\"";
        echo LANGUI_WARSN_T14;
        echo "\" title=\"";
        echo LANGUI_WARSN_T14;
        echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"desc\">";
        echo LANGUI_WARSN_T14;
        echo "</td>\r\n\t\t\t\t\t\t\t<td class=\"value\"><input class=\"text\" type=\"text\" name=\"kata\" value=\"";
        if ( isset( $_POST['kata'] ) && 0 < intval( $_POST['kata'] ) )
        {
            echo intval( $_POST['kata'] );
        }
        echo "\" maxlength=\"4\" title=\"";
        echo LANGUI_WARSN_T14;
        echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"research\"></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t";
    }
    echo "\t\t\t\t\t</tbody>\r\n\t\t\t\t</table>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<table id=\"defender\" class=\"fill_in\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr><th>";
    echo LANGUI_WARSN_T5;
    echo "</th></tr>\r\n\t</thead>\r\n\t";
    foreach ( $_POST['a2'] as $tribeId => $v )
    {
        echo "\t<tbody>\r\n\t\t<tr><th>";
        echo constant( "tribe_".$tribeId );
        echo "</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"details\">\r\n\t\t\t\t<table cellpadding=\"1\" cellspacing=\"1\">\r\n\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t";
        $_c = 0;
        foreach ( $this->troopsMetadata as $troopId => $troopMetadata )
        {
            if ( $troopMetadata['for_tribe_id'] != $tribeId )
            {
                continue;
            }
            ++$_c;
            echo "\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td class=\"ico\"><img src=\"assets/x.gif\" class=\"unit u";
            echo $troopId;
            echo "\" title=\"";
            echo constant( "troop_".$troopId );
            echo "\" alt=\"";
            echo constant( "troop_".$troopId );
            echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"desc\">";
            echo constant( "troop_".$troopId );
            echo "</td>\r\n\t\t\t\t\t\t\t<td class=\"value\"><input class=\"text\" type=\"text\" name=\"t2[";
            echo $tribeId;
            echo "][";
            echo $troopId;
            echo "]\" value=\"";
            if ( isset( $_POST['t2'], $_POST['t2'][$tribeId] ) && isset( $_POST['t2'][$tribeId][$troopId] ) && 0 < intval( $_POST['t2'][$tribeId][$troopId] ) )
            {
                echo intval( $_POST['t2'][$tribeId][$troopId] );
            }
            echo "\" maxlength=\"7\" title=\"";
            echo LANGUI_WARSN_T9;
            echo " ";
            echo constant( "troop_".$troopId );
            echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"research\">";
            if ( $tribeId != 4 && $_c <= 8 )
            {
                echo "<input class=\"text\" type=\"text\" name=\"f2[";
                echo $tribeId;
                echo "][";
                echo $troopId;
                echo "]\" value=\"";
                if ( isset( $_POST['f2'], $_POST['f2'][$tribeId] ) && isset( $_POST['f2'][$tribeId][$troopId] ) && 0 < intval( $_POST['f2'][$tribeId][$troopId] ) )
                {
                    echo intval( $_POST['f2'][$tribeId][$troopId] );
                }
                echo "\" maxlength=\"2\" title=\"";
                echo LANGUI_WARSN_T15;
                echo " ";
                echo constant( "troop_".$troopId );
                echo "\">";
            }
            echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t";
        }
        echo "\t\t\t\t\t</tbody>\r\n\t\t\t\t</table>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n\t";
    }
    echo "\t<tbody>\r\n\t\t<tr><th>";
    echo LANGUI_WARSN_T11;
    echo "</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"details\">\r\n\t\t\t\t<table cellpadding=\"1\" cellspacing=\"1\">\r\n\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td class=\"ico\"><img src=\"assets/x.gif\" class=\"unit uhab\" alt=\"";
    echo LANGUI_WARSN_T12;
    echo "\" title=\"";
    echo LANGUI_WARSN_T12;
    echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"desc\">";
    echo LANGUI_WARSN_T12;
    echo "</td>\r\n\t\t\t\t\t\t\t<td class=\"value\"><input class=\"text\" type=\"text\" name=\"ew2\" value=\"";
    if ( isset( $_POST['ew2'] ) && 0 < intval( $_POST['ew2'] ) )
    {
        echo intval( $_POST['ew2'] );
    }
    echo "\" maxlength=\"5\" title=\"";
    echo LANGUI_WARSN_T13;
    echo "\"></td>\r\n\t\t\t\t\t\t\t<td class=\"research\"></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t    <td class=\"ico\"><img src=\"assets/x.gif\" class=\"unit uwall\" alt=\"";
    echo LANGUI_WARSN_T16;
    echo "\" title=\"";
    echo LANGUI_WARSN_T16;
    echo "\"></td>\r\n\t\t\t\t\t\t    <td class=\"desc\">";
    echo LANGUI_WARSN_T16;
    echo "</td>\r\n\t\t\t\t\t\t    <td class=\"value\"><input class=\"text\" type=\"text\" name=\"wall1\" value=\"";
    if ( isset( $_POST['wall1'] ) && 0 < intval( $_POST['wall1'] ) )
    {
        echo intval( $_POST['wall1'] );
    }
    echo "\" maxlength=\"2\" title=\"";
    echo LANGUI_WARSN_T17;
    echo "\"></td>\r\n\t\t\t\t\t\t    <td class=\"research\"></td>\r\n\t\t\t\t    \t</tr>\r\n\t\t\t\t\t</tbody>\r\n\t\t\t\t</table>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<div class=\"clear\"></div>\r\n";
}
echo "<table id=\"select\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<td>";
echo LANGUI_WARSN_T2;
echo "</td>\r\n\t\t\t<td>";
echo LANGUI_WARSN_T5;
echo "</td>\r\n\t\t\t<td>";
echo LANGUI_WARSN_T6;
echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>\r\n\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"a1\" value=\"6\"";
if ( isset( $_POST['a1'] ) && intval( $_POST['a1'] ) == 6 )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_6;
echo "</label><br>\r\n\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"a1\" value=\"7\"";
if ( isset( $_POST['a1'] ) && intval( $_POST['a1'] ) == 7 )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_7;
echo "</label><br>\r\n\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"a1\" value=\"1\"";
if ( isset( $_POST['a1'] ) && intval( $_POST['a1'] ) == 1 )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_1;
echo "</label><br>\r\n\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"a1\" value=\"2\"";
if ( isset( $_POST['a1'] ) && intval( $_POST['a1'] ) == 2 )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_2;
echo "</label><br>\r\n\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"a1\" value=\"3\"";
if ( isset( $_POST['a1'] ) && intval( $_POST['a1'] ) == 3 )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_3;
echo "</label>\r\n\t\t\t</td>\r\n\t\t\t<td>\r\n\t\t\t\t<label><input class=\"check\" type=\"checkbox\" name=\"a2[6]\" value=\"1\"";
if ( isset( $_POST['a2'], $_POST['a2'][6] ) )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_6;
echo "</label><br>\r\n\t\t\t\t<label><input class=\"check\" type=\"checkbox\" name=\"a2[7]\" value=\"1\"";
if ( isset( $_POST['a2'], $_POST['a2'][7] ) )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_7;
echo "</label><br>\r\n\t\t\t\t<label><input class=\"check\" type=\"checkbox\" name=\"a2[1]\" value=\"1\"";
if ( isset( $_POST['a2'], $_POST['a2'][1] ) )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_1;
echo "</label><br>\r\n\t\t\t\t<label><input class=\"check\" type=\"checkbox\" name=\"a2[2]\" value=\"1\"";
if ( isset( $_POST['a2'], $_POST['a2'][2] ) )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_2;
echo "</label><br>\r\n\t\t\t\t<label><input class=\"check\" type=\"checkbox\" name=\"a2[3]\" value=\"1\"";
if ( isset( $_POST['a2'], $_POST['a2'][3] ) )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_3;
echo "</label><br>\r\n\t\t\t\t<label><input class=\"check\" type=\"checkbox\" name=\"a2[4]\" value=\"1\"";
if ( isset( $_POST['a2'], $_POST['a2'][4] ) )
{
    echo " checked=\"\"";
}
echo "> ";
echo tribe_4;
echo "</label>\r\n\t\t\t</td>\r\n\t\t\t<td>\r\n\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"ktyp\" value=\"1\"";
if ( isset( $_POST['ktyp'] ) && intval( $_POST['ktyp'] ) == 1 )
{
    echo " checked=\"\"";
}
echo "> ";
echo LANGUI_WARSN_T7;
echo "</label><br>\r\n\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"ktyp\" value=\"2\"";
if ( isset( $_POST['ktyp'] ) && intval( $_POST['ktyp'] ) == 2 )
{
    echo " checked=\"\"";
}
echo "> ";
echo LANGUI_WARSN_T8;
echo "</label><br>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<p class=\"btn\"><input type=\"image\" value=\"ok\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
echo text_okdone_lang;
echo "\"></p>\r\n";
if ( $this->errorText != "" )
{
    echo "<b><p class=\"error\">";
    echo $this->errorText;
    echo "</p></b>";
}
echo "</form>";
?>
