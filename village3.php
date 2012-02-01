<?php
require(".".DIRECTORY_SEPARATOR."GameEngine".DIRECTORY_SEPARATOR."boot.php");
require_once( MODEL_PATH."village3.php" );
class GPage extends villagepage{

    public $pageState = NULL;
    public $mapItemData = NULL;
    public $lastReport = NULL;
    public $itemTroops = NULL;
    public $hasMarketplace = NULL;
    public $hasRallyPoint = NULL;

    public function GPage( )
    {
        parent::villagepage( );
        $this->viewFile = "village3.php";
        $this->contentCssClass = "map";
        $this->hasMarketplace = FALSE;
        $this->hasRallyPoint = FALSE;
    }

    public function onLoadBuildings( $building )
    {
        if ( !$this->hasMarketplace && $building['item_id'] == 17 )
        {
            $this->hasMarketplace = TRUE;
        }
        if ( !$this->hasRallyPoint && $building['item_id'] == 16 )
        {
            $this->hasRallyPoint = TRUE;
        }
    }

    public function load( )
    {
        parent::load( );
        $villageId = isset( $_GET['id'] ) && 0 < intval( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
        if ( $villageId <= 0 )
        {
            $this->redirect( "map.php" );
        }
        else
        {
            $m = new VillageModel( );
            $this->mapItemData = $m->getMapItemData( $villageId );
            if ( !is_array( $this->mapItemData ) )
            {
                $m->dispose( );
                $this->redirect( "map.php" );
            }
            else
            {
                if ( 0 < intval( $this->mapItemData['player_id'] ) )
                {
                    $this->pageState = $this->mapItemData['is_oasis'] ? 3 : 2;
                    $this->mapItemData['playerType'] = $m->getPlayType( intval( $this->mapItemData['player_id'] ) );
                }
                else
                {
                    $this->pageState = $this->mapItemData['is_oasis'] ? 4 : 1;
                }
                $this->lastReport = NULL;
                if ( $this->pageState == 2 || $this->pageState == 3 )
                {
                    if ( $this->mapItemData['player_id'] == $this->player->playerId || $this->mapItemData['alliance_id'] == $this->data['alliance_id'] && 0 < intval( $this->data['alliance_id'] ) )
                    {
                        $this->lastReport = $m->getLatestReports( $this->mapItemData['player_id'], $this->mapItemData['id'] );
                    }
                    else
                    {
                        $fromPlayersId = 0 < intval( $this->data['alliance_id'] ) ? $m->getAlliancePlayersId( intval( $this->data['alliance_id'] ) ) : $this->player->playerId;
                        $this->lastReport = $m->getLatestReports2( $fromPlayersId, $this->mapItemData['player_id'], $this->mapItemData['id'] );
                    }
                    if ( $this->pageState == 3 )
                    {
                        $this->mapItemData['village_name'] = $m->getVillageName( $this->mapItemData['parent_id'] );
                    }
                }
                else if ( $this->pageState == 1 || $this->pageState == 4 )
                {
                    $this->itemTroops = array( );
                    $t = $this->pageState == 1 ? $this->data['troops_num'] : $this->mapItemData['troops_num'];
                    $incFactor = $this->pageState == 4 ? floor( $this->mapItemData['elapsedTimeInSeconds'] / 86400 ) : 0;
                    $t_arr = explode( "|", $t );
                    foreach ( $t_arr as $t_str )
                    {
                        $t2_arr = explode( ":", $t_str );
                        if ( 0 - 1 < $t2_arr[0] )
                        {
                            continue;
                        }
                        $t2_arr = explode( ",", $t2_arr[1] );
                        foreach ( $t2_arr as $t2_str )
                        {
                            $t = explode( " ", $t2_str );
                            if ( $t[0] == 99 )
                            {
                                continue;
                            }
                            $this->itemTroops[$t[0]] = $t[1] + $incFactor;
                            if ( $this->pageState == 4 && 7 * intval( $t[0] ) < $this->itemTroops[$t[0]] )
                            {
                                $this->itemTroops[$t[0]] = 7 * intval( $t[0] );
                            }
                        }
                    }
                }
                $m->dispose( );
            }
        }
    }

    public function preRender( )
    {
        parent::prerender( );
        if ( isset( $_GET['id'] ) )
        {
            $this->villagesLinkPostfix .= "&id=".intval( $_GET['id'] );
        }
    }
}
$p = new GPage();
$p->run();