<?php
class Widget extends WebService{

	public $viewFile;
	public $layoutViewFile;

	public function printContent(){
		require(VIEW_PATH.$this->viewFile);
	}

	public function preRender(){
	}

	public function run(){
		$this->load();
		$this->preRender();
		if($this->layoutViewFile != NULL){
			require(VIEW_PATH.$this->layoutViewFile);
		}
		elseif($this->viewFile != NULL){
			require(VIEW_PATH.$this->viewFile);
		}
		$this->unload();
		unset($this);
	}
}