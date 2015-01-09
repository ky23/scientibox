<div id="btn-logout" class="btn-group" >
	<button type="button" id="admin-button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		Admin <span class="caret"></span>
	</button>
	<ul id="logged-out" class="dropdown-menu dropdown-menu-right" role="menu">
		<li> <span class="glyphicon glyphicon-cog"></span><?php echo $this->Html->link('Administration', array('controller' => 'companies', 'action' => 'index'));?></li>
		<li> <span class="glyphicon glyphicon-plus"></span><?php echo $this->Html->link('Ajouter un compte', array('controller' => 'admins', 'action' => 'add_account'));?></li>
		<li> <span class="glyphicon glyphicon-off"></span><?php echo $this->Html->link('Déconnexion', array('controller' => 'admins', 'action' => 'logout'));?></li>
	</ul>
</div> <!-- end of btn-group -->
