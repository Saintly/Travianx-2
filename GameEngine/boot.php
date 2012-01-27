<?php
define("ROOT_PATH",realpath(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR);
define( "APP_PATH",ROOT_PATH."GameEngine".DIRECTORY_SEPARATOR);
define( "LIB_PATH",APP_PATH."lib".DIRECTORY_SEPARATOR);
define( "MODEL_PATH",APP_PATH."model".DIRECTORY_SEPARATOR);
define( "VIEW_PATH",APP_PATH."view".DIRECTORY_SEPARATOR);
@set_magic_quotes_runtime(FALSE);
if(isset($_SERVER['HTTP_ACCEPT_ENCODING']) && substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], "gzip")){
	ob_implicit_flush(0);
	if(@ob_start(array("ob_gzhandler", 9))){
		header( "Content-Encoding: gzip");
	}
}
header("Date: ".gmdate( "D, d M Y H:i:s" )." GMT");
header("Last-Modified: ".gmdate( "D, d M Y H:i:s")." GMT");
require(APP_PATH."config.php");
require(LIB_PATH."webservice.php");
require(LIB_PATH."widget.php");
require(LIB_PATH."webhelper.php");
require(APP_PATH."metadata.php");
require(MODEL_PATH."base.php");
require(APP_PATH."components.php");
require(APP_PATH."mywidgets.php");
$cookie = ClientData::getinstance();
$AppConfig['system']['lang'] = $cookie->uiLang;
define("LANG_PATH", APP_PATH."lang".DIRECTORY_SEPARATOR.$AppConfig['system']['lang'].DIRECTORY_SEPARATOR);
define("LANG_UI_PATH", LANG_PATH."ui".DIRECTORY_SEPARATOR);
require(LANG_PATH."lang.php");
$tempdata = explode(" ",microtime());
$data1 = $tempdata[0];
$data2 = $tempdata[1];
$__scriptStart = (double)$data1 + (double)$data2;