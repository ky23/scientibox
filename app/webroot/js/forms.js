 $(function() {
 	if ($('input[type="file"]')) {
 		$('input[type="file"]').inputfile({
 			uploadText: '<span class="glyphicon glyphicon-upload"></span> Ajouter un fichier',
 			removeText: '<span class="glyphicon glyphicon-trash"></span>',
 			restoreText: '<span class="glyphicon glyphicon-remove"></span>',
 			uploadButtonClass: 'btn btn-primary',
 			removeButtonClass: 'btn btn-default'
 		});
 	}

 	if ($('#account').is(':checked')) {
 		$('#associates-convention').css('visibility', 'visible');
 	}

 	$('#account, #capital').click(function() {
 		if ($(this).attr('id') == 'account') {
 			var isChecked = $(this).is(':checked');
 			var checkbox = $('#associates-convention');
 			(isChecked) ? checkbox.css('visibility', 'visible') : checkbox.css('visibility', 'hidden');
 		}
 		if (!$('#account, #capital').is(':checked')) {
 			$('#capital').prop('checked', true);
 		}
 	});

 	$('.upload-button-remove').click(function() {
 		var parent = $(this).parent().parent('.inputfile');
 		validates($(parent).find('input[type="file"]'));
 	});

 	$('form * input:not([type="submit"]').each(function() {
 		validates(this);
 		$(this).change(function() {
 			console.log(this);
 			validates(this);
 		});
 	});

 	$('form').bind('submit', function(e) {
 		var errors = $('form').find('.error-message').length;
 		if (errors == 0) {
 			return true;
 		} else {
 			e.preventDefault();
 			alert('Veuillez corriger les informations incorrectes');
 		}
 	});
 });

 function validates(object) {
 	console.log('data%5B' + $('form').attr('id') + '%5D%5B' + $(object).attr('id') + '%5D=' + value + '&data%5BModel%5D%=' + $('form').attr('id'));
 	var value = $(object).attr('value');
 	if ($(object).attr('id') == 'creation_date' || $(object).attr('id') == 'birthdate') {
 		var date = value.split('-');
 		if (parseInt(date[2]) <= new Date().getFullYear()) {
 			value = date[2] + '-' + date[1] + '-' + date[0];
 		}
 	}
 	$.ajax({
 		type: 'POST',
 		url: "/scientibox/validator/validates",
 		dataType: 'json',
 		data: 'data%5B' + $('form').attr('id') + '%5D%5B' + $(object).attr('id') + '%5D=' + value + '&data%5BModel%5D%=' + $('form').attr('id'),
 		success: function(response) {
 			// console.log('data%5B' + $('form').attr('id') + '%5D%5B' + $(object).attr('id') + '%5D=' + value + '&data%5BModel%5D%=' + $('form').attr('id'));
 			// console.log(response);
 			if (jQuery.isEmptyObject(response)) {
 				$(object).removeClass('error');
 				$(object).parent().find('.error-message').remove('.error-message');
 			} else {
 				$(object).addClass('error');
 				$(object).parent().find('.error-message').remove('.error-message');
 				$("<div class=\"error-message\">" + response[$(object).attr('id')][0] + "</div>").insertAfter($(object));
 			}
 		},
 		error: function() {
 			console.log('failed to send ajax request');
 		}
 	});
 }