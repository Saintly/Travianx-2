<?php
echo "<h1>";
echo text_pnotes_lang;
echo "</h1>\r\n<form method=\"post\" action=\"notes.php\">\r\n<div id=\"block\">\r\n\t<textarea name=\"notes\" id=\"notice\">";
echo $this->data['notes'];
echo "</textarea>\r\n\t<p class=\"btn\">\r\n\t\t<input id=\"btn_save\" type=\"image\" value=\"\" name=\"s1\" src=\"assets/x.gif\" class=\"dynamic_img\" alt=\"";
echo text_save_lang;
echo "\"><br/>\r\n\t\t";
if ( $this->saved )
{
    echo text_newssaved_lang;
}
echo "\t</p>\r\n</div>\r\n</form>";
?>
