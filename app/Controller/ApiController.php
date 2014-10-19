<?php
App::uses('AppController', 'Controller');

class ApiController extends AppController {

    public $components = array(
        'RequestHandler',
        'RESTfulAPI'
    );

    public $uses = array(
        'Post'
    );

    public $autoLayout = false;


    public function beforeRender() {
        parent::beforeRender();

        $this->RESTfulAPI->viewJson();
    }

    public function index() {
        $result = $this->Post->getPublishIds();
        $this->RESTfulAPI->set($result);
    }

    public function draft() {
        $result = $this->Post->getDraftIds();
        $this->RESTfulAPI->set($result);
    }

    public function post($id = null) {
        $result = $this->Post->getPost($id);
        $this->RESTfulAPI->set($result);
    }
}