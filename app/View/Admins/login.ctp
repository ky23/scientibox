 <div class="container"> 
 	<div class="row-fluid"> 
 		<div class="admin form"> 
 			<?php echo $this->Form->create('Admin', array(
 				'id' => 'admin',
 				'class' => 'form-horizontal',
 				));?>
 				<section>
 					<div class="control-group"> 
 						<h3 class="form-title">Se connecter</h3>
 					</div> <!-- end of form-title -->
 					<div class="control-group">
 						<div class="input-group">
 							<span class="input-group-addon glyphicon glyphicon-user"></span>
 							<?php echo $this->Form->input('Admin.username', array(
 								'placeholder' =>
 								'abc@exemple.com',
 								'id' => 'email',
 								'class' => 'form-control',
 								'label' => false,
 								'required'
 								)); ?>
 							</div> <!-- end of control-group -->
 						</div> <!-- end of input-group -->
 						<div class="control-group">
 							<div class="input-group">
 								<span class="input-group-addon glyphicon glyphicon-lock"></span>
 								<?php echo $this->Form->input('Admin.password', array(
 									'type' => 'password',
 									'placeholder' => '******',
 									'id' => 'password',
 									'class' => 'form-control',
 									'label' => false,
 									'required'
 									)); ?>
 								</div> <!-- end of control-group -->
 							</div> <!-- end of input-group -->
 							<div class="control-group">
 								<div class="input-group">
 									<?php echo $this->Html->link('Mot de passe oublié ?', array(
 										'controller' => 'admins',
 										'action' => 'forgot_password'
 										), array('id' => 'forgot'));?>
 									</div> <!-- end of control-group -->
 								</div> <!-- end of input-group -->
 								<?php echo $this->Form->end(array(
 									'label' => 'Connexion',
 									'class' => 'form-button'
 									));?>
 								</section>
 							</div> <!-- end of admin-form -->
 						</div> <!-- end of row-fluid -->
                </div> <!-- end of container -->