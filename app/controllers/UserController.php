<?php

namespace app\controllers;
use app\core\Controller;
use app\models\User;

class UserController extends Controller
{
    public function index()
    {
        $userModel = new User();
        $template = $this->twig->load('users/users.twig');
        $homepageData = [
            'users' => $userModel->getAllUsers(),
        ];
        echo $template->render($homepageData);
    }

}