<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\UploadedFile;
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
$app->post('/login', function (Request $request, Response $response) {
    
    $email=$request->getParam("email");
    $pass=$request->getParam("password");
    $json  = loginUser($email,$pass);
    $response->getBody()->write("$json");

    return $response;
});
$app->post('/tipo_comida', function (Request $request, Response $response) {
    
    $tipo  = $request->getParam("tipo_comida");
    $token = $request->getParam("token");
    $json  = setTipoComida($tipo,$token);
    $response->getBody()->write("$json");

    return $response;
});
$app->post('/password/recuperar', function (Request $request, Response $response) {
    
    $email = $request->getParam("email");
    $json  = recoverPassword($email);
    $response->getBody()->write("$json");

    return $response;
});
$app->post('/password/actualizar', function (Request $request, Response $response) {
    
    $token = $request->getParam("token");
    $oldPass = $request->getParam("old_password");
    $newPass = $request->getParam("new_password");
    
    $json  = updatePassword($token,$newPass,$oldPass);
    $response->getBody()->write("$json");

    return $response;
});
$app->post('/img', function (Request $request, Response $response) {
    
    $token = $request->getParam("token");
    $uploadedFiles = $request->getUploadedFiles();
        $uploadedFile = $uploadedFiles['image'];
        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
            $json  = setProfileImage($uploadedFile,$token);
            $response->getBody()->write("$json");
            return $response;    
            //$response->getBody()->write($uploadedFile->getClientFilename());        
        }
});
$app->get('/info', function (Request $request, Response $response) {
    
    $token = $request->getParam("token");
            $json  = getProfileInfo($token);
            $response->getBody()->write("$json");
            return $response;    
});
$app->run();