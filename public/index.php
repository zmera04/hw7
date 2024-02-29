<?php
require_once '../app/vendor/autoload.php';
require_once "../app/core/Controller.php";
require_once "../app/models/User.php";
require_once "../app/models/Post.php";
require_once "../app/controllers/MainController.php";
require_once "../app/controllers/UserController.php";
use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\PostController;


$url = $_SERVER["REQUEST_URI"];

//todo add a switch statement router to route based on the url
//if it is /posts return an array of posts
//if it is / return the homepage view via the main controller
//if it is something else return 404
