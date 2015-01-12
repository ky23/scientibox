<?php echo $this->element('Menus/admin_menu'); ?>
<div class="data-form">
	<?php echo $this->element('company_search'); ?>
	<?php echo $this->element('Menus/notification_menu'); ?>
	<h2>Documents</h2>
	<div id="files">
		<?php  echo $this->Form->create('File',
		array('url' => array('controller' => 'notifications', 'action' => 'delete'))); ?>
		<table class="table table-hover"> 
			<thead>
				<tr>
					<th><input type="checkbox" name="toDelete[]" onchange="checkAll(this)"></th>
					<th class="sortable" data-sort="string">Société</th>
					<th class="sortable" data-sort="string">Demandeur</th>
					<th>Date et heure</th>
					<th class="sortable" data-sort="string">Catégorie</th>
					<th class="sortable" data-sort="string">Intitulé</th>
					<th class="sortable" data-sort="string">Nom du fichier</th>
				</tr> 
			</thead>
			<tbody>
				<?php 
				$itemPerPage = Configure::read('ItemPerPage');
				$page = array_search(true, $pages);
				$max = (($itemPerPage * $page - 1) < count($data) - 1) ?
				($itemPerPage * $page - 1) : count($data) - 1;
				for ($i = ($page - 1) * $itemPerPage; $i <= $max; ++$i): ?>
				<tr class="<?php echo ($i % 2) ? 'colored' : 'uncolored' ?>">
					<td><input type="checkbox" name="toDelete[]" value ="<?php echo $data[$i]['id'];?>" hiddenField = "false"></td>
					<td class="company_name"><?php echo $data[$i]['Company']; ?></td>
					<td><?php echo $data[$i]['Applicant']; ?></td>
					<td><?php echo $data[$i]['date']; ?></td>
					<td><?php echo $data[$i]['category']; ?></td>
					<td><?php echo $data[$i]['type']; ?></td>
					<td><?php echo $this->Html->link($data[$i]['name'],
						$data[$i]['path'] . $data[$i]['name'],
						array('class' => 'file_link', 'target' => '_blank')); ?></td>
					</tr>
				<?php endfor; ?>
			</tbody>
		</table>
		<ul class="pagination">
			<li><?php echo $this->Html->link('&laquo', array('action' => 'file_notifs',
			array_search(true, $pages) - 1), array('escape' => false)); ?></li> 
			<?php foreach ($pages as $ind => $is_page): ?>
			<li class="<?php echo ($is_page) ? 'active' : 'inactive'; ?>"> 
				<?php echo $this->Html->link($ind . '<span class="sr-only">(current)</span>',
				array('action' => 'file_notifs', $ind), array('escape' => false)); ?>
			</li>
		<?php endforeach; ?>
		<li><?php echo $this->Html->link('&raquo', array('action' => 'file_notifs',
		array_search(true, $pages) + 1), array('escape' => false)); ?></li>
	</ul>
	<input type="hidden" name="model" value ="File">
	<?php echo $this->Form->end(array(
		'label' => 'Archiver',
		'id' => 'next-button'
		)); ?>
	</div>
</div> <!-- end of data-form -->