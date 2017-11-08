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

function getAllRestaurants(){
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT * FROM deli_restaurant");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $arrayOk = setImagesRoute($stm->fetchAll());
        $result = json_encode($arrayOk,JSON_UNESCAPED_UNICODE);
        return $result;
    }catch(PDOException $e){
        return $e->getMessage();
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
function scheduleValidation($restId,$dayWeek){
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT hours,days FROM deli_restaurant WHERE id_restaurant=$restId LIMIT 1");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $restaurante=$stm->fetch();
        
        if(!is_array($restaurante)){
            $response["error"]="Ha ocurrido un error,por favor vuelve a intentarlo";
            return json_encode($response,JSON_UNESCAPED_UNICODE);            
        }
        if($dayWeek>6 || $dayWeek<0 || !is_numeric($dayWeek)){
            $response["error"]="Dia de la semana invalido debe ser en el rango 0-6";
            return json_encode($response,JSON_UNESCAPED_UNICODE);            
        }
        $pos = strpos($restaurante["days"], $dayWeek);
        if($pos===false){
            $hours=explode(",",$restaurante["hours"]);
            $response["blocked_hours"]=$hours;
            return json_encode($response,JSON_UNESCAPED_UNICODE);            

        }else{
            //error dia bloqueado
            $response["error"]="El dia que seleccionaste no tiene servicio disponible";
            return json_encode($response,JSON_UNESCAPED_UNICODE);            
        }
    }catch(PDOException $e){
        $response["error"]=$e->getMessage();
        return json_encode($response,JSON_UNESCAPED_UNICODE);      
    }
}
?>