<?php
namespace App\Manager;

use

class PostManager extends BaseManager
{   
    
    public function getAllPosts(): array
    {
        $query = $this->pdo->query('SELECT * FROM' . PDOFactory::DATABASE . '.posts');
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }


}
    


$x = new PostManager();
//$x->getAllPosts();