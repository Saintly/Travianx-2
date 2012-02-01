<?php
/**
*
* @ This file is created by Decodeby.US
* @ deZender Public (PHP5 Decompiler)
*
* @	Version			:	1.0.0.0
* @	Author			:	Ps2Gamer & Cyko
* @	Release on		:	30.05.2011
* @	Official site	:	http://decodeby.us
*
*/

require_once( LANG_UI_PATH."troops.php" );
?>
<h1><img class="point" src="assets/x.gif" alt="" title="">
<?php echo LANGUI_TROOP_T1; ?>
</h1>
<p></p>
<form method="post" action="troops.php?avid=<?php echo $this->villageId;?>">
<table cellpadding="1" cellspacing="1" id="position" class="small_option">
	<thead>
		<tr><th colspan="2"><?php echo LANGUI_TROOP_T2; ?></th></tr>
	</thead>
		<tbody>
			<tr>
				<th><?php echo LANGUI_TROOP_T3; ?></th>
				<td><?php echo $this->villageName; ?></td>
			</tr>
			<tr>
				<th><?php echo LANGUI_TROOP_T4; ?></th>
				<td><?php echo $this->playerName; ?></td>
			</tr>
		</tbody>
</table><p></p>
<table cellpadding="1" cellspacing="1" id="rights" class="small_option">
	<thead>
			<tr><th>
<?php

echo LANGUI_TROOP_T5;
echo "</th><th>";
echo LANGUI_TROOP_T6;
echo "</th><th>";
echo LANGUI_TROOP_T7;
echo "</th></tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
echo item_title_1;
echo "\" title=\"";
echo item_title_1;
echo "\" /> ";
echo item_title_1;
echo "</td>\r\n\t\t\t<td class=\"sel\">";
echo $this->resources[1]['store_max_limit'];
echo "</td>\r\n\t\t\t<td><input class=\"name text\" type=\"text\" name=\"r1\" value=\"";
echo $this->resources[1]['current_value'];
echo "\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><img src=\"assets/x.gif\" class=\"r2\" alt=\"";
echo item_title_2;
echo "\" title=\"";
echo item_title_2;
echo "\" /> ";
echo item_title_2;
echo "</td>\r\n\t\t\t<td class=\"sel\">";
echo $this->resources[2]['store_max_limit'];
echo "</td>\r\n\t\t\t<td><input class=\"name text\" type=\"text\" name=\"r2\" value=\"";
echo $this->resources[2]['current_value'];
echo "\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><img src=\"assets/x.gif\" class=\"r3\" alt=\"";
echo item_title_3;
echo "\" title=\"";
echo item_title_3;
echo "\" /> ";
echo item_title_3;
echo "</td>\r\n\t\t\t<td class=\"sel\">";
echo $this->resources[3]['store_max_limit'];
echo "</td>\r\n\t\t\t<td><input class=\"name text\" type=\"text\" name=\"r3\" value=\"";
echo $this->resources[3]['current_value'];
echo "\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td class=\"sel\"><img src=\"assets/x.gif\" class=\"r4\" alt=\"";
echo item_title_4;
echo "\" title=\"";
echo item_title_4;
echo "\" /> ";
echo item_title_4;
echo "</td>\r\n\t\t\t<td class=\"sel\">";
echo $this->resources[4]['store_max_limit'];
echo "</td>\r\n\t\t\t<td><input class=\"name text\" type=\"text\" name=\"r4\" value=\"";
echo $this->resources[4]['current_value'];
echo "\" maxlength=\"20\"></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<p><input type=\"image\" value=\"ok\" name=\"s1\" id=\"btn_save\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
echo text_save_lang;
echo "\"></p>\r\n</form>\r\n";
if ( $this->isPost( ) )
{
    echo "<p class=\"error\">";
    echo $this->msgText;
    echo "</p>";
}
?>
