 <!-- File: /app/View/Contact/index.ctp -->
 
 <?php
 $key = md5(uniqid(rand(), true));
 CakeSession::write('Contact.key', $key);
 ?>
 <div class="container"> 
    <div class="row-fluid"> 
        <div class="span4">
            <?php echo $this->Form->create('Contact', array('id' => 'Contact'));?>
            <div class="form-title"> 
                <h3>Nous contacter</h3>
            </div> <!-- end of form-title -->
            <div class="control-group">
                <div class="controls">
                    <span class="glyphicon glyphicon-bookmark"></span>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Nom de la Société" required/>
                </div> <!-- end of controls -->
            </div> <!-- end of control-group -->   
            <div class="control-group">
                <div class="controls">
                    <span class="glyphicon glyphicon-user"></span>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom Prénom" required/>
                </div> <!-- end of controls -->
            </div> <!-- end of control-group --> 
            <div class="control-group">
              <div class="controls">
                <span class="glyphicon glyphicon-envelope"></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required/>
            </div> <!-- end of controls -->
        </div> <!-- end of control-group -->  
        <div class="control-group">
            <div class="controls">
                <span class="glyphicon glyphicon-tag"></span>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Objet" required/>
            </div> <!-- end of controls -->
        </div> <!-- end of control-group -->   
        <div class="control-group">
         <div class="controls">
            <span class="glyphicon glyphicon-pencil"></span>
            <textarea rows="8" cols="100" class="form-control" id="message" name="message" placeholder="Message" maxlength="999" style="resize:none" required></textarea>
        </div> <!-- end of controls -->
    </div> <!-- end of control-group -->
    <div class="control-group">
        <span class="glyphicon glyphicon-picture"></span>
        <?php
        foreach($captcha_fields as $index => $captcha) {
            echo $this->Html->image($captcha . '.jpg', array('id' => $captcha));
            echo $this->Html->link('changer l\'image &#x21bb;', '#', array('class' => 'reload', 'id' => 'reload', 'escape' => false));
            echo $this->Form->input($captcha, array('class' => 'form-control' , 'id' => 'captcha-input', 'name' => 'captcha', 'label' => '','value' => '', 'tabindex' => $index + 1));
        }
        ?>
    </div> <!-- end of controls -->        
    <input type="text" style="visibility: hidden" id="key" name="key" value="<?php echo $key;?>"/>
    <?php echo $this->Form->end(array(
        'value' => 'Envoyer',
        'label' => 'Envoyer',
        'id' => 'send-button'
        ));?>
    </section> 
</div> <!-- end of span4 -->
</div> <!-- end of row-fluid -->
</div> <!-- end of container -->

<!-- Reload captcha -->
<?php
$this->Js->get('.reload')->event('click',"$(this).prev().attr('src', $(this).prev().attr('src') + '?' + new Date().getTime())");
?>