<?php

// CLASS HELP
// MESSAGES COMPONENT MANAGER
// QUESTION = MESSAGE BY THE TEAM
// ANSWER = MESSAGE BY THE GM

class Help extends Manager
{
    // Returns all messages in a specific gamestate
    public static function AllMessages($idGamestate) {
        $req = Manager::dbConnect()->prepare("SELECT * 
                                                FROM help
                                                WHERE idGamestate = :idGamestate
                                                ORDER BY helpDate");
        $req->bindValue('idGamestate', Manager::escape($idGamestate), PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetchAll();

        return $result;
    }

    // Insert team message
    public static function SendQuestion($idGamestate, $questionHelp) {
        $req = Manager::dbConnect()->prepare("INSERT INTO help (questionHelp, helpDate, idGamestate)
                                                    VALUES (:questionHelp, NOW(), :idGamestate)");
        $req->bindValue('questionHelp', Manager::escape($questionHelp), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($idGamestate), PDO::PARAM_STR);
        $req->execute();
    }

    // Insert gamemaster message
    public static function SendAnswer($idGamestate, $answerHelp) {
        $req = Manager::dbConnect()->prepare("INSERT INTO help (helpDate, answerHelp, idGamestate)
                                                VALUES (NOW(), :answerHelp, :idGamestate)");
        $req->bindValue('answerHelp', Manager::escape($answerHelp), PDO::PARAM_STR);
        $req->bindValue('idGamestate', Manager::escape($idGamestate), PDO::PARAM_STR);
        $req->execute();
    }

}