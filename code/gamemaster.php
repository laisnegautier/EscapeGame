<?php
session_start();

// ROUTER PAGE FOR THE GAMEMASTERS
// LAST MODIFICATION : 20/03/2019
// GAUTIER LAISNE
// This router is considered as a secret one, only available to those who knows

require('src/controller/CommonController.php');
require('src/controller/GMController.php');
require('src/controller/HelpController.php');

// Handling unpredicted issues
try {
    // WHEN NOT CONNECTED
    if(!isset($_SESSION['id']) && !isset($_SESSION['role'])) {
        // CONNECTION
        if(isset($_POST['connectionGM'])) {
            if(!empty($_POST['nameGM']) && !empty($_POST['passwordGM'])) {
                try { ConnectionGM($_POST['nameGM'], $_POST['passwordGM']); }
                catch (Exception $e) { ConnectionPage($e->getMessage()); }
            }
            else ConnectionPage("Veuillez remplir tous les champs de connexion !");
        }
        else ConnectionPage();
    }

    // WHEN CONNECTED
    else if(isset($_SESSION['id']) && isset($_SESSION['role'])) {
        if($_SESSION['role'] == "gamemaster") { 
            $gm = new GM($_SESSION['id']);

            if(isset($_GET['action'])) {
                if($_GET['action'] == "help") {
                    if(isset($_GET['idGamestate'])) {                        
                        if(isset($_GET['helpMessages'])) HelpMessagesGM($_GET['idGamestate']);
                        else if(isset($_GET['helpForm'])) HelpFormGM($gm, $_GET['idGamestate']);
                        else if(isset($_GET['sendAnswer'])) SendAnswerGM($_GET['idGamestate'], $_GET['sendAnswer']);
                        else Chat($gm);
                    }
                    else ThoseAskingForHelp($gm);
                }
                else if($_GET['action'] == "validation") {
                    // VALIDATE IN DB AND HANDLES ERRORS IF URL TOUCHED
                    if(isset($_GET['validate'])) ValidateGame($_GET['validate'], $_GET['gamestate']);
                    else throw new Exception("Une erreur est survenue");
                }
                else if($_GET['action'] == "currentGames") CurrentGames($gm);
                else if($_GET['action'] == "validatedGames") ValidatedGames($gm);
                else if($_GET['action'] == "refusedGames") RefusedGames($gm);
                else if($_GET['action'] == "refusedWaitedGames") RefusedWaitedGames($gm);
                else if($_GET['action'] == "stats") Statistiques($gm);
                else if($_GET['action'] == "logout") LogoutGM($gm);
                else ValidationGM("La page demandée n'existe pas !");
            }
            else ValidationGM();
        }
        // A TEAM IS ALREADY CONNECTED
        else redirect('index.php');
    }
    // WE MAY NOT KNOW WHAT CAN HAPPEN
    else throw new Exception("Une erreur est survenue.");

    // UPDATE THE DATABASE FOR AUTOMATICALLY REFUSING GAMES
    UpdateRefusedGames();
    // UPDATE THE DATABASE FOR GaMES THAT HAVE BEEN QUITTED FOR TOO LONG
    UpdateLongGames();
}
catch(Exception $e) { ConnectionPage($e->getMessage()); }