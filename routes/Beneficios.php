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

function getAllBeneficios(){
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT * FROM deli_beneficios");
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
$pathRest='/media/beneficios/';
    foreach($array as $key => $element){
       $id = $array[$key]["id"];
       $array[$key]["img_principal"]            = $pathRest.$id."/imgP/".$array[$key]["img_principal"];
       $array[$key]["logo"]             = $pathRest.$id."/logo/".$array[$key]["logo"];
       $array[$key]["img_sec1"]         = $pathRest.$id."/imgS1/".$array[$key]["img_sec1"];       
       $array[$key]["img_sec2"]         = $pathRest.$id."/imgS2/".$array[$key]["img_sec2"];
    }  
    return $array; 
}

?>