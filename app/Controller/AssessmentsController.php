<?php
App::uses('AppController', 'Controller');

class AssessmentsController extends AppController {
	public $helpers = array('Html', 'Form', 'Session', 'Paginator');
	var $uses = array('User', 'Assessment');
	public $name = 'Assessments';
	
	public function index() {
		if ($this->Auth->user('status') == 'teacher') {
			$this->redirect(array('action' => 'teacherindex'));
		} elseif ($this->Auth->user('status') == 'admin') {
			$this->redirect(array('action' => 'dbindex'));
		} elseif ($this->Auth->user('status') == 'super') {
			$this->redirect(array('action' => 'dbindex'));
		}
	}
	
	
	public function dbindex() {
		$this->layout = 'bootstrap';
		if ($this->request->is('get') && isset($this->request->query['submit'])) {
			$conditions = array();
			foreach ($this->request->query as $key => $value) {
				if (!empty($value)) {$conditions['Assessment.'.$key] = $value;} 
			}
			if (isset($conditions['Assessment.page'])) {unset($conditions['Assessment.page']); }
			if (!empty($conditions)) {
				$this->paginate = array(
					'conditions' => $conditions,
					'limit' => 10,
					'order' => array('Assessment.date_created' => 'desc'),
					'maxLimit' => 10,
					'paramType' => 'querystring'
				);
				//$this->Paginator->options(array('url' => array('page' => 1)));
				$assessments = $this->paginate('Assessment');
				$this->set('assessments', $assessments);
			}
		} else {
			$this->paginate = array(
				'conditions' => array('Assessment.section' => $this->Auth->user('section')),
				'limit' => 10,
				'order' => array('Assessment.date_created' => 'desc'),
				'maxLimit' => 10,
				'paramType' => 'querystring'
			);
			$assessments = $this->paginate('Assessment');
			$this->set('assessments', $assessments);
			$this->set('request', 'get');
		}
		$this->set('teachers', $this->User->find('list', array('fields' => array('User.name'),
		'conditions' => array('User.status' => 'teacher'), 'order' => array('User.first_name' => 'asc')
		)));
		$this->set('admins', $this->User->find('list', array('fields' => array('User.name'),
		'conditions' => array('User.status' => 'admin'), 'order' => array('User.first_name' => 'asc')
		)));
		$this->set('section', $this->Auth->user('section') == 2 ? 'Secondary' : 'Primary');
	}
	
	public function viewfile($id=null) {
		$this->viewClass = 'Media';
		$this->Assessment->id = $id;
		$assessment = $this->Assessment->read();
		$params = array(
			'id' => $assessment['Assessment']['file_name'],
			'name' => $assessment['Assessment']['first_name'].$assessment['Assessment']['last_name'].$assessment['Assessment']['id'],
			'download' => false,
			'extension' => 'pdf',
			'path' => APP . 'Files' . DS
		);
		$this->set($params);

		
		
		//$this->response->file("../Files/" . $assessment['Assessment']['file_name']); for CakePHP 2.3
	}
	
	public function viewdoc($id) {
		//$this->response->file("../Files2/" . $assessment['Assessment']['doc_file'], array('download' => true, 'name' => $assessment['Assessment']['first_name'] . $assessment['Assessment']['last_name'] . 'test'));
		$this->viewClass= 'Media';
		$this->Assessment->id = $id;
		$assessment = $this->Assessment->read();
		$ext = end(explode(".", $assessment['Assessment']['doc_file']));
		$params = array(
			'id' => $assessment['Assessment']['doc_file'],
			'name' => $assessment['Assessment']['first_name'] . $assessment['Assessment']['last_name'] . 'test',
			'download' => $ext == 'pdf' ? false : true,
			'extension' => $ext,
			'path' => APP. 'Files2' . DS
		);
		$this->set($params);

	}
	
