<?php
App::uses('AppController', 'Controller');
/**
 * Media Controller
 *
 * @property Media $Media
 * @property PaginatorComponent $Paginator
 */
class MediaController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Media->recursive = 0;
		$this->set('media', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Media->exists($id)) {
			throw new NotFoundException(__('Invalid media'));
		}
		$options = array('conditions' => array('Media.' . $this->Media->primaryKey => $id));
		$this->set('media', $this->Media->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Media->create();
			if ($this->Media->save($this->request->data)) {
				$data = $this->request->data;
				if ($this->data['Media']['upload']){
					$mediaId = $this->Media->getInsertID();
					$file = $this->data['Media']['upload']['name'];
					$ext = pathinfo($file, PATHINFO_EXTENSION);
					$filename = sprintf('media_%d.' . $ext, $mediaId);
					$filepath = WWW_ROOT . 'files/media/';
					move_uploaded_file($this->data['Media']['upload']['tmp_name'], $filepath . $filename);
					$data['Media']['filename'] = $filename;
					$this->Media->save($data);
				}
				$this->Session->setFlash(__('The media has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Media->exists($id)) {
			throw new NotFoundException(__('Invalid media'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Media->save($this->request->data)) {
				$this->Session->setFlash(__('The media has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Media.' . $this->Media->primaryKey => $id));
			$this->request->data = $this->Media->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Media->id = $id;
		if (!$this->Media->exists()) {
			throw new NotFoundException(__('Invalid media'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Media->delete()) {
			$this->Session->setFlash(__('The media has been deleted.'));
		} else {
			$this->Session->setFlash(__('The media could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
