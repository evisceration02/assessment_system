<?php $this->Html->css('dbindex', null, array('inline' => false)); ?>
<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav pull-left">
			<li><a class="disabled"><?php echo $this->Session->read('Auth.User.name'); ?></a></li>
		</ul>
		<ul class="nav pull-right">
			<li><?php echo $this->Html->link('Home', array('controller' => 'assessments', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link('Change Password', array('controller' => 'users', 'action' => 'changepassword', $this->Session->read('Auth.User.id'))); ?>
			<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
		</ul>
	</div>
</div>

<div class="container">
<?php echo $this->Session->flash(); ?>
<div class="row">
<div class="span12">
<table class="table table-condensed table-hover">
<span class="title">Last 15 Assessments Assigned</span>
<th>Date Assigned</th><th></th><th>Name of Student</th><th>Section</th><th>Grade</th><th>School</th><th>Parent Call?</th><th>Contact Info/Comments</th><th>Handled By</th>
<?php if ($assessments): ?>
<?php foreach($assessments as $assessment): ?>
<tr <?php if (!empty($assessment['Assessment']['file_name']) && $assessment['Assessment']['comments_to_admin'] !== NULL) {echo 'class="info"'; } ?>>
<td class="span2"><?php echo strftime("%d %b %Y", strtotime($assessment['Assessment']['date_created'])); ?></td>
<td class="span1"> <!-- ACTIONS -->
	<div class="btn-group pull-right">
	<?php if (!empty($assessment['Assessment']['file_name'])) 
	{echo $this->Html->link('<i rel="tooltip" data-placement="top" data-original-title="Open Assessment" class="icon-film"></i>', array('controller' => 'assessments', 'action' => 'viewfile', $assessment['Assessment']['id']), array('escape' => false, 'class' => 'btn btn-mini')) ;}
	else {echo '<button class="btn btn-mini disabled"><i rel="tooltip" data-placement="top" data-original-title="Open Assessment" class="icon-film"></i></button>' ;}
	?>
	<?php if (!empty($assessment['Assessment']['doc_file']))
	{echo $this->Html->link('<i rel="tooltip" data-placement="top" data-original-title="View Uploaded File" class="icon-folder-open"></i>', array('controller' => 'assessments', 'action' => 'viewdoc', $assessment['Assessment']['id']), array('escape' => false, 'class' => 'btn btn-mini')) ;}
	else {echo '<button class="btn btn-mini disabled"><i rel="tooltip" data-placement="top" data-original-title="View Uploaded File" class="icon-folder-open"></i></button>' ;}
	?>
	<?php 
	if (empty($assessment['Assessment']['file_name'])) {
		echo $this->Html->link('<i rel="tooltip" data-placement="top" data-original-title="Grade Assessment" class="icon-edit"></i>', array('controller'=>'assessments', 'action' => 'teacherform', $assessment['Assessment']['id']), array('escape' => false, 'class' => 'btn btn-mini'));
	} else {
		echo '<button class="btn btn-mini disabled"><i rel="tooltip" data-placement="top" data-original-title="Grade Assessment" class="icon-edit"></i></button>' ;}

	?>
	<?php if ($assessment['Assessment']['comments_to_admin'] === NULL) {
		echo $this->Html->link('<i rel="tooltip" data-placement="top" data-original-title="Admin Form" class="icon-share"></i>', array('controller'=>'assessments', 'action' => 'adminform', $assessment['Assessment']['id']), array('escape' => false, 'class' => 'btn btn-mini'));
	} else {
		echo '<button class="btn btn-mini disabled"><i rel="tooltip" data-placement="top" data-original-title="Admin Form" class="icon-share"></i></button>' ;}

	?>
	</div>
</td>
<td class="span2"><?php echo $assessment['Assessment']['first_name'] ." ". $assessment['Assessment']['last_name']; ?></td>
<td class="span1"><?php echo $assessment['Assessment']['section']; ?></td>
<td class="span1"><?php echo $assessment['Assessment']['grade']; ?></td>
<td class="span1"><?php echo $assessment['Assessment']['school']; ?></td>
<td class="span1 call"><?php echo $assessment['Assessment']['need_to_call'] == 'yes' ? '<i rel="tooltip" data-placement="top" data-original-title="Yes" class="icon-thumbs-up"></i>' : '<i rel="tooltip" data-placement="top" data-original-title="Yes" class="icon-thumbs-down"></i>' ?></td>
<td class="span4"><?php echo wordwrap(nl2br($assessment['Assessment']['contact_info']),50," &#8203;"); ?></td>

<td class="span2"><?php echo $assessment['Handled_By']['name']; ?></td>
</td>

</tr>
<?php endforeach; ?>
<?php endif; ?>
</table>
</div>
</div>
</div>