	public function admincreate() {
		$this->layout = 'bootstrap';
		if ($this->request->is('post')) {
			if (empty($this->request->data)) {
				$this->Session->setFlash("Uploads exceeding 5 MB are not allowed. Please try again", 'default', array('class' => 'alert alert-error'));
				$this->redirect(array('action' => 'admincreate'));
			}
			$file = $this->request->data['Assessment']['doc_file'];
			//tmp_name, name, size, type, error
			if (empty($file['tmp_name'])) {
				$this->request->data['Assessment']['doc_file'] = NULL;
				$this->request->data['Assessment']['date_created'] = strftime("%Y-%m-%d %H:%M:%S", time());			
				$this->Assessment->create();
					if ($this->Assessment->save($this->request->data)) {
						$this->Session->setFlash("Assessment has been assigned.", 'default', array('class' => "alert alert-info"));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash("Assignment Failed. Please fill in the necessary fields correctly.", 'default', array('class' => "alert alert-error"));
					}
			} else {
			// VALIDATE FILE UPLOAD
				$allowedExtensions = array("txt","csv","htm","html","xml","css","doc","docx","xls","rtf","ppt","pdf","jpg","jpeg","gif","png"); 
				if ($file['tmp_name'] > '') {
					$ext = end(explode(".", strtolower($file['name'])));
					if (!in_array($ext, $allowedExtensions) || $file['size'] > 5000000) { 
						$this->Session->setFlash("{$file['name']} is either an invalid file type or bigger than 5 MB", 'default', array('class' => 'alert alert-error'));
					} else {
						$this->request->data['Assessment']['date_created'] = strftime("%Y-%m-%d %H:%M:%S", time());
						$this->request->data['Assessment']['doc_file'] = uniqid(). '.' . $ext;
						$this->Assessment->create();
						if (move_uploaded_file($file['tmp_name'], APP . "Files2" . DS . $this->request->data['Assessment']['doc_file'])) {
							if ($this->Assessment->save($this->request->data)) {
								$this->Session->setFlash("Assessment has been assigned.", 'default', array('class' => 'alert alert-info'));
								$this->redirect(array('action' => 'index'));
							} else {
								$this->Session->setFlash("Assignment Failed. Please fill in the necessary fields correctly.", 'default', array('class' => "alert alert-error"));
							}
						} else {
							$this->Session->setFlash("Could not upload file.", 'default', array('class' => "alert alert-error"));
						} //end save
					}
				}
			} // end if (empty($file))
		} //end post
		$this->set('teachers', $this->User->find('list', array('fields' => array('User.name'),
		'conditions' => array('User.status' => 'teacher'), 'order' => array('User.first_name' => 'asc')
		)));
		$this->set('admins', $this->User->find('list', array('fields' => array('User.name'),
		'conditions' => array('User.status' => 'admin'), 'order' => array('User.first_name' => 'asc')
		)));
		$this->set('validationerrors', $this->Assessment->validationErrors);
	}
	
	public function adminedit($id=null) {
		$this->layout = 'bootstrap';
		$this->Assessment->id = $id;
        if (!$this->Assessment->exists()) {
            throw new NotFoundException(__('Invalid assessment.'));
        }
		if ($this->request->is('put') || $this->request->is('post')) {
			$file = $this->request->data['Assessment']['doc_file'];
			//tmp_name, name, size, type, error
			if (empty($file['tmp_name'])) {
				if ($this->Assessment->field('doc_file') == NULL) {
					$this->request->data['Assessment']['doc_file'] = NULL;
				} else {
					$this->request->data['Assessment']['doc_file'] = $this->Assessment->field('doc_file');
				}
					if ($this->Assessment->save($this->request->data)) {
						$this->Session->setFlash("Assessment has been updated.", 'default', array('class' => "alert alert-info"));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash("Assignment update failed. Please fill in the necessary fields correctly.", 'default', array('class' => "alert alert-error"));
					}
			} else {
			// VALIDATE FILE UPLOAD
				$allowedExtensions = array("txt","csv","htm","html","xml","css","doc","docx","xls","rtf","ppt","pdf","jpg","jpeg","gif","png"); 
				if ($file['tmp_name'] > '') {
					$ext = end(explode(".", strtolower($file['name'])));
					if (!in_array($ext, $allowedExtensions) || $file['size'] > 5000000) { 
						$this->Session->setFlash("{$file['name']} is either an invalid file type or bigger than 5 MB", 'default', array('class' => 'alert alert-error'));
					} else {
						$this->request->data['Assessment']['doc_file'] = uniqid(). '.' . $ext;
						if (move_uploaded_file($file['tmp_name'], APP . "Files2" . DS . $this->request->data['Assessment']['doc_file'])) {
							if ($this->Assessment->save($this->request->data)) {
								$this->Session->setFlash("Assessment has been updated.", 'default', array('class' => 'alert alert-info'));
								$this->redirect(array('action' => 'index'));
							} else {
								$this->Session->setFlash("Assignment update failed. Please fill in the necessary fields correctly.", 'default', array('class' => "alert alert-error"));
							}
						} else {
							$this->Session->setFlash("Could not upload file.", 'default', array('class' => "alert alert-error"));
						} //end save
					}
				}
			} // end if (empty($file))
			$this->set('get', false);
		} else {
			$this->request->data = $this->Assessment->read();
			$this->set('get', true);
		}
		//end post
		// $assessment1 = $this->Assessment->read(); // Mistake: this causes validations to be erased? // Use read() sparingly in GET requests for EDIT pages
		$assessment = $this->Assessment->findById($id);
		$this->set('assessment', $assessment);
		$this->set('teachers', $this->User->find('list', array('fields' => array('User.name'),
		'conditions' => array('User.status' => 'teacher'), 'order' => array('User.first_name' => 'asc')
		)));
		$this->set('admins', $this->User->find('list', array('fields' => array('User.name'),
		'conditions' => array('User.status' => 'admin'), 'order' => array('User.first_name' => 'asc')
		)));

	}
	
