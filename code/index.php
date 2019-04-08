<?php
session_start();

// ROUTER PAGE FOR THE TEAMS (redirection to the gamemaster router if one is connected)
// LAST MODIFICATION : 27/03/2019
// GAUTIER LAISNE
// This router always uses an Action (in the URL) to do something
// Sub-parameters have been created for specific purposes, but there's always an Action called

require('src/controller/CommonController.php');
require('src/controller/TeamsController.php');
require('src/controller/GamesController.php');
require('src/controller/HelpController.php');
require('src/controller/GMController.php');

// Handling unpredicted issues
try {
    // WHEN NOT CONNECTED
    if(!isset($_SESSION['id']) && !isset($_SESSION['role']))
    {
        // Handling javascript clickable button issues with different browsers
        if(preg_match('/Firefox/i', $_SERVER['HTTP_USER_AGENT']) || preg_match('/MSIE/i', $_SERVER['HTTP_USER_AGENT'])) WrongBrowser();
        
        if(isset($_GET['action']))
        {
            // INSCRIPTION
            if($_GET['action'] == "inscription")
            {
                if(!empty($_POST['nameTeam']) && !empty($_POST['passwordTeam']) && !empty($_POST['passwordTeamConfirm']) && !empty($_POST['players']))
                {
                    if($_POST['passwordTeam'] == $_POST['passwordTeamConfirm'])
                    {
                        array_filter($_POST['players']);
                        InscriptionTeam($_POST['nameTeam'], $_POST['passwordTeam'], $_POST['players']);
                    }
                    else InscriptionFormTeam("Les mots de passe ne sont pas identiques");
                }
                else InscriptionFormTeam();
            }
            // CONNECTION
            else if($_GET['action'] == "connection")
            {
                if(isset($_POST['nameTeam']) && isset($_POST['passwordTeam'])) ConnectionTeam($_POST['nameTeam'], $_POST['passwordTeam']);
                
                ConnectionFormTeam();                
            }
            else Home();
        }
        else Home();
    }

    // WHEN CONNECTED
    else if(isset($_SESSION['id']) && isset($_SESSION['role']))
    {
        if($_SESSION['role'] == "team")
        {
            // This object contains all resourceful data from the team and allows us to store only a few variables in the session
            $team = new Team($_SESSION['id']);

            if(isset($_GET['action']))
            {
                // LAUNCHING A NEW GAME PROCESS
                if($_GET['action'] == "choice") 
                {
                    if(isset($_GET['game']))
                    {
                        // FOR NOW THERE ARE A FEW GAMES AVAILABLE - need to be careful if people play with the url, so we check in the DB
                        try {
                            // Timer restrictions
                            if(isset($_GET['timer']))
                            {
                                if($_GET['timer'] != 0 && $_GET['timer'] != 1) throw new Exception("Une erreur est survenue : les paramètres de l'URL ne sont pas valides !");
                                else {
                                    // This will throw an exception if the number in the URL is not associated with a game
                                    Game::IssetGame($_GET['game']);
        
                                    if(isset($_GET['gamemaster']))
                                    {
                                        // Exception thrower to check gamemaster in the URL
                                        GM::IssetGM($_GET['gamemaster']);
                                        
                                        AskNewGame($_GET['game'], $team->getIdTeam(), $_GET['timer'], $_GET['gamemaster']);
                                    }
                                    else GMChoice();
                                }
                            }
                            else throw new Exception("Recommencez l'action");
                        }
                        catch(Exception $e) { NewGame($e->getMessage()); }
                    }
                    // GAME CHOICE
                    else NewGame();
                }
                // WHEN THE PLAYER WAITS FOR A GAMEMASTER TO BE CONNECTED
                else if($_GET['action'] == "waitGM")
                {    
                    if(isset($_GET['validation'])) WaitForGMLoad($team);
                    else WaitForGM($team);
                }
                // DURING AND AFTER THE GAME
                else if($_GET['action'] == "play")
                {                    
                    // COMPONENTS AND UPDATES DURING AND AFTER THE GAME
                    if(isset($_GET['updateLastStep'])) UpdateLastStep($team, $_GET['updateLastStep']);
                    
                    if(isset($_GET['timer'])) GetTimer($team);
                    else if(isset($_GET['timerEnd']))
                    {
                        if(isset($_POST['gameReview'])) Review($_GET['timerEnd'], $_POST['gameReview']);
                        else EndChrono($team, $_GET['timerEnd']);
                    }
                    else if(isset($_GET['updateResolution'])) UpdateResolution($team, $_GET['updateResolution']);
                    else if(isset($_GET['quit'])) 
                    {
                        if(isset($_POST['gameReview'])) Review($_GET['quit'], $_POST['gameReview']);
                        else Quit($team, $_GET['quit']);
                    }
                    else if(isset($_GET['victory'])) 
                    {
                        if(isset($_POST['gameReview'])) Review($_GET['victory'], $_POST['gameReview']);
                        else GetVictory($team, $_GET['victory']);
                    }
                    else if(isset($_GET['music'])) GetMusic($team);
                    else if(isset($_GET['numberRiddle'])) GetNumberRiddle($team, $_GET['numberRiddle']);
                    else if(isset($_GET['previousRiddle'])) GetPreviousRiddle($team, $_GET['previousRiddle']); // Careful : this is already the previous id
                    else if(isset($_GET['previousRiddleFirst'])) GetPreviousRiddle($team, $_GET['previousRiddleFirst'], 1);
                    else if(isset($_GET['nextRiddle'])) GetNextRiddle($team, $_GET['nextRiddle']);
                    else if(isset($_GET['nextRiddleValidate'])) GetNextRiddleValidated($team, $_GET['nextRiddleValidate']);
                    else if(isset($_GET['answerForm'])) GetAnswerForm($team, $_GET['answerForm']);
                    else if(isset($_GET['validationRiddle'])) GetValidationRiddle($team, $_GET['validationRiddle']);
                    else if(isset($_GET['tip'])) GetTip($team, $_GET['tip']);
                    else if(isset($_GET['helpMessages'])) HelpMessages($team); 
                    else if(isset($_GET['helpForm'])) HelpForm($team); 
                    else if(isset($_GET['sendQuestion'])) SendQuestion($team, $_GET['sendQuestion']);
                    else Play($team);
                }
                else if($_GET['action'] == "logout") LogoutTeam();
                else HomeConnected("La page demandée n'existe pas !");           
            }
            else HomeConnected();
        }
        // A GM IS ALREADY CONNECTED
        else redirect('gamemaster.php');
    }
    // WE MAY NOT KNOW WHAT CAN HAPPEN
    else throw new Exception("Une erreur est survenue.");
}
catch(Exception $e) { Home($e->getMessage()); }