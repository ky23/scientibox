<?php

class ProfilesController extends AppController {
	public $name = 'Profiles';

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('edit_profile' , 'warrantly', 'allow', 'deny');
	}

	public function edit_profile() {
		$this->loadModel('Applicant');
		// App::uses('NotifEventListener', 'Event');
		// $this->Profile->getEventManager()->attach(new NotifEventListener());
		$id = $this->Session->read("Applicant.id");
		$applicant = $this->Applicant->find('first',
			array('conditions' => array('Applicant.id' => $id)));
		if (isset($id) && !empty($applicant)) {
			if ($this->request->is(array('post', 'put'))) {
				$token = $this->request->data['tkn'];
				$applicant = $this->Applicant->find('first',
					array('conditions' => array('token' => $token)));
				if (!empty($applicant)) {
					$applicants = $this->Applicant->find('all', array(
						'conditions' => array('Applicant.company_id' => $applicant['Company']['id'])));
					$lenght = count($applicants);
					$tabId = 0;
					foreach ($applicants as $key => $value) {
						if ($applicant['Applicant']['token'] == $value['Applicant']['token']) {
							if ($key < $lenght)
								$tabId = $key;
						}
					}
					$data['Profile'] = $this->request->data['Profile'];
					$data['Profile']['id'] = $applicant['Profile']['id'];
					$data['Profile']['birthdate'] = date("Y-m-d", strtotime($data['Profile']['birthdate']));
					if ($this->Profile->save($data, array('validate' => false))) {
						if ($tabId + 1 < $lenght) {
							$this->Session->write("tabId", $tabId);
							return $this->redirect(array(
								'controller' => 'profiles',
								'action' => 'edit_profile'));
						} else {
							return $this->redirect(array(
								'controller' => 'profiles',
								'action' => 'warrantly'));
						}
					} else {
						debug($this->Profile->validationErrors); die();
					}
				}
			} else {
				$applicants = $this->Applicant->find('all', array(
					'conditions' => array('Applicant.company_id' => $applicant['Company']['id'])));
				foreach ($applicants as &$applicant) {
					$applicant['Profile']['birthdate'] = date("d-m-Y",
						strtotime($applicant['Profile']['birthdate']));
				}
				//debug($applicants); die();
				$this->set('applicants', $applicants);
			}
		} else {
			return $this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
	}

	public function allow() {
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			if (!empty($this->request->data['Company']['data'])) {
				$data = explode('@', $this->request->data['Company']['data']);
				if (count($data) == 3) { 
					$profile = $this->Profile->find('first', array('conditions' => array(
						'Profile.id' => $data[0]
						), 'recursive' => 0));
					if (!empty($profile) && !$profile['Profile']['is_' . $data[1] . '_valid']) {
						$this->Profile->id = $data[0];
						$this->Profile->saveField('is_' . $data[1] . '_valid', true);
						return json_encode(true);
					}
				}
			}
		}
		return json_encode(false);
	}

	public function deny() {
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			if (!empty($this->request->data['Company']['data'])) {
				$data = explode('@', $this->request->data['Company']['data']);
				if (count($data) == 3) { 
					$profile = $this->Profile->find('first', array('conditions' => array(
						'Profile.id' => $data[0]
						), 'recursive' => 0));
					if (!empty($profile) && $profile['Profile']['is_' . $data[1] . '_valid']) {
						$this->Profile->id = $data[0];
						$this->Profile->saveField('is_' . $data[1] . '_valid', false);
						return json_encode(true);
					}
				}
			}
		}
		return json_encode(false);
	}

	public function warrantly() {
		$id = $this->Session->read("Applicant.id");
		if (isset($id)) {
			$this->loadModel('Applicant');
			$applicant = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $id)));
			$applicants = $this->Applicant->find('all', array('conditions' => array('company_id' => $applicant['Company']['id'])));
			$this->set('applicants', $applicants);
		} else {
			return $this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
	}
}

?>