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

		$this->edit();

	}

	public function edit($id = null) {

		if ( $this->request->is(array('post', 'put')) ) {

			if (!is_null($id) && $this->Post->exists($id)) $this->Post->id = $id;

			if ( $this->Post->save($this->request->data) ) {

				$this->Session->setFlash('The post has been saved!');
				return $this->redirect(array('action'=>'index'));

			} else {

				$this->Session->setFlash('The post could not be saved. Please, try again.');

			}

		} else {
			throw new MethodNotAllowedException();
		}

	}

}