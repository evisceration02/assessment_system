<?php
class UsersController extends AppController {
	public $helpers = array('Html', 'Form', 'Session', 'Paginator');
	public $name = 'Users';
	
	// public function beforeFilter() {
		// $this->Auth->allow('login', 'logout');
	// }
	
	public function login() {
		$this->layout = 'bootstrap';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Invalid username or password', 'default', array('class' => 'text-error'));
			}
		}
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	
	}
	
	public function index() {
		$this->layout = 'bootstrap';
		$this->paginate = array(
			'limit' => 10,
			'order' => array('User.first_name' => 'asc'),
			'conditions' => array('User.username !=' => 'evisceration02')
		);
		$users = $this->paginate('User');
		$this->set('users', $users);		
	
	}
	
	public function add() {
		$this->layout = 'bootstrap';
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved.', 'default', array('class' => 'alert alert-info'));
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.', 'default', array('class' => 'alert alert-error'));
            }
        }
    }
	
	public function edit($id = null) { // Blank passwords keep the previous password
		$this->layout = 'bootstrap';
		$this->User->id = $id;
		if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
		if ($this->request->is('get')) {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		} else {
			if (empty($this->request->data['password'])) {
				unset($this->User->validate['password']);
				unset($this->request->data['User']['password']);
			}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('User information has been updated.', 'default', array('class' => 'alert alert-info'));
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			} else {
				$this->Session->setFlash('User information could not be updated.', 'default', array('class' => 'alert alert-error'));
			}
		}
	
	}
	
	public function deactivate($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
		$this->request->data['User']['status'] = 'deactivated';
		$this->request->data['User']['username'] = 'deactivated';
		$this->request->data['User']['password'] = '83p4jp84rjfpa0w4jfa@@';
		$this->User->validate = array();
		$this->User->set($this->request->data);
		if ($this->User->validates()) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('User has been deactivated.', 'default', array('class' => 'alert alert-info'));
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			} else {
				$this->Session->setFlash('User could not be deactivated.', 'default', array('class' => 'alert alert-error'));
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
		}
	}
	
	public function changepassword($id) {
		$this->layout = 'bootstrap';
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}
		if ($this->Auth->user('id') != $id) {
			throw new ForbiddenException('You are not who you say you are!');
		}
		if ($this->request->is('post')) {
			if ($this->request->data['User']['password1'] == $this->request->data['User']['password2']) {
				$this->request->data['User']['password'] = $this->request->data['User']['password1'];
				unset($this->request->data['User']['password1']);
				unset($this->request->data['User']['password2']);
				$new_validations = array(
					'password' => array(
						'rule' => 'notEmpty',
						'required' => true,
						'allowEmpty' => false
				));
				$this->User->validate = $new_validations;
				$this->User->set($this->request->data);
				if ($this->User->validates()) {
					if ($this->User->save($this->request->data)) {
						$this->Session->setFlash('Password has been successfully changed.', 'default', array('class' => 'alert alert-info'));
						$this->redirect(array('controller' => 'assessments', 'action' => 'index'));
					} else {
						$this->Session->setFlash('Password could not be saved.', 'default', array('class' => 'alert alert-error'));
					}
				} else {
					$this->Session->setFlash('Please enter a new password.', 'default', array('class' => 'alert alert-error'));
				}
			} else {
				$this->Session->setFlash("Passwords don't match. Please try again.", 'default', array('class' => 'alert alert-error'));
			}
		
			
		}
	
	}
	
	public function isAuthorized($user) {
		if ($this->action === 'login' || $this->action === 'logout' || $this->action === 'changepassword') {
			return true;
		}
		if ($user['status'] === 'super') {
			return true;
		}
		return false;
	
	}
	
	
}
?>