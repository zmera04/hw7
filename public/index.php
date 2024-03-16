<?php
require_once '../app/vendor/autoload.php';
require_once "../app/core/Controller.php";
require_once "../app/models/User.php";
require_once "../app/models/Post.php";
require_once "../app/controllers/MainController.php";
require_once "../app/controllers/UserController.php";
require_once "../app/controllers/PostController.php";
use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\PostController;

$url = $_SERVER["REQUEST_URI"];


switch($url)
{
    //if it is "/" return the homepage view from the main controller
    case('/'):
        $getHomepage = new MainController();
        $getHomepage -> homepage();
        break;

    //if it is "/posts" return an array of posts via the post controller
    case('/posts'):
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $postInput = new PostController();
            $postInput -> savePost();            
        }
        else if($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $getPosts = new PostController();
            $getPosts -> loadInput();        
        }   
        break;

    //if it is something else return a 404 view from the main controller
    default:
        $get404 = new MainController();
        $get404 -> notFound();
        break;
    }
?>