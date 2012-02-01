<?php 
class ResourcesModel extends ModelBase{

	public function getVillageData($id){
		return $this->provider->fetchRow( "SELECT v.id, v.player_id, v.is_oasis, v.player_name, v.village_name, v.resources, v.cp, v.crop_consumption, TIME_TO_SEC(TIMEDIFF(NOW(), v.last_update_date)) elapsedTimeInSeconds FROM p_villages v WHERE v.id = %s", array( $id ) );
	}

	public function updateVillageResources($vid, $new_resources){
		$villageRow = $this->getVillageData( $vid );
		$elapsedTimeInSeconds = $villageRow['elapsedTimeInSeconds'];
		$resources = array( );
		$r_arr = explode( ",", $villageRow['resources'] );
		foreach ( $r_arr as $r_str ){
			$r2 = explode( " ", $r_str );
			$prate = floor( $r2[4] * ( 1 + $r2[5] / 100 ) ) - ( $r2[0] == 4 ? $villageRow['crop_consumption'] : 0 );
			$current_value = $new_resources[$r2[0]] < 0 ? floor( $r2[1] + $elapsedTimeInSeconds * ( $prate / 3600 ) ) : $new_resources[$r2[0]];
			if ( $r2[2] < $current_value ){
				$current_value = $r2[2];
			}
			$resources[$r2[0]] = array( "current_value" => $current_value, "store_max_limit" => $r2[2], "store_init_limit" => $r2[3], "prod_rate" => $r2[4], "prod_rate_percentage" => $r2[5], "calc_prod_rate" => $prate );
		}
		$cpRate = explode( " ", $villageRow['cp'][1] );
		$cpValue = explode( " ", $villageRow['cp'][0] );
		$cpValue = round( $cpValue + $elapsedTimeInSeconds * ( $cpRate / 86400 ), 4 );
		$resourcesStr = "";
		foreach ( $resources as $k => $v ){
			if ( $resourcesStr != "" ){
				$resourcesStr .= ",";
			}
			$resourcesStr .= sprintf( "%s %s %s %s %s %s", $k, $v['current_value'], $v['store_max_limit'], $v['store_init_limit'], $Var_3144['prod_rate'], $v['prod_rate_percentage'] );
		}
		$cp = $cpValue." ".$cpRate;
		$this->provider->executeQuery("UPDATE p_villages v SET v.resources='%s', v.cp='%s', v.last_update_date=NOW() WHERE v.id=%s",array($resourcesStr,$cp,intval($villageRow['id'])));
	}
}