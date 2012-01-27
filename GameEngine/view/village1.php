<?php
require_once(LANG_UI_PATH."village1.php");
echo '<h1>'.$this->data['village_name'].'<br>'.
	(($this->data['allegiance_percent'] < 100)?'<div id="loyality" class="'.($this->data['allegiance_percent'] <= 60 ? "re" : "gr").'">'.LANGUI_VIL1_T1.' '.$this->data['allegiance_percent'].'%</div>':'').'</h1>
	<map name="rx" id="rx">
		<area href="build.php?id=1" coords="101,33,28" shape="circle" '.$this->getBuildingTitle(1).'>
		<area href="build.php?id=2" coords="165,32,28" shape="circle" '.$this->getBuildingTitle(2).'>
		<area href="build.php?id=3" coords="224,46,28" shape="circle" '.$this->getBuildingTitle(3).'>
		<area href="build.php?id=4" coords="46,63,28" shape="circle" '.$this->getBuildingTitle(4).'>
		<area href="build.php?id=5" coords="138,74,28" shape="circle" '.$this->getBuildingTitle(5).'>
		<area href="build.php?id=6" coords="203,94,28" shape="circle" '.$this->getBuildingTitle(6).'>
		<area href="build.php?id=7" coords="262,86,28" shape="circle" '.$this->getBuildingTitle(7).'>
		<area href="build.php?id=8" coords="31,117,28" shape="circle" '.$this->getBuildingTitle(8).'>
		<area href="build.php?id=9" coords="83,110,28" shape="circle" '.$this->getBuildingTitle(9).'>
		<area href="build.php?id=10" coords="214,142,28" shape="circle" '.$this->getBuildingTitle(10).'>
		<area href="build.php?id=11" coords="269,146,28" shape="circle" '.$this->getBuildingTitle(11).'>
		<area href="build.php?id=12" coords="42,171,28" shape="circle" '.$this->getBuildingTitle(12).'>
		<area href="build.php?id=13" coords="93,164,28" shape="circle" '.$this->getBuildingTitle(13).'>
		<area href="build.php?id=14" coords="160,184,28" shape="circle" '.$this->getBuildingTitle(14).'>
		<area href="build.php?id=15" coords="239,199,28" shape="circle" '.$this->getBuildingTitle(15).'>
		<area href="build.php?id=16" coords="87,217,28" shape="circle" '.$this->getBuildingTitle(16).'>
		<area href="build.php?id=17" coords="140,231,28" shape="circle" '.$this->getBuildingTitle(17).'>
		<area href="build.php?id=18" coords="190,232,28" shape="circle" '.$this->getBuildingTitle(18).'>
		<area href="village2.php" coords="144,131,36" shape="circle" title="'.LANGUI_VIL1_T2.'" alt="'.LANGUI_VIL1_T2.'">
	</map>
	<div id="village_map" class="f'.$this->data['field_maps_id'].'">';
	foreach($this->buildings as $id => $build){
		if(19 <= $id){
			break;
		}
		if(0 < $build['level']){echo '
	<img src="assets/x.gif" class="reslevel rf'.$id.' level'.$build['level'].'" alt="'.$this->getBuildingName($id).'">';
		}
	}echo '
	<img id="resfeld" usemap="#rx" src="assets/x.gif" alt="">
