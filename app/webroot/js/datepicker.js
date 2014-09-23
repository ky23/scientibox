/**************************************
	Athor : khatal.yacine@gmail.com
	Scritp: datepicker
	***************************************/

	/* French initialisation for the jQuery UI date picker plugin. */
	/* Written by Keith Wood (kbwood{at}iinet.com.au) and Stéphane Nahmani (sholby@sholby.net). */
	jQuery(function($){
		$.datepicker.regional['fr'] = {
			currentText: 'Aujourd\'hui',
			monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin',
			'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
			monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun',
			'Jul','Aou','Sep','Oct','Nov','Dec'],
			dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
			dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
			dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
			weekHeader: 'Sm',
			dateFormat: 'dd-mm-yy',
			firstDay: 1,
			isRTL: false,
			showButtonPanel: false
		};
		$.datepicker.setDefaults($.datepicker.regional['fr']);
	});

	$.datepicker.setDefaults($.datepicker.regional['fr']);
	jQuery(function($) {
		$('#birthdate').datepicker({
			minDate: "-100y",
			maxDate: "-18y"
		});

		$('#creation_date').datepicker({
			maxDate: 0
		});

		$('#event_date').datepicker({
			minDate: 0
		});
	});