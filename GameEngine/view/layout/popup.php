<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title><?php echo $this->title;?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<link href="assets/default/lang<?php echo $this->appConfig['system']['lang'].'/lang.css'.$this->getAssetVersion();?>" rel="stylesheet" type="text/css" />
	<link href="assets/default/lang/<?php echo $this->appConfig['system']['lang'].'/compact.css'.$this->getAssetVersion();?>" rel="stylesheet" type="text/css" />
	<script type="text/javascript">var d3l=<?php echo $this->appConfig['system']['lang'] == "ar" ? "180" : "-600";?></script>
	<script src="assets/core.js<?php echo $this->getAssetVersion();?>" type="text/javascript"></script>
</head>
<body class="manual">
	<?php $this->printContent();?>
</body>
<script type="text/javascript">init();</script>
</html>