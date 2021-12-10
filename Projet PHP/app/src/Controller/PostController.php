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
        /*Flash::setFlash('alert', 'je suis une alerte');
*/      $postManager = new PostManager(new \App\Factory\PDOFactory());
       $post = $postManager->getPostById($this->params['id']);
       var_dump($this->params['id']);

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
        $postManager = new PostManager(new \App\Factory\PDOFactory());
        $post = $postManager->getPostById($this->params['id']);
        $this->render(
            'post.php',
            [
                'post' => $post
            ],
            'Post'
        );
    }

    public function executeAdd()
    {
        print_r($this->params);
        $postManager = new PostManager(new \App\Factory\PDOFactory());
        $newPost = new Post();


        $newPost->setTitle($this->params['title']);
        $newPost->setContent($this->params['content']);

        if($this->params['userId'] == '') {
            $newPost->setUserId(1);
        }
        var_dump($newPost);
        $postManager->addPost($newPost);


        /*
        $newPost->setContent(params['content']);
         $newPost->setUserId(1);
        */
        // if user is name is null, if(params['userId'] == ""){}




        // get user id, $post = $postManager->getUserById($this->params['userId']);
      /*  $this->render(
            'write.php',
            [
                'post' => $post
            ],
            'Post'
        );*/
       // $this->HTTPResponse->redirect('/play/' . $newPerso->getId());
        //header('Location:localhost:5555/article/'. $newPost->getId());
    }


    public function executeCreate()
    {
        $postManager = new PostManager(new \App\Factory\PDOFactory());
        $this->render(
            'write.php',['posts'=> $posts],
            'Add post page'
        );
    }


}