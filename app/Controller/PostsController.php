<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 */
class PostsController extends AppController {

    public $uses = array(
        'Post'
    );

    public function index() {
	}

	public function add() {
		if ($this->request->is('post')) {
			if($this->Post->save($this->request->data)) {
				$this->Session->setFlash('入力完了');
				return $this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('入力失敗');
			}
		}
	}

}
