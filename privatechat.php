<?php
require('.'.DIRECTORY_SEPARATOR.'GameEngine'.DIRECTORY_SEPARATOR.'boot.php');
require_once( MODEL_PATH."privatechat.php" );
require_once( MODEL_PATH."wordsfilter.php" );
class GPage extends securegamepage
{

    public $chats = NULL;
    public $Filter = NULL;

    public function GPage( )
    {
        $this->customLogoutAction = TRUE;
        parent::securegamepage( );
        if ( $this->player == NULL )
        {
            exit( 0 );
        }
        else
        {
            $this->layoutViewFile = $this->viewFile = NULL;
            $GLOBALS['_GET']['_a1_'] = "";
        }
    }

    public function load( )
    {
        parent::load( );
        $this->Filter = new FilterWordsModel( );
        if ( isset( $_GET['action'] ) && $_GET['action'] == "chatheartbeat" )
        {
            $this->chatHeartbeat( );
        }
        if ( isset( $_GET['action'] ) && $_GET['action'] == "sendchat" )
        {
            $this->sendChat( );
        }
        if ( isset( $_GET['action'] ) && $_GET['action'] == "closechat" )
        {
            $this->closeChat( );
        }
        if ( isset( $_GET['action'] ) && $_GET['action'] == "startchatsession" )
        {
            $this->startChatSession( );
        }
        if ( !isset( $_SESSION['chatHistory'] ) )
        {
            $_SESSION['chatHistory'] = array( );
        }
        if ( !isset( $_SESSION['openChatBoxes'] ) )
        {
            $_SESSION['openChatBoxes'] = array( );
        }
    }

    public function chatHeartbeat( )
    {
        $m = new PrivateChatModel( );
        $chat = $m->GetFromChat( $this->player->playerId );
        $items = "";
        $chatBoxes = array( );
        while ( $chat->next( ) )
        {
            if ( !isset( $_SESSION['openChatBoxes'][$chat->row['from']] ) && isset( $_SESSION['chatHistory'][$chat->row['from']] ) )
            {
            }
            $chat->row['message'] = $this->sanitize( $chat->row['message'] );
            $items .= "\t\t\t\t\t\t   {\r\n\t\t\t\t\"s\": \"0\",\r\n\t\t\t\t\"f\": \"{$chat->row['from']}\",\r\n\t\t\t\t\"img\": \"{$chat->row['from_img']}\",\r\n\t\t\t\t\"id\": \"{$chat->row['from_id']}\",\r\n\t\t\t\t\"m\": \"{$chat->row['message']}\"\r\n\t\t   },";
            if ( !isset( $_SESSION['chatHistory'][$chat->row['from']] ) )
            {
                $_SESSION['chatHistory'][$chat->row['from']] = "";
            }
            $_SESSION['chatHistory'][$chat->row['from']] .= "\t\t\t\t\t\t\t   {\r\n\t\t\t\t\"s\": \"0\",\r\n\t\t\t\t\"f\": \"{$chat->row['from']}\",\r\n\t\t\t\t\"img\": \"{$chat->row['from_img']}\",\r\n\t\t\t\t\"id\": \"{$chat->row['from_id']}\",\r\n\t\t\t\t\"m\": \"{$chat->row['message']}\"\r\n\t\t   },";
            unset( $this->tsChatBoxes[$chat->row['from']] );
            $_SESSION['openChatBoxes'][$chat->row['from']] = $chat->row['sent'];
        }
        $m->dispose( );
        if ( !empty( $_SESSION['openChatBoxes'] ) )
        {
            foreach ( $_SESSION['openChatBoxes'] as $chatbox => $time )
            {
                if ( !isset( $_SESSION['tsChatBoxes'][$chatbox] ) )
                {
                    $now = time( ) - strtotime( $time );
                    $time = date( "g:iA M dS", strtotime( $time ) );
                    $message = "Sent at {$time}";
                    if ( 180 < $now )
                    {
                        $items .= "\t{\r\n\t\"s\": \"2\",\r\n\t\"f\": \"{$chatbox}\",\r\n\t\"img\": \"{$chat->row[$chatbox."_img"]}\",\r\n\t\"id\": \"{$chat->row[$chatbox."_id"]}\",\r\n\t\"m\": \"{$message}\"\r\n\t},";
                        if ( !isset( $_SESSION['chatHistory'][$chatbox] ) )
                        {
                            $_SESSION['chatHistory'][$chatbox] = "";
                        }
                        $_SESSION['chatHistory'][$chatbox] .= "\t\t\t{\r\n\t\"s\": \"2\",\r\n\t\"f\": \"{$chatbox}\",\r\n\t\"img\": \"{$chat->row[$chatbox."_img"]}\",\r\n\t\"id\": \"{$chat->row[$chatbox."_id"]}\",\r\n\t\"m\": \"{$message}\"\r\n\t},";
                        $_SESSION['tsChatBoxes'][$chatbox] = 1;
                    }
                }
            }
        }
        if ( $items != "" )
        {
            $items = substr( $items, 0, 0 - 1 );
        }
        header( "Content-type: application/json" );
        echo "\t{\r\n\t\t\t\"items\": [\r\n\t\t\t\t";
        echo $items;
        echo "\t\t\t]\r\n\t}\r\n\t\r\n\t";
        exit( 0 );
    }

