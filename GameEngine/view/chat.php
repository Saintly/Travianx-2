<?php
require_once(LANG_UI_PATH."chat.php");
echo "<h1>";
echo LANGUI_CHAT_T1;
echo "</h1>\r\n";
echo "<s";
echo "tyle type=\"text/css\">\r\n<!--\r\n#chatbox {\r\n\ttext-align:left;\r\n\tmargin:0 auto;\r\n\tmargin-bottom:25px;\r\n\tpadding:10px;\r\n\tbackground:#fff;\r\n\theight:270px;\r\n\twidth:430px;\r\n\tborder:1px solid #71D000;\r\n\toverflow:auto;\r\n}\r\n#usermsg {\r\n\twidth:395px;\r\n\tborder:1px solid #71D000;\r\n}\r\n#submit { width: 60px; }\r\n.msgln { margin:0 0 2px 0;direction:ltr }\r\n-->\r\n</style>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"assets/jquery.min.js";
echo $this->getAssetVersion( );
echo "\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\">\r\n// jQuery Document\r\n\$(document).ready(function(){\r\n\t//If user submits the form\r\n\tfunction SendMsg(){\r\n\t\tvar clientmsg = \$(\"#usermsg\").val();\r\n\t\tif(clientmsg != ''){\r\n\t\t\t\$.post(\"chat.php\", {text: clientmsg});\t\t\t\t\r\n\t\t\t\$(\"#usermsg\").attr(\"value\", \"\");\r\n\t\t}\r\n\t\t\$(\"#usermsg\").focus();\r\n\t}\r\n\t\$(\"#submitmsg\").click(function(){\t\r\n\t\tSendMsg();\r\n\t\treturn false;\r\n\t});\r\n\t//Load th";
echo "e file containing the chat log\r\n\tfunction loadLog(){\t\t\r\n\t\tvar oldscrollHeight = \$(\"#chatbox\").attr(\"scrollHeight\") - 20;\r\n\t\t\$.ajax({\r\n\t\t\turl: \"ajaxchat.php\",\r\n\t\t\tcache: false,\r\n\t\t\tsuccess: function(html){\r\n\t\t\t\t\$(\"#chatbox\").html(html); //Insert chat log into the #chatbox div\t\t\t\t\r\n\t\t\t\tvar newscrollHeight = \$(\"#chatbox\").attr(\"scrollHeight\") - 20;\r\n\t\t\t\tif(newscrollHeight > oldscrollHeight){\r\n\t\t\t\t\t\$(";
echo "\"#chatbox\").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div\r\n\t\t\t\t}\t\t\t\t\r\n\t\t  \t},\r\n\t\t});\r\n\t}\r\n\tsetInterval (loadLog, 2500);\t//Reload file every 2.5 seconds\r\n\t\$('#usermsg').bind('keypress', function(e) {\r\n\t\t//alert(e.keyCode);\r\n\t\tvar code = (e.keyCode ? e.keyCode : e.which);\r\n\t\t if(code == 13) { //Enter keycode\r\n\t\t   \tSendMsg();\r\n\t\t\treturn false;\r\n\t\t }\r\n\t});\r\n});\r\n</sc";
echo "ript>\r\n<div id=\"chatbox\">\r\n";
$storCtat = array( );
while ( $this->chats->next( ) )
{
    $text = $this->Filter->FilterWords( $this->chats->row['text'] );
    $storCtat[$this->chats->row['ID']] = array(
        date( "g:i A", $this->chats->row['date'] ),
        $this->chats->row['username'],
        $text,
        $this->chats->row['userid']
    );
}
ksort( $storCtat );
foreach ( $storCtat as $ChatLine )
{
    echo "<div class=\"msgln\">(".$ChatLine[0].") <b><a href=\"profile.php?uid=".$ChatLine[3]."\" target=\"_blank\">".$ChatLine[1]."</a></b>: ".$ChatLine[2]."<br></div>";
}
echo "</div>\r\n<div>\r\n<form name=\"message\" action=\"\">\r\n  <input name=\"usermsg\" class=\"text\" type=\"text\" id=\"usermsg\" size=\"63\" />\r\n  <input name=\"submitmsg\" type=\"button\" id=\"submitmsg\" value=\"";
echo LANGUI_CHAT_T2;
echo "\" />\r\n</form>\r\n</div>";
?>
