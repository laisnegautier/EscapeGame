<div id="riddle">
    <h3><?= $riddle['titleRiddle'] ?></h3>
    <hr class="style11" />
    <p id="description" class="scrollbar"><?= $riddle['descriptionRiddle'] ?></p>
    
    <div class="response">Réponse : 
        <?php if($riddle['step'] <= $gamestate->getLastStepValidated()) {?>
         <input id="answer" type="text" maxlength="25" name="answer" onkeyup="PressEnter()" autocomplete="off" autofocus required placeholder="<?= $riddle['answerRiddle'] ?>" readonly />
        <?php } else {?>
        <input id="answer" type="text" maxlength="25" name="answer" onkeyup="PressEnter()" autocomplete="off" autofocus required />
        <button id="sendAnswer" onclick="CheckAnswerRiddle('<?= $riddle['answerRiddle'] ?>', '<?= $riddle['step'] ?>', '<?= $gamestate->getLastStepValidated() ?>', '<?= $gamestate->getTotalRiddles() ?>', '<?= $gamestate->getIdGamestate() ?>')" style="display: none;"></button>
        <?php } ?>
    </div>
</div>