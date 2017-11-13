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

function getRestaurantsByCategory($catId){
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT id_restaurant,name_restaurant,category,zona,incluye,direccion,imagen_principal,tipo_comida,precio,img_price,introduccion,p1,p2,p3,logo,link_video,imagen_2,imagen_3,frase,editorial,logo_editorial FROM deli_restaurant WHERE deli_categories_id_category=$catId");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $arrayOk = setImagesRoute($stm->fetchAll());
        $result = json_encode($arrayOk,JSON_UNESCAPED_UNICODE);
        return $result;
    }catch(PDOException $e){
        return $e->getMessage();
    }
}

function setImagesRoute($array){
$pathRest='/media/restaurantes/';
    foreach($array as $key => $element){
       $id = $array[$key]["id_restaurant"];
       $array[$key]["img_price"]        = $pathRest.$id."/imgPrecio/".$array[$key]["img_price"];       
       $array[$key]["imagen_principal"] = $pathRest.$id."/imgP/".$array[$key]["imagen_principal"];
       $array[$key]["logo"]             = $pathRest.$id."/logo/".$array[$key]["logo"];
       $array[$key]["imagen_2"]         = $pathRest.$id."/img2/".$array[$key]["imagen_2"];
       $array[$key]["imagen_3"]         = $pathRest.$id."/img3/".$array[$key]["imagen_3"];
       $array[$key]["logo_editorial"]   = $pathRest.$id."/logoE/".$array[$key]["logo_editorial"]; 
    }  
    return $array; 
}

?>