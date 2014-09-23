<?php

class MainController extends AppController {
	var $name = 'Main';
	public $helpers = array('Html', 'Form');

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	
	public function index() {

	}
}

?>