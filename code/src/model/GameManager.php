<?php

// CLASS GAME
// CREATE A NEW GAMESTATE WHEN A GAME IS ASKED

class Game extends Manager
{     
    /*
    // ATTRIBUTS
    */
    private $idGamestate;
    private $demandDate;
    private $validationState;
    private $validationDate;
    private $timer;
    private $endGameDate;
    private $lastStepValidated;
    private $gameFinished;
    private $victory;
    private $idTeam;
    private $idGame;
    private $idGM;

    /*
    // GETTERS
    */
    public function getIdGamestate() { return $this->_idGamestate; }
    public function getDemandDate() { return $this->_demandDate; }
    public function getValidationState() { return $this->_validationState; }
    public function getValidationDate() { return $this->_validationDate; }
    public function getTimer() { return $this->_timer; }
    public function getEndGameDate() { return $this->_endGameDate; }
    public function getLastStepValidated() { return $this->_lastStepValidated; }
    public function getGameFinished() { return $this->_gameFinished; }
    public function getVictory() { return $this->_victory; }
    public function getIdTeam() { return $this->_idTeam; }
    public function getIdGame() { return $this->_idGame; }
    public function getIdGM() { return $this->_idGM; }

    /*
    // SETTERS
    */
    private function setIdGamestate($idGamestate) {    
        $this->_idGamestate = Manager::escape($idGamestate); 

        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET idGamestate = :idGamestate
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('idGamestate', Manager::escape($idGamestate), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();

    }
    public function setDemandDate($demandDate) {        
        $this->_demandDate = Manager::escape($demandDate);

        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET demandDate = :demandDate
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('demandDate', Manager::escape($demandDate), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();
    }
    public function setValidationState($validationState) {      
        $this->_validationState = Manager::escape($validationState);

        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET validationState = :validationState
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('validationState', Manager::escape($validationState), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();
    }
    public function setValidationDate($validationDate) {     
        $this->_validationDate = Manager::escape($validationDate); 

        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET validationDate = :validationDate
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('validationDate', Manager::escape($validationDate), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();
    }
    public function setTimer($timer) {  
        $this->_timer = Manager::escape($timer);  

        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET timer = :timer
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('timer', Manager::escape($timer), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();
    }
    public function setEndGameDate($endGameDate) {    
        $this->_endGameDate = Manager::escape($endGameDate);

        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET endGameDate = :endGameDate
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('endGameDate', Manager::escape($this->getEndGameDate()), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();
    }
    public function setLastStepValidated($lastStepValidated) {  
        $this->_lastStepValidated = Manager::escape($lastStepValidated); 

        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET lastStepValidated = :lastStepValidated
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('lastStepValidated', Manager::escape($lastStepValidated), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();
    }
    public function setGameFinished($gameFinished) {  
        $this->_gameFinished = Manager::escape($gameFinished);

        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET gameFinished = :gameFinished
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('gameFinished', Manager::escape($gameFinished), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();
    }
    public function setVictory($victory) { 
        $this->_victory = Manager::escape($victory);

        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET victory = :victory
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('victory', Manager::escape($victory), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();
    }
    private function setIdTeam($idTeam) {      
        $this->_idTeam = Manager::escape($idTeam);
      
        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET idTeam = :idTeam
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('idTeam', Manager::escape($idTeam), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute(); 
    }
    private function setIdGame($idGame) { 
        $this->_idGame = Manager::escape($idGame);

        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET idGame = :idGame
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('idGame', Manager::escape($idGame), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();
    }
    private function setIdGM($idGM) {   
        $this->_idGM = Manager::escape($idGM);
        
        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET idGM = :idGM
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('idGM', Manager::escape($idGM), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->execute();
    }

    /*
    // STATIC MEMBERS
    */

    // To obtain the id of the team playing a game, but without creating having to create the gamestate object - rarely used
    public static function GetIdTeamNoObject($idGamestate) {
        $req = Manager::dbConnect()->prepare("SELECT idTeam 
                                                FROM gamestates
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('idGamestate', Manager::escape($idGamestate), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();
    }

    // Inserting a new gamestate before creation of the associated object
    public static function InsertNewGame($idGame, $idTeam, $timer, $idGM) {   
        // INSERT ALMOST AN EMPTY LINE IN DB - the rest is actualized with further processes during the game
        $req = Manager::dbConnect()->prepare("INSERT INTO gamestates (demandDate, timer, idTeam, idGame, idGM)
            VALUES (NOW(), :timer, :idTeam, :idGame, :idGM)");
        $req->bindValue('timer', Manager::escape($timer), PDO::PARAM_STR);
        $req->bindValue('idTeam', Manager::escape($idTeam), PDO::PARAM_STR);
        $req->bindValue('idGame', Manager::escape($idGame), PDO::PARAM_STR);
        $req->bindValue('idGM', Manager::escape($idGM), PDO::PARAM_STR);
        $req->execute();
    }

    // Check if a game exists or not - checked when URL is modified
    public static function IssetGame($idGame) {
        $req = Manager::dbConnect()->prepare("SELECT idGame 
                                                FROM games
                                                WHERE idGame = :idGame");
        $req->bindValue('idGame', Manager::escape($idGame), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        if(empty($result)) throw new Exception("Le jeu demandé n'existe pas :( !");
    }

    // Gives all the lines in the game table
    public static function DetailsGames() {
        $req = Manager::dbConnect()->prepare("SELECT * 
                                                FROM games
                                                ORDER BY idGame DESC");
        $req->execute();
        $result = $req->fetchAll();
        
        return $result;
    }

    // Gives the average note of a game
    public static function ReviewGameAvg($idGame) {
        $req = Manager::dbConnect()->prepare("SELECT AVG(gameReview)
                                                FROM gamestates
                                                WHERE idGame = :idGame");
        $req->bindValue('idGame', Manager::escape($idGame), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch()[0];
        
        return $result;
    }

    // Check if team has been waiting more than 5min ago and if so, the gamestate is considered "automatically" refused
    public static function UpdateRefusedGames() {
        date_default_timezone_set('Europe/Paris'); 

        // Get all games without validation state
        $req = Manager::dbConnect()->prepare("SELECT idGamestate, demandDate
                                                FROM gamestates
                                                WHERE validationDate IS NULL");
        $req->execute();
        $waitingGames = $req->fetchAll();

        foreach($waitingGames as $detailsLine) {
            // We get the date now
            $demandDate = new DateTime($detailsLine['demandDate']);
            $nowDate = new DateTime();

            $interval = $nowDate->diff($demandDate);
            $hours = $interval->format('%h'); 
            $minutes = $interval->format('%i');
            $seconds = $interval->format('%s');
    
            $diffSec = $hours * 3600 + $minutes * 60 + $seconds;
            
            // If the game has been demanded more than 5min ago
            if($diffSec = $hours * 3600 + $minutes * 60 + $seconds > 5 * 60) {
                // Criteria of unvalidated game after a long time : put 2000-01-01 00:00:00 in the validationDate column
                $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                        SET validationDate = :validationDate
                                                        WHERE idGamestate = :idGamestate");
                $req->bindValue('validationDate', '2000-01-01 00:00:00', PDO::PARAM_STR);
                $req->bindValue('idGamestate', Manager::escape($detailsLine['idGamestate']), PDO::PARAM_STR);
                $req->execute();
            }
        }
    }

    // If a game has begun more than 12hours ago then we finish the game (e.g. play then you closed the browser and leave the game for life)
    public static function UpdateLongGames() {
        date_default_timezone_set('Europe/Paris'); 

        // Get all games no finished
        $req = Manager::dbConnect()->prepare("SELECT idGamestate, demandDate
                                                FROM gamestates
                                                WHERE validationState = 1 AND (gameFinished = 0 OR gameFinished IS NULL)");
        $req->execute();
        $waitingGames = $req->fetchAll();

        foreach($waitingGames as $detailsLine) {
            // We get the date now
            $demandDate = new DateTime($detailsLine['demandDate']);
            $nowDate = new DateTime();

            $interval = $nowDate->diff($demandDate);
            $days = $interval->format('%d'); 
            $hours = $interval->format('%h'); 
            $minutes = $interval->format('%i');
            $seconds = $interval->format('%s');
    
            $diffSec = $days * 24 * 3600 + $hours * 3600 + $minutes * 60 + $seconds;
            
            if($diffSec = $days * 24 * 3600 + $hours * 3600 + $minutes * 60 + $seconds > 12 * 60 * 60) {
                $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                        SET gameFinished = 1
                                                        WHERE idGamestate = :idGamestate");
                $req->bindValue('idGamestate', Manager::escape($detailsLine['idGamestate']), PDO::PARAM_STR);
                $req->execute();
            }
        }
    }

    // Check how many times a game has been played, given a game id
    public static function GetNumberPlayedGame($idGame) {
        $req = Manager::dbConnect()->prepare("SELECT COUNT(idGamestate)
                                                FROM gamestates
                                                WHERE idGame = :idGame");
        $req->bindValue('idGame', Manager::escape($idGame), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        return $result[0];
    }

    // Obtain the number of riddles of a game when given a game id
    public static function GetTotalRiddlesStatic($idGame) {
        $req = Manager::dbConnect()->prepare("SELECT COUNT(idRiddle)
                                                FROM riddles
                                                WHERE idGame = :idGame");
        $req->bindValue('idGame', Manager::escape($idGame), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        return $result[0];
    }

    // Set the game to ended mode
    public static function EndGame($idGamestate) {
        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET endGameDate = NOW()
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('idGamestate', Manager::escape($idGamestate), PDO::PARAM_STR);
        $req->execute();
    }

    // Add a review in the gamestate, given an id
    public static function GameReview($idGamestate, $gameReview) {    
        $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                SET gameReview = :gameReview
                                                WHERE idGamestate = :idGamestate");
        $req->bindValue('gameReview', Manager::escape($gameReview), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($idGamestate), PDO::PARAM_STR);
        $req->execute();
    }

    /*
    // CONSTRUCTOR
    */
    public function __construct($idTeam) {        
        // Since a team can't play 2+ games at the same time, we take the last game asked to be played by the team
        $req = Manager::dbConnect()->prepare("SELECT * 
                                                FROM gamestates
                                                WHERE idTeam = :idTeam
                                                ORDER BY demandDate DESC");
        $req->bindValue('idTeam', Manager::escape($idTeam), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        $this->setIdGamestate($result['idGamestate']);
        $this->setDemandDate($result['demandDate']);
        $this->setValidationState($result['validationState']);
        $this->setValidationDate($result['validationDate']);
        $this->setTimer($result['timer']);
        $this->setEndGameDate($result['endGameDate']);
        $this->setLastStepValidated($result['lastStepValidated']);
        $this->setGameFinished($result['gameFinished']);
        $this->setVictory($result['victory']);
        $this->setIdTeam($result['idTeam']);
        $this->setIdGame($result['idGame']);
        $this->setIdGM($result['idGM']);
    } 

    /*
    // INSTANCE MEMBERS
    */

    // Get the name of the gamemaster associated to the gamestate
    public function GetNameGM() {
        $req = Manager::dbConnect()->prepare("SELECT nameGM 
                                                FROM gamemasters
                                                WHERE idGM = :idGM");
        $req->bindValue('idGM', Manager::escape($this->getIdGM()), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        return $result['nameGM'];
    }

    // Check when a team is waiting more that 5 min when asking to play
    public function TimeWaitingGreaterThan5Min() {   
        date_default_timezone_set('Europe/Paris'); 

        $demandDate = new DateTime($this->getDemandDate());
        $nowDate = new DateTime();
        
        $interval = $nowDate->diff($demandDate);
        $hours = $interval->format('%h'); 
        $minutes = $interval->format('%i');
        $seconds = $interval->format('%s');

        $diffSec = $hours * 3600 + $minutes * 60 + $seconds;
        
        // If the game has been demanded more than 5min ago
        if($diffSec = $hours * 3600 + $minutes * 60 + $seconds > 5 * 60) {
            // Criteria of unvalidated game after a long time : put 2000-01-01 00:00:00 in the validationDate column
            $req = Manager::dbConnect()->prepare("UPDATE gamestates
                                                    SET validationDate = :validationDate
                                                    WHERE idGamestate = :idGamestate");
            $req->bindValue('validationDate', '2000-01-01 00:00:00', PDO::PARAM_STR);
            $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
            $req->execute();

            return TRUE;
        }
        else return FALSE;
    }
    
    // Get the time for the Timer component
    public function GetTimeLeft($gameInfos) {   
        date_default_timezone_set('Europe/Paris'); 

        $validationDate = new DateTime($this->getValidationDate());
        $nowDate = new DateTime();
        
        $interval = $nowDate->diff($validationDate);
        $hours = $interval->format('%h'); 
        $minutes = $interval->format('%i');
        $seconds = $interval->format('%s');

        $diffSec = $hours * 3600 + $minutes * 60 + $seconds;
        return $gameInfos - $diffSec;
    }

    // Get all infos of the game in database
    public function GetGameInfos() {
        $req = Manager::dbConnect()->prepare("SELECT *
                                                FROM games
                                                WHERE idGame = :idGame");
        $req->bindValue('idGame', Manager::escape($this->getIdGame()), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        return $result;
    }

    // Compute how many riddles there are in total
    public function GetTotalRiddles() {
        $req = Manager::dbConnect()->prepare("SELECT COUNT(idRiddle)
                                                FROM riddles
                                                WHERE idGame = :idGame");
        $req->bindValue('idGame', Manager::escape($this->getIdGame()), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        return $result[0];
    }

    // Get all the riddles for the display
    public function GetAllRiddles() {
        $req = Manager::dbConnect()->prepare("SELECT *
                                                FROM riddles
                                                WHERE idGame = :idGame
                                                ORDER BY step");
        $req->bindValue('idGame', Manager::escape($this->getIdGame()), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetchAll();

        return $result;
    }

    // Get details of a riddle at a certain step
    public function GetRiddleInfos($step) {
        $req = Manager::dbConnect()->prepare("SELECT *
                                                FROM riddles
                                                WHERE idGame = :idGame AND step = :step");
        $req->bindValue('idGame', Manager::escape($this->getIdGame()), PDO::PARAM_STR);
        $req->bindValue('step', Manager::escape($step), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        return $result;
    }

    // Check if there exists a resolution line in db
    public function IssetResolution($idRiddle) {    
        $req = Manager::dbConnect()->prepare("SELECT *
                                                FROM resolutions
                                                WHERE idGamestate = :idGamestate AND idRiddle = :idRiddle");
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->bindValue('idRiddle', Manager::escape($idRiddle), PDO::PARAM_STR);
        $req->execute();

        $result = $req->fetchAll();

        if(count($result) != 0) return false;
        else return true;
    }

    // Add a new line in database when a riddle has started - useful for computing time of resolution
    public function NewResolution($idRiddle) {
        $req = Manager::dbConnect()->prepare("INSERT INTO resolutions (startDateResolution, idGamestate, idRiddle)
                                                VALUES (NOW(), :idGamestate, :idRiddle)");
        $req->bindValue('idGamestate', Manager::escape($this->getIdGamestate()), PDO::PARAM_STR);
        $req->bindValue('idRiddle', Manager::escape($idRiddle), PDO::PARAM_STR);
        $req->execute();
    } 
}