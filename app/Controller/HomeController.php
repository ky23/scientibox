<?php

class HomeController extends AppController {
	public $name = 'Home';
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
		$this->Auth->allow(array('index', 'contact', 'about', 'captcha', 'cgu'));
	}
	
	public function index() {
		return;
	}

	public function contact() {
		$this->loadModel('Contact');
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
						$this->Session->setFlash('Votre message a bien été envoyé', 'flash_success');
						$this->request->data = array();
					} else {
						$this->Session->setFlash('Votre message n\'a pas pu être envoyé', 'flash_error');
					}
					$this->Session->delete('key');
				} else {
					$this->Session->setFlash('Le texte saisi ne correspond pas', 'flash_error');
				}
			} else {
				$this->Session->setFlash('Votre message a déja été envoyé', 'flash_success');
			}
		}
		$this->set('captcha_fields', $this->captchas);
	}

	public function captcha()  {
		$this->loadModel('Contact');
		$this->autoRender = false;

        // Retrieve the basename for the image route so that we can
        // uniquely identify and generate each captcha control.
		$captcha = basename('/app/webroot/img/captcha', '.jpg');

        /// Generate actual captcha image (each image unique per image route)
		$this->Captcha->generate($captcha);
	}

	public function about() {
		return;
	}

	public function cgu() {
		$this->autoRender = false;
		return;
	}
}

?>