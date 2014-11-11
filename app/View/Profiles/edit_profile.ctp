<?php echo $this->element('applicant_menu'); ?>
<div class="data-form">
<div id="tabs">
	<ul>
		<?php foreach ($applicants as $ind => $applicant): ?> 
		<li><a href="<?php echo '#tabs-' . $ind; ?>"><?php echo $applicant['Profile']['last_name'] . $applicant['Profile']['first_name']; ?></a></li>
	<?php endforeach; ?>
</ul>
<?php foreach ($applicants as $ind => $applicant): ?>
	<div id="<?php echo 'tabs-' . $ind; ?>">
		<?php echo $this->element('applicant_form'); ?>
	</div>	
<?php endforeach; ?> <?php unset($applicants); ?>
</div>
</div> <!-- end of data-form -->
<?php echo $this->Html->script(array('forms')); ?>
<script>
$(function() {
	$( "#tabs" ).tabs();
});
</script>