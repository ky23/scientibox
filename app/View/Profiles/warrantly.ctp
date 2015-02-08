<?php echo $this->element('Menus/applicant_menu'); ?>
<div class="data-form">
    <?php echo $this->Form->create('Profile', array(
       'id' => 'Profile',
       'class' => 'form-horizontal'
       )); ?>
       <h2>Récapitulatif des montants relatifs au prêt d'honneur</h2>
       <table class="table table-hover">
        <thead>
          <tr> 
            <th>Associés demandeurs de prêt</th>
            <th>Taux de garantie</th>
            <th>BPI</th>
            <th>AXA</th>
        </tr>
    </thead>
    <tbody>
      <?php foreach ($applicants as $ind => $applicant): ?> 
      <tr class="<?php echo ($ind % 2) ? 'colored' : 'uncolored' ?>">
       <td><?php echo $applicant['Profile']['first_name'] . " " . $applicant['Profile']['last_name'];?></td>
       <td><?php echo $applicant['Profile']['eligibility'] . '%';?></td>
       <td>
        <?php echo $this->Form->checkbox('Bpi', array(
          'legend' => false,
          'class' => 'css-checkbox',
          'value' => '100',
          'id' => 'bpi-' . $applicant['Profile']['id']
          )); ?>
          <label for="bpi-<?php echo $applicant['Profile']['id']; ?>" class="css-label">100 €</label> 
      </td>
      <td>
        <?php echo $this->Form->checkbox('Axa', array(
          'legend' => false,
          'value' => '200',
          'class' => 'css-checkbox',
          'id' => 'axa-' . $applicant['Profile']['id']
          )); ?>
          <label for="axa-<?php echo $applicant['Profile']['id']; ?>" class="css-label">200 €</label>
      </td>
  </tr>
<?php endforeach; ?> <?php unset($applicants); ?>
</tbody>
</table>
<div class="total"> 
    <h3>Total: <span id="total" class="label label-default"> 0 </span><span id="total" class="glyphicon glyphicon-euro"></span></h3>
    <h4>Merci de préparer les chèques relatifs aux frais de gestions de la garantie BPI, ainsi que les chèques relatifs à l'assurance invalidité/décès d'AXA</h4>
    <h2>En l'absence des règlements de ces garanties, les prêts ne seront pas décaissés lors de la signature du contrat</h2>
</div>
<?php echo $this->Form->end(array(
    'label' => 'Payer',
    'id' => 'next-button'
    )); ?>
</div>
<script>
$(function() {
    var total = 0;
    $('[id*=bpi-], [id*=axa-]').on("change", function() {
        console.log($(this).val());
        if ($(this).prop('checked'))
          total += +$(this).val();
        else
          total -= +$(this).val();
        $('#total').text(total);
    });
});
</script>
