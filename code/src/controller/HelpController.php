<?php

// CONTROLLER USED TO HANDLE MESSAGES

require_once('src/model/Manager.php');
require_once('src/model/GameManager.php');
require_once('src/model/HelpManager.php');

/*
// FOR THE TEAM
*/

function HelpMessages($team) {
    $gamestate = new Game($team->getIdTeam());
    $allMessages = Help::AllMessages($gamestate->getIdGamestate());

    require('src/view/components/help/messagesDisplay.php');
}

function HelpForm($team) {
    require('src/view/components/help/messagesQuestion.php');
}

function SendQuestion($team, $question) {
    $gamestate = new Game($team->getIdTeam());
    Help::SendQuestion($gamestate->getIdGamestate(), $question); 
}

/*
// FOR THE GAMEMASTER
*/

function HelpMessagesGM($idGamestate) { 
    $idTeam = Game::GetIdTeamNoObject($idGamestate);
    $gamestate = new Game($idTeam);
    $allMessages = Help::AllMessages($idGamestate);

    require('src/view/components/help/messagesDisplayGM.php');
}

function HelpFormGM($gm, $idGamestate) {
    require('src/view/components/help/messagesAnswerGM.php');
}

function SendAnswerGM($idGamestate, $answer) {
    Help::SendAnswer($idGamestate, $answer); 
}