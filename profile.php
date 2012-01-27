<?php
require( ".".DIRECTORY_SEPARATOR."GameEngine".DIRECTORY_SEPARATOR."boot.php" );
require_once( MODEL_PATH."profile.php" );
class GPage extends SecureGamePage{

    public $fullView;
    public $profileData;
    public $selectedTabIndex;
    public $villagesCount;
    public $villages;
    public $birthDate;
    public $agentForPlayers = array( );
    public $myAgentPlayers = array( );
    public $errorText;
    public $bbCodeReplacedArray = array( );
    public $isAdmin;

    public function GPage( )
    {
        parent::securegamepage( );  
        $this->viewFile = "profile.php";
        $this->contentCssClass = "player";
    }

    public function load( )
    {
        parent::load( );
        $this->isAdmin = $this->data['player_type'] == PLAYERTYPE_ADMIN;
        $uid = isset( $_GET['uid'] ) && 0 < intval( $_GET['uid'] ) ? intval( $_GET['uid'] ) : $this->player->playerId;
        if ( $this->isAdmin && isset( $_GET['spy'] ) && 0 < $uid && $uid != $this->player->playerId )
        {
            $gameStatus = $this->player->gameStatus;
            $previd = $this->player->playerId;
            $this->player = new Player( );
            $this->player->playerId = $uid;
            $this->player->prevPlayerId = $previd;
            $this->player->isAgent = FALSE;
            $this->player->isSpy = TRUE;
            $this->player->gameStatus = $gameStatus;
            $this->player->save( ); 
            $this->redirect( "village1.php" );
        }
        else
        {
            $this->selectedTabIndex = 0;  
            $this->fullView = FALSE;
            $m = new ProfileModel( );
            if ( $uid != $this->player->playerId )
            {
                $this->profileData = $m->getPlayerDataById( $uid );
                 $this->villagesCount = sizeof( explode( ",", $this->profileData['villages_id'] ) );
                    $this->villages = $m->getVillagesSummary( $this->profileData['villages_id'] );
                
                if ( $this->profileData == NULL )
                {
                    $m->dispose( );
                    $this->redirect( "village1.php" );
                }
            }
            else
            {   
                $this->profileData = $this->data;
                $this->profileData['id'] = $uid;
                $this->fullView = !$this->player->isAgent;
                $this->selectedTabIndex = !$this->player->isAgent && isset( $_GET['t'] ) && is_numeric( $_GET['t'] ) && 0 <= intval( $_GET['t'] ) && intval( $_GET['t'] ) <= 4 ? intval( $_GET['t'] ) : 0;
                if ( $this->selectedTabIndex == 4 && $this->data['player_type'] == PLAYERTYPE_TATAR )
                {
                    $this->selectedTabIndex = 0;
                }
                $agentForPlayers = trim( $this->profileData['agent_for_players'] ) == "" ? array( ) : explode( ",", $this->profileData['agent_for_players'] );
                foreach ( $agentForPlayers as $agent )
                {
                    $agentName = explode( " ", $agent );
                    $agentId = explode( " ", $agent );
                    list( $agentId, $agentName ) = $agentId;
                    $this->agentForPlayers[$agentId] = $agentName;
                }
                $myAgentPlayers = trim( $this->profileData['my_agent_players'] ) == "" ? array( ) : explode( ",", $this->profileData['my_agent_players'] );
                foreach ( $myAgentPlayers as $agent )
                {
                    $agentName = explode( " ", $agent );
                    $agentId = explode( " ", $agent );
                    list( $agentId, $agentName ) = $agentId;
                    $this->myAgentPlayers[$agentId] = $agentName;
                }
                $this->profileData['rank'] = $m->getPlayerRank( $uid, $this->profileData['total_people_count'] * 10 + $this->profileData['villages_count'] );
                
                if ( $this->isPost( ) )
                {
                    if ( $this->fullView && isset( $_POST['e'] ) )
                    {
                        switch ( $_POST['e'] )
                        {
                            case 1 :
                                if ( !empty( $_FILES['avatar']['name'] ) )
                                {
                                    $exe = explode( ".", $_FILES['avatar']['name'] );
                                    $EXT = end( $exe );
                                    $array = array( "GIF", "SWF", "BMP", "TIFF", "JPG", "PNG", "JEPG" );
                                    if ( in_array( strtoupper( $EXT ), $array ) )
                                    {
                                        $i = time( );
                                        $avatar = $i.".".$EXT;
                                        $test = move_uploaded_file( $_FILES['avatar']['tmp_name'], ROOT_PATH."avatar/".$avatar );
                                        if ( $test )
                                        {
                                            if ( $_POST['oldavatar'] != "http://www.dboor.com/tatar/assets/default/img/q/l6.jpg" )
                                            {
                                                @unlink( @$_POST['oldavatar'] );
                                            }
                                        }
                                        else
                                        {
                                            $avatar = $_POST['oldavatar'];
                                        }
                                    }
                                    else
                                    {
                                        $avatar = $_POST['oldavatar'];
                                    }
                                }
                                else
                                {
                                    $avatar = $_POST['oldavatar'];
                                }
                                $avatar = empty( $avatar ) ? "/assets/default/img/q/l6.jpg" : "/avatar/".$avatar;
                            $_y_ = isset( $_POST['jahr'] ) && 1930 <= intval( $_POST['jahr'] ) && intval( $_POST['jahr'] ) <= 2005 ? intval( $_POST['jahr'] ) : "";
                                $_m_ = isset( $_POST['monat'] ) && 1 <= intval( $_POST['monat'] ) && intval( $_POST['monat'] ) <= 12 ? intval( $_POST['monat'] ) : "";
                                $_d_ = isset( $_POST['tag'] ) && 1 <= intval( $_POST['tag'] ) && intval( $_POST['tag'] ) <= 31 ? intval( $_POST['tag'] ) : "";
                                $newData = array(
                                "gender" => 0 <= intval( $_POST['mw'] ) && intval( $_POST['mw'] ) <= 2 ? intval( $_POST['mw'] ) : 0,
                                "house_name" => isset( $_POST['ort'] ) ? $_POST['ort'] : "",
                                "village_name" => isset( $_POST['dname'] ) ? $_POST['dname'] : "",
                                "avatar" => htmlspecialchars( $avatar ),
                                "description1" => isset( $_POST['be1'] ) ? htmlspecialchars( $_POST['be1'] ) : "",
                                "description2" => isset( $_POST['be2'] ) ? htmlspecialchars( $_POST['be2'] ) : "",
                                "birthData" => $_y_."-".$_m_."-".$_d_,
                                "villages" => $this->data['villages_data']
                            );$m->editPlayerProfile( $this->player->playerId, $newData );
                                $m->dispose( );
                                $this->redirect( "profile.php" );
                                return;
                            case 2 :
                                      if ( isset( $_POST['pw1'], $_POST['pw2'] ) && isset( $_POST['pw3'] ) && $_POST['pw2'] == $_POST['pw3'] && 4 <= strlen( $_POST['pw2'] ) && strtolower( $this->profileData['pwd'] ) == strtolower( md5( $_POST['pw1'] ) ) )
                            {
                                $m->changePlayerPassword( $this->player->playerId, md5( $_POST['pw2'] ) );
                            }
                            if ( isset( $_POST['email_alt'], $_POST['email_neu'] ) && strtolower( $this->profileData['email'] ) == strtolower( $_POST['email_alt'] ) && preg_match( "/^[^@]+@[a-zA-Z0-9._-]+\\.[a-zA-Z]+\$/", $_POST['email_neu'] ) )
                            {
                                $m->changePlayerEmail( $this->player->playerId, $_POST['email_neu'] );
                            }
                                break;
                            case 3 :
                                if ( isset( $_POST['v1'] ) && trim( $_POST['v1'] ) != "" && sizeof( $this->myAgentPlayers ) < 2 )
                                {
                                    $aid = $m->getPlayerIdByName( $_POST['v1'] );
                                    if ( 0 < intval( $aid ) && $aid != $this->player->playerId && !isset( $this->myAgentPlayers[$aid] ) )
                                    {
                                        $_agentsFor = $m->getPlayerAgentForById( intval( $aid ) );
                                        if ( 1 < sizeof( explode( ",", $_agentsFor ) ) )
                                        {
                                            $this->errorText = profile_setagent_err_msg;
                                        }
                                        else
                                        {
                                            $this->myAgentPlayers[$aid] = $_POST['v1'];
                                            $m->setMyAgents( $this->player->playerId, $this->data['name'], $this->myAgentPlayers, $aid );
                                        }
                                    }
                                }
                                break;
                            case 4 :
                                if ( isset( $_POST['del'] ) && $_POST['del'] == 1 && strtolower( $this->profileData['pwd'] ) == strtolower( md5( $_POST['del_pw'] ) ) && !$this->isPlayerInDeletionProgress( ) && !$this->isGameTransientStopped( ) && !$this->isGameOver( ) )
                                {
                                    $this->queueModel->addTask( new QueueTask( QS_ACCOUNT_DELETE, $this->player->playerId, 259200 ) );
                                }
                        
                    }
                }
                }
                else if ( $this->selectedTabIndex == 3 )
                {
                    if ( isset( $_GET['aid'] ) && 0 < intval( $_GET['aid'] ) )
                    {
                        $aid = intval( $_GET['aid'] );
                        if ( isset( $this->myAgentPlayers[$aid] ) )
                        {
                            unset( $this->myAgentPlayers[$aid] );  
                            $m->removeMyAgents( $this->player->playerId, $this->myAgentPlayers, $aid );
                        }
                    }
                    else
                    {
                        if ( isset( $_GET['afid'] ) && 0 < intval( $_GET['afid'] ) )
                        {
                            $aid = intval( $_GET['afid'] );
                            if ( isset( $this->agentForPlayers[$aid] ) )
                            {
                                unset( $this->agentForPlayers[$aid] );
                                $m->removeAgentsFor( $this->player->playerId, $this->agentForPlayers, $aid );
                            }
                        }
                    }
                }
                else if ( $this->selectedTabIndex == 4 && isset( $_GET['qid'] ) && 0 < intval( $_GET['qid'] ) )
                {
                    $this->queueModel->cancelTask( $this->player->playerId, intval( $_GET['qid'] ) );
                }
                if ( $this->selectedTabIndex == 0 )
                {
                    $this->villagesCount = sizeof( explode( ",", $this->profileData['villages_id'] ) );
                    $this->villages = $m->getVillagesSummary( $this->profileData['villages_id'] );
                }
                else if ( $this->selectedTabIndex == 1 )
                {
                    $birth_date = $this->profileData['birth_date'];
                    if ( !$birth_date )
                    {
                        $birth_date = "0-0-0";
                    }
                    $day = explode( "-", $birth_date );
                    $month = explode( "-", $birth_date );
                    $year = explode( "-", $birth_date );
                    list( $year, $month, $day ) = $year; 
                    $this->birthDate = array( "year" => $year, "month" => $month, "day" => $day );
                }
                
                
                $m->dispose( );
            }
        }
    }

