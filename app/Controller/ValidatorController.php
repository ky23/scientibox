<?php

class ValidatorController extends AppController {
	public $name = 'Validator';
	public $uses = array('Company', 'Profile');

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('validates');
	}

	public function validates() {
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			if ($this->request->data['Model'] == "Company") {
				$this->Company->set($this->request->data);
				$this->Company->validates();
				return json_encode($this->Company->validationErrors);
			} else if ($this->request->data['Model'] == "Profile") {
				$this->Profile->set($this->request->data);
				$this->Profile->validates();
				return json_encode($this->Profile->validationErrors);
			} else {
				return json_encode('false');
			}
		}
	}
}

?>