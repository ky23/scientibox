
<?php
$key = md5(uniqid(rand(), true));
CakeSession::write('Admins.key', $key);
?>

<div class="admin-forgotten">
	<div class="form-title"> 
		<h3>Mot de passe oublié</h3>
	</div> <!-- end of form-title -->
	<?php echo $this->Form->create('Admin', array(
		'id' => 'Admin',
		'class' => 'form-horizontal',
		'controller' => 'admins',
		'action' => 'forgot_password'
		));?>
		<div class="email">
			<span class="glyphicon glyphicon-user"></span>
			<?php echo $this->Form->input('Admin.username', array(
				'placeholder' => 'abc@exemple.com',
				'id' => 'email',
				'label' => false,
				'required'
				)); ?>
			</div> <!-- end of email -->
			<input type="text" style="visibility: hidden" id="key" name="key" value="<?php echo $key;?>"/>
			<?php echo $this->Form->end(array(
				'label' => 'Envoyer',
				'id' => 'button-send'
				));?>
</div> <!-- end of admin-connexion -->