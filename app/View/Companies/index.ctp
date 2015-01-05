
<?php echo $this->element('admin_menu'); ?>
<div class="data-form"> 
	<table class="table table-hover"> 
		<thead>
			<tr> 
				<th>Société</th>
				<th>Contact</th>
				<th>Statut</th>
				<th>Visualiser</th>
				<th>Envoyer un mail</th>
				<th>Valider</th>
				<th>Refuser</th>
			</tr> 
		</thead>
		<tbody>
			<?php
			$page = array_search(true, $pages);
			$max = (($itemPerPage * $page - 1) < count($companies) - 1) ? ($itemPage * $page - 1) : count($companies) - 1;
			?>
			<?php for ($i = ($page - 1) * $itemPerPage; $i <= $max; ++$i): ?>
			<tr class="<?php echo ($i % 2) ? 'colored' : 'uncolored' ?>">
				<td><?php echo $companies[$i]['Company']['name']; ?></td>
				<td><?php echo $companies[$i]['Company']['contact']; ?></td>
				<td><?php echo $companies[$i]['Company']['status']; ?></td>
				<td><span class="glyphicon glyphicon-search" id="<?php echo $companies[$i]['Company']['id']; ?>"></span></td>
				<td><span class="glyphicon glyphicon-envelope"></span></td>
				<td><span class="glyphicon glyphicon-ok"></span></td>
				<td><span class="glyphicon glyphicon-remove" id="show"></span></td>
			</tr>
		<?php endfor; ?> <?php unset($companies); ?>
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
<?php echo $this->element('dialog_show_company'); ?>
<?php echo $this->Html->script(array('dialog-show-company')); ?>