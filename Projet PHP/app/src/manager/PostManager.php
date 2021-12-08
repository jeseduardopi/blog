<?php





class PostManager extends BaseManager
{

    public function __construct(ConnectionInterface $pdo)
{
    parent::__construct($pdo);
}

    public function getAllPosts(): array
    {
        $query = $this->pdo->query('SELECT * FROM' . PDOFactory::DATABASE . '.posts');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, //TODO);
        return $query->fetchAll();
    }

    public function getPostByID(int $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query-> setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, //TODO);
        return $query->fetch();
    }

    public function deletePost(int $id): bool
    {
        $query = $this->pdo->prepare('DELETE FROM' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }

    //TODO
    public function createPost(): bool
    {
        $query = $this->pdo->prepare('DELETE FROM' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }

    public function editPost()
    {
        //TODO
    }


}
    



$x = new PostManager();
//$x->getAllPosts();