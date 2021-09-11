<?php

namespace System\DataBase\DBConnection;

use Laminas\Config\Config;
use PDO;
use PDOException;

class DBConnection{

    private static $dbConnectionInstance = null;
    private Config $config;

    private function __construct(Config $config){
        $this->config = $config;
    }

    public static function getDBConnectionInstance(){

        if(self::$dbConnectionInstance == null){
            $dBConnection = new DBConnection();
            self::$dbConnectionInstance = $dBConnection->dbConnection();
        }

        return self::$dbConnectionInstance;
    }

    private function dbConnection(){

        $sets = $this->config->toArray();
        $option = array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {
            return new PDO(
                "mysql:host=" . $sets['db']['host'] . ";dbname=" . $sets['db']['database'],
                $sets['db']['username'], $sets['db']['password'], $option
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