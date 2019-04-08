<?php     
$h3 = "Répondre aux messages";
$h5 = "Répondez aux équipes qui demandent de l'aide";

ob_start();
?> 
<div class="d-flex flex-row justify-content-between">
    <div class="col-sm-7" style="padding: 0;">
    <?php
if(!isset($contentMsg)) {
    ?>
    <div class="alert alert-info" role="alert">Choisissez une équipe pour lancer une discussion avec !</div>

<?php
} else { echo $contentMsg; } ?>
    </div>
    <div class="askingHelp col-sm-4 d-flex flex-column">
        <h4>Dernières demandes</h4>
<?php
foreach($allCurrentGames as $currentGame)
{
    $idAskingForHelp = GM::AskingForHelp($currentGame['idGamestate']);
      
    if($idAskingForHelp) { ?>
        <a href="gamemaster.php?action=help&idGamestate=<?= $currentGame['idGamestate'] ?>" title="Répondre à cette équipe" alt="Répondre à cette équipe"><?= $currentGame['nameTeam'] ?> demande de l'aide</a>
    <?php
    }
} ?>

<h4>Jeux en cours</h4>
<?php
foreach($allCurrentGames as $currentGame)
{?>
        <a href="gamemaster.php?action=help&idGamestate=<?= $currentGame['idGamestate'] ?>" title="Répondre à cette équipe" alt="Répondre à cette équipe"><?= $currentGame['nameTeam'] ?></a>
<?php
}
?>
</div>
</div>
<?php $content = ob_get_clean(); ?>