<?php
require('.'.DIRECTORY_SEPARATOR.'GameEngine'.DIRECTORY_SEPARATOR.'boot.php');
class GPage extends SecureGamePage{

	public $packageIndex = -1;
	public $plusTable;

	public function GPage(){
		parent::securegamepage();
		$this->viewFile = "plus.php";
		$this->contentCssClass = "plus";
		$this->plusTable = $this->gameMetadata['plusTable'];
		$i = 0;
		$c = sizeof( $this->plusTable );
		while($i < $c){
			if(0 < $this->plusTable[$i]['time']){
				$this->plusTable[$i]['time'] = ceil( $this->plusTable[$i]['time'] / $this->gameMetadata['game_speed'] );
			}
			++$i;
		}
	}

	public function load(){
		parent::load();
		$this->selectedTabIndex = isset( $_GET['t'] ) && is_numeric( $_GET['t'] ) && 0 <= intval( $_GET['t'] ) && intval( $_GET['t'] ) <= 2 ? intval( $_GET['t'] ) : 0;
		if($this->selectedTabIndex == 0){
			$this->packageIndex = isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) && 0 < intval( $_GET['id'] ) && intval( $_GET['id'] ) <= sizeof( $this->appConfig['plus']['packages'] ) ? intval( $_GET['id'] ) - 1 : 0 - 1;
		}
		else{
			if($this->selectedTabIndex == 2 && !$this->isGameOver()){
				switch(intval($_GET['a'])){
                    case 0 :                        break;
                    case 1 :                        break;
                    case 2 :                        break;
                    case 3 :                        break;
                    case 4 :
						//$Var_1824 = constant( "QS_PLUS".( intval( $_GET['a'] ) + 1 ) );
						$taskType = constant( "QS_PLUS".( intval( $_GET['a'] ) + 1 ) );
		                $newTask = new QueueTask( $taskType, $this->player->playerId, $this->plusTable[intval( $_GET['a'] )]['time'] * 86400 );
		                $newTask->villageId = "";
		                $newTask->tag = $this->plusTable[intval( $_GET['a'] )]['cost'];
		                $this->queueModel->addTask( $newTask );
	                break;
					case 5 :                        break;
                    case 7 :
						$this->queueModel->finishTasks( $this->player->playerId, $this->plusTable[intval( $_GET['a'] )]['cost'], intval( $_GET['a'] ) == 7 ); 
					break;
				}
            }
        }
    }

    public function preRender( )
    {
       // ( );
        if ( 0 < $this->selectedTabIndex )
        {
         //   $ && _39395176 .= "villagesLinkPostfix";
        }
    }

    public function getRemainingPlusTime( $action )
    {
        $time = 0;
        $tasks = $this->queueModel->tasksInQueue;
        if ( isset( $tasks[constant( "QS_PLUS".( $action + 1 ) )] ) )
        {
            $time = $tasks[constant( "QS_PLUS".( $action + 1 ) )][0]['remainingSeconds'];
        }
        return 0 < $time ? time_remain_lang." <span id=\"timer1\">".( $time )."</span> ".time_hour_lang : "";
    }

    public function getPlusAction( $action )
    {
        if ( $this->data['gold_num'] < $this->plusTable[$action]['cost'] )
        {
            return "<span class=\"none\">".plus_text_lowgold."</span>";
        }
        if ( $action == 5 || $action == 7 )
        {
            return "<a href=\"plus.php?t=2&a=".$action."&k=".$this->data['update_key']."\">".plus_text_activatefeature."</a>";
        }
        return "<span class=\"none\">".plus_text_gotomarket."</span>";
        $tasks = $this->queueModel->tasksInQueue;
        return "<a href=\"plus.php?t=2&a=".$action."&k=".$this->data['update_key']."\">".plus_text_activatefeature."</a>";
    }

    public function hasMarketplace( )
    {
        $b_arr = explode( ",", $this->data['buildings'] );
        foreach ( $b_arr as $b_str )
        {
            $b2 = explode( " ", $b_str );
            if ( $b2[0] == 17 )
            {
                return TRUE;
                break;
            }
        }
        return FALSE;
    }
}
$p = new GPage();
$p->run();