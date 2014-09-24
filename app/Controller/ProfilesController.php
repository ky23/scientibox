<?php

class ProfilesController extends AppController {
	public $name = 'Profiles';

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('edit_profile' , 'warrantly', 'allow', 'deny');
	}

	public function edit_profile($currentId = null) {
		$this->loadModel('Applicant');
		App::uses('NotifEventListener', 'Event');
		$this->Profile->getEventManager()->attach(new NotifEventListener());
		if ($currentId == null) {
			$currentId = $this->Session->read("Applicant.id");
		}
		$applicant = $this->Applicant->find('first', array('conditions' => array('Profile.id' => $currentId)));
		if (!empty($currentId) && !empty($applicant)) {
			$applicants = $this->Applicant->find('all', array('conditions' => array('company_id' => $applicant['Company']['id'])));
			$this->set('applicants', $applicants);
			foreach ($applicants as $applicant) {
				if ($applicant['Profile']['id'] == $currentId) {
					$applicant_to_edit = $applicant;
				}
			}
			$this->set('current_id', $currentId);
			$applicant_to_edit['Profile']['birthdate'] = date("d-m-Y", strtotime($applicant_to_edit['Profile']['birthdate']));
			$this->set('applicant_to_edit', $applicant_to_edit);
			if ($this->request->is('post', 'put')) {
				$this->Profile->set($this->request->params['form']);
				$this->Profile->set("ParentDir", $applicant['Company']['name'] . "_" . $applicant['Company']['id']);
				$this->request->data['Profile']['id'] = $applicant_to_edit['Profile']['id'];
				$this->request->data['Profile']['applicant_id'] = $currentId;
				$this->request->data['Profile']['birthdate'] = date("Y-m-d", strtotime($this->request->data['Profile']['birthdate']));
				if ($this->Profile->save($this->request->data, false)) {
					return $this->redirect(array('action' => 'warrantly'));
				}
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