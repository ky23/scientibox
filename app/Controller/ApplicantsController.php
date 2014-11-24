<?php

App::uses('WebServices', 'Vendor');

class ApplicantsController extends AppController {
	public $name = 'Applicants';

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('signup', 'login', 'logout');
	}

	public function login($token = null) {
		$this->autoRender = false;
		if (isset($token)) {
			$applicant = $this->Applicant->find('first', array(
				'conditions' => array('Applicant.token' => $token),
				'recursive' => -1));
			$this->Session->write('Applicant.id', $applicant['Applicant']['id']);
			if (!empty($applicant)) {
				if ($this->checkTokenValidity($applicant['Applicant']['token_validity'])) {
					return $this->redirect(array('controller' => 'companies', 'action' => 'edit_company'));
				} else {
					$this->Session->setFlash('Votre compte a expiré.', 'flash_error');
					return $this->redirect(array('controller' => 'home', 'action' => 'index'));
				}
			}
		}
		return $this->redirect(array('controller' => 'home', 'action' => 'index'));
	}

	public function signup() {
		$this->autoRender = false;
		if ($this->request->is('post')) {
			$finded_user = $this->Applicant->find('first', array(
				'conditions' => array('Applicant.email' => $this->request->data['email']),
				'recursive' => -1));
			if (!empty($finded_user)) {
				if ($finded_user['Applicant']['token'] != null) {
					if ($this->checkTokenValidity($finded_user['Applicant']['token_validity'])) {
						$token = $finded_user['Applicant']['token'];
						$data = array(
							'id' => $finded_user['Applicant']['id'],
							'last_login' => date("Y-m-d H:i:s"),
							'ip' => $this->request->clientIp(false)
							);
					} else {
						$this->Session->setFlash('Votre compte a expiré.', 'flash_error');
						exit;
					}
				} else {
					$token = Security::hash($this->request->data['email'] . "/" . time(), 'sha256', true);
					$data = array(
						'id' => $finded_user['Applicant']['id'],
						'token' => $token,
						'token_validity' => date("Y-m-d H:i:s", strtotime('+90 days')),
						'last_login' => date("Y-m-d H:i:s"),
						'ip' => $this->request->clientIp(false)
						);
				}
				if ($this->Applicant->save($data)) {
					if ($this->Applicant->send($this->request->data, $token)) {
						$this->Session->setFlash('Nous vous avons envoyé un mail contenant le lien de connexion, veuillez consulter vos spams', 'flash_success');
					} 	
				}
			} else {
				$informations = WebServices::getInformations($this->request->data['email']);
				debug($inf); die();
				if (!empty($informations)) {
					if (($token = $this->saveInformations($informations, $this->request->data['email']))) {
						if ($this->Applicant->send($this->request->data, $token)) {
							$this->Session->setFlash('Nous vous avons envoyé un mail contenant le lien de connexion, veuillez consulter vos spams', 'flash_success');
						} 	
					}
				}
			}
		}
		return $this->redirect(array('controller' => 'home', 'action' => 'index'));
	}

	public function logout() {
		$this->Session->delete('Applicant');
		return $this->redirect(array('controller' => 'home', 'action' => 'index'));
	}

	private function checkTokenValidity($date) {
		$date = explode('-', $date);
		$today = explode('-', date("Y-m-d", strtotime('today')));
		if (intval($date[0]) > intval($today[0])) {
			return true;
		} else if (intval($date[0]) == intval($today[0])) {
			if ($date[1] > intval($today[1])) {
				return true;
			} else if(intval($date[1]) == intval($today[1])) {
				if (intval($date[2]) >= intval($today[2])) {
					return true;
				} 
			}
		}
		return false;
	}

	private function saveInformations($informations, $email) {
		$applicantToken = 'NONE';
		$address = preg_split('/ /', $informations['address']['streetName'], 2); 
		$street_number = ($address[0]) ? $address[0] : ' ';
		$street_name = ($address[1]) ? $address[1] : ' ';
		$company = array(
			'uid' => $informations['companyUid'],
			'name' => $informations['companyName'],
			'website' => $informations['webSite'],
			'zip_code' => $informations['address']['zipCode'],
			'street_number' => $street_number,
			'street_name' => $street_name,
			'city_name' => $informations['address']['cityName'],
			'siret' => $informations['siret'],
			'naf_code' => $informations['nafCode'],
			'legal_status' => $informations['legalStatus'],
			'social_capital' => $informations['socialCapital'],
			'creation_date' => $informations['creationDate'],
			'social_capital' => $informations['socialCapital']
			);
		$this->loadModel('Company');
		$this->Company->create();
		if ($this->Company->save($company, false)) {
			foreach ($informations['applicants'] as $info) {
				$token = Security::hash($info['email'] . "/" . time(), 'sha256', true);
				if ($email == $info['email']) {
					$applicantToken = $token;
				}
				$address = preg_split('/ /', $info['address']['streetName'], 2);
				$street_number = ($address[0]) ? $address[0] : '';
				$street_name = ($address[1]) ? $address[1] : '';
				$tmp = array(
					'Applicant' => array(
						'email' => $info['email'],
						'token' => $token,
						'token_validity' => date("Y-m-d H:i:s", strtotime('+30 days')),
						'last_login' => date("Y-m-d H:i:s"),
						'ip' => $this->request->clientIp(false),
						'company_id' => $this->Company->id
						),
					'Profile' => array(
						'uid' => $info['applicantUid'],
						'first_name' => $info['firstName'],
						'last_name' => $info['lastName'],
						'email' => $info['email'],
						'phone' => $info['mobile'],
						'social_situation' => $info['socialSituation'],
						'zip_code' => $info['address']['zipCode'],
						'street_number' => $street_number,
						'street_name' => $street_name,
						'city_name' => $info['address']['cityName'],
						'birthdate' => $info['birthDate'],
						'birth_city' => $info['birthCity'],
						'loan_amount' => $info['loanAmount'],
						'eligibility' => $info['oseo']
						)
					);
				//debug($tmp); die();
				if ($this->Applicant->saveAssociated($tmp, array('validate' => false))) {
					continue;
				} else {
					return 'NONE';
				}
			}
			return $applicantToken;
		}
		return 'NONE';
	}
}

?>