<?php

class Notification extends AppModel {
	public $name = "Notification";
	public $belongsTo = array(
		'Applicant' => array(
			'className' => 'Applicant',
			'foreignKey' => 'applicant_id'
			)
		);
}

?>