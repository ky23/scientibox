<div id="notifs_menu">
	<ul> 
	<li class="<?php echo ($this->params['action'] == 'show_company') ? 'active' : '' ?>">
		<?php echo $this->Html->link('<span>Société</span>',
		array('action' => 'show_company'), array('escape' => false)); ?>
	</li>
	<li class="<?php echo ($this->params['action'] == 'show_applicants') ? 'active' : '' ?>">
		<?php echo $this->Html->link('<span>Demandeurs</span>',
		array('action' => 'show_applicants'), array('escape' => false)); ?>
	</li>
	<li class="<?php echo ($this->params['action'] == 'company_files') ? 'active' : '' ?>">
		<?php echo $this->Html->link('<span>Documents de la société</span>',
		array('action' => 'company_files'), array('escape' => false)); ?>
	</li>
	<li class="<?php echo ($this->params['action'] == 'applicant_files') ? 'active' : '' ?>">
		<?php echo $this->Html->link('<span>Documents des demandeurs</span>',
		array('action' => 'applicant_files'), array('escape' => false)); ?>
	</li>
</ul>
</div>
