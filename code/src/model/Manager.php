<?php

// CONNECTION TO DB 
// FUNCTIONS USED ALMOST EVERYWHERE AND A LOT

abstract class Manager
{
    // Connection to database
    protected static function dbConnect() {
        try {
            $db = new PDO(
                'mysql:host=localhost;dbname=escape;charset=utf8', 
                'root', 
                '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                return $db;
            // $db = new PDO(
            //     'mysql:host=gautierlnbdata.mysql.db;dbname=gautierlnbdata;charset=utf8', 
            //     'gautierlnbdata',
            //     'Y2drnstine3',
            //     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            //     return $db;
        }
        catch(Exception $e) { die('Erreur PDO : ' . $e->getMessage()); }
    }

    // Rewrite the entry before searching or inserting or updating or deleting in database
    public static function escape($var) {
        if($var == NULL) return $var;
        else return htmlspecialchars($var, ENT_QUOTES, 'UTF-8', false);
    }

    // Useful converter
    public static function secToMin($seconds) { return floor($seconds/60); }
}