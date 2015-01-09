<?php echo $this->element('admin_menu'); ?>
<div class="data-form">
	<?php echo $this->element('notification_menu'); ?>
	<h2>Connexion/Inscription</h2>
	<div id="connection">
		<?php  echo $this->Form->create('Authentication',
		array('url' => array('controller' => 'notifications', 'action' => 'delete'))); ?>
		<table class="table table-hover"> 
			<thead>
				<tr>
					<th><input type="checkbox" name="toDelete[]" onchange="checkAll(this)"></th>
					<th>Société</th>
					<th>Demandeur</th>
					<th>Date et heure</th>
					<th>Action</th>
					<th>Ip</th>
				</tr> 
			</thead>
			<tbody>
				<?php $page = array_search(true, $pages);
				$max = (($itemPerPage * $page - 1) < count($data) - 1) ?
				($itemPerPage * $page - 1) : count($data) - 1;
				for ($i = ($page - 1) * $itemPerPage; $i <= $max; ++$i): ?>
				<tr class="<?php echo ($i % 2) ? 'colored' : 'uncolored' ?>">
					<td><input type="checkbox" name="toDelete[]" value ="<?php echo $data[$i]['id'];?>" hiddenField = "false"></td>
					<td><?php echo $data[$i]['Company']; ?></td>
					<td><?php echo $data[$i]['Applicant']; ?></td>
					<td><?php echo $data[$i]['date']; ?></td>
					<td><?php echo $data[$i]['action']; ?></td>
					<td><?php echo $data[$i]['ip']; ?></td>
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>
	<ul class="pagination">
		<li><?php echo $this->Html->link('&laquo', array('action' => 'authentication_notifs',
		array_search(true, $pages) - 1), array('escape' => false)); ?></li> 
		<?php foreach ($pages as $ind => $is_page): ?>
		<li class="<?php echo ($is_page) ? 'active' : 'inactive'; ?>"> 
			<?php echo $this->Html->link($ind . '<span class="sr-only">(current)</span>',
			array('action' => 'authentication_notifs', $ind), array('escape' => false)); ?>
		</li>
	<?php endforeach; ?>
	<li><?php echo $this->Html->link('&raquo', array('action' => 'authentication_notifs',
	array_search(true, $pages) + 1), array('escape' => false)); ?></li>
</ul>
<input type="hidden" name="model" value ="Authentication">
<?php echo $this->Form->end(array(
	'label' => 'Archiver',
	'id' => 'next-button'
	)); ?>
</div>
</div> <!-- end of data-form -->