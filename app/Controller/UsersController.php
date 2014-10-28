<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 */
class UsersController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;


	public function beforeFilter() {
	    parent::beforeFilter();
	    // ユーザー自身による登録とログアウトを許可する
	    $this->Auth->allow('logout');
	}

	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Invalid username or password, try again'));
	        }
	    }
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	}

}
