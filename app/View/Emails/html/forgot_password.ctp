<p> 
	<strong>Bonjour,<br></strong>
</p>
<p><br>Un compte correspondant l'adresse email suivante a fait une demande de changement de mot de passe sur la plateforme <?php echo $this->Html->link('Scientibox', $this->Html->url(array('controller' => 'main', 'action' => 'index'), true)); ?> :<br>
	<?php echo $username; ?><br></p>
<p> 
	Pour changer votre mot de passe, veuillez cliquer sur le lien ci-dessous :<br>
	<?php echo $this->Html->link('Changer mon mot de passe', $this->Html->url($link, true)); ?>
</p>
<p>
	<br><strong>Veuillez ne pas répondre à ce mail automatique.</strong>
</p>