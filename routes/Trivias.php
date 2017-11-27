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
        $stm = $database->prepare("SELECT name,premio,content FROM deli_trivia");
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC); 
        $result = json_encode($stm->fetchAll(),JSON_UNESCAPED_UNICODE);
        return $result;
    }catch(PDOException $e){
        return $e->getMessage();
    }
}

?>