</div>
<div id="map_details">';
	if(0 < $this->queueModel->tasksInQueue['war_troops_summary']['total_number']){echo '
	<table id="movements" cellpadding="1" cellspacing="1">
		<thead>
			<tr>
				<th colspan="3">'.LANGUI_VIL1_T3.' :</th>
			</tr>
		</thead>
		<tbody>';
		$war = $this->queueModel->tasksInQueue['war_troops_summary']['to_me']['attacks'];
		if(0 < $war['number']){echo '
			<tr>
				<td class="typ">
					<a href="build.php?id=39"><img src="assets/x.gif" class="att1" alt="'.LANGUI_VIL1_T4.'" title="'.LANGUI_VIL1_T4.'"></a>
					<span class="a1">»</span>
				</td>
				<td>
					<div class="mov"><span class="a1">'.$war['number'].' '.LANGUI_VIL1_T5.'</span></div>
					<div class="dur_r">'.text_in_lang.' <span id="timer1">'.WebHelper::secondstostring($war['min_time']).'</span> '.time_hour_lang.'</div>
				</td>
			</tr>';
		}
		$war = $this->queueModel->tasksInQueue['war_troops_summary']['to_me']['reinforce'];
		if(0 < $war['number']){echo '
			<tr>
				<td class="typ">
					<a href="build.php?id=39"><img src="assets/x.gif" class="def1" alt="'.LANGUI_VIL1_T6.'" title="'.LANGUI_VIL1_T6.'"></a>
					<span class="d1">»</span>
				</td>
				<td>
					<div class="mov"><span class="d1">'.$war['number'].' '.LANGUI_VIL1_T7.'</span></div>
					<div class="dur_r">'.text_in_lang.' <span id="timer1">'.WebHelper::secondstostring($war['min_time']).'</span> '.time_hour_lang.'</div>
				</td>
			</tr>';
		}
		$war = $this->queueModel->tasksInQueue['war_troops_summary']['from_me']['attacks'];
		if(0 < $war['number']){echo '
			<tr>
				<td class="typ">
					<a href="build.php?id=39"><img src="assets/x.gif" class="att2" alt="'.LANGUI_VIL1_T8.'" title="'.LANGUI_VIL1_T8.'"></a>
					<span class="a2">«</span>
				</td>
				<td>
					<div class="mov"><span class="a2">'.$war['number'].' '.LANGUI_VIL1_T5.'</span></div>
					<div class="dur_r">'.text_in_lang.' <span id="timer1">'.WebHelper::secondstostring($war['min_time']).'</span> '.time_hour_lang.'</div>
				</td>
			</tr>';
		}
		$war = $this->queueModel->tasksInQueue['war_troops_summary']['from_me']['reinforce'];
		if(0 < $war['number']){echo '
			<tr>
				<td class="typ">
					<a href="build.php?id=39"><img src="assets/x.gif" class="def2" alt="'.LANGUI_VIL1_T9.'" title="'.LANGUI_VIL1_T9.'"></a>
					<span class="d2">«</span>
				</td>
				<td>
					<div class="mov"><span class="d2">'.$war['number'].' '.LANGUI_VIL1_T7.'</span></div>
					<div class="dur_r">'.text_in_lang.' <span id="timer1">'.WebHelper::secondstostring($war['min_time']).'</span> '.time_hour_lang.'</div>
				</td>
			</tr>';
		}
		$war = $this->queueModel->tasksInQueue['war_troops_summary']['to_my_oasis']['attacks'];
		if(0 < $war['number']){echo '
			<tr>
				<td class="typ">
					<a href="build.php?id=39"><img src="assets/x.gif" class="att3" alt="'.LANGUI_VIL1_T10.'" title="'.LANGUI_VIL1_T10.'"></a>
					<span class="a3">»</span>
				</td>
				<td>
					<div class="mov"><span class="a3">'.$war['number'].' '.LANGUI_VIL1_T5.'</span></div>
					<div class="dur_r">'.text_in_lang.' <span id="timer1">'.WebHelper::secondstostring($war['min_time']).'</span> '.time_hour_lang.'</div>
				</td>
			</tr>';
		}
		$war = $this->queueModel->tasksInQueue['war_troops_summary']['to_my_oasis']['reinforce'];
		if(0 < $war['number']){echo '
			<tr>
				<td class="typ">
					<a href="build.php?id=39"><img src="assets/x.gif" class="def3" alt="'.LANGUI_VIL1_T11.'" title="'.LANGUI_VIL1_T11.'"></a>
					<span class="d3">»</span>
				</td>
				<td>
					<div class="mov"><span class="d3">'.$war['number'].' '.LANGUI_VIL1_T7.'</span></div>
					<div class="dur_r">'.text_in_lang.' <span id="timer1">'.WebHelper::secondstostring($war['min_time']).'</span> '.time_hour_lang.'</div>
				</td>
			</tr>';
		}echo '
		</tbody>
	</table>';
	}echo '
	<table id="production" cellpadding="1" cellspacing="1">
		<thead><tr><th colspan="4">'.LANGUI_VIL1_T12.' :</th></tr></thead>
		<tbody>
			<tr>
				<td class="ico"><img class="r1" src="assets/x.gif" alt="'.item_title_1.'" title="'.item_title_1.'"></td>
				<td class="res">'.item_title_1.':</td>
				<td class="num">'.$this->resources[1]['calc_prod_rate'].'</td>
				<td class="per">'.LANGUI_VIL1_T13.'</td>
			</tr>
			<tr>
				<td class="ico"><img class="r2" src="assets/x.gif" alt="'.item_title_2.'" title="'.item_title_2.'"></td>
				<td class="res">'.item_title_2.':</td>
				<td class="num">'.$this->resources[2]['calc_prod_rate'].'</td>
				<td class="per">'.LANGUI_VIL1_T13.'</td>
			</tr>
			<tr>
				<td class="ico"><img class="r3" src="assets/x.gif" alt="'.item_title_3.'" title="'.item_title_3.'"></td>
				<td class="res">'.item_title_3.':</td>
				<td class="num">'.$this->resources[3]['calc_prod_rate'].'</td>
				<td class="per">'.LANGUI_VIL1_T13.'</td>
			</tr>
			<tr>
				<td class="ico"><img class="r4" src="assets/x.gif" alt="'.item_title_4.'" title="'.item_title_4.'"></td>
				<td class="res">'.item_title_4.':</td>
				<td class="num">'.$this->resources[4]['calc_prod_rate'].'</td>
				<td class="per">'.LANGUI_VIL1_T13.'</td>
			</tr>
		</tbody>
	</table>
	<table id="troops" cellpadding="1" cellspacing="1">
		<thead><tr><th colspan="3">'.LANGUI_VIL1_T14.':</th></tr></thead>
		<tbody>';
		if($this->heroCount == 0 && sizeof($this->troops) == 0){echo '
			<tr><td>'.LANGUI_VIL1_T15.'</td></tr>';
		}
		else{
			if(0 < $this->heroCount){echo '
			<tr>
				<td class="ico"><a href="build.php?id=39"><img class="unit uhero" src="assets/x.gif" alt="'.troop_hero.'" title="'.troop_hero.'"></a></td>
				<td class="num">'.$this->heroCount.'</td>
				<td class="un">'.troop_hero.'</td>
			</tr>';
			}
			foreach($this->troops as $k => $v){
			$troopName = htmlspecialchars(constant("troop_".$k));echo '
			<tr>
				<td class="ico"><a href="build.php?id=39"><img class="unit u'.$k.'" src="assets/x.gif" alt="'.$troopName.'" title="'.$troopName.'"></a></td>
				<td class="num">'.$v.'</td>
				<td class="un">'.$troopName.'</td>
			</tr>';
			}
		}echo '
		</tbody>
	</table>
