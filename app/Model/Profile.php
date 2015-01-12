<?php

class Profile extends AppModel {
	public $name = 'Profile';
	public $actsAs = array(
		'Upload.Upload' => array(
			'fields' => array(
				'work_certificate' => 'files/UploadedFiles/%company/%applicant',
				'id_card' => 'files/UploadedFiles/%company/%applicant',
				'applicant_rib' => 'files/UploadedFiles/%company/%applicant',
				'proof_home' => 'files/UploadedFiles/%company/%applicant',
				'accommodation_certificate' => 'files/UploadedFiles/%company/%applicant',
				'accommodating_id_card' => 'files/UploadedFiles/%company/%applicant'
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
		'pro_email' => array(
			'rule' => 'email',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier votre adresse email personnel'
			),
		'perso_email' => array(
			'rule' => 'email',
			'required' => false,
			'allowEmpty' => true,
			'message' => 'Veuillez vérifier votre adresse email professionnel'
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