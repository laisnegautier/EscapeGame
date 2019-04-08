<div id="sendAnswer">
    <textarea id="answer" name="answer" type="text" placeholder="Répondez ici"></textarea>
    <br />
    <button class="btn btn-secondary" onclick="SendAnswerGM(<?= $_GET['idGamestate'] ?>); ClearHelpForm(answer)">Envoyer</button>
</div>