	public function admindelete($id) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Assessment->id = $id;
        if (!$this->Assessment->exists()) {
            throw new NotFoundException(__('Invalid assessment.'));
        }
		if ($this->Assessment->delete()) {
			$this->Session->setFlash('The assessment has been deleted.', 'default', array('class' => 'alert alert-info'));
			$this->redirect(array('action' => 'index'));
		} 
		$this->Session->setFlash('The assessment could not be deleted.', 'default', array('class' => 'alert alert-error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function checkoff($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Assessment->id = $id;
        if (!$this->Assessment->exists()) {
            throw new NotFoundException(__('Invalid assessment.'));
        }
		$this->request->data['Assessment']['checked'] = 'yes';
		if ($this->Assessment->save($this->request->data, false)) {
			$this->Session->setFlash('The assessment has been checked off.', 'default', array('class' => 'alert alert-info'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash('Error occured.', 'default', array('class' => 'alert alert-error'));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function teacherindex() { // list assigned assessments
		$this->layout = 'bootstrap';
		$this->set('assessments', $this->Assessment->find('all', array('conditions' => 
		array('Assessment.assessed_by' => $this->Auth->user('id')), 'limit' => 15, 'order' => array('Assessment.date_created' => 'desc')))); 

	}
	
	public function teacherform($id = null) {
		$this->Average = ClassRegistry::init('Average');
		//$this->title = 'Capstone Student Assessment Form';
		$this->layout = 'bootstrap';
		$this->Assessment->id = $id;
        if (!$this->Assessment->exists()) {
            throw new NotFoundException(__('Invalid assessment.'));
        }
		$assessment = $this->Assessment->read();
		$this->set('assessment', $assessment);
		if ($this->request->is('get')) {
		} else {
			$this->request->data['Assessment']['date_completed'] = strftime("%Y-%m-%d %H:%M:%S", time());
			// Need to set filename here
			$this->request->data['Assessment']['file_name'] = $assessment['Assessment']['first_name'] . $assessment['Assessment']['last_name'] . $assessment['Assessment']['id'] . ".pdf";
			// Set New Validation Rules Here
			$new_validations = array(
				'construction' => array(
					'rule' => array('inList', array('1','2','3','4','5')),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Please enter a valid score.'
				),
				'breadth' => array(
					'rule' => array('inList', array('1','2','3','4','5')),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Please enter a valid score.'
				),
				'comprehension' => array(
					'rule' => array('inList', array('1','2','3','4','5')),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Please enter a valid score.'
				),
				'reasoning' => array(
					'rule' => array('inList', array('1','2','3','4','5')),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Please enter a valid score.'
				),
				'analysis' => array(
					'rule' => array('inList', array('1','2','3','4','5')),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Please enter a valid score.'
				),
				'poise' => array(
					'rule' => array('inList', array('1','2','3','4','5')),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Please enter a valid score.'
				)
			);
			$this->Assessment->validate = $new_validations;
			$this->Assessment->set($this->request->data);
			if ($this->Assessment->validates()) {
				if ($this->Assessment->save($this->request->data)) {
					$author = $this->User->find('first', array('conditions' => array('User.id' => $assessment['Assessment']['assessed_by']))); // CAN CHANGE
					$this->set('author' , $author['User']['first_name'] . ' ' . $author['User']['last_name']); // CAN CHANGE
					$this->set('comments', $this->request->data['Assessment']['comments']);
					$this->set('generate', true);
					$this->set('assessment', $this->Assessment->read());
					$average = $this->Average->find('first', array('conditions' => array('Average.grade' => $assessment['Assessment']['grade'])));
					$count = $average['Average']['count'];
					if ($count > 25) {
						$this->set('avg_construction', $average['Average']['construction']);
						$this->set('avg_breadth' , $average['Average']['breadth']);
						$this->set('avg_comprehension' , $average['Average']['comprehension']);
						$this->set('avg_reasoning' , $average['Average']['reasoning']);
						$this->set('avg_analysis' , $average['Average']['analysis']);
						$this->set('avg_poise' , $average['Average']['poise']);
					} else {
						$this->set('avg_construction', 'NA');
						$this->set('avg_breadth' , 'NA');
						$this->set('avg_comprehension' , 'NA');
						$this->set('avg_reasoning' , 'NA');
						$this->set('avg_analysis' , 'NA');
						$this->set('avg_poise' , 'NA');	
					}
					//$this->response->type('pdf');
					$this->Session->setFlash('The assessment has been successfully submitted.', 'default', array('class' => 'alert alert-info'));
					$this->render();
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Submission unsuccessful.', 'default', array('class' => 'alert alert-error'));
				}
			} else {
				$this->Session->setFlash('Submission unsuccessful. Please enter all scores.', 'default', array('class' => 'alert alert-error'));
				$this->set('generate', false);
				//$errors = $this->Assessment->validationErrors;
				//$this->set('errors', $errors);
		}
		}
	}
	
	public function adminform($id=null) {
		$this->layout = 'bootstrap';
		$this->Assessment->id = $id;
        if (!$this->Assessment->exists()) {
            throw new NotFoundException(__('Invalid assessment.'));
        }
		if ($this->request->is('get')) {
		} else {
			$new_validations = array(
				'called' => array(
					'rule' => array('inList', array('yes','no')),
					'required' => false,
					'allowEmpty' => false,
					'message' => 'Field cannot be blank.'
				));
			$this->Assessment->validate = $new_validations;
			$this->Assessment->set($this->request->data);
			if ($this->Assessment->validates()) {
				if ($this->Assessment->save($this->request->data)) {
					$this->Session->setFlash('The admin form has been successfully submitted.', 'default', array('class' => 'alert alert-info'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Submission unsuccessful.', 'default', array('class' => 'alert alert-error'));
				}
			}
		}
		$assessment = $this->Assessment->read();
		$this->set('assessment', $assessment);
	}
	
	public function isAuthorized($user) {
		$teacher_approved_actions = array('index','teacherindex');
		$admin_approved_actions = array('index', 'dbindex', 'admincreate', 'adminedit', 'admindelete', 'checkoff', 'viewfile', 'viewdoc');
		$super_approved_actions = array('index', 'dbindex', 'admincreate', 'adminedit', 'admindelete', 'checkoff', 'viewfile', 'viewdoc','averages');
		if ($user['status'] === 'super' && in_array($this->action, $super_approved_actions)) {
			return true;
		} elseif ($user['status'] === 'teacher' && in_array($this->action, $teacher_approved_actions)) {
			return true;
		} elseif ($user['status'] === 'teacher' && in_array($this->action, array('viewdoc', 'viewfile'))) {
			$assessmentId = $this->request->params['pass'][0];
			if ($this->Assessment->isOwnedBy($assessmentId, $user['id'])) {
				return true;
			}
			return false;
		} elseif ($user['status'] === 'teacher' && in_array($this->action, array('adminform'))) {
			$assessmentId = $this->request->params['pass'][0];
			$this->Assessment->id = $assessmentId;
			if ($this->Assessment->field('comments_to_admin') === NULL) {
				return true;
			}
			return false;
		} elseif ($user['status'] === 'teacher' && in_array($this->action, array('teacherform'))) {
			$assessmentId = $this->request->params['pass'][0];
			$this->Assessment->id = $assessmentId;
			if ($this->Assessment->field('file_name') === NULL) {
				return true;
			}
			return false;
		} elseif ($user['status'] === 'admin' && in_array($this->action, $admin_approved_actions)) {
			return true;
		}
		return false;
	
	}
	

		
		
		
	}
?>
