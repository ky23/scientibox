<?php

class Contact extends AppModel {
	var $name = "Contact";
	public $useTable = false;
	public $actsAs = array(
		'Captcha' => array(
			'field' => array('captcha'),
			'error' => 'Le texte saisi ne correspond pas'
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
		$this->set($data['Contact']);
		if ($this->validates()) {
			if ($data['Contact']['subject'] == 'FB') {
				$subject = 'FeedBack';
				$toEmail = 'scientibox@scientipole-initiative.org';
			} else if ($data['Contact']['subject'] == 'Problème d\'accès') {
				$subject = 'Problème d\'accès';
				$toEmail = 'aide-scientibox@scientipole-initiative';
			} else {
				$subject = 'Contact';
				$toEmail = 'dossier-ph@scientipole-initiative.org';
			}
			App::uses('CakeEmail', 'Network/Email');
			$mail = (FULL_BASE_URL == 'http://localhost:82') ? new CakeEmail('gmail') : new CakeEmail();
			$mail->to(array('khatal.yacine@gmail.com','testscientiweb5@gmail.com'))
			->from($data['Contact']['email'])
			->subject('Scientibox contact subject :' . $subject);
			return $mail->send($data['Contact']['message']);
		} else {
			return false;
		}
	}
}

?>