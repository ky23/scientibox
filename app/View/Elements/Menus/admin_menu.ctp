
<div class="vertical-menu">
    <div id="menu">
        <ul class="nav nav-pills nav-stacked"> 
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'index') && $this->params['controller'] == 'companies') ? 'active' : 'inactive' ?>">
                <?php echo $this->Html->link('<span id="company" class="glyphicon glyphicon-th-large"></span> Sociétés',
                array('controller' => 'companies', 'action' => 'index'), array('escape' => false));?>
            </li>
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'index') && $this->params['controller'] == 'events') ? 'active' : 'inactive' ?>">
                <?php echo $this->Html->link('<span id="calendar" class="glyphicon glyphicon-calendar"></span> Evénements',
                array('controller' => 'events', 'action' => 'index'), array('escape' => false));?>
            </li>
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'index') && $this->params['controller'] == 'notifications')?'active' : 'inactive' ?>">
                <?php echo $this->Html->link('<span id="notifications" class="label label-danger">0</span> Notifications',
                array('controller' => 'notifications', 'action' => 'authentication_notifs'), array('escape' => false));?>
            </li>
        </ul>
    </div> <!-- end of menu -->
    <button type="button" id="show-menu" class="btn btn-default" onclick="showMenu()"> 
        <span id="glyphicon" class="glyphicon glyphicon-chevron-down"></span>
    </button>
</div> <!-- end of vertical-menu -->
<?php echo $this->Html->script(array('notifications')); ?>