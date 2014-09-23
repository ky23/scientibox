<?php

class Applicant extends AppModel {
	var $name = 'Applicant';
	public $belongsTo = array(
		'Profile' => array(
			'className' => 'Profile',
			'foreignKey' => 'profile_id'
			),
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id'
			)
		);

	public function send($data, $token) {	
		$this->set($data);
		if ($this->validates()) {
			$link = Configure::read('App.host') .'applicants/login/' . $token;
			App::uses('CakeEmail', 'Network/Email');
			$mail = new CakeEmail();
			$mail->to(array('khatal.yacine@gmail.com','testscientiweb5@gmail.com')) //$mail->to($data['email'])
			->from('no-replay@scientipole.org')
			->subject('Scientibox login')
			->emailFormat('html')
			->template('applicant_signup')
			->viewVars(array('username' => $data['email'], 'link' => $link));
			return $mail->send();
		} else {
			return false;
		}
	}
}

?>