</div>';
if(isset($this->queueModel->tasksInQueue[QS_BUILD_CREATEUPGRADE])){echo '
<table cellpadding="1" cellspacing="1" id="building_contract">
	<thead><tr><th colspan="3">'.LANGUI_VIL1_T16.': '.((!$this->data['is_special_village'] && $this->gameMetadata['plusTable'][5]['cost'] <= $this->data['gold_num'])?'<a href="village1.php?bfs&k='.$this->data['update_key'].'" title="'.LANGUI_VIL1_T18.'"><img class="clock" alt="'.LANGUI_VIL1_T18.'" src="assets/x.gif"></a>':'');'</th></tr>
	</thead>
	<tbody>';
	$tmpBuilding = array();
	foreach($this->queueModel->tasksInQueue[QS_BUILD_CREATEUPGRADE] as $qtask){
		$index = $qtask['proc_params'];
		$itemId = $qtask['building_id'];
		if(!isset($tmpBuilding[$index])){
			$tmpBuilding[$index] = 0;
		}
		++$tmpBuilding[$index];
		$level = $this->buildings[$index]['level'] + $tmpBuilding[$index];echo '
		<tr>
			<td class="ico"><a href="?id='.$qtask['id'].'&d&k='.$this->data['update_key'].'"><img src="assets/x.gif" class="del" title="'.LANGUI_VIL1_T17.'" alt="'.LANGUI_VIL1_T17.'"></a></td>
			<td>'.constant("item_".$itemId).' ('.level_lang.' '.$level.')</td>
			<td>'.time_remain_lang.' <span id="timer1">'.WebHelper::secondstostring($qtask['remainingSeconds']).'</span> '.time_hour_lang.'</td>
		</tr>';
	}
	unset($tmpBuilding);echo '
	</tbody>
</table>';
}