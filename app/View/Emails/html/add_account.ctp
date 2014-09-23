<p> 
	<strong>Bonjour,<br></strong>
</p>
<p><br>Un compte correspondant l'adresse email suivante a été ajouté à la plateforme <?php echo $this->Html->link('Scientibox', $this->Html->url(array('controller' => 'main', 'action' => 'index'), true)); ?> :<br></p>

<p><strong>Username : <strong><?php echo $username; ?></strong></strong></p>

<p><strong>Password : <strong><?php echo $password; ?></strong></strong></p>

<p> 
	Pour activer ce compte veuillez cliquer sur le lien ci-dessous :<br>
	<?php echo $this->Html->link('Activer mon compte', $this->Html->url($link, true)); ?>
</p>

<p> 
	<br><strong>Veuillez ne pas répondre à ce mail automatique.</strong>
</p>