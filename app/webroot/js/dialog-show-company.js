$(function() {
	var dialog = $('#dialog-show').dialog({
		autoOpen: false,
		height: 500,
		width: 800,
		modal: true,
		close: function() {
			$('.company-infos').empty();
			$('.company-infos').accordion('destroy');
			dialog.dialog('close');
		}
	});

	$('body').on('click', '.glyphicon-search', function() {
		$.ajax({
			type: 'POST',
			url: "/scientibox/companies/show_company",
			dataType: 'html',
			data: 'data%5BCompany%5D%5Bid%5D=' + $(this).attr('id'),
			success: function(response) {
				$('.company-infos').empty().append(response);
				$('.company-infos').accordion({collapsible: true, active: false});
				dialog.dialog('option', 'title', $('.company-name').attr('id'));
			},
			error: function() {
				console.log('failed to send ajax request');
			}
		});
		dialog.dialog('open');
	});

	$('body').on('click', '.allow', function() {
		validateFile('allow', this);
	});

	$('body').on('click', '.deny', function() {
		validateFile('deny', this);
	});

});

function validateFile(action, element) {
	var array = $(element).attr('id').split('@');
	$.ajax({
		type: 'POST',
		url: '/scientibox/' + array[2] + '/' + action,
		dataType: 'json',
		data: 'data%5BCompany%5D%5Bdata%5D=' + $(element).attr('id'),
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