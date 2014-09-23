<p>
	<strong>Bonjour,<br></strong>
</p>
<p><br>Un compte correspondant l'adresse email suivante a été ajouté à la plateforme <?php echo $this->Html->link('Scientibox', $this->Html->url(array('controller' => 'main', 'action' => 'index'), true)); ?> :<br><?php echo $username; ?><br></p>
<p>
	Pour activer ce compte veuillez cliquer sur le lien ci-dessous :<br>
	 <?php //echo $this->Html->link('Accéder à la plateforme', $link); ?>
	 <a href=" <?php echo $link; ?>">Accéder à la plateforme</a>
</p>
<p>
	<br><strong>Veuillez ne pas répondre à ce mail automatique.</strong>
</p>