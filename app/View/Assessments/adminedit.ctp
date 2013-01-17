<?php
echo $this->Html->script('edit', array('inline' => false));
echo $this->Html->script('school', array('inline' => false));
$schools = array('HKIS' => 'HKIS', 'GSIS' => 'GSIS', 'CIS' => 'CIS', 'DBS' => 'DBS', 'DGS' => 'DGS', 'SIS' => 'SIS', 'Other' => 'Other');
$grade_times = array('Summer Before' => 'Summer Before', 'First Half of' => 'First Half of', 'Second Half of' => 'Second Half of');
$grades = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13+'=>'13+');
$sections = array(1 => 'Primary', 2 => 'Secondary');
$genders = array('M' => 'Male', 'F' => 'Female');
?>
<!-- NAV BAR -->
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
<table class="table table-condensed"> 
<th>Name</th><th>Section</th><th>Grade</th><th>School</th><th>Gender</th><th>Date of Assessment</th>
<tr>
<td class="span2"><?php echo $assessment['Assessment']['first_name'] . ' ' . $assessment['Assessment']['last_name'] . '<br />'; ?></td>
<td class="span2"><?php echo $assessment['Assessment']['section'] == 2 ? 'Secondary': 'Primary'; ?></td>
<td class="span2"><?php echo $assessment['Assessment']['grade_time'] . ' G' . $assessment['Assessment']['grade'] . '<br />'; ?></td>
<td class="span2"><?php echo $assessment['Assessment']['school'] . '<br />'; ?></td>
<td class="span2"><?php echo $assessment['Assessment']['gender']; ?></td>
<td class="span2"><?php echo strftime("%d %b %Y", strtotime($assessment['Assessment']['date_of_assessment'])); ?></td>
</tr>
</table>

<table class="table table-condensed"> 
<th>Assigned Teacher</th><th>Teacher-Parent Call?</th><th>Contact info/Comments</th><th>Handled By</th>
<tr>
<td class="span2"><?php echo $assessment['Assessed_By']['name']; ?></td>
<td class="span2"><?php echo $assessment['Assessment']['need_to_call']; ?></td>
<td class="span6"><?php echo wordwrap(nl2br($assessment['Assessment']['contact_info']),50," &#8203;"); ?></td>
<td class="span2"><?php echo $assessment['Handled_By']['name']; ?></td>
</tr>
</table>

<button id="editbutton" class="btn btn-medium btn-custom1 offset11">Edit</button>

<div id="editing" <?php if ($get === true) {echo 'style="display:none;"';}?>>
<?php echo $this->Form->create('Assessment', array('inputDefaults' => array('label' => false, 'div' => false, 'errorMessage' => false), 'type' => 'file')); ?>
<legend>Edit Assessment</legend>
<div class="row">
<div class="span12">
<div class="row">
	<div class="span3">First Name</div><div class="span3">Last Name</div><div class="span3">Section</div>
</div>
<div class="controls controls-row">
	<?php
	echo $this->Form->input('first_name', array('class' => 'span3', 'error' => array('attributes' => array('wrap' => 'span', 'class' => 'bzzz'))));
	echo $this->Form->input('last_name', array('class' => 'span3'));
	echo $this->Form->input('section', array('class' => 'span3', 'options' => $sections, 'empty' => ''));
	?>
</div>
<div class="row">
	<div class="span2">Grade</div><div class="span1"></div><div class="span3">School</div>
</div>
<div class="controls controls-row">
	<?php
	echo $this->Form->input('grade_time', array('class' => 'span2', 'options' => $grade_times, 'empty' => ''));
	echo $this->Form->input('grade', array('class' => 'span1', 'options' => $grades, 'empty' => ''));
	echo $this->Form->input('school', array('class' => 'span3', 'options' => $schools, 'empty' => ''));
	?>
</div>
<div class="row">
	<div class="span2">Gender</div><div class="span2">Date of Assessment</div>
</div>
<div class="controls controls-row">
	<?php
	echo $this->Form->input('gender', array('class' => 'span2', 'options' => $genders, 'empty' => ''));
	echo $this->Form->input('date_of_assessment', array('class' => 'span2', 'type' => 'date', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 2, 'maxYear' => date('Y'), 'separator' => ''));
	?>
</div>
<div class="row">
	<div class="span3">Upload File (not required)</div><div class="span3" style="position:relative;right: 14px;">Assign to Teacher</div><div class="span3" style="position:relative;right: 14px;">Teacher need to call the parent?</div>
</div>
<div class="controls controls-row">
<?php
	echo '<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />';
	echo $this->Form->input('doc_file', array('class' => 'span3', 'type'=>'file'));
	echo $this->Form->input('assessed_by', array('class' => 'span3', 'options' => $teachers, 'empty' => ''));
	echo $this->Form->input('need_to_call', array('class' => 'span3', 'options' => array('yes' => 'Yes', 'no' => 'No')));
	?>
</div>
<div class="row">
	<div class="span5">Contact Info/Comments (not required)</div>
</div>
<div class="controls controls-row">
	<?php
	echo $this->Form->input('contact_info', array('class' => 'span9', 'rows' => '10', 'cols' => '80'));
	?>
</div>
<div class="row">
	<div class="span2">Handled By</div>
</div>
<div class="controls controls-row">
	<?php
	echo $this->Form->input('handled_by', array('class' => 'span2', 'options' => $admins, 'empty' => ''));
	echo '<div class="offset7"><button class="btn btn-medium btn-custom1" type="submit">Submit</button></div>';
	?>
</div>
</div> <!-- end span12 -->
</div> <!-- end row -->
</form>
</div>
</div> <!-- end container -->