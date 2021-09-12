<?php

namespace System\DataBase\DBConnection;

use Laminas\Config\Config;
use PDO;
use PDOException;
use System\Application\Application;

class DBConnection{

    private static $dbConnectionInstance = null;

    private function __construct(){}

    public static function getDBConnectionInstance(){

        if(self::$dbConnectionInstance == null){
            $dBConnection = new DBConnection();
            self::$dbConnectionInstance = $dBConnection->dbConnection();
        }

        return self::$dbConnectionInstance;
    }

    private function dbConnection(){

        $dbSets = getConfig()->toArray();
        $option = array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {
            return new PDO(
                "mysql:host=" . $dbSets['db']['host'] . ";dbname=" . $dbSets['db']['database'],
                $dbSets['db']['username'], $dbSets['db']['password'], $option
            );
        }catch (PDOException $e){
            echo "Error in database connection " . $e->getMessage();
            return false;
        }
    }

    public static function newInsertId(): string{
        return self::getDBConnectionInstance()->lastInsertId();
    }

}