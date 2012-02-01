<?php
/**
*
* @ This file is created by Decodeby.US
* @ deZender Public (PHP5 Decompiler)
*
* @	Version			:	1.0.0.0
* @	Author			:	Ps2Gamer & Cyko
* @	Release on		:	30.05.2011
* @	Official site	:	http://decodeby.us
*
*/

class ResourcesModel extends ModelBase
{

    public function getVillageData( $id )
    {
        return $this->provider->fetchRow( "SELECT\r\n\t\t\t\tv.id,\r\n\t\t\t\tv.player_id, v.is_oasis,\r\n\t\t\t\tv.player_name, v.village_name,\r\n\t\t\t\tv.resources, v.cp,\r\n\t\t\t\tv.crop_consumption,\r\n\t\t\t\tTIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds\r\n\t\t\tFROM\r\n\t\t\t\tp_villages v \r\n\t\t\tWHERE\r\n\t\t\t\tv.id = %s", array(
            $id
        ) );
    }

    public function updateVillageResources( $vid, $new_resources )
    {
        $villageRow = $this->getVillageData( $vid );
        $elapsedTimeInSeconds = $villageRow['elapsedTimeInSeconds'];
        $resources = array( );
        $r_arr = explode( ",", $villageRow['resources'] );
        foreach ( $r_arr as $r_str )
        {
            $r2 = explode( " ", $r_str );
            $prate = floor( $r2[4] * ( 1 + $r2[5] / 100 ) ) - ( $r2[0] == 4 ? $villageRow['crop_consumption'] : 0 );
            $current_value = $new_resources[$r2[0]] < 0 ? floor( $r2[1] + $elapsedTimeInSeconds * ( $prate / 3600 ) ) : $new_resources[$r2[0]];
            if ( $r2[2] < $current_value )
            {
                $current_value = $r2[2];
            }
            $resources[$r2[0]] = array(
                "current_value" => $current_value,
                "store_max_limit" => $r2[2],
                "store_init_limit" => $r2[3],
                "prod_rate" => $r2[4],
                "prod_rate_percentage" => $r2[5],
                "calc_prod_rate" => $prate
            );
        }
        $cpRate = explode( " ", $villageRow['cp'] );
        $cpValue = explode( " ", $villageRow['cp'] );
        list( $cpValue, $cpRate ) = $cpValue;        
        $cpValue = round( $cpValue + $elapsedTimeInSeconds * ( $cpRate / 86400 ), 4 );
        $resourcesStr = "";
        foreach ( $resources as $k => $v )
        {
            if ( $resourcesStr != "" )
            {
                $resourcesStr .= ",";
            }
            $resourcesStr .= sprintf( "%s %s %s %s %s %s", $k, $v['current_value'], $v['store_max_limit'], $v['store_init_limit'], $v['prod_rate'], $v['prod_rate_percentage'] );
        }
        $cp = $cpValue." ".$cpRate;
        $this->provider->executeQuery( "UPDATE p_villages v \r\n\t\t\tSET\r\n\t\t\t\tv.resources='%s',\r\n\t\t\t\tv.cp='%s',\r\n\t\t\t\tv.last_update_date=NOW()\r\n\t\t\tWHERE \r\n\t\t\t\tv.id=%s", array(
            $resourcesStr,
            $cp,
            intval( $villageRow['id'] )
        ) );
    }

}

?>
