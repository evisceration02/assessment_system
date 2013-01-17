<?php
class Assessment extends AppModel {


	
	public $belongsTo = array(
		'Assessed_By' => array(
			'className' => 'User',
			'foreignKey' => 'assessed_by'
			),
		'Handled_By' => array(
			'className' => 'User',
			'foreignKey' => 'handled_by'
			)
		);

	public $validate = array(
		// 'date_of_assessment' => array(
			// 'rule' => array('date', 'dmy'),
			// 'required' => true,
			// 'allowEmpty' => false,
			// 'message' => 'Please enter a valid date of assessment.'
		// ),
		'first_name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'This field is blank or the username has already been taken.'
		),
		'last_name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false
		),
		'gender' => array(
			'rule' => array('inList', array('M','F')),
			'required' => true,
			'allowEmpty' => false
		),
		'school' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false
		),
		'grade_time' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false
		),
		'grade' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false
		),
		'assessed_by' => array(
			'rule' => 'numeric',
			'required' => true,
			'allowEmpty' => false
		),
		'need_to_call' => array(
			'rule' => array('inList', array('yes', 'no')),
			'required' => true,
			'allowEmpty' => false
		),
		'section' => array(
			'rule' => array('inList', array('1','2')),
			'required' => true,
			'allowEmpty' => false
		),
		'handled_by' => array(
			'rule' => 'numeric',
			'required' => true,
			'allowEmpty' => false
		),
	);
	
	function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['Assessed_By']['password'])) {
				unset($results[$key]['Assessed_By']['password']);
			}
			if (isset($val['Handled_By']['password'])) {
				unset($results[$key]['Handled_By']['password']);
			}
		}
		return $results;
	}
	
	public function isOwnedBy($assessment, $user) {
		return $this->field('assessed_by', array('id' => $assessment, 'assessed_by' => $user)) === $user;
	}
	
	// public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {

	// if( isset($extra['totallimit']) ) return $extra['totallimit'];

	// }
}
// MAYBE MAKE THINGS EFFICIENT BY ONLY RETURNING CERTAIN FIELDS 'fields' => array();
// EMAIL 
// HOSTING
// INDEX DATABASES
?>