<?php

require('Factory/PDOFactory.php');
$db = PDOFactory::getMysqlConnection();

try {
    $query = "CREATE TABLE VR";
    $db -> prepare($query);
}
catch(Exception $e){
    echo $e -> getMessage();
}