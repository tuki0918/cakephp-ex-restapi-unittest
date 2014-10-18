<?php
App::uses('AppController', 'Controller');

class ApiController extends AppController {
    public $uses = array('Post');
    // RequestHandlerコンポーネントを使用
    public $components = array('RequestHandler');

    public function beforeRender() {
    }

    public function index() {
        $json = array(
            1,2,4,5
        );


        $this->viewClass = 'Json';
        $this->set(compact('json'));
        $this->set('_serialize', 'json');
    }
}