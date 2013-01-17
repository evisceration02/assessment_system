<?php if (!isset($generate) || $generate !== true): ?>
<?php echo $this->Html->script('skills', array('inline' => false)); ?>
<?php $scores = array(1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'); ?>

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

	<div class="span4">
	<?php echo $this->Form->create('Assessment', array('inputDefaults' => array('div' => false, 'errorMessage' => false))); ?>
	<legend>Grade Assessment</legend>
	Comments and Scores cannot be edited after submission. <br />
	<br />
	<div class="span7 offset4 well well-small" id="rubric" style="overflow: auto; position: absolute; height: 337px; border: 1px gray solid;">
	<div id="construction"></div>
	<div id="breadth"></div>
	<div id="comprehension"></div>
	<div id="reasoning"></div>
	<div id="analysis"></div>
	<div id="poise"></div>
	</div>
	<?php 
	echo $this->Form->input('construction', array('label' => array('text' => 'Argument Construction & Progression'), 'options' => $scores, 'empty' => ''));
	echo $this->Form->input('breadth', array('label' => array('text' => 'Argument Breadth'), 'options' => $scores, 'empty' => ''));
	echo $this->Form->input('comprehension', array('label' => array('text' => 'Reading Comprehension & Analysis'), 'options' => $scores, 'empty' => ''));
	echo $this->Form->input('reasoning', array('label' => array('text' => 'Logical Reasoning & Problem Solving'), 'options' => $scores, 'empty' => ''));
	echo $this->Form->input('analysis', array('label' => array('text' => 'Verbal Analysis & Exposition'), 'options' => $scores, 'empty' => ''));
	echo $this->Form->input('poise', array('label' => array('text' => 'Poise & Persuasion'), 'options' => $scores, 'empty' => ''));
	echo $this->Form->input('comments', array('label' => array('text' => "Teacher's Comments"), 'rows' => '8', 'cols' => '80', 'class' => 'span7'));
	?>


	<button class="btn btn-medium btn-custom1" type="submit">Submit</button>
	</form>
	</div>
	<br />
	<br />
	<br />
</div>



<?php elseif ($generate === true):?>
<?php

// REPORT
App::import('Vendor', 'rounded_rect');
App::import('Vendor', 'skills');

$red = array('dark'=>array(102,0,0), 'normal'=>array(255,102,102),'light'=>array(255,204,204));
$blue = array('dark'=>array(0,51,102), 'normal'=>array(102,178,255),'light'=>array(204,229,255));
$orange = array('dark'=>array(207,90,6), 'normal'=>array(255,158,31),'light'=>array(247,209,158));
$green = array('dark'=>array(0,102,0), 'normal'=>array(102,255,102),'light'=>array(204,255,204));
$purple = array('dark'=>array(51,0,102), 'normal'=>array(178,102,255),'light'=>array(229,204,255));
$yellow = array('dark'=>array(102,102,0), 'normal'=>array(255,255,102),'light'=>array(255,255,204));

$first_name = $assessment['Assessment']['first_name'];
$last_name = $assessment['Assessment']['last_name'];
$gender = $assessment['Assessment']['gender'];
$school = $assessment['Assessment']['school'];
$grade_time = $assessment['Assessment']['grade_time'];
$grade = $assessment['Assessment']['grade'];
$date_of_assessment = strftime("%b %d %Y", strtotime($assessment['Assessment']['date_of_assessment']));
$assessed_by = $author;
$contact_info = $assessment['Assessment']['contact_info'];
$file_name = $assessment['Assessment']['file_name'];

$comments = str_replace("\n", "", $comments);


$construction = new Construction($assessment['Assessment']['construction']);
$breadth = new Breadth($assessment['Assessment']['breadth']);
$comprehension = new Comprehension($assessment['Assessment']['comprehension']);
$reasoning = new Reasoning($assessment['Assessment']['reasoning']);
$analysis = new Analysis($assessment['Assessment']['analysis']);
$poise = new Poise($assessment['Assessment']['poise']);


class REPORT extends PDF {

function Coverpage 
($color, $first_name, $last_name, $gender, $school, $grade_time, $grade, $date_of_assessment, $assessed_by, $comments, 
$construction, $breadth, $comprehension, $reasoning, $analysis, $poise)
{
	$v=18;
	
	$this->SetMargins(20,20,20);
	$this->SetTextColor(0,0,0);
	$this->SetFillColor(0,0,0);
	$fill = false;
	
	$this->Image('img/capstonelogo.jpg',20,15,59,18); //Image(file,x,y,w,h)
	$this->SetFont('Helvetica','B',15);
	$this->SetXY(100,15);
	$this->Cell(80,8,"Capstone Student", 0,0,'R', $fill);
	$this->Ln();
	$this->SetX(100);
	$this->Cell(80,8,"Assessment Report", 0,0,'R', $fill);

	
	$this->SetFont('Helvetica','',12);
	
	$this->SetXY(30,20+$v);
	$this->Cell(40,7,"First Name: {$first_name}",0,0,'L', $fill);
	$this->Ln();
	$this->SetX(30);
	$this->Cell(40,7,"Last Name: {$last_name}",0,0,'L', $fill);
	$this->Ln();
	$this->SetX(30);
	$this->Cell(40,7,"Grade Level: {$grade_time} Grade {$grade}",0,0,'L', $fill);
	$this->Ln();
	$this->SetXY(120,20+$v);
	$this->Cell(40,7,"School: {$school}",0,0,'L', $fill);
	$this->Ln();
	$this->SetX(120);
	$this->Cell(40,7,"Date of Assessment: {$date_of_assessment}",0,0,'L', $fill);
	$this->Ln();
	$this->SetX(120);
	$this->Cell(40,7,"Assessed By: {$assessed_by}",0,0,'L', $fill);
	

	
	$this->SetLineWidth(.8);
	$this->SetTextColor(0,0,0);
	$this->SetDrawColor($color['normal'][0],$color['normal'][1],$color['normal'][2]);
	$this->SetFillColor($color['light'][0],$color['light'][1],$color['light'][2]);
	$this->RoundedRect(20, 65, 170, 140, 6, 'FD');
	$this->RoundedRect(20, 215, 170, 60, 6, 'FD');

	// TEACHER COMMENTS TITLE
	$this->SetFont('Helvetica','B',15);
	$this->SetXY(25,72);
	$this->Cell(60,5, "Score Summary: ",0,0,'L', $fill);
	$this->SetXY(25,222);
	$this->Cell(60,5, "Teacher's Comments: ",0,0,'L', $fill);
	$this->SetXY(25,78);
	$this->SetFont('Helvetica','',8);
	$this->Cell(60,4, "(Max Score of 5 for each Category)",0,0,'L', $fill);
	
	// HEXAGONS
	$this->SetLineWidth(.1);
	// $this->Star(105,140,30,array(34,38,42,46,50,50),6,'D');
	$this->SetDrawColor(96,96,96);
	$diagonals = $this->Hexagon(105,140);
	$this->Line(105,140,$diagonals[0],$diagonals[1]);
	$this->Line(105,140,$diagonals[2],$diagonals[3]);
	$this->Line(105,140,$diagonals[4],$diagonals[5]);
	$this->Line(105,140,$diagonals[6],$diagonals[7]);
	$this->Line(105,140,$diagonals[8],$diagonals[9]);
	$this->Line(105,140,$diagonals[10],$diagonals[11]);
	$this->Hexagon(105,140,10,'D',1,1,1,1,1,1);
	$this->Hexagon(105,140,10,'D',2,2,2,2,2,2);	
	$this->Hexagon(105,140,10,'D',3,3,3,3,3,3);
	$this->Hexagon(105,140,10,'D',4,4,4,4,4,4);
	$this->Hexagon(105,140,10,'D',5,5,5,5,5,5);
	
	// SCORE HEXAGON
	$this->SetLineWidth(.4);
	$this->SetFillColor(0,0,51);
	$this->SetDrawColor(0,0,51);
	$this->SetAlpha(.9);
	$this->Hexagon(105,140,10,'DF',$construction->score,$breadth->score,$comprehension->score,$reasoning->score,$analysis->score,$poise->score);
	$this->SetAlpha(1);
	
	$this->SetFont('Helvetica','B',8);;
	$this->SetXY($diagonals[0],$diagonals[1]-5);
	$this->MultiCell(30,4, "Argument Construction & Progression" ,0,'L',$fill);
	$this->SetXY($diagonals[2],$diagonals[3]+3);
	$this->MultiCell(30,4, "Argument Breadth" ,0,'L',$fill);
	$this->SetXY($diagonals[4]-10,$diagonals[5]+3);
	$this->MultiCell(30,4, "Reading Comprehension & Analysis" ,0,'L',$fill);
	$this->SetXY($diagonals[6]-30,$diagonals[7]-3);
	$this->MultiCell(30,4, "Logical Reasoning & Problem Solving" ,0,'L',$fill);
	$this->SetXY($diagonals[8]-10,$diagonals[9]-10);
	$this->MultiCell(30,4, "Verbal Analysis & Exposition" ,0,'L',$fill);
	$this->SetXY($diagonals[10]-5,$diagonals[11]-7);
	$this->MultiCell(30,4, "Poise & Persuasion" ,0,'L',$fill);
	
	// TEACHER'S COMMENTS
	$this->SetXY(25,229);
	$this->SetFont('Helvetica','',10);
	$this->MultiCell(125,5, $comments ,0,'L',$fill);
	
	// COPYRIGHT
	$this->SetFontSize(8);
	$this->SetTextColor(0,0,0);
	$this->SetXY(100,282);
	$this->Cell(10,5, "Copyright ".chr(169)." ". strftime("%Y", time()) . " Capstone Prep. All rights reserved.", 0,0,'C', $fill);
}

function Scorepage($skill1, $skill2, $color1, $color2, $first_name, $avg1, $avg2) {
	$y = 2;
	$fill = false;
	$this->Image('img/capstonelogo.jpg',20,20,59,18);
	$this->SetLineWidth(.8);
	$this->SetFillColor($color1['light'][0],$color1['light'][1],$color1['light'][2]); // light baby blue
	$this->SetDrawColor($color1['normal'][0],$color1['normal'][1],$color1['normal'][2]); // slightly darker baby blue
	// $this->Cell(40,7,"First Name: {$first_name}",0,0,'L', $fill);
	$this->RoundedRect(20, 45, 170, 110, 6, 'FD');	// FULL X LENGTH IS 210
	
	// TITLE
	$this->SetFont('Helvetica','B',15);
	$this->SetXY(60,50 + $y);
	$this->Cell(125,5, $skill1->title,0,0,'L', !$fill);
	
	// DESCRIPTION OF SKILL

	$this->SetXY(60,57 + $y);
	$this->SetFont('Helvetica','',10);
	$this->MultiCell(125,5, $skill1->get_description() ,0,'L',$fill); //MultiCell(float w, float h, string txt [, mixed border [, string align [, int fill]]])
	
	/////////////////// SCORE DESCRIPTION ////////////////////
	
	$this->SetXY(25,98);
	$this->SetFont('Helvetica','B',12);
	$this->Cell(80,5, "What your score means:",0,0,'L', !$fill);
	$this->SetFont('Helvetica','',10);
	$this->SetXY(25,105);
	$this->MultiCell(90,5,$skill1->score_description ,0,'L',$fill);

	/////////////////// SCORE CELL ////////////////////
	
	$vertical_shift = -2;
	$this->SetDrawColor(0,0,0);
	$this->SetFillColor($color1['dark'][0],$color1['dark'][1],$color1['dark'][2]);
	$this->RoundedRect(25, 55+$vertical_shift + $y, 30, 30, 3, 'F');
	$this->SetXY(25,57+$vertical_shift + $y);
	$this->SetTextColor(255,255,255);
	$this->SetFontSize(12);
	$this->Cell(30,8,"Score:",0,0,'C',$fill);
	$this->SetXY(25,61+$vertical_shift + $y);
	$this->SetFontSize(45);
	$this->Cell(30,22,$skill1->score,0,0,'C',$fill);
	
	/////////////////// BAR GRAPH ///////////////////////////
	
	$this->SetLineWidth(.3);
	$this->SetFillColor(255,255,255);
	$this->SetTextColor(255,255,255);
	$this->SetFontSize(11);
	$this->RoundedRect(123,105,60,35,2,'FD');
	$this->SetFillColor($color1['dark'][0],$color1['dark'][1],$color1['dark'][2]);
	$this->SetDrawColor($color1['dark'][0],$color1['dark'][1],$color1['dark'][2]);
	$this->SetXY(123+12,110+6*(5-$skill1->score));
	$this->Cell(12,6*$skill1->score, "{$skill1->score}", 'LTR',2,'C', true);
	if ($avg1 != 'NA' && !empty($avg1)) { 	// AVERAGE
		$this->SetXY(123+36,110+6*(5-(float)$avg1));
		$this->Cell(12,6*(float)$avg1,"{$avg1}", 'LTR',2,'C', true);
	} else {
		$this->SetXY(123+36,110+6*(5-1));
		$this->Cell(12,6*1,"NA", 'LTR',2,'C', true);
	}

	$this->SetTextColor(0,0,0);
	$this->SetFontSize(8);
	$this->SetXY(123+8,141);
	$this->MultiCell(20,3,"Your Score",0,'C',false);
	$this->SetXY(123+8+24,141);
	$this->MultiCell(20,3,"Average",0,'C',false);

	

	
	
	///////////////////////////////////////////////////////////////////////////// 2ND BLOCK ////////////////////////////////////////////////////////////////////
	
	$block = 120;
	$this->SetLineWidth(.8);
	$this->SetTextColor(0,0,0);
	$this->SetDrawColor($color2['normal'][0],$color2['normal'][1],$color2['normal'][2]);
	$this->SetFillColor($color2['light'][0],$color2['light'][1],$color2['light'][2]);
	$this->RoundedRect(20, 165, 170, 110, 6, 'FD');
	
	/////////////// 2ND TITLE //////////////////////
	$this->SetFont('Helvetica','B',15);
	$this->SetXY(60,50 + $block + $y);
	$this->Cell(125,5, $skill2->title ,0,0,'L', !$fill);
	
	////////////// 2ND DESCRIPTION OF SKILL ////////////////

	$this->SetXY(60,57 + $block + $y);
	$this->SetFont('Helvetica','',10);
	$this->MultiCell(125,5, $skill2->get_description() ,0,'L',$fill); //MultiCell(float w, float h, string txt [, mixed border [, string align [, int fill]]])
	
	/////////////////// 2ND SCORE DESCRIPTION ////////////////////
	$this->SetXY(25,98+$block+$y);
	$this->SetFont('Helvetica','B',12);
	$this->Cell(80,5, "What your score means:",0,0,'L', !$fill);
	$this->SetFont('Helvetica','',10);
	$this->SetXY(25,105+$block+$y);
	$this->MultiCell(90,5, $skill2->score_description ,0,'L',$fill);
	
	/////////////////// 2ND SCORE CELL ///////////////////////
	
	$vertical_shift = -2;
	$this->SetDrawColor(0,0,0);
	$this->SetFillColor($color2['dark'][0],$color2['dark'][1],$color2['dark'][2]);
	$this->RoundedRect(25, 55+$vertical_shift + $block + $y, 30, 30, 3, 'F');
	$this->SetXY(25,57+$vertical_shift + $block + $y);
	$this->SetTextColor(255,255,255);
	$this->SetFontSize(12);
	$this->Cell(30,8,"Score:",0,0,'C',$fill);
	$this->SetXY(25,61+$vertical_shift + $block + $y);
	$this->SetFontSize(45);
	$this->Cell(30,22,$skill2->score,0,0,'C',$fill);
	
	/////////////////// BAR GRAPH ///////////////////////////
	
	$this->SetLineWidth(.3);
	$this->SetFillColor(255,255,255);
	$this->SetTextColor(255,255,255);
	$this->SetFontSize(11);
	$this->RoundedRect(123,105+$block,60,35,2,'FD');
	$this->SetFillColor($color2['dark'][0],$color2['dark'][1],$color2['dark'][2]);
	$this->SetDrawColor($color2['dark'][0],$color2['dark'][1],$color2['dark'][2]);
	$this->SetXY(123+12,110+6*(5-$skill2->score) + $block);
	$this->Cell(12,6*$skill2->score, "{$skill2->score}", 'LTR',2,'C', true);
	if ($avg2 != 'NA' && !empty($avg2)) { 	// AVERAGE
		$this->SetXY(123+36,110+6*(5-(float)$avg2) + $block);
		$this->Cell(12,6*(float)$avg2,"{$avg2}", 'LTR',2,'C', true);
	} else {
		$this->SetXY(123+36,110+6*(5-1) + $block);
		$this->Cell(12,6*1,"NA", 'LTR',2,'C', true);
	}
	$this->SetTextColor(0,0,0);
	$this->SetFontSize(8);
	$this->SetXY(123+8,141 + $block);
	$this->MultiCell(20,3,"Your Score",0,'C',false);
	$this->SetXY(123+8+24,141 + $block);
	$this->MultiCell(20,3,"Average",0,'C',false);

	///////////////////// COPYRIGHT ////////////////////
	$this->SetFontSize(8);
	$this->SetTextColor(0,0,0);
	$this->SetXY(100,282);
	$this->Cell(10,5, "Copyright ".chr(169)." ". strftime("%Y", time()) . " Capstone Prep. All rights reserved.", 0,0,'C', $fill);
	
	

}

}





$pdf = new REPORT();
$pdf->SetAutoPageBreak(false);
$pdf->SetFont('Helvetica','',8);
$pdf->AddPage();
$pdf->Coverpage(
$blue, $first_name, $last_name, $gender, $school, $grade_time, $grade, $date_of_assessment, $assessed_by, $comments, 
$construction, $breadth, $comprehension, $reasoning, $analysis, $poise);
$pdf->AddPage();
$pdf->Scorepage($construction, $breadth, $red, $purple, $first_name, $avg_construction, $avg_breadth);
$pdf->AddPage();
$pdf->Scorepage($comprehension,$reasoning, $orange, $green, $first_name, $avg_comprehension, $avg_reasoning);
$pdf->AddPage();
$pdf->Scorepage($analysis,$poise,$blue,$yellow, $first_name, $avg_analysis, $avg_poise);
$pdf->Output("../Files/" . $file_name, 'F');
?>
<?php endif; ?>