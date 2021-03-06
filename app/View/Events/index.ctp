
<?php echo $this->element('admin_menu'); ?>
<?php
$key = md5(uniqid(rand(), true));
CakeSession::write('Event.key', $key);
CakeSession::write('Event.id', $id);
?>
<div class="data-form">
    <table class="table table-hover"> 
        <thead>
            <tr> 
                <th>Nom</th>
                <th>Adresse</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Places libres</th>
                <th>Plaves réservées</th>
                <th>Visualiser</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr> 
        </thead>
        <tbody>
            <?php 
            $page = array_search(true, $pages);
            $max = (($itemPerPage * $page - 1) < count($events) - 1) ? ($itemPerPage * $page - 1) : count($events) - 1;
            ?>
            <?php for ($i = ($page - 1) * $itemPerPage; $i <= $max; ++$i): ?>
            <tr class="<?php echo ($i % 2) ? 'colored' : 'uncolored' ?>">
                <td><?php echo $events[$i]['Event']['name']; ?></td>
                <td><?php 
                $address = $events[$i]['Event']['street_number'] . ", " . $events[$i]['Event']['street_name'] . " " . $events[$i]['Event']['zip_code'] . " " . $events[$i]['Event']['city_name'];
                echo $address; ?></td>
                <td><?php echo $events[$i]['Event']['date'] . " / " . $events[$i]['Event']['start_time']; ?></td>
                <td><?php echo $events[$i]['Event']['date'] . " / " . $events[$i]['Event']['end_time']; ?></td>
                <td><?php echo $events[$i]['Event']['seat_number']; ?></td>
                <td><?php echo $events[$i]['Event']['seat_reserved']; ?></td>
                <td><span class="glyphicon glyphicon-search"></span></td>
                <td><?php echo $this->Form->postLink(
                    '<span class="glyphicon glyphicon-pencil"></span>',
                    array('action' => 'edit', 'page' => array_search(true, $pages), 'id' => $events[$i]['Event']['id']),
                    array('escape' => false, 'confirm' => 'Etes-vous sûr de vouloir modifier cet évènement?'));
                    ?></td>
                    <td><?php echo $this->Form->postLink(
                        '<span class="glyphicon glyphicon-remove"></span>',
                        array('action' => 'delete', 'page' => array_search(true, $pages), 'id' => $events[$i]['Event']['id']),
                        array('escape' => false, 'confirm' => 'Etes-vous sûr de vouloir supprimer cet évènement ?'));
                        ?></td>
                    </tr>
                <?php endfor; ?> <?php unset($events); ?>
            </tbody>
        </table>
        <ul class="pagination">
            <li><?php echo $this->Html->link('&laquo', array('action' => 'index', 'page' => array_search(true, $pages) - 1, 'id' => null), array('escape' => false)); ?></li> 
            <?php foreach ($pages as $ind => $is_page): ?>
            <li class="<?php echo ($is_page) ? 'active' : 'inactive'; ?>"> 
                <?php echo $this->Html->link($ind . '<span class="sr-only">(current)</span>', array('action' => 'index', 'page' => $ind, 'id' => ''), array('escape' => false)); ?>
            </li>
        <?php endforeach; ?>
        <li><?php echo $this->Html->link('&raquo', array('action' => 'index', 'page' => array_search(true, $pages) + 1, 'id' => ''), array('escape' => false)); ?></li>
    </ul>
    <?php echo $this->Form->create('Event', array('class' => 'form-horizontal', 'controller' => 'events', 'action' => 'add'));?>
    <div class="form-group"> 
        <h3>Merci de remplir les champs suivants afin de créer une nouvelle cérémonie :</h3> 
    </div> <!-- end of form-group -->
    <div class="form-group">
        <label for="date" class="col-md-4 control-label">Date de la cérémonie :</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="event_date" name="date" value="<?php echo $event_to_edit['Event']['date']; ?>">
        </div> <!-- end of col-md-4 -->
    </div> <!-- end of form-group -->
    <div class="form-group">
        <label for="start_time" class="col-md-4 control-label">Heure de début :</label>
        <div class="col-md-4">
            <input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $event_to_edit['Event']['start_time']; ?>">
        </div> <!-- end of col-md-4 -->
    </div> <!-- end of form-group -->
    <div class="form-group">
        <label for="end_time" class="col-md-4 control-label">Heure de fin :</label>
        <div class="col-md-4">
            <input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo $event_to_edit['Event']['end_time']; ?>">
        </div> <!-- end of col-md-4 -->
    </div> <!-- end of form-group -->
    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Nom du lieu :</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $event_to_edit['Event']['name']; ?>" placeholder="Nom du lieu">
        </div> <!-- end of col-md-4 -->
    </div> <!-- end of form-group -->
    <div class="form-group">
        <label class="col-md-4 control-label">Adresse du lieu :</label>
        <div class="col-md-12"> 
            <div class="col-md-6">
              <label for="street_number" class="col-md-6 control-label">N° Rue/Bd/Av :</label>
              <div class="col-md-6">
                <input type="number" class="form-control" id="street_number" name="street_number" placeholder="N° Rue/Bd/Av" value="<?php echo $event_to_edit['Event']['street_number'] ?>"> 
            </div> <!-- end of col-md-6 -->
            <label for="street_name" class="col-md-6 control-label">Add :</label>
            <div class="col-md-6"> 
                <input type="text" class="form-control" id="street_name" name="street_name" placeholder="Nom de la Rue/Bd/Av" value="<?php echo $event_to_edit['Event']['street_name']?>">
            </div> <!-- end of col-md-6 -->
        </div> <!-- end of col-md-6 -->
        <div class="col-md-6"> 
           <label for="zip_code" class="col-md-6 control-label">CP :</label>
           <div class="col-md-6"> 
             <input type="number" class="form-control" id="zip_code" name="zip_code" placeholder="Code postal" value="<?php echo $event_to_edit['Event']['zip_code'] ?>">
         </div> <!-- end of col-md-6 -->
         <label for="city_name" class="col-md-6 control-label">Ville :</label>
         <div class="col-md-6"> 
           <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Nom de la ville" value="<?php echo $event_to_edit['Event']['city_name'] ?>">
       </div> <!-- end of col-md-6 -->
   </div> <!-- end of col-md-6 -->
</div> <!-- end of col-md-12 -->
</div> <!-- end of form-group -->
<div class="form-group">
    <label for="seat_number" class="col-md-4 control-label">Nombre de places :</label>
    <div class="col-md-4">
        <input type="number" class="form-control" id="seat_number" name="seat_number" value="<?php echo $event_to_edit['Event']['seat_number']; ?>">
    </div> <!-- end of col-md-4 -->
</div> <!-- end of form-group -->
<div class="form-group">
    <label for="seat_reserved" class="col-md-4 control-label">Nombre de places réservées :</label>
    <div class="col-md-4">
        <input type="number" class="form-control" id="seat_reserved" name="seat_reserved" value="<?php echo $event_to_edit['Event']['seat_reserved']; ?>">
    </div> <!-- end of col-md-4 -->
</div> <!-- end of form-group -->
<input type="text" style="visibility: hidden" id="key" name="key" value="<?php echo $key;?>"/>
<input type="text" style="visibility: hidden" id="id" name="id" value="<?php echo $id;?>"/>
<div class="form-group">
    <?php echo $this->Form->end(array(
        'label' => 'Enregistrer',
        'id' => 'submit-button'
        ));?>
    </div> <!-- end of form-group -->
</div> <!-- end of data-form -->