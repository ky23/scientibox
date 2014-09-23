<?php

class ContactController extends AppController {
	var $name = 'Contact';
	public $captchas = array('captcha');
	public $components = array(
		'Captcha' => array(
			'type'   => array('math'),
			'rotate' => true,
			'theme'  => 'blue'
			),
		'RequestHandler'
		);
	public $helpers = array('Html', 'Form', 'Js' => array("Jquery"), "Session");

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'captcha');
	}

	public function index() {
		// echo "<script>console.log( 'session: " . $this->Session->read('Contact.key') . "' );</script>";
		// echo "<script>console.log( 'key    : " . $this->request->data['key'] . "' );</script>";

		$this->Session->delete('Message.flash');
		if ($this->request->is('post')) {
			if ($this->Session->check('Contact.key') && strcasecmp($this->Session->read('Contact.key'), $this->request->data['key']) === 0) {
				foreach($this->captchas as $field) {
					$this->Contact->setCaptcha($field,
						$this->Captcha->getCode($field));
				}
				$this->Contact->set($this->request->data);
				if ($this->Contact->validates()) {
					if ($this->Contact->send($this->request->data)) {
						$this->Session->setFlash('Votre message a bien été envoyé', 'ok');
						$this->request->data = array();
					} else {
						$this->Session->setFlash('Votre message n\'a pas pu être envoyé', 'ko');
					}
					$this->Session->delete('key');
				} else {
					$this->Session->setFlash($this->Contact->validationErrors['captcha'], 'ko');
				}
			} else {
				$this->Session->setFlash('Votre message a déja été envoyé', 'ok');
			}
		}
		$this->set('captcha_fields', $this->captchas);
	}

	public function captcha()  {
		$this->autoRender = false;

        // Retrieve the basename for the image route so that we can
        // uniquely identify and generate each captcha control.
		$captcha = basename('/app/webroot/img/captcha', '.jpg');

        /// Generate actual captcha image (each image unique per image route)
		$this->Captcha->generate($captcha);
	}
}

?>