<div id="notifs_menu">
	<ul> 
	<li class="<?php echo ($this->params['action'] == 'authentication_notifs') ? 'active' : '' ?>">
		<?php echo $this->Html->link('<span>Connexion/Inscription</span>',
		array('action' => 'authentication_notifs'), array('escape' => false)); ?>
	</li>
	<li class="<?php echo ($this->params['action'] == 'file_notifs') ? 'active' : '' ?>">
		<?php echo $this->Html->link('<span>Documents</span>',
		array('action' => 'file_notifs'), array('escape' => false)); ?>
	</li>
	<li class="<?php echo ($this->params['action'] == 'information_notifs') ? 'active' : '' ?>">
		<?php echo $this->Html->link('<span>Informations</span>',
		array('action' => 'information_notifs'), array('escape' => false)); ?>
	</li>
	<li class="last <?php echo ($this->params['action'] == 'payement_notifs') ? 'active' : '' ?>">
		<?php echo $this->Html->link('<span>Paiements</span>',
		array('action' => 'payement_notifs'), array('escape' => false)); ?>
	</li>
</ul>
</div>
