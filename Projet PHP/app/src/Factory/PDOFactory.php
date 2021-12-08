<?php
//Todo check securité pour ne pas avoir le password d'affiché 
class PDOFactory
{
    private static string $dsn = 'mysql:host=db';
    private static string $username = 'root';
    private static string $password = 'vY!&WjT%cP02';
    const DATABASE = 'db'; 

    private static function getMysqlConnection(){ 
        try {
            $db = new PDO(self::$dsn, self::$username, self::$password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo '<h1>ça marche</h1>';
        }
        catch (Exception $e){
            echo 'Erreur : ' . $e->getMessage();
        }
        return $db;
    }

    public function getConnection(): PDO {
        return self::getMysqlConnection();
    }
}
$lol = new PDOFactory();
$lol->getConnection();