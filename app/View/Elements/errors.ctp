<?php // views/elements/errors.ctp
if (!empty($errors)) { ?>
<div class="errors">
    <h4>Vous avez <?php echo count($errors); ?> erreur(s):</h4>
    <ul class="list-unstyled">
        <?php foreach ($errors as $field => $error) { ?>
        <li><span class="glyphicon glyphicon-remove"></span><?php echo $error[0]; ?></li>
        <?php } ?>
    </ul>
</div>
<?php } ?>