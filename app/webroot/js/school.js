$(document).ready(function(){
	$("#AssessmentSchool").change(function() {
	var score = $(this).children(":selected").attr("value");
	if (score == 'Other') {
		$('#AssessmentSchool').removeAttr('name');
		$('<input type="text" class="span3" id="AssessmentOther" name="data[Assessment][school]" />').insertAfter('#AssessmentSchool');
	} else {
		$('#AssessmentSchool').attr('name', 'data[Assessment][school]');
		$('#AssessmentOther').remove();
	}
	});
  
  
 
});