    public function chatBoxSession( $chatbox )
    {
        $items = "";
        if ( isset( $_SESSION['chatHistory'][$chatbox] ) )
        {
            $items = $_SESSION['chatHistory'][$chatbox];
        }
        return $items;
    }

    public function startChatSession( )
    {
        $items = "";
        if ( !empty( $_SESSION['openChatBoxes'] ) )
        {
            foreach ( $_SESSION['openChatBoxes'] as $chatbox => $void )
            {
                $items .= $this->chatBoxSession( $chatbox );
            }
        }
        if ( $items != "" )
        {
            $items = substr( $items, 0, 0 - 1 );
        }
        header( "Content-type: application/json" );
        echo "\t\t{\r\n\t\t\t\t\"username\": \"";
        echo $this->data['name'];
        echo "\",\r\n                \"image\": \"";
        echo $this->data['avatar'];
        echo "\",\r\n                \"id\": \"";
        echo $this->player->playerId;
        echo "\",\r\n\t\t\t\t\"items\": [\r\n\t\t\t\t\t";
        echo $items;
        echo "\t\t\t\t]\r\n\t\t}\r\n\t\t\r\n\t\t";
        exit( 0 );
    }

    public function sendChat( )
    {
        $from = $this->data['name'];
        $to = isset( $_POST['to'] ) ? $_POST['to'] : "";
        $message = isset( $_POST['message'] ) ? $_POST['message'] : "";
        $_SESSION['openChatBoxes'][$to] = date( "Y-m-d H:i:s", time( ) );
        $messagesan = $this->sanitize( $message );
        if ( !isset( $_SESSION['chatHistory'][$to] ) )
        {
            $_SESSION['chatHistory'][$to] = "";
        }
        $_SESSION['chatHistory'][$to] .= "\t\t\t\t\t\t   {\r\n\t\t\t\t\"s\": \"1\",\r\n\t\t\t\t\"f\": \"{$to}\",\r\n\t\t\t\t\"img\": \"{$this->data['avatar']}\",\r\n\t\t\t\t\"id\": \"{$this->player->playerId}\",\r\n\t\t\t\t\"m\": \"{$messagesan}\"\r\n\t\t   },";
        unset( $this->tsChatBoxes[$to] );
        $m = new PrivateChatModel( );
        $m->SendToChat( $from, $this->player->playerId, $this->data['avatar'], $to, $_POST['to_id'], $message );
        $m->dispose( );
        echo "1";
        exit( 0 );
    }

    public function closeChat( )
    {
        unset( $this->openChatBoxes[$_POST['chatbox']] );
        echo "1";
        exit( 0 );
    }

    public function sanitize( $text )
    {
        $text = htmlspecialchars( $text, ENT_QUOTES );
        $text = str_replace( "\n\r", "\n", $text );
        $text = str_replace( "\r\n", "\n", $text );
        $text = str_replace( "\n", "<br>", $text );
        $text = $this->Filter->FilterWords( $text );
        return $text;
    }

}


$p = new GPage( );
$p->run( );
?>
