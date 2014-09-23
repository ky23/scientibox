<?php

class NotificationsController extends AppController {
	public $name = 'Notifications';
	private $itemPerPage = 5;

	public function index($page = 1) {
		$notifications = $this->Notification->find('all', array('conditions' => array('status !=' => 'ARCHIVED'),'recursive' => 2));
		$notifications = array_reverse($notifications);
		$this->set('data', $notifications);
		$this->set('itemPerPage', $this->itemPerPage);
		if ($page == 1) {
			$this->set('pages', array($page => true, $page + 1 => false, $page + 2 => false));
		} else {
			$this->set('pages', array($page - 1 => false, $page => true, $page + 1 => false));
		}
		$this->Notification->updateAll(array('Notification.is_seen' => true), array('Notification.is_seen' => false));
	}

	public function new_message() {
		$this->autoRender = false;
		return $this->Notification->find('count', array('conditions' => array('is_seen' => false)));
	}

	public function allow($id = null) {
		$this->autoRender = false;
		if (!$id) {
			throw new NotFoundException(__('Notification invalide.'));
		}
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$notification = $this->Notification->find('first', array('conditions', array('Notification.id' => $id, 'status' => 'NONE')));
		if (!empty($notification)) {
			$this->Notification->id = $id;
			if ($this->Notification->save(array('status' => 'VALID'))) {
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function deny($id = null) {
		$this->autoRender = false;
		if (!$id) {
			throw new NotFoundException(__('Notification invalide.'));
		}
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$notification = $this->Notification->find('first', array('conditions', array('Notification.id' => $id, 'status' => 'NONE')));
		if (!empty($notification)) {
			$this->Notification->id = $id;
			if ($this->Notification->save(array('status' => 'INVALID'))) {
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function delete($id = null) {
		$this->autoRender = false;
		if (!$id) {
			throw new NotFoundException(__('Notification invalide.'));
		}
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$notification = $this->Notification->find('first', array('conditions', array('Notification.id' => $id)));
		if (!empty($notification)) {
			$this->Notification->id = $id;
			if ($this->Notification->save(array('status' => 'ARCHIVED'))) {
				$this->redirect(array('action' => 'index'));
			}
		}
	}
}

?>