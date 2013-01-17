<?php
class AveragesController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
	public $uses = array('Average', 'Assessment');
	public $name = 'Averages';
	
	
	public function averages() {
		$this->layout = 'bootstrap';
		$assessments = $this->Assessment->find('all', array('fields' => array('grade','construction', 'breadth', 'comprehension', 'reasoning', 'analysis', 'poise')));
		$sum1_construction = 0; $sum1_breadth = 0; $sum1_comprehension = 0; $sum1_reasoning = 0; $sum1_analysis = 0; $sum1_poise = 0;
		$sum2_construction = 0; $sum2_breadth = 0; $sum2_comprehension = 0; $sum2_reasoning = 0; $sum2_analysis = 0; $sum2_poise = 0;
		$sum3_construction = 0; $sum3_breadth = 0; $sum3_comprehension = 0; $sum3_reasoning = 0; $sum3_analysis = 0; $sum3_poise = 0;
		$sum4_construction = 0; $sum4_breadth = 0; $sum4_comprehension = 0; $sum4_reasoning = 0; $sum4_analysis = 0; $sum4_poise = 0;
		$sum5_construction = 0; $sum5_breadth = 0; $sum5_comprehension = 0; $sum5_reasoning = 0; $sum5_analysis = 0; $sum5_poise = 0;
		$sum6_construction = 0; $sum6_breadth = 0; $sum6_comprehension = 0; $sum6_reasoning = 0; $sum6_analysis = 0; $sum6_poise = 0;
		$sum7_construction = 0; $sum7_breadth = 0; $sum7_comprehension = 0; $sum7_reasoning = 0; $sum7_analysis = 0; $sum7_poise = 0;
		$sum8_construction = 0; $sum8_breadth = 0; $sum8_comprehension = 0; $sum8_reasoning = 0; $sum8_analysis = 0; $sum8_poise = 0;
		$sum9_construction = 0; $sum9_breadth = 0; $sum9_comprehension = 0; $sum9_reasoning = 0; $sum9_analysis = 0; $sum9_poise = 0;
		$sum10_construction = 0; $sum10_breadth = 0; $sum10_comprehension = 0; $sum10_reasoning = 0; $sum10_analysis = 0; $sum10_poise = 0;
		$sum11_construction = 0; $sum11_breadth = 0; $sum11_comprehension = 0; $sum11_reasoning = 0; $sum11_analysis = 0; $sum11_poise = 0;
		$sum12_construction = 0; $sum12_breadth = 0; $sum12_comprehension = 0; $sum12_reasoning = 0; $sum12_analysis = 0; $sum12_poise = 0;
		$sum13_construction = 0; $sum13_breadth = 0; $sum13_comprehension = 0; $sum13_reasoning = 0; $sum13_analysis = 0; $sum13_poise = 0;
		$count1 = 0; 
		$count2 = 0; 
		$count3 = 0; 
		$count4 = 0; 
		$count5 = 0; 
		$count6 = 0; 
		$count7 = 0; 
		$count8 = 0; 
		$count9 = 0; 
		$count10 = 0; 
		$count11 = 0; 
		$count12 = 0; 
		$count13 = 0;
		foreach ($assessments as $assessment) {
			$grade = $assessment['Assessment']['grade'];
			switch ($grade) {
			case 1:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum1_construction += $assessment['Assessment']['construction'];
					$sum1_breadth += $assessment['Assessment']['breadth'];
					$sum1_comprehension += $assessment['Assessment']['comprehension'];
					$sum1_reasoning += $assessment['Assessment']['reasoning'];
					$sum1_analysis += $assessment['Assessment']['analysis'];
					$sum1_poise += $assessment['Assessment']['poise'];
					$count1 += 1;
				}
				break;
			case 2:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum2_construction += $assessment['Assessment']['construction'];
					$sum2_breadth += $assessment['Assessment']['breadth'];
					$sum2_comprehension += $assessment['Assessment']['comprehension'];
					$sum2_reasoning += $assessment['Assessment']['reasoning'];
					$sum2_analysis += $assessment['Assessment']['analysis'];
					$sum2_poise += $assessment['Assessment']['poise'];
					$count2 += 1;
				}
				break;
			case 3:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum3_construction += $assessment['Assessment']['construction'];
					$sum3_breadth += $assessment['Assessment']['breadth'];
					$sum3_comprehension += $assessment['Assessment']['comprehension'];
					$sum3_reasoning += $assessment['Assessment']['reasoning'];
					$sum3_analysis += $assessment['Assessment']['analysis'];
					$sum3_poise += $assessment['Assessment']['poise'];
					$count3 += 1;
				}
				break;
			case 4:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum4_construction += $assessment['Assessment']['construction'];
					$sum4_breadth += $assessment['Assessment']['breadth'];
					$sum4_comprehension += $assessment['Assessment']['comprehension'];
					$sum4_reasoning += $assessment['Assessment']['reasoning'];
					$sum4_analysis += $assessment['Assessment']['analysis'];
					$sum4_poise += $assessment['Assessment']['poise'];
					$count4 += 1;
				}
				break;	
			case 5:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum5_construction += $assessment['Assessment']['construction'];
					$sum5_breadth += $assessment['Assessment']['breadth'];
					$sum5_comprehension += $assessment['Assessment']['comprehension'];
					$sum5_reasoning += $assessment['Assessment']['reasoning'];
					$sum5_analysis += $assessment['Assessment']['analysis'];
					$sum5_poise += $assessment['Assessment']['poise'];
					$count5 += 1;
				}
				break;			
			case 6:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum6_construction += $assessment['Assessment']['construction'];
					$sum6_breadth += $assessment['Assessment']['breadth'];
					$sum6_comprehension += $assessment['Assessment']['comprehension'];
					$sum6_reasoning += $assessment['Assessment']['reasoning'];
					$sum6_analysis += $assessment['Assessment']['analysis'];
					$sum6_poise += $assessment['Assessment']['poise'];
					$count6 += 1;
				}
				break;
			case 7:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum7_construction += $assessment['Assessment']['construction'];
					$sum7_breadth += $assessment['Assessment']['breadth'];
					$sum7_comprehension += $assessment['Assessment']['comprehension'];
					$sum7_reasoning += $assessment['Assessment']['reasoning'];
					$sum7_analysis += $assessment['Assessment']['analysis'];
					$sum7_poise += $assessment['Assessment']['poise'];
					$count7 += 1;
				}
				break;
			case 8:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum8_construction += $assessment['Assessment']['construction'];
					$sum8_breadth += $assessment['Assessment']['breadth'];
					$sum8_comprehension += $assessment['Assessment']['comprehension'];
					$sum8_reasoning += $assessment['Assessment']['reasoning'];
					$sum8_analysis += $assessment['Assessment']['analysis'];
					$sum8_poise += $assessment['Assessment']['poise'];
					$count8 += 1;
				}
				break;
			case 9:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum9_construction += $assessment['Assessment']['construction'];
					$sum9_breadth += $assessment['Assessment']['breadth'];
					$sum9_comprehension += $assessment['Assessment']['comprehension'];
					$sum9_reasoning += $assessment['Assessment']['reasoning'];
					$sum9_analysis += $assessment['Assessment']['analysis'];
					$sum9_poise += $assessment['Assessment']['poise'];
					$count9 += 1;
				}
				break;
			case 10:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum10_construction += $assessment['Assessment']['construction'];
					$sum10_breadth += $assessment['Assessment']['breadth'];
					$sum10_comprehension += $assessment['Assessment']['comprehension'];
					$sum10_reasoning += $assessment['Assessment']['reasoning'];
					$sum10_analysis += $assessment['Assessment']['analysis'];
					$sum10_poise += $assessment['Assessment']['poise'];
					$count10 += 1;
				}
				break;
			case 11:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum11_construction += $assessment['Assessment']['construction'];
					$sum11_breadth += $assessment['Assessment']['breadth'];
					$sum11_comprehension += $assessment['Assessment']['comprehension'];
					$sum11_reasoning += $assessment['Assessment']['reasoning'];
					$sum11_analysis += $assessment['Assessment']['analysis'];
					$sum11_poise += $assessment['Assessment']['poise'];
					$count11 += 1;
				}
				break;
			case 12:
				if (!empty($assessment['Assessment']['construction'])) {
					$sum12_construction += $assessment['Assessment']['construction'];
					$sum12_breadth += $assessment['Assessment']['breadth'];
					$sum12_comprehension += $assessment['Assessment']['comprehension'];
					$sum12_reasoning += $assessment['Assessment']['reasoning'];
					$sum12_analysis += $assessment['Assessment']['analysis'];
					$sum12_poise += $assessment['Assessment']['poise'];
					$count12 += 1;
				}
				break;				
			case '13+':
				if (!empty($assessment['Assessment']['construction'])) {
					$sum13_construction += $assessment['Assessment']['construction'];
					$sum13_breadth += $assessment['Assessment']['breadth'];
					$sum13_comprehension += $assessment['Assessment']['comprehension'];
					$sum13_reasoning += $assessment['Assessment']['reasoning'];
					$sum13_analysis += $assessment['Assessment']['analysis'];
					$sum13_poise += $assessment['Assessment']['poise'];
					$count13 += 1;
				}
				break;
				
				
				
			default:
			
			}
		}
		$avg1_construction = $count1 == 0 ? 'NA' : round($sum1_construction / $count1, 1); 
		$avg1_breadth = $count1 == 0 ? 'NA' : round($sum1_breadth / $count1, 1); 
		$avg1_comprehension = $count1 == 0 ? 'NA' : round($sum1_comprehension / $count1, 1); 
		$avg1_reasoning = $count1 == 0 ? 'NA' : round($sum1_reasoning / $count1, 1); 
		$avg1_analysis = $count1 == 0 ? 'NA' : round($sum1_analysis / $count1, 1); 
		$avg1_poise = $count1 == 0 ? 'NA' : round($sum1_poise / $count1, 1);
		
		$avg2_construction = $count2 == 0 ? 'NA' : round($sum2_construction / $count2, 1); 
		$avg2_breadth = $count2 == 0 ? 'NA' : round($sum2_breadth / $count2, 1); 
		$avg2_comprehension = $count2 == 0 ? 'NA' : round($sum2_comprehension / $count2, 1); 
		$avg2_reasoning = $count2 == 0 ? 'NA' : round($sum2_reasoning / $count2, 1); 
		$avg2_analysis = $count2 == 0 ? 'NA' : round($sum2_analysis / $count2, 1); 
		$avg2_poise = $count2 == 0 ? 'NA' : round($sum2_poise / $count2, 1);
		
		$avg3_construction = $count3 == 0 ? 'NA' : round($sum3_construction / $count3, 1); 
		$avg3_breadth = $count3 == 0 ? 'NA' : round($sum3_breadth / $count3, 1); 
		$avg3_comprehension = $count3 == 0 ? 'NA' : round($sum3_comprehension / $count3, 1); 
		$avg3_reasoning = $count3 == 0 ? 'NA' : round($sum3_reasoning / $count3, 1); 
		$avg3_analysis = $count3 == 0 ? 'NA' : round($sum3_analysis / $count3, 1); 
		$avg3_poise = $count3 == 0 ? 'NA' : round($sum3_poise / $count3, 1);
		
		$avg4_construction = $count4 == 0 ? 'NA' : round($sum4_construction / $count4, 1); 
		$avg4_breadth = $count4 == 0 ? 'NA' : round($sum4_breadth / $count4, 1); 
		$avg4_comprehension = $count4 == 0 ? 'NA' : round($sum4_comprehension / $count4, 1); 
		$avg4_reasoning = $count4 == 0 ? 'NA' : round($sum4_reasoning / $count4, 1); 
		$avg4_analysis = $count4 == 0 ? 'NA' : round($sum4_analysis / $count4, 1); 
		$avg4_poise = $count4 == 0 ? 'NA' : round($sum4_poise / $count4, 1);
		
		$avg5_construction = $count5 == 0 ? 'NA' : round($sum5_construction / $count5, 1); 
		$avg5_breadth = $count5 == 0 ? 'NA' : round($sum5_breadth / $count5, 1); 
		$avg5_comprehension = $count5 == 0 ? 'NA' : round($sum5_comprehension / $count5, 1); 
		$avg5_reasoning = $count5 == 0 ? 'NA' : round($sum5_reasoning / $count5, 1); 
		$avg5_analysis = $count5 == 0 ? 'NA' : round($sum5_analysis / $count5, 1); 
		$avg5_poise = $count5 == 0 ? 'NA' : round($sum5_poise / $count5, 1);
		
		$avg6_construction = $count6 == 0 ? 'NA' : round($sum6_construction / $count6, 1); 
		$avg6_breadth = $count6 == 0 ? 'NA' : round($sum6_breadth / $count6, 1); 
		$avg6_comprehension = $count6 == 0 ? 'NA' : round($sum6_comprehension / $count6, 1); 
		$avg6_reasoning = $count6 == 0 ? 'NA' : round($sum6_reasoning / $count6, 1); 
		$avg6_analysis = $count6 == 0 ? 'NA' : round($sum6_analysis / $count6, 1); 
		$avg6_poise = $count6 == 0 ? 'NA' : round($sum6_poise / $count6, 1);
		
		$avg7_construction = $count7 == 0 ? 'NA' : round($sum7_construction / $count7, 1); 
		$avg7_breadth = $count7 == 0 ? 'NA' : round($sum7_breadth / $count7, 1);
		$avg7_comprehension = $count7 == 0 ? 'NA' : round($sum7_comprehension / $count7, 1); 
		$avg7_reasoning = $count7 == 0 ? 'NA' : round($sum7_reasoning / $count7, 1); 
		$avg7_analysis = $count7 == 0 ? 'NA' : round($sum7_analysis / $count7, 1); 
		$avg7_poise = $count7 == 0 ? 'NA' : round($sum7_poise / $count7, 1);
		
		$avg8_construction = $count8 == 0 ? 'NA' : round($sum8_construction / $count8, 1); 
		$avg8_breadth = $count8 == 0 ? 'NA' : round($sum8_breadth / $count8, 1); 
		$avg8_comprehension = $count8 == 0 ? 'NA' : round($sum8_comprehension / $count8, 1); 
		$avg8_reasoning = $count8 == 0 ? 'NA' : round($sum8_reasoning / $count8, 1); 
		$avg8_analysis = $count8 == 0 ? 'NA' : round($sum8_analysis / $count8, 1); 
		$avg8_poise = $count8 == 0 ? 'NA' : round($sum8_poise / $count8, 1);
		
		$avg9_construction = $count9 == 0 ? 'NA' : round($sum9_construction / $count9, 1); 
		$avg9_breadth = $count9 == 0 ? 'NA' : round($sum9_breadth / $count9, 1); 
		$avg9_comprehension = $count9 == 0 ? 'NA' : round($sum9_comprehension / $count9, 1); 
		$avg9_reasoning = $count9 == 0 ? 'NA' : round($sum9_reasoning / $count9, 1); 
		$avg9_analysis = $count9 == 0 ? 'NA' : round($sum9_analysis / $count9, 1); 
		$avg9_poise = $count9 == 0 ? 'NA' : round($sum9_poise / $count9, 1);
		
		$avg10_construction = $count10 == 0 ? 'NA' : round($sum10_construction / $count10, 1); 
		$avg10_breadth = $count10 == 0 ? 'NA' : round($sum10_breadth / $count10, 1); 
		$avg10_comprehension = $count10 == 0 ? 'NA' : round($sum10_comprehension / $count10, 1); 
		$avg10_reasoning = $count10 == 0 ? 'NA' : round($sum10_reasoning / $count10, 1); 
		$avg10_analysis = $count10 == 0 ? 'NA' : round($sum10_analysis / $count10, 1); 
		$avg10_poise = $count10 == 0 ? 'NA' : round($sum10_poise / $count10, 1);
		
		$avg11_construction = $count11 == 0 ? 'NA' : round($sum11_construction / $count11, 1); 
		$avg11_breadth = $count11 == 0 ? 'NA' : round($sum11_breadth / $count11, 1); 
		$avg11_comprehension = $count11 == 0 ? 'NA' : round($sum11_comprehension / $count11, 1); 
		$avg11_reasoning = $count11 == 0 ? 'NA' : round($sum11_reasoning / $count11, 1); 
		$avg11_analysis = $count11 == 0 ? 'NA' : round($sum11_analysis / $count11, 1); 
		$avg11_poise = $count11 == 0 ? 'NA' : round($sum11_poise / $count11, 1);
		
		$avg12_construction = $count12 == 0 ? 'NA' : round($sum12_construction / $count12, 1); 
		$avg12_breadth = $count12 == 0 ? 'NA' : round($sum12_breadth / $count12, 1); 
		$avg12_comprehension = $count12 == 0 ? 'NA' : round($sum12_comprehension / $count12, 1); 
		$avg12_reasoning = $count12 == 0 ? 'NA' : round($sum12_reasoning / $count12, 1); 
		$avg12_analysis = $count12 == 0 ? 'NA' : round($sum12_analysis / $count12, 1); 
		$avg12_poise = $count12 == 0 ? 'NA' : round($sum12_poise / $count12, 1);
		
		$avg13_construction = $count13 == 0 ? 'NA' : round($sum13_construction / $count13, 1); 
		$avg13_breadth = $count13 == 0 ? 'NA' : round($sum13_breadth / $count13, 1); 
		$avg13_comprehension = $count13 == 0 ? 'NA' : round($sum13_comprehension / $count13, 1); 
		$avg13_reasoning = $count13 == 0 ? 'NA' : round($sum13_reasoning / $count13, 1);
		$avg13_analysis = $count13 == 0 ? 'NA' : round($sum13_analysis / $count13, 1); 
		$avg13_poise = $count13 == 0 ? 'NA' : round($sum13_poise / $count13, 1);
		
		$data = array();
		for ($i = 1;$i < 14; $i++) {
		$construction = "avg{$i}_construction";
		$breadth = "avg{$i}_breadth";
		$comprehension = "avg{$i}_comprehension";
		$reasoning = "avg{$i}_reasoning";
		$analysis = "avg{$i}_analysis";
		$poise = "avg{$i}_poise";
		$count = "count{$i}";
		$data[] = array('Average' => array('id' => $i, 'grade' => $i, 'construction' => $$construction, 'breadth' => $$breadth, 'comprehension' => $$comprehension, 'reasoning' => $$reasoning, 'analysis' => $$analysis, 'poise' => $$poise, 'count' => $$count));
		}
		
		$this->Average->saveMany($data);
		$this->set(compact(
		'avg1_construction',
		'avg1_breadth', 
		'avg1_comprehension',
		'avg1_reasoning', 
		'avg1_analysis',
		'avg1_poise',
		'avg2_construction',
		'avg2_breadth', 
		'avg2_comprehension',
		'avg2_reasoning', 
		'avg2_analysis',
		'avg2_poise',		
		'avg3_construction',
		'avg3_breadth', 
		'avg3_comprehension',
		'avg3_reasoning', 
		'avg3_analysis',
		'avg3_poise',		
		'avg4_construction',
		'avg4_breadth', 
		'avg4_comprehension',
		'avg4_reasoning', 
		'avg4_analysis',
		'avg4_poise',
		'avg5_construction',
		'avg5_breadth', 
		'avg5_comprehension',
		'avg5_reasoning', 
		'avg5_analysis',
		'avg5_poise',
		'avg6_construction',
		'avg6_breadth', 
		'avg6_comprehension',
		'avg6_reasoning', 
		'avg6_analysis',
		'avg6_poise',
		'avg7_construction',
		'avg7_breadth', 
		'avg7_comprehension',
		'avg7_reasoning', 
		'avg7_analysis',
		'avg7_poise',
		'avg8_construction',
		'avg8_breadth', 
		'avg8_comprehension',
		'avg8_reasoning', 
		'avg8_analysis',
		'avg8_poise',
		'avg9_construction',
		'avg9_breadth', 
		'avg9_comprehension',
		'avg9_reasoning', 
		'avg9_analysis',
		'avg9_poise',
		'avg10_construction',
		'avg10_breadth', 
		'avg10_comprehension',
		'avg10_reasoning', 
		'avg10_analysis',
		'avg10_poise',
		'avg11_construction',
		'avg11_breadth', 
		'avg11_comprehension',
		'avg11_reasoning', 
		'avg11_analysis',
		'avg11_poise',
		'avg12_construction',
		'avg12_breadth', 
		'avg12_comprehension',
		'avg12_reasoning', 
		'avg12_analysis',
		'avg12_poise',
		'avg13_construction',
		'avg13_breadth', 
		'avg13_comprehension',
		'avg13_reasoning', 
		'avg13_analysis',
		'avg13_poise',
		'count1', 'count2', 'count3', 'count4', 'count5', 'count6', 'count7', 'count8', 'count9', 'count10', 'count11', 'count12', 'count13'
		));
	}


	public function isAuthorized($user) {
		if ($user['status'] === 'super') {
			return true;
		}

		return false;
	
	}


	
}