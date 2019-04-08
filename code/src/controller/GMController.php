<?php

// CONTROLLER USED FOR GAMEMASTER CONNECTION AND HIS HOME DISPLAY

require_once('src/model/Manager.php');
require_once('src/model/GameManager.php');
require_once('src/model/GMManager.php');
require_once('src/model/HelpManager.php');

/*
// MAIN DISPLAY
*/

// All games currently supervised by the GM
function CurrentGames($gm, $err = NULL) {
    $currentGames = $gm->AllCurrentGames();
    require('src/view/components/GM/currentGames.php');

    require('src/view/templates/GM.php');
}

// All games validated by the GM
function ValidatedGames($gm, $err = NULL) {
    $validatedGames = $gm->AllValidatedGames();

    require('src/view/components/GM/validatedGames.php');

    require('src/view/templates/GM.php');
}

// All games refused by the GM
function RefusedGames($gm, $err = NULL) {
    $refusedGames = $gm->AllRefusedGames();
    require('src/view/components/GM/refusedGames.php');

    require('src/view/templates/GM.php');
}

// All games refused by waiting too long
function RefusedWaitedGames($gm, $err = NULL) {
    $refusedWaitedGames = $gm->AllRefusedWaitedGames();
    require('src/view/components/GM/refusedWaitedGames.php');

    require('src/view/templates/GM.php');
}

/*
// AUTOMATIC UPDATES OF THE GAMES THAT HAVE BEEN LEFT (QUIT BROWSER)
*/

function UpdateRefusedGames() {
    Game::UpdateRefusedGames();
}

function UpdateLongGames()  {
    Game::UpdateLongGames();
}

/*
// VALIDATION STEPS
*/

// Main page
function ValidationGM($err = NULL) {
    $waitingGames = GM::GetWaitingGames();
    require('src/view/components/GM/waitingGames.php');

    require('src/view/templates/GM.php');
}

// Action: To validate a game
function ValidateGame($validationState, $idGamestate, $err = NULL) {
    GM::ValidateGame($validationState, $idGamestate);
    
    if($validationState == 1) ValidationGM("Le jeu a été validé !");
    else ValidationGM("Le jeu a été refusé !");
}

/*
// CONNECTION AND ALL
*/

function ConnectionPage($err = NULL) {
    require('src/view/components/GM/connectionGM.php');
}

function ConnectionGM($nameGM, $passwordGM) {
    $_SESSION['id'] = GM::SessionInitGM($nameGM, $passwordGM)[0];
    $_SESSION['role'] = "gamemaster";

    $gm = new GM($_SESSION['id']);
    $gm->setConnected(1);

    redirect('gamemaster.php');
}

function LogoutGM($gm) {
    $gm->Logout();
    
	redirect('gamemaster.php');
}

/*
// MESSAGES PAGES
*/

function ThoseAskingForHelp($gm, $err = NULL) {
    $allCurrentGames = $gm->AllCurrentGames(); 
    require('src/view/components/GM/helpList.php');

    require('src/view/templates/GM.php');
}

function Chat($gm, $err = NULL) {
    require('src/view/components/GM/messagesGM.php');

    $allCurrentGames = $gm->AllCurrentGames(); 
    require('src/view/components/GM/helpList.php');

    require('src/view/templates/GM.php');
}