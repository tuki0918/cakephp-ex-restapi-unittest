<?php
App::uses('ApiController', 'Controller');

/**
 * ApiController Test Case
 *
 */
class ApiPostControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.post'
	);


    public function testPostDataId1() {
        $data = array();
        $result = $this->testAction('/api/post/1',
            array('data' => $data, 'method' => 'get', 'return' => 'contents')
        );
        $result = json_decode($result, true);
        $expected = array(
            'id'    => '1',
            'title' => 'title1',
            'body'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        );
        $this->assertEquals($expected, $result);
    }

    public function testPostNotFound() {
        $this->setExpectedException('NotFoundException');
        $data = array();
        $this->testAction('/api/post/',
            array('data' => $data, 'method' => 'get', 'return' => 'contents')
        );
    }

    public function testPostNotFoundId2() {
        $this->setExpectedException('NotFoundException');
        $data = array();
        $this->testAction('/api/post/2',
            array('data' => $data, 'method' => 'get', 'return' => 'contents')
        );
    }

    public function testPostNotFoundId3() {
        $this->setExpectedException('NotFoundException');
        $data = array();
        $this->testAction('/api/post/3',
            array('data' => $data, 'method' => 'get', 'return' => 'contents')
        );
    }

    public function testPostAddData() {
        $data = array('title' => 'apititle', 'body' => 'test test test.');
        $result = $this->testAction('/posts/add',
            array('data' => $data, 'method' => 'post', 'return' => 'result')
        );
        var_dump($result);
    }
}
