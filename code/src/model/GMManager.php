<?php

// CLASS GAMEMASTER 
// WHAT DOES A GAMEMASTER DO - Identification, infos about gamemasters 

class GM extends Manager
{    
    /*
    // ATTRIBUTS
    */
    private $idGM;
    private $nameGM;
    private $connected;

    /*
    // GETTERS
    */
    public function getIdGM() { return $this->_idGM; }
    public function getNameGM() { return $this->_nameGM; }
    public function getConnected() { return $this->_connected; }

    /*
    // SETTERS
    */
    private function setIdGM($idGM) { $this->_idGM = Manager::escape($idGM); }
    public function setNameGM($nameGM) { $this->_nameGM = Manager::escape($nameGM); }
    public function setConnected($connected) { 
        $req = Manager::dbConnect()->prepare("UPDATE gamemasters
                                                SET connected = :connected
                                                WHERE idGM = :idGM");
        $req->bindValue('connected', Manager::escape($connected), PDO::PARAM_STR);
        $req->bindValue('idGM', Manager::escape($this->getIdGM()), PDO::PARAM_STR);
        $req->execute();
        
        $this->_connected = Manager::escape($connected); 
    }

    /*
    // STATIC MEMBERS
    */

    // Check if login and password exist
    public static function SessionInitGM($nameGM, $passwordGM) {
        $req = Manager::dbConnect()->prepare("SELECT idGM, connected
                                                FROM gamemasters
                                                WHERE nameGM = :nameGM AND passwordGM = :passwordGM");
        $req->bindValue('nameGM', Manager::escape($nameGM), PDO::PARAM_STR);
        $req->bindValue('passwordGM', Manager::escape(sha1($passwordGM)), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        if(empty($result)) throw new Exception("Le login et/ou le mot de passe est incorrect.");

        return $result;
    }

    // Check if gamemaster exists in database
    public static function IssetGM($idGM) {
        $req = Manager::dbConnect()->prepare("SELECT idGM 
                                                FROM gamemasters
                                                WHERE idGM = :idGM");
        $req->bindValue('idGM', Manager::escape($idGM), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        if(empty($result)) throw new Exception("Le maître du jeu demandé n'existe pas :( !");
    }

    // Get all the gamemasters data
    public static function GetAllGM() {
        $req = Manager::dbConnect()->prepare("SELECT * 
                                                FROM gamemasters 
                                                ORDER BY connected DESC");
        $req->execute();
        $result = $req->fetchAll();
        
        return $result;
    }

    // Get all the connected gamemasters
    public static function GetAllConnectedGM() {
        $req = Manager::dbConnect()->prepare("SELECT * 
                                                FROM gamemasters 
                                                WHERE connected = 1
                                                ORDER BY connected DESC");
        $req->execute();
        $result = $req->fetchAll();
        
        return $result;
    }

    // Get game id of launched games that are waiting for a gamemaster
    public static function GetWaitingGames() {
        $req = Manager::dbConnect()->prepare("SELECT gamestates.idGame as idGame, demandDate, timer, titleGame, nameTeam, idGamestate
                                                FROM gamestates, games, teams 
                                                WHERE (validationState IS NULL) AND (validationDate IS NULL) AND games.idGame = gamestates.idGame AND teams.idTeam = gamestates.idTeam
                                                ORDER BY demandDate DESC");
        $req->execute();
        $result = $req->fetchAll();
        
        return $result;
    }

    // Valid or not the state of a gamestate when given an id gamestate
    public static function ValidateGame($validationState, $idGamestate) {
        if($validationState != 0 && $validationState != 1) throw new Exception("Il faut valider ou annuler la demande");
        else {
            $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                    SET validationState = :validationState, validationDate = NOW()
                                                    WHERE idGamestate = :idGamestate");
            $req->bindValue('validationState', Manager::escape($validationState), PDO::PARAM_STR);
            $req->bindValue('idGamestate', Manager::escape($idGamestate), PDO::PARAM_STR);
            $req->execute();
        }
    }
    
    // Get the teams that sent a message and are waiting for an answer
    public static function AskingForHelp($idGamestate) {   
        // WE GET THE LAST MESSAGE AND CHECK IF IT'S THE TEAM WHO SENT IT
        $req = Manager::dbConnect()->prepare("SELECT * 
                                                FROM help
                                                WHERE idGamestate = :idGamestate
                                                ORDER BY helpDate DESC");
        $req->bindValue('idGamestate', Manager::escape($idGamestate), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch(); // We only check the last message

        // "" = null for strings
        if(!empty($result)) {
            if($result['answerHelp'] == "") return true;
            else return false;
        }
        else return false;
    }

    /*
    // CONSTRUCTOR
    */
    public function __construct($idGM) {
        $req = Manager::dbConnect()->prepare("SELECT idGM, nameGM, connected 
                                                FROM gamemasters
                                                WHERE idGM = :idGM");
        $req->bindValue('idGM', Manager::escape($idGM), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        $this->setIdGM($result[0]);
        $this->setNameGM($result[1]);
        $this->setConnected($result[2]);
    }

    /*
    // INSTANCE MEMBERS
    */

    // Get all games launched (some may not be played if the team quit the browser)
    public function AllCurrentGames() {
        $req = Manager::dbConnect()->prepare("SELECT idGamestate, demandDate, validationDate, timer, victory, titleGame, nameTeam
                                                FROM gamestates, games, teams 
                                                WHERE validationState = 1 AND idGM = :idGM AND gameFinished = 0 AND games.idGame = gamestates.idGame AND teams.idTeam = gamestates.idTeam
                                                ORDER BY validationDate DESC");
        $req->bindValue('idGM', Manager::escape($this->getIdGM()), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetchAll();
        
        return $result;
    }

    // Get all games that have been validated
    // CURRENT GAMES ARE IN VALIDATED GAMES LIST
    public function AllValidatedGames() {
        $req = Manager::dbConnect()->prepare("SELECT demandDate, validationDate, timer, victory, titleGame, nameTeam
                                                FROM gamestates, games, teams 
                                                WHERE validationState = 1 AND victory IS NOT NULL AND idGM = :idGM AND games.idGame = gamestates.idGame AND teams.idTeam = gamestates.idTeam
                                                ORDER BY validationDate DESC");
        $req->bindValue('idGM', Manager::escape($this->getIdGM()), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetchAll();
        
        return $result;
    }
    
    // Get all game that have been refused by a gamemaster
    public function AllRefusedGames() {
        $req = Manager::dbConnect()->prepare("SELECT demandDate, validationDate, timer, victory, titleGame, nameTeam 
                                                FROM gamestates , games, teams
                                                WHERE validationState = 0 AND idGM = :idGM AND games.idGame = gamestates.idGame AND teams.idTeam = gamestates.idTeam
                                                ORDER BY validationDate DESC");
        $req->bindValue('idGM', Manager::escape($this->getIdGM()), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetchAll();
        
        return $result;
    }
        
    // Get all games that have been refused automatically
    public function AllRefusedWaitedGames() {
        $req = Manager::dbConnect()->prepare("SELECT demandDate, validationDate, timer, victory, titleGame, nameTeam 
                                                FROM gamestates , games, teams
                                                WHERE (validationState IS NULL) AND (validationDate = '2000-01-01 00:00:00') AND games.idGame = gamestates.idGame AND teams.idTeam = gamestates.idTeam
                                                ORDER BY demandDate DESC");
        $req->execute();
        $result = $req->fetchAll();
        
        return $result;
    }

    // Logout function, pretty clear as a function name but still, needs a comment for homogeneity
    public function Logout() {
        $this->setConnected(0);

        session_unset();
        session_destroy();
    }
}
