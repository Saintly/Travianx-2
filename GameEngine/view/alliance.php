<?php
require_once( LANG_UI_PATH."alliance.php" );
if ( !$this->hasAlliance )
{
    echo "<h1>";
    echo LANGUI_ALLIANCE_T1;
    echo "</h1>\r\n<p></p>\r\n<p>";
    echo LANGUI_ALLIANCE_T2;
    echo "</p>\r\n<p></p>\r\n";
}
else
{
    echo "<h1>";
    echo $this->allianceData['name'];
    echo " - ";
    echo $this->allianceData['name2'];
    echo "</h1>\r\n";
    if ( $this->fullView )
    {
        echo "<div id=\"textmenu\">\r\n   <a href=\"alliance.php\"";
        if ( $this->selectedTabIndex == 0 )
        {
            echo " class=\"selected\"";
        }
        echo ">";
        echo LANGUI_ALLIANCE_T3;
        echo "</a>\r\n";
        if ( $this->hasAllianceEditRole( ) )
        {
            echo " | <a href=\"alliance.php?t=1\"";
            if ( $this->selectedTabIndex == 1 )
            {
                echo " class=\"selected\"";
            }
            echo ">";
            echo LANGUI_ALLIANCE_T4;
            echo "</a>";
        }
        echo " | <a href=\"alliance.php?t=2\"";
        if ( $this->selectedTabIndex == 2 )
        {
            echo " class=\"selected\"";
        }
        echo ">";
        echo LANGUI_ALLIANCE_T5;
        echo "</a>\r\n | <a href=\"alliance.php?t=3\"";
        if ( $this->selectedTabIndex == 3 )
        {
            echo " class=\"selected\"";
        }
        echo ">";
        echo LANGUI_ALLIANCE_T6;
        echo "</a>\r\n</div>\r\n";
    }
    echo "\r\n";
    if ( $this->selectedTabIndex == 0 )
    {
        echo "<s";
        echo "cript type=\"text/javascript\">\r\nfunction getMouseCoords(e) {\r\n\tvar coords = {};\r\n\tif (!e) var e = window.event;\r\n\tif (e.pageX || e.pageY) {\r\n\t\tcoords.x = e.pageX;\r\n\t\tcoords.y = e.pageY;\r\n\t} else if (e.clientX || e.clientY) {\r\n\t\tcoords.x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;\r\n\t\tcoords.y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop";
        echo ";\r\n\t}\r\n\r\n\treturn coords;\r\n}\r\nfunction med_mouseMoveHandler(e, desc_string) {\r\n\tvar coords = getMouseCoords(e);\r\n\tvar layer = _(\"medal_mouseover\");\r\n\tlayer.style.top = (coords.y + 25) + \"px\";\r\n\tlayer.style.left = (coords.x - 20) + \"px\";\r\n\tlayer.className = \"\";\r\n\tlayer.innerHTML  = desc_string;\r\n}\r\nfunction med_closeDescription(){\r\n\tvar layer = _(\"medal_mouseover\");\r\n\tlayer.className = \"hide\";\r\n}\r\n\r";
        echo "\nlayer = document.createElement(\"div\");\r\nlayer.id = \"medal_mouseover\";\r\nlayer.className = \"hide\";\r\ndocument.body.appendChild(layer);\r\n</script>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"profile\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
        echo LANGUI_ALLIANCE_T7;
        echo "</th></tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
        echo LANGUI_ALLIANCE_T8;
        echo ":</td>\r\n\t\t\t<td>";
        echo LANGUI_ALLIANCE_T9;
        echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr><td class=\"empty\"></td><td class=\"empty\"></td></tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"details\">\r\n\t\t\t\t<table cellpadding=\"0\" cellspacing=\"0\">\r\n\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<th>";
        echo LANGUI_ALLIANCE_T10;
        echo ":</th>\r\n\t\t\t\t\t\t\t<td>";
        echo $this->allianceData['name'];
        echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<th>";
        echo LANGUI_ALLIANCE_T11;
        echo ":</th>\r\n\t\t\t\t\t\t\t<td>";
        echo $this->allianceData['name2'];
        echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<th>";
        echo LANGUI_ALLIANCE_T12;
        echo ":</th>\r\n\t\t\t\t\t\t\t<td>";
        echo $this->allianceData['rank'];
        echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<th>";
        echo LANGUI_ALLIANCE_T13;
        echo ":</th>\r\n\t\t\t\t\t\t\t<td>";
        echo $this->allianceData['rating'];
        echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<th>";
        echo LANGUI_ALLIANCE_T14;
        echo ":</th>\r\n\t\t\t\t\t\t\t<td>";
        echo $this->allianceData['player_count'];
        echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\n\t\t\t\t\t\t";
        foreach ( $this->allianceData['players'] as $player )
        {
            if ( trim( $player['alliance_roles'] ) == "" )
            {
                continue;
            }
            $roleName = explode( " ", trim( $player['alliance_roles'] ), 2 );
            $roleNumber = explode( " ", trim( $player['alliance_roles'] ), 2 );
            
            list( $roleNumber, $roleName ) = $roleNumber;            
            $roleName = trim( $roleName );
            if ( $roleName == "" || $roleName == "." )
            {
                continue;
            }
            echo "\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<th>";
            echo $roleName;
            echo "</th>\r\n\t\t\t\t\t\t\t<td><a href=\"profile.php?uid=";
            echo $player['id'];
            echo "\">";
            echo $player['name'];
            echo "</a></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t";
        }
        echo "\t\t\t\t\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\n\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td class=\"desc2\" colspan=\"2\">";
        echo $this->getAllianceDescription( $this->allianceData['description2'] );
        echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t</tbody>\r\n\t\t\t\t</table>\r\n\t\t\t</td>\r\n\t\t\t<td class=\"desc1\">";
        echo $this->getAllianceDescription( $this->allianceData['description1'] );
        echo "</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n";
        echo "<s";
        echo "cript type=\"text/javascript\">\r\nfunction confirmDel () { return confirm (\"";
        echo LANGUI_ALLIANCE_T15;
        echo "\"); }\r\n\r\nfunction showAllianceRole(uid) {\r\n\tp = document.getElementById(\"ce\");\r\n\tif (p!=null) {\r\n\t\tp.innerHTML = '<div id=\"_pwin\" class=\"popup3\"><div id=\"drag\" onmousedown=\"dragStart(event, \\'_pwin\\')\"></div><a href=\"#\" onClick=\"hideManual(); return false;\"><img src=\"assets/x.gif\" border=\"1\" class=\"popup4\" alt=\"Move\"></a><iframe frameborder=\"0\" id=\"Frame\" src=\"alliancerole.php?uid='+uid+'\" width=\"412\" he";
        echo "ight=\"440\" border=\"0\"></iframe></div>';\r\n\t}\r\n\r\n\treturn false;\r\n}\r\n</script>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"member\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th>&nbsp;</th>\r\n\t\t\t<th>";
        echo LANGUI_ALLIANCE_T16;
        echo "</th>\r\n\t\t\t<th>";
        echo LANGUI_ALLIANCE_T17;
        echo "</th>\r\n\t\t\t<th>";
        echo LANGUI_ALLIANCE_T18;
        echo "</th>\r\n\t\t\t";
        if ( $this->fullView )
        {
            echo "<th>&nbsp;</th>";
            if ( $this->hasAllianceRemovePlayerRole( ) )
            {
                echo "<th>&nbsp;</th>";
            }
            if ( $this->hasAllianceSetRoles( ) )
            {
                echo "<th>&nbsp;</th>";
            }
        }
        echo "\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
        $_c = 1;
        foreach ( $this->allianceData['players'] as $player )
        {
            echo "\t\t<tr>\r\n\t\t\t<td class=\"ra\">";
            echo $_c++;
            echo ".</td>\r\n\t\t\t<td class=\"pla\"><a href=\"profile.php?uid=";
            echo $player['id'];
            echo "\">";
            echo $player['name'];
            echo "</a></td>\r\n\t\t\t<td class=\"hab\">";
            echo $player['total_people_count'];
            echo "</td>\r\n\t\t\t<td class=\"vil\">";
            echo $player['villages_count'];
            echo "</td>\r\n\t\t\t";
            if ( $this->fullView )
            {
                echo "\t\t\t<td class=\"on\">";
                echo $this->getOnlineStatus( $player['lastLoginFromHours'] );
                echo "</td>\r\n\t\t\t";
                if ( $this->hasAllianceRemovePlayerRole( ) )
                {
                    echo "\t\t\t<td class=\"on\">";
                    if ( $player['id'] != $this->player->playerId )
                    {
                        echo "<a onclick=\"return confirmDel();\" href=\"alliance.php?d=";
                        echo $player['id'];
                        echo "\"><img class=\"del\" src=\"assets/x.gif\" alt=\"";
                        echo LANGUI_ALLIANCE_T19;
                        echo "\" title=\"";
                        echo LANGUI_ALLIANCE_T19;
                        echo "\"></a>";
                    }
                    echo "</td>\r\n\t\t\t";
                }
                echo "\t\t\t";
                if ( $this->hasAllianceSetRoles( ) )
                {
                    echo "\t\t\t<td class=\"on\"><a href=\"#\" onclick=\"return showAllianceRole(";
                    echo $player['id'];
                    echo ");\"><img class=\"def_c\" src=\"assets/x.gif\" alt=\"";
                    echo LANGUI_ALLIANCE_T20;
                    echo "\" title=\"";
                    echo LANGUI_ALLIANCE_T20;
                    echo "\"></a></td>\r\n\t\t\t";
                }
                echo "\t\t\t\r\n\t\t\t";
            }
            echo "\t\t</tr>\r\n\t\t";
        }
        echo "\t</tbody>\r\n</table>\r\n";
    }
    else if ( $this->selectedTabIndex == 1 )
    {
        echo "<form action=\"alliance.php?t=";
        echo $this->selectedTabIndex;
        echo "\" method=\"post\">\r\n\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"edit\" class=\"vip\">\r\n\t\t<thead>\r\n\t\t\t<tr><th colspan=\"3\">";
        echo LANGUI_ALLIANCE_T7;
        echo "</th></tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td colspan=\"2\">";
        echo LANGUI_ALLIANCE_T8;
        echo ":</td>\r\n\t\t\t\t<td>";
        echo LANGUI_ALLIANCE_T9;
        echo ":</td>\r\n\t\t\t</tr>\r\n\t\t</thead>\r\n\t\t<tbody>\r\n\t\t\t<tr><td colspan=\"2\" class=\"empty\"></td><td class=\"empty\"></td></tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<th>";
        echo LANGUI_ALLIANCE_T10;
        echo ":</th>\r\n\t\t\t\t<td class=\"birth\"><input tabindex=\"1\" class=\"text day\" type=\"text\" name=\"aname1\" value=\"";
        echo htmlspecialchars( $this->allianceData['name'] );
        echo "\" maxlength=\"8\"></td>\r\n\t\t\t\t<td rowspan=\"4\" class=\"desc1\"><textarea tabindex=\"7\" name=\"be1\">";
        echo $this->allianceData['description1'];
        echo "</textarea></td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<th>";
        echo LANGUI_ALLIANCE_T11;
        echo ":</th>\r\n\t\t\t\t<td class=\"gend\"><input tabindex=\"1\" class=\"text day\" type=\"text\" name=\"aname2\" value=\"";
        echo htmlspecialchars( $this->allianceData['name2'] );
        echo "\" maxlength=\"25\"></td>\r\n\t\t\t</tr>\r\n\t\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\n\t\t\t<tr ><td colspan=\"2\"><textarea tabindex=\"8\" name=\"be2\" rows=\"15\" cols=\"42\">";
        echo $this->allianceData['description2'];
        echo "</textarea></td></tr>\r\n\t\t</tbody>\r\n\t</table>\r\n\r\n\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"medals\">\r\n\t\t<thead>\r\n\t\t\t<tr><th colspan=\"4\">";
        echo LANGUI_ALLIANCE_T21;
        echo "</th></tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td>";
        echo LANGUI_ALLIANCE_T22;
        echo "</td>\r\n\t\t\t\t<td>";
        echo LANGUI_ALLIANCE_T23;
        echo "</td>\r\n\t\t\t\t<td>";
        echo LANGUI_ALLIANCE_T24;
        echo "</td>\r\n\t\t\t\t<td>";
        echo LANGUI_ALLIANCE_T25;
        echo "</td>\r\n\t\t\t</tr>\r\n\t\t</thead>\r\n\t\t<tbody>\r\n\t\t\t";
        if ( trim( $this->allianceData['medals'] ) != "" )
        {
            $medals = explode( ",", $this->allianceData['medals'] );
            foreach ( $medals as $medal )
            {
                $week = explode( ":", $medal );
                $rank = explode( ":", $medal );
                $index = explode( ":", $medal );
                list( $index, $rank, $week ) = $index;                
                if ( !isset( $this->gameMetadata['medals'][$index] ) )
                {
                    continue;
                }
                $medalData = $this->gameMetadata['medals'][$index];
                if ( $index == 0 )
                {
                    $rank = 1;
                }
                echo "\t\t\t<tr>\r\n\t\t\t   <td class=\"typ\">";
                echo constant( "medal_row_".$medalData['textIndex'] );
                echo "</td>\r\n\t\t\t   <td class=\"ra\">";
                echo $rank;
                echo "</td>\r\n\t\t\t   <td class=\"we\">";
                echo $week;
                echo "</td>\r\n\t\t\t   <td class=\"bb\">[#";
                echo intval( $medalData['BBCode'] ) + intval( $week ) * 10 + ( intval( $rank ) - 1 );
                echo "]</td>\r\n\t\t\t</tr>\r\n\t\t\t";
            }
        }
        echo "\t\t</tbody>\r\n\t</table>\r\n\t<p class=\"btn\"><input type=\"image\" value=\"\" tabindex=\"9\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
        echo text_okdone_lang;
        echo "\"></p>\r\n</form>\r\n";
    }
    else if ( $this->selectedTabIndex == 2 )
    {
        echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"offs\">\r\n\t<thead>\r\n\t\t<tr>\r\n\t\t\t<th colspan=\"4\">\r\n\t\t\t\t";
        echo LANGUI_ALLIANCE_T26;
        echo "\t\t\t\t<div id=\"submenu\">\r\n\t\t\t\t\t<a href=\"alliance.php?t=2";
        echo isset( $_GET['ac'] ) && $_GET['ac'] == 2 ? "" : "&ac=2";
        echo "\"><img src=\"assets/x.gif\" class=\"btn_def";
        if ( isset( $_GET['ac'] ) && $_GET['ac'] == 2 )
        {
            echo " active";
        }
        echo "\" alt=\"";
        echo LANGUI_ALLIANCE_T27;
        echo "\" title=\"";
        echo LANGUI_ALLIANCE_T27;
        echo "\"></a>\r\n\t\t\t\t\t<a href=\"alliance.php?t=2";
        echo isset( $_GET['ac'] ) && $_GET['ac'] == 1 ? "" : "&ac=1";
        echo "\"><img src=\"assets/x.gif\" class=\"btn_off";
        if ( isset( $_GET['ac'] ) && $_GET['ac'] == 1 )
        {
            echo " active";
        }
        echo "\" alt=\"";
        echo LANGUI_ALLIANCE_T28;
        echo "\" title=\"";
        echo LANGUI_ALLIANCE_T28;
        echo "\"></a>\r\n\t\t\t\t</div>\r\n\t\t\t</th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>";
        echo LANGUI_ALLIANCE_T16;
        echo "</td>\r\n\t\t\t<td>";
        echo LANGUI_ALLIANCE_T7;
        echo "</td>\r\n\t\t\t<td>";
        echo LANGUI_ALLIANCE_T29;
        echo "</td>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
        $_c = 0;
        while ( $this->lastReports->next( ) )
        {
            ++$_c;
            $isAttack = $this->lastReports->row['isAttack'];
            $rptRelativeResult = ReportHelper::getreportresultrelative( $this->lastReports->row['rpt_result'], $isAttack );
            $btext = ReportHelper::getreportresulttext( $rptRelativeResult );
            $_rptResultCss = $rptRelativeResult == 100 ? 10 : $rptRelativeResult;
            echo "\t\t<tr>\r\n\t\t\t<td class=\"sub\">\r\n\t\t\t\t<img src=\"assets/x.gif\" class=\"iReport iReport";
            echo $_rptResultCss;
            echo "\" alt=\"";
            echo $btext;
            echo "\" title=\"";
            echo $btext;
            echo "\">\r\n\t\t\t\t<div><a href=\"report.php?id=";
            echo $this->lastReports->row['id'];
            echo "\">";
            echo $this->lastReports->row['from_player_name'];
            echo ReportHelper::getreportactiontext( $this->lastReports->row['rpt_cat'] );
            echo $this->lastReports->row['to_player_name'];
            echo "</a></div>\r\n\t\t\t</td>\r\n\t\t\t<td class=\"al\">\r\n\t\t\t";
            $targetPlayerId = $this->isMemberOfAlliance( $this->lastReports->row['from_player_id'] ) ? $this->lastReports->row['to_player_id'] : $this->lastReports->row['from_player_id'];
            $aData = $this->getAllianceDataFor( $targetPlayerId );
            echo "\t\t\t";
            if ( $aData != NULL && 0 < intval( $aData['alliance_id'] ) )
            {
                echo "<a href=\"alliance.php?id=";
                echo $aData['alliance_id'];
                echo "\">";
                echo $aData['alliance_name'];
                echo "</a>";
            }
            else
            {
                echo "-";
            }
            echo "\t\t\t</td>\r\n\t\t\t<td class=\"dat\">";
            echo $this->lastReports->row['mdate'];
            echo "</td>\r\n\t\t</tr>\r\n\t\t";
        }
        echo "\t\t";
        if ( $_c == 0 )
        {
            echo "\t\t<tr class=\"none\"><td colspan=\"4\">";
            echo LANGUI_ALLIANCE_T30;
            echo "</td></tr>\r\n\t\t";
        }
        echo "\t</tbody>\r\n</table>\r\n";
    }
    else if ( $this->selectedTabIndex == 3 )
    {
        if ( !isset( $_GET['a'] ) )
        {
            echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"options\" class=\"small_option\">\r\n\t<thead>\r\n\t\t<tr><th>";
            echo LANGUI_ALLIANCE_T6;
            echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
            if ( $this->hasAllianceInviteRoles( ) )
            {
                echo "<tr><td class=\"val\"><a href=\"alliance.php?t=";
                echo $this->selectedTabIndex;
                echo "&a=1\">";
                echo LANGUI_ALLIANCE_T31;
                echo "</a></td></tr>";
            }
            echo "\t\t";
            if ( $this->hasAllianceEditContractRole( ) )
            {
                echo "<tr><td class=\"val\"><a href=\"alliance.php?t=";
                echo $this->selectedTabIndex;
                echo "&a=2\">";
                echo LANGUI_ALLIANCE_T32;
                echo "</a></td></tr>";
            }
            echo "\t\t<tr><td class=\"val\"><a href=\"alliance.php?t=";
            echo $this->selectedTabIndex;
            echo "&a=3\">";
            echo LANGUI_ALLIANCE_T33;
            echo "</a></td></tr>\r\n\t</tbody>\r\n</table>\r\n";
        }
        else
        {
            echo "<form action=\"alliance.php?t=";
            echo $this->selectedTabIndex;
            echo "&a=";
            echo $_GET['a'];
            echo "\" method=\"post\">\r\n";
            if ( intval( $_GET['a'] ) == 3 )
            {
                echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"quit\" class=\"small_option\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
                echo LANGUI_ALLIANCE_T33;
                echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr><td colspan=\"2\" class=\"info\">";
                echo LANGUI_ALLIANCE_T34;
                echo "</td></tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
                echo LANGUI_ALLIANCE_T35;
                echo ":</th>\r\n\t\t\t<td><input class=\"pass text\" type=\"password\" name=\"pw\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<p><input type=\"image\" value=\"ok\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
                echo text_okdone_lang;
                echo "\"></p>\r\n";
                if ( $this->hasErrors )
                {
                    echo "<p class=\"error\">";
                    echo LANGUI_ALLIANCE_T36;
                    echo "</p>";
                }
            }
            else if ( intval( $_GET['a'] ) == 2 )
            {
                echo "\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"diplomacy\" class=\"dipl\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\"> ";
                echo LANGUI_ALLIANCE_T37;
                echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
                echo LANGUI_ALLIANCE_T7;
                echo "</th>\r\n\t\t\t<td><input class=\"ally text\" type=\"text\" name=\"a_name\" maxlength=\"8\"></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"hint\" class=\"infos\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
                echo LANGUI_ALLIANCE_T38;
                echo ":</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr><td colspan=\"2\">";
                echo LANGUI_ALLIANCE_T39;
                echo "</td></tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<div id=\"box\">\r\n\t<p><input type=\"image\" value=\"ok\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
                echo text_okdone_lang;
                echo "\"></p>\r\n\t";
                if ( $this->isPost( ) && !$this->hasErrors )
                {
                    echo "<p class=\"error\">";
                    echo LANGUI_ALLIANCE_T40;
                    echo " ";
                    echo trim( $_POST['a_name'] );
                    echo ".</p>";
                }
                echo "</div>\r\n<div class=\"clear\"></div>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"own\" class=\"dipl\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"3\">";
                echo LANGUI_ALLIANCE_T41;
                echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
                $_c = 0;
                foreach ( $this->contracts as $aid => $status )
                {
                    if ( $status != 1 )
                    {
                        continue;
                    }
                    ++$_c;
                    echo "\t\t<tr>\r\n\t\t\t<td class=\"abo\"><a href=\"alliance.php?t=";
                    echo $this->selectedTabIndex;
                    echo "&a=";
                    echo $_GET['a'];
                    echo "&d=";
                    echo $aid;
                    echo "\"><img class=\"del\" src=\"assets/x.gif\" alt=\"";
                    echo LANGUI_ALLIANCE_T42;
                    echo "\" title=\"";
                    echo LANGUI_ALLIANCE_T42;
                    echo "\"></a></td>\r\n\t\t\t<td><a href=\"alliance.php?id=";
                    echo $aid;
                    echo "\">";
                    echo LANGUI_ALLIANCE_T43;
                    echo " ";
                    echo $this->getAllianceName( $aid );
                    echo "</a></td>\r\n\t\t\t<td class=\"wait\">";
                    echo LANGUI_ALLIANCE_T44;
                    echo "</td>\r\n\t\t</tr>\r\n\t\t";
                }
                echo "\t\t";
                if ( $_c == 0 )
                {
                    echo "\t\t<tr><td colspan=\"3\" class=\"none\">";
                    echo LANGUI_ALLIANCE_T45;
                    echo "</td></tr>\r\n\t\t";
                }
                echo "\t</tbody>\r\n</table>\r\n\t\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"tip\" class=\"infos\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
                echo LANGUI_ALLIANCE_T46;
                echo ":</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr><td colspan=\"2\">";
                echo LANGUI_ALLIANCE_T47;
                echo " ";
                echo "<s";
                echo "pan class=\"e\">[contracts]</span>&nbsp; ";
                echo LANGUI_ALLIANCE_T48;
                echo ". </td></tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"foreign\" class=\"dipl\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"3\">";
                echo LANGUI_ALLIANCE_T49;
                echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
                $_c = 0;
                foreach ( $this->contracts as $aid => $status )
                {
                    if ( $status != 2 )
                    {
                        continue;
                    }
                    ++$_c;
                    echo "\t\t<tr>\r\n\t\t\t<td class=\"abo\"><a href=\"alliance.php?t=";
                    echo $this->selectedTabIndex;
                    echo "&a=";
                    echo $_GET['a'];
                    echo "&d=";
                    echo $aid;
                    echo "\"><img class=\"del\" src=\"assets/x.gif\" alt=\"";
                    echo LANGUI_ALLIANCE_T42;
                    echo "\" title=\"";
                    echo LANGUI_ALLIANCE_T42;
                    echo "\"></a></td>\r\n\t\t\t<td><a href=\"alliance.php?id=";
                    echo $aid;
                    echo "\">";
                    echo LANGUI_ALLIANCE_T43;
                    echo " ";
                    echo $this->getAllianceName( $aid );
                    echo "</a></td>\r\n\t\t\t<td class=\"wait\"><a href=\"alliance.php?t=";
                    echo $this->selectedTabIndex;
                    echo "&a=";
                    echo $_GET['a'];
                    echo "&c=";
                    echo $aid;
                    echo "\">";
                    echo LANGUI_ALLIANCE_T50;
                    echo "</a></td>\r\n\t\t</tr>\r\n\t\t";
                }
                echo "\t\t";
                if ( $_c == 0 )
                {
                    echo "\t\t<tr><td colspan=\"3\" class=\"none\">";
                    echo LANGUI_ALLIANCE_T45;
                    echo "</td></tr>\r\n\t\t";
                }
                echo "\t</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"existing\" class=\"dipl\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
                echo LANGUI_ALLIANCE_T51;
                echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
                $_c = 0;
                foreach ( $this->contracts as $aid => $status )
                {
                    if ( $status != 0 )
                    {
                        continue;
                    }
                    ++$_c;
                    echo "\t\t<tr>\r\n\t\t\t<td class=\"abo\"><a href=\"alliance.php?t=";
                    echo $this->selectedTabIndex;
                    echo "&a=";
                    echo $_GET['a'];
                    echo "&d=";
                    echo $aid;
                    echo "\"><img class=\"del\" src=\"assets/x.gif\" alt=\"";
                    echo LANGUI_ALLIANCE_T42;
                    echo "\" title=\"";
                    echo LANGUI_ALLIANCE_T42;
                    echo "\"></a></td>\r\n\t\t\t<td colspan=\"2\"><a href=\"alliance.php?id=";
                    echo $aid;
                    echo "\">";
                    echo LANGUI_ALLIANCE_T43;
                    echo " ";
                    echo $this->getAllianceName( $aid );
                    echo "</a></td>\r\n\t\t</tr>\r\n\t\t";
                }
                echo "\t\t";
                if ( $_c == 0 )
                {
                    echo "\t\t<tr><td colspan=\"3\" class=\"none\">";
                    echo LANGUI_ALLIANCE_T45;
                    echo "</td></tr>\r\n\t\t";
                }
                echo "\t</tbody>\r\n</table>\r\n\r\n";
            }
            else if ( intval( $_GET['a'] ) == 1 )
            {
                echo "<table cellpadding=\"1\" cellspacing=\"1\" id=\"invite\" class=\"small_option\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
                echo LANGUI_ALLIANCE_T31;
                echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<th>";
                echo LANGUI_ALLIANCE_T11;
                echo ":</th>\r\n\t\t\t<td><input class=\"name text\" type=\"text\" name=\"a_name\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<p><input type=\"image\" value=\"ok\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
                echo text_okdone_lang;
                echo "\"></p>\r\n\r\n";
                if ( $this->invitesResult == 1 )
                {
                    echo "<p class=\"error\">";
                    echo LANGUI_ALLIANCE_T52;
                    echo " ";
                    echo $_POST['a_name'];
                    echo "</p>\r\n";
                }
                else if ( $this->invitesResult == 2 )
                {
                    echo "<p class=\"error\">";
                    echo LANGUI_ALLIANCE_T53;
                    echo " ";
                    echo $_POST['a_name'];
                    echo "</p>\r\n";
                }
                echo "\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"invitations\" class=\"small_option\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
                echo LANGUI_ALLIANCE_T54;
                echo ":</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
                $_c = 0;
                foreach ( $this->allianceData['players_invites'] as $pid => $pname )
                {
                    ++$_c;
                    echo "\t\t<tr>\r\n\t\t\t<td class=\"abo\"><a href=\"alliance.php?t=";
                    echo $this->selectedTabIndex;
                    echo "&a=";
                    echo $_GET['a'];
                    echo "&d=";
                    echo $pid;
                    echo "\"><img class=\"del\" src=\"assets/x.gif\" alt=\"";
                    echo LANGUI_ALLIANCE_T42;
                    echo "\" title=\"";
                    echo LANGUI_ALLIANCE_T42;
                    echo "\"></a></td>\r\n\t\t\t<td><a href=\"profile.php?uid=";
                    echo $pid;
                    echo "\">";
                    echo LANGUI_ALLIANCE_T55;
                    echo " ";
                    echo $pname;
                    echo "</a></td>\r\n\t\t</tr>\r\n\t\t";
                }
                echo "\t\t";
                if ( $_c == 0 )
                {
                    echo "\t\t\t<tr><td colspan=\"2\" class=\"none\">";
                    echo LANGUI_ALLIANCE_T45;
                    echo "</td></tr>\r\n\t\t";
                }
                echo "\t</tbody>\r\n</table>\r\n";
            }
            echo "</form>\r\n";
        }
    }
}