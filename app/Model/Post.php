<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Post extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	const STATUS_PUBLISH = '0';
	const STATUS_DRAFT   = '1';

	public function getPublishIds() {
        $data = $this->find('all', array(
            'conditions' => array(
                'Post.status' => self::STATUS_PUBLISH,
            ),
            'fields' => array('id')
        ));
        $result = hash::extract($data, '{n}.Post.id');
        return $result;
	}

	public function getDraftIds() {
        $data = $this->find('all', array(
            'conditions' => array(
                'Post.status' => self::STATUS_DRAFT,
            ),
            'fields' => array('id')
        ));
        $result = hash::extract($data, '{n}.Post.id');
        return $result;
	}

	public function getPost($id) {
        $id = !is_null($id) ? $id : null;
        $data = $this->find('first', array(
            'conditions' => array(
                'Post.id'     => $id,
                'Post.status' => self::STATUS_PUBLISH,
            ),
            'fields' => array('id', 'title', 'body')
        ));
        $result = hash::get($data, 'Post');
        return $result;
	}


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'maxLength' => array(
				'rule' => array('maxLength'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
