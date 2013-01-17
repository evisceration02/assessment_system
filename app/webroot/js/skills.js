

var construction = { // 1

	1 : "Student demonstrates a complete lack of argumentative ability, misunderstood \
	the question or has shown an English level that is too low to be considered for the \
	Capstone Scholars course.",
	2 : "Student lacks understanding of argument construction, showing struggles with \
	both idea generation and the organization of those ideas. Student also demonstrates \
	grammatical errors that prevent a clear understanding of his/her ideas. Student \
	shows potential but will need significant effort and teaching.",
	3 : "Student demonstrates a solid understanding of argument construction, but is \
	clearly lacking in either depth or structure. Student's work shows average grasp of \
	the topic chosen but needs to improve in terms of execution. Student shows solid \
	potential but also shows clear room for improvement.",
	4 : "Student demonstrates great arguments and overall quality but needs to take his/ \
	her ideas one step further in terms of depth and/or organization. Student's work \
	shows minor organizational errors or slightly underwhelming argumentative impact. \
	Impressive overall with only a few minor hiccups.",
	5 : "Student displays excellent progression of succinct and concise arguments, \
	exhibits impressive depth and supports his/her arguments well with concrete \
	details and evidence. Student's arguments also display great organizational abilities, \
	resulting in impressive organization and clarity."
}

var breadth = { //2
	1 : "Student lacks argumentative breadth, generating only 1 unique argument \
	for the given topic. Other arguments are simply a rephrasing or extension of the \
	1st argument. Student may also show a glaring lack of logical support for their \
	arguments, or significant grammatical errors that prevent clarity in their arguments.",
	2 : "Student demonstrates a struggle with argumentative breadth and was only \
	able to generate 2 unique arguments for a given topic, with one of the arguments\
	being repeated or redundant. Student may also demonstrate a clear lack of effective \
	logical support and some grammatical errors.",
	3 : "Student demonstrates effective argumentative breadth and has clearly shown his/ \
	her ability to develop 3 unique arguments for a given topic, but showed a general \
	lack of effective logical support and evidence for his/her arguments.",
	4 : "Student demonstrates great argumentative breadth and has clearly shown his/ \
	her ability to develop 3 unique arguments for a given topic, but showed minor errors \
	or logical flaws in the evidence provided to support one of his/her arguments.",
	5 : "Student demonstrates excellent argumentative breadth and has clearly shown \
	his/her ability to develop 3 unique arguments for a given topic and support each \
	with excellent evidence."
}

var comprehension = { //3
	1 : "Student demonstrates a level of reading deficiency that generally correlates with \
	a lack of English proficiency that renders them unsuitable for the Capstone Scholars \
	Course.",
	2 : "Student demonstrates clear deficiency in reading comprehension, answering \
	Part A incorrectly. Student's response in Part B continues to show a lack of understanding, \
	resulting in an answer that does not reflect the issues raised in the \
	article and a lack of effective analysis. Response also shows a lack of structure and \
	grammatical errors that prevent clarity.",
	3 : "Student demonstrates a lack of reading comprehension and relies on direct \
	quotation and paraphrasing in his/her response. Student's response to Part B shows \
	a lack in understanding of the issues presented in the article and clear problems in \
	terms of organization and structure.",
	4 : "Student demonstrates great reading comprehension and reading ability through \
	his/her answers, using the article to structure and support his/her arguments but \
	was not able to avoid direct quotations or obvious paraphrasing. Student's response \
	in Part B shows an understanding of the issues presented in the article but shows \
	minor problems with organization and structure. Standard and average response.",
	5 : "Student demonstrates excellent reading comprehension and analytical ability \
	through his/her answers, effectively using the article to structure and support \
	his/her arguments while avoiding direct quotations. Student's response to Part B \
	shows a clear grasp of the issues presented in the article and is executed with great \
	organization and overall structure. Excellent and unique responses."
}

var reasoning = { //4
	1 : "Student demonstrates a complete lack of either comprehension or logical and \
	problem solving capabilities as he or she missed all of the questions. Additionally, \
	the lack of shown work is also indicative of a mind that is not quite at the level of \
	comprehension and logic that we expect from our students.",
	2 : "Student demonstrates a lack of logical and problem solving capabilities, missing \
	the answers for most of the questions. Additionally, the student either showed work \
	that only demonstrated a basic level of problem analysis and organization or omitted \
	to show work at all.",
	3 : "Student demonstrates logical and problem solving capabilities, correctly \
	determining the answers for some of the questions. Additionally, the framework \
	that the student has constructed in order to reach his or her conclusions displays \
	attempts at problem analysis and organization. The mistakes, though, do indicate \
	gaps in logical connections, comprehension and analysis.",
	4 : "Student demonstrates good logical reasoning and problem solving capabilities, \
	correctly determining the answers for most of the questions. Additionally, the \
	framework that the student has constructed in order to reach his or her conclusions \
	displays competent problem analysis and organizational capabilities that are \
	indicators of average logical skill.",
	5 : "Student demonstrates excellent logical reasoning and problem solving \
	capabilities, correctly determining the answers for all of the questions. Additionally, \
	the framework that the student has constructed in order to reach his or her \
	conclusions displays the superb problem analysis and organizational capabilities that \
	are indicators of above average logical skill."
}