    public function canCancelPlayerDeletionProcess( )
    {
        if ( !QueueTask::iscancelabletask( QS_ACCOUNT_DELETE ) )
        {
            return FALSE;
        }
        $timeout = QueueTask::getmaxcanceltimeout( QS_ACCOUNT_DELETE );
        if ( 0 - 1 < $timeout )
        {
            $elapsedTime = $this->queueModel->tasksInQueue[QS_ACCOUNT_DELETE][0]['elapsedTime'];
            if ( $timeout < $elapsedTime )
            {
                return FALSE;
            }
        }
        return TRUE;
    }

    public function preRender( )
    {
       parent::prerender( );
        if ( isset( $_GET['uid'] ) )
        {
            $this->villagesLinkPostfix .= "&uid=".intval( $_GET['uid'] );
        }
        if ( 0 < $this->selectedTabIndex )
        {
            $this->villagesLinkPostfix .= "&t=".$this->selectedTabIndex;
        }
    }

    public function getProfileDescription( $text )
    {
        $img = "<img class=\"%s\" src=\"assets/x.gif\" onmouseout=\"med_closeDescription()\" onmousemove=\"med_mouseMoveHandler(arguments[0],'<p>%s</p>')\">";
        $medals = explode( ",", $this->profileData['medals'] );
        foreach ( $medals as $medal )
        {
            if ( trim( $medal ) == "" )
            {
                continue;
            }
            $week = explode( ":", $medal );
            $rank = explode( ":", $medal );
            $index = explode( ":", $medal );
            list( $index, $rank, $week ) = $index; 
            if ( !isset( $this->gameMetadata['medals'][$index] ) )
            {
                continue;
            }
            $medalData = $this->gameMetadata['medals'][$index];
            $bbCode = "";
            if ( $index == 0 )
            {
                $bbCode = intval( $medalData['BBCode'] );
                $postfix = 0 < $this->profileData['protection_remain_sec'] ? "" : "d";
                $cssClass = $medalData['cssClass'].$postfix;
                $altText = htmlspecialchars( sprintf( constant( "medal_".$medalData['textIndex'].$postfix ), $postfix == "d" ? $this->profileData['registration_date'] : $this->profileData['protection_remain'] ) );
            }
            else
            {
                $bbCode = intval( $medalData['BBCode'] ) + intval( $week ) * 10 + ( intval( $rank ) - 1 );
                $cssClass = "medal ".$medalData['cssClass']."_".$rank;
                $altText = htmlspecialchars( sprintf( "<table><tr><th>".profile_medal_txt_cat.":</th><td>%s</td></tr><tr><th>".profile_medal_txt_week.":</th><td>%s</td></tr><tr><th>".profile_medal_txt_rank.":</th><td>%s</td></tr></table>", constant( "medal_".$medalData['textIndex'] ), $week, $rank ) );
            }
            if ( !isset( $this->bbCodeReplacedArray[$bbCode] ) )
            {
                $count = 0;
                $text = preg_replace( "/\\[#".$bbCode."\\]/", sprintf( $img, $cssClass, $altText ), $text, 1, $count );
                if ( 0 < $count )
                {
                    $this->bbCodeReplacedArray[$bbCode] = $count;
                }
            }
        }
        return nl2br($text);
    }
}
$p = new GPage();
$p->run();