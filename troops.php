<?php
require('.'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'boot.php');
require_once(MODEL_PATH.'troops.php');
class GPage extends securegamepage{

    public $isAdmin = NULL;
    public $villageId = NULL;
    public $villageName = NULL;
    public $playerName = NULL;
    public $msgText = NULL;
    public $resources= NULL;

    public function GPage(){
		$this->customLogoutAction = TRUE;
		parent::securegamepage( );
		if ( $this->player == NULL ){
			exit( 0 );
		}
		//$this->viewFile = "resources.php";
		$this->viewFile = "troops.php";
		$this->layoutViewFile = "layout".DIRECTORY_SEPARATOR."popup.php";
	}

    public function load( )
    {
        parent::load( );
        $this->msgText = "";
        $this->isAdmin = $this->data['player_type'] == PLAYERTYPE_ADMIN;
        if ( !$this->isAdmin )
        {
            exit( 0 );
        }
        else
        {
            $this->villageId = isset( $_GET['avid'] ) ? intval( $_GET['avid'] ) : 0;
            if ( $this->villageId <= 0 )
            {
                exit( 0 );
            }
            else
            {
                $m = new ResourcesModel( );
                if ( $this->isPost( ) )
                {
                    $r1 = isset( $_POST['r1'] ) && 0 <= intval( $_POST['r1'] ) ? intval( $_POST['r1'] ) : 0 - 1;
                    $r2 = isset( $_POST['r2'] ) && 0 <= intval( $_POST['r2'] ) ? intval( $_POST['r2'] ) : 0 - 1;
                    $r3 = isset( $_POST['r3'] ) && 0 <= intval( $_POST['r3'] ) ? intval( $_POST['r3'] ) : 0 - 1;
                    $r4 = isset( $_POST['r4'] ) && 0 <= intval( $_POST['r4'] ) ? intval( $_POST['r4'] ) : 0 - 1;
                    
                    $m->updateVillageResources( $this->villageId, array("1" => $r1,"2" => $r2,"3" => $r3,"4" => $r4));
                    $this->msgText = data_saved;
                }
                $row = $m->getVillageData( $this->villageId );
                if ( $row == NULL || intval( $row['player_id'] ) == 0 || $row['is_oasis'] )
                {
                    exit( 0 );
                }
                else
                {
                    $this->villageName = $row['village_name'];
                    $this->playerName = $row['player_name'];
                    $this->resources = array( );
                    $elapsedTimeInSeconds = $row['elapsedTimeInSeconds'];
                    $r_arr = explode( ",", $row['resources'] );
                    foreach ( $r_arr as $r_str )
                    {
                        $r2 = explode( " ", $r_str );
                        $prate = floor( $r2[4] * ( 1 + $r2[5] / 100 ) ) - ( $r2[0] == 4 ? $row['crop_consumption'] : 0 );
                        $current_value = floor( $r2[1] + $elapsedTimeInSeconds * ( $prate / 3600 ) );
                        if ( $r2[2] < $current_value )
                        {
                            $current_value = $r2[2];
                        }
                        $this->resources[$r2[0]] = array(
                            "current_value" => $current_value,
                            "store_max_limit" => $r2[2],
                            "store_init_limit" => $r2[3],
                            "prod_rate" => $r2[4],
                            "prod_rate_percentage" => $r2[5],
                            "calc_prod_rate" => $prate
                        );
                    }
                    $m->dispose( );
                }
            }
        }
    }
}
$p = new GPage();
$p->run();