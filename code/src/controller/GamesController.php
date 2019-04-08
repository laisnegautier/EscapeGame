<?php

// CONTROLLER USED DURING A PLAYED GAME
// Function names are pretty clear

require_once('src/model/Manager.php');
require_once('src/model/GameManager.php');

/*
// ACTIONS BEFORE GAME
*/

function NewGame($err = NULL) {
    $animationOk = true;
    $detailsGame = Game::DetailsGames();
    require('src/view/components/newgame/allGames.php');
  
    require('src/view/components/home/launchButton.php');
    require('src/view/components/home/logoutButton.php');

    require('src/view/templates/homeActions.php');
}

function AskNewGame($idGame, $idTeam, $timer, $idGM) {
    Game::InsertNewGame($idGame, $idTeam, $timer, $idGM);

    redirect('index.php?action=waitGM');
}

function GMChoice($err = NULL) {
    $allGM = GM::GetAllConnectedGM(); 
    require('src/view/components/newgame/searchGM.php');
   
    require('src/view/components/home/launchButton.php');
    require('src/view/components/home/logoutButton.php');
    
    require('src/view/templates/homeActions.php');
}

function WaitForGMLoad($team, $err = NULL) {
    $gamestate = new Game($team->getIdTeam());
    
    // ISSUE : 0 considered as NULL so need to check if a date has been entered
    // The game has been validated
    if($gamestate->getValidationState() == 1)  echo '<div style="margin-bottom: 40px"><em>La partie a été acceptée par le maître du jeu. Appuyez sur le bouton ci-dessous pour accéder à la partie.</div></em><a class="linkGM" href="index.php?action=play" title="Lancer le jeu" alt="Lancer le jeu">Jouer !</a>';
    else if($gamestate->getValidationState() == 0 && $gamestate->getValidationDate() != 0 && $gamestate->getValidationDate() != "2000-01-01 00:00:00") echo '<div style="margin-bottom: 40px"><em>La partie a été refusée par le maître du jeu.</div></em><a class="linkGM" href="index.php" title="Accueil" alt="Accueil">Retourner à l\'accueil</a>';
    else {        
        // GM too long to respond
        if($gamestate->TimeWaitingGreaterThan5Min()) echo '<div style="margin-bottom: 40px"><em>La partie a été annulée car le maître du jeu n\'a pas répondu depuis plus de 5 minutes.</div></em><a class="linkGM" href="index.php" title="Accueil" alt="Accueil">Retourner à l\'accueil</a>';
        // Display a waiting page
        else echo '<img src="public/img/home/loading.png" title="Veuillez patienter..." alt="Veuillez patienter..." style="width: 70px; margin-bottom: 40px; animation: spin 1s linear infinite"><br /><a class="linkGM" href="index.php?action=" title="Annuler la demande" alt="Annuler la demande">Annuler la demande</a>';
    }
}

function WaitForGM($team, $err = NULL) {
    require('src/view/components/newgame/waitingGM.php');
    require('src/view/components/home/launchButton.php');
    require('src/view/components/home/logoutButton.php');
    
    require('src/view/templates/homeActions.php');
}

function GameRefused($err = NULL) {
    require('src/view/components/newgame/gameRefused.php');

    require('src/view/templates/newgame.php');
}

/*
// GAME HAS STARTED
*/

// Concerns everything that is static during the game (quit button, timer etc...)
function Play($team) {
    $gamestate = new Game($team->getIdTeam());
    $gameInfos = $gamestate->GetGameInfos();
    $gamestate->setGameFinished(0);
    $nameGM = $gamestate->GetNameGM();

    require('src/view/templates/play.php');
}

function GetMusic($team) {
    $gamestate = new Game($team->getIdTeam());
    $gameInfos = $gamestate->GetGameInfos();

    require('src/view/components/play/music.php');
}

function UpdateLastStep($team, $step) {
    $gamestate = new Game($team->getIdTeam());
    $riddle = $gamestate->GetRiddleInfos($step);

    // UPDATE LAST STEP
    if($gamestate->getLastStepValidated() <= $step-1) $gamestate->setLastStepValidated($step-1);
}

function GetTimer($team) {
    $gamestate = new Game($team->getIdTeam());
    $gameInfos = $gamestate->GetGameInfos();

    $leftTime = $gamestate->GetTimeLeft($gameInfos['timeMaxGame']);

    // IF PLAY WITH A TIMER
    if($gamestate->getTimer() == 1) {
        // RED COLOR
        if($leftTime <= 5*60 && $leftTime > 0) $timer = "CHRONO : <span style='color: brown;'>" . gmdate("H:i:s", $leftTime) . "</span>";
        else if($leftTime <= 0) {
            $timer = "CHRONO : GAME OVER";
            require('src/view/components/play/timerRedirect.php');
        }
        else $timer = "CHRONO : " . gmdate("H:i:s", $leftTime);
    }
    else $timer = "SANS CHRONO";
    
    require('src/view/components/play/timer.php');
}

