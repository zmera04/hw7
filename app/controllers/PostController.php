<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Post;
class PostController extends Controller
{
    //todo make a method to return some posts, post objects should come from the post model class
    //also need to make a twig template to show the posts
    //an example is in app/controllers/UsersController
    public function loadInput(){
        include './assets/views/posts/inputposts.php';
        exit();
    }

    public function savePost(){
        $name = $_POST['name'] ? $_POST['name'] : false;
        $description = $_POST['description'] ? $_POST['description'] : false;
        $errors = [];
        
        //if there is a name
        if($name)
        {
            //sanitize the input
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
        }
        //if there is no name
        else
        {
            //add error message to the error array
            $errors['noName'] = 'Name is missing';
        }

        //same thing
        if($description)
        {
            $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
        }
        else
        {
            $errors['noDescription'] = 'Description is missing';
        }

        //if there are errors
        if(count($errors))
        {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        //saving data as an array
        $returnData = [
            'name' => $name,
            'description' => $description
        ];
        //returning that data
        echo json_encode($returnData);
        exit();
    }

    public function showPosts()
    {
        $postModel = new Post();
        $template = $this->twig->load('posts/posts.twig');
        $postData = [
            'posts' => $postModel->getAllPosts(),
        ];

        echo $template->render($postData);
    }
}