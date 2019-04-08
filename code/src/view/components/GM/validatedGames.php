<?php 
$h3 = "Jeux validés";
$h5 = "Tous les jeux affichés ont été validés par vos soins";

ob_start(); 

if(empty($validatedGames)) echo '<div class="alert alert-info" role="alert">Vous n\'avez pas encore validé de jeu !</div>';
else { ?>
   <div class="card-columns">
      <?php foreach($validatedGames as $detailsLine) { ?>      
      <div class="card">
         <div class="card-body">
            <div class="container">
               <p class="card-title"><b><?= $detailsLine['titleGame'] ?></b>, joué par <b><?= $detailsLine['nameTeam'] ?></b> (<?php if($detailsLine['timer'] == 1) echo "avec"; else echo "sans"?> chrono)</p>
               <p class="card-text"><?php if($detailsLine['victory'] == 1) echo '<span class="victory">Victoire'; else echo '<span class="fail">Défaite'; ?></span>
            </div>
            <div class="container">
               <p class="card-text"><span>Demandé le <?= $detailsLine['demandDate'] ?></span></p>
               <p class="card-text"><span>Validé le <?= $detailsLine['validationDate'] ?></span></p>
            </div>
         </div>
      </div>
      <?php } 
   } ?>
</div>

<?php $content = ob_get_clean(); ?>