 <!-- File: /app/View/About/index.ctp -->
 <div class="row">
    <div class="span6" id="about">
        <div class="ml">
            <h2>Mentions légales</h2>
            <span class="span">
                La plateforme
                <strong>
                   <?php echo $this->Html->link('www.scientibox.com',
                   array('controller' => 'main', 'action' => 'index'));?>
               </strong>
               et les services présents sur cette page vous sont proposés par&nbsp;:
           </span>
       </div> <!-- end of mt -->
       <div class="sc">
        <br>
        <h2>Scientipôle Initiative</h2>
    </div>
    <div>
        <span>Campus Universitaire d’Orsay</span>
    </div>
    <div>
        <span>Bâtiment 503</span>
    </div>
    <div>
        <span>91893 Orsay Cedex, France</span>
    </div>
    <br>
    <div>
        <span>Le contenu du site est modéré par notre community manager.</span>
    </div>
    <br>
    <div>
        <span>Scientibox.fr est hébergé par <strong>OVH</strong>&nbsp;:</span>
    </div>
    <br>
    <div>
        <span>SAS au capital de <strong>10 000 000 €</strong>&nbsp;</span>
    </div>
    <div>
        <span>RCS Roubaix – Tourcoing 424 761 419 00045</span>
    </div>
    <div>
        <span>Code APE 6202A</span>
    </div>
    <div>
        <span>N° TVA : FR 22 424 761 419</span>
    </div>
    <div>
        <span>Siège social : 2 rue Kellermann - 59100 Roubaix - France.</span>
    </div>
    <br>
    <div>
        <span>Pour toute question, vous pouvez nous contacter via le formulaire disponible <?php echo $this->Html->link('ici',
        array('controller' => 'home', 'action' => 'contact'));?></span>
    </div>
</div> <!-- end of span6 -->
    </div> <!-- end of row -->