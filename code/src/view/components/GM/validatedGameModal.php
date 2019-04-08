<?php 

$h3 = "Validation du jeu";

ob_start(); ?>
 
<?php
if($validationState == 1)
{ ?>      
    
    <div style="border: 1px solid green">
        Le jeu a été validé
    </div>

<?php }
else { ?>

    <div style="border: 1px solid green">
        Le jeu n'a pas été validé
    </div>

<?php }

$content = ob_get_clean(); ?>
