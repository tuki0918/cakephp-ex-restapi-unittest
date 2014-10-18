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
        $result = $this->testAction('/api');
        $json = $this->vars['json'];
        $expected = array(
            1,2,4,5
        );
        $this->assertEquals($expected, $json);
		debug($json);
    }

}
