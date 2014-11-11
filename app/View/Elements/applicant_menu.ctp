<div class="vertical-menu">
    <div id="menu">
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'edit_company') && $this->params['controller'] == 'companies') ? 'active' :'inactive' ?>">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-th-large"></span> Entreprise',
                array('controller' => 'companies', 'action' => 'edit_company'), array('escape' => false)); ?> 
            </li>
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'edit_profile') && $this->params['controller'] == 'profiles') ? 'active' :'inactive' ?>">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span> Demandeurs',
                array('controller' => 'profiles', 'action' => 'edit_profile'), array('escape' => false)); ?>
            </li>
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'warrantly') && $this->params['controller'] == 'profiles') ? 'active' :'inactive' ?>">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> Paiement BPI / AXA',
                array('controller' => 'profiles', 'action' => 'warrantly'), array('escape' => false)); ?>
                <li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'inscription') && $this->params['controller'] == 'companies') ? 'active' :'inactive' ?>">
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-calendar"></span> Dates d\'inscription',
                    array('controller' => 'companies', 'action' => 'inscription'), array('escape' => false)); ?>
                </li>
                <li class="deconnexion">
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-off"></span> Me déconnecter',
                    array('controller' => 'applicants', 'action' => 'logout'), array('escape' => false)); ?>
                </li>
            </ul>
        </div> <!-- end of menu -->
   <!--  <button type="button" id="show-menu" class="btn btn-default" onclick="showMenu()"> 
        <span id="glyphicon" class="glyphicon glyphicon-chevron-down"></span>
    </button> -->
</div> <!-- end of vertical-menu -->