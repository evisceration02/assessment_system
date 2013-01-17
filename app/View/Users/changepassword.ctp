<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav pull-right">
			<li><?php echo $this->Html->link('Home', array('controller' => 'assessments', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
		</ul>
	</div>
</div>

<div class="container">
<?php echo $this->Session->flash(); ?>
<div class="row">
<div class="offset2">
<?php 
echo $this->Form->create('User', array('inputDefaults' => array('div' => 'control-group', 'errorMessage' => false), 'class' => 'form-horizontal')); ?>
<legend>Change Password</legend>
Your password will be encrypted so that no one, not even the dude that created this site, can retrieve it. <br />
However, admin will be able to reset your password should you lose it. <br />
<br />
<br />
<?php
	echo $this->Form->input('password1', array('label' => array('text' => 'Password', 'class' => 'control-label'),'between' => '<div class="controls">', 'after' => '</div>'));
	echo $this->Form->input('password2', array('label' => array('text' => 'Confirm Password', 'class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>'));

?>
<div class="controls"><button class="btn btn-medium btn-custom1" type="submit">Submit</button></div>
</div>
</div>
</div>


