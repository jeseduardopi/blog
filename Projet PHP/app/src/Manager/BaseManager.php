<?php

namespace App\Manager;

abstract class BaseManager {
    protected \PDO $pdo;
    public function __construct(ConnectionInterface $pdo)
    {
        $this->pdo = $pdo->getConnection();
    }
}