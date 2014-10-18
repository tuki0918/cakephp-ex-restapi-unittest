<?php
App::uses('Post', 'Model');
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

        $this->RESTfulAPI->view();
    }

    public function index() {
        $data = array(
            1,2,4,5
        );
        $this->RESTfulAPI->set($data);
    }

    public function items() {
        $data = array(
            'data' => array(
                array(
                    'id'    => 1,
                    'name'  => 'item01',
                    'price' => 111,
                ),
                array(
                    'id'    => 2,
                    'name'  => 'item02',
                    'price' => 222,
                ),
                array(
                    'id'    => 3,
                    'name'  => 'item03',
                    'price' => 333,
                ),
            )
        );
        $this->RESTfulAPI->set($data);
    }


    public function post($id = null) {

        $id = !is_null($id) ? $id : null;

        $data = $this->Post->find('first', array(
            'conditions' => array(
                'Post.id'     => $id,
                'Post.status' => Post::STATUS_PUBLISH,
            ),
            'fields' => array('title', 'body')
        ));

        $result = hash::get($data, 'Post');
        $this->RESTfulAPI->set($result);
    }
}