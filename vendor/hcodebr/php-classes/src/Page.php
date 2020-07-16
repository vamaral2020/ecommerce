<?php 	

namespace Hcode;

use Rain\tpl;

class Page {

	private $tpl;
	private $options = [];
	private $defalts = [
		"header"=>true,
		"footer"=>true,
		"data"=>[]
	];

	public function __construct($opts = array(), $tpl_dir="/views/"){

		$this->options = array_merge($this->defalts, $opts);

		$config = array(
		"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir, //criar views
		"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
		"debug"         => false // set to false to improve the speed
	    );

		Tpl::configure( $config );

		$this->tpl = new tpl;

		$this->setData($this->options["data"]);

		if ($this->options["header"]===true)$this->tpl-> draw("header"); //criar header

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

		if ($this->options["footer"]===true) $this->tpl->draw("footer");


	}
}


 ?>
