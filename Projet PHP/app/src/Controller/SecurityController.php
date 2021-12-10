<?php
namespace App\Controller;

use App\Entity\User;
use App\Factory\PDOFactory;
use App\Fram\Flash;
use App\Manager\UserManager;
use App\Controller\BaseController;

class SecurityController extends BaseController
{
    public function executeCreate()
    {
        $this->render(
            'connexion.php',
            [],
            'Show'
        );
    }



    public function executeLogin(): bool
    {
        $userManager = new userManager(new \App\Factory\PDOFactory());
        $users = $userManager->getAllUsers();
        if (isset($_POST['EMAIL']) || isset($_POST['PASSWORD']) || isset($_POST['VALIDATION'])) {
            foreach ($users as $user){
                if ($user->getEmail() == $_POST['EMAIL'] && $user->getPassword() == $_POST['PASSWORD']){
                    session_start();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['USER_ID'] = $user->getId;
                    $_SESSION['IsAdmin'] = $user->getAdmin;
                }
            }
        }
        return false;
    }

    public function executeLogout(): bool
    {
        session_start();
        session_destroy();
        return true;

    }
}