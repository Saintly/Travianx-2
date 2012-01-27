<?php require_once(LANG_UI_PATH."game.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title><?php echo $this->appConfig['page'][$this->appConfig['system']['lang']."_title"];?></title>
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta content="<?php echo $this->appConfig['page']['meta-tag'];?>" name="description">
	<meta content="<?php echo $this->appConfig['page']['meta-tag'];?>" name="keywords">
	<link href="assets/default/lang/<?php echo $this->appConfig['system']['lang'].'/lang.css'.$this->getAssetVersion();?>" rel="stylesheet" type="text/css" />
	<link href="assets/default/lang/<?php echo $this->appConfig['system']['lang'].'/compact.css'.$this->getAssetVersion();?>" rel="stylesheet" type="text/css" />
	<meta name="google-site-verification" content="vTjsRxnpRzHRJvw5E3uOiAA-jcGayHNOw_SEAD93-fc" />
	<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
	<script type="text/javascript">var d3l=<?php echo $this->appConfig['system']['lang'] == "ar" ? "180" : "-600";?></script>
	<script src="assets/core.js<?php echo $this->getAssetVersion();?>" type="text/javascript"></script>
</head>
<body class="v35 webkit">
	<div class="wrapper">
		<img src="assets/x.gif" id="msfilter" alt="" />
		<div id="dynamic_header"></div>
		<div id="header">
			<div id="mtop"><?php
				if($this->player != NULL){echo '
				<a href="village1.php" id="n1" accesskey="1"><img src="assets/x.gif" title="'.LANGUI_GAME_ICO1.'" alt="'.LANGUI_GAME_ICO1.'" /></a>
				<a href="village2.php" id="n2" accesskey="2"><img src="assets/x.gif" title="'.LANGUI_GAME_ICO2.'" alt="'.LANGUI_GAME_ICO2.'" /></a>
				<a href="map.php" id="n3" accesskey="3"><img src="assets/x.gif" title="'.LANGUI_GAME_ICO3.'" alt="'.LANGUI_GAME_ICO3.'" /></a>
				<a href="statistics.php" id="n4" accesskey="4"><img src="assets/x.gif" title="'.LANGUI_GAME_ICO4.'" alt="'.LANGUI_GAME_ICO4.'" /></a>
				<div id="n5" class="i'.$this->reportMessageStatus.'">
					<a class="reports" href="report.php" accesskey="5"><img src="assets/x.gif" class="l" title="'.LANGUI_GAME_ICO5.'" alt="'.LANGUI_GAME_ICO5.'" /></a>
					<a class="messages" href="msg.php" accesskey="6"><img src="assets/x.gif" class="r" title="'.LANGUI_GAME_ICO6.'" alt="'.LANGUI_GAME_ICO6.'" /></a>
				</div>
				<a href="plus.php?t=2" id="plus"><img src="assets/x.gif" id="btn_plus" class="inactive" title="'.LANGUI_GAME_ICO7.'" alt="'.LANGUI_GAME_ICO7.'" /><b><font color="#FF6F0F">'.LANGUI_GAME_GOLD.'</font></b></a>';
				}?>
			<div class="clear"></div>
		</div>
	</div>
 
	<div id="mid">
		<div id="side_navi">
			<a id="logo" href="#"><img src="assets/x.gif" alt="<?php echo LANGUI_GAME_GNAME;?>" /></a><?php
            if($this->player != NULL){
				$_d = intval(date("G"));
				echo (6 <= $_d && $_d <= 19)?'<img class="time_of_day day" title="'.LANGUI_GAME_MORNING.'" alt="'.LANGUI_GAME_MORNING.'" src="assets/x.gif" />':'<img class="time_of_day night" title="'.LANGUI_GAME_AFTERNOON.'" alt="'.LANGUI_GAME_AFTERNOON.'" src="assets/x.gif" />';
			}
			require_once(MODEL_PATH."index.php");
			$m1 = new IndexModel();
			$this->datastats = $m1->getIndexSummary();
			echo '<center>'.LANGUI_GAME_O1.'<br><strong>'.LANGUI_GAME_O2.' :</strong></td><td>';
			echo $this->datastats['players_count'];
			echo "</td></tr><br><tr><td>";
			echo "<strong>";echo LANGUI_GAME_O3;echo ":</strong></td><td>";
			echo $this->datastats['active_players_count'];
			echo "</td></tr><br><tr><td>";
			echo "<strong>";echo LANGUI_GAME_O4;echo ":</strong></td><td>";
			echo $this->datastats['online_players_count'];
			echo "</td></tr></center>";
			$m1->dispose( );
			echo "<br><p><a href=\"index.php\">";echo LANGUI_GAME_MENU1;echo "</a>";
			if($this->player != NULL){echo "
			<a href=\"#\" onclick=\"return showManual(0,0);\">";echo LANGUI_GAME_MENU2;echo "</a>
			<a href=\"profile.php\">"; echo LANGUI_GAME_MENU3;echo "</a>
			<a href=\"logout.php\">"; echo LANGUI_GAME_MENU4; echo "</a>
			</p>
			<p>
			<a href=\"";echo $this->appConfig['system']['forum_url'];echo "\" target=\"_blank\">";echo LANGUI_GAME_T1;echo "</a>
			<a href=\"";echo $this->appConfig['system']['social_url'];echo "\" target=\"_blank\">";echo LANGUI_GAME_T2;echo "</a>
			<a href=\"chat.php\">";echo LANGUI_GAME_MENU12;echo "</a>
			<a href=\"snprofile.php?uid=";echo $this->player->playerId;echo "\">";echo LANGUI_GAME_T3;echo "</a>
			<a href=\"friends.php\">";echo LANGUI_GAME_T4;echo "</a>
			</p>
			<p>";
			if ( $this->data['active_plus_account']){
				echo "<p><a href=\"notes.php\">";echo LANGUI_GAME_MENU5;echo "</a>
				<a href=\"links.php\">";echo LANGUI_GAME_MENU6;echo "</a></p>";
    }
    if ( $this->data['player_type'] == PLAYERTYPE_ADMIN ){
        echo "<p> <a href=\"news.php\">";echo LANGUI_GAME_MENU7; echo "</a>
		<a href=\"gnews.php\">";echo LANGUI_GAME_MENU8;echo "</a>
		<a href=\"badwords.php\">";echo LANGUI_GAME_MENU10;echo "</a>
		<a href=\"advertising.php\">";echo LANGUI_GAME_MENU11;echo "</a></p>";
    }
}
echo "</p>";
echo "<p><a href=\"plus.php \"><b><font color=\"#FF6F0F\">";echo LANGUI_GAME_MENU9;echo "</font></b></a></p>";

if($this->player != NULL && $this->isPlayerInDeletionProgress()){
    echo "<p class=\"deltimer\"><a href=\"profile.php?t=4\">";
    echo LANGUI_GAME_PLAYERDEL;
    echo " ";
    echo "<span id=\"timer1\">";echo $this->getPlayerDeletionTime();echo "</span>";
    echo time_hour_lang;
    echo "</a></p>";
}
echo "	</div>
	<div id=\"content\" class=\"";echo $this->contentCssClass;echo "\">";$this->printContent();echo "</div>
	<div id=\"side_info\">";
if ( $this->data['guide_quiz'] != GUIDE_QUIZ_COMPLETED && $this->player != NULL )
{
    echo "		<div id=\"anm\" style=\"width:118px; height:142px; visibility: hidden;\"></div>
		<div id=\"qge\"><img onclick=\"showTask();\" src=\"assets/x.gif\" id=\"qgei\" class=\"";
    echo $this->getGuideQuizClassName( );
    echo "\" title=\"";
    echo LANGUI_GAME_LMENU1;
    echo "\" alt=\"";
    echo LANGUI_GAME_LMENU1;
    echo "\"></div>
";
}
if ( $this->player != NULL )
{
    if ( 1 < sizeof( $this->playerVillages ) )
    {
        echo "	<table cellpadding=\"1\" cellspacing=\"1\" id=\"vlist\">
		<thead>
			<tr><td colspan=\"3\"><b>";
        echo LANGUI_GAME_LMENU2;
        echo ":</b></td></tr>
		</thead>
		<tbody>
		";
        foreach ( $this->playerVillages as $vid => $pvillage )
        {
            echo "			<tr>
				<td class=\"dot";
            if ( $vid == $this->data['selected_village_id'] )
            {
                echo "  hl";
            }
            echo "\">●</td>
				<td class=\"link\"><div><a href=\"?vid=";
            echo $vid.$this->villagesLinkPostfix;
            echo "\">";
            echo $pvillage[2];
            echo "</a></div></td>
				<td class=\"aligned_coords\"><div class=\"cox\">(";
            echo $pvillage[0];
            echo "</div><div class=\"pi\">|</div><div class=\"coy\">";
            echo $pvillage[1];
            echo ")</div></td>
			</tr>
		";
        }
        echo "		</tbody>
	</table>
	";
    }
    echo "	";
    if ( sizeof( $this->playerLinks ) && $this->data['active_plus_account'] )
    {
        echo "	<table id=\"llist\">
		<thead>
			<tr><td colspan=\"2\"><a href=\"links.php\">";
        echo LANGUI_GAME_LMENU3;
        echo ":</a></td></tr>
		</thead>
		<tbody>
			";
        foreach ( $this->playerLinks as $link )
        {
            echo "			<tr>
				<td class=\"dot\">●</td>
				<td class=\"link\"><div><a href=\"";
            echo htmlspecialchars( $link['linkHref'] );
            echo "\"";
            if ( !$link['linkSelfTarget'] )
            {
                echo " target=\"_blank\"";
            }
            echo ">";
            echo $link['linkName'];
            echo "</a>";
            if(!$link['linkSelfTarget']){
                echo " <img class=\"external\" src=\"assets/x.gif\" alt=\"";echo LANGUI_GAME_LMENU4;echo "\" title=\"";echo LANGUI_GAME_LMENU4;echo "\">";
            }
            echo "</div></td>
			</tr>
			";
        }
       
        echo "		</tbody>
	</table>";
    }
    echo "    <div align=\"center\" style=\"position: absolute; left: ";
    echo $this->appConfig['system']['lang'] == "en" ? "1000" : "-850";
    echo "px; top: 35px;\">
";
    if ( 0 < sizeof( $this->banner ) )
    {
        if ( $this->banner['type'] == "image" )
        {
            echo "<a target=\"_blank\" href=\"banner.php?url=".base64_encode( $this->banner['ID'] )."\"> 
		<img width=\"120\" height=\"450\" src=\"".$this->banner['image']."\" border=\"0\" title=\"".$this->banner['name']."\"  alt=\"".$this->banner['name']."\"></a> ";
        }
        else
        {
            echo "<embed width=\"120\" height=\"450\" onclick=\"window.location.href('banner.php?url=".base64_encode( $this->banner['ID'] )."')\" title=\"".$this->banner['name']."\" src=\"".$this->banner['image']."\" />";
        }
    }
    echo "</div>
	";
}
echo "	</div>
	<div class=\"clear\"></div>
</div>

<div class=\"footer-stopper\"></div>
<div class=\"clear\"></div>
<div id=\"footer\">
	<div id=\"mfoot\">
		<div class=\"footer-menu\">";
require( VIEW_PATH."layout/footer.php" );
echo "</div>
	</div>
    <div id=\"cfoot\"></div>
</div>
</div>

";
if ( $this->player != NULL )
{
    echo "<div id=\"res\">
	<div id=\"resWrap\">
		<table cellpadding=\"1\" cellspacing=\"1\">
			<tbody>
				<tr>
					<td><img src=\"assets/x.gif\" class=\"r1\" alt=\"";
    echo item_title_1;
    echo "\" title=\"";
    echo item_title_1;
    echo "\" /></td>
					<td id=\"l4\" title=\"";
    echo $this->resources[1]['calc_prod_rate'];
    echo "\">";
    echo $this->resources[1]['current_value'];
    echo "/";
    echo $this->resources[1]['store_max_limit'];
    echo "</td>
					<td><img src=\"assets/x.gif\" class=\"r2\" alt=\"";
    echo item_title_2;
    echo "\" title=\"";
    echo item_title_2;
    echo "\" /></td>
					<td id=\"l3\" title=\"";
    echo $this->resources[2]['calc_prod_rate'];
    echo "\">";
    echo $this->resources[2]['current_value'];
    echo "/";
    echo $this->resources[2]['store_max_limit'];
    echo "</td>
					<td><img src=\"assets/x.gif\" class=\"r3\" alt=\"";
    echo item_title_3;
    echo "\" title=\"";
    echo item_title_3;
    echo "\" /></td>
					<td id=\"l2\" title=\"";
    echo $this->resources[3]['calc_prod_rate'];
    echo "\">";
    echo $this->resources[3]['current_value'];
    echo "/";
    echo $this->resources[3]['store_max_limit'];
    echo "</td>
					<td><img src=\"assets/x.gif\" class=\"r4\" alt=\"";
    echo item_title_4;
    echo "\" title=\"";
    echo item_title_4;
    echo "\" /></td>
					<td id=\"l1\" title=\"";
    echo $this->resources[4]['calc_prod_rate'];
    echo "\">";
    echo $this->resources[4]['current_value'];
    echo "/";
    echo $this->resources[4]['store_max_limit'];
    echo "</td>";
    if ( !$this->wrap )
    {
        echo "					<td><img src=\"assets/x.gif\" class=\"r5\" alt=\"";
        echo LANGUI_GAME_CROPCONSUM;
        echo "\" title=\"";
        echo LANGUI_GAME_CROPCONSUM;
        echo "\" /></td>
					<td>";
        echo $this->data['crop_consumption'];
        echo "/";
        echo $this->data['crop_consumption'] + $this->resources[4]['calc_prod_rate'];
        echo "</td>
";
    }
    else
    {
        echo "				</tr>
				<tr>
					<td colspan=\"6\"></td>
					<td><img src=\"assets/x.gif\" class=\"r5\" alt=\"";
        echo LANGUI_GAME_CROPCONSUM;
        echo "\" title=\"";
        echo LANGUI_GAME_CROPCONSUM;
        echo "\"></td>
					<td>";
        echo $this->data['crop_consumption'];
        echo "/";
        echo $this->data['crop_consumption'] + $this->resources[4]['calc_prod_rate'];
        echo "</td>
";
    }
    echo "				</tr>
			</tbody>
		</table>
	</div>
</div>
";
$sec = explode( " ", microtime( ) );
$usec = explode( " ", microtime( ) );
list( $usec, $sec ) = $usec;    
echo "<div id=\"stime\">
<div id=\"ltime\"><div id=\"ltimeWrap\">";
echo LANGUI_GAME_CALCMS;
echo " <b>";
echo ceil( ( ( double )$sec + ( double )$usec - $GLOBALS['__scriptStart'] ) * 1000 );
echo "</b> ms<br />";
echo LANGUI_GAME_SRVTIME;
echo " ";
echo "<span id=\"timer2\" class=\"b\">";
echo date( "G:i:s" );
echo "</span></div></div>
</div>";
}?>
<div id="ce"></div>
</body>
<script type="text/javascript">init();<?php echo ($this->player!= NULL&&!$this->player->isSpy&&$this->data['guide_quiz']==GUIDE_QUIZ_NOTSTARTED)?"showTask();":'';?></script>
</html>