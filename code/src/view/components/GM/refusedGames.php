<?php 
$h3 = "Jeux refusés";
$h5 = "Tous les jeux affichés ont été refusés par vos soins";

ob_start(); 

if(empty($refusedGames)) echo '<div class="alert alert-info" role="alert">Vous n\'avez pas encore refusé de jeu !</div>';
else { ?>
   <div class="card-columns">
      <?php foreach($refusedGames as $detailsLine) { ?>      
      <div class="card">
         <div class="card-body">
            <div class="container">
               <p class="card-title"><b><?= $detailsLine['titleGame'] ?></b>, demandé par <b><?= $detailsLine['nameTeam'] ?></b> (<?php if($detailsLine['timer'] == 1) echo "avec"; else echo "sans"?> chrono)</p>
               <p class="card-text"><span class="fail">Refusé</span>
            </div>
            <div class="container">
               <p class="card-text"><span>Demandé le <?= $detailsLine['demandDate'] ?></span></p>
               <p class="card-text"><span>Refusé le <?= $detailsLine['validationDate'] ?></span></p>
            </div>
         </div>
      </div>
      <?php } 
   } ?>
</div>

<?php $content = ob_get_clean(); ?>