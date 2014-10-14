 <!-- File: /app/View/Contact/index.ctp -->
 <?php
 $key = md5(uniqid(rand(), true));
 CakeSession::write('Contact.key', $key);
 ?>
 <div class="container"> 
    <div class="row-fluid"> 
        <div class="contact form">
            <?php echo $this->Form->create('Contact', array(
                'id' => 'contact',
                'class' => 'form-horizontal'
                ));?>
                <section>
                    <div class="control-group"> 
                        <h3 class="form-title">Nous contacter</h3>
                    </div> <!-- end of form-title -->
                    <div class="control-group">
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-bookmark"></span>
                            <?php echo $this->Form->input('company', array(
                                'type' => 'text',
                                'label' => false,
                                'class' => 'form-control',
                                'placeholder' => 'Raison sociale de la société',
                                'id' => 'contact'
                                )); ?>
                            </div> <!-- end of input-group -->
                        </div> <!-- end of control-group -->   
                        <div class="control-group">
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-user"></span>
                                <?php echo $this->Form->input('name', array(
                                    'type' => 'text',
                                    'label' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'Nom Prénom',
                                    'id' => 'name'
                                    )); ?>
                                </div> <!-- end of input-group -->
                            </div> <!-- end of control-group --> 
                            <div class="control-group">
                              <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                                <?php echo $this->Form->input('email', array(
                                    'type' => 'text',
                                    'label' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'Email',
                                    'id' => 'email'
                                    )); ?>
                                </div> <!-- end of input-group -->
                            </div> <!-- end of control-group --> 
                            <div class="control-group">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-tag"></span>
                                    <?php echo $this->Form->input('subject', array(
                                      'type' => 'select',
                                      'label' => false,
                                      'class' => 'form-control',
                                      'placeholder' => 'Objet',
                                      'id' => 'subject',
                                      'options' => array(
                                        'FB' => 'Feedback',
                                        'PA' => 'Problème d\'accès',
                                        'CT' => 'Contact'
                                        ))); ?>
                                    </div> <!-- end of input-group -->
                                </div> <!-- end of control-group -->   
                                <div class="control-group">
                                   <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-pencil"></span>
                                    <?php echo $this->Form->input('message', array(
                                      'type' => 'textarea',
                                      'label' => false,
                                      'class' => 'form-control',
                                      'placeholder' => 'Message',
                                      'rows' => 10,
                                      'cols' => 10,
                                      'id' => 'activity'
                                      )); ?>
                                  </div> <!-- end of input-group -->
                              </div> <!-- end of control-group -->
                              <div class="control-group">
                                <?php
                                foreach($captcha_fields as $index => $captcha) {
                                    echo $this->Html->image($captcha . '.jpg', array('id' => $captcha));
                                    echo $this->Html->link('changer l\'image &#x21bb;', '#', array(
                                        'class' => 'reload',
                                        'id' => 'reload',
                                        'escape' => false
                                        ));
                                    echo '<div class="input-group">';
                                    echo '<span class="input-group-addon glyphicon glyphicon-picture"></span>';
                                    echo $this->Form->input($captcha, array(
                                        'class' => 'form-control' ,
                                        'id' => 'captcha-input',
                                        'name' => 'captcha',
                                        'label' => false,
                                        'value' => '',
                                        'tabindex' => $index + 1
                                        ));
                                    echo '</div> <!-- end of input-group -->';
                                }
                                ?>
                            </div> <!-- end of controls -->        
                            <input type="text" style="visibility: hidden" id="key" name="key" value="<?php echo $key;?>"/>
                            <?php echo $this->Form->end(array(
                                'value' => 'Envoyer',
                                'label' => 'Envoyer',
                                'class' => 'form-button'
                                ));?>
                            </section> 
                        </div> <!-- end of contact-form -->
                    </div> <!-- end of row-fluid -->
                </div> <!-- end of container -->

                <!-- Reload captcha -->
                <?php
                $this->Js->get('.reload')->event('click',"$(this).prev().attr('src', $(this).prev().attr('src') + '?' + new Date().getTime())");
                ?>