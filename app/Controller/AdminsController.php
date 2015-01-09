<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class AdminsController extends AppController {
	public $name = 'Admins';
	public $helpers = array('Html', 'Form', 'Js' => array("Jquery"));

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'forgot_password', 'change_password', 'activate');
	}

	public function login() { // must change to only auth login
		if ($this->request->is('post', 'put')) {
			$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
			$admin = $this->Admin->find('first', array('conditions' => array('username' => $this->request->data['Admin']['username'])));
			if (count($admin) > 0 && $passwordHasher->hash($this->request->data['Admin']['password'])
				== $admin['Admin']['password'] && $admin['Admin']['active'] == true) {
				if ($this->Auth->login($this->request->data)) {
					$this->Admin->id = $admin['Admin']['id'];
					$this->Admin->saveField('last_login', date('Y-m-d H:s:i'));
					if ($this->Session->read('Admin.active')) {
						$token = $this->Admin->id . '@' . md5($this->request->data['Admin']['username']);
						$this->Session->delete('Admin.active');
						return $this->redirect(array('action' => 'change_password', $token));
					}
					$this->redirect($this->Auth->redirect());
				}
			}
			$this->Session->setFlash("Les informations saisies sont incorrectes.", 'flash_error');
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function add_account() {
		if ($this->request->is('post') && !empty($this->request->data)) {
			$admin = $this->Admin->find('first', array(
				'conditions' => array('username' => $this->request->data['Admin']['username'])
				));
			if (empty($admin)) {
				$this->request->data['Admin']['password'] = $this->randomPassword();
				if ($this->Admin->save($this->request->data, false)) {
					$token = $this->Admin->id . '@' . md5($this->request->data['Admin']['username']);
					$this->Admin->sendMail($this->request->data, $token, 'admins/activate/', 'add_account', 'Inscription Scientibox');
					$this->Session->setFlash('Votre compte à bien été ajouté', 'flash_success');
				} else {
					$this->Session->setFlash('Les informations saisies sont incorrectes.', 'flash_error');
				}
			} else {
				$this->Session->setFlash('Ce compte est déja utilisé', 'flash_error');
			}
			$this->Session->delete('key');
		}
	}

	public function activate($token = null) {
		$this->autoRender = false;
		$this->Session->delete('Admin');
		if (!empty($token)) {
			$token = explode('@', $token);
			$admin = $this->Admin->find('first', array('conditions' => array('Admin.id' => $token[0], 'active' => false)));
			if (!empty($admin)) {
				if (md5($admin['Admin']['username']) == $token[1]) {
					$this->Admin->id = $admin['Admin']['id'];
					$this->Admin->saveField('active', true);
					$this->Session->write('Admin.active', true);
				}
			}
		}
		$this->redirect(array('action' => 'login'));
	}

	public function forgot_password() {
		if ($this->request->is('post')) {
			if ($this->Session->check('Admins.key') && strcasecmp($this->Session->read('Admins.key'), $this->request->data['key']) === 0) {
				$admin = $this->Admin->find('first', array('conditions' => array('username' => $this->request->data['Admin']['username'], 'active' => true)));
				if (!empty($admin)) {
					$token = $admin['Admin']['id'] . '@' . md5($this->request->data['Admin']['username']);
					if ($this->Admin->sendMail($this->request->data, $token, 'admins/change_password/', 'forgot_password', 'Mot de passe oublié Scientibox')) {
						$this->Session->setFlash("Un mail vient de vous être envoyé.", 'flash_success');
					}
				} else {
					$this->Session->setFlash("Aucune adresse mail ne correspond à celle entrée.", 'flash_error');
				}
			}
		}
	}

	public function change_password($token = null) {
		if (empty($token)) {
			$token = $this->Session->read('Admin.token');
		}
		$this->Session->write('Admin.token', $token);
		$token = explode('@', $token);
		$admin = $this->Admin->find('first', array('conditions' => array('id' => $token[0], 'active' => true)));
		if (!empty($admin)) {
			if (md5($admin['Admin']['username']) == $token[1]) {
				$this->Admin->id = $admin['Admin']['id'];
				if ($this->request->is('post')) {
					if ($this->request->data['Admin']['password'] == $this->request->data['Admin']['password-confirm']) {
						if ($this->Admin->saveField('password', $this->request->data['Admin']['password'])) {
							$this->Session->setFlash('Votre nouveau mot de passe a bien été crée.', 'flash_success');
							$this->Session->delete('Admin.token');
							if ($this->Auth->loggedIn()) {
								$this->Auth->logout();
							}
							return $this->redirect(array('action' => 'login'));
						} else {
							$this->Session->setFlash('Votre mot de passe n\'a pas été sauvegarder, veuillez réessayer', 'flash_error');
						}
					} else {
						$this->Session->setFlash('Les deux mots de passe sont différents.', 'flash_error');
					}
				}
			}
		}
	}

	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array();
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);
	}
}

?>