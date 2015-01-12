 <div class="form-group">
   <table class="table table-hover">
    <thead>
      <tr> 
        <th>Associés demandeurs de prêt</th>
        <th>Montant du prêt</th>
        <th>Affectation du prêt</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($applicants as $ind => $applicant): ?> 
      <tr class="<?php echo ($ind % 2) ? 'colored' : 'uncolored' ?>">
       <td><?php echo ($applicant['Profile']['first_name'] . " " . $applicant['Profile']['last_name']); ?></td>
       <td><?php echo ($applicant['Profile']['loan_amount']); ?></td>
       <td>
        <select id="loan_affectation-<?php echo $applicant['Profile']['id']?>" multiple="multiple" name="Profile[<?php echo $applicant['Profile']['id']; ?>][loan_affectation][]">
          <?php echo (in_array("Capital", $applicant['Profile']['loan_affectation'])) ? "<option value=\"C\" selected>Capital</option>" : "<option value=\"C\">Capital</option>"; ?>
           <?php echo (in_array("Compte courant", $applicant['Profile']['loan_affectation'])) ? "<option value=\"CC\" selected>Compte courant</option>" : "<option value=\"CC\">Compte courant</option>"; ?>
            <?php echo (in_array("Compte courant bloqué", $applicant['Profile']['loan_affectation'])) ? "<option value=\"CCB\" selected>Compte courant bloqué</option>" : "<option value=\"CCB\">Compte courant bloqué</option>"; ?>
        </select>
      </td>
    </tr>
  <?php endforeach; ?> <?php unset($applicants); ?>
</tbody>
</table>
</div> <!-- end of form-group -->
<script>
$(document).ready(function() {
  $("[id*=loan_affectation]").each(function() {
    var select = $(this).attr('id');
    $(this).multiselect({
     onChange: function(element, checked) {
      var selectedOptions = $('#' + select + ' option:selected');
      if (selectedOptions.length == 2) {
        var nonSelectedOptions = $('#' + select + ' option').filter(function() {
          return !$(this).is(':selected');
        });
        var dropdown = $('#' + select).siblings('.multiselect-container');
        nonSelectedOptions.each(function() {
          var input = $('input[value="' + $(this).val() + '"]');
          console.log($(this).val());
          input.prop('disabled', true);
          input.parent('li').addClass('disabled');
        });
      }
      else {
        var dropdown = $('#' + select).siblings('.multiselect-container');
        $('#' + select + ' option').each(function() {
          var input = $('input[value="' + $(this).val() + '"]');
          console.log($(this).val());
          input.prop('disabled', false);
          input.parent('li').addClass('disabled');
        });
      }
    }
  });
  });
});
 </script>