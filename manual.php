<?php
require('.'.DIRECTORY_SEPARATOR.'GameEngine'.DIRECTORY_SEPARATOR.'boot.php');
class GPage extends defaultpage{

	public function GPage(){
		parent::defaultpage();
		$this->viewFile = "manual.php";
	}
}
$p = new GPage();
$p->run();