 <div class="container"> 
 	<div class="row-fluid"> 
 		<div class="admin form"> 
 			<?php echo $this->Form->create('Admin', array(
 				'id' => 'admin',
 				'class' => 'form-horizontal',
 				));?>
 				<section>
 					<div class="control-group"> 
 						<h3 class="form-title">Ajouter un compte administrateur</h3>
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
 						<?php echo $this->Form->end(array(
 							'label' => 'Ajouter',
 							'id' => 'button-send',
 							'class' => 'form-button'
 							));?>
 						</section>
 					</div> <!-- end of admin-form -->
 				</div> <!-- end of row-fluid -->
                </div> <!-- end of container -->