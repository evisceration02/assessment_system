<?php
echo $this->Html->script('school', array('inline' => false));
$schools = array('HKIS' => 'HKIS', 'GSIS' => 'GSIS', 'CIS' => 'CIS', 'DBS' => 'DBS', 'DGS' => 'DGS', 'SIS' => 'SIS', "St. Paul's" => "St. Paul's", "Other" => "Other");
$grade_times = array('Summer Before' => 'Summer Before', 'First Half of' => 'First Half of', 'Second Half of' => 'Second Half of');
$grades = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13+'=>'13+');
$sections = array(1 => 'Primary', 2 => 'Secondary');
$genders = array('M' => 'Male', 'F' => 'Female');
?><!-- NAV BAR -->
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
<?php echo $this->Form->create('Assessment', array('inputDefaults' => array('label' => false, 'div' => false, 'errorMessage' => false), 'type' => 'file')); ?>
<legend>Assign a New Assessment to a Teacher</legend>
Uploaded Files must be less than 5 MB and should preferably be in pdf. However, most document formats (.doc, .docx) can also be uploaded. <br />
Please be patient when uploading and opening large files.<br />
<br />
<div class="row">
<div class="span12">
<div class="row">
	<div class="span3">First Name</div><div class="span3">Last Name</div><div class="span3">Section</div>
</div>
<div class="controls controls-row">
	<?php
	echo $this->Form->input('first_name', array('class' => 'span3'));
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
</div> <!-- end container -->