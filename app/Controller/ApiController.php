<?php
App::uses('Post', 'Model');
App::uses('AppController', 'Controller');

class ApiController extends AppController {

    public $components = array('RequestHandler');

    public $uses = array(
        'Post'
    );

    public $autoLayout = false;

    private $_result = null;

    public function beforeRender() {
        parent::beforeRender();
        $this->_viewJson();
    }

    public function setResult($data) {
        $this->_result = $data;
    }

    private function _viewJson() {
        if (!is_null($this->_result)) {
            $data = $this->_result;
            $this->viewClass = 'Json';
            $this->set(compact('data'));
            $this->set('_serialize', 'data');
        } else {
            throw new NotFoundException('404 Not found');
        }
    }

    public function index() {
        $data = array(
            1,2,4,5
        );
        $this->setResult($data);
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
        $this->setResult($data);
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
        $this->setResult($result);
    }
}