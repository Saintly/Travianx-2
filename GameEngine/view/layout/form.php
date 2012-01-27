<?php require_once(LANG_UI_PATH."form.php");?>
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
			<div id="mtop">
				<div class="clear"></div>
			</div>
		</div>
		<div id="mid">
			<div id="side_navi">
				<a id="logo" href="#"><img  src="assets/x.gif" alt="'.LANGUI_FORM_GNAME.'" /></a>
				<p><a href="index.php"><?php echo LANGUI_FORM_MAIN;?></a><a href="#" onclick="return showManual(0,0);"><?php echo LANGUI_FORM_HELP;?></a><a href="register.php"><?php echo LANGUI_FORM_REG;?></a></p>
			</div>
			<div id="content" class="<?php echo $this->contentCssClass;?>"><?php $this->printContent();?></div>
			<div id="side_info">
				<?php echo (trim($this->newsText)!= "")?'<div class="news"><h2>'.LANGUI_FORM_NEWS.'</h2><p>'.$this->newsText.'</p><div class="clear"></div></div>':'';?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="footer-stopper"></div>
		<div class="clear"></div>
		<div id="footer">
			<div id="mfoot"><div class="footer-menu"><?php require(VIEW_PATH."layout/footer.php");?></div>
		</div>
		<div id="cfoot"></div>
	</div>
</div>
<div id="ce"></div>
</body>
<script type="text/javascript">init();</script>
</html>