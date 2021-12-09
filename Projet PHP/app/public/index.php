<?php


session_start();

require __DIR__ . '/../vendor/autoload.php';


$comments = new \App\Manager\CommentManager(new \App\Factory\PDOFactory());

$test = $comments->getAllComments();

print_r($test);


//TODO : router



//$router = new \App\Fram\Router();