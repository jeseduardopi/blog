<?php 

namespace App\Manager;

class CommentManager {
    /*public function __construct(ConnectionInterface $pdo)
    {
        parent::__construct($pdo);

    }*/

    /**
     * @return Comments[]
     */
    public function getAllComments(): array
    {

        /*
        $query = 'SELECT * FROM ' . PDOFactory::DATABASE . '.comments';
        $select = $this->pdo->query($query);
        $results = $select->fetchAll(\PDO::FETCH_ASSOC);
        $return = [];
*/
        $results = ['Testfvqdfq','test1qfsdfqsd','test2vwcxvwxc'];
        return  $results;
        /*foreach ($results as $result) {
            $className = $result['className'];
            $return[] = new $className($comments);
            return $return;
        }*/
    }

    public function addComment(Comments $personnage): Comments
    {
     /*   if (get_class($personnage) == 'App\Entity\Magicien') {
            $query = 'INSERT INTO ' . PDOFactory::DATABASE . '.personnage (className, nom, pv, `force`, defense, sleep, lastSpell) VALUES (:className, :nom, :pv, :force, :defense, :sleep, :lastSpell)';
        } else {
            $query = 'INSERT INTO ' . PDOFactory::DATABASE . '.personnage (className, nom, pv, `force`, defense, sleep) VALUES (:className, :nom, :pv, :force, :defense, :sleep)';
        }
*/

        $query = 'INSERT INTO ' . PDOFactory::DATABASE . '.personnage (className, nom, pv, `force`, defense, sleep, lastSpell) VALUES ( )';

        $insert = $this->pdo->prepare($query);
        $insert->bindValue(':', get_class($personnage), \PDO::PARAM_STR);
        $insert->bindValue(':', $personnage->getNom(), \PDO::PARAM_STR);
        $insert->bindValue(':', $personnage->getPv(), \PDO::PARAM_INT);
        $insert->bindValue(':', $personnage->getForce(), \PDO::PARAM_INT);
        $insert->bindValue(':', $personnage->getDefense(), \PDO::PARAM_INT);
        $insert->bindValue(':', $personnage->getSleep(), \PDO::PARAM_STR);

        if (get_class($personnage) == 'App\Entity\Magicien') {
            $insert->bindValue(':lastSpell', $personnage->getLastSpell(), \PDO::PARAM_STR);
        }

        $insert->execute();

        return $this->getPersonnageById($this->pdo->lastInsertId());
    }

    public function getPersonnageById($id): Comments
    {
        $query = 'SELECT * FROM ' . PDOFactory::DATABASE . '.comments WHERE id = :id';
        $select = $this->pdo->prepare($query);
        $select->bindValue(':id', $id, \PDO::PARAM_INT);
        $select->execute();

        $result = $select->fetch(\PDO::FETCH_ASSOC);
        $className = $result['className'];
        return new $className($result);
    }

    public function updatePersonnage(Comments $comments): bool
    {
      /*  if (get_class($personnage) == 'App\Entity\Magicien') {
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
      */

        $query = 'UPDATE ' . PDOFactory::DATABASE . '.comments SET comment = :comment WHERE id = :id';

        $update = $this->pdo->prepare($query);
        $update->bindValue(':id', $comments->getId(), \PDO::PARAM_INT);
        $update->bindValue(':pv', $comments->getPv(), \PDO::PARAM_INT);

        return $update->execute();
    }

    public function deleteCommentById($id): bool
    {
        $query = 'DELETE FROM ' . PDOFactory::DATABASE . '.comments WHERE id = :id';
        $select = $this->pdo->prepare($query);
        $select->bindValue(':id', $id, \PDO::PARAM_INT);
        return $select->execute();
    }
}