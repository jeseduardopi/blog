<?php 

class UserManager extends BaseManager
{
    public function __construct(ConnectionInterface $pdo)
    {
        parent::__construct($pdo);
    }

    public function getAllUser(): array
    {
        $query = $this->pdo->query('SELECT * FROM' . PDOFactory::DATABASE . '.users');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, //TODO);
        return $query->fetchAll();
    }

    public function getUserByID(int $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query-> setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, //TODO);
        return $query->fetch();
    }

    public function createUser (int $id)
    {
        //TODO
    }

    public function editUser (int $id)
    {
        //TODO
    }

    public function deleteUser (int $id)
    {
        $query = $this->pdo->prepare('DELETE FROM' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query-> setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, //TODO);
        return $query->fetch();
    }
    
}