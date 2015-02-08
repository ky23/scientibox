

<?php echo $this->Form->create('Profile', array(
'type' => 'file',
'id' => 'Profile',
'class' => 'form-horizontal'
), array(
'controller',
'action' => 'edit_company'
));?>
<?php $this->request->data['Profile'] = $applicant['Profile'];?>
<div class="form-group"> 
	<h3>Merci de vérifier et de compléter les informations ci-dessous :</h3> 
</div> <!-- end of form-group -->
<div class="informations">
	<div class="form-group"> 
		<h3 class="span8 pull-left title">Infomations générales sur : <?php echo $applicant['Profile']['first_name'] . ' ' . $applicant['Profile']['last_name']?></h3>
	</div> <!-- end of form-group -->
	<div class="form-group">
		<input type="text" name="tkn" style="display:none;" value="<?php echo $applicant['Applicant']['token']?>">
	</div> <!-- end of form-group -->
	<div class="form-group">
		<?php echo $this->Form->radio('civility', array(
			'MR' => 'Mr',
			'MME' => 'Mme'), array(
			'class' => 'css-checkbox',
			'id' => 'civility',
			'legend' => 'Civilité : <span class="glyphicon glyphicon-asterisk required"/>',
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
										<?php echo $this->Form->input('other_situation', array(
											'type' => 'text',
											'label' => 'Autre : <span class="glyphicon glyphicon-asterisk required"/>',
											'id' => 'other_situation',
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
																<?php echo $this->Form->radio('had_company', array(
																	1 => 'Oui',
																	0 => 'Non'
																	), array(
																	'class' => 'css-checkbox',
																	'id' => 'had_company',
																	'legend' => 'Avez vous déjà créé une autre entreprise en France (y compris Auto-Entreprise) ?<span class="glyphicon glyphicon-asterisk required"/>',
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
																		'label' => array(true, 'class' => 'css-label')
																		));
																		?>
																	</div> <!-- end of form-group -->
																	<div class="form-group" id="emplt">
																		<?php echo $this->Form->input('work_certificate_file', array(
																			'type' => 'file',
																			'id' => 'emplt_file',
																			'label' => 'Attestation de travail : <span class="glyphicon glyphicon-asterisk required"/>'
																			));?>
																		</div> <!-- end of form-group -->
																		<div class="form-group">
																			<?php echo $this->Form->input('id_card_file', array(
																				'type' => 'file',
																				'id' => 'identity_file',
																				'label' => 'Pièce d\'identité : <span class="glyphicon glyphicon-asterisk required"/>'
																				));?>
																			</div> <!-- end of form-group -->
																			<div class="form-group">
																				<?php echo $this->Form->input('applicant_rib_file', array(
																					'type' => 'file',
																					'id' => 'bank_file',
																					'label' => 'RIB personnel domicilié en France : <span class="glyphicon glyphicon-asterisk required"/>'
																					));?>
																				</div> <!-- end of form-group -->
																				<div class="form-group">
																					<?php echo $this->Form->radio('is_hosted', array(
																						1 => 'Oui',
																						0 => 'Non'
																						), array(
																						'class' => 'css-checkbox',
																						'id' => 'is_hosted',
																						'legend' => 'Êtes-vous hébergé par un tiers ? <span class="glyphicon glyphicon-asterisk required"/>',
																						'label' => array(true, 'class' => 'css-label')
																						));
																						?>
																						<?php echo $this->Form->input('proof_home_file', array(
																							'type' => 'file',
																							'id' => 'home_file',
																							'label' => 'Justificatif de domicile : <span class="glyphicon glyphicon-asterisk required"/>'
																							));?>
																						</div> <!-- end of form-group -->
																						<div class="form-group" id="proof_home">
																							<?php echo $this->Form->input('accommodation_certificate_file', array(
																								'type' => 'file',
																								'id' => 'proof_home_file',
																								'label' => 'Attestation d\'hébergement : <span class="glyphicon glyphicon-asterisk required"/>'
																								));?>
																							</div> <!-- end of form-group -->
																							<div class="form-group" id="idt_home">
																								<?php echo $this->Form->input('accommodating_id_card_file', array(
																									'type' => 'file',
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
																										