<?php
require '../../model/Connection.php';
require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Slim\Http\UploadedFile;
function initConnection(){
    try
    {
        $database = new Connection();
        $db = $database->openConnection();
        return $db;
    }catch(PDOException $e){
        //return $e->getMessage();
    }
}

function saveNewUser($email,$pass,$username){
    $pathUser=__DIR__.'/../media/usuarios/';    
    try{
        $db=initConnection();
        $stm = $db->prepare("INSERT INTO 
        deli_user(id,username,email,password,token,image) 
        VALUES (:id,:username,:email,:pass,:tok,:img)");
        $stm->execute(array(":id" =>null,':username'=>$username,':email'=>$email,':pass'=>password_hash($pass, PASSWORD_DEFAULT),':tok'=>sha1($email),':img'=>null));      
        
        $lastRegister=$db->lastInsertId();
        $directory=$pathUser.$lastRegister;  
        mkdir($directory."/perfil", 0777, true);      
        
        $response["token"]=sha1($email);
        $response["msg"]="Usuario agregado con exito!!!";
        $result = json_encode($response,JSON_UNESCAPED_UNICODE);
        return $result;
    }catch(PDOException $e){
        $response["error"]=$e->getMessage();
        $result = json_encode($response,JSON_UNESCAPED_UNICODE);
        return $result;
    }
}

function loginUser($email,$password){
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT * FROM deli_user WHERE email='$email' LIMIT 1");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $user=$stm->fetch();
        
        if(is_array($user) && password_verify($password, $user["password"])){
            $response["token"]=$user["token"];
            $response["msg"]="Usuario logueado satisfactoriamente";
            return json_encode($response,JSON_UNESCAPED_UNICODE);              
        }
        else{
            $response["msg"]="Asegurate que el email y el password sean correctos";
            return json_encode($response,JSON_UNESCAPED_UNICODE);           
        }
    }catch(PDOException $e){
        $response["error"]=$e->getMessage();
        return json_encode($response,JSON_UNESCAPED_UNICODE);      
    }
}
function setTipoComida($tipo,$token){
    try{
        $database=initConnection();
        $stm = $database->prepare("UPDATE deli_user SET tipo_comida=:tcomida WHERE token=:token LIMIT 1");
        $stm->execute(array(":tcomida" =>$tipo,':token' => $token));
        $queryCount = $stm->rowCount();

        if($queryCount == 1) {
            $response["msg"]="Tipo de comida guardado satisfactoriamente";
        } else {
            $response["error"]="No se ha guardado el tipo de comida, asegurese que el token sea el correcto";
        }
        return json_encode($response,JSON_UNESCAPED_UNICODE);              
    }catch(PDOException $e){
        $response["error"]=$e->getMessage();
        return json_encode($response,JSON_UNESCAPED_UNICODE);      
    }
}
function setBirthDate($birth){
    try{
        $today = new DateTime();
        $birth =new DateTime($birth);
        $age = $today->diff($birth)->y;//Get differences in years
        $database=initConnection();
        $stm = $database->prepare("UPDATE deli_user SET birthdate=:birth,age=:age WHERE token=:token LIMIT 1");
        $stm->execute(array(":birth" =>$birth,':age'=>$age,':token' => $token));
        $queryCount = $stm->rowCount();

        if($queryCount == 1) {
            $response["msg"]="Fecha de nacimiento guardada satisfactoriamente";
        } else {
            $response["error"]="No se ha guardado la fecha de nacimiento asegurese que el token sea el correcto";
        }
        return json_encode($response,JSON_UNESCAPED_UNICODE);              
    }catch(PDOException $e){
        $response["error"]=$e->getMessage();
        return json_encode($response,JSON_UNESCAPED_UNICODE);      
    }
}
function setProfileImage($img,$token){
    $pathUser = $_SERVER['DOCUMENT_ROOT'] . "/media/usuarios/";
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT id FROM deli_user WHERE token='$token' LIMIT 1");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $user=$stm->fetch();
        if(is_array($user)){
            $directory=$pathUser.$user["id"]."/perfil/";  
            $filename = $img->getClientFilename();        
            $stm = $database->prepare("UPDATE deli_user SET image=:imgName WHERE token=:token LIMIT 1");
            $stm->execute(array(":imgName" =>$filename,':token' => $token));
            $files=array_diff(scandir($directory), array('..', '.'));
            //Borrar archivos en el directorio
            foreach($files as $file) {
                unlink($directory.$file);
            }
            
            if(moveUploadedFile($directory, $img)) {
                $response["msg"]="Imagen de perfil guardada satisfactoriamente";
            } else {
                $response["error"]="Ha ocurrido un error al guardar la imagen de perfil";
            }
        }else {
            $response["error"]="Ha ocurrido un error al guardar la imagen de perfil";            
        }        
        return json_encode($response,JSON_UNESCAPED_UNICODE);         
    }catch(PDOException $e){
        $response["error"]=$e->getMessage();
        return json_encode($response,JSON_UNESCAPED_UNICODE);      
    }
}
function moveUploadedFile($directory, UploadedFile $uploadedFile)
{
    $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $uploadedFile->getClientFilename());
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    //Permisos
    foreach($iterator as $item) {
        chmod($item, 0777);
    }
    return true;
}

