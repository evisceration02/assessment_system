<?php $this->Html->css('dbindex', null, array('inline' => false)); ?>
<?php 
$sections = array(1 => 'Primary', 2 => 'Secondary'); 
$statuses = array('admin' => 'Admin', 'teacher' => 'Teacher', 'super' => 'Super', 'deactivated' => 'Deactivated');
?>

<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav pull-right">
			<li><?php echo $this->Html->link('Home', array('controller' => 'assessments', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link('Add User', array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
		</ul>
	</div>
</div>

<div class="container">
<?php echo $this->Session->flash(); ?>
<div class="row">
<div class="span12">
<table class="table table-condensed table-hover">
<span class="title">Users</span>
<th></th><th>First Name</th><th>Last Name</th><th>Username</th><th>Email</th><th>Status</th><th>Section</th>

<?php foreach ($users as $user): ?>
<tr>
<td><?php echo $this->Html->link('<i rel="tooltip" data-placement="top" data-original-title="View/Edit Info" class="icon-pencil"></i>', array('controller' => 'users', 'action' => 'edit', $user['User']['id']), array('escape' => false, 'class' => 'btn btn-mini')); ?>
	<?php echo $this->Form->postLink('<i rel="tooltip" data-placement="top" data-original-title="Deactivate" class="icon-remove"></i>', array('controller' => 'users', 'action' => 'deactivate', $user['User']['id']), array('confirm' => 'Are you sure?','escape' => false, 'class' => 'btn btn-mini')); ?>

</td>
<td><?php echo $user['User']['first_name']; ?></td>
<td><?php echo $user['User']['last_name']; ?></td>
<td><?php echo $user['User']['username']; ?></td>
<td><?php echo $user['User']['email']; ?></td>
<td><?php echo $statuses[$user['User']['status']]; ?></td>
<td><?php echo $sections[$user['User']['section']]; ?></td>
</tr>
<?php endforeach; ?>
</table>
	<div class="pagination pagination-centered pagination-medium">
	<ul>

	<?php echo $this->Paginator->first(' << ', array('tag' => 'li')); ?>
	<li><?php echo $this->Paginator->prev(' < ', array(), null, array('tag' => 'span')); ?></li>
	<?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a')); ?>
	<li><?php echo $this->Paginator->next(' > ', array(), null, array('tag' => 'span')); ?></li>
	<?php echo $this->Paginator->last(' >> ', array('tag' => 'li')); ?>
	</ul>
	</div>
</div>
</div>
</div> <!-- end container -->