<?php echo $this->Form->input('Company.Search', array(
	'placeholder' => 'Nom de la société',
	'id' => 'search',
	'class' => 'form-control',
	'label' => false,
	)); ?>
<script>
$(function() {
	$('#search').on("change", function() {
		$('.company_name').each(function() {
			if ($(this).text().toLowerCase().indexOf($('#search').val()) >= 0) {
				$(this).parent().show();
			} else {
				$(this).parent().hide();
			}
		});
	});
	$(".table").stupidtable();
});
</script>