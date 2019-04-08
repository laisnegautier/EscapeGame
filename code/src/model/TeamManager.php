<?php

// CLASS TEAM
// CREATE A TEAM OBJECT THAT ALLOWS IDENTIFICATION AND ALL

class Team extends Manager 
{    
    /*
    // ATTRIBUTS
    */
    private $idTeam;
    private $nameTeam;
    private $idIcon;

    /*
    // GETTERS
    */
    public function getIdTeam() { return $this->_idTeam; }
    public function getNameTeam() { return $this->_nameTeam; }

    /*
    // SETTERS
    */
    private function setIdTeam($idTeam) { $this->_idTeam = Manager::escape($idTeam); }
    public function setNameTeam($nameTeam) {
        $req = Manager::dbConnect()->prepare("UPDATE teams
                                                SET nameTeam = :nameTeam
                                                WHERE idTeam = :idTeam");
        $req->bindValue('nameTeam', Manager::escape($nameTeam), PDO::PARAM_STR);
        $req->bindValue('idTeam', Manager::escape($this->getIdTeam()), PDO::PARAM_STR);
        $req->execute();

        $this->_nameTeam = Manager::escape($nameTeam);
    }

    /*
    // STATIC MEMBERS
    */

    // Insert a new Team 
    public static function CreationTeam($nameTeam, $passwordTeam) {   
        $req = Manager::dbConnect()->prepare("INSERT INTO teams (nameTeam, passwordTeam)
                                                VALUES (:nameTeam, :passwordTeam)");
        $req->bindValue('nameTeam', Manager::escape($nameTeam), PDO::PARAM_STR);
        $req->bindValue('passwordTeam', Manager::escape(sha1($passwordTeam)), PDO::PARAM_STR);
        $req->execute();
    }

    // Insert all players when creation of a new team
    public static function CreationPlayer($players, $idTeam) {
        for($i = 0; $i < count($players); $i++) {
            $req = Manager::dbConnect()->prepare("INSERT INTO players (namePlayer, idTeam)
                                                    VALUES (:namePlayer, :idTeam)");
            $req->bindValue('namePlayer', Manager::escape($players[$i]), PDO::PARAM_STR);
            $req->bindValue('idTeam', Manager::escape($idTeam), PDO::PARAM_STR);
            $req->execute();
        }
    }

    // Check if the login and password are in the DB
    public static function SessionInitTeam($nameTeam, $passwordTeam) {
        $req = Manager::dbConnect()->prepare("SELECT idTeam
                                                FROM teams
                                                WHERE nameTeam = :nameTeam AND passwordTeam = :passwordTeam");
        $req->bindValue('nameTeam', Manager::escape($nameTeam), PDO::PARAM_STR);
        $req->bindValue('passwordTeam', Manager::escape(sha1($passwordTeam)), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        if(empty($result)) throw new Exception("Le login et/ou le mot de passe est incorrect.");

        return $result;
    }
    
    // Logout
    public static function Logout() {
        session_unset();
        session_destroy();
    }
    
    /*
    // CONSTRUCTOR
    */
    public function __construct($idTeam) {   
        // Creation when connected
        $req = Manager::dbConnect()->prepare("SELECT idTeam, nameTeam 
                                                FROM teams
                                                WHERE idTeam = :idTeam");
        $req->bindValue('idTeam', Manager::escape($idTeam), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        $this->setIdTeam($result['idTeam']);
        $this->setNameTeam($result['nameTeam']);
    } 
    
}