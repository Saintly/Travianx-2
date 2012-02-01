<?php
if ( !$this->requestPaymentProvider ){
    echo "<style type=\"text/css\"> \r\nhtml, body {\r\n    margin: 0em;\r\n    padding: 0em;\r\n    background-color: #e9e9e9;\r\n    font-size: 11px;\r\n    font-family: Verdana, Arial, Helvetica, sans-serif;\r\n    color: #333333;\r\n}\r\ndiv.messagebox {\r\n    position: relative;\r\n    margin: 75px auto 75px auto;\r\n    padding: 20px;\r\n    width: 300px;\r\n    background-color: #ffffff;\r\n    border: 2px solid #d6d6d6;\r\n    text-a";
    echo "lign: center;\r\n    font-size: 15px;\r\n    font-weight: bold;\r\n    white-space: nowrap;\r\n}\r\n</style>\r\n \r\n<div class=\"messagebox\"> \r\n<img src=\"assets/default/plus/tgp-bytraviangames.png\" width=\"191\" height=\"252\" alt=\"\"><br><br> \r\n<img src=\"assets/default/plus/loading.gif\" width=\"48\" height=\"48\" alt=\"loading\"><br><br> \r\n";
    echo $this->title;
    echo "</div> \r\n \r\n<div id=\"container\"></div>\r\n\r\n<noscript>Please enable JavaScript in your Browser to continue.</noscript> \r\n";
    echo "<s";
    echo "cript type=\"text/javascript\"> \r\n<!--\r\nfunction createRequestObject() {\r\n    var browser = navigator.appName;\r\n    if (browser == 'Microsoft Internet Explorer') {\r\n        return new ActiveXObject('Microsoft.XMLHTTP');\r\n    } else {\r\n        return new XMLHttpRequest();\r\n    }\r\n\r\n    return null;\r\n}\r\n \r\nfunction loadProviderHtml() {\r\n    http.open('get', 'payment.php?c&p=";
    echo $_GET['p'];
    echo "&pg=";
    echo $_GET['pg'];
    echo "');\r\n    http.onreadystatechange     = handleLoadProviderHtmlResponse;\r\n    http.send(null);\r\n}\r\n \r\nfunction handleLoadProviderHtmlResponse() {\r\n    if (http.readyState == 4) {\r\n        if (http.status == 200) {\r\n            var response        = http.responseText;\r\n            var target          = document.getElementById('container');\r\n            target.innerHTML    = response;\r\n            doc";
    echo "ument.payment.submit();\r\n        } else {\r\n            var target          = document.getElementById('container');\r\n            target.innerHTML    = 'Error: unable to load payment provider. ('+ http.statusText +')';\r\n        }\r\n    }\r\n}\r\n\r\nvar http = createRequestObject();\r\nloadProviderHtml();\r\n//-->\r\n</script>\r\n";
}
elseif($this->providerType == "cashu"){
	$price = $this->package['cost'];
	$token = md5( sprintf( "%s:%s:%s:%s", $this->payment['merchant_id'], $price, strtolower( $this->payment['currency'] ), $this->payment['testMode'] ? $this->payment['testKey'] : $this->payment['key'] ) );
	$dtest = sprintf( "%s ".text_gold_lang, $this->package['gold'] );
	echo "<form action=\"https://www.cashu.com/cgi-bin/pcashu.cgi\" method=\"post\" name=\"payment\">\r\n\t";
	if($this->payment['testMode']){
		echo "<input type=\"hidden\" name=\"test_mode\" value=\"1\">";
	}
	echo "\t";
	if(trim( $this->payment['serviceName'] ) != ""){
		echo "<input type=\"hidden\" name=\"service_name\" value=\"";
		echo $this->payment['serviceName'];
		echo "\">";
	}
	echo "\t<input type=\"hidden\" name=\"merchant_id\" value=\"";
    echo $this->payment['merchant_id'];
    echo "\">\r\n    <input type=\"hidden\" name=\"currency\" value=\"";
    echo $this->payment['currency'];
    echo "\">\r\n    <input type=\"hidden\" name=\"amount\" value=\"";
    echo $price;
    echo "\">\r\n    <input type=\"hidden\" name=\"session_id\" value=\"";
    echo $this->secureId;
    echo "\">\r\n\t<input type=\"hidden\" name=\"token\" value=\"";
    echo $token;
    echo "\">\r\n    <input type=\"hidden\" name=\"display_text\" value=\"";
    echo $dtest;
    echo "\">\r\n\t<input type=\"hidden\" name=\"language\" value=\"";
    echo $this->appConfig['system']['lang'];
    echo "\">\r\n    <input type=\"hidden\" name=\"txt1\" value=\"";
    echo text_gold_lang;
    echo "\">\r\n    <input type=\"image\" src=\"http://www.cashu.com/images/newModel/buyIcons/icon_a3.gif\" value=\"Pay with cashU!\">\r\n</form>\r\n";
}
else if ( $this->providerType == "onecard" )
{
    $dt = date( "ymdHis" );
    $price = $this->package['cost'];
    $token = md5( sprintf( "%s:%s:%s:%s", $this->payment['merchant_id'], $price, strtolower( $this->payment['currency'] ), $this->payment['testMode'] ? $this->payment['testKey'] : $this->payment['key'] ) );
    $dtest = sprintf( "%s ".text_gold_lang, $this->package['gold'] );
    $TransID = base64_encode( base64_decode( $this->secureId ).time( ) );
    $txt1 = base64_decode( $this->secureId )."-".$this->packageIndex."-".$price;
    $key = $this->payment['merchant_id'].$TransID.$price.$this->payment['currency'].$dt.$this->payment['key'];
    $token = md5( $key );
    echo "<form name=\"payment\" action=\"http://onecard.n2vsb.com/customer/integratedPayment.html\" method=\"post\">\r\n<input type=\"hidden\" name=\"OneCard_MProd\" value=\"Tatar War\">\r\n<input type=\"hidden\" name=\"OneCard_Amount\" value=\"";
    echo $price;
    echo "\">\r\n<input type=\"hidden\" name=\"OneCard_MerchID\" value=\"";
    echo $this->payment['merchant_id'];
    echo "\">\r\n<input type=\"hidden\" name=\"OneCard_HashKey\" value=\"";
    echo $token;
    echo "\">\r\n<input type=\"hidden\" name=\"OneCard_Timein\" value=\"";
    echo $dt;
    echo "\" >\r\n<input type=\"hidden\" name=\"OneCard_ReturnURL\" value = \"";
    echo $this->Domain."/paymentservice.php";
    echo "\">\r\n<input type=\"hidden\" name=\"OneCard_TransID\" value=\"";
    echo $TransID;
    echo "\">\r\n<input type=\"hidden\" name=\"OneCard_Currency\" value=\"";
    echo $this->payment['currency'];
    echo "\">\r\n<input type=\"hidden\" name=\"OneCard_Field1\" value=\"";
    echo $this->secureId;
    echo "\">\r\n<input type=\"hidden\" name=\"OneCard_Field2\" value=\"";
    echo $txt1;
    echo "\">\r\n<input id=\"Submit1\" type=\"submit\" value=\"submit\" />\r\n</form>\r\n";
}
else if ( $this->providerType == "paypal" )
{
    require_once( LIB_PATH."paypal.class.php" );
    $p = new paypal_class( );
    if ( $this->payment['testMode'] )
    {
        $p->paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    }
    else
    {
        $p->paypal_url = "https://www.paypal.com/cgi-bin/webscr";
    }
    $dtest = sprintf( "%s ".text_gold_lang, $this->package['gold'] );
    $this_script = $this->Domain."paymentservice_paypal.php";
    $p->add_field( "business", $this->payment['merchant_id'] );
    $p->add_field( "return", $this_script."?action=success" );
    $p->add_field( "cancel_return", $this_script."?action=cancel" );
    $p->add_field( "notify_url", $this_script."?action=ipn" );
    $p->add_field( "item_name", $dtest );
    $p->add_field( "custom", $this->secureId );
    $p->add_field( "bn", "btn_buynow_SM.gif" );
    $p->add_field( "amount", $this->package['cost'] );
    $p->add_field( "currency_code", $this->payment['currency'] );
    $p->submit_paypal_post( );
}
//print_r($GLOBALS);
?>
