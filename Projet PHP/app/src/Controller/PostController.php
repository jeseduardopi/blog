<?php

namespace App\Controller;

use App\Entity\Post;
use App\Factory\PDOFactory;
use App\Fram\Flash;
use App\Manager\PostManager;

class PostController extends BaseController
{
    /**
     * Show all Posts
     */
    public function executeIndex()
    {
        $postManager = new PostManager(new \App\Factory\PDOFactory());
        $posts = $postManager->getAllPosts();

        $this->render(
            'home.php',
            [
                'posts' => $posts,
                'post' => new Post(),
                'test' => 'je suis un test'
            ],
            'Home page'
        );
    }

    /*
     * 'Accueil',
            [
                'personnages' => $personnageManager->getAllPersonnages(),
            ],
            'Frontend/home'*/

    public function executeShow()
    {
        /*Flash::setFlash('alert', 'je suis une alerte');

        $this->render(
            'show.php',
            [
                'test' => 'article ' . $this->params['id']
            ],
            'Show Page'
        );*/
    }

    public function executeAuthor()
    {
        $this->render(
            'author.php',
            [],
            'Auteur'
        );
    }

}