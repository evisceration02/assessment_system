<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
	public $validate = array(
		'username' => array(
			'rule' => 'isUnique',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'This field is blank or the username has already been taken.'
		),
		'password' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false
		),
		'first_name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false
		),
		'last_name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false
		),
		'email' => array(
			'required' => true,
			'allowEmpty' => false,
			'rule' => 'email',
			'message' => 'Please enter a valid email address.'
		),
		'status' => array(
			'rule' => array('inList', array('admin','teacher')),
			'required' => true,
			'allowEmpty' => false,
		),
		'section' => array(
			'rule' => array('inList', array('1','2')),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please enter a valid section.'
		)	
		
			
	
	);
	
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->virtualFields['name'] = sprintf('CONCAT(%s.first_name, " ", %s.last_name)', $this->alias, $this->alias);
	}
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	

}

?>