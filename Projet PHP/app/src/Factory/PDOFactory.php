<?php

class PDOFactory
{
    public static function getMysqlConnection()
    {
        $db = new PDO("mysql:host=db;dbname=db", 'root', 'vY!&WjT%cP02');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}