<?php
class WebService{

	public function isPost(){
		return strtolower($_SERVER['REQUEST_METHOD']) == "post";
	}

	public function isCallback(){
		return isset( $_GET['_a1_'] );
	}

	public function load(){
	}

	public function unload(){
	}

	public function run(){
		$this->load();
		$this->unload();
		unset($this);
	}

	public function redirect($url){
		$this->unload();
		unset($this);
		header("location: ".$url);
		exit(0);
	}
}