<?php
require_once( LANG_UI_PATH."msg.php" );
echo "<h1>";
echo LANGUI_MSG_T1;
echo "</h1>\r<div id=\"textmenu\">\r   <a href=\"msg.php\"";
if ( $this->selectedTabIndex == 0 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_MSG_T2;
echo "</a>\r | <a href=\"msg.php?t=1\"";
if ( $this->selectedTabIndex == 1 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_MSG_T3;
echo "</a>\r | <a href=\"msg.php?t=2\"";
if ( $this->selectedTabIndex == 2 )
{
    echo " class=\"selected\"";
}
echo ">";
echo LANGUI_MSG_T4;
echo "</a>\r</div>\r\r";
if ( $this->showList )
{
    echo "<form method=\"post\" action=\"msg.php?p=";
    echo $this->pageIndex;
    if ( $this->selectedTabIndex == 2 )
    {
        echo "&t=2";
    }
    echo "\" name=\"msg\">\r<table cellpadding=\"1\" cellspacing=\"1\" id=\"overview\" class=\"row_table_data\">\r\t<thead>\r\t\t<tr>\r\t\t\t<th colspan=\"2\">";
    echo LANGUI_MSG_T5;
    echo "</th>\r\t\t\t<th>";
    echo $this->selectedTabIndex == 2 ? LANGUI_MSG_T6 : LANGUI_MSG_T7;
    echo "</th>\r\t\t\t<th class=\"sent\">";
    echo LANGUI_MSG_T8;
    echo "</th>\r\t\t</tr>\r\t</thead>\r\t<tbody>\r\t\t";
    $_c = 0;
    while ( $this->dataList->next( ) )
    {
        ++$_c;
        echo "\t\t<tr>\r\t\t\t<td class=\"sel\"><input class=\"check\" type=\"checkbox\" name=\"dm[]\" value=\"";
        echo $this->dataList->row['id'];
        echo "\"></td>\r\t\t\t<td class=\"top\"><a href=\"msg.php?id=";
        echo $this->dataList->row['id'];
        echo "\">";
        echo $this->dataList->row['msg_title'];
        echo "</a>";
        if ( !$this->dataList->row['is_readed'] )
        {
            echo $this->selectedTabIndex == 0 ? " ".LANGUI_MSG_T9 : " ".LANGUI_MSG_T10;
        }
        echo "</td>\r\t\t\t<td class=\"send\">";
        if ( 0 < $this->dataList->row['uid'] )
        {
            echo "<a href=\"profile.php?uid=";
            echo $this->dataList->row['uid'];
            echo "\">";
            echo $this->dataList->row['uname'];
            echo "</a>";
        }
        else
        {
            echo "<s";
            echo "pan class=\"none\">";
            echo $this->dataList->row['uname'];
            echo "</span>";
        }
        echo "</td>\r\t\t\t<td class=\"dat\">";
        echo $this->dataList->row['mdate'];
        echo "</td>\r\t\t</tr>\r\t\t";
    }
    if ( $_c == 0 )
    {
        echo "\t\t<tr><td colspan=\"4\">";
        echo "<s";
        echo "pan class=\"none\">";
        echo LANGUI_MSG_T11;
        echo "</span></td></tr>\r\t\t";
    }
    echo "\t</tbody>\r\t<tfoot>\r\t\t<tr>\r\t\t\t<th>&nbsp;</th>\r\t\t\t<th colspan=\"2\" class=\"buttons\">";
    if ( 0 < $_c )
    {
        echo "<input name=\"delmsg\" value=\"";
        echo LANGUI_MSG_T12;
        echo "\" type=\"image\" id=\"btn_delete\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
        echo LANGUI_MSG_T12;
        echo "\">";
    }
    echo "</th>\r\t\t\t<th class=\"navi\">";
    echo $this->getPreviousLink( );
    echo " ";
    echo $this->getNextLink( );
    echo "</th>\r\t\t</tr>\r\t</tfoot>\r</table>\r</form>\r";
}
else
{
    echo "<s";
    echo "cript language=\"JavaScript\" type=\"text/javascript\">\r\tfunction closeFriendsList() {\r\t\t_('adressbook').className = 'hide';\r\t}\t\r\tfunction toggleFriendsList() {\r\t\tvar book = _('adressbook');\r\t\tbook.className = (book.className == 'hide') ? '' : 'hide';\r\t}\r\tfunction copyElement(element) {\r\t\tif (element == 'receiver') {\r\t\t\t_('copy_receiver').value = _('receiver').value;\r\t\t} else if (element == 'subject')";
    echo " {\r\t\t\t_('copy_subject').value = _('subject').value;\r\t\t} else if (element == 'body') {\r\t\t\t_('copy_igm').value = _('igm').value;\r\t\t}\r\t}\r\tfunction setReceiver(name) {\r\t\t_('receiver').value = name;\r\t\tcopyElement('receiver');\r\t}\r\tfunction delFriend (uid) {\r\t\t_(\"fma\").value=uid;\r\t\tdocument.abform.submit();\r\t}\r</script>\r";
    echo "<s";
    echo "pan class=\"error\">";
    echo $this->errorText;
    echo "</span>\r<div id=\"write_head\" class=\"msg_head\"></div>\r<div id=\"write_content\" class=\"msg_content\">\r\t<form method=\"post\" action=\"msg.php\" accept-charset=\"UTF-8\" name=\"msg\">\r\t\t<input type=\"hidden\" name=\"";
    echo $this->viewOnly ? "rm" : "sm";
    echo "\" value=\"\">\t\t\r\t\t<img src=\"assets/x.gif\" id=\"label\" class=\"";
    echo $this->sendMail ? "send" : "read";
    echo "\" alt=\"\">\r\t\t<div id=\"heading\">\r\t\t\t<input class=\"text\" type=\"text\"";
    if ( $this->viewOnly )
    {
        echo " readonly=\"readonly\"";
    }
    echo " name=\"an\" id=\"receiver\" value=\"";
    echo htmlspecialchars( $this->receiver );
    echo "\" maxlength=\"20\" onkeyup=\"copyElement('receiver')\" tabindex=\"1;\"><br>\r\t\t\t<input class=\"text\" type=\"text\"";
    if ( $this->viewOnly )
    {
        echo " readonly=\"readonly\"";
    }
    echo " name=\"be\" id=\"subject\" value=\"";
    echo htmlspecialchars( $this->subject );
    echo "\" maxlength=\"35\" onkeyup=\"copyElement('subject')\" tabindex=\"2;\">\r\t\t</div>\r\t\t";
    if ( $this->viewOnly )
    {
        echo "\t\t<div id=\"time\">\r\t\t\t<div>";
        echo $this->messageDate;
        echo "</div>\r\t\t\t<div>";
        echo $this->messageTime;
        echo "</div>\r\t\t</div>\r\t\t";
    }
    else
    {
        echo "\t\t<a id=\"adbook\" href=\"#\" onclick=\"toggleFriendsList(); return false;\"><img src=\"assets/x.gif\" alt=\"";
        echo LANGUI_MSG_T13;
        echo "\" title=\"";
        echo LANGUI_MSG_T13;
        echo "\"></a>\r\t\t";
    }
    echo "\t\t<div class=\"clear\"></div>\r\t\t<div id=\"line\"></div>\r\t\t<textarea class=\"textarea write\" name=\"message\" id=\"igm\" onkeyup=\"copyElement('body')\" tabindex=\"3;\"";
    if ( $this->viewOnly )
    {
        echo " readonly=\"readonly\"";
    }
    echo ">";
    echo htmlspecialchars( $this->body );
    echo "</textarea>\r\t\t";
    if ( $this->isInbox )
    {
        echo "\t\t<p class=\"btn\">\r\t\t\t";
        if ( $this->viewOnly )
        {
            echo "\t\t\t<input type=\"image\" value=\"\" name=\"s1\" id=\"btn_reply\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
            echo LANGUI_MSG_T14;
            echo "\">\r\t\t\t";
        }
        else
        {
            echo "\t\t\t<input type=\"image\" value=\"\" name=\"s1\" id=\"btn_send\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
            echo LANGUI_MSG_T15;
            echo "\" tabindex=\"4;\">\t\t\t\r\t\t\t";
        }
        echo "\t\t</p>\r\t\t";
    }
    echo "\t</form>\r";
    if ( !$this->viewOnly )
    {
        echo "\t<div id=\"adressbook\" class=\"";
        if ( !$this->showFriendPane )
        {
            echo "hide";
        }
        echo "\">\r\t<h2>";
        echo LANGUI_MSG_T13;
        echo "</h2>\r\t<form method=\"post\" name=\"abform\" action=\"msg.php\" accept-charset=\"UTF-8\">\r\t\t<input type=\"hidden\" id=\"fma\" name=\"fm\" value=\"\">\r\t\t<input type=\"hidden\" id=\"copy_receiver\" name=\"an\" value=\"";
        echo htmlspecialchars( $this->receiver );
        echo "\">\r\t\t<input type=\"hidden\" id=\"copy_subject\" name=\"be\" value=\"";
        echo htmlspecialchars( $this->subject );
        echo "\">\r\t\t<input type=\"hidden\" id=\"copy_igm\" name=\"message\" value=\"";
        echo htmlspecialchars( $this->body );
        echo "\">\r\t\t\r\t\t<table cellpadding=\"1\" cellspacing=\"1\" id=\"friendlist\">\r\t\t\t<tbody>\r\t\t\t\t<tr>\r\t\t\t\t";
        $_c = 1;
        foreach ( $this->friendList as $friendId => $friendName )
        {
            echo "\t\t\t\t<td class=\"end\"><img onclick=\"delFriend(";
            echo $friendId;
            echo ")\" src=\"assets/x.gif\" class=\"del\" title=\"";
            echo LANGUI_MSG_T12;
            echo "\" alt=\"";
            echo LANGUI_MSG_T12;
            echo "\"></td>\r\t\t\t\t<td class=\"pla\"><a href=\"#\" onclick=\"closeFriendsList(); setReceiver('";
            echo htmlspecialchars( $friendName );
            echo "'); return false;\">";
            echo $friendName;
            echo "</a></td>\r\t\t\t\t<td class=\"on\"></td>\r\t\t\t\t";
            echo $_c % 2 == 0 ? "</tr>" : "<td></td>";
            echo "\t\t\t\t";
            ++$_c;
        }
        echo "\t\t\t\r\t\t\t\t";
        $i = $_c;
        while ( $i <= 20 )
        {
            echo "\t\t\t\t<td class=\"end\"></td>\r\t\t\t\t<td class=\"pla\"><input class=\"text\" type=\"text\" name=\"mfriends[]\" value=\"\" maxlength=\"15\"></td>\r\t\t\t\t<td class=\"on\"></td>\r\t\t\t\t";
            echo $i % 2 == 0 ? "</tr>" : "<td></td>";
            echo "\t\t\t\t";
            ++$i;
        }
        echo "\t\t\t</tbody>\r\t\t</table>\r\t\t<p class=\"btn\"><input type=\"image\" value=\"\" name=\"s1\" id=\"btn_save\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"";
        echo text_save_lang;
        echo "\"></p>\r\t</form>\r\t<a href=\"#\" onclick=\"closeFriendsList(); return false;\"><img src=\"assets/x.gif\" id=\"close\" alt=\"";
        echo LANGUI_MSG_T16;
        echo "\" title=\"";
        echo LANGUI_MSG_T16;
        echo "\"></a>\r\t</div>\r";
    }
    echo "</div>\r<div id=\"write_foot\" class=\"msg_foot\"></div>\r";
    if ( 0 < intval( $this->data['alliance_id'] ) )
    {
        echo "<s";
        echo "pan class=\"error\">";
        echo LANGUI_MSG_T17;
        echo "</span>";
    }
}
?>
