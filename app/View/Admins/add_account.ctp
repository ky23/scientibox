<div class="admin-forgotten">
	<div class="form-title"> 
		<h3>Ajouter un compte</h3>
	</div> <!-- end of form-title -->
	<?php echo $this->Form->create('Admin', array(
		'id' => 'Admin',
		'class' => 'form-horizontal',
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
			<?php echo $this->Form->end(array(
				'label' => 'Ajouter',
				'id' => 'button-send'
				));?>
</div> <!-- end of admin-connexion -->