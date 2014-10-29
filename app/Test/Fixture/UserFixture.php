<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'role' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'username' => 'ooo',
			'password' => '123d553cfaabeeec032e0c51484e82a154f98bee',
			'role' => 'admin',
			'created' => '2014-10-28 15:36:18',
			'modified' => '2014-10-28 15:36:18'
		),
		array(
			'id' => 2,
			'username' => 'ppp',
			'password' => '5a259392371697beda4752ab83d8accb7e01024d',
			'role' => 'guest',
			'created' => '2014-10-28 15:36:18',
			'modified' => '2014-10-28 15:36:18'
		),
		array(
			'id' => 3,
			'username' => 'iii',
			'password' => '123d553cfaabeeec032e0c51484e82a154f98bee',
			'role' => 'guest',
			'created' => '2014-10-28 15:36:18',
			'modified' => '2014-10-28 15:36:18'
		),
	);

}
