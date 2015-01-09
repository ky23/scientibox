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
		$information = ClassRegistry::init('Information');
		$company = $companyModel->find('first', array(
			'conditions' => array('Company.id' => $event->subject()->data['Company']['id']),
			'recursive' => 0));
		Tools::unsetFromArray($company['Company'], array('event_id', 'status', 'uid', 'id'));
		$changedFields = $this->getChangedFields($company['Company'], $event->subject()->data['Company']);
		foreach($changedFields as $field => $value) {
			$notification = array(
				'date' => date('Y-m-d H:i:s'),
				'table_name' => 'Société',
				'field_name' => $field,
				'old_value' => $changedFields[$field]['oldValue'],
				'new_value' => $changedFields[$field]['newValue'],
				'is_seen' => false,
				'is_archived' => false,
				'applicant_id' => $event->subject()->data['Company']['upload_owner']
				);
			$information->create();
			$information->save($notification);
		}
	}

	public function editProfile($event) {
		$profileModel = ClassRegistry::init('Profile');
		$information = ClassRegistry::init('Information');
		$profile = $profileModel->find('first', array(
			'conditions' => array('id' => $event->subject()->data['Profile']['id']),
			'recursive' => 0));
		Tools::unsetFromArray($profile['Profile'], array('event_id', 'company_id', 'applicant_id', 'uid', 'id'));
		$changedFields = $this->getChangedFields($profile['Profile'], $event->subject()->data['Profile']);
		foreach($changedFields as $field => $value) {
			$notification = array(
				'date' => date('Y-m-d H:i:s'),
				'table_name' => 'Demandeurs',
				'field_name' => $field,
				'old_value' => $changedFields[$field]['oldValue'],
				'new_value' => $changedFields[$field]['newValue'],
				'is_seen' => false,
				'is_archived' => false,
				'applicant_id' => $event->subject()->data['Profile']['upload_owner']
				);
			$information->create();
			$information->save($notification);
		}
	}

	private function getChangedFields($oldData, $newData) {
		$changedFields = array();
		foreach($oldData as $field => $value) {
			if ($newData[$field] != null && $value != null && $newData[$field] != $value) {
				if ($field == 'creation_date' || $field == 'birthdate' || $field == 'closing_date') {
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
} 

?>