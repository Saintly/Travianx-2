<?php 
require('.'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'boot.php');
class GPage extends DefaultPage{

	public function GPage(){
		parent::defaultpage();
		$this->viewFile = "training.php";
	}
}
$p = new GPage();
$p->run();