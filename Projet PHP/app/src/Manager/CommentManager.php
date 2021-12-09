<?php 

namespace App\Manager;

use App\Factory\PDOFactory;
use App\Interfaces\ConnectionInterface;
use App\Manager\BaseManager;

class CommentManager extends BaseManager {

    public function getAllCommentsFromPostId(int $postId): array
    {
        $query = $this->pdo->query('SELECT * FROM ' .  PDOFactory::DATABASE . '.comments WHERE postId = :postId');
        $query->bindValue(':postid', );
        $query->setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entity\user');
        return $query->fetchAll();
    }

    public function createComment(comment $comment): bool
    {
        $query = $this->pdo->query('INSERT INTO ' .  PDOFactory::DATABASE . '.comments (comment, publish_date, userId, postId) VALUES (:comment, publish_date, userId, postId)');
        $query->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $query->bindValue(':publish_date', $comment->getPublishDate(), PDO::PARAM_STR);
        $query->bindValue(':userId', $comment->getUserId(), PDO::PARAM_INT);
        $query->bindValue(':postId', $comment->getPostId(), PDO::PARAM_INT);
        return $query->execute();
    }

   
}