<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';
require '../../routes/Users.php';

$app = new \Slim\App;
$app->post('/nuevo', function (Request $request, Response $response) {
    
    $email=$request->getParam("email");
    $pass=$request->getParam("password");
    $username=$request->getParam("username");
    
    $json  = saveNewUser($email,$pass,$username);
    $response->getBody()->write("$json");

    return $response;
});

$app->run();