<div>
<?php 
if(empty($allMessages))
{ echo '
    <div class="alert alert-info" role="alert">Envoyez-leur un message !</div>
';
} else {
    foreach($allMessages as $message) { ?>
        
        <?php if($message[1] != NULL)
        {
            echo '<div class="demandMsgGM col-sm-12">' . $message[1]; 
        }
        else {
            echo '<div class="answerMsgGM col-sm-12">' . $message[3]; 
        }?>
        <p style="font-size: .8em;"><?= $message[2] ?></p></div>
    </div>
<?php } 
}?>
</div>