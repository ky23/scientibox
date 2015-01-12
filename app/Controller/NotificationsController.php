<?php

App::uses('Tools', 'Vendor');

class NotificationsController extends AppController {
	public $name = 'Notifications';
	public $uses = array('Authentication', 'File', 'Information', 'Applicant');

	public function authentication_notifs($page = 1) {
		$this->Authentication->recursive = 2;
		$this->Authentication->Applicant->recursive = 2;
		$authentications = $this->Authentication->find('all', array(
			'conditions' => array('is_archived' => false),
			'order' => array('Authentication.date DESC')
			));
		$this->set('data', $this->formatData($authentications, 'Authentication'));
		$this->Authentication->updateAll(array('is_seen' => true), array('is_seen' => false));
		if ($page == 1) {
			$this->set('pages', array($page => true, $page + 1 => false, $page + 2 => false));
		} else {
			$this->set('pages', array($page - 1 => false, $page => true, $page + 1 => false));
		}
	}

	public function file_notifs($page = 1) {
		$this->File->recursive = 2;
		$this->File->Applicant->recursive = 2;
		$files = $this->File->find('all', array(
			'conditions' => array('is_archived' => false),
			'order' => array('File.date DESC')
			));
		$this->set('data', $this->formatData($files, 'File'));
		$this->File->updateAll(array('is_seen' => true), array('is_seen' => false));
		if ($page == 1) {
			$this->set('pages', array($page => true, $page + 1 => false, $page + 2 => false));
		} else {
			$this->set('pages', array($page - 1 => false, $page => true, $page + 1 => false));
		}
	}

	public function information_notifs($page = 1) {
		$this->Information->recursive = 2;
		$this->Information->Applicant->recursive = 2;
		$information = $this->Information->find('all', array(
			'conditions' => array('is_archived' => false),
			'order' => array('Information.date DESC')
			));
		$this->set('data', $this->formatData($information, 'Information'));
		$this->Information->updateAll(array('is_seen' => true), array('is_seen' => false));
		if ($page == 1) {
			$this->set('pages', array($page => true, $page + 1 => false, $page + 2 => false));
		} else {
			$this->set('pages', array($page - 1 => false, $page => true, $page + 1 => false));
		}
	}

	private function formatData($dataIn, $type) {
		$data = array();
		foreach ($dataIn as $key => $value) {
			$data[$key]['id'] = $value[$type]['id'];
			$data[$key]['Company'] = $value['Applicant']['Company']['name'];
			$data[$key]['Applicant'] = $value['Applicant']['Profile']['first_name'] . 
			' ' . $value['Applicant']['Profile']['last_name'];
			$data[$key]['date'] = Tools::formatDate("d-m-Y H:i:s",
				$value[$type]['date']);
			if ($type == "Authentication") {
				$data[$key]['action'] = Configure::read('Dictionary.' . $value[$type]['action']);
				$data[$key]['ip'] = $value[$type]['connection_ip'];
			} else if ($type == "File") {
				$data[$key]['category'] = Configure::read('Dictionary.' . $value[$type]['category']);
				$data[$key]['type'] = Configure::read('Dictionary.' . $value[$type]['type']);
				$data[$key]['path'] = $value[$type]['path'];
				$data[$key]['name'] = $value[$type]['name'];
			} else if ($type == "Information") {
				$data[$key]['table_name'] = $value[$type]['table_name'];
				$data[$key]['field_name'] =  Configure::read('Dictionary.' . $value[$type]['field_name']);
				$data[$key]['old_value'] = $value[$type]['old_value'];
				$data[$key]['new_value'] = $value[$type]['new_value'];
			}
		}
		return $data;
	}

	public function new_message() {
		$this->autoRender = false;
		$nb_notifs = $this->Authentication->find('count',
			array('conditions' => array('is_seen' => false)));
		$nb_notifs += $this->Information->find('count',
			array('conditions' => array('is_seen' => false)));
		$nb_notifs += $this->File->find('count',
			array('conditions' => array('is_seen' => false)));
		return $nb_notifs;
	}

	public function delete() {
		$this->autoRender = false;
		if ($this->request->is('post') && !empty($this->request->data)) {
			if (!empty($this->request->data['toDelete'])) {
				$selectedReferences = $this->request->data['toDelete'];
				foreach ($selectedReferences as $singleReference) {
					if ($this->request->data['model'] == 'Authentication') {
						$this->Authentication->id = $singleReference;
						$this->Authentication->save(array('is_archived' => true));
					} else if ($this->request->data['model'] == 'File') {
						$this->File->id = $singleReference;
						$this->File->save(array('is_archived' => true));
					} else if ($this->request->data['model'] == 'Information') {
						$this->Information->id = $singleReference;
						$this->Information->save(array('is_archived' => true));
					}
				}
				if ($this->request->data['model'] == 'Authentication') {
					return $this->redirect(array('action' => 'authentication_notifs'));
				} else if ($this->request->data['model'] == 'File') {
					return $this->redirect(array('action' => 'file_notifs'));
				} else if ($this->request->data['model'] == 'Information') {
					return $this->redirect(array('action' => 'information_notifs'));
				}
			}
		}
	}
}

?>