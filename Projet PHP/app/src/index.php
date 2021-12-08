<?php

require('Factory/PDOFactory.php');
$db = PDOFactory::getMysqlConnection();

//Test DB 
$DataReadQuery = 'SELECT * FROM users';
try {
    $reponse = db->query($DataReadQuery);
    while ($data = reponse->fetch())
    {
    echo $data['id'];
    }
}
catch(Exception $e){
    echo $e->getMessage();
}