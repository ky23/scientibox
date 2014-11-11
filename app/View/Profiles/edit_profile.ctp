
<?php echo $this->element('applicant_menu'); ?>
<div class="data-form">
	<?php echo $this->Form->create('Profile', array('type' => 'file', 'id' => 'Profile', 'class' => 'form-horizontal'));?>
	<div class="form-group"> 
		<h3>Merci de vérifier et de compléter les informations ci-dessous :</h3> 
	</div> <!-- end of form-group -->
	<div class="informations">
		<div class="form-group"> 
			<h3 class="span8 pull-left title">Infomations générales sur le demandeur</h3>
		</div> <!-- end of form-group -->
		<div class="form-group">
			<?php echo $this->Form->radio('civility', array(
				1 => 'Mr',
				0 => 'Mme'), array(
				'class' => 'css-checkbox',
				'id' => 'civility',
				'legend' => 'Civilité : <span class="glyphicon glyphicon-asterisk required"/>',
				'value' => 0,
				'label' => array('class' => 'css-label', 'value' => 'gringo')
				));?>
			</div> <!-- end of form-group -->
			<div class="form-group">
				<?php echo $this->Form->input('first_name', array(
					'type' => 'text',
					'label' => 'Prénom : <span class="glyphicon glyphicon-asterisk required"/>',
					'class' => 'form-control',
					'placeholder' => 'Prénom',
					'id' => 'first_name',
					)); ?>
				</div> <!-- end of form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('last_name', array(
						'type' => 'text',
						'label' => 'Nom : <span class="glyphicon glyphicon-asterisk required"/>',
						'class' => 'form-control',
						'placeholder' => 'Nom',
						'id' => 'last_name',
						)); ?>
					</div> <!-- end of form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('perso_email', array(
							'type' => 'text',
							'label' => 'Email personnel : <span class="glyphicon glyphicon-asterisk required"/>',
							'class' => 'form-control',
							'placeholder' => 'ex: abc@exemple.fr',
							'id' => 'perso_email',
							)); ?>
						</div> <!-- end of form-group -->
						<div class="form-group">
							<?php echo $this->Form->input('pro_email', array(
								'type' => 'text',
								'label' => 'Email professionnel : <span class="glyphicon glyphicon-asterisk required"/>',
								'class' => 'form-control',
								'placeholder' => 'ex: abc@exemple.fr',
								'id' => 'pro_email',
								)); ?>
							</div> <!-- end of form-group -->
							<div class="form-group">
								<?php echo $this->Form->input('phone', array(
									'type' => 'text',
									'label' => 'Mobile : <span class="glyphicon glyphicon-asterisk required"/>',
									'class' => 'form-control',
									'placeholder' => 'ex: 0xxxxxxxxx',
									'id' => 'phone',
									)); ?>
								</div> <!-- end of form-group -->
								<div class="form-group">
									<?php echo $this->Form->input('social_situation', array(
										'type' => 'select',
										'label' => 'Situation social : <span class="glyphicon glyphicon-asterisk required"/>',
										'class' => 'form-control',
										'placeholder' => 'Situation sociale',
										'id' => 'social_situation',
										'options' => array(
											'SAL' => 'Salarié',
											'RET' => 'Retraité',
											'IND' => 'Indépendant',
											'INA' => 'Inactif',
											'ETU' => 'Etudiant',
											'DEI' => 'Demandeur d\'emploi < 1',
											'DES' => 'Demandeur d\'emploi > 1',
											'Autre' => 'Autre'
											))); ?>
										</div> <!-- end of form-group -->
										<div class="form-group" id="other">
											<?php echo $this->Form->input('other', array(
												'type' => 'text',
												'label' => 'Autre : <span class="glyphicon glyphicon-asterisk required"/>',
												'id' => 'other-choice',
												'class' => 'form-control',
												'placeholder' => 'Autre statut juridique'
												)); ?>
											</div> <!-- end of form-group -->
											<div class="form-group">
												<?php echo $this->Form->input('birthdate', array(
													'type' => 'text',
													'label' => 'Date de Naissance : <span class="glyphicon glyphicon-asterisk required"/>',
													'class' => 'form-control',
													'placeholder' => 'jj/mm/aaaa',
													'id' => 'birthdate',
													)); ?>
												</div> <!-- end of form-group -->
												<div class="form-group">
													<?php echo $this->Form->input('birth_city', array(
														'type' => 'text',
														'label' => 'Ville de naissance : <span class="glyphicon glyphicon-asterisk required"/>',
														'class' => 'form-control',
														'placeholder' => 'Ville de naissance',
														)); ?>
													</div> <!-- end of form-group -->
													<div class="form-group">
														<?php echo $this->element('select_country_options'); ?>
													</div> <!-- end of form-group -->
													<div class="form-group">
														<label class="col-sm-2  control-label">Adresse : <span class="glyphicon glyphicon-asterisk required"></span></label>
														<div class="col-sm-3"> 
															<?php echo $this->Form->input('street_name', array(
																'type' => 'text',
																'label' => 'Rue/Bd/Av',
																'class' => 'form-control',
																'placeholder' => 'Nom de la Rue/Bd/Av',
																'id' => 'street_name',
																)); ?> 
															</div> <!-- end of col-sm-3 -->
															<div class="col-sm-2"> 
																<?php echo $this->Form->input('zip_code', array(
																	'type' => 'text',
																	'label' => 'Code postal',
																	'class' => 'form-control',
																	'placeholder' => 'Code postal',
																	'id' => 'zip_code',
																	)); ?> 
																</div> <!-- end of col-sm-2 -->
																<div class="col-sm-3"> 
																	<?php echo $this->Form->input('city_name', array(
																		'type' => 'text',
																		'label' => 'Ville',
																		'class' => 'form-control',
																		'placeholder' => 'Nom de la ville',
																		'id' => 'city_name',
																		)); ?>  
																	</div> <!-- end of col-sm-3 -->
																</div> <!-- end of form-group -->
																<div class="form-group">
																	<?php echo $this->Form->radio('is_company', array(
																		1 => 'Oui',
																		0 => 'Non'
																		), array(
																		'class' => 'css-checkbox',
																		'id' => 'is_company',
																		'legend' => 'Avez vous déjà créé une entreprise en France (y compris Auto Entrepreneur) ? <span class="glyphicon glyphicon-asterisk required"/>',
																		'value' => 0,
																		'label' => array(true, 'class' => 'css-label')
																		));
																		?>
																	</div> <!-- end of form-group -->
																</div> <!-- end of informations -->
																<div class="documents">
																	<div class="form-group"> 
																		<h3 class="span8 pull-left title">Pièces justificatives</h3> 
																	</div> <!-- end of form-group -->
																	<div class="form-group">
																		<?php echo $this->Form->radio('is_european', array(
																			1 => 'Oui',
																			0 => 'Non'
																			), array(
																			'class' => 'css-checkbox',
																			'id' => 'is_european',
																			'legend' => 'Êtes-vous ressortissant Européen ? <span class="glyphicon glyphicon-asterisk required"/>',
																			'value' => 0,
																			'label' => array(true, 'class' => 'css-label')
																			));
																			?>
																		</div> <!-- end of form-group -->
																		<div class="form-group" id="emplt">
																			<?php echo $this->Form->input('file', array(
																				'type' => 'file',
																				'name' => 'emplt_file',
																				'id' => 'emplt_file',
																				'label' => 'Attestation de travail : <span class="glyphicon glyphicon-asterisk required"/>'
																				));?>
																			</div> <!-- end of form-group -->
																			<div class="form-group">
																				<?php echo $this->Form->input('file', array(
																					'type' => 'file',
																					'name' => 'identity_file',
																					'id' => 'identity_file',
																					'label' => 'Pièce d\'identité : <span class="glyphicon glyphicon-asterisk required"/>'
																					));?>
																				</div> <!-- end of form-group -->
																				<div class="form-group">
																					<?php echo $this->Form->input('file', array(
																						'type' => 'file',
																						'name' => 'bank_file',
																						'id' => 'bank_file',
																						'label' => 'RIB personnel domicilié en France : <span class="glyphicon glyphicon-asterisk required"/>'
																						));?>
																					</div> <!-- end of form-group -->
																					<div class="form-group">
																						<?php echo $this->Form->radio('is_home', array(
																							1 => 'Oui',
																							0 => 'Non'
																							), array(
																							'class' => 'css-checkbox',
																							'id' => 'is_home',
																							'legend' => 'Êtes-vous hébergé par un tiers ? <span class="glyphicon glyphicon-asterisk required"/>',
																							'value' => 0,
																							'label' => array(true, 'class' => 'css-label')
																							));
																							?>
																							<?php echo $this->Form->input('file', array(
																								'type' => 'file',
																								'name' => 'home_file',
																								'id' => 'home_file',
																								'label' => 'Justificatif de domicile : <span class="glyphicon glyphicon-asterisk required"/>'
																								));?>
																							</div> <!-- end of form-group -->
																							<div class="form-group" id="proof_home">
																								<?php echo $this->Form->input('file', array(
																									'type' => 'file',
																									'name' => 'proof_home_file',
																									'id' => 'proof_home_file',
																									'label' => 'Attestatiion d\'hébergement : <span class="glyphicon glyphicon-asterisk required"/>'
																									));?>
																								</div> <!-- end of form-group -->
																								<div class="form-group" id="idt_home">
																									<?php echo $this->Form->input('file', array(
																										'type' => 'file',
																										'name' => 'idt_home_file',
																										'id' => 'idt_home_file',
																										'label' => 'Pièce d\'identité de l\'hébergeant : <span class="glyphicon glyphicon-asterisk required"/>'
																										));?>
																									</div> <!-- end of form-group -->
																									<div class="form-group">
																										<h4>Déclaration sur l'honneur de non surendettement</h4>
																										<?php echo $this->Form->input('file', array(
																											'type' => 'file',
																											'name' => '1_file',
																											'id' => '1',
																											'label' => 'Fichier 1 : <span class="glyphicon glyphicon-asterisk required"/>'
																											));?>
																										<?php echo $this->Form->input('file', array(
																											'type' => 'file',
																											'name' => '2_file',
																											'id' => '2',
																											'label' => 'Fichier 2 : <span class="glyphicon glyphicon-asterisk required"/>'
																											));?>
																										<?php echo $this->Form->input('file', array(
																											'type' => 'file',
																											'name' => '3_file',
																											'id' => '3',
																											'label' => 'Fichier 3 : <span class="glyphicon glyphicon-asterisk required"/>'
																											));?>
																										</div> <!-- end of documents -->
																										<div class="form-group">
																											<h4>Je certifie sur l'honneur de l'exactitude des informations renseignées ci-dessus.</h4>
																											<?php echo $this->Form->checkbox('terms_company', array(
																												'legend' => false,
																												'class' => 'css-checkbox',
																												'id' => 'terms_company'
																												)); ?>
																												<label for="terms_company" class="css-label"></label> 
																												<!-- <input type="checkbox" id="field_terms" name="terms_company" required=""> -->
																											</div> <!-- end of form-group -->
																										</div> <!-- end of documents -->
																										<?php echo $this->Form->end(array(
																											'label' => 'suivant',
																											'id' => 'next-button'
																											)); ?>
																										</div> <!-- end of data-form -->
																										<?php echo $this->Html->script(array('forms')); ?>