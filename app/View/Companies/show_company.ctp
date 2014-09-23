<h3 class="company-name" id="<?php echo $company['Company']['name']; ?>"><?php echo $company['Company']['name']; ?></h3>
<div> 
	<table class="table table-hover" id="company"> 
		<thead>
			<tr> 
				<th>Donnée</th>
				<th>Valeur</th>
				<th>Statut</th>
				<th>Valider</th>
				<th>Refuser</th>
			</tr> 
		</thead>
		<tbody>
			<?php foreach ($company['Company'] as $key => $value): ?>
			<?php if ($key != 'is_kbis_file_valid' && $key != 'is_associates_file_valid'): ?>
			<tr> 
				<td><?php echo $key; ?></td>
				<?php if ($key == 'kbis_file' || $key == 'associates_file'): ?>
				<?php if (!empty($value)): ?>
				<?php $tmp = explode("||", $value); ?>
				<td><?php echo $this->Html->link($tmp[1], $tmp[0] . '/' . $tmp[1], array('class' => 'file_link', 'target' => '_blank')); ?></td>
			<?php else: ?>
			<td><?php echo $value; ?></td>
		<?php endif; ?>
		<?php if (($key == 'kbis_file' && $company['Company']['is_kbis_file_valid']) || ($key == 'associates_file' && $company['Company']['is_associates_file_valid'])): ?>
		<td><div class="custom"><span class="glyphicon glyphicon-ok"></span></div></td>
	<?php else: ?>
	<td><div class="custom"><span class="glyphicon glyphicon-remove"></span></div></td>
<?php endif; ?>
<td><span class="glyphicon glyphicon-ok allow" id="<?php echo $company['Company']['id'] . '@' . $key . '@companies'; ?>"></span></td>
<td><span class="glyphicon glyphicon-remove deny" id="<?php echo $company['Company']['id'] . '@' . $key . '@companies'; ?>"></span></td>
<?php else: ?>
	<td><?php echo $value; ?></td>
	<?php if (!empty($value)): ?>
	<td><div class="custom"><span class="glyphicon glyphicon-ok"></span></div></td>
<?php else: ?>
	<td><div class="custom"><span class="glyphicon glyphicon-remove"></span></div></td>
<?php endif; ?>
<td>/</td>
<td>/</td>
<?php endif; ?>
</tr>
<?php endif; ?>
<?php endforeach; ?><?php unset($company); ?>
</tbody>
</table>
</div>
<?php foreach ($applicants as $applicant): ?>
	<h3><?php echo $applicant['Profile']['first_name'] . ' ' . $applicant['Profile']['last_name']; ?></h3>
	<div> 
		<table class="table table-hover" id="company"> 
			<thead>
				<tr> 
					<th>Donnée</th>
					<th>Valeur</th>
					<th>Statut</th>
					<th>Valider</th>
					<th>Refuser</th>
				</tr> 
			</thead>
			<tbody>
				<?php foreach ($applicant['Profile'] as $key => $value): ?>
				<?php if ($key != 'is_identity_file_valid' && $key != 'is_home_file_valid' && $key != 'is_bank_file_valid' && $key != 'is_emplt_file_valid' && $key != 'is_terms_file_valid'): ?>
				<tr> 
					<td><?php echo $key; ?></td>
					<?php if ($key == 'identity_file' || $key == 'home_file' || $key == 'bank_file' || $key == 'emplt_file' || $key == 'terms_file'): ?>
					<?php if (!empty($value)): ?>
					<?php $tmp = explode("||", $value); ?>
					<td><?php echo $this->Html->link($tmp[1], $tmp[0] . '/' . $tmp[1], array('class' => 'file_link', 'target' => '_blank')); ?></td>
				<?php else: ?>
				<td><?php echo $value; ?></td>
			<?php endif; ?>
			<?php if (($key == 'identity_file' && $applicant['Profile']['is_identity_file_valid']) || ($key == 'home_file' && $applicant['Profile']['is_home_file_valid']) || ($key == 'bank_file' && $applicant['Profile']['is_bank_file_valid']) || ($key == 'emplt_file' && $applicant['Profile']['is_emplt_file_valid']) || ($key == 'terms_file' && $applicant['Profile']['is_terms_file_valid'])): ?>
			<td><div class="custom"><span class="glyphicon glyphicon-ok"></span></div></td>
		<?php else: ?>
		<td><div class="custom"><span class="glyphicon glyphicon-remove"></span></div></td>
	<?php endif; ?>
	<td><span class="glyphicon glyphicon-ok allow" id="<?php echo $applicant['Profile']['id'] . '@' . $key . '@profiles'; ?>"></span></td>
	<td><span class="glyphicon glyphicon-remove deny" id="<?php echo $applicant['Profile']['id'] . '@' . $key . '@profiles'; ?>"></span></td>
<?php else: ?>
	<td><?php echo $value; ?></td>
	<?php if (!empty($value)): ?>
	<td><div class="custom"><span class="glyphicon glyphicon-ok"></span></div></td>
<?php else: ?>
	<td><div class="custom"><span class="glyphicon glyphicon-remove"></span></div></td>
<?php endif; ?>
<td>/</td>
<td>/</td>
<?php endif; ?>
</tr>
<?php endif; ?>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php endforeach; ?> <?php unset($applicants); ?>