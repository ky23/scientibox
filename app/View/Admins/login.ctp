<div class="admin-connexion"> 
	<div class="form-title"> 
		<h3>Se connecter</h3>
	</div> <!-- end of form-title -->
	<?php echo $this->Form->create('Admin', array(
		'id' => 'Admin',
		'class' => 'form-horizontal',
		));?>
		<div class="email">
			<span class="glyphicon glyphicon-user"></span>
			<?php echo $this->Form->input('Admin.username', array(
				'placeholder' =>
				'abc@exemple.com',
				'id' => 'email',
				'label' => false,
				'required'
				)); ?>
			</div> <!-- end of email -->
			<div class="password">
				<span class="glyphicon glyphicon-lock"></span>
				<?php echo $this->Form->input('Admin.password', array(
					'type' => 'password',
					'placeholder' => '******',
					'id' => 'password',
					'label' => false,
					'required'
					)); ?>
				</div> <!-- end of password -->
				<div class="forgotten">
					<?php echo $this->Html->link('Mot de passe oublié ?', array(
						'controller' => 'admins',
						'action' => 'forgot_password'
						));?>
					</div> <!-- end of forgotten -->
					<?php echo $this->Form->end(array(
						'label' => 'Connexion',
						'id' => 'button-login'
						));?>
</div> <!-- end of admin-connexion -->