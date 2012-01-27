<?php
require(".".DIRECTORY_SEPARATOR."GameEngine".DIRECTORY_SEPARATOR."boot.php");
class GPage extends ProcessVillagePage{

	public $showLevelsStr;

	public function GPage(){
		parent::ProcessVillagePage();
		$this->viewFile = "village2.php";
		$this->contentCssClass = "village2";
	}

	public function load(){
		parent::load();
		// $cookie = ( );
		//  $this->showLevelsStr = $cookie->showLevels ? "on" : "off";
		$cookie->showLevels = $_COOKIE['lvl'];//( );
		$this->showLevelsStr = $cookie->showLevels ? "on" : "off";
	}

	public function getWallCssName(){
		if($this->buildings[40]['level'] == 0 && $this->buildings[40]['update_state'] == 0){
			return "d2_0";
		}
		return $this->gameMetadata['tribes'][$this->data['tribe_id']]['wall_css'];
	}

	public function getBuildingName($id){
		$emptyName = "";
		switch($id){
			case 39 :$emptyName = buildin_place_railpoint;break;
			case 40 :$emptyName = buildin_place_wall;break;
		}
		$emptyName = $this->data['is_special_village'] && ( $id == 25 || $id == 26 || $id == 29 || $id == 30 || $id == 33 ) ? buildin_place_topbuild : buildin_place_empty;
		//break;
		return htmlspecialchars( $this->buildings[$id]['item_id'] == 0 ? $emptyName : constant( "item_".$this->buildings[$id]['item_id'] )." ".level_lang." ".$this->buildings[$id]['level'] );
	}

	public function getBuildingCssName($id){
		$cssName = "";
		switch($id){
			case 39 :
				$e = "";
				if($this->buildings[$id]['level'] == 0 && 0 < $this->buildings[$id]['update_state']){
					$e = "b";
				}
				elseif( $this->buildings[$id]['level'] == 0 ){
					$e = "e";
				}
				$cssName = "g".$this->buildings[$id]['item_id'].$e;
			break;
			case 25 :break;
            case 26 :break;
            case 29 :break;
            case 30 :break;
            case 33 :
				if($this->data['is_special_village']){
					$cssName = "g40";
					if(20 <= $this->buildings[$id]['level']){
						$cssName .= "_".floor( $this->buildings[$id]['level'] / 20 );
					}
				}
			break;
		}
		$e = $this->buildings[$id]['level'] == 0 && 0 < $this->buildings[$id]['update_state'] ? "b" : "";
		$cssName = $this->buildings[$id]['item_id'] == 0 ? "iso" : "g".$this->buildings[$id]['item_id'].$e;
		//break;
		return $cssName;
	}

	public function getBuildingTitle($id){
		$name = $this->getBuildingName( $id );
		return "title=\"".$name."\" alt=\"".$name."\"";
	}

	public function getBuildingTitleClass($id){
		$name = $this->getBuildingName( $id );
		$cssClass = $this->getBuildingCssName( $id );
		return $cssClass."\" alt=\"".$name;
	}
}
$p = new GPage( );
$p->run( );