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

function getAllTrivias(){
    try{
        $database=initConnection();
        $stm = $database->prepare("SELECT * FROM deli_trivia");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $arrayOk = setImagesRoute($stm->fetchAll());

        foreach($arrayOk as $key => $element){
            $arrayOk[$key]["content"] = json_decode($arrayOk[$key]["content"]);
         }  
        
        $result = json_encode($arrayOk,JSON_UNESCAPED_UNICODE);
        return $result;
    }catch(PDOException $e){
        return $e->getMessage();
    }
}
function setImagesRoute($array){
    $pathRest='/media/trivias/';
        foreach($array as $key => $element){
           $id = $array[$key]["id"];
           $array[$key]["logoB"]            = $pathRest.$id."/logoB/".$array[$key]["logoB"];       
           $array[$key]["logoN"]            = $pathRest.$id."/logoN/".$array[$key]["logoN"];
           $array[$key]["imgP"]             = $pathRest.$id."/imgP/".$array[$key]["imgP"];
        }  
        return $array; 
    }
?>