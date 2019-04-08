<?php     
$h3 = "Répondre aux messages";
$h5 = "Répondez aux équipes qui demandent de l'aide";

ob_start();

?>
        <!-- ISSUE : Obliged to have this button -->
        <button class="btn btn-secondary" onclick="HelpFormGM(<?= $_GET['idGamestate'] ?>), setInterval(function() { HelpMessagesGM(<?= $_GET['idGamestate'] ?>); }, 1000), this.style.display='none'">
            Ouvrir la discussion
        </button>

        <!-- Help --> 
        <div id="messagesDiv">
            <div id="helpMessagesGM"></div>
            <div id="helpFormGM"></div>
            <div id="SendAnswerGM"></div>
        </div>  
        
<?php $contentMsg = ob_get_clean(); ?>