<?php

class Contact extends AppModel {
	var $name = "Contact";
	public $useTable = false;
	public $actsAs = array(
		'Captcha' => array(
			'field' => array('captcha'),
			'error' => 'Le texte saisi ne correspond pas.'
			)
		);
	public $validate = array(
		'company' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'Vous devez entrer votre nom et prénom'
			),
		'name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'Vous devez entrer le nom de votre entreprise'
			),
		'email' => array(
			'rule' => 'email',
			'required' => true,
			'message' => 'Vous devez entrer votre adresse email valide'
			),
		'subject' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'Vous devez entrer votre sujet'
			),
		'captcha' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'Le texte saisi n\'est pas valide'
			)
		);

	public function send($data) {
		$this->set($data);
		if ($this->validates()) {
			App::uses('CakeEmail', 'Network/Email');
			$mail = (FULL_BASE_URL == 'http://localhost:82') ? new CakeEmail('gmail') : new CakeEmail();
			$mail->to(array('khatal.yacine@gmail.com','testscientiweb5@gmail.com'))
			->from($data['email'])
			->subject('Scientibox contact subject :' . $data['subject']);
			return $mail->send($data['message']);
		} else {
			return false;
		}
	}
}

?>