<?php
require_once( LANG_UI_PATH."custbuilds.php" );
if ( 1 < $Var_72['buildingCount'] )
{
    echo "<br/><b>";
    echo LANGUI_CUSTBU_CRANNYEXTRA;
    echo " : ";
    echo $this->crannyProperty['totalSize'];
    echo " ";
    echo constant( "item_unit_".$this->buildProperties['building']['item_id'] );
    echo "</b>\r\n";
}
?>
