
<?php echo $this->element('admin_menu'); ?>
<div class="data-form"> 
	<table class="table table-hover"> 
		<thead>
			<tr> 
				<th>Entreprise</th>
				<th>Page modifiée</th>
				<th>Champs modifié</th>
				<th>Date et heure</th>
				<th>Modifiée par</th>
				<th>Ancienne valeur</th>
				<th>Nouvelle valeur</th>
				<th>Fichier Ajouté</th>
				<th>Valider</th>
				<th>Refuser</th>
				<th>Archiver</th>
			</tr> 
		</thead>
		<tbody>
			<?php 
			$page = array_search(true, $pages);
			$max = (($itemPerPage * $page - 1) < count($data) - 1) ? ($itemPerPage * $page - 1) : count($data) - 1;
			?>
			<?php for ($i = ($page - 1) * $itemPerPage; $i <= $max; ++$i): ?>
			<tr class="<?php echo ($i % 2) ? 'colored' : 'uncolored' ?>">
				<td><?php echo $data[$i]['Applicant']['Company']['name']; ?></td>
				<td><?php echo $data[$i]['Notification']['table_name']; ?></td>
				<td><?php echo $data[$i]['Notification']['field_name']; ?></td>
				<td><?php echo date("d-m-Y", strtotime($data[$i]['Notification']['updated_date'])); ?></td>
				<td><?php echo $data[$i]['Applicant']['Profile']['first_name'] . " " .  $data[$i]['Applicant']['Profile']['last_name']; ?></td>
				<td><?php echo $data[$i]['Notification']['old_value']; ?></td>
				<td><?php echo $data[$i]['Notification']['new_value']; ?></td>
				<?php if (!empty($data[$i]['Notification']['file'])): ?>
				<?php $tmp = explode("||", $data[$i]['Notification']['file']); ?>
				<td><?php echo $this->Html->link($tmp[1], $tmp[0] . '/' . $tmp[1], array('class' => 'file_link', 'target' => '_blank')); ?></td>
				<td><?php echo $this->Form->postLink(
					'<span class="glyphicon glyphicon-ok"></span>',
					array('action' => 'allow', $data[$i]['Notification']['id']),
					array('escape' => false, 'confirm' => 'Etes-vous sûr de vouloir valider cette notification ?'));
					?></td>
					<td><?php echo $this->Form->postLink(
						'<span class="glyphicon glyphicon-remove"></span>',
						array('action' => 'deny', $data[$i]['Notification']['id']),
						array('escape' => false, 'confirm' => 'Etes-vous sûr de vouloir refuser cette notification ?'));
						?></td>

					<?php else: ?>
					<td><?php echo 'Aucun'; ?></td>
					<td><?php echo '/'; ?></td>
					<td><?php echo '/'; ?></td>
				<?php endif; ?>
				<td><?php echo $this->Form->postLink(
					'<span class="glyphicon glyphicon-trash"></span>',
					array('action' => 'delete', $data[$i]['Notification']['id']),
					array('escape' => false, 'confirm' => 'Etes-vous sûr de vouloir archiver cette notification ?'));
					?></td>
				<?php endfor; ?> <?php unset($data); ?>
			</tbody>
		</table>
		<ul class="pagination">
			<li><?php echo $this->Html->link('&laquo', array('action' => 'index', array_search(true, $pages) - 1 ), array('escape' => false)); ?></li> 
			<?php foreach ($pages as $ind => $is_page): ?>
			<li class="<?php echo ($is_page) ? 'active' : 'inactive'; ?>"> 
				<?php echo $this->Html->link($ind . '<span class="sr-only">(current)</span>', array('action' => 'index', $ind), array('escape' => false)); ?>
			</li>
		<?php endforeach; ?>
		<li><?php echo $this->Html->link('&raquo', array('action' => 'index', array_search(true, $pages) + 1), array('escape' => false)); ?></li>
	</ul>
</div> <!-- end of data-form -->
<?php echo $this->Html->script(array('notifications')); ?>