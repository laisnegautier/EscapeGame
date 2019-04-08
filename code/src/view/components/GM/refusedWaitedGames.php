<?php 
$h3 = "Jeux refusés automatiquement";
$h5 = "Suite à une trop longue attente de validation de votre part (>5min), les jeux suivant ont été automatiquement refusés";

ob_start(); 

if(empty($refusedWaitedGames)) echo '<div class="alert alert-info" role="alert">Aucun jeu n\'a été refusé automatiquement !</div>';
else { ?>
   <div class="card-columns">
      <?php foreach($refusedWaitedGames as $detailsLine) { ?>      
      <div class="card">
         <div class="card-body">
            <div class="container">
               <p class="card-title"><b><?= $detailsLine['titleGame'] ?></b>, demandé par <b><?= $detailsLine['nameTeam'] ?></b> (<?php if($detailsLine['timer'] == 1) echo "avec"; else echo "sans"?> chrono)</p>
            </div>
            <div class="container">
               <p class="card-text"><span class="fail">Refus automatique</span></p>
               <p class="card-text"><span>Demandé le <?= $detailsLine['demandDate'] ?></span></p>
            </div>
         </div>
      </div>
      <?php } 
   } ?>
</div>

<?php $content = ob_get_clean(); ?>