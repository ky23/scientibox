
<?php
$key = md5(uniqid(rand(), true));
CakeSession::write('Admins.key', $key);
?>

<div class="container"> 
	<div class="row-fluid"> 
		<div class="forgot form"> 
			<?php echo $this->Form->create('Admin', array(
				'id' => 'Admin',
				'class' => 'form-horizontal'
				// 'controller' => 'admins',
				// 'action' => 'forgot_password'
				));?>
				<section>
					<div class="control-group"> 
						<h3 class="form-title">Mot de passe oublié</h3>
					</div> <!-- end of form-title -->
					<div class="control-group">
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-user"></span>
							<?php echo $this->Form->input('Admin.username', array(
								'placeholder' => 'abc@exemple.com',
								'id' => 'email',
								'class' => 'form-control',
								'label' => false,
								'required'
								)); ?>
							</div> <!-- end of control-group -->
						</div> <!-- end of input-group -->
						<input type="text" style="visibility: hidden" id="key" name="key" value="<?php echo $key;?>"/>
						<?php echo $this->Form->end(array(
							'label' => 'Envoyer',
							'class' => 'form-button'
							));?>
						</section>
					</div> <!-- end of admin-form -->
				</div> <!-- end of row-fluid -->
              </div> <!-- end of container -->