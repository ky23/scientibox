<?php

class Contact extends AppModel {
	public $useTable = false;
	public $validate = array(
		'company' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'Vous devez entrer votre nom et prénom'
			),
		'name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'Vous devez entrer le nom de votre Société'
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
			)
		);

	public function send($data) {
		$this->set($data);
		if ($this->validates()) {
			App::uses('CakeEmail', 'Network/Email');
			$mail = new CakeEmail();
			$mail->to('khatal.yacine@gmail.com')
			->from($data['email'])
			->subject('Scientibox contact subject :'.$data['subject']);
			return $mail->send($data['message']);
		} else {
			return false;
		}
	}
}

?>