<?php
require '../../model/Connection.php';
require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
    try{
        $db=initConnection();
        $stm = $db->prepare("INSERT INTO 
        deli_user(id,username,email,password,token) 
        VALUES (:id,:username,:email,:pass,:tok)");
        $stm->execute(array(":id" =>null,':username'=>$username,':email'=>$email,':pass'=>password_hash($pass, PASSWORD_DEFAULT),':tok'=>sha1($email)));      
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
?>