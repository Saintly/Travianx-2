<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3c.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eg" lang="eg">
<head>
	<title><?php echo $this->appConfig['page'][$this->appConfig['system']['lang']."_title"]; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-script-type" content="text/javascript" />
	<meta http-equiv="content-style-type" content="text/css" />
	<meta content="<?php echo $this->appConfig['page']['meta-tag']; ?>" name="description">
	<meta content="<?php echo $this->appConfig['page']['meta-tag']; ?>" name="keywords">
	<link rel="stylesheet" href="assets/default/lang/<?php echo $this->appConfig['system']['lang'].'/config.css'.$this->getAssetVersion();?>" type="text/css" />
	<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
	<script type="text/javascript">var d3l=<?php echo $this->appConfig['system']['lang'] == "ar" ? "180" : "-600"; ?>;</script>
	<script src="assets/core.js<?php echo $this->getAssetVersion(); ?>" type="text/javascript"></script>
</head>
<body class="webkit">
	<div class="wrapper">
		<div class="content">
			<?php $this->printContent();?>
			<div class="clear"></div>
		</div>
		<div class="footer-stopper"></div>
		<div class="clear"></div>
		<div class="footer">
			<div class="container container">
				<?php require(VIEW_PATH."layout/footer.php");?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">init();</script>
</html>