
<?php echo $this->element('Menus/applicant_menu'); ?>
<!-- <div class="main-body"> -->
    <!-- // <?php foreach ($applicants as $applicant): ?> -->
    <!-- <div class="col-md-12 seeker">  -->
        <!-- <h3><?php echo $applicant['Profile']['first_name']." ".$applicant['Profile']['last_name']; ?></h3> -->
       <!--  <?php 
        if ($applicant['Profile']['eligibility'] == "NO") {
            echo "<p>Vous n'êtes pas éligible à la garantie BPI France.</p>";
        } else if ($applicant['Profile']['is_payed']) {
            echo "<div id=\"paid\"><span class=\"label label-warning\">Payée</span></div>";
        } else if ($applicant['Profile']['eligibility'] == "70" || $applicant['Profile']['eligibility'] == "50") {
            echo "<p>Vous êtes éligible à la garantie BPI France à hauteur de <strong>{$applicant['Profile']['eligibility']}%</strong>. Merci de régler vos cotisations pour en bénéficier</p>";
            echo "<button type=\"button\" id=\"approval\" class=\"btn btn-primary\">Payer la garantie</button>";
            echo "<button type=\"button\" id=\"refusal\" class=\"btn btn-primary\">Refuser la garantie</button>";
        }
        ?> -->
   <!--  </div> --> <!-- end of seeker -->
<!-- // <?php endforeach; ?> <?php unset($applicants); ?> -->
<!-- </div> end of main-body -->
<center> 
    <h1 style="margin-top:100px;">Don't panic, it's coming very soon</h1>
</center>
