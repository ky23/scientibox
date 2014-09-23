<div class="admin-connexion">
	<div class="form-title"> 
		<h3>Changer le mot de passe</h3>
	</div> <!-- end of form-title --> 
	<?php echo $this->Form->create('Admin', array(
		'id' => 'Admin',
		'class' => 'form-horizontal',
		));?>
		<div class="password">
			<span class="glyphicon glyphicon-lock"></span>
			<?php echo $this->Form->input('Admin.password', array(
				'placeholder' => '******',
				'id' => 'password',
				'label' => false,
				'required'
				)); ?>
			</div> <!-- end of password -->
			<div class="password-confirm">
				<span id="lock" class="glyphicon glyphicon-lock"></span>
				<?php echo $this->Form->input('Admin.password-confirm', array(
					'type' => 'password',
					'placeholder' => '******',
					'id' => 'password-confirm',
					'label' => false,
					'required'
					)); ?>
				</div> <!-- end of password -->
				<?php echo $this->Form->end(array(
					'label' => 'Ajouter',
					'id' => 'button-login'
					));?>
</div> <!-- end of admin-connexion -->