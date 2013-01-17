<!-- app/View/Users/edit.ctp -->
<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav pull-right">
			<li><?php echo $this->Html->link('Home', array('controller' => 'assessments', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link('View Users', array('controller' => 'users', 'action' => 'index'));?></li>
			<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
		</ul>
	</div>
</div>

<div class="container">
<?php echo $this->Session->flash(); ?>
<div class="row">
<div class="offset2">
<?php 
echo $this->Form->create('User', array('inputDefaults' => array('div' => 'control-group', 'label' => array('class' => 'control-label'), 'errorMessage' => false), 'class' => 'form-horizontal'));
?>
<legend>Edit User</legend>
Leave the password field blank to keep the previous password.
<br />
<br />
<br />
<?php
echo $this->Form->input('first_name', array('between' => '<div class="controls">', 'after' => '</div>'));
echo $this->Form->input('last_name', array('between' => '<div class="controls">', 'after' => '</div>'));
echo $this->Form->input('email', array('between' => '<div class="controls">', 'after' => '</div>'));
echo $this->Form->input('username', array('between' => '<div class="controls">', 'after' => '</div>'));
echo $this->Form->input('password', array('between' => '<div class="controls">', 'after' => '</div>')); // NEED TO SHOW TYPING
echo $this->Form->input('status', array(
	'options' => array('admin' => 'Admin', 'teacher' => 'Teacher'),
	'between' => '<div class="controls">', 'after' => '</div>')
);
echo $this->Form->input('section', array('options' => array(1 => 'Primary', 2 => 'Secondary'), 'between' => '<div class="controls">', 'after' => '</div>'));
 
?>
<div class="controls"><button class="btn btn-medium btn-custom1" type="submit">Edit User</button></div>
</div>
</div>
</div>