var analysis = { //5
	1 : "Student response reveals clear struggles with language that prevented him or \
	her from understanding the questions in the first place. As a result, explanation \
	of the answer only highlights the need for the student to receive additional basic \
	English assistance before considering Capstone as an avenue for their intellectual \
	development.",
	2 : "Student's response reveals struggles in terms of both response time and \
	articulation. While answer may be correct, the explanation of the process of how \
	the student reached said answer was muddled and unclear, showing a lack of clarity \
	and organization while also demonstrating difficulty with the language competency \
	necessary for the explanation.",
	3 : "Student's response and presentation reveal potential and effort. While \
	marred by occasionally lapses in poise and the neglect of clear and obvious logical \
	connections in order to justify their answer, their response is correct and clearly \
	demonstrates the capacity to be excellent. This capacity will need to be expanded \
	and nurtured in order to really develop. A competent response that reveals clear \
	areas for improvement and development.",
	4 : "Student's response and presentation reveal a good reaction time and some \
	mental acuity. While perhaps struggling at small points throughout the response, the  \
	overall answer was smoothly delivered and logically constructed. Answer is clearly \
	explained and logical, but not exceptionally thorough in its justification. A strong \
	and detailed response that reveals the student to be quite capable as a thinker and \
	speaker.",
	5 : "Student's response and presentation reveals an excellent reaction time and \
	impressive mental acuity. Answer also shows detailed, impressive organization and \
	poise. Answer is clearly explained with attention to logic and justification. A superb \
	and thorough response that reveals the student to be a quick, structured and poised \
	thinker/speaker."
}

var poise = { //6
	1 : "Student presentation demonstrates a struggle with the English language that is \
	beyond the scope of Capstone's capacity to teach effectively. While issues of style \
	and rhetoric can be trained, lack of English competency and fluency has resulted in a \
	speech that ultimately reveals a need for more focused, specific ESL lessons before \
	enrolling in Capstone courses.",
	2 : "Student presentation demonstrates a lack of poise, confidence and preparation. \
	While content may be correct on a basic level, student clearly is missing the initial \
	elements of style necessary to create a compelling speech. There are also clear \
	struggles with the English language that also reveal themselves in this speech.", 
	3 : "Student presentation demonstrates poise and confidence with some glaring \
	areas in need of improvement (stuttering, lack of eye contact or an over-dependency \
	on notes, lack of intonation and nuance). Content of the speech reveals a basic \
	understanding of rhetoric and persuasive technique. Limited but effective diction. An \
	overall decent speech.",
	4 : "Student presentation demonstrates strong poise and confidence. Choice of \
	spoon reflects an awareness of audience. Minus a few hiccups, student's speech \
	was largely smooth and polished as far as delivery is concerned. Some struggles \
	with word choice and conceptualization are present, but are minor compared to the \
	strengths that the student has shown through his or her speech.",
	5 : "Student presentation demonstrates impressive poise and confidence. Choice of \
	spoon reflects a strong awareness of audience that is in turn reflected in student \
	decisions as far as tone and diction are concerned. Student speech is excellently \
	organized, shows smooth rhetorical flow and is ultimately powerfully persuasive." 
}

