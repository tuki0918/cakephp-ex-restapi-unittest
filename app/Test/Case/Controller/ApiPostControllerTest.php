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


    public function testIndex() {
        $data = array();
        $result = $this->testAction('/api/index',
            array('data' => $data, 'method' => 'get', 'return' => 'contents')
        );
        $result = json_decode($result, true);
        $expected = array(
            1,4,5
        );
        $this->assertEquals($expected, $result);
    }

    public function testDraft() {
        $data = array();
        $result = $this->testAction('/api/draft',
            array('data' => $data, 'method' => 'get', 'return' => 'contents')
        );
        $result = json_decode($result, true);
        $expected = array(
            2,3
        );
        $this->assertEquals($expected, $result);
    }

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
        $this->testAction('/posts/add',
            array('data' => $data, 'method' => 'post')
        );
        $this->assertStringEndsWith("/posts", $this->headers['Location']);

        $data = array();
        $result = $this->testAction('/api/post/6',
            array('data' => $data, 'method' => 'get', 'return' => 'contents')
        );
        $result = json_decode($result, true);
        $expected = array(
            'id'    => '6',
            'title' => 'apititle',
            'body'  => 'test test test.',
        );
        $this->assertEquals($expected, $result);

        $data = array();
        $result = $this->testAction('/api/index',
            array('data' => $data, 'method' => 'get', 'return' => 'contents')
        );
        $result = json_decode($result, true);
        $expected = array(
            1,4,5,6
        );
        $this->assertEquals($expected, $result);
    }
}
