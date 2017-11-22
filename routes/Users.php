<?php
require '../../model/Connection.php';
    
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

?>