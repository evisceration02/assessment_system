<?php $responses = array('yes' => 'Yes', 'no' => 'No'); ?>

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
<th>Name</th><th>Grade</th><th>School</th><th>Gender</th><th>Date of Assessment</th>
<tr>
<td><?php echo $assessment['Assessment']['first_name'] . ' ' . $assessment['Assessment']['last_name'] . '<br />'; ?></td>
<td><?php echo $assessment['Assessment']['grade_time'] . ' G' . $assessment['Assessment']['grade'] . '<br />'; ?></td>
<td><?php echo $assessment['Assessment']['school'] . '<br />'; ?></td>
<td><?php echo $assessment['Assessment']['gender']; ?></td>
<td><?php echo strftime("%d %b %Y", strtotime($assessment['Assessment']['date_of_assessment'])); ?></td>
</tr>
</table>

<div class="row">
<?php echo $this->Form->create('Assessment', array('inputDefaults' => array('div' => false))); ?>
<legend>Admin Form</legend>
<?php
echo "If comments are not necessary, please submit a blank form anyway so that admin knows it's done.<br /><br />";
echo "Where you able to reach the parent?";
if ($assessment['Assessment']['need_to_call'] == 'yes') {
echo '<label class="radio">';
echo $this->Form->radio('called', $responses, array('separator' => '</label><label class="radio">', 'value' => 'no', 'legend' => false));
}
echo '</label><br />';
echo $this->Form->input('comments_to_admin', array('label' => array('text' => 'Comments to Admin: '), 'rows' => '8', 'cols' => '80', 'class' => 'span7'));

?>
</div>
<div class="row"><button class="btn btn-medium btn-custom1" type="submit">Submit</button></div>
</form>
<br />
<br />
<br />
</div>