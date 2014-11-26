<?php echo $this->element('applicant_menu'); ?>
<div class="data-form">
	<div id="tabs">
		<ul>
			<?php foreach ($applicants as $ind => $applicant): ?> 
			<li><a href="<?php echo '#tabs-' . $applicant['Profile']['id']; ?>"><?php echo $applicant['Profile']['last_name'] . ' ' . $applicant['Profile']['first_name']; ?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php foreach ($applicants as $ind => $applicant): ?>
	<div id="<?php echo 'tabs-' . $applicant['Profile']['id']; ?>">
		<?php echo $this->element('applicant_form', array('applicant' => $applicant)); ?> 
	</div>	
<?php endforeach; ?> <?php unset($applicants); ?>
</div>
</div> <!-- end of data-form -->
<?php echo $this->Html->script(array('forms')); ?>
<script>
$(function() {
	var content = [];
	$("#tabs").tabs({
		activate: function(event, ui) {
			var oldId = $(ui.oldPanel).attr('id').split('-');
			var newId = $(ui.newPanel).attr('id').split('-');
			content[oldId[1]] = $(ui.oldPanel).html();
			if (content[newId[1]]) {
				$(ui.newPanel).html(content[newId[1]]);
			}
			$(ui.oldPanel).html('');
		}
	});
	var index = "<?php echo $_SESSION['tabId']?>";
	$('#tabs').tabs( "option", "active", index + 1);
});
</script>