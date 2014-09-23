
<?php echo $this->element('applicant_menu'); ?>
<?php
?>
<div class="data-form">
  <?php echo $this->Form->create('Company', array('type' => 'file', 'id' => 'Company', 'class' => 'form-horizontal'));?>
  <div class="form-group"> 
    <h3>Merci de vérifier et de compléter les informations ci-dessous :</h3> 
  </div> <!-- end of form-group -->
  <div class="form-group">
    <label for="name" class="col-md-4 control-label">Raison sociale :</label>
    <div class="col-md-4">
      <?php echo $this->Form->input('name', array(
        'type' => 'text',
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'Raison sociale de la société',
        'id' => 'name',
        'value' => $company_to_edit['name']
        )); ?>
      </div> <!-- end of col-md-4 -->
    </div> <!-- end of form-group -->
    <div class="form-group">
      <label for="website" class="col-md-4 control-label">Site web :</label>
      <div class="col-md-4">
       <?php echo $this->Form->input('website', array(
         'type' => 'text',
         'label' => false,
         'class' => 'form-control',
         'placeholder' => 'Site web de la société',
         'id' => 'website',
         'value' => $company_to_edit['website']
         )); ?>
       </div> <!-- end of col-md-4 -->
     </div> <!-- end of form-group -->
     <div class="form-group">
      <label for="company-siret" class="col-md-4 control-label">Siret :</label>
      <div class="col-md-4">
        <?php echo $this->Form->input('siret', array(
          'type' => 'text',
          'label' => false,
          'class' => 'form-control',
          'placeholder' => 'Siret de la société',
          'id' => 'siret',
          'value' => $company_to_edit['siret']
          )); ?>
        </div> <!-- end of col-md-4 -->
      </div> <!-- end of form-group -->
      <div class="form-group">
        <label for="naf_code" class="col-md-4 control-label">Code Naf :</label>
        <div class="col-md-4">
          <?php echo $this->Form->input('naf_code', array(
            'type' => 'text', 
            'label' => false, 
            'class' => 'form-control', 
            'placeholder' => 'Code Naf de la société', 
            'id' => 'naf_code', 
            'value' => $company_to_edit['naf_code']
            )); ?>
          </div> <!-- end of col-md-4 -->
        </div> <!-- end of form-group -->
        <div class="form-group">
          <label for="legal_status" class="col-md-4 control-label">Statut juridique :</label>
          <div class="col-md-4">
            <?php echo $this->Form->input('legal_status', array(
              'type' => 'select',
              'label' => false,
              'class' => 'form-control',
              'placeholder' => 'Staut juridique',
              'id' => 'legal_status',
              'value' =>  $company_to_edit['legal_status'],
              'options' => array(
                'SARL' => 'SARL',
                'EURL' => 'EURL',
                'SAS' => 'SAS',
                'SASU' => 'SASU',
                'SA' => 'SA',
                'En cours de création' => 'En cours de création',
                'Autres' => 'Autres'
                ))); ?>
              </div> <!-- end of col-md-4 -->
            </div> <!-- end of form-group -->
            <div class="form-group">
              <label for="social_capital" class="col-md-4 control-label">Capital social :</label>
              <div class="col-md-4">
                <?php echo $this->Form->input('social_capital', array(
                  'type' => 'text',
                  'label' => false,
                  'class' => 'form-control',
                  'placeholder' => 'Code Naf de la société',
                  'id' => 'social_capital',
                  'value' => $company_to_edit['social_capital']
                  )); ?>
                </div> <!-- end of col-md-4 -->
              </div> <!-- end of form-group -->
              <div class="form-group">
                <label for="contact" class="col-md-4 control-label">Contact :</label>
                <div class="col-md-4">
                  <?php echo $this->Form->input('contact', array(
                    'type' => 'text',
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => 'Email du contact principal',
                    'id' => 'contact',
                    'value' => $company_to_edit['contact']
                    )); ?>
                  </div> <!-- end of col-md-4 -->
                </div> <!-- end of form-group -->
                <div class="form-group">
                  <label for="activity" class="col-md-4 control-label">Descriptif de l'activité (extrait du Kbis) :</label>
                  <div class="col-md-4">
                    <?php echo $this->Form->input('activity', array(
                      'type' => 'textarea',
                      'label' => false,
                      'class' => 'form-control',
                      'placeholder' => 'Activité de la société',
                      'id' => 'activity',
                      'value' => $company_to_edit['activity']
                      )); ?>
                    </div> <!-- end of col-md-4 -->
                  </div> <!-- end of form-group -->
                  <div class="form-group">
                    <label for="creation_date" class="col-md-4 control-label">Date de création :</label>
                    <div class="col-md-4">
                     <?php echo $this->Form->input('creation_date', array(
                       'type' => 'text',
                       'label' => false,
                       'class' => 'form-control',
                       'placeholder' => 'jj/mm/aaaa',
                       'id' => 'creation_date',
                       'value' => $company_to_edit['creation_date']
                       )); ?>
                     </div> <!-- end of col-md-4 -->
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
                            'value' => $company_to_edit['street_number']
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
                             'value' => $company_to_edit['street_name']
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
                             'value' => $company_to_edit['zip_code']
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
                               'value' => $company_to_edit['city_name']
                               )); ?>  
                             </div> <!-- end of col-md-6 -->
                           </div> <!-- end of col-md-6 -->
                         </div> <!-- end of col-md-12 -->
                       </div> <!-- end of form-group -->
                       <div class="form-group">
                        <label for="shares" class="col-md-4 control-label">Répartition des part :</label>
                        <div class="col-md-6">
                          <label for="total_shares" class="col-md-4 control-label">Total Actions :</label>
                          <div class="col-md-4"> 
                           <?php echo $this->Form->input('total_shares', array(
                             'type' => 'text',
                             'label' => false,
                             'class' => 'form-control',
                             'placeholder' => 'Nombre d\'actions total',
                             'id' => 'total_shares',
                             'value' => $company_to_edit['total_shares']
                             )); ?>
                           </div> <!-- end of col-md-4 -->
                           <table class="table table-hover">
                            <thead>
                              <tr> 
                                <th>Associés</th>
                                <th>Actions</th>
                                <th>Parts en %</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($applicants as $ind => $applicant): ?> 
                              <tr class="<?php echo ($ind % 2) ? 'colored' : 'uncolored' ?>">
                               <td><?php echo ($applicant['Profile']['first_name']." ".$applicant['Profile']['last_name'])?></td>
                               <td>
                                <?php echo $this->Form->input('shares_' . $applicant['Profile']['id'], array(
                                 'type' => 'text',
                                 'label' => false,
                                 'class' => 'form-control',
                                 'placeholder' => 'Nombre d\'actions total',
                                 'id' => 'shares_' . $applicant['Profile']['id'],
                                 'value' =>  $applicant['Profile']['shares']
                                 )); ?>
                               </td>
                               <td><?php 
                               if ($company_to_edit['total_shares']) {
                                echo round($applicant['Profile']['shares'] * 100 / $company_to_edit['total_shares'], 2);
                              } else {
                                echo 0;
                              }
                              ?></td>
                            </tr>
                          <?php endforeach; ?> <?php unset($applicants); ?>
                        </tbody>
                      </table>
                    </div> <!-- end of col-md-6 -->
                  </div> <!-- end of form-group -->
                  <div class="form-group">
                   <label for="loan" class="col-md-4 control-label">Affectation du prêt :</label>
                   <div class="col-md-4" id="loan">
                    <?php echo $this->Form->input('account', array(
                      'type' => 'checkbox',
                      'name' => 'account',
                      'id' => 'account',
                      'label' => 'Compte courant',
                      'default' => $company_to_edit['account']
                      ));?>
                      <!-- <input type="checkbox" id="account" onclick="isCheckboxChecked()"> -->
                    </div> <!-- end of col-md-4 -->
                    <div class="col-md-4">
                      <?php echo $this->Form->input('capital', array(
                        'type' => 'checkbox',
                        'name' => 'capital',
                        'id' => 'capital',
                        'label' => 'Capital',
                        'default' => $company_to_edit['capital']
                        ));?>
                        <!-- <input type="checkbox" id="capital"> -->
                      </div> <!-- end of col-md-4 -->
                    </div> <!-- end of form-group -->
                    <div class="form-group">
                      <label for="company-kbis" class="col-md-4 control-label">Extrait Kbis:</label>
                      <div class="col-md-6">
                        <?php echo $this->Form->input('file', array(
                          'type' => 'file',
                          'name' => 'kbis_file',
                          'id' => 'kbis_file',
                          'label' => false
                          ));?>
                        </div> <!-- end of col-md-6 -->
                      </div> <!-- end of form-group -->
                      <div class="form-group" id="associates-convention" style="visibility: hidden">
                        <label for="associates" class="col-md-4 control-label">Convention d'associés (scannée et signée par les demandeurs de prêt) :</label>
                        <div class="col-md-6">
                         <?php echo $this->Form->input('file', array(
                           'type' => 'file',
                           'name' => 'associates_file',
                           'id' => 'associates_file',
                           'label' => false
                           )); ?>
                         </div> <!-- end of col-md-6 -->
                         <div class="col-md-6">
                          <span id="span-download" class="glyphicon glyphicon-download"><a href="./download.php?file=test1.pdf"> Télécharger un modèle</a></span>
                        </div> <!-- end of col-md-6 -->
                      </div> <!-- end of form-group -->
                      <div class="form-group">
                        <h4>Je certifie sur l'honneur de l'exactitude des informations renseignées ci-dessus.</h4>
                        <input type="checkbox" id="field_terms" name="terms_company" required="">
                      </div> <!-- end of form-group -->
                      <div class="form-group">
                        <?php echo $this->Form->end(array(
                          'label' => 'suivant',
                          'id' => 'next-button'
                          ));?>
                        </div> <!-- end of form-group -->
                      </div> <!-- end of data-form -->
                      <?php echo $this->Html->script(array('forms')); ?>