function recoverPassword($email){
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT * FROM deli_user WHERE email='$email' LIMIT 1");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $queryCount = $stm->rowCount();
            if($queryCount == 1) {
                $user=$stm->fetch();
                $scriptRecover = $_SERVER['SERVER_NAME'];
                $mail = new PHPMailer();
                $mail ->IsSmtp();
                $mail ->SMTPDebug = 0;
                $mail ->SMTPAuth = true;
                $mail ->SMTPSecure = 'ssl';
                $mail ->Host = "smtp.gmail.com";
                $mail ->Port = 465; // or 587
                $mail->CharSet = 'UTF-8';
                $mail ->IsHTML(true);
                $mail ->Username = "imontes.tecinfo@gmail.com";
                $mail ->Password = "Poketod0";
                $mail ->SetFrom("imontes.tecinfo@gmail.com");
                $mail ->Subject = "Recuperacion de Contraseña DELI";
                $mail ->Body = "<a href='".$scriptRecover."/recover.php?auth=".$user["token"]."'>Recuperar contraseña</a>";
                $mail ->AddAddress($email);
             
                if($mail->Send())
                {
                    $response["msg"]="Revisa tu correo para conocer tu nuevo password";
                }
                else
                {
                 $response["msg"]="Ha ocurrido un error al enviar el email";
                }
            } else {
                $response["error"]="El correo no existe en nuestra base de datos";
            }
            return json_encode($response,JSON_UNESCAPED_UNICODE); 
    }catch(PDOException $e){
        $response["error"]=$e->getMessage();
        return json_encode($response,JSON_UNESCAPED_UNICODE);      
    }
}
function updatePassword($token,$newPass,$oldPass){
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT * FROM deli_user WHERE token='$token' LIMIT 1");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $user=$stm->fetch();
        
        if(is_array($user) && password_verify($oldPass, $user["password"])){
            $stm = $database->prepare("UPDATE deli_user SET password=:newPass WHERE token=:token LIMIT 1");
            $stm->execute(array(":newPass" =>password_hash($newPass, PASSWORD_DEFAULT),':token' => $token));
            $queryCount = $stm->rowCount();
            if($queryCount == 1) {
                $response["msg"]="Actualizacion exitosa";
            }else {
                $response["error"]="No se actualizo de manera correcta";
            }           
        }
        else{
            $response["error"]="No se actualizo de manera correcta";
        }
        return json_encode($response,JSON_UNESCAPED_UNICODE);              
    }catch(PDOException $e){
        $response["error"]=$e->getMessage();
        return json_encode($response,JSON_UNESCAPED_UNICODE);      
    }
}
function getProfileInfo($token){
    $pathUser ="/media/usuarios/";
    try{
        $database=initConnection();        
        $stm = $database->prepare("SELECT id,image,username,tipo_comida FROM deli_user WHERE token='$token' LIMIT 1");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $user=$stm->fetch();
    
        if(is_array($user)){
            $user["image"]=$pathUser.$user["id"]."/perfil/".$user["image"];
            $response=$user;
        }else{
            $response["error"]="Asegurese que el token sea el correcto";
        }
        
    }catch(PDOException $e){
        $response["error"]=$e->getMessage();
    }
    return json_encode($response,JSON_UNESCAPED_UNICODE);      
    
}
?>