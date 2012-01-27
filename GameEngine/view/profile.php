<?php
require_once(LANG_UI_PATH."profile.php");
echo '<h1>'.LANGUI_PROFILE_T1.'</h1><br />';

if($this->fullView){echo '
	<div id="textmenu">
		<a href="profile.php" '.(($this->selectedTabIndex == 0)? 'class="selected"':'').'>'.LANGUI_PROFILE_T2.'</a> | 
		<a href="profile.php?t=1" '.(($this->selectedTabIndex == 1) ? 'class="selected"':'').'>'.LANGUI_PROFILE_T3.'</a> | 
		<a href="profile.php?t=2" '.(($this->selectedTabIndex == 2) ? 'class="selected"':'').'>'.LANGUI_PROFILE_T4.'</a> | 
		<a href="profile.php?t=3" '.(($this->selectedTabIndex == 3) ? 'class="selected"':'').'>'.LANGUI_PROFILE_T5.'</a>';
		if($this->data['player_type'] != PLAYERTYPE_TATAR ){
			echo ' | <a href="profile.php?t=4"'.(($this->selectedTabIndex == 4) ? 'class="selected"':'').'>'.LANGUI_PROFILE_T6.'</a>';
		}echo '
	</div>';
}
echo '<br />';

if($this->selectedTabIndex == 0){echo '
	<script type="text/javascript">
		function getMouseCoords(e) {
			var coords = {};
			if (!e) var e = window.event;
			if (e.pageX || e.pageY) {
				coords.x = e.pageX;
				coords.y = e.pageY;
			}
			else if (e.clientX || e.clientY) {
				coords.x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
				coords.y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
			}
			return coords;
		}
		function med_mouseMoveHandler(e, desc_string) {
			var coords = getMouseCoords(e);
			var layer = _("medal_mouseover");
			layer.style.top = (coords.y + 25) + "px";
			layer.style.left = (coords.x - 20) + "px";
			layer.className = "";
			layer.innerHTML  = desc_string;
		}
		function med_closeDescription(){
			var layer = _("medal_mouseover");
			layer.className = "hide";
		}
		layer = document.createElement("div");
		layer.id = "medal_mouseover";
		layer.className = "hide";
		document.body.appendChild(layer);
	</script>
	<table id="profile" cellpadding="1" cellspacing="1">
		<thead>
			<tr>
				<th colspan="2">'.LANGUI_PROFILE_T7.' '.$this->profileData['name'].' '.((isset($this->profileData['is_blocked']) && $this->profileData['is_blocked'] == 1)? '<font color="#990000">'.LANGUI_PROFILE_T70.'</font>':'').'</th>
			</tr>
			<tr>
				<td>'.LANGUI_PROFILE_T8.' :</td>
				<td>'.LANGUI_PROFILE_T9.' :</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="empty"></td>
				<td class="empty"></td>
			</tr>
			<tr>
				<td class="details">
					<table cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<th>'.LANGUI_PROFILE_T10.' :</th>
								<td>'./*$this->profileData['rank']*/LANGUI_PROFILE_T10.'</td>
							</tr>
							<tr>
								<th>'.LANGUI_PROFILE_T11.' :</th>
								<td>'.constant("tribe_".$this->profileData['tribe_id']).'</td>
							</tr>
							<tr>
								<th>'.LANGUI_PROFILE_T12.' :</th>
								<td>'.((0 < intval($this->profileData['alliance_id'])) ? '<a href="alliance.php?id='.$this->profileData['alliance_id'].'">'.$this->profileData['alliance_name'].'</a>' : '-').'</td>
							</tr>
							<tr>
								<th>'.LANGUI_PROFILE_T13.'</th>
								<td>'.$this->villagesCount.'</td>
							</tr>
							<tr>
								<th>'.LANGUI_PROFILE_T14.' :</th>
								<td>'.$this->profileData['total_people_count'].'</td>
							</tr>';
							if(0 < $this->profileData['age']){echo '
							<tr>
								<th>'.LANGUI_PROFILE_T15.' :</th>
								<td>'.$this->profileData['age'].'</td>
							</tr>';
							}
							if(0 < $this->profileData['gender']){
								echo "\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<th>";
        echo LANGUI_PROFILE_T16;
        echo ":</th>\r\n\t\t\t\t\t\t<td>";
        echo $this->profileData['gender'] == 1 ? LANGUI_PROFILE_T17 : LANGUI_PROFILE_T18;
        echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t";
    }
    echo "\t\t\t\t\t";
    if ( $this->profileData['house_name'] != "" )
    {
        echo "\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<th>";
        echo LANGUI_PROFILE_T19;
        echo ":</th>\r\n\t\t\t\t\t\t<td>";
        echo $this->profileData['house_name'];
        echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t";
    }
    echo "\t\t\t\t\t";
    if ( $this->profileData['tribe_id'] != 5 )
    {
        echo "\t\t\t\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td colspan=\"2\"> ";
        if ( !$this->player->isAgent )
        {
            if ( $this->fullView )
            {
                echo "<a href=\"profile.php?t=1\">";
                echo LANGUI_PROFILE_T20;
                echo "</a>";
            }
            else
            {
                echo "<a href=\"msg.php?uid=";
                echo $this->profileData['id'];
                echo "\">";
                echo LANGUI_PROFILE_T21;
                echo "</a>";
            }
        }
        echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t";
    }
    echo "\t\t\t\t\t";
    if ( $this->isAdmin && $this->player->playerId != $this->profileData['id'] )
    {
        echo "\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td colspan=\"2\"><a href=\"profile.php?spy&uid=";
        echo $this->profileData['id'];
        echo "\">";
        echo LANGUI_PROFILE_T22;
        echo "</a></td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t";
    }
    echo "\t\t\t\t\t";
    if ( $this->profileData['tribe_id'] != 5 )
    {
        echo "                    <tr>\r\n\t\t\t\t\t\t<td colspan=\"2\"><a href=\"snprofile.php?uid=";
        echo $this->profileData['id'];
        echo "\">";
        echo LANGUI_PROFILE_T72;
        echo "</a></td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t";
    }
    echo "\t\t\t\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td colspan=\"2\" class=\"desc2\"><div class=\"desc2div\">";
    echo $this->getProfileDescription( $this->profileData['description2'] );
    echo "</div></td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t</tbody>\r\n\t\t\t\t</table>\r\n\t\t\t</td>\r\n\t\t\t<td class=\"desc1\"><div>";
    echo $this->getProfileDescription( $this->profileData['description1'] );
    echo "</div></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"villages\">\r\n\t<thead>\r\n\t<tr><th colspan=\"3\">";
    echo LANGUI_PROFILE_T13;
    echo "</th></tr>\r\n\t<tr>\r\n\t\t<td>";
    echo LANGUI_PROFILE_T23;
    echo "</td>\r\n\t\t<td>";
    echo LANGUI_PROFILE_T14;
    echo "</td>\r\n\t\t<td>";
    echo LANGUI_PROFILE_T24;
    echo "</td>\r\n\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t";
    while ( $this->villages->next( ) )
    {
        echo "\t\t<tr>\r\n\t\t\t<td class=\"nam\"><a href=\"village3.php?id=";
        echo $this->villages->row['id'];
        echo "\">";
        echo $this->villages->row['village_name'];
        echo "</a>";
        if ( $this->villages->row['is_capital'] )
        {
            echo " ";
            echo "<s";
            echo "pan class=\"none3\">(";
            echo LANGUI_PROFILE_T25;
            echo ")</span>";
        }
        echo "</td>\r\n\t\t\t<td class=\"hab\">";
        echo $this->villages->row['people_count'];
        echo "</td>\r\n\t\t\t<td class=\"aligned_coords\"><div class=\"cox\">(";
        echo $this->villages->row['rel_x'];
        echo "</div><div class=\"pi\">|</div><div class=\"coy\">";
        echo $this->villages->row['rel_y'];
        echo ")</div></td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo "\t</tbody>\r\n</table>\r\n\r\n";
}
else if ( $this->selectedTabIndex == 1 )
{
    echo "<form action=\"profile.php\" enctype=\"multipart/form-data\" method=\"POST\">\r\n\t<input type=\"hidden\" name=\"e\" value=\"1\" />\r\n\t<input type=\"hidden\" name=\"oldavatar\" value=\"";
    echo htmlspecialchars( $this->profileData['avatar'] );
    echo "\" />\r\n\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"edit\" class=\"vip\">\r\n\t\t<thead>\r\n\t\t\t<tr>\r\n\t\t\t\t<th colspan=\"3\">";
    echo LANGUI_PROFILE_T7;
    echo " ";
    echo $this->profileData['name'];
    echo "</th>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td colspan=\"2\">";
    echo LANGUI_PROFILE_T8;
    echo ":</td>\r\n\t\t\t\t<td>";
    echo LANGUI_PROFILE_T9;
    echo ":</td>\r\n\t\t\t</tr>\r\n\t\t</thead>\r\n\t\t<tbody>\r\n\t\t\t<tr>\r\n\t\t\t\t<td colspan=\"2\" class=\"empty\"></td><td class=\"empty\"></td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<th>";
    echo LANGUI_PROFILE_T26;
    echo ":</th>\r\n\t\t\t\t<td class=\"birth\">\r\n\t\t\t\t\t<input tabindex=\"3\" type=\"text\" name=\"jahr\" value=\"";
    if ( 0 < $this->birthDate['year'] )
    {
        echo $this->birthDate['year'];
    }
    echo "\" maxlength=\"4\" class=\"text year\">\r\n\t\t\t\t\t";
    echo "<s";
    echo "elect tabindex=\"2\" name=\"monat\" size=\"0\" class=\"dropdown\">\r\n\t\t\t\t\t\t<option value=\"0\"></option>\r\n\t\t\t\t\t\t<option value=\"1\"";
    if ( $this->birthDate['month'] == 1 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T27;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"2\"";
    if ( $this->birthDate['month'] == 2 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T28;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"3\"";
    if ( $this->birthDate['month'] == 3 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T29;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"4\"";
    if ( $this->birthDate['month'] == 4 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T30;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"5\"";
    if ( $this->birthDate['month'] == 5 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T31;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"6\"";
    if ( $this->birthDate['month'] == 6 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T32;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"7\"";
    if ( $this->birthDate['month'] == 7 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T33;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"8\"";
    if ( $this->birthDate['month'] == 8 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T34;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"9\"";
    if ( $this->birthDate['month'] == 9 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T35;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"10\"";
    if ( $this->birthDate['month'] == 10 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T36;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"11\"";
    if ( $this->birthDate['month'] == 11 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T37;
    echo "</option>\r\n\t\t\t\t\t\t<option value=\"12\"";
    if ( $this->birthDate['month'] == 12 )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T38;
    echo "</option>\r\n\t\t\t\t\t</select>\r\n\t\t\t\t\t<input tabindex=\"1\" class=\"text day\" type=\"text\" name=\"tag\" value=\"";
    if ( 0 < $this->birthDate['day'] )
    {
        echo $this->birthDate['day'];
    }
    echo "\" maxlength=\"2\">\r\n\t\t\t\t</td>\r\n\t\t\t\t<td rowspan=\"8\" class=\"desc1\"><textarea tabindex=\"7\" name=\"be1\">";
    echo $this->profileData['description1'];
    echo "</textarea></td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<th>";
    echo LANGUI_PROFILE_T16;
    echo ":</th>\r\n\t\t\t\t<td class=\"gend\">\r\n\t\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"mw\" value=\"0\"";
    if ( $this->profileData['gender'] == 0 )
    {
        echo "  checked=\"\" tabindex=\"4\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T39;
    echo "</label>\r\n\t\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"mw\" value=\"1\"";
    if ( $this->profileData['gender'] == 1 )
    {
        echo "  checked=\"\" tabindex=\"4\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T40;
    echo "</label>\r\n\t\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"mw\" value=\"2\"";
    if ( $this->profileData['gender'] == 2 )
    {
        echo "  checked=\"\" tabindex=\"4\"";
    }
    echo ">";
    echo LANGUI_PROFILE_T41;
    echo "</label>\r\n\t\t\t\t</td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<th>";
    echo LANGUI_PROFILE_T19;
    echo ":</th>\r\n\t\t\t\t<td><input tabindex=\"5\" type=\"text\" name=\"ort\" value=\"";
    echo htmlspecialchars( $this->profileData['house_name'] );
    echo "\" maxlength=\"30\" class=\"text\" /></td>\r\n\t\t\t</tr>\r\n\t\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<th>";
    echo LANGUI_PROFILE_T42;
    echo ":</th>\r\n\t\t\t\t<td><input tabindex=\"6\" type=\"text\" name=\"dname\" value=\"";
    echo htmlspecialchars( $this->profileData['village_name'] );
    echo "\" maxlength=\"20\" class=\"text\" /></td>\r\n\t\t\t</tr>\r\n            <tr>\r\n\t\t\t  <th>";
    echo LANGUI_PROFILE_T71;
    echo ":</th>\r\n\t\t\t  <td><input tabindex=\"10\" type=\"file\" name=\"avatar\" class=\"text\" /></td>\r\n\t      </tr>\r\n\t\t\t<tr><td colspan=\"2\" class=\"empty\"></td></tr>\r\n\t\t\t<tr><td colspan=\"2\" class=\"desc2\"><textarea tabindex=\"8\" name=\"be2\">";
    echo $this->profileData['description2'];
    echo "</textarea></td></tr>\r\n\t\t</tbody>\r\n\t</table>\r\n\r\n\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"medals\">\r\n\t\t<thead>\r\n\t\t\t<tr><th colspan=\"4\">";
    echo LANGUI_PROFILE_T43;
    echo "</th></tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td>";
    echo LANGUI_PROFILE_T44;
    echo "</td>\r\n\t\t\t\t<td>";
    echo LANGUI_PROFILE_T45;
    echo "</td>\r\n\t\t\t\t<td>";
    echo LANGUI_PROFILE_T46;
    echo "</td>\r\n\t\t\t\t<td>";
    echo LANGUI_PROFILE_T47;
    echo "</td>\r\n\t\t\t</tr>\r\n\t\t</thead>\r\n\t\t<tbody>\r\n\t\t\t";
    $medals = explode( ",", $this->profileData['medals'] );
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
    echo "\t\t</tbody>\r\n\t</table>\r\n\t<p class=\"btn\"><input type=\"image\" value=\"\" tabindex=\"9\" name=\"s1\" id=\"btn_ok\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_okdone_lang;
    echo "\"></p>\r\n</form>\r\n";
}
else if ( $this->selectedTabIndex == 2 )
{
    echo "<form action=\"profile.php?t=2\" method=\"POST\">\r\n<input type=\"hidden\" name=\"e\" value=\"2\">\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"change_mail\" class=\"account\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
    echo LANGUI_PROFILE_T48;
    echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr><td class=\"note\" colspan=\"2\">";
    echo LANGUI_PROFILE_T49;
    echo "</td></tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_PROFILE_T50;
    echo ":</th>\r\n\t\t\t<td><input class=\"text\" type=\"password\" name=\"pw1\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_PROFILE_T51;
    echo ":</th>\r\n\t\t\t<td><input class=\"text\" type=\"password\" name=\"pw2\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_PROFILE_T51;
    echo ":</th>\r\n\t\t\t<td><input class=\"text\" type=\"password\" name=\"pw3\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"change_mail\" class=\"account\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
    echo LANGUI_PROFILE_T52;
    echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr><td class=\"note\" colspan=\"2\">";
    echo LANGUI_PROFILE_T53;
    echo "</td></tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_PROFILE_T54;
    echo ":</th>\r\n\t\t\t<td><input class=\"text\" type=\"text\" name=\"email_alt\" maxlength=\"50\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_PROFILE_T55;
    echo ":</th>\r\n\t\t\t<td><input class=\"text\" type=\"text\" name=\"email_neu\" maxlength=\"50\"></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n<p class=\"btn\"><input type=\"image\" value=\"\" name=\"s1\" id=\"btn_save\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
    echo text_save_lang;
    echo "\"></p>\r\n</form>\r\n";
}
else if ( $this->selectedTabIndex == 3 )
{
    if ( $this->errorText != "" )
    {
        echo "<p class=\"f10 e\">";
        echo $this->errorText;
        echo "</p>";
    }
    echo "<form action=\"profile.php?t=3\" method=\"POST\">\r\n<input type=\"hidden\" name=\"e\" value=\"3\">\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"sitter\" class=\"account\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
    echo LANGUI_PROFILE_T56;
    echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr><td class=\"note\" colspan=\"2\">";
    echo LANGUI_PROFILE_T57;
    echo "</td></tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
    echo LANGUI_PROFILE_T58;
    echo ":</th>\r\n\t\t\t<td><input class=\"text\" type=\"text\" name=\"v1\" maxlength=\"15\"";
    if ( 2 <= sizeof( $this->myAgentPlayers ) )
    {
        echo " disabled=\"\"";
    }
    echo ">";
    echo "<s";
    echo "pan class=\"";
    echo 2 <= sizeof( $this->myAgentPlayers ) ? "max" : "count";
    echo "\">(";
    echo sizeof( $this->myAgentPlayers );
    echo "/2)</span></td>\r\n\t\t</tr>\r\n\t\t<tr><td colspan=\"2\" class=\"sitter\">\r\n\t\t";
    if ( sizeof( $this->myAgentPlayers ) == 0 )
    {
        echo "\t\t\t";
        echo "<s";
        echo "pan class=\"none\">";
        echo LANGUI_PROFILE_T59;
        echo "</span>\r\n\t\t";
    }
    else
    {
        foreach ( $this->myAgentPlayers as $aid => $aname )
        {
            echo "\t\t<div><a href=\"profile.php?t=3&aid=";
            echo $aid;
            echo "\"><img class=\"del\" src=\"assets/x.gif\" title=\"";
            echo LANGUI_PROFILE_T60;
            echo "\" alt=\"";
            echo LANGUI_PROFILE_T60;
            echo "\"></a> <a href=\"profile.php?uid=";
            echo $aid;
            echo "\">";
            echo $aname;
            echo "</a></div>\r\n\t\t";
        }
    }
    echo "\t\t</td></tr>\r\n\t\t\r\n\t\t<tr><td class=\"note\" colspan=\"2\">";
    echo LANGUI_PROFILE_T61;
    echo "</td></tr>\r\n\t\t<tr><td colspan=\"2\" class=\"sitter\">\r\n\t\t";
    if ( sizeof( $this->agentForPlayers ) == 0 )
    {
        echo "\t\t\t";
        echo "<s";
        echo "pan class=\"none\">";
        echo LANGUI_PROFILE_T62;
        echo "</span>\r\n\t\t";
    }
    else
    {
        foreach ( $this->agentForPlayers as $aid => $aname )
        {
            echo "\t\t<div><a href=\"profile.php?t=3&afid=";
            echo $aid;
            echo "\"><img class=\"del\" src=\"assets/x.gif\" title=\"";
            echo LANGUI_PROFILE_T63;
            echo "\" alt=\"";
            echo LANGUI_PROFILE_T63;
            echo "\"></a> <a href=\"profile.php?uid=";
            echo $aid;
            echo "\">";
            echo $aname;
            echo "</a></div>\r\n\t\t";
        }
    }
    echo "\t\t</td></tr>\r\n\t</tbody>\r\n</table>\r\n";
    if ( sizeof( $this->myAgentPlayers ) < 2 )
    {
        echo "<p class=\"btn\"><input type=\"image\" value=\"\" name=\"s1\" id=\"btn_save\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
        echo text_save_lang;
        echo "\"></p>";
    }
    echo "</form>\r\n";
}
else if ( $this->selectedTabIndex == 4 )
{
    echo "<form action=\"profile.php?t=4\" method=\"POST\">\r\n<input type=\"hidden\" name=\"e\" value=\"4\">\r\n\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"del_acc\" class=\"account\">\r\n\t<thead>\r\n\t\t<tr><th colspan=\"2\">";
    echo LANGUI_PROFILE_T6;
    echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr><td class=\"note\" colspan=\"2\">";
    echo LANGUI_PROFILE_T64;
    echo "</td></tr>\r\n\t\t";
    if ( $this->isPlayerInDeletionProgress( ) )
    {
        echo "\t\t<tr>\r\n\t\t\t<td colspan=\"2\" class=\"count\">\r\n\t\t\t\t";
        if ( $this->canCancelPlayerDeletionProcess( ) )
        {
            echo "<a href=\"profile.php?t=4&qid=";
            echo $this->getPlayerDeletionId( );
            echo "\"><img class=\"del\" src=\"assets/x.gif\" alt=\"";
            echo LANGUI_PROFILE_T65;
            echo "\" title=\"";
            echo LANGUI_PROFILE_T65;
            echo "\"> ";
        }
        echo "</a>";
        echo LANGUI_PROFILE_T66;
        echo " ";
        echo "<s";
        echo "pan id=\"timer1\">";
        echo $this->getPlayerDeletionTime( );
        echo "</span> ";
        echo time_hour_lang;
        echo "\t\t\t</td>\r\n\t\t</tr>\r\n\t\t";
    }
    else
    {
        echo "\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_PROFILE_T6;
        echo "</th>\r\n\t\t\t<td class=\"del_selection\">\r\n\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"del\" value=\"1\"> ";
        echo LANGUI_PROFILE_T67;
        echo "</label>\r\n\t\t\t\t<label><input class=\"radio\" type=\"radio\" name=\"del\" value=\"0\" checked=\"\"> ";
        echo LANGUI_PROFILE_T68;
        echo "</label>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<th>";
        echo LANGUI_PROFILE_T69;
        echo ":</th>\r\n\t\t\t<td><input class=\"text\" type=\"password\" name=\"del_pw\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t\t";
    }
    echo "\t</tbody>\r\n</table>\r\n";
    if ( !$this->isPlayerInDeletionProgress( ) )
    {
        echo "<p class=\"btn\"><input type=\"image\" value=\"\" name=\"s1\" id=\"btn_save\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
        echo text_save_lang;
        echo "\"></p>";
    }
    echo "</form>\r\n";
}