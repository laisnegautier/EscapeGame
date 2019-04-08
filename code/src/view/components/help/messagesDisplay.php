<div>
<div class="questionHelp" style="margin-top: 20px;">N'hésitez pas à envoyer des messages au maître du jeu si vous êtes bloqué !</div>
<?php 
if(empty($allMessages))
{ echo "Lancez la discussion :) !";
} else {
    foreach($allMessages as $message) { ?>
    
        
        <?php if($message[1] != NULL)
        {
            echo '<div class="questionHelp">' . $message[1]; 
        }
        else {
            echo '<div class="answerHelp">' . $message[3]; 
        }?>
        <span><?= $message[2] ?></span></div>
</div>
<?php } 
}?>
</div>