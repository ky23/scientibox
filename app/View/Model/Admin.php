<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Admin extends AppModel {
	var $name = 'Admin';
	public $validate = array(
		'email' => array(
			'rule' => 'email',
			'required' => true,
			'message' => 'Vous devez entrer votre adresse email valide'
			),
		array(
			'rule' => 'isUnique',
			'message' => 'Cette adresse mail exsite déja'
			),
		'password' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'Vous devez entrer le nom de votre Société'
			)
		);

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
				);
		}
		return true;
	}
}

?>