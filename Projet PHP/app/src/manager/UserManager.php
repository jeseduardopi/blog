<?php

use App\Entity\Personnage;
use App\Fram\Factories\PDOFactory;
use App\Fram\Interfaces\ConnectionInterface;

class UserManager {
    public function __construct(ConnectionInterface $pdo)
    {
        parent::__construct($pdo);

    }

    /**
     * @return Personnage[]
     */
    public function getAllPersonnages(): array
    {
        $query = 'SELECT * FROM ' . PDOFactory::DATABASE . '.personnage';
        $select = $this->pdo->query($query);
        $results = $select->fetchAll(\PDO::FETCH_ASSOC);
        $return = [];
        foreach ($results as $result) {
            $className = $result['className'];
            $return[] = new $className($result);
        }
        return $return;
    }

    public function addPersonnage(Personnage $personnage): Personnage
    {
        $query = $this->pdo->prepare('SELECT * FROM' . PDOFactory::DATABASE . '.users' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query-> setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, //TODO);
        return $query->fetch();
    }

    public function getPersonnageById($id): Personnage
    {
        $query = 'SELECT * FROM ' . PDOFactory::DATABASE . '.personnage WHERE id = :id';
        $select = $this->pdo->prepare($query);
        $select->bindValue(':id', $id, \PDO::PARAM_INT);
        $select->execute();

        $result = $select->fetch(\PDO::FETCH_ASSOC);
        $className = $result['className'];
        return new $className($result);
    }

    public function updatePersonnage(Personnage $personnage): bool
    {
        if (get_class($personnage) == 'App\Entity\Magicien') {
            $query = 'UPDATE ' . PDOFactory::DATABASE . '.personnage SET pv = :pv, sleep = :sleep, lastSpell = :lastSpell WHERE id = :id';
        } else {
            $query = 'UPDATE ' . PDOFactory::DATABASE . '.personnage SET pv = :pv, sleep = :sleep WHERE id = :id';
        }
        $update = $this->pdo->prepare($query);
        $update->bindValue(':id', $personnage->getId(), \PDO::PARAM_INT);
        $update->bindValue(':pv', $personnage->getPv(), \PDO::PARAM_INT);
        $update->bindValue(':sleep', $personnage->getSleep(), \PDO::PARAM_STR);

        if (get_class($personnage) == 'App\Entity\Magicien') {
            $update->bindValue(':lastSpell', $personnage->getLastSpell(), \PDO::PARAM_STR);
        }

        return $update->execute();
    }

    public function deletePersonnageById($id): bool
    {
        $query = $this->pdo->prepare('DELETE FROM' . PDOFactory::DATABASE . '.users' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query-> setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, //TODO) ;
        return $query->fetch();
    }
}