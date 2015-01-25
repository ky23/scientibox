<?php

App::uses('Tools', 'Vendor');
App::uses('NotifEventListener', 'Event');

class CompaniesController extends AppController {
	public $name = 'Companies';
	public $helpers = array('Html', 'Form');
	public $uses = array('Company', 'Applicant', 'Profile', 'File');

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array(
			'show_company',
			'show_applicants',
			'edit_company',
			'inscription',
			'allow',
			'deny',
			'send_email')
		);
	}

	public function index($page = 1) {
		//debug(Configure::read('Dictionary.last_name')); die();
		if ($this->request->is('ajax') && !empty($this->request->data)) {
			//debug($this->request->data); die();
			$this->set('companies', $this->Company->find('all', array(
				'conditions' => array('Company.name LIKE' => '%' . $this->request->data['Search'] . '%'))
			));
		} else {
			$this->set('companies', $this->Company->find('all'));
		}
		if ($page == 1) {
			$this->set('pages', array($page => true, $page + 1 => false, $page + 2 => false));
		} else {
			$this->set('pages', array($page - 1 => false, $page => true, $page + 1 => false));
		}
	}

	private function setLoanAffectation($data) {
		$options = array('C' => 'Capital', 'CC' => 'Compte courant', 'CCB' => 'Compte courant bloqué');
		$length = count($data);
		$result = '';
		foreach ($data as $key => $value) {
			if ($key != $length - 1) {
				$result .= $options[$value] . '|';
			} else {
				$result .= $options[$value];
			}
		}
		return $result;
	}

	private function getLoanAffectation($data) {
		$options = array('C' => 'Capital', 'CC' => 'Compte courant', 'CCB' => 'Compte courant bloqué');
		return explode('|', $data);
	}

	public function edit_company() {
		$this->Company->getEventManager()->attach(new NotifEventListener());
		$id = $this->Session->read("Applicant.id");
		$applicant = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $id)));
		if (isset($id) && !empty($applicant)) {
			if ($this->request->is(array('post', 'put'))) {
				$this->request->data['Company']['upload_owner'] = $id;
				$this->request->data['Company']['company_id'] = $applicant['Company']['id'];
				$this->request->data['Company']['id'] = $applicant['Company']['id'];
				$this->request->data['Company']['creation_date'] = date("Y-m-d",
					strtotime($this->request->data['Company']['creation_date']));
				$this->request->data['Company']['closing_date'] = date("Y-m-d",
					strtotime($this->request->data['Company']['closing_date']));
				$data['Company'] = $this->request->data['Company'];
				$data['Profile']  = array();
				foreach ($this->request->data['Profile'] as $key => $value) {
					$tmp['id'] = $key;
					$tmp['company_id'] = $applicant['Company']['id'];
					$tmp['shares'] = $this->request->data['Profile'][$key]['shares'];
					$tmp['loan_affectation'] = $this->setLoanAffectation($this->request->data['Profile'][$key]['loan_affectation']);
					array_push($data['Profile'], $tmp);
				}
				if ($this->Company->saveAssociated($data, array('validate' => false))) {
					$this->Session->write("tabId", -1);
					return $this->redirect(array('controller' => 'profiles', 'action' => 'edit_profile'));
				} else {
					debug($this->Company->validationErrors); die();
				}
			} else {
				$applicant['Company']['creation_date'] = (!empty($applicant['Company']['creation_date'])) ?
				date("d-m-Y", strtotime($applicant['Company']['creation_date'])) : date("d-m-Y");
				$applicant['Company']['closing_date'] = (!empty($applicant['Company']['closing_date'])) ?
				date("d-m-Y", strtotime($applicant['Company']['closing_date'])) : date("d-m-Y");
				$data['Company'] = $applicant['Company'];
				$applicants = $this->Applicant->find('all', array(
					'conditions' => array('Applicant.company_id' => $applicant['Company']['id'])));
				foreach ($applicants as $key => $value) {
					$data['Profile'][$value['Profile']['id']]['shares'] = $value['Profile']['shares'];
					$data['Profile'][$value['Profile']['id']]['loan_affectation'] = $this->getLoanAffectation($value['Profile']['loan_affectation']);
					$applicants[$key]['Profile']['loan_affectation'] = $this->getLoanAffectation($value['Profile']['loan_affectation']);
				}
				$this->request->data = $data;
				$this->set('applicants', $applicants);
				$this->set('total_shares', $applicant['Company']['total_shares']);
			}
		} else {
			return $this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
	}

	public function show_company($id = 0) {
		if ($id > 0) {
			$this->Session->write('Company.id', $id);
		} else {
			$id = $this->Session->read('Company.id');
		}
		$this->Company->recursive = 0;
		$Company = $this->Company->find('first', array('conditions' => array('Company.id' => $id)));
		Tools::unsetFromArray($Company['Company'], array('id', 'uid', 'event_id'));
		$this->set('Company', $Company['Company']);
	}

	public function show_applicants() {
		$id = $this->Session->read('Company.id');
		if ($id > 0) {
			$Profiles = $this->Profile->find('all', array(
				'conditions' => array('Profile.company_id' => $id)
				));
			foreach ($Profiles as $key => $value) {
				Tools::unsetFromArray($Profiles[$key]['Profile'], array(
					'id',
					'uid',
					'applicant_id',
					'company_id')
				);
			}
			$this->set('Applicants', $Profiles);
		}
	}

	public function company_files() {
		$id = $this->Session->read('Company.id');
		if ($id > 0) {
			$this->File->recursive = 0;
			$Files = $this->File->find('all', array(
				'conditions' => array('File.category' => 'Company', 'File.company_id' => $id)
				));
			$this->set('Files', $Files);
		}
	}

	public function applicant_files() {
		$id = $this->Session->read('Company.id');
		if ($id > 0) {
			$this->File->recursive = 0;
			$Company = $this->Company->find('first', array(
				'conditions' => array('Company.id' => $id)
				));
			$data = array();
			foreach ($Company['Profile'] as $key => $value) {
				$Files = $this->File->find('all', array(
					'conditions' => array(
						'File.category' => 'Profile',
						'File.company_id' => $id,
						'File.concerned_id' => $value['id']
						)
					));
				$data[$key]['Profile'] = $value;
				$data[$key]['Files'] = array();
				foreach ($Files as $value) {
					array_push($data[$key]['Files'], $value['File']);
				}
			}
			//debug($data); die();
			$this->set('Files', $data);
		}
	}

	public function allow() {
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			//return json_encode($this->request->data);
			$id = $this->request->data['File']['id'];
			if (!empty($id)) {
				$this->File->updateAll(array('File.is_valid' => 1), array('File.id' => $id));
				return json_encode(true);
			}
		}
		return json_encode(false);
	}

	public function deny() {
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			//return json_encode($this->request->data);
			$id = $this->request->data['File']['id'];
			if (!empty($id)) {
				$this->File->updateAll(array('File.is_valid' => 0), array('File.id' => $id));
				return json_encode(true);
			}
		}
		return json_encode(false);
	}

	public function send_email($id = 0) {
		if (!empty($id)) {
			if ($this->request->is(array('post', 'put'))) {
				//debug($this->request->data); die();
			} else {
				$this->request->data['Company']['username'] = "khatal.yacine@gmail.com";
				$this->request->data['Company']['object'] = "Refus du dossier";
				$this->request->data['Company']['mail'] = "<h2>Les raisons de refus: </h2></br><ul id=\"mail-reasons\"><li>%reason1</li><li>%reason2</li><li>%reason3</li><li>%reason4</li></ul>";
			}
		}
	}

	public function inscription() {
		$id = $this->Session->read("Applicant.id");
		if (isset($id)) {
			$this->loadModel('Event');
			$events = $this->Event->find('all');
			$dateObject = array();
			$dateObject['Aucune'] = 'Aucune';
			foreach ($events as $evt) {
				$dateObject["Le " . $evt['Event']['date'] . " à " . $evt['Event']['start_time'] . " : " . $evt['Event']['name']] = $evt['Event']['street_name'] . " " . $evt['Event']['zip_code'] . " " . $evt['Event']['city_name'];
			}
			$this->set('dates', $dateObject);
			return;
		} else {
			return $this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
	}
}

?>