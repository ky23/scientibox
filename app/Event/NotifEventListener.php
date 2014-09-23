<?php

App::uses('CakeEventListener', 'Event');
App::uses('Tools', 'Vendor');

class NotifEventListener implements CakeEventListener {

	public function implementedEvents() {
		return array(
			'Model.Company.edit' => 'editCompany',
			'Model.Profile.edit' => 'editProfile'
			);
	}

	public function editCompany($event) {
		$companyModel = ClassRegistry::init('Company');
		$notificationModel = ClassRegistry::init('Notification');
		$company = $companyModel->find('first', array('conditions' => array('Company.id' => $event->subject()->data['Company']['id'])));
		$this->checkAddedFiles($notificationModel, $event, $event->subject()->data['Company'], 'Company', $companyModel, $company);
		Tools::unsetFromArray($company, array('Event'));
		Tools::unsetFromArray($company['Company'], array(
			'event_id', 
			'status',
			'uid',
			'kbis_file',
			'associates_file',
			'is_kbis_file_valid',
			'is_associates_file_valid'
			));
		$changedFields = $this->getChangedFields($company['Company'], $event->subject()->data['Company']);
		foreach($changedFields as $field => $value) {
			$notification = array(
				'table_name' => 'Société',
				'field_name' => $field,
				'updated_date' => date('Y-m-d H:i:s'),
				'applicant_id' => $event->subject()->data['Company']['applicant_id'],
				'old_value' => $changedFields[$field]['oldValue'],
				'new_value' => $changedFields[$field]['newValue'],
				'is_seen' => false,
				'status' => 'NONE'
				);
			$notificationModel->create();
			$notificationModel->save($notification);
		}
	}

	public function editProfile($event) {
		$profileModel = ClassRegistry::init('Profile');
		$notificationModel = ClassRegistry::init('Notification');
		$profile = $profileModel->find('first', array('conditions' => array('id' => $event->subject()->data['Profile']['id'])));
		unset($profile['Profile']['shares']);
		unset($profile['Profile']['eligibility']);
		unset($profile['Profile']['is_payed']);
		unset($profile['Profile']['uid']);
		unset($profile['Profile']['loan_amount']);
		$this->checkAddedFiles($notificationModel, $event, $event->subject()->data['Profile'], 'Profile', $profileModel, $profile);
		Tools::unsetFromArray($profile['Profile'], array(
			'shares', 
			'eligibility',
			'is_payed',
			'uid',
			'loan_amount',
			'identity_file',
			'home_file',
			'bank_file',
			'emplt_file',
			'terms_file',
			'is_identity_file_valid',
			'is_home_file_valid',
			'is_bank_file_valid',
			'is_emplt_file_valid',
			'is_terms_file_valid'
			));
		$changedFields = $this->getChangedFields($profile['Profile'], $event->subject()->data['Profile']);
		foreach($changedFields as $field => $value) {
			$notification = array(
				'table_name' => 'Demandeurs',
				'field_name' => $field,
				'updated_date' => date('Y-m-d H:i:s'),
				'applicant_id' => $event->subject()->data['Profile']['applicant_id'],
				'old_value' => $changedFields[$field]['oldValue'],
				'new_value' => $changedFields[$field]['newValue'],
				'is_seen' => false,
				'status' => 'NONE',
				);
			$notificationModel->create();
			$notificationModel->save($notification);
		}
	}

	private function getChangedFields($oldData, $newData) {
		$changedFields = array();
		foreach($oldData as $field => $value) {
			if ($newData[$field] != $value) {
				if ($field == 'creation_date' || $field == 'birthdate') {
					$changedFields[$field]['oldValue'] = date("d-m-Y", strtotime($value));
					$changedFields[$field]['newValue'] = date("d-m-Y", strtotime($newData[$field]));
				} else {
					$changedFields[$field]['oldValue'] = $value;
					$changedFields[$field]['newValue'] = $newData[$field];
				}
			}
		}
		return $changedFields;
	}

	private function checkAddedFiles($notificationModel, $event, $data, $table_name, $callerModel, $dataModel) {
		$files = preg_grep('/_file$/', array_keys($data));
		foreach($files as $file) {
			if ($data[$file]['name'] != '' && $data[$file]['tmp_name'] != '' && $data[$file]['size'] != 0) {
				$notification = array(
					'table_name' => ($table_name == 'Company') ? 'Société' : 'Demandeurs',
					'field_name' => $file,
					'updated_date' => date('Y-m-d H:i:s'),
					'applicant_id' => $event->subject()->data[$table_name]['applicant_id'],
					'old_value' => '/',
					'new_value' => '/',
					'is_seen' => false,
					'status' => 'NONE',
					'file' => $data[$file]['path'] . "||" . $data[$file]['name']
					);
				$notificationModel->create();
				$notificationModel->save($notification);
				$callerModel->data[$callerModel->alias][$file] = $data[$file]['path'] . "||" . $data[$file]['name'];
				$callerModel->data[$callerModel->alias]['is_' . $file . '_valid'] = false;
			} else {
				$callerModel->data[$callerModel->alias][$file] = $dataModel[$table_name][$file];
			}
		}
	}
} 

?>