function EndChrono($team, $idGamestate) {
    date_default_timezone_set('Europe/Paris'); 

    $gamestate = new Game($team->getIdTeam());
    Game::EndGame($gamestate->getIdGamestate());
    $gamestate->setGameFinished(1);

    $nowDate = (new DateTime())->format('Y-m-d H:i:s');
    
    $gamestate->setEndGameDate($nowDate);
    $gamestate->setVictory(0);

    require('src/view/components/play/timerEnd.php');
   
    require('src/view/components/home/launchButton.php');
    require('src/view/components/home/logoutButton.php');
    
    require('src/view/templates/homeActions.php');
}

function Quit($team, $idGamestate) {    
    date_default_timezone_set('Europe/Paris'); 

    $gamestate = new Game($team->getIdTeam());
    $nowDate = (new DateTime())->format('Y-m-d H:i:s');
    $gamestate->setEndGameDate($nowDate);
    $gamestate->setVictory(0);

    require('src/view/components/play/quit.php');
   
    require('src/view/components/home/launchButton.php');
    require('src/view/components/home/logoutButton.php');
    
    require('src/view/templates/homeActions.php');
}

function GetNumberRiddle($team, $step) {      
    $gamestate = new Game($team->getIdTeam());
    $totalRiddles = $gamestate->GetTotalRiddles();
    $riddle = $gamestate->GetRiddleInfos($step);

    require('src/view/components/play/numberRiddle.php');
}

function GetPreviousRiddle($team, $step, $first = NULL) {
    $gamestate = new Game($team->getIdTeam());
    $riddle = $gamestate->GetRiddleInfos($step);

    if($first == 1) require('src/view/components/play/previousRiddleFirst.php');
    else require('src/view/components/play/previousRiddle.php');
}

function GetNextRiddle($team, $step) {
    require('src/view/components/play/nextRiddle.php');
}

function GetNextRiddleValidated($team, $step) {
    $gamestate = new Game($team->getIdTeam());
    $riddle = $gamestate->GetRiddleInfos($step);

    require('src/view/components/play/nextRiddleValidated.php');
}

function GetVictory($team, $idGamestate)  {
    $gamestate = new Game($team->getIdTeam());
    
    $gamestate->setLastStepValidated($gamestate->getLastStepValidated() + 1); // Not been taken into account because redirecting at last one validated

    $gamestate->setGameFinished(1);
    $nowDate = (new DateTime())->format('Y-m-d H:i:s');
    $gamestate->setEndGameDate($nowDate);
    $gamestate->setVictory(1);
    date_default_timezone_set('Europe/Paris'); 

    require('src/view/components/play/victory.php');

    require('src/view/components/home/launchButton.php');
    require('src/view/components/home/logoutButton.php');
    
    require('src/view/templates/homeActions.php');
}

function GetAnswerForm($team, $step) {
    $gamestate = new Game($team->getIdTeam());
    $riddle = $gamestate->GetRiddleInfos($step);

    require('src/view/components/play/answerForm.php');
}

function GetValidationRiddle($team, $step) {
    $gamestate = new Game($team->getIdTeam());
    $riddle = $gamestate->GetRiddleInfos($step);

    require('src/view/components/play/validationRiddle.php');
}

function GetTip($team, $step) {
    $gamestate = new Game($team->getIdTeam());
    $riddle = $gamestate->GetRiddleInfos($step);

    require('src/view/components/play/tip.php');
}

function UpdateResolution($team, $step) {
    $gamestate = new Game($team->getIdTeam());
    $riddle = $gamestate->GetRiddleInfos($step);

    if($gamestate->IssetResolution($riddle['idRiddle'])) $gamestate->NewResolution($riddle['idRiddle']);

    // WE HAVE BY THIS FUNCTION ALL THE RESOLUTION TIME OF A RIDDLE
    // Indeed, step2Date - step1Date gives us the resolution time of step1
    // For the last riddle, we can look at endGameDate from $gamestate, then -lastStepDate
}

/*
// AFTER THE GAME
*/
function Review($idGamestate, $gameReview) {    
    Game::GameReview($idGamestate, $gameReview);

    redirect('index.php');
}