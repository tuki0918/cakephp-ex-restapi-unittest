<?php
App::uses('ApiController', 'Controller');

/**
 * ApiController Test Case
 *
 */
class ApiControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	// public $fixtures = array(
	// 	'app.api'
	// );

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

}
