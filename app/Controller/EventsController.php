<?php

class EventsController extends AppController {
	public $name = 'Events';
	private $itemPerPage = 5;

	public function index() {
		$page = (!empty($this->params['named']) && $this->params['named']['page']) ? ($this->params['named']['page']) : 1;
		$id = (!empty($this->params['named']) && $this->params['named']['id']) ? ($this->params['named']['id']) : null; 
		$events = $this->Event->find('all');
		foreach ($events as &$event) {
			$event['Event']['date'] = date("d-m-Y", strtotime($event['Event']['date']));
		}
		$this->set('events', $events);
		if ($id != null) {
			$event = $this->Event->find('first', array('conditions' => array('Event.id' => $id)));
			if (!empty($event)) {
				$event['Event']['date'] = date("d-m-Y", strtotime($event['Event']['date']));
			} else {
				$event = null;
			}
			$this->set('event_to_edit', $event);
			$this->set('id', $id);
		} else {
			$this->set('event_to_edit', null);
			$this->set('id', null);
		}
		$this->set('itemPerPage', $this->itemPerPage);
		if ($page == 1) {
			$this->set('pages', array($page => true, $page + 1 => false, $page + 2 => false));
		} else {
			$this->set('pages', array($page - 1 => false, $page => true, $page + 1 => false));
		}
	}

	public function add() {
		$this->autoRender = false;
		if ($this->request->is('post', 'put')) {
			if ($this->Session->check('Event.id') && strcasecmp($this->Session->read('Event.id'), $this->request->data['id']) === 0) {
				$event_to_edit = $this->Event->find('first', array('conditions' => array('Event.id' => $this->request->data['id'])));
				if (!empty($event_to_edit)) {
					$this->Event->id = $this->request->data['id'];
				} else {	
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Event->create();
			}
			$this->request->data['date'] = date("Y-m-d", strtotime($this->request->data['date']));
			if ($this->Event->save($this->request->data)) {
					//$this->Session->setFlash(__('Your post has been saved.'));`
				return $this->redirect(array('action' => 'index'));
			}
		}
	}

	public function delete() {
		$this->autoRender = false;
		$page = (!empty($this->params['named']) && $this->params['named']['page']) ? ($this->params['named']['page']) : 1;
		$id = (!empty($this->params['named']) && $this->params['named']['id']) ? ($this->params['named']['id']) : null; 
		if (!$id) {
			throw new NotFoundException(__('Evènement non valide.'));
		}
		$event_to_delete = $this->Event->findById($id);
		if (!$event_to_delete) {
			throw new NotFoundException(__('Evènement non valide.'));
		}
		if ($this->Event->delete($id)) {
			//$this->Session->setFlash(__('Le post avec id : %s a été supprimé.', h($id)));
			return $this->redirect(array('action' => 'index'));
		}
	}

	public function edit() {
		$this->autoRender = false;
		$page = (!empty($this->params['named']) && $this->params['named']['page']) ? ($this->params['named']['page']) : 1;
		$id = (!empty($this->params['named']) && $this->params['named']['id']) ? ($this->params['named']['id']) : null; 
		if (!$id) {
			throw new NotFoundException(__('Evènement non valide.'));
		}
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		return $this->redirect(array('action' => 'index', 'page' => $page, 'id' => $id));
	}
}

?>