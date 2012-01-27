<?php
require( ".".DIRECTORY_SEPARATOR."GameEngine".DIRECTORY_SEPARATOR."boot.php" );
require_once( MODEL_PATH."map.php" );
class GPage extends securegamepage
{

    public $x = NULL;
    public $y = NULL;
    public $directionsMatrix = NULL;
    public $stepDirectionsMatrix = NULL;
    public $rad = NULL;
    public $matrixSet = array( );
    public $contractsAllianceId = array( );
    public $json = NULL;
    public $largeMap = FALSE;

    public function GPage( )
    {
        parent::securegamepage( );
        $this->contentCssClass = "map";
        $this->title = $this->appConfig['page'][$this->appConfig['system']['lang']."_title"];
    }

    public function load( )
    {
        parent::load( );
        if ( isset( $_GET['l'] ) && !$this->data['active_plus_account'] )
        {
            exit( 0 );
        }
        else
        {
            $this->largeMap = isset( $_GET['l'] ) && $this->data['active_plus_account'];
            $this->viewFile = $this->largeMap ? "map2.php" : "map.php";
            if ( $this->largeMap )
            {
                $this->layoutViewFile = "layout".DIRECTORY_SEPARATOR."popup.php";
            }
            $this->rad = $this->largeMap ? 6 : 3;
            $map_size = $this->setupMetadata['map_size'];
            $this->x = $this->data['rel_x'];
            $this->y = $this->data['rel_y'];
            $m = new MapModel( );
            $this->contractsAllianceId = array( );
            if ( 0 < intval( $this->data['alliance_id'] ) )
            {
                $cont = trim( $m->getContractsAllianceId( $this->data['alliance_id'] ) );
                if ( $cont != "" )
                {
                    $_arr = explode( ",", $cont );
                    foreach ( $_arr as $contractAllianceId )
                    {
                        list( $aid, $pendingStatus ) = $contractAllianceId;                        
                        $this->contractsAllianceId[$aid] = $pendingStatus;
                    }
                }
            }
            $_x = $this->data['rel_x'];
            $_y = $this->data['rel_y'];
            if ( $this->isPost( ) )
            {
                $_x = intval( $_POST['mxp'] );
                $_y = intval( $_POST['myp'] );
            }
            else if ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
            {
                $m_vid = intval( $_GET['id'] );
                if ( $m_vid < 1 )
                {
                    $m_vid = 1;
                }
                $_x = floor( ( $m_vid - 1 ) / $map_size );
                $_y = $m_vid - ( $_x * $map_size + 1 );
            }
            $map_matrix = $this->__getVillageMatrix( $map_size, $_x, $_y, $this->rad );
            $map_matrix_arr = explode( "|", $map_matrix );
            $matrixStr = $map_matrix_arr[0];
            $matrixStrArray = explode( ",", $matrixStr );
            $this->directionsMatrix = explode( ",", $map_matrix_arr[1] );
            $result = $m->getVillagesMatrix( $matrixStr );
            while ( $result->next( ) )
            {
                $this->matrixSet[$result->row['id']] = array(
                    "vid" => $result->row['id'],
                    "x" => $result->row['rel_x'],
                    "y" => $result->row['rel_y'],
                    "image_num" => $result->row['image_num'],
                    "player_id" => $result->row['player_id'],
                    "tribe_id" => $result->row['tribe_id'],
                    "alliance_id" => $result->row['alliance_id'],
                    "player_name" => $result->row['player_name'],
                    "village_name" => $result->row['village_name'],
                    "alliance_name" => $result->row['alliance_name'],
                    "people_count" => $result->row['people_count'],
                    "is_oasis" => $result->row['is_oasis'],
                    "field_maps_id" => $result->row['field_maps_id']
                );
            }
            $i = 0;
            $this->json = "";
            $sjson = "";
            $sortedArray = array( );
            foreach ( $matrixStrArray as $vid )
            {
                $mapItem = $this->matrixSet[$vid];
                $sortedArray[] = $mapItem;
                if ( $sjson != "" )
                {
                    $sjson .= ",";
                }
                $sjson .= sprintf( "[%s,%s,%s,\"%s\",\"%s\",%s,%s", $mapItem['vid'], $mapItem['x'], $mapItem['y'], $this->getCssClassNameByItem( $mapItem ), $this->getMapAreaTitle( $mapItem ), $mapItem['player_id'] != "" ? 1 : 0, $mapItem['is_oasis'] );
                if ( $mapItem['player_id'] != "" )
                {
                    $sjson .= sprintf( ",%s,%s,\"%s\",\"%s\",\"%s\"", $mapItem['tribe_id'], $mapItem['people_count'], htmlspecialchars( str_replace( "\\", "\\\\", $mapItem['player_name'] ) ), htmlspecialchars( str_replace( "\\", "\\\\", $mapItem['village_name'] ) ), htmlspecialchars( str_replace( "\\", "\\\\", $mapItem['alliance_name'] ) ) );
                }
                else if ( !$mapItem['is_oasis'] )
                {
                    $sjson .= ",".$mapItem['field_maps_id'];
                }
                $sjson .= "]";
                if ( ++$i % ( $this->rad * 2 + 1 ) == 0 )
                {
                    if ( $this->json != "" )
                    {
                        $this->json .= ",";
                    }
                    $this->json .= "[".$sjson."]";
                    $sjson = "";
                }
            }
            $this->json = "[".$this->json."]";
            $this->matrixSet = $sortedArray;
            $centerIndex = 2 * ( $this->rad + 1 ) * $this->rad;
            $this->x = $this->matrixSet[$centerIndex]['x'];
            $this->y = $this->matrixSet[$centerIndex]['y'];
            $this->stepDirectionsMatrix = array(
                $this->matrixSet[$centerIndex - $this->rad * 2 - 1]['vid'],
                $this->matrixSet[$centerIndex + 1]['vid'],
                $this->matrixSet[$centerIndex + $this->rad * 2 + 1]['vid'],
                $this->matrixSet[$centerIndex - 1]['vid']
            );
            $m->dispose( );
            if ( $this->isCallback( ) )
            {
                echo $this->getClientScript( );
                exit( 0 );
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

    public function getClientScript( )
    {
        return sprintf( "_mp={"."\"x\":%s,\"y\":%s,"."\"n1\":%s,\"n2\":%s,\"n3\":%s,\"n4\":%s,\"n1p7\":%s,\"n2p7\":%s,\"n3p7\":%s,\"n4p7\":%s,"."\"mtx\":%s"."};", $this->x, $this->y, $this->stepDirectionsMatrix[1], $this->stepDirectionsMatrix[2], $this->stepDirectionsMatrix[3], $this->stepDirectionsMatrix[0], $this->directionsMatrix[2], $this->directionsMatrix[0], $this->directionsMatrix[3], $this->directionsMatrix[1], $this->json );
    }

    public function isContractWith( $allianceId )
    {
        return isset( $this->contractsAllianceId[$allianceId] ) && $this->contractsAllianceId[$allianceId] == 0;
    }

    public function getCssClassName( $index )
    {
        return $this->getCssClassNameByItem( $this->matrixSet[$index] );
    }

    public function getCssClassNameByItem( $mapItem )
    {
        if ( $mapItem['is_oasis'] )
        {
            return "o".$mapItem['image_num'];
        }
        if ( $mapItem['player_id'] != "" )
        {
            $c1 = 0;
            if ( $mapItem['people_count'] < 100 )
            {
                $c1 = 0;
            }
            else if ( $mapItem['people_count'] < 250 )
            {
                $c1 = 1;
            }
            else if ( $mapItem['people_count'] < 500 )
            {
                $c1 = 2;
            }
            else
            {
                $c1 = 3;
            }
            $c2 = 4;
            if ( $this->player->playerId == $mapItem['player_id'] )
            {
                $c2 = 0;
            }
            else if ( $mapItem['alliance_id'] != "" )
            {
                if ( $this->data['alliance_id'] == $mapItem['alliance_id'] )
                {
                    $c2 = 1;
                }
                else if ( $this->isContractWith( $mapItem['alliance_id'] ) )
                {
                    $c2 = 3;
                }
            }
            return "b".$c1.$c2;
        }
        return "t".$mapItem['image_num'];
    }

    public function getMapAreaTitle( $mapItem )
    {
        $title = "";
        if ( $mapItem['is_oasis'] )
        {
            $title = $mapItem['player_id'] != "" ? oasis_place_owned : oasis_place_empty;
        }
        else if ( $mapItem['player_id'] != "" )
        {
            $title = $mapItem['village_name'];
        }
        return htmlspecialchars( $title );
    }

    public function getMapArea( $x, $y )
    {
        $mapItem = $this->matrixSet[$x * ( $this->rad * 2 + 1 ) + $y];
        $title = $this->getMapAreaTitle( $mapItem );
        return sprintf( " title=\"%s\" %shref=\"village3.php?id=%s\" onmouseover=\"showInfo(%s,%s)\" onmouseout=\"hideInfo()\"", $title, $this->largeMap ? "onclick=\"opener.location.href=this.href;return false;\" " : "", $mapItem['vid'], $x, $y );
    }

    public function __getCoordInRange( $map_size, $x )
    {
        if ( $map_size <= $x )
        {
            $x -= $map_size;
        }
        else if ( $x < 0 )
        {
            $x = $map_size + $x;
        }
        return $x;
    }

    public function __getVillageId( $map_size, $x, $y )
    {
        return $x * $map_size + ( $y + 1 );
    }

    public function __getVillageMatrix( $map_size, $x, $y, $scale )
    {
        $matrix = "";
        $i = 0 - $scale;
        while ( $i <= $scale )
        {
            $j = 0 - $scale;
            while ( $j <= $scale )
            {
                if ( $matrix != "" )
                {
                    $matrix .= ",";
                }
                $matrix .= $this->__getVillageId( $map_size, $this->__getCoordInRange( $map_size, $x + $i ), $this->__getCoordInRange( $map_size, $y + $j ) );
                ++$j;
            }
            ++$i;
        }
        $matrix .= "|";
        $matrix .= $this->__getVillageId( $map_size, $this->__getCoordInRange( $map_size, $x + ( $scale * 2 + 1 ) ), $this->__getCoordInRange( $map_size, $y ) );
        $matrix .= ",";
        $matrix .= $this->__getVillageId( $map_size, $this->__getCoordInRange( $map_size, $x - ( $scale * 2 + 1 ) ), $this->__getCoordInRange( $map_size, $y ) );
        $matrix .= ",";
        $matrix .= $this->__getVillageId( $map_size, $this->__getCoordInRange( $map_size, $x ), $this->__getCoordInRange( $map_size, $y + ( $scale * 2 + 1 ) ) );
        $matrix .= ",";
        $matrix .= $this->__getVillageId( $map_size, $this->__getCoordInRange( $map_size, $x ), $this->__getCoordInRange( $map_size, $y - ( $scale * 2 + 1 ) ) );
        return $matrix;
    }

}

$p = new GPage( );
$p->run( );