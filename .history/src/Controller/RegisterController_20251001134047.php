<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Mns\Buggy\Core\AbstractController;

class RegisterController extends AbstractController
{

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index()
    {
        $errors = [];

        if (!empty($_POST['user'])) {

            $user = $_POST['user'];

            if (empty($user['lastname']))
                $errors['lastname'] = 'Le Nom est obligatoire';

            if (empty($user['firstname']))
                $errors['firstname'] = 'Le Prénom est obligatoire';

            if (empty($user['email']))
                $errors['email'] = 'L\'email est obligatoire';

            if (empty($user['password']))
                $errors['password'] = 'Le mot de passe est obligatoire';


            if (count($errors) == 0) {
                // Par défaut l'utilisateur n'est pas admin
                $user['isadmin'] = 0;
                $id = $this->userRepository->insert($user);

                // Authentification automatique
                $_SESSION['user'] = [
                    'id' => $id,
                    'username' => $user['firstname']
                ];

                // Redirection
                header("Location: /dashboard");
                exit;
            }
        }

        return $this->render('register/index.html.php', [
            'title' => 'Inscription',
            'errors' => $errors
        ]);
    }
}
