<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';
require '../../routes/Restaurantes.php';

$app = new \Slim\App;
$app->get('/', function (Request $request, Response $response) {
    $json  = getAllRestaurants();
    $response->getBody()->write("$json");

    return $response;
});

$app->get('/categoria/{id}', function (Request $request, Response $response) {
    $catId = $request->getAttribute('id');
    $json  = getRestaurantsByCategory($catId);
    $response->getBody()->write("$json");

    return $response;
});
$app->get('/{id}/schedule/{dayWeek}', function (Request $request, Response $response) {
    $restId = $request->getAttribute('id');
    $dayWeek = $request->getAttribute('dayWeek');    
    $json  = scheduleValidation($restId,$dayWeek);
    $response->getBody()->write("$json");

    return $response;
});
$app->post('/cercanos', function (Request $request, Response $response) {
    $rango=$request->getParam("rango");
    $latitud=$request->getParam("latitud");
    $longitud=$request->getParam("longitud");
    $json  = getRestaurantsByProximity($rango,$latitud,$longitud);
    $response->getBody()->write("$json");

    return $response;
});
$app->run();