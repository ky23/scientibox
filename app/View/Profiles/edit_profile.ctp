
<?php echo $this->element('applicant_menu'); ?>
<div class="applicants"> 
	<ul class="nav nav-tabs">
		<?php foreach ($applicants as $ind => $applicant): ?>
		<li class="<?php echo ($current_id == $applicant['Profile']['id']) ? 'active' : 'inactive' ?>">
			<?php echo $this->Html->link($applicant['Profile']['first_name'] . ' ' . $applicant['Profile']['last_name'],
			array('controller' => 'profiles', 'action' => 'edit_profile', $applicant['Profile']['id']));?></li>
			<?php if ($ind > 0): ?>
			<div class="left-rectangle pos-<?php echo $ind; ?>"> </div>
		<?php endif; ?>
	<?php endforeach; ?> <?php unset($applicants); ?>
</ul>
</div> <!-- end of applicants -->
<div class="data-form">
	<?php echo $this->Form->create('Profile', array('type' => 'file', 'id' => 'Profile', 'class' => 'form-horizontal'));?>
	<div class="form-group"> 
		<h3>Merci de vérifier et de compléter les informations ci-dessous :</h3> 
	</div> <!-- end of form-group -->
	<div class="form-group">
		<label for="first-name" class="col-md-4 control-label">Prénom :</label>
		<div class="col-md-4">
			<?php echo $this->Form->input('first_name', array(
				'type' => 'text',
				'label' => false,
				'class' => 'form-control',
				'placeholder' => 'Prénom',
				'id' => 'first_name',
				'value' => $applicant_to_edit['Profile']['first_name']
				)); ?>
			</div> <!-- end of col-md-4 -->
		</div> <!-- end of form-group -->
		<div class="form-group">
			<label for="last-name" class="col-md-4 control-label">Nom :</label>
			<div class="col-md-4">
				<?php echo $this->Form->input('last_name', array(
					'type' => 'text',
					'label' => false,
					'class' => 'form-control',
					'placeholder' => 'Nom',
					'id' => 'last_name',
					'value' => $applicant_to_edit['Profile']['last_name']
					)); ?>
				</div> <!-- end of col-md-4 -->
			</div> <!-- end of form-group -->
			<div class="form-group">
				<label for="email" class="col-md-4 control-label">Email :</label>
				<div class="col-md-4">
					<?php echo $this->Form->input('email', array(
						'type' => 'text',
						'label' => false,
						'class' => 'form-control',
						'placeholder' => 'ex: abc@exemple.fr',
						'id' => 'email',
						'value' => $applicant_to_edit['Profile']['email']
						)); ?>
					</div> <!-- end of col-md-4 -->
				</div> <!-- end of form-group -->
				<div class="form-group">
					<label for="phone" class="col-md-4 control-label">Mobile :</label>
					<div class="col-md-4">
						<?php echo $this->Form->input('phone', array(
							'type' => 'text',
							'label' => false,
							'class' => 'form-control',
							'placeholder' => 'ex: 0xxxxxxxxx',
							'id' => 'phone',
							'value' => $applicant_to_edit['Profile']['phone']
							)); ?>
						</div> <!-- end of col-md-4 -->
					</div> <!-- end of form-group -->
					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Situation social :</label>
						<div class="col-md-4">
							<?php echo $this->Form->input('social_situation', array(
								'type' => 'select',
								'label' => false,
								'class' => 'form-control',
								'placeholder' => 'Situation sociale',
								'id' => 'social_situation',
								'value' =>  $applicant_to_edit['Profile']['social_situation'],
								'options' => array(
									'SAL' => 'Salarié',
									'RET' => 'Retraité',
									'IND' => 'Indépendant',
									'INA' => 'Inactif',
									'ETU' => 'Etudiant',
									'DEI' => 'Demandeur d\'emploi < 1',
									'DES' => 'Demandeur d\'emploi > 1',
									'AUT' => 'Autres'
									))); ?>
								</div> <!-- end of col-md-4 -->
							</div> <!-- end of form-group -->
							<div class="form-group">
								<label for="birthdate" class="col-md-4 control-label">Date de Naissance :</label>
								<div class="col-md-4">
									<?php echo $this->Form->input('birthdate', array(
										'type' => 'text',
										'label' => false,
										'class' => 'form-control',
										'placeholder' => 'jj/mm/aaaa',
										'id' => 'birthdate',
										'value' => $applicant_to_edit['Profile']['birthdate']
										)); ?>
									</div> <!-- end of col-md-4 -->
								</div> <!-- end of form-group -->
								<div class="form-group">
									<label for="" class="col-md-4 control-label">Lieu de naissance :</label>
									<div class="col-md-12"> 
										<div class="col-md-6">
											<label for="birth_city" class="col-md-6 control-label">Ville de naissance :</label>
											<div class="col-md-6">
												<?php echo $this->Form->input('birth_city', array(
													'type' => 'text',
													'label' => false,
													'class' => 'form-control',
													'placeholder' => 'Ville de naissance',
													'value' => $applicant_to_edit['Profile']['birth_city']
													)); ?>
												</div> <!-- end of col-md-4 -->
											</div> <!-- end of col-md-6 -->
											<div class="col-md-6">
												<label for="birth_country" class="col-md-6 control-label">Pays de naissance :</label>
												<div class="col-md-6">
													<?php echo $this->element('select_country_options'); ?>
												</div> <!-- end of col-md-4 -->
											</div> <!-- end of col-md-6 -->
										</div> <!-- end of col-md-12 -->
									</div> <!-- end of form-group -->
									<div class="form-group">
										<label class="col-md-4 control-label">Adresse :</label>
										<div class="col-md-12"> 
											<div class="col-md-6">
												<label for="street_number" class="col-md-6 control-label">N° Rue/Bd/Av :</label>
												<div class="col-md-6">
													<?php echo $this->Form->input('street_number',array(
														'type' => 'text',
														'label' => false,
														'class' => 'form-control',
														'placeholder' => 'N° Rue/Bd/Av',
														'id' => 'street_number',
														'value' => $applicant_to_edit['Profile']['street_number']
														)); ?>
													</div> <!-- end of col-md-6 -->
													<label for="street_name" class="col-md-6 control-label">Add :</label>
													<div class="col-md-6">
														<?php echo $this->Form->input('street_name', array(
															'type' => 'text',
															'label' => false,
															'class' => 'form-control',
															'placeholder' => 'Nom de la Rue/Bd/Av',
															'id' => 'street_name',
															'value' => $applicant_to_edit['Profile']['street_name']
															)); ?> 
														</div> <!-- end of col-md-6 -->
													</div> <!-- end of col-md-6 -->
													<div class="col-md-6"> 
														<label for="zip_code" class="col-md-6 control-label">CP :</label>
														<div class="col-md-6">
															<?php echo $this->Form->input('zip_code', array(
																'type' => 'text',
																'label' => false,
																'class' => 'form-control',
																'placeholder' => 'Code postal',
																'id' => 'zip_code',
																'value' => $applicant_to_edit['Profile']['zip_code']
																)); ?> 
															</div> <!-- end of col-md-6 -->
															<label for="city_name" class="col-md-6 control-label">Ville :</label>
															<div class="col-md-6">
																<?php echo $this->Form->input('city_name', array(
																	'type' => 'text',
																	'label' => false,
																	'class' => 'form-control',
																	'placeholder' => 'Nom de la ville',
																	'id' => 'city_name',
																	'value' => $applicant_to_edit['Profile']['city_name']
																	)); ?>  
																</div> <!-- end of col-md-6 -->
															</div> <!-- end of col-md-6 -->
														</div> <!-- end of col-md-12 -->
													</div> <!-- end of form-group -->
													<div class="form-group">
														<label for="european" class="col-md-4 control-label">Êtes-vous ressortissant Européen :</label>
														<div class="col-md-4">
															<label for="european" class="radio inline">
																Oui
																<input type="radio" id="european" name="isEuropean" value="oui" checked="checked">
															</label>
														</div> <!-- end of col-md-4 -->
														<div class="col-md-4">
															<label for="not_european" class="radio inline">
																Non
																<input type="radio" id="not_european" name="isEuropean" value="non">
															</label>
														</div> <!-- end of col-md-4 -->
													</div> <!-- end of form-group -->
													<div class="form-group">
														<label for="identity_card" class="col-md-4 control-label">Pièce d'identité :</label>
														<div class="col-md-6">
															<?php echo $this->Form->input('file', array(
																'type' => 'file',
																'name' => 'identity_file',
																'id' => 'identity_file',
																'label' => false
																));?>
															</div> <!-- end of col-md-6 -->
														</div> <!-- end of form-group -->
														<div class="form-group">
															<label for="proof_home" class="col-md-4 control-label">Justificatif de domicile :</label>
															<div class="col-md-6">
																<?php echo $this->Form->input('file', array(
																	'type' => 'file',
																	'name' => 'home_file',
																	'id' => 'home_file',
																	'label' => false
																	));?>
																</div> <!-- end of col-md-6 -->
															</div> <!-- end of form-group -->
															<div class="form-group">
																<label for="bank_account" class="col-md-4 control-label">Relevé d'identité bancaire :</label>
																<div class="col-md-6">
																	<?php echo $this->Form->input('file', array(
																		'type' => 'file',
																		'name' => 'bank_file',
																		'id' => 'bank_file',
																		'label' => false
																		));?>
																	</div> <!-- end of col-md-6 -->
																</div> <!-- end of form-group -->
																<div class="form-group" id="cert-emplt" style="visibility: hidden">
																	<label for="cert-emplt" class="col-md-4 control-label">Attestation de travail :</label>
																	<div class="col-md-6">
																		<?php echo $this->Form->input('file', array(
																			'type' => 'file',
																			'name' => 'emplt_file',
																			'id' => 'emplt_file',
																			'label' => false
																			));?>
																		</div> <!-- end of col-md-6 -->
																	</div> <!-- end of form-group -->
																	<div class="form-group">
																		<h4>Je certifie sur l'honneur ne pas être en situation de surendettement.</h4>
																		<input type="checkbox" id="terms_debt" name="terms_debt" required>
																	</div> <!-- end of form-group -->
																	<div class="form-group">
																		<label for="file_terms_debt" class="col-md-4 control-label">Ajouter :</label>
																		<div class="col-md-6">
																			<?php echo $this->Form->input('file', array(
																				'type' => 'file',
																				'name' => 'terms_file',
																				'id' => 'terms_file',
																				'label' => false
																				));?>
																			</div> <!-- end of col-md-6 -->
																			<label for="span-download" class="col-md-4 control-label">Télécharger :</label>
																			<div class="col-md-6">
																				<span id="span-download" class="glyphicon glyphicon-download"><a href="./download.php?file=test1.pdf">Télécharger un modèle</a></span>
																			</div> <!-- end of col-md-6 -->
																		</div> <!-- end of form-group -->
																		<div class="form-group">
																			<h4>Je certifie sur l'honneur que les fonds seront déposés sur les comptes de la société.</h4>
																			<input type="checkbox" id="terms_funds" name="terms_funds" required>
																		</div> <!-- end of form-group -->
																		<div class="form-group">
																			<h4>Je certifie sur l'honneur de l'exactitude des informations renseignées ci-dessus.</h4>
																			<input type="checkbox" id="terms_applicant" required name="terms_applicant">
																		</div> <!-- end of form-group -->
																		<div class="form-group">
																			<?php echo $this->Form->end(array(
																				'label' => 'suivant',
																				'id' => 'next-button'
																				));?>
																			</div> <!-- end of form-group -->
																		</div> <!-- end of data-form -->
																		<?php echo $this->Html->script(array('forms')); ?>