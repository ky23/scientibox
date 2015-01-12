 $(function() {
 	var dialogReport = $('#dialog-report').dialog({
 		autoOpen: false,
 		modal: true,
 		buttons: [{
 			text: "Valider",
 			click: function() {
 				$(this).dialog( "close" );
 			}
 		}],
 		close: function() {
 		}
 	});

 	if ($('input[type="file"]')) {
 		$('input[type="file"]').inputfile({
 			uploadText: '<span class="glyphicon glyphicon-upload"></span> Ajouter un fichier',
 			removeText: '<span class="glyphicon glyphicon-trash"></span>',
 			restoreText: '<span class="glyphicon glyphicon-remove"></span>',
 			uploadButtonClass: 'btn btn-primary',
 			removeButtonClass: 'btn btn-default'
 		});
 	}

 	if ($('#legal_status, #social_situation').val() == 'Autre') {
 		$('#other').css("visibility", "visible");
 	} else {
 		$('#other').css("visibility", "hidden");
 	}

 	$('#legal_status, #social_situation').click(function() {
 		if ($(this).val() == 'Autre') {
 			$('#other').css("visibility", "visible");
 		} else {
 			$('#other').css("visibility", "hidden");
 		}
 	});

 	if ($('#is_bs_closed1').is(':checked')) {
 		$('#report-date').css("visibility", "visible");
 		$('#report-value').css("visibility", "visible");
 	} else if ($('#is_bs_closed0').is(':checked')) {
 		$('#report-date').css("visibility", "hidden");
 		$('#report-value').css("visibility", "hidden");
 	}

 	$('#is_bs_closed0, #is_bs_closed1').click(function() {
 		if ($(this).val() == '1') {
 			$('#report-date').css("visibility", "visible");
 			$('#report-value').css("visibility", "visible");
 		} else {
 			$('#report-date').css("visibility", "hidden");
 			$('#report-value').css("visibility", "hidden");
 		}
 	});


 	if ($('#is_european1').is(':checked')) {
 		$('#emplt').css("visibility", "hidden");
 	} else if ($('#is_european0').is(':checked')) {
 		$('#emplt').css("visibility", "visible");
 	}

 	$('#is_european0, #is_european1').click(function() {
 		if ($(this).val() == '1') {
 			$('#emplt').css("visibility", "hidden");
 		} else {
 			$('#emplt').css("visibility", "visible");
 		}
 	});

 	if ($('#is_hosted1').is(':checked')) {
 		$('#proof_home').css("visibility", "visible");
 		$('#idt_home').css("visibility", "visible");
 	} else if ($('#is_hosted0').is(':checked')) {
 		$('#proof_home').css("visibility", "hidden");
 		$('#idt_home').css("visibility", "hidden");
 	}

 	$('#is_hosted0, #is_hosted1').click(function() {
 		if ($(this).val() == '1') {
 			$('#proof_home').css("visibility", "visible");
 			$('#idt_home').css("visibility", "visible");
 		} else {
 			$('#proof_home').css("visibility", "hidden");
 			$('#idt_home').css("visibility", "hidden");
 		}
 	});

 	$('#is_positive0, #is_positive1').click(function() {
 		if ($(this).val() == '1') {
 			dialogReport.dialog('open');
 		} 
 	});

 	$('#total_shares').on("change", function() {
 		var total = $(this).val();
 		$('input[id^="shares_"]').each(function() {
 			var array = $(this).attr('id').split('_');
 			var result = $(this).val() * 100 / $('#total_shares').val();
 			$('#pourcentage_shares_' + array[1]).text(result.toFixed(2));
 		});
 	});

 	$('input[id^="shares_"]').each(function() {
 		$(this).on("change", function() {
 			var array = $(this).attr('id').split('_');
 			var result = $(this).val() * 100 / $('#total_shares').val();
 			$('#pourcentage_shares_' + array[1]).text(result.toFixed(2));
 			if (result < 5) {
 				$('#pourcentage_shares_' + array[1]).parent().css({"background-color" : "#E84C3D", "color" : "white"});
 			} else {
 				$('#pourcentage_shares_' + array[1]).parent().css({"background-color" : "#3fc380", "color" : "white"});
 			}
 		});
 	});

 	$('[id*=pourcentage_shares]').each(function() {
 		if (parseFloat($(this).text()) < 5) {
 			$(this).parent().css({"background-color" : "#E84C3D", "color" : "white"});
 		} else {
 			$(this).parent().css({"background-color" : "#3fc380", "color" : "white"});
 		}
 	});

 	$('.upload-button-remove').click(function() {
 		var parent = $(this).parent().parent('.inputfile');
 		validates($(parent).find('input[type="file"]'));
 	});

 	$('form * input:not([type="submit"]').each(function() {
 		validates(this);
 		$(this).change(function() {
 			//console.log(this);
 			validates(this);
 		});
 	});

 	$('form').bind('submit', function(e) {
 		var errors = $('form').find('.error-message').length;
 		if (!($('#terms_company').is(':checked'))) {
 			e.preventDefault();
 			alert('Veuillez cocher la case certifiant l\'exactitude des informations renseignées');
 			return false;
 		}
 		if (errors == 0) {
 			return true;
 		} else {
 			e.preventDefault();
 			alert('Veuillez corriger les informations incorrectes');
 		}
 	});
 });

 function validates(object) {
 	//console.log('data%5B' + $('form').attr('id') + '%5D%5B' + $(object).attr('id') + '%5D=' + value + '&data%5BModel%5D%=' + $('form').attr('id'));
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