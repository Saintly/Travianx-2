<?php
require_once(LANG_UI_PATH."custbuilds.php");
if(1< $Var_72['buildingCount']){
	echo '<br/><b>'.LANGUI_CUSTBU_CRANNYEXTRA.' : '.$this->crannyProperty['totalSize'].' '.constant('item_unit_'.$this->buildProperties['building']['item_id']).'</b><br />';
}