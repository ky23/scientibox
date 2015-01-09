<?php

class Information extends AppModel {
	public $name = "Information";
	public $belongsTo = array(
		'Applicant' => array(
			'className' => 'Applicant',
			'foreignKey' => 'applicant_id'
			)
		);
}

?>