<?php

class Company extends AppModel {
	public $name = 'Company';
	public $actsAs = array(
		'Upload.Upload' => array(
			'fields' => array(
				'kbis' => 'files/UploadedFiles/%company',
				'company_rib' => 'files/UploadedFiles/%company',
				'associates' => 'files/UploadedFiles/%company'
				)
			)
		);
	public $hasMany = array(
		'Profile' => array( // to remove
			'className' => 'Profile',
			'foreignKey' => 'company_id'
			),
		'Applicant' => array(
			'className' => 'Applicant',
			'foreignKey' => 'company_id'
			)
		);
	public $belongsTo = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id'
			)
		);
	public $validate = array(
		'name' => array(
			'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier la raison sociale'
			),
		'website' => array(
			'rule' => 'url',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le site web'
			),
		'siret' => array(
			'rule' => 'numeric',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le siret'
			),
		'naf_code' => array(
			'rule' => 'alphaNumeric',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le code naf'
			),
		'social_capital' => array(
			'rule' => 'numeric',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le capital social'
			),
		'contact' => array(
			'rule' => 'email',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier l\'email du contact principal'
			),
		'social_capital' => array(
			'rule' => 'numeric',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le capital social'
			),
		'creation_date' => array(
			'rule' => 'date',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier la date de création'
			),
		'street_number' => array(
			'rule' => 'numeric',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le numéro de rue'
			),
		'street_name' => array(
			'rule' => array('custom', '/^[-a-z0-9, ]*$/i'),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le nom de rue'
			),
		'zip_code' => array(
			'rule' => 'numeric',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le code postal'
			),
		'city_name' => array(
			'rule' => array('custom', '/^[-a-z0-9, ]*$/i'),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le nom la ville'
			),
		'total_shares' => array(
			'rule' => 'numeric',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le total des actions'
			),
		'kbis_file' => array(
			'rule' => array('extension', array('pdf', 'doc', 'docx', 'odt', 'png', 'jpg', 'JPEG', 'PNG', 'xls', 'xlsx')),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le type de fichier'
			),
		'associates_file' => array(
			'rule' => array('extension', array('pdf', 'doc', 'docx', 'odt', 'png', 'jpg', 'JPEG', 'PNG', 'xls', 'xlsx')),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le type de fichier'
			)
		);
}

?>