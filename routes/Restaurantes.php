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
function getRestaurantById($id){
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT id_restaurant,name_restaurant,category,zona,incluye,direccion,imagen_principal,tipo_comida,precio,img_price,introduccion,p1,p2,p3,logo,link_video,imagen_2,imagen_3,frase,editorial,logo_editorial,thumbnail,tolerancia,tag,nickname FROM deli_restaurant WHERE id_restaurant=$id LIMIT 1");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $restaurante=$stm->fetch();
        
        if(is_array($restaurante)){
            $arrayOk = setImagesToRestaurant($restaurante);
            $result = json_encode($arrayOk,JSON_UNESCAPED_UNICODE);
            return $result;
        }
        else{
            $response["error"]="No existe restaurante con id: $id";
            return json_encode($response,JSON_UNESCAPED_UNICODE);           
        }
        
    }catch(PDOException $e){
        $response["error"]="No existe restaurante con id: $id";
        return json_encode($response,JSON_UNESCAPED_UNICODE);                   
    }
}

function getRestaurantsByCategory($catId){
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT id_restaurant,name_restaurant,category,zona,incluye,direccion,imagen_principal,tipo_comida,precio,img_price,introduccion,p1,p2,p3,logo,link_video,imagen_2,imagen_3,frase,editorial,logo_editorial,tolerancia,tag,nickname FROM deli_restaurant WHERE deli_categories_id_category=$catId");
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
       $array[$key]["thumbnail"]   = $pathRest.$id."/thumbnail/".$array[$key]["thumbnail"]; 
       
    }  
    return $array; 
}
function setImagesToRestaurant($array){
    $pathRest='/media/restaurantes/';
       $id = $array["id_restaurant"];
       $array["img_price"]        = $pathRest.$id."/imgPrecio/".$array["img_price"];       
       $array["imagen_principal"] = $pathRest.$id."/imgP/".$array["imagen_principal"];
       $array["logo"]             = $pathRest.$id."/logo/".$array["logo"];
       $array["imagen_2"]         = $pathRest.$id."/img2/".$array["imagen_2"];
       $array["imagen_3"]         = $pathRest.$id."/img3/".$array["imagen_3"];
       $array["logo_editorial"]   = $pathRest.$id."/logoE/".$array["logo_editorial"]; 
       $array["thumbnail"]        = $pathRest.$id."/thumbnail/".$array["thumbnail"]; 
       
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

function getRestaurantsByProximity($rango,$latitud,$longitud){
    try{
        $nearRest=[];
        $database=initConnection();
        $stm = $database->prepare("SELECT id_restaurant,name_restaurant,latitud,longitud,nickname,tag,tolerancia,thumbnail,nickname FROM deli_restaurant WHERE latitud IS NOT NULL AND longitud IS NOT NULL");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $restaurantes=$stm->fetchAll();
        foreach($restaurantes as $rest){
            if(isNearOf($rest,$latitud,$longitud)<=$rango){
                //$diff=isNearOf($rest,$latitud,$longitud);
                //$rest["diff"]=$diff;
                array_push($nearRest,$rest);
            }
        }
        if(!empty($nearRest)){
            $nearRest=setImagesRoute($nearRest);
            return json_encode($nearRest,JSON_UNESCAPED_UNICODE);                          
        }else{
            $response["msg"]="No hay restaurantes cerca de ti";
            return json_encode($response,JSON_UNESCAPED_UNICODE);    
        }

    }catch(PDOException $e){
        $response["error"]=$e->getMessage();
        return json_encode($response,JSON_UNESCAPED_UNICODE);      
    }
}

function isNearOf($rest,$latitud,$longitud){
    /*$degtorad = 0.01745329; 
    $radtodeg = 57.29577951; 
    
    $dlong = ($longitud - $rest["longitud"]); 
    $dvalue = (sin($latitud * $degtorad) * sin($rest["latitud"] * $degtorad)) 
    + (cos($latitud * $degtorad) * cos($rest["latitud"] * $degtorad) 
    * cos($dlong * $degtorad)); 
    
    $dd = acos($dvalue) * $radtodeg; 
    
   // $miles = ($dd * 69.16); 
    $km = ($dd * 111.302); 
    
    return $km;*/ 
    $lat0 = $latitud;
    $lng0 = $longitud;
    $lat1 = (float)$rest["latitud"];
    $lng1 = (float)$rest["longitud"];

    $rlat0 = deg2rad($lat0);
    $rlng0 = deg2rad($lng0);
    $rlat1 = deg2rad($lat1);
    $rlng1 = deg2rad($lng1);

    $latDelta = $rlat1 - $rlat0;
    $lonDelta = $rlng1 - $rlng0;

    $distance = (6371 *
    acos(
        cos($rlat0) * cos($rlat1) * cos($lonDelta) +
        sin($rlat0) * sin($rlat1)
    )
);
return $distance;
}
?>