<?php
require_once(LANG_UI_PATH."index.php");
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3c.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"eg\" lang=\"eg\">\r\n\t<head>\r\n\t\t<title>";
echo $this->appConfig['page'][$this->appConfig['system']['lang']."_title"];
echo "</title>\r\n\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n\t\t<meta http-equiv=\"content-script-type\" content=\"text/javascript\" />\r\n\t\t<meta http-equiv=\"content-style-type\" content=\"text/css\" />\r\n\t\t<meta content=\"";
echo $this->appConfig['page']['meta-tag'];
echo "\" name=\"description\"> \r\n\t\t<meta content=\"";
echo $this->appConfig['page']['meta-tag'];
echo "\" name=\"keywords\">\r\n        <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/indx/css/style_";
echo $this->appConfig['system']['lang'];
echo ".css";
echo $this->getAssetVersion( );
echo "\"/>\r\n\t\t<meta name=\"google-site-verification\" content=\"vTjsRxnpRzHRJvw5E3uOiAA-jcGayHNOw_SEAD93-fc\" />\r\n\t\t<link rel=\"shortcut icon\" href=\"assets/favicon.ico\" type=\"image/x-icon\" />\r\n\t\t";
echo "<script type=\"text/javascript\">var d3l=";
echo $this->appConfig['system']['lang'] == "ar" ? "180" : "-600";
echo ";</script>\r\n\t\t";
echo "<script src=\"assets/core.js";
echo $this->getAssetVersion( );
echo "\" type=\"text/javascript\"></script>\r\n\t</head>\r\n<body>\r\n<div style=\"position:absolute; top:5px; left:20px;\">\r\n<a href=\"\" onclick=\"setLang('en')\"><img src=\"assets/indx/img/en.jpg\" border=\"0\" title=\"";
echo LANGUI_INDX_T12;
echo "\" alt=\"";
echo LANGUI_INDX_T12;
echo "\" /></a>\r\n<a href=\"\" onclick=\"setLang('ar')\"><img src=\"assets/indx/img/ar.jpg\" border=\"0\" title=\"";
echo LANGUI_INDX_T11;
echo "\" alt=\"";
echo LANGUI_INDX_T11;
echo "\"/></a>\r\n</div>\r\n<div id=\"allcontentts\">\r\n<div id=\"mokatel\"></div>\r\n\t<div id=\"header\">\t\t\r\n\t\t<div class=\"logo\"></div>\r\n\t\t<div class=\"formlogin\">\r\n\t\t<form action=\"index.php\" method=\"post\" name=\"login\">\r\n\t\t<input class=\"text";
if ( $this->errorState == 1 )
{
    echo " iError";
}
echo "\" name=\"name\" type=\"text\" title=\"";
echo LANGUI_INDX_T1;
echo "\" value=\"";
echo $this->name;
echo "\" />\r\n\t\t<input class=\"text";
if ( $this->errorState == 2 )
{
    echo " iError";
}
echo "\" name=\"password\" type=\"password\" title=\"";
echo LANGUI_INDX_T2;
echo "\" value=\"";
echo $this->password;
echo "\" />\r\n\t\t<input name=\"submit\" type=\"submit\" value=\"";
echo LANGUI_INDX_T3;
echo "\" id=\"sub\" />\r\n\t\t</form>\r\n\t\t";
if ( $this->error != "" )
{
    echo "<div style=\"background-color:#FF0000;color:#FFFFFF;padding:2px;width:300px;\">".$this->error."</div>";
}
echo "\t\t</div>\r\n<!-- END [header] Class / ID -->\r\n\t</div>\r\n\r\n\t<div id=\"contentxx\">\r\n    \t<div class=\"writeherethecont\">\r\n    \t\t<div class=\"rightside\">\r\n    \t\t<div class=\"rightstat\"><table class=\"stats\" cellpadding=\"2\" cellspacing=\"2\">\r\n\t\t\t<tr><td>";
echo "<strong>";
echo LANGUI_INDX_T4;
echo ":</strong></td><td>";
echo $this->data['players_count'];
echo "</td></tr> \r\n\t\t\t<tr><td>";
echo "<strong>";
echo LANGUI_INDX_T5;
echo ":</strong></td><td>";
echo $this->data['active_players_count'];
echo "</td></tr> \r\n\t\t\t<tr><td>";
echo "<strong>";
echo LANGUI_INDX_T6;
echo ":</strong></td><td>";
echo $this->data['online_players_count'];
echo "</td></tr> \r\n\t\t</table></div>\r\n    \t\t<div class=\"rightnews\">\r\n    \t\t\t<div class=\"rightnehed\"></div>\r\n    \t\t\t<h5 style=\"padding: 0px 10px 0px 10px\">";
echo nl2br( $this->data['news_text'] );
echo "</h5>\r\n    \t\t</div>\r\n    \t\t</div>\r\n    \t\t<div class=\"leftside\">\r\n    \t\t\t<!-- Content Site -->\r\n<div class=\"intro\">";
echo LANGUI_INDX_T7;
echo "</div>\r\n<div class=\"buttonplay\"><a href=\"register.php\">";
echo "<span>";
echo LANGUI_INDX_T8;
echo "</span></a></div>\r\n<div class=\"sliddxx\">\r\n  <ul id=\"slideshow\">";
echo LANGUI_INDX_T10;
echo "</ul>\r\n  <div id=\"wrapper\">\r\n    <div id=\"fullsize\">\r\n      <div id=\"imgprev\" class=\"imgnav\" title=\"Previous Image\"></div>\r\n      <div id=\"imglink\"></div>\r\n      <div id=\"imgnext\" class=\"imgnav\" title=\"Next Image\"></div>\r\n      <div id=\"image\"></div>\r\n      <div id=\"information\">\r\n        <h3></h3>\r\n        <p></p>\r\n      </div>\r\n    </div>\r\n    <div id=\"thumbnails\">\r\n      <div id=\"slideleft\" title=\"Slide Left\"></div";
echo ">\r\n      <div id=\"slidearea\">\r\n        <div id=\"slider\"></div>\r\n      </div>\r\n      <div id=\"slideright\" title=\"Slide Right\"></div>\r\n    </div>\r\n  </div>\r\n  ";
echo "<script type=\"text/javascript\" src=\"assets/indx/js/compressed.js";
echo $this->getAssetVersion( );
echo "\"></script> \r\n  ";
echo "<script type=\"text/javascript\">\r\n\t\$('slideshow').style.display='none';\r\n\t\$('wrapper').style.display='block';\r\n\tvar slideshow=new TINY.slideshow(\"slideshow\");\r\n\twindow.onload=function(){\r\n\t\tslideshow.auto=true;\r\n\t\tslideshow.speed=5;\r\n\t\tslideshow.link=\"linkhover\";\r\n\t\tslideshow.info=\"information\";\r\n\t\tslideshow.thumbs=\"slider\";\r\n\t\tslideshow.left=\"slideleft\";\r\n\t\tslideshow.right=\"slideright\";\r\n\t\tslideshow";
echo ".scrollSpeed=4;\r\n\t\tslideshow.spacing=5;\r\n\t\tslideshow.active=\"#fff\";\r\n\t\tslideshow.init(\"slideshow\",\"image\",\"imgprev\",\"imgnext\",\"imglink\");\r\n\t}\r\n</script> \r\n</div>\r\n<div class=\"register\"><a href=\"manual.php\">";
echo "<span>";
echo LANGUI_INDX_T9;
echo "</span></a></div>\r\n<div class=\"bannerads\" align=\"center\">\r\n";
if(0 < sizeof($this->banner)){
	if($this->banner['type'] == "image"){
		echo "<a target=\"_blank\" href=\"banner.php?url=".base64_encode( $this->banner['ID'] )."\"> \r\n\t\t<img height=\"60\" width=\"550\" src=\"".$this->banner['image']."\" border=\"0\" title=\"".$this->banner['name']."\"  alt=\"".$this->banner['name']."\"></a> ";
	}
	else{
		echo "<embed height=\"60\" width=\"550\" onclick=\"window.location.href('banner.php?url=".base64_encode( $this->banner['ID'] )."')\" title=\"".$this->banner['name']."\" src=\"".$this->banner['image']."\" />";
	}
}
echo "</div>\r\n<div class=\"copyr\">\r\n";
require_once( LANG_UI_PATH."footer.php" );
echo "<span><a href=\"manual.php\">";
echo LANGUI_FOOTER_MANUAL;
echo "</a></span> |\r\n";
echo "<span><a href=\"training.php\">";
echo LANGUI_FOOTER_TRAINING;
echo "</a></span> |\r\n";
echo "<span><a href=\"";
echo $this->appConfig['system']['forum_url'];
echo "\" target=\"_blank\">";
echo LANGUI_INDX_T13;
echo "</a></span> |\r\n";
echo "<span><a href=\"";
echo $this->appConfig['system']['social_url'];
echo "\" target=\"_blank\">";
echo LANGUI_INDX_T14;
echo "</a></span> |\r\n";?>
					<span><a href="#" target="_blank">Copyright &copy; TravianX</a></span>
				</div>
			</div>
		</div>
	</div>
	<div id="footer"></div>
</div>
</body>
<script type="text/javascript">init();</script>
</html>