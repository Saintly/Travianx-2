<?php
require_once(LANG_UI_PATH."register.php");

echo '
<h1><img src="assets/x.gif" class="anmelden" alt="'.LANGUI_REG_T1.'"></h1>
<h5><img src="assets/x.gif" class="img_u05" alt="'.LANGUI_REG_T2.'"/></h5>';

if(!$this->success){
	echo '
	<p>'.LANGUI_REG_T3.' <a href="manual.php" target="_blank"> '.LANGUI_REG_T4.'</a> '.LANGUI_REG_T5.'.</p>
	<form method="post" action="register.php">
		<table cellpadding="1" cellspacing="1" id="sign_input">
			<tbody>
				<tr class="top">
					<th>'.LANGUI_REG_T6.' :</th>
					<td>
						<input class="text" type="text" name="name" value="';
						if(isset($_POST['name'])){							echo htmlspecialchars(trim($_POST['name']));		}
						elseif(isset($this->SNdata['user_name'])){			echo $this->SNdata['user_name'];					}
						echo '" maxlength="15" /> 
						<span class="error">'.$this->err[0].'</span>
					</td> 
				</tr>
				<tr>
					<th>'.LANGUI_REG_T7.'</th>
					<td>
						<input class="text" type="text" name="email" value="';
						if(isset($_POST['email'])){echo trim( $_POST['email'] );}
						elseif(isset($this->SNdata['email'])){echo $this->SNdata['email'];}
						echo '" maxlength="40" /> 
						<span class="error">'.$this->err[1].'</span>
					</td>
				</tr>
				<tr class="btm">
					<th>'.LANGUI_REG_T8.'</th>
					<td>
						<input class="text" type="password" name="pwd" value="'.((isset($_POST['pwd']))? trim($_POST['pwd']) : '').'" maxlength="20" />
						<span class="error">'.$this->err[2].'</span>
					</td>
				</tr>
			</tbody>
		</table>
		<table cellpadding="1" cellspacing="1" id="sign_select"> 
			<tbody>
				<tr class="top">
					<th><img src="assets/x.gif" class="img_u06" alt="'.LANGUI_REG_T9.'"></th>
					<th colspan="2"><img src="assets/x.gif" class="img_u07" alt="'.LANGUI_REG_T10.'"></th>
				</tr>
				<tr>
					<td class="nat">
						<label><input class="radio" type="radio" name="tid" value="6" '.((isset($_POST['tid']) && $_POST['tid'] == 6)?'checked="checked"':'').'>&nbsp;'.tribe_6.'</label>
					</td>
					<td class="pos1">
						<label><input class="radio" type="radio" name="kid" value="0" '.((!isset($_POST['kid']) || $_POST['kid'] == 0)?'checked="checked"':'').'">&nbsp; '.LANGUI_REG_T11.'</label>
					</td>
					<td class="pos2">&nbsp;</td>
				</tr>
				<tr>
					<td class="nat">
						<label><input class="radio" type="radio" name="tid" value="7" '.((isset($_POST['tid']) && $_POST['tid'] == 7)?'checked="checked"':'').'">&nbsp; '.tribe_7.'</label>
					</td>
					<td>
						<label><input class="radio" type="radio" name="kid" value="1" '.((isset($_POST['kid']) && $_POST['kid'] == 1)?'checked="checked"':'').'">&nbsp; '.LANGUI_REG_T12.'</label>
					</td>
					<td>
						<label><input class="radio" type="radio" name="kid" value="2" '.((isset($_POST['kid']) && $_POST['kid'] == 2 )?'checked="checked"':'').'>&nbsp; '.LANGUI_REG_T13.'</label>
					</td>
				</tr>
				<tr>
					<td>
						<label><input class="radio" type="radio" name="tid" value="2" '.((isset($_POST['tid']) && $_POST['tid'] == 2)?'checked="checked"':'').'>&nbsp; '.tribe_2.'</label>
					</td>
						<td>
							<label><input class="radio" type="radio" name="kid" value="3" '.((isset($_POST['kid']) && $_POST['kid'] == 3)?'checked="checked"':'').'>&nbsp; '.LANGUI_REG_T14.'</label>
						</td>
						<td>
							<label><input class="radio" type="radio" name="kid" value="4" '.((isset($_POST['kid']) && $_POST['kid'] == 4)?'checked="checked"':'').'>&nbsp; '.LANGUI_REG_T15.'</label>
						</td>
					</tr>
					<tr>
						<td>
							<label><input class="radio" type="radio" name="tid" value="3" '.((isset($_POST['tid']) && $_POST['tid'] == 3)?'checked="checked"':'').'>&nbsp; '.tribe_3.'</label>
						</td>
						<td rowspan="2"></td>
					</tr>
					<tr class="btm">
						<td>
							<label><input class="radio" type="radio" name="tid" value="1" '.((isset($_POST['tid']) && $_POST['tid'] == 1)?'checked="checked"':'').'>&nbsp; '.tribe_1.'</label>
						</td>
						<td rowspan="2"></td>
					</tr>
				</tbody>
			</table>
			<ul class="important">'.$this->err[3].'</ul> <p class="btn"><input type="image" value="anmelden" name="s1" id="btn_signup" class="dynamic_img" src="assets/x.gif" alt="'.LANGUI_REG_T16.'" /></p>
		</form>
		<p class="info">'.LANGUI_REG_T17.'</p>';
}
else{echo '
	<p>
		'.LANGUI_REG_T18.' <b>'.((isset($_POST['name']))? trim($_POST['name']) : '').'</b>
		<br><br>'.LANGUI_REG_T19.': <span class="important">'.((isset($_POST['email']))? trim($_POST['email']) : '').'</span>
	</p>';
}