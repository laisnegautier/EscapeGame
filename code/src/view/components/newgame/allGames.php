<?php
$h3 = "Choisir un jeu";

ob_start(); ?>
 
<div class="container d-flex flex-wrap justify-content-between">
<?php foreach($detailsGame as $detailsLine) { ?>    
    <div class="card cardNewGame" style="background-image: url('public/img/backgroundGames/<?= $detailsLine['locationBack1'] ?>')">
        <div class="card-body text-center">
            <h5 class="card-title text-uppercase"><?= $detailsLine['titleGame'] ?></h5>
            <ul class="text-left" style="list-style: none; padding-right: 20px">
                <li><strong>Synopsis :</strong> <?= $detailsLine['descriptionGame'] ?></li>
            </ul>
            <div class="d-flex justify-content-between" style="border-radius: 3px;padding: 10px 30px 0 30px; margin: auto 20px 10px 30px; background-color: rgba(0,0,0,0.5);">
            <ul class="text-left" style="list-style: none; padding: 5px 0 0 0;">
                <li><strong>Résoudre : </strong> <?= Game::GetTotalRiddlesStatic($detailsLine['idGame']) ?> énigmes</li>
                <li><strong>Chrono :</strong> <?= Manager::secToMin($detailsLine['timeMaxGame']) ?> minutes</li>
            </ul> 
            <ul class="text-left" style="list-style: none; padding: 5px 0 0 0;">
                <li><strong>Note :</strong> <?= number_format(Game::ReviewGameAvg($detailsLine['idGame']), 2) ?> / 5</li>
                <li><strong>Joué :</strong> <?= Game::GetNumberPlayedGame($detailsLine['idGame']) ?> fois</li>
            </ul> 
                 </div>  
            <div style="margin: 20px auto;"><a class="timerLink" href="index.php?action=choice&game=<?= $detailsLine['idGame']?>&timer=1" title="Jouer au jeu <?= $detailsLine['titleGame'] ?> avec chrono !" alt="Jouer au jeu <?= $detailsLine['titleGame'] ?> avec chrono !">Jouer avec chrono</a> 
            
            <a class="timerLink" href="index.php?action=choice&game=<?= $detailsLine['idGame']?>&timer=0" title="Jouer au jeu <?= $detailsLine['titleGame'] ?> sans chrono !" alt="Jouer au jeu <?= $detailsLine['titleGame'] ?> sans chrono !">Jouer sans chrono</a>
            </div>
        </div>
    </div>

<?php } ?>
</div>

<?php $content = ob_get_clean(); ?>