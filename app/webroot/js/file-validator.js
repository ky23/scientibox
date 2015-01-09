$(function() {
	$( "#applicants" ).accordion({collapsible: true, active: false});
	$('body').on('click', '.allow', function() {
		validateFile('allow', this);
	});
	$('body').on('click', '.deny', function() {
		validateFile('deny', this);
	});
});

function validateFile(action, element) {
	$.ajax({
		type: 'POST',
		url: '/scientibox/companies/' + action,
		dataType: 'json',
		data: 'data%5BFile%5D%5Bid%5D=' + $(element).attr('id'),
		success: function(response) {
			console.log(response);
			if (response) {
				if (action == 'allow') {
					$(element).parent().parent().find('.custom').empty().append('<span class="glyphicon glyphicon-ok">');
				} else if (action == 'deny') {
					$(element).parent().parent().find('.custom').empty().append('<span class="glyphicon glyphicon-remove">');
				}
			}
		},
		error: function() {
			console.log('failed to send ajax request');
		}
	});
}