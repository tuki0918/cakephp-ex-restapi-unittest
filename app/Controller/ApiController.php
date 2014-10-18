<?php
App::uses('AppController', 'Controller');

class ApiController extends AppController {

    public $uses = array('Post');
    public $components = array('RequestHandler');

    public $autoLayout = false;

    private $_result = null;

    public function beforeRender() {
        parent::beforeRender();

        $this->viewJson();
    }

    public function setResult($data) {
        $this->_result = $data;
    }

    private function viewJson() {
        if (!empty($this->_result)) {
            $data = $this->_result;
            $this->viewClass = 'Json';
            $this->set(compact('data'));
            $this->set('_serialize', 'data');            
        }
    }

    public function index() {
        $data = array(
            1,2,4,5
        );
        $this->setResult($data);
    }
}