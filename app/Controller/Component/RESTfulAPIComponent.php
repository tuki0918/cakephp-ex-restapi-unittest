<?php
App::uses('Component', 'Controller');

class RESTfulAPIComponent extends Component {

	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}

    private $_result = null;

    public function set($data) {
        $this->_result = $data;
    }

    public function viewJson() {
        if (!is_null($this->_result)) {
            $data = $this->_result;
            $this->Controller->viewClass = 'Json';
            $this->Controller->set(compact('data'));
            $this->Controller->set('_serialize', 'data');
        } else {
            throw new NotFoundException('404 Not found');
        }
    }

}