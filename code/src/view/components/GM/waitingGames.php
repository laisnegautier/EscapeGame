<?php 
$h3 = "Jeux en attente";
$h5 = "Tous les jeux affichés attendent une réponse de votre part";

ob_start(); 

if(empty($waitingGames)) echo '<div class="alert alert-info" role="alert">Aucune équipe ne demande à jouer !</div>';
else { ?>
   <div class="card-columns">
      <?php foreach($waitingGames as $detailsLine) { ?>      
      <div class="card">
         <div class="card-body">
            <div class="container">
               <p class="card-title"><b><?= $detailsLine['titleGame'] ?></b>, demandé par <b><?= $detailsLine['nameTeam'] ?></b> (<?php if($detailsLine['timer'] == 1) echo "avec"; else echo "sans"?> chrono)</p>
            </div>
            
            <div class="container">
               <p class="card-text"><a href="gamemaster.php?action=validation&validate=1&gamestate=<?= $detailsLine['idGamestate'] ?>" title="Valider la demande" alt="Valider la demande"><span class="victory">Accepter</a></span>
               <p class="card-text"><a href="gamemaster.php?action=validation&validate=0&gamestate=<?= $detailsLine['idGamestate'] ?>" title="Annuler la demande" alt="Annuler la demande"><span class="fail">Refuser</a></span>
               <p class="card-text"><span>Demandé le <?= $detailsLine['demandDate'] ?></span></p>
            </div>
         </div>
      </div>
      <?php } 
   } ?>
</div>

<?php $content = ob_get_clean(); ?>
