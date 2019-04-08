<?php

// CONTROLLER USED FOR TEAM CONNECTION AND HOME DISPLAY

require_once('src/model/Manager.php');
require_once('src/model/TeamManager.php');

// On Firefox and Edge there are some issues with a click on next riddle button
function WrongBrowser() {
    require('src/view/components/home/browser.php');
    $linkLeft ="";
    $linkRight = "";

    require('src/view/templates/homeActions.php');
}

/*
// MAIN DISPLAY
*/

function Home($err = NULL) {
    require('src/view/components/home/connectionButton.php');
    require('src/view/components/home/inscriptionButton.php');

    require('src/view/templates/home.php');
}

function HomeConnected($err = NULL) {    
    require('src/view/components/home/launchButton.php');
    require('src/view/components/home/logoutButton.php');

    require('src/view/templates/home.php');
}

/*
// CONNECTION/INSCRIPTION
*/

function ConnectionFormTeam($err = NULL) {
    $animationOk = true;
    require('src/view/components/home/connectionButton.php');
    require('src/view/components/home/inscriptionButton.php');
    require('src/view/components/home/connectionForm.php');

    require('src/view/templates/homeActions.php');
}

function ConnectionTeam($nameTeam, $passwordTeam) {
    try {
        // If there is an error during connection, we display it
        $_SESSION['id'] = Team::SessionInitTeam($nameTeam, $passwordTeam)[0];
        $_SESSION['role'] = "team";
    }
    catch(Exception $err) { ConnectionFormTeam($err->getMessage()); }
    
    redirect('index.php');
}

function InscriptionFormTeam($err = NULL) {
    $animationOk = true;
    require('src/view/components/home/connectionButton.php');
    require('src/view/components/home/inscriptionButton.php');
    require('src/view/components/home/inscriptionForm.php');

    require('src/view/templates/homeActions.php');
}

function InscriptionTeam($nameTeam, $passwordTeam, $players) {
    Team::CreationTeam($nameTeam, $passwordTeam);
    $_SESSION['id'] = Team::SessionInitTeam($nameTeam, $passwordTeam)[0];
    $_SESSION['role'] = "team";
    Team::CreationPlayer($players, $_SESSION['id']);
    
    redirect('index.php');
}

function LogoutTeam() {
	Team::Logout();

	redirect('index.php');
}