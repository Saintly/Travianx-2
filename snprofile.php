<?php
require(".".DIRECTORY_SEPARATOR."GameEngine".DIRECTORY_SEPARATOR."boot.php");
require_once(MODEL_PATH."snprofile.php");
class GPage extends securegamepage{

	public $topics = array();
	public $pageSize = 20;
	public $pageIndex = NULL;
	public $pageCount = NULL;
	public $uid = 0;
	public $userData = array();
	public $myData = array();
	public $isFriend = FALSE;
	public $friendList = array();

	public function GPage(){
		parent::securegamepage();
		$this->viewFile = "snprofile.php";
		$this->contentCssClass = "player";
	}

	public function load(){
		parent::load();
        $this->myData['name'] = $this->data['name'];
        $this->myData['avatar'] = $this->data['avatar'];
        $this->myData['id'] = $this->player->playerId;
        $this->pageIndex = isset( $_GET['p'] ) && is_numeric( $_GET['p'] ) ? intval( $_GET['p'] ) : 0;
        $this->uid = isset( $_GET['uid'] ) && 0 < intval( $_GET['uid'] ) ? intval( $_GET['uid'] ) : $this->player->playerId;
        $m = new SNprofileModel( );
        $rowsCount = $m->getNewsCount( $this->uid );
        $this->pageCount = 0 < $rowsCount ? ceil( $rowsCount / $this->pageSize ) : 1;
        $this->userData = $m->getuserData( $this->uid );
        $friendId = array( );
        $listRows = $m->getFriendsList( $this->player->playerId );
        while ( $listRows->next( ) )
        {
            $id = $listRows->row['playerid1'] == $this->player->playerId ? $listRows->row['playerid2'] : $listRows->row['playerid1'];
            $name = $listRows->row['playerid1'] == $this->player->playerId ? $listRows->row['playername2'] : $listRows->row['playername1'];
            $frienddata = $m->getFriendData( $id );
            $this->friendList[] = array(
                $id,
                $name,
                $frienddata['avatar'],
                $frienddata['last_login_sec']
            );
            $friendId[] = $id;
        }
        $this->isFriend = in_array( $this->uid, $friendId ) || $this->uid == $this->player->playerId ? TRUE : FALSE;
        if ( isset( $_GET['DNid'] ) && !empty( $_GET['DNid'] ) )
        {
            $NewsID = mysql_real_escape_string( trim( $_GET['DNid'] ) );
            if ( $NewsID != "" )
            {
                if ( $this->myData['id'] == $this->uid )
                {
                    $m->DeleteNews( $NewsID, $this->player->playerId );
                }
                $m->dispose( );
                $this->redirect( "snprofile.php?uid=".$this->uid );
            }
        }
        else if ( isset( $_GET['DCid'] ) && !empty( $_GET['DCid'] ) )
        {
            $CommentID = mysql_real_escape_string( trim( $_GET['DCid'] ) );
            if ( $CommentID != "" )
            {
                $m->DeleteComment( $CommentID, $this->player->playerId );
                $m->dispose( );
                $this->redirect( "snprofile.php?uid=".$this->uid );
            }
        }
        else if ( $this->isPost( ) )
        {
            $post = array( );
            if ( isset( $_GET['do'] ) && $_GET['do'] == "News" )
            {
                $post['userid'] = $this->uid;
                $post['message'] = isset( $_POST['news'] ) && $_POST['news'] != "" ? trim( $_POST['news'] ) : "";
                $post['image'] = isset( $_POST['image'] ) && $_POST['image'] != "" ? trim( $_POST['image'] ) : "";
                $post['url'] = isset( $_POST['url'] ) && $_POST['url'] != "" ? trim( $_POST['url'] ) : "";
                $post['youtube'] = isset( $_POST['youtube'] ) && $_POST['youtube'] != "" ? trim( $_POST['youtube'] ) : "";
                if ( $this->uid == $this->player->playerId && $post['message'] != "" )
                {
                    $m->SendNews( $post );
                }
            }
            else
            {
                $post['to_userid'] = $this->uid;
                $post['userid'] = intval( $this->player->playerId );
                $post['username'] = $this->data['name'];
                $post['comment'] = isset( $_POST['comment'] ) && $_POST['comment'] != "" ? trim( $_POST['comment'] ) : "";
                $post['topicid'] = isset( $_POST['topicid'] ) && $_POST['topicid'] != "" ? trim( $_POST['topicid'] ) : "";
                if ( $post['to_userid'] != 0 && $post['comment'] != "" && $post['userid'] != 0 && $this->isFriend )
                {
                    $m->SendComment( $post );
                }
            }
            $m->dispose( );
            $this->redirect( "snprofile.php?uid=".$this->uid );
        }
        else
        {
            $News = $m->GetNews( $this->uid, $this->pageIndex, $this->pageSize );
            $k = 0;
            while ( $News->next( ) )
            {
                $Comments = $m->GetComments( $News->row['ID'] );
                $this->topics[$k]['news'] = $News->row;
                while ( $Comments->next( ) )
                {
                    $this->topics[$k]['news']['comment'][] = $Comments->row;
                }
                ++$k;
            }
            $m->dispose( );
        }
    }

    public function getNextLink( )
    {
        $text = text_nextpage_lang." »";
        if ( $this->pageIndex + 1 == $this->pageCount )
        {
            return $text;
        }
        $link = "p=".( $this->pageIndex + 1 );
        $link = "snprofile.php?uid=".$this->uid."&".$link;
        return "<a href=\"".$link."\">".$text."</a>";
    }

    public function getPreviousLink( )
    {
        $text = "« ".text_prevpage_lang;
        if ( $this->pageIndex == 0 )
        {
            return $text;
        }
        $link = "";
        if ( 0 < $this->pageIndex )
        {
            if ( $link != "" )
            {
                $link .= "&";
            }
            $link .= "p=".( $this->pageIndex - 1 );
        }
        if ( $link != "" )
        {
            $link = "?".$link;
        }
        $link = "snprofile.php".$link."&uid=".$this->uid;
        return "<a href=\"".$link."\">".$text."</a>";
    }
}
$p = new GPage();
$p->run();