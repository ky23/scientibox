 <div class="form-group">
   <table class="table table-hover">
    <thead>
      <tr> 
        <th>Associés demandeurs de prêt</th>
        <th>Nombre de parts</th>
        <th>Parts en %</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($applicants as $ind => $applicant): ?> 
      <tr class="<?php echo ($ind % 2) ? 'colored' : 'uncolored' ?>">
       <td><?php echo ($applicant['Profile']['first_name'] . " " . $applicant['Profile']['last_name'])?></td>
       <td>
        <?php echo $this->Form->input('Profile.' . $applicant['Profile']['id'] . '.shares', array(
         'type' => 'text',
         'label' => false,
         'class' => 'form-control',
         'placeholder' => 'Nombre d\'actions total',
         'id' => 'shares_' . $applicant['Profile']['id']
         )); ?>
       </td>
       <td>
        <div id="pourcentage_shares_<?php echo $applicant['Profile']['id'];?>"><?php 
        if ($total_shares) {
          echo round($applicant['Profile']['shares'] * 100 / $total_shares, 2);
        } else {
          echo 0;
        }
        ?></div>
      </td>
    </tr>
  <?php endforeach; ?> <?php unset($applicants); ?>
</tbody>
</table>
</div> <!-- end of form-group -->