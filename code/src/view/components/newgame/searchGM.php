<?php ob_start(); ?>

<div class="container d-flex flex-wrap justify-content-around">    
    <div class="card" style="width: 400px">
        <div class="card-body text-center d-flex flex-column">
            <h5 class="card-title text-uppercase">Choisir un maitre du jeu</h5>
            <?php if(count($allGM) == 0) { echo "<strong>Aucun maître du jeu n'est connecté. Rechargez la page ou reconnectez-vous plus tard.</strong>";}
                else {
                    foreach($allGM as $detailsLine) { ?>      
                <a class="linkGM" href="index.php?action=choice&game=<?= $_GET['game'] ?>&timer=<?= $_GET['timer']?>&gamemaster=<?= $detailsLine['idGM'] ?>" title="Demander à <?= $detailsLine['nameGM'] ?>" alt="Demander à  <?= $detailsLine['nameGM'] ?>"><?= $detailsLine['nameGM'] ?></a>
            <?php } ?>
            <em style="font-size: .9em">Seulement ceux connectés sont affichés</em>
            <?php }?>      
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>