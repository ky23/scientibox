<?php

App::uses('Tools', 'Vendor');

class CompaniesController extends AppController {
	public $name = 'Companies';
	public $helpers = array('Html', 'Form');
	private $itemPerPage = 5;

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('show_company', 'edit_company', 'inscription', 'allow', 'deny');
	}

	public function index($page = 1) {
		// $this->loadModel('Applicant');
		$this->set('companies', $this->Company->find('all'));
		//debug($this->Company->find('all')); die();
		$this->set('itemPerPage', $this->itemPerPage);
		if ($page == 1) {
			$this->set('pages', array($page => true, $page + 1 => false, $page + 2 => false));
		} else {
			$this->set('pages', array($page - 1 => false, $page => true, $page + 1 => false));
		}
	}

	public function edit_company() {
		$this->loadModel('Applicant');
		// App::uses('NotifEventListener', 'Event');
		// $this->Company->getEventManager()->attach(new NotifEventListener());
		$id = $this->Session->read("Applicant.id");
		$applicant = $this->Applicant->find('first', array('conditions' => array('Applicant.id' => $id)));
		//debug($applicant); die();
		if (isset($id) && !empty($applicant)) {
			if ($this->request->is(array('post', 'put'))) {
				//debug($this->request->data); die();
				$this->request->data['Company']['upload_owner'] = $id;
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
					$tmp['loan_affectation'] = $this->request->data['Profile'][$key]['loan_affectation'];
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
					$data['Profile'][$value['Profile']['id']]['loan_affectation'] =
					$value['Profile']['loan_affectation'];
				}
				$this->request->data = $data;
				$this->set('applicants', $applicants);
				$this->set('total_shares', $applicant['Company']['total_shares']);
			}
		} else {
			return $this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
	}

	public function show_company() {
		$this->layout = null;
		if ($this->request->is('ajax')) {
			if (!empty($this->request->data['Company']['id'])) {
				$company =  $this->Company->findById($this->request->data['Company']['id'], array('recursive' => 0));
				if (!empty($company)) {
					$company['Company']['address'] = $company['Company']['street_number'] . ', ' . $company['Company']['street_name'] . ' ' . $company['Company']['zip_code'] . ' ' . $company['Company']['city_name'];
					$company['Company']['creation_date'] = date("d-m-Y", strtotime($company['Company']['creation_date']));
					$company['Company']['capital'] = ($company['Company']['capital']) ? 'Oui' : 'Non';
					$company['Company']['account'] = ($company['Company']['account']) ? 'Oui' : 'Non';
					Tools::unsetFromArray($company['Company'], array(
						'event_id',
						'zip_code',
						'street_name',
						'street_number',
						'city_name'
						));
					$this->set('company', $company);
					$this->loadModel('Applicant');
					$applicants = $this->Applicant->find('all', array('conditions' => array('company_id' => $this->request->data['Company']['id'])));
					if (!empty($applicants)) {
						foreach ($applicants as $key => &$value) {
							Tools::unsetFromArray($applicants[$key], array(
								'Company',
								'Applicant'
								));
							$value['Profile']['address'] = $value['Profile']['street_number'] . ', ' . $value['Profile']['street_name'] . ' ' . $value['Profile']['zip_code'] . ' ' . $value['Profile']['city_name'];
							$value['Profile']['birthdate'] = date("d-m-Y", strtotime($value['Profile']['birthdate']));
							$value['Profile']['is_payed'] = ($value['Profile']['is_payed']) ? 'Oui' : 'Non';
						}
						$this->set('applicants', $applicants);
					}
				}
			}
		} 
	}

	public function allow() {
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			if (!empty($this->request->data['Company']['data'])) {
				$data = explode('@', $this->request->data['Company']['data']);
				if (count($data) == 3) { 
					$company = $this->Company->find('first', array('conditions' => array(
						'Company.id' => $data[0]
						), 'recursive' => 0));
					if (!empty($company) && !$company['Company']['is_' . $data[1] . '_valid']) {
						$this->Company->id = $data[0];
						$this->Company->saveField('is_' . $data[1] . '_valid', true);
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
					$company = $this->Company->find('first', array('conditions' => array(
						'Company.id' => $data[0]
						), 'recursive' => 0));
					if (!empty($company) && $company['Company']['is_' . $data[1] . '_valid']) {
						$this->Company->id = $data[0];
						$this->Company->saveField('is_' . $data[1] . '_valid', false);
						return json_encode(true);
					}
				}
			}
		}
		return json_encode(false);
	}

	public function inscription() {
		$id = $this->Session->read("Applicant.id");
		if (isset($id)) {
			$this->loadModel('Event');
			$events = $this->Event->find('all');
			$dateObject = array();
			$dateObject['Aucune'] = 'Aucune';
			foreach ($events as $evt) {
				$dateObject["Le " . $evt['Event']['date'] . " à " . $evt['Event']['start_time'] . " : " . $evt['Event']['name']] = $evt['Event']['street_number'] . ", " . $evt['Event']['street_name'] . " " . $evt['Event']['zip_code'] . " " . $evt['Event']['city_name'];
			}
			$this->set('dates', $dateObject);
			return;
		} else {
			return $this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
	}
}

?>