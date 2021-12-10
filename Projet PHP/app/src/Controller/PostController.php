<?php

namespace App\Controller;

use App\Entity\Post;
use App\Factory\PDOFactory;
use App\Fram\Flash;
use App\Manager\CommentManager;
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
//'posts' => $posts,
        $this->render(
            'home.php',['posts'=> $posts],
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
        /*Flash::setFlash('alert', 'je suis une alerte');*/
        $postManager = new PostManager(new \App\Factory\PDOFactory());
        $post = $postManager->getPostById($this->params['id']);

        $this->render(
            'show.php',
            [
                'test' => $post
            ],
            'Show Page'
        );
    }

    public function executePost()
    {
        $commentManager = new CommentManager(new \App\Factory\PDOFactory());
        $postManager = new PostManager(new \App\Factory\PDOFactory());
        $comments = $commentManager ->getAllCommentsFromPostId();
        $post = $postManager->getPostById($this->params['id']);
        $this->render(
            'post.php',
            [
                'post' => $post,
                'comments' => $comments
            ],
            'Post'
        );
    }


}