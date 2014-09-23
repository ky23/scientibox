<?php

class Profile extends AppModel {
	public $name = 'Profile';
	public $actsAs = array(
		'Upload.Upload' => array(
			'fields' => array(
				'identity' => 'files/UploadedFiles/%applicant',
				'home' => 'files/UploadedFiles/%applicant',
				'bank' => 'files/UploadedFiles/%applicant',
				'emplt' => 'files/UploadedFiles/%applicant',
				'terms' => 'files/UploadedFiles/%applicant'
				)
			)
		);
	public $validate = array(
		'first_name' => array(
			'rule' => array('custom', '/^[a-z ]*$/i'),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier votre prénom'
			),
		'last_name' => array(
			'rule' => array('custom', '/^[a-z ]*$/i'),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier votre nom'
			),
		'email' => array(
			'rule' => 'email',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier votre adresse email'
			),
		'phone' => array(
			'rule' => 'numeric',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier votre numéro de téléphone'
			),
		'birthdate' => array(
			'rule' => 'date',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier votre date de naissance'
			),
		'birth_city' => array(
			'rule' => array('custom', '/^[-a-z0-9, ]*$/i'),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier votre nom'
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
		'identity_file' => array(
			'rule' => array('extension', array('pdf', 'doc', 'docx', 'odt', 'png', 'jpg', 'JPEG', 'PNG', 'xls', 'xlsx')),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le type de fichier'
			),
		'home_file' => array(
			'rule' => array('extension', array('pdf', 'doc', 'docx', 'odt', 'png', 'jpg', 'JPEG', 'PNG', 'xls', 'xlsx')),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le type de fichier'
			),
		'bank_file' => array(
			'rule' => array('extension', array('pdf', 'doc', 'docx', 'odt', 'png', 'jpg', 'JPEG', 'PNG', 'xls', 'xlsx')),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le type de fichier'
			),
		'emplt_file' => array(
			'rule' => array('extension', array('pdf', 'doc', 'docx', 'odt', 'png', 'jpg', 'JPEG', 'PNG', 'xls', 'xlsx')),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le type de fichier'
			),
		'terms_file' => array(
			'rule' => array('extension', array('pdf', 'doc', 'docx', 'odt', 'png', 'jpg', 'JPEG', 'PNG', 'xls', 'xlsx')),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier le type de fichier'
			)
		);
}

?>