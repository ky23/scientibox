<?php

class AboutController extends AppController {
	var $name = 'About';

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function index() {
	}
}

?>