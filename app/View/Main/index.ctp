<!-- File: /app/View/Main/index.ctp -->

<div class="row-fluid"> 
	<div class="span6">
		<section>
			<div class="block">
				<div class="box-catchphrase">
					<h1>Bienvenue sur Scientibox</h1>
					<div class="first-phrase">
						<span class="glyphicon glyphicon-asterisk"></span>
						<h4>Constituez votre dossier de prêt d'honneur.</h4>
					</div>
					<div class="second-phrase">
						<span class="glyphicon glyphicon-asterisk"></span>
						<h4>Transférez de manière sécurisée vos documents.</h4>
					</div>
					<div class="third-phrase">
						<span class="glyphicon glyphicon-asterisk"></span>
						<h4>Suivez l'état de votre dossier.</h4>
					</div> <!-- end of point third -->
				</div> <!-- end of box-catchphrase -->
				<div class="connexion">
					<a id="button-connexion" href="#connexion-modal" class="btn btn-warning" data-toggle="modal">
						Connexion
					</a>
					<div class="modal fade" id="connexion-modal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Connexion</h4>
								</div> <!-- end of modal-header -->
								<div class="modal-body">
									<?php echo $this->Form->create('Applicant', array('controller' => 'applicants', 'action' => 'signup'));?>
									<form method="post" autocomplete="off" id="connexion-form" action="index.php">
										<div class="username-input">
											<h3>Entrez votre adresse email</h3>
											<div class="email-input"> 
												<span class="glyphicon glyphicon-user"></span>
												<input type="email" id="username" placeholder="abc@exemple.com" name="email">
											</div> <!-- end of email-input -->
										</div> <!-- end of input username --> 
										<div class="buttons"> 
											<button id="close-button" class="btn btn-default" data-dismiss="modal" type="button">Fermer</button>
											<?php echo $this->Form->end(array(
												'label' => 'Envoyer',
												'id' => 'send-button',
												'div' => false
												));?>
											</div> <!-- end of btn -->
										</div> <!-- end of modal-body -->
										<div id="modal_footer" class="modal-footer">
										</div> <!-- end of modal-footer -->
									</div> <!-- end of modal-content -->
								</div> <!-- end of modal-dialog -->
							</div> <!-- end of modal fade -->
						</div> <!-- end of connexion -->
					</div> <!-- end of span-left -->
				</section> 
			</div>
			<div class="span6"> 
			</div>
</div> <!-- end of row-fluid -->