<?php 	

namespace Hcode;

use Rain\tpl;

class Page {

	private $tpl;
	private $options = [];
	private $defalts = [
		"data"=>[]
	];

	public function __construct($opts = array()){

		$this->options = array_merge($this->defalts, $opts);

		$config = array(
		"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",   //criar views
		"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
		"debug"         => false // set to false to improve the speed
	    );

		Tpl::configure( $config );

		$this->tpl = new tpl;

		$this->setData($this->options["data"]);

		$this->tpl-> draw("header"); //criar header

	}

	private function setData($data = array()){

		foreach ($data as $key => $value){
		 	$this->tpl->assing($key, $value);
		}
	}


	public function setTpl($name, $data = array(), $returnHTML = false){

		$this ->setData($data);
		$this ->tpl->draw($name, $returnHTML);
	}


	public function __destruct(){

		$this->tpl->draw("footer");


	}
}


 ?>
