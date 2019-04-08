<?php 
$h3 = "Jeux en cours";
$h5 = "Les jeux affichés sont ceux actuellement joués par des équipes";

ob_start(); 

if(empty($currentGames)) echo '<div class="alert alert-info" role="alert">Il n\'y a aucun jeu en cours !</div>';
else { ?>
   <div class="card-columns">
      <?php foreach($currentGames as $detailsLine) { ?>      
      <div class="card">
         <div class="card-body">
            <div class="container">
               <p class="card-title"><b><?= $detailsLine['titleGame'] ?></b>, joué par <b><?= $detailsLine['nameTeam'] ?></b> (<?php if($detailsLine['timer'] == 1) echo "avec"; else echo "sans"?> chrono)</p>
               <p class="card-text"><span class="current">En cours</span>
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
<?php 

$content = ob_get_clean(); ?>