$(document).ready(function(){
	$("#AssessmentConstruction").change(function() {
	var score = $(this).children(":selected").attr("value");
	switch (score) {
		case '1':
			$("#construction").html('<h6>Argument Construction & Progression: 1</h6><p>' + construction[1] + '</p>');
			break;
		case '2':
			$("#construction").html('<h6>Argument Construction & Progression: 2</h6><p>' + construction[2] + '</p>');
			break;
		case '3':
			$("#construction").html('<h6>Argument Construction & Progression: 3</h6><p>' + construction[3] + '</p>');
			break;
		case '4':
			$("#construction").html('<h6>Argument Construction & Progression: 4</h6><p>' + construction[4] + '</p>');
			break;
		case '5':
			$("#construction").html('<h6>Argument Construction & Progression: 5</h6><p>' + construction[5] + '</p>');
			break;
		default:
		
	
	}
	var rubric = $("#rubric");
	rubric.scrollTop('0');
	});
	$("#AssessmentBreadth").change(function() {
	var score = $(this).children(":selected").attr("value");
	switch (score) {
		case '1':
			$("#breadth").html('<h6>Argument Breadth: 1</h6><p>' + breadth[1] + '</p>');
			break;
		case '2':
			$("#breadth").html('<h6>Argument Breadth: 2</h6><p>' + breadth[2] + '</p>');
			break;
		case '3':
			$("#breadth").html('<h6>Argument Breadth: 3</h6><p>' + breadth[3] + '</p>');
			break;
		case '4':
			$("#breadth").html('<h6>Argument Breadth: 4</h6><p>' + breadth[4] + '</p>');
			break;
		case '5':
			$("#breadth").html('<h6>Argument Breadth: 5</h6><p>' + breadth[5] + '</p>');
			break;
		default:
	}
	var rubric = $("#rubric");
	rubric.scrollTop('0');
	});
	$("#AssessmentComprehension").change(function() {
	var score = $(this).children(":selected").attr("value");
	switch (score) {
		case '1':
			$("#comprehension").html('<h6>Reading Comprehension & Analysis: 1</h6><p>' + comprehension[1] + '</p>');
			break;
		case '2':
			$("#comprehension").html('<h6>Reading Comprehension & Analysis: 2</h6><p>' + comprehension[2] + '</p>');
			break;
		case '3':
			$("#comprehension").html('<h6>Reading Comprehension & Analysis: 3</h6><p>' + comprehension[3] + '</p>');
			break;
		case '4':
			$("#comprehension").html('<h6>Reading Comprehension & Analysis: 4</h6><p>' + comprehension[4] + '</p>');
			break;
		case '5':
			$("#comprehension").html('<h6>Reading Comprehension & Analysis: 5</h6><p>' + comprehension[5] + '</p>');
			break;
		default:
	}
	//var rubric = $("#rubric");
	//rubric.scrollTop(rubric[0].scrollHeight);
	});
	$("#AssessmentReasoning").change(function() {
	var score = $(this).children(":selected").attr("value");
	switch (score) {
		case '1':
			$("#reasoning").html('<h6>Logical Reasoning & Problem Solving: 1</h6><p>' + reasoning[1] + '</p>');
			break;
		case '2':
			$("#reasoning").html('<h6>Logical Reasoning & Problem Solving: 2</h6><p>' + reasoning[2] + '</p>');
			break;
		case '3':
			$("#reasoning").html('<h6>Logical Reasoning & Problem Solving: 3</h6><p>' + reasoning[3] + '</p>');
			break;
		case '4':
			$("#reasoning").html('<h6>Logical Reasoning & Problem Solving: 4</h6><p>' + reasoning[4] + '</p>');
			break;
		case '5':
			$("#reasoning").html('<h6>Logical Reasoning & Problem Solving: 5</h6><p>' + reasoning[5] + '</p>');
			break;
		default:
	}
	var rubric = $("#rubric");
	rubric.scrollTop(rubric[0].scrollHeight);
	});
	$("#AssessmentAnalysis").change(function() {
	var score = $(this).children(":selected").attr("value");
	switch (score) {
		case '1':
			$("#analysis").html('<h6>Verbal Analysis & Exposition: 1</h6><p>' + analysis[1] + '</p>');
			break;
		case '2':
			$("#analysis").html('<h6>Verbal Analysis & Exposition: 2</h6><p>' + analysis[2] + '</p>');
			break;
		case '3':
			$("#analysis").html('<h6>Verbal Analysis & Exposition: 3</h6><p>' + analysis[3] + '</p>');
			break;
		case '4':
			$("#analysis").html('<h6>Verbal Analysis & Exposition: 4</h6><p>' + analysis[4] + '</p>');
			break;
		case '5':
			$("#analysis").html('<h6>Verbal Analysis & Exposition: 5</h6><p>' + analysis[5] + '</p>');
			break;
		default:
		
	
	}
	var rubric = $("#rubric");
	rubric.scrollTop(rubric[0].scrollHeight);
	});
	$("#AssessmentPoise").change(function() {
	var score = $(this).children(":selected").attr("value");
	switch (score) {
		case '1':
			$("#poise").html('<h6>Poise & Persuasion: 1</h6><p>' + poise[1] + '</p>');
			break;
		case '2':
			$("#poise").html('<h6>Poise & Persuasion: 2</h6><p>' + poise[2] + '</p>');
			break;
		case '3':
			$("#poise").html('<h6>Poise & Persuasion: 3</h6><p>' + poise[3] + '</p>');
			break;
		case '4':
			$("#poise").html('<h6>Poise & Persuasion: 4</h6><p>' + poise[4] + '</p>');
			break;
		case '5':
			$("#poise").html('<h6>Poise & Persuasion: 5</h6><p>' + poise[5] + '</p>');
			break;
		default:
		
	
	}
	var rubric = $("#rubric");
	rubric.scrollTop(rubric[0].scrollHeight);
	});

});