<?php

class File extends AppModel {
	public $name = 'File';
	public $belongsTo = array(
		'Applicant' => array(
			'className' => 'Applicant',
			'foreignKey' => 'applicant_id'
			),
		'Profile' => array(
			'className' => 'Profile',
			'foreignKey' => 'concerned_id'
			)
		);
}

?>