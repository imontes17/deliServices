<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';
require '../../routes/Noticias.php';

$app = new \Slim\App;
$app->get('/', function (Request $request, Response $response) {
    $json  = getAllNotices();
    $response->getBody()->write("$json");

    return $response;
});

$app->run();