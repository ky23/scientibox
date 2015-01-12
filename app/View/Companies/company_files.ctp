<?php echo $this->element('Menus/admin_menu'); ?>
<div class="data-form"> 
	<?php echo $this->element('Menus/company_menu'); ?>
	<div class="company">
		<h3>Documents de la société</h3>
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
				<?php foreach ($Files as $key => $value): ?>
				<tr>
					<td><?php echo Configure::read('Dictionary.' . $value['File']['type']); ?></td>
					<td><?php echo $this->Html->link($value['File']['name'],
						$value['File']['path'] . $value['File']['name'],
						array('class' => 'file_link', 'target' => '_blank')); ?></td>
					<?php if ($value['File']['is_valid']): ?>
					<td><div class="custom"><span class="glyphicon glyphicon-ok"></span></div></td>
				<?php else: ?>
				<td><div class="custom"><span class="glyphicon glyphicon-remove"></span></div></td>
			<?php endif; ?>
			<td><span class="glyphicon glyphicon-ok allow" id="<?php echo $value['File']['id']; ?>"></span></td>
			<td><span class="glyphicon glyphicon-remove deny" id="<?php echo $value['File']['id']; ?>"></span></td>
		</tr>
	<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
<?php echo $this->Html->script(array('file-validator')); ?>