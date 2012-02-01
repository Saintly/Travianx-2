<?php
require_once( LANG_UI_PATH."password.php" );
echo "<h1><img src=\"assets/x.gif\" class=\"passwort\" alt=\"";
echo LANGUI_PWD_T1;
echo "\"></h1>\r\n<h5><img src=\"assets/x.gif\" class=\"img_u22\" alt=\"";
echo LANGUI_PWD_T2;
echo "\"></h5>\r\n";
if ( $this->pageState == 1 )
{
    echo "<p>";
    echo LANGUI_PWD_T3;
    echo "</p>\r\n<form action=\"password.php\" method=\"post\">\r\n\t<p>\r\n\t\t<b>";
    echo LANGUI_PWD_T4;
    echo "</b><br>\r\n\t\t<input type=\"hidden\" name=\"id\" value=\"";
    echo $this->playerId;
    echo "\">\r\n\t\t<input class=\"text\" type=\"text\" name=\"email\" maxlength=\"50\">\r\n\t</p>\r\n\t<p>\r\n\t\t<input type=\"image\" value=\"ok\" name=\"s1\" src=\"assets/x.gif\" class=\"dynamic_img\" id=\"btn_ok\" alt=\"";
    echo text_okdone_lang;
    echo "\">\r\n\t</p>\r\n</form>\r\n";
}
else if ( $this->pageState == 2 )
{
    echo LANGUI_PWD_T5;
}
else if ( $this->pageState == 3 )
{
    echo LANGUI_PWD_T6;
}
else if ( $this->pageState == 4 )
{
    echo LANGUI_PWD_T7;
}
else if ( $this->pageState == 5 )
{
    echo LANGUI_PWD_T8;
}
?>
