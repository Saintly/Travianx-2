<?php
require_once( LANG_UI_PATH."snprofile.php" );
echo "<h1>";
echo $this->myData['name'];
echo "</h1>\r\n<link type=\"text/css\" rel=\"stylesheet\" media=\"all\" href=\"assets/chat.css";
echo $this->getAssetVersion( );
echo "\" />\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/wowwindow.css";
echo $this->getAssetVersion( );
echo "\">\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"assets/jquery.min.js";
echo $this->getAssetVersion( );
echo "\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"assets/jquery.timeago.js";
echo $this->getAssetVersion( );
echo "\"></script>\r\n";
echo "<script type=\"text/javascript\" src=\"assets/chat.js";
echo $this->getAssetVersion( );
echo "\"></script>\r\n";
echo "<script type=\"text/javascript\" src=\"assets/widget.js";
echo $this->getAssetVersion( );
echo "\"></script>\r\n";
echo "<script type=\"text/javascript\" src=\"assets/jquery.wowwindow.min.js";
echo $this->getAssetVersion( );
echo "\"></script>\r\n";
echo "<style type=\"text/css\">\r\n<!--\r\n#newsbox {\r\n\ttext-align:left;\r\n\tmargin:0 auto;\r\n\tmargin-bottom:25px;\r\n\tpadding:10px;\r\n\tbackground:#fff;\r\n\theight:30px;\r\n\twidth:230px;\r\n\tborder:1px solid #71D000;\r\n\toverflow:auto;\r\n}\r\n.imgborder {\r\n    border: 1px solid #CCCCCC;\r\n    margin: 2px;\r\n    padding: 2px;\r\n}\r\n.coldiv {\r\n    float: right;\r\n    height: auto !important;\r\n    min-height: 50px;\r\n    padding: 5px;\r\n ";
echo "   width: 500px;\r\n}\r\n.coldiv table td{\r\n\ttext-align:right !important;\r\n}\r\n.delete_button a{\r\n    font-weight: bold;\r\n    height: 10px;\r\n    margin-left: 10px;\r\n\tcolor:#069;\r\n\tcursor:pointer;\r\n    width: 7px;\r\n\tfont-size:10px;\r\n\tfloat:left;\r\n}\r\nimg {\r\n    border: 0 none;\r\n}\r\nabbr {\r\n    border-bottom: medium none;\r\n\tcolor:#CCC;\r\n\tfont-size:9px;\r\n}\r\n.comment_ui , .comment_u div table, .comment_u div";
echo " table td, .comment_u div table tr{\r\n    background-color: #EDEFF4 !important;\r\n    border-bottom: 1px solid #E5EAF1 !important;\r\n    margin-bottom: 2px;\r\n    overflow: hidden;\r\n    width: 399px;\r\n}\r\n.com, .com td{\r\n    background-color: #EDEFF4 !important;\r\n    border-bottom: 1px solid #E5EAF1 !important;\r\n    margin-bottom: 2px;\r\n}\r\n.newcomment{\r\n\tborder:#CCC 1px solid;\r\n}\r\n.label{\r\n\ttext-align:";
echo "right !important;\r\n\tfloat:right;\r\n\tpadding-bottom: 5px;\r\n}\r\ntextarea, .inputtext, .inputpassword {\r\n    font-size: 11px;\r\n    padding: 3px;\r\n}\r\n\r\n-->\r\n</style>\r\n";
echo "<s";
echo "cript type=\"text/javascript\">\r\n        \$(document).ready(function() {\r\n            \$('#youtube-auto-thumbnails a').wowwindow({\r\n                draggable: true,\r\n                width: 480,\r\n                height: 390,\r\n                videoIframe: false,\r\n                autoYouTubeThumb: 'default'\r\n            });\r\n        });\r\n    </script>\r\n";
if ( $this->myData['id'] == $this->uid )
{
    echo "<form action=\"snprofile.php?uid=";
    echo $this->uid;
    echo "&do=News\" method=\"POST\">\r\n<table cellpadding=\"1\" cellspacing=\"1\" id=\"links\">\r\n\t<tbody>\r\n    \t<tr>\r\n            <td>\r\n                <label class=\"label\" for=\"newsImage\">";
    echo LANGUI_PROFILE_T1;
    echo "</label><br />\r\n                <input name=\"image\" id=\"newsImage\" style=\"width:90%\" type=\"text\" class=\"text\" />\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <label class=\"label\" for=\"newsSite\">";
    echo LANGUI_PROFILE_T3;
    echo "</label><br />\r\n                <input name=\"url\" id=\"newsSite\" style=\"width:90%\" type=\"text\" class=\"text\" />\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <label class=\"label\" for=\"newsyoutube\">";
    echo LANGUI_PROFILE_T4;
    echo "</label><br />\r\n                <input name=\"youtube\" id=\"newsyoutube\" style=\"width:90%\" type=\"text\" class=\"text\" />\r\n            </td>\r\n        </tr>\r\n    \t<tr>\r\n            <td>\r\n            \t<label class=\"label\" for=\"newsbox\">";
    echo LANGUI_PROFILE_T2;
    echo "</label><br />\r\n            \t<textarea id=\"newsbox\" style=\"width:90%\" name=\"news\" class=\"text\"></textarea>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n        \t<td class=\"btn\"><input type=\"image\" value=\"\" name=\"s1\" id=\"btn_send\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"إرسال\" /></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</form>\r\n<br />\r\n";
}
$i = 0;
while ( $i < count( $this->topics ) )
{
    echo "<div id=\"";
    echo $this->topics[$i]['news']['ID'];
    echo "\" class=\"coldiv\">\r\n  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"500\" id=\"post_";
    echo $this->topics[$i]['news']['ID'];
    echo "\">\r\n    <tbody>\r\n      <tr>\r\n        <td></td>\r\n        <td>\r\n        ";
    if ( $this->myData['id'] == $this->uid )
    {
        echo "        ";
        echo "<s";
        echo "pan class=\"delete_button\"><a href=\"snprofile.php?uid=";
        echo $this->uid;
        echo "&DNid=";
        echo $this->topics[$i]['news']['ID'];
        echo "\">X</a></span>\r\n        ";
    }
    echo "        </td>\r\n      </tr>\r\n      <tr>\r\n        <td width=\"54\" valign=\"top\" rowspan=\"2\"><a href=\"snprofile.php?uid=";
    echo $this->userData['id'];
    echo "\"><img width=\"50\" height=\"50\" src=\"";
    echo $this->userData['avatar'];
    echo "\" /></a></td>\r\n        <td width=\"436\"><font size=\"2\" style=\"font-weight:bold;\"> <a href=\"snprofile.php?uid=";
    echo $this->userData['id'];
    echo "\">";
    echo $this->userData['name'];
    echo "</a> </font></td>\r\n      </tr>\r\n      <!--start news -->\r\n      <tr>\r\n        <td>\r\n        <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\r\n        \t<tr>\r\n        ";
    if ( !empty( $this->topics[$i]['news']['image'] ) )
    {
        echo "        \t<td valign=\"middle\" width=\"90\" height=\"90\"><img align=\"absmiddle\" width=\"90\" height=\"90\" class=\"imgborder\" src=\"";
        echo $this->topics[$i]['news']['image'];
        echo "\" /></td>\r\n        ";
    }
    echo "         ";
    if ( !empty( $this->topics[$i]['news']['youtube'] ) )
    {
        echo "        \t<td valign=\"middle\">\r\n                <div id=\"youtube-auto-thumbnails\">\r\n                \t<a title=\"";
        echo $this->topics[$i]['news']['youtube'];
        echo "\" href=\"";
        echo $this->topics[$i]['news']['youtube'];
        echo "\"><img border=\"0\" align=\"absmiddle\" width=\"90\" height=\"90\" class=\"imgborder\" src=\"images/play.gif\" alt=\"\"></a>\r\n                </div>\r\n            </td>\r\n        ";
    }
    echo "        ";
    if ( !empty( $this->topics[$i]['news']['url'] ) )
    {
        $info = array( );
        $tags = get_meta_tags( $this->topics[$i]['news']['url'] );
        $info['title'] = isset( $tags['title'] ) ? $tags['title'] : $this->topics[$i]['news']['url'];
        $info['description'] = isset( $tags['description'] ) ? $tags['description'] : $this->topics[$i]['news']['url'];
        echo "        \t<td valign=\"middle\" width=\"90\" height=\"90\">\r\n            <h3>";
        echo $info['title'];
        echo "</h3>\r\n            ";
        echo $info['description'];
        echo "<br />\r\n            <a href=\"";
        echo $this->topics[$i]['news']['url'];
        echo "\">";
        echo $this->topics[$i]['news']['url'];
        echo "</a>\r\n            </td>\r\n        ";
    }
    echo "            <td>\r\n            \t";
    echo $this->topics[$i]['news']['message'];
    echo "            </td>\r\n        \t</tr>\r\n        </table><br />\r\n        <font color=\"#CCCCCC\"><abbr class=\"timeago\" title=\"";
    echo date( "c", $this->topics[$i]['news']['date'] );
    echo "\">";
    echo date( "F j, Y", $this->topics[$i]['news']['date'] );
    echo "</abbr></font>\r\n        </td>\r\n      </tr>\r\n      <!--end news -->\r\n      ";
    if ( isset( $this->topics[$i]['news']['comment'] ) )
    {
        $t = 0;
        while ( $t < count( $this->topics[$i]['news']['comment'] ) )
        {
            echo "      <tr>\r\n      \t<td>&nbsp;</td>\r\n        <td>\r\n        <div id=\"comment_";
            echo $this->topics[$i]['news']['comment'][$t]['ID'];
            echo "\">\r\n    <div class=\"comment_ui\">\r\n    <div class=\"comment_text\">\r\n\r\n\t";
            if ( $this->myData['id'] == $this->uid || $this->myData['id'] == $this->topics[$i]['news']['comment'][$t]['userid'] )
            {
                echo "        ";
                echo "<s";
                echo "pan class=\"delete_button\"><a href=\"snprofile.php?uid=";
                echo $this->uid;
                echo "&DCid=";
                echo $this->topics[$i]['news']['comment'][$t]['ID'];
                echo "\">X</a></span>\r\n    ";
            }
            echo "\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"com\" id=\"";
            echo $this->topics[$i]['news']['comment'][$t]['ID'];
            echo "\">\r\n  <tr>\r\n   <td rowspan=\"2\" valign=\"top\" width=\"30\" height=\"30\"><a href=\"snprofile.php?uid=";
            echo $this->topics[$i]['news']['comment'][$t]['userid'];
            echo "\"><img src=\"";
            echo $this->topics[$i]['news']['comment'][$t]['avatar'];
            echo "\" width=\"30\" height=\"30\" /></a></td>\r\n   <td>\r\n    <a href=\"snprofile.php?uid=";
            echo $this->topics[$i]['news']['comment'][$t]['userid'];
            echo "\" style=\"font-weight:bold\">\r\n    <div>";
            echo $this->topics[$i]['news']['comment'][$t]['username'];
            echo "</div></a>\r\n\t<font size=\"2\">";
            echo $this->topics[$i]['news']['comment'][$t]['comment'];
            echo "</font></td>\r\n</tr>\r\n<tr>\r\n  <td><abbr class=\"timeago\" title=\"";
            echo date( "c", $this->topics[$i]['news']['comment'][$t]['date'] );
            echo "\">";
            echo date( "F j, Y", $this->topics[$i]['news']['comment'][$t]['date'] );
            echo "</abbr></td>\r\n</tr>\r\n</table>\r\n\r\n</div>\r\n</div>\r\n</div>\r\n        </td>\r\n      </tr>\r\n      ";
            ++$t;
        }
    }
    echo "      ";
    if ( $this->isFriend )
    {
        echo "      <tr>\r\n        <td>&nbsp;</td>\r\n        <td>\r\n          <div class=\"newcomment\">\r\n            <form name=\"comment\" id=\"comment";
        echo $this->topics[$i]['news']['ID'];
        echo "\" class=\"comment\" method=\"post\" action=\"?uid=";
        echo $this->uid;
        echo "&do=comment\">\r\n              <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <input type=\"hidden\" value=\"";
        echo $this->topics[$i]['news']['ID'];
        echo "\" name=\"topicid\">\r\n                <input type=\"hidden\" value=\"";
        echo $this->uid;
        echo "\" name=\"to\">\r\n                <tbody>\r\n                  <tr>\r\n                    <td valign=\"top\" rowspan=\"2\"><img width=\"30\" height=\"30\" src=\"";
        echo $this->myData['avatar'];
        echo "\" /></td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td valign=\"top\" colspan=\"2\"><textarea cols=\"65\" class=\"text\" name=\"comment\" style=\"overflow: hidden;\"></textarea>\r\n                      <br>\r\n                      \t<p class=\"btn\">\r\n\t\t\t\t\t\t\t<input type=\"image\" value=\"\" name=\"s1\" id=\"btn_send\" class=\"dynamic_img\" src=\"assets/x.gif\" alt=\"إرسال\" tabindex=\"4;\">\t\t\t\r\n\t\t\t\t\t\t</p>\r";
        echo "\n                      </td>\r\n                  </tr>\r\n                </tbody>\r\n              </table>\r\n            </form>\r\n          </div></td>\r\n      </tr>\r\n      ";
    }
    echo "      <tr>\r\n        <td colspan=\"2\"><hr /></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n</div>\r\n";
    ++$i;
}
echo "<table>\r\n\t<tr>\r\n        <td class=\"table_body\"><div align=\"center\">";
echo $this->getPreviousLink( );
echo " &nbsp; | &nbsp; ";
echo $this->getNextLink( );
echo "</div></td>\r\n        <td class=\"table_body\"><div align=\"center\">\r\n        ";
echo "<s";
echo "elect name=\"p\" onchange=\"window.location.href=('snprofile.php?uid=";
echo $this->uid;
echo "&p='+this.value)\">\r\n        ";
$i = 1;
$c = 0;
while ( $i <= $this->pageCount )
{
    echo "            <option value=\"";
    echo $c;
    echo "\"";
    if ( isset( $_GET['p'] ) && $_GET['p'] == $c )
    {
        echo " selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n        ";
    ++$i;
    ++$c;
}
echo "        </select>\r\n        </div></td>\r\n\t</tr>\r\n</table>\r\n<div id=\"footpanel\">\r\n    <div class=\"onlineWidget\">\r\n        <div class=\"panel\">\r\n        ";
$online = 0;
foreach ( $this->friendList as $friendLists )
{
    if ( 1000 <= $friendLists[3] )
    {
        $img = "bullet_black.png";
    }
    else
    {
        $img = "bullet_green.png";
        ++$online;
    }
    echo "            <a href=\"javascript:void(0)\" onClick=\"javascript:chatWith('";
    echo $friendLists[1];
    echo "_-_";
    echo $friendLists[0];
    echo "')\">\r\n            <img src=\"";
    echo $friendLists[2];
    echo "\" align=\"absmiddle\" border=\"0\" alt=\"";
    echo $friendLists[1];
    echo "\" title=\"";
    echo $friendLists[1];
    echo "\" width=\"33\" height=\"30\" />&nbsp;\r\n            ";
    echo $friendLists[1];
    echo "</a>\r\n            &nbsp;<img align=\"absmiddle\" src=\"assets/default/img/";
    echo $img;
    echo "\" /> \r\n        ";
}
echo "        </div>\r\n        <div class=\"count\">";
echo $online;
echo "</div>\r\n        <div class=\"label\">online</div>\r\n        \r\n        <div class=\"arrow\"></div>\r\n    </div>\r\n</div>\r\n";
echo "<s";
echo "cript type=\"text/javascript\">\r\njQuery(document).ready(function() {\r\n  jQuery(\"abbr.timeago\").timeago();\r\n});\r\n</script>";
?>
