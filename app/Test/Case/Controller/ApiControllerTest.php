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
        $result = $this->testAction('/api',
            array(
                'data'   => $data,
                'method' => 'get',
                'return' => 'contents',
            )
        );
        $result = json_decode($result, true);
        $expected = array(
            1,2,4,5
        );
        $this->assertEquals($expected, $result);
    }


    public function testItems() {
        $data = array();
        $result = $this->testAction('/api/items',
            array(
                'data'   => $data,
                'method' => 'get',
                'return' => 'contents',
            )
        );
        $result = json_decode($result, true);
        $expected = array(
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
        $this->assertEquals($expected, $result);
    }
}
