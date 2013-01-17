<?php $this->Html->css('login', null, array('inline' => false)); ?>

<div class="container">
<div class="row">

	<h1>Capstone</h1>

	<h2>Assessments</h2>
</div>


<div class="row">
	<?php //echo $this->Session->flash('auth'); // Authentication Messages ?>
	<?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false, 'div' => false), 'class'=> 'form-signin')); ?>

	<h2 class="form-signin-heading"></h2>
			<?php 
			echo $this->Session->flash(); 
			echo $this->Form->input('username', array('class' => 'input-block-level', 'placeholder' => 'Username'));
			echo $this->Form->input('password', array('class' => 'input-block-level', 'placeholder' => 'Password'));
			?>

	<div class="btnholder"><button class="btn btn-large btn-custom1" type="submit">Sign in</button></div>
</div>
</div>
</div>
