<?php echo $this->element('admin_menu'); ?>
<div class="data-form"> 
	<?php echo $this->element('company_menu'); ?>
	<h3>Informations des demandeurs</h3>
	<div id="applicants">
		<?php foreach ($Applicants as $key => $value): ?>
		<h2><?php echo $value['Profile']['first_name'] . ' ' . $value['Profile']['last_name']; ?></h2>
		<div>
			<table class="table table-hover" id="company"> 
				<thead>
					<tr> 
						<th>Donnée</th>
						<th>Valeur</th>
						<th>Statut</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($value['Profile'] as $key => $item): ?>
					<tr>
						<td><?php echo $key; ?></td>
						<td><?php echo $item; ?></td>
						<?php if (isset($item) && !empty($item)): ?>
						<td><div class="custom"><span class="glyphicon glyphicon-ok"></span></div></td>
					<?php else: ?>
					<td><div class="custom"><span class="glyphicon glyphicon-remove"></span></div></td>
				<?php endif; ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
<?php endforeach; ?>
</div>
</div>
<script> 
$(function() {
    $( "#applicants" ).accordion({collapsible: true, active: false});
  });
</script>