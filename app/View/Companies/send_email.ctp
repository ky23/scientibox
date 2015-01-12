<?php echo $this->Html->script(array('tinymce/tinymce.min')); ?>
<?php echo $this->element('Menus/admin_menu'); ?>
<div class="container"> 
	<div class="row-fluid"> 
		<div class="data-form"> 
			<?php echo $this->Form->create('Company', array(
				'id' => 'admin',
				'class' => 'form-horizontal',
				));?>
				<section>
					<div class="control-group"> 
						<h3 class="form-title">Envoyer un mail</h3>
					</div> <!-- end of form-title -->
					<div class="form-group">
						<?php echo $this->Form->input('Company.username', array(
							'placeholder' => 'abc@exemple.com',
							'id' => 'email',
							'class' => 'form-control',
							'label' => 'Adresse email',
							'required'
							)); ?>
						</div> <!-- end of form-group -->
						<div class="form-group">
							<?php echo $this->Form->input('Company.object', array(
								'placeholder' => 'Objet',
								'id' => 'object',
								'class' => 'form-control',
								'label' => 'Objet',
								'required'
								)); ?>
							</div> <!-- end of form-group -->
							<div class="form-group">
								<?php echo $this->Form->input('Company.activity', array(
									'type' => 'textarea',
									'label' => 'Contenu',
									'class' => 'form-control',
									'id' => 'content'
									)); ?>
								</div> <!-- end of form-group -->
								<?php echo $this->Form->end(array(
									'label' => 'Envoyer',
									'id' => 'next-button',
									'class' => 'form-button'
									));?>
								</section>
							</div> <!-- end of admin-form -->
						</div> <!-- end of row-fluid -->
					</div> <!-- end of container -->
					<script type="text/javascript">
					tinymce.init({
						selector: "textarea#content",
						theme: "modern",
						plugins: [
						"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
						"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
						"save table contextmenu directionality emoticons template paste textcolor"
						],
						toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
					});
					</script>