<?php echo $this->element('Menus/applicant_menu'); ?>
<div class="data-form">
 <?php echo $this->Form->create('Company', array(
   'type' => 'file',
   'id' => 'Company',
   'class' => 'form-horizontal'
   )); ?>
   <div class="form-group"> 
    <h3>Merci de vérifier et de compléter les informations ci-dessous :</h3> 
  </div> <!-- end of form-group -->
  <div class="informations"> 
    <div class="form-group"> 
      <h3 class="span8 pull-left title">Infomations générales sur la Société</h3>
    </div> <!-- end of form-group -->
    <div class="form-group">
      <?php echo $this->Form->input('Company.name', array(
        'type' => 'text',
        'label' => 'Raison sociale : <span class="glyphicon glyphicon-asterisk required"/>',
        'class' => 'form-control',
        'placeholder' => 'Raison sociale de la société',
        'id' => 'name'
        )); ?>
      </div> <!-- end of form-group -->
      <div class="form-group">
       <?php echo $this->Form->input('Company.website', array(
         'type' => 'text',
         'label' => 'Site web : <span class="glyphicon glyphicon-asterisk required"/>',
         'class' => 'form-control',
         'placeholder' => 'Site web de la société',
         'id' => 'website'
         )); ?>
       </div> <!-- end of form-group -->
       <div class="form-group">
        <?php echo $this->Form->input('Company.siren', array(
          'type' => 'text',
          'label' => 'Siren : <span class="glyphicon glyphicon-asterisk required"/>',
          'class' => 'form-control',
          'placeholder' => 'Siren de la société',
          'id' => 'siren'
          )); ?>
        </div> <!-- end of form-group -->
        <div class="form-group">
          <?php echo $this->Form->input('Company.legal_status', array(
            'type' => 'select',
            'label' => 'Statut juridique : <span class="glyphicon glyphicon-asterisk required"/>',
            'class' => 'form-control',
            'placeholder' => 'Staut juridique',
            'id' => 'legal_status',
            'options' => array(
              'SARL' => 'SARL',
              'EURL' => 'EURL',
              'SAS' => 'SAS',
              'SASU' => 'SASU',
              'SA' => 'SA',
              'En cours de création' => 'En cours de création',
              'Autre' => 'Autre'
              ))); ?>
            </div> <!-- end of form-group -->
            <div class="form-group" id="other">
              <?php echo $this->Form->input('Company.other_status', array(
                'type' => 'text',
                'label' => 'Autre : <span class="glyphicon glyphicon-asterisk required"/>',
                'id' => 'other_status',
                'class' => 'form-control',
                'placeholder' => 'Autre statut juridique'
                )); ?>
              </div> <!-- end of form-group -->
              <div class="form-group">
                <?php echo $this->Form->input('Company.social_capital', array(
                  'type' => 'text',
                  'label' => 'Capital social : <span class="glyphicon glyphicon-asterisk required"/>',
                  'class' => 'form-control',
                  'placeholder' => 'Code Naf de la société',
                  'id' => 'social_capital'
                  )); ?>
                </div> <!-- end of form-group -->
                <div class="form-group">
                  <?php echo $this->Form->input('Company.contact', array(
                    'type' => 'text',
                    'label' => 'Contact : <span class="glyphicon glyphicon-asterisk required"/>',
                    'class' => 'form-control',
                    'placeholder' => 'Email du contact principal',
                    'id' => 'contact'
                    )); ?>
                  </div> <!-- end of form-group -->
                  <div class="form-group">
                   <?php echo $this->Form->input('Company.creation_date', array(
                     'type' => 'text',
                     'label' => 'Date de création : <span class="glyphicon glyphicon-asterisk required"/>',
                     'class' => 'form-control',
                     'placeholder' => 'jj/mm/aaaa',
                     'id' => 'creation_date'
                     )); ?>
                   </div> <!-- end of form-group -->
                   <div class="form-group">
                    <label class="col-sm-2  control-label">Adresse : <span class="glyphicon glyphicon-asterisk required"></span></label>
                    <div class="col-sm-3"> 
                      <?php echo $this->Form->input('Company.street_name', array(
                       'type' => 'text',
                       'label' => 'Rue/Bd/Av',
                       'class' => 'form-control',
                       'placeholder' => 'Nom de la Rue/Bd/Av',
                       'id' => 'street_name'
                       )); ?> 
                     </div> <!-- end of col-sm-3 -->
                     <div class="col-sm-2"> 
                       <?php echo $this->Form->input('Company.zip_code', array(
                         'type' => 'text',
                         'label' => 'Code postal',
                         'class' => 'form-control',
                         'placeholder' => 'Code postal',
                         'id' => 'zip_code'
                         )); ?> 
                       </div> <!-- end of col-sm-2 -->
                       <div class="col-sm-3"> 
                        <?php echo $this->Form->input('Company.city_name', array(
                         'type' => 'text',
                         'label' => 'Ville',
                         'class' => 'form-control',
                         'placeholder' => 'Nom de la ville',
                         'id' => 'city_name'
                         )); ?>  
                       </div> <!-- end of col-sm-3 -->
                     </div> <!-- end of form-group -->
                     <div class="form-group">
                      <?php echo $this->Form->input('Company.activity', array(
                        'type' => 'textarea',
                        'label' => 'Activité (tel que mentionné dans le Kbis) : <span class="glyphicon glyphicon-asterisk required"/>',
                        'class' => 'form-control',
                        'placeholder' => 'Activité de la société',
                        'id' => 'activity'
                        )); ?>
                      </div> <!-- end of form-group -->
                      <div class="form-group">
                        <?php echo $this->Form->input('kbis_file', array(
                          'type' => 'file',
                          'id' => 'kbis_file',
                          'label' => 'Extrait Kbis de la société : <span class="glyphicon glyphicon-asterisk required"/>'
                          )); ?>
                        </div> <!-- end of form-group -->
                         <div class="form-group">
                        <?php echo $this->Form->input('company_rib_file', array(
                          'type' => 'file',
                          'id' => 'rib_file',
                          'label' => 'RIB de la société : <span class="glyphicon glyphicon-asterisk required"/>'
                          )); ?>
                        </div> <!-- end of form-group -->
                      </div> <!-- end of informations -->
                      <div class="documents"> 
                       <div class="form-group"> 
                        <h3 class="span8 pull-left title">Structure du capital </h3> 
                      </div> <!-- end of form-group -->
                      <div class="form-group">
                       <?php echo $this->Form->input('Company.total_shares', array(
                         'type' => 'text',
                         'label' => 'Nombre de parts totales : <span class="glyphicon glyphicon-asterisk required"/>',
                         'class' => 'form-control',
                         'placeholder' => 'Nombre d\'actions total',
                         'id' => 'total_shares'
                         )); ?>
                       </div> <!-- end of form-group -->
                      <?php echo $this->element('Tables/shares_table', $applicants); ?>
                      <?php echo $this->element('Tables/loan_affectation_table', $applicants); ?>
                  </div> <!-- end of documents -->
                  <div class="form-group">
                    <?php echo $this->Form->radio('Company.is_bs_closed', array(
                      1 => 'Oui',
                      0 => 'Non'
                      ), array(
                      'class' => 'css-checkbox',
                      'id' => 'is_bs_closed',
                      'legend' => 'Existe-t-il un bilan pour la société ? : <span class="glyphicon glyphicon-asterisk required"/>',
                      'label' => array(true, 'class' => 'css-label')
                      )); ?>
                    </div> <!-- end of form-group -->
                    <div class="form-group" id="report-date">
                     <?php echo $this->Form->input('Company.closing_date', array(
                       'type' => 'text',
                       'label' => 'Date de clôture : <span class="glyphicon glyphicon-asterisk required"/>',
                       'class' => 'form-control',
                       'placeholder' => 'jj/mm/aaaa',
                       'id' => 'closing_date'
                       )); ?>
                     </div> <!-- end of form-group -->
                     <div class="form-group" id="report-value">
                      <?php echo $this->Form->radio('Company.is_positive', array(
                        1 => 'Positif',
                        0 => 'Négatif'
                        ), array(
                        'class' => 'css-checkbox',
                        'id' => 'is_positive',
                        'legend' => 'Le bilan était (ou sera t-il) positif (> ou = 0) ou négatif ? <span class="glyphicon glyphicon-asterisk required"/>',
                        'label' => array(true, 'class' => 'css-label')
                        )); ?>
                      </div> <!-- end of form-group -->
                      <div class="form-group">
                        <h4>Je certifie sur l'honneur de l'exactitude des informations renseignées ci-dessus.</h4>
                        <?php echo $this->Form->checkbox('Company.terms_company', array(
                          'legend' => false,
                          'class' => 'css-checkbox',
                          'id' => 'terms_company'
                          )); ?>
                          <label for="terms_company" class="css-label"></label> 
                          <!-- <input type="checkbox" id="field_terms" name="terms_company" required=""> -->
                        </div> <!-- end of form-group -->
                        <?php echo $this->Form->end(array(
                          'label' => 'suivant',
                          'id' => 'next-button'
                          )); ?>
                        </div> <!-- end of data-form -->
                        <?php echo $this->element('dialog_report'); ?>
                        <?php echo $this->Html->script(array('forms')); ?>