<?php $this->Html->css('dbindex', null, array('inline' => false)); ?>

<?php
$schools = array('HKIS' => 'HKIS', 'GSIS' => 'GSIS', 'CIS' => 'CIS', 'DBS' => 'DBS', 'DGS' => 'DGS', 'SIS' => 'SIS');
$grades = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13+'=>'13+');
$sections = array(1 => 'Primary', 2 => 'Secondary');
?>



<!-- NAV BAR -->
<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav pull-left">
			<li><a class="disabled"><?php echo $this->Session->read('Auth.User.name'); ?></a></li>
		</ul>
		<ul class="nav pull-right">
			<li><?php echo $this->Html->link('Home', array('controller' => 'assessments', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link('Create New Assessment', array('controller' => 'assessments', 'action' => 'admincreate')); ?></li>
			<li><?php if ($this->Session->read('Auth.User.status') == 'super') {echo $this->Html->link('View/Edit Users', array('controller' => 'users', 'action' => 'index'));} ?></li>
			<li><?php echo $this->Html->link('Change Password', array('controller' => 'users', 'action' => 'changepassword', $this->Session->read('Auth.User.id'))); ?>
			<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
		</ul>
	</div>
</div>

<div class="container">
<?php echo $this->Session->flash(); ?>
<!-- SEARCH -->
<?php echo $this->Form->create('Assessment', array('type' => 'get', 'inputDefaults' => array('label' => false, 'div' => false))); ?>

<legend>Search Assessments</legend>
Fill in one or more fields. Fields are not case sensitive.
<br />
<br />
<div class="row">
<div class="span12">
<div class="row">
	<div class="span3">Section</div><div class="span3">First Name</div><div class="span3">Last Name</div><div class="span3">Grade</div>
</div>
	<div class="controls controls-row">
	<?php
	echo $this->Form->input('section', array('class'=> 'span3', 'options' => $sections, 'empty' => ''));
	echo $this->Form->input('first_name', array('class'=> 'span3'));
	echo $this->Form->input('last_name', array('class'=> 'span3'));
	echo $this->Form->input('grade', array('class'=> 'span3','options' => $grades, 'empty' => ''));
	?>
	</div>
<div class="row">
	<div class="span3">School</div><div class="span3">Assessed By</div><div class="span3">Handled By</div>
</div>
	<div class="controls controls-row">
	<?php
	echo $this->Form->input('school', array('class'=> 'span3', 'options' => $schools, 'empty' => ''));
	echo $this->Form->input('assessed_by', array('class'=> 'span3', 'options' => $teachers, 'empty' => ''));
	echo $this->Form->input('handled_by', array('class'=> 'span3', 'options' => $admins, 'empty' => ''));
	?>
	<input type="hidden" name="page" value="1" />
	<div class="span3"><button class="btn btn-medium btn-custom1" type="submit" name="submit">Search</button></div>
	</div>
</div>
</div>

</form>


<div class="row">
<div class="span12">
<!-- ASSESSMENT TABLE -->

<?php if (isset($assessments) && !empty($assessments)): ?>
<table class="table table-condensed table-hover">
<span class="title"><?php if (isset($request) && $request == 'get') {echo "Most Recent {$section} Assessments";} else {echo "Search Results";} ?></span>
<!-- color codes /-->
<span class="offset6" id="incomplete"></span> Incomplete<span id="complete"></span> Teacher Completed<span id="checked"></span> Checked Off By Admin
<th>Date Created</th><th></th><th>Student Name</th><th>School</th><th>Grade</th><th class="call">Teacher Called?</th><th>Teacher Comments</th><th>Handled By</th>
<?php foreach ($assessments as $assessment): ?>
<tr <?php
if ($assessment['Assessment']['checked'] == 'yes') {
	echo 'class="info"';
} elseif (!empty($assessment['Assessment']['file_name']) && $assessment['Assessment']['comments_to_admin'] !== NULL) {
} else {
	echo 'class="error"';
}
?>
>
<td><?php echo strftime("%d %b %Y", strtotime($assessment['Assessment']['date_created'])); ?></td>
	<td>
	<div class="btn-group">
	<?php if ($assessment['Assessment']['checked'] != 'yes') {
	echo $this->Form->postLink(
	'<i rel="tooltip" data-placement="top" data-original-title="Mark Complete"  class="icon-ok"></i>', 
	array('action' => 'checkoff', $assessment['Assessment']['id']),
	array('escape' => false, 'class' => 'btn btn-mini'));}
	else {echo '<button class="btn btn-mini disabled"><i rel="tooltip" data-placement="top" data-original-title="Mark Complete" class="icon-ok"></i></button>' ;}
	?>
	<?php if (!empty($assessment['Assessment']['file_name'])) 
	{echo $this->Html->link('<i rel="tooltip" data-placement="top" data-original-title="Open Assessment" class="icon-film"></i>', array('controller' => 'assessments', 'action' => 'viewfile', $assessment['Assessment']['id']), array('escape' => false, 'class' => 'btn btn-mini')) ;}
	else {echo '<button class="btn btn-mini disabled"><i rel="tooltip" data-placement="top" data-original-title="Open Assessment" class="icon-film"></i></button>' ;}
	?>
	<?php if (!empty($assessment['Assessment']['doc_file']))
	{echo $this->Html->link('<i rel="tooltip" data-placement="top" data-original-title="View Uploaded File" class="icon-folder-open"></i>', array('controller' => 'assessments', 'action' => 'viewdoc', $assessment['Assessment']['id']), array('escape' => false, 'class' => 'btn btn-mini')) ;}
	else {echo '<button class="btn btn-mini disabled"><i rel="tooltip" data-placement="top" data-original-title="View Uploaded File" class="icon-folder-open"></i></button>' ;}
	?>
	<?php
	echo $this->Html->link('<i rel="tooltip" data-placement="top" data-original-title="View/Edit Info" class="icon-pencil"></i>', array('controller' => 'assessments', 'action' => 'adminedit', $assessment['Assessment']['id']), array('escape' => false, 'class' => 'btn btn-mini'));
	?>

	<?php echo $this->Form->postLink(
		'<i rel="tooltip" data-placement="top" data-original-title="Delete" class="icon-trash"></i>',
		array('action' => 'admindelete', $assessment['Assessment']['id']),
		array('confirm' => 'Are you sure?', 'escape' => false, 'class' => 'btn btn-mini'));
	?>
	</div>
	</td>

<td><?php echo $assessment['Assessment']['first_name'] ." ". $assessment['Assessment']['last_name']; ?></td>
<td><?php echo $assessment['Assessment']['school']; ?></td>
<td><?php echo "G".$assessment['Assessment']['grade']; ?></td>
<td class="span1 call">
<?php 
if ($assessment['Assessment']['need_to_call'] == 'yes') { // no => not needed, yes & not done => "", yes & no => no, yes & yes => yes
	if ($assessment['Assessment']['called'] == null) {echo "";}
	elseif ($assessment['Assessment']['called'] == 'no') {echo '<i rel="tooltip" data-placement="top" data-original-title="No" class="icon-thumbs-down"></i>';}
	elseif ($assessment['Assessment']['called'] == 'yes') {echo '<i rel="tooltip" data-placement="top" data-original-title="Yes" class="icon-thumbs-up"></i>';}
} else {
	echo '<i rel="tooltip" data-placement="top" data-original-title="Not Needed" class="icon-ban-circle"></i>';
}
?>
</td>
<td><?php echo wordwrap(nl2br($assessment['Assessment']['comments_to_admin']),50," &#8203;"); ?></td>

<td><?php echo $assessment['Handled_By']['name']; ?></td>
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
<?php else: ?>
<?php echo '<span class="title">No results found.</span>' ?>
<?php endif; ?>
</div>
</div>
</div>
