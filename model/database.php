<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 27.01.2017
 * Time: 12:21
 */


class Database
{
    private static $dbName = 'reservierung' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';

    private static $cont  = null;

    public function __construct() {
        exit('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        //self -> eigene Klasse
        // this -> eigens Objekt
        if ( null == self::$cont )
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>