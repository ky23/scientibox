<?php echo $this->element('admin_menu'); ?>
<div class="data-form"> 
	<?php echo $this->element('company_menu'); ?>
	<h3>Documents des demandeurs</h3>
	<div id="applicants">
		<?php foreach ($Files as $key => $value): ?>
		<h2><?php echo $value['Profile']['first_name'] . ' ' . $value['Profile']['last_name']; ?></h2>
		<div>
			<table class="table table-hover" id="company"> 
				<thead>
					<tr> 
						<th>Fichier</th>
						<th>Nom</th>
						<th>Statut</th>
						<th>Valider</th>
						<th>Refuser</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($value['Files'] as $key => $item): ?>
					<tr>
						<td><?php echo $item['type']; ?></td>
						<td><?php echo $this->Html->link($item['name'],
						$_SERVER['HTTP_HOST'] . '/scientibox/' . $item['path'] . $item['name'],
						array('class' => 'file_link', 'target' => '_blank', 'fullBase' => false)); ?></td>
						<?php if ($item['is_valid']): ?>
						<td><div class="custom"><span class="glyphicon glyphicon-ok"></span></div></td>
					<?php else: ?>
					<td><div class="custom"><span class="glyphicon glyphicon-remove"></span></div></td>
				<?php endif; ?>
				<td><span class="glyphicon glyphicon-ok allow" id="<?php echo $item['id']; ?>"></span></td>
				<td><span class="glyphicon glyphicon-remove deny" id="<?php echo $item['id']; ?>"></span></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
<?php endforeach; ?>
</div>
</div>
<?php echo $this->Html->script(array('file-validator')); ?>
