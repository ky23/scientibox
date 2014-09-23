<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Admin extends AppModel {
	public $name = 'Admin';
	public $validate = array(
		'username' => array(
			'rule' => 'email',
			'required' => true,
			'message' => ''
			),
		array(
			'rule' => 'isUnique',
			'message' => ''
			),
		'password' => array(
			'rule' => array('minLength', '6'),
			'required' => false,
			'message' => ''
			),
		'password-confirm' => array(
			'rule' => array('minLength', '6'),
			'required' => false,
			'message' => ''
			)
		);

	public function sendMail($data, $token, $template, $subject) {
		$this->set($data);
		if ($this->validates()) {
			$link = Configure::read('App.host') . 'admins/activate' . $token;
			App::uses('CakeEmail', 'Network/Email');
			$mail = new CakeEmail();
			$mail->to($data['Admin']['username'])
			->from('no-replay@scientipole.org')
			->subject($subject)
			->emailFormat('html')
			->template($template)
			->viewVars(array(
				'username' => $data['Admin']['username'],
				'link' => $link,
				'password' => ((isset($data['Admin']['password'])) ? $data['Admin']['password'] : ''
					)));
			return $mail->send();
		} else {
			return false;
		}
	}

	public function beforeSave($options = array()) {
		parent::beforeSave($options);
		if (!empty($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
			$this->data[$this->alias]['password'] =  $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true; 
	}
}

?>