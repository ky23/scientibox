<?php echo $this->element('Menus/admin_menu'); ?>
<div class="data-form"> 
	<?php echo $this->element('Menus/company_menu'); ?>
	<div class="company">
		<h3>Informations de la société</h3>
		<table class="table table-hover" id="company"> 
			<thead>
				<tr> 
					<th>Donnée</th>
					<th>Valeur</th>
					<th>Statut</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($Company as $key => $value): ?>
				<tr>
					<td><?php echo Configure::read('Dictionary.' . $key); ?></td>
					<?php if (isset($value) && ($value == '1' || $value == '0')): ?>
					  <td><?php echo ($value == '1') ? 'Oui' : 'Non' ; ?></td>
					<?php if ($value == '1'): ?>
					<td><div class="custom"><span class="glyphicon glyphicon-ok"></span></div></td>
				<?php else: ?>
				<td><div class="custom"><span class="glyphicon glyphicon-remove"></span></div></td>
			<?php endif; ?>
		<?php else: ?>
		<td><?php echo $value; ?></td>
		<?php if (isset($value) && !empty($value)): ?>
		<td><div class="custom"><span class="glyphicon glyphicon-ok"></span></div></td>
	<?php else: ?>
	<td><div class="custom"><span class="glyphicon glyphicon-remove"></span></div></td>
<?php endif; ?>
<?php endif; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>