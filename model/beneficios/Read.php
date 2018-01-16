<?php
    require_once __DIR__."/../Connection.php";

    function getBeneficios()
    {
        try{
            $database = new Connection();
            $db = $database->openConnection();
            $stm = $db->prepare("SELECT * FROM deli_beneficios");
            $stm->execute();
            $stm->setFetchMode(PDO::FETCH_ASSOC); 
            return $stm->fetchAll();
         }
         catch (PDOException $e)
         {
             return $e->getMessage();
         }
    }
    function getBeneficio($beneId)
    {
        try{
            $database = new Connection();
            $db = $database->openConnection();
            $stm = $db->prepare("SELECT * FROM deli_beneficios WHERE id = $beneId LIMIT 1");
            $stm->execute();
            $stm->setFetchMode(PDO::FETCH_ASSOC); 
            return $stm->fetch();
         }
         catch (PDOException $e)
         {
             return $e->getMessage();
         }
    }
    function getImagesPath($beneEntity)
    {
        $id = $beneEntity["id"];        
        $pathBene='../../media/beneficios/';
        $paths=array();
        if($beneEntity["logo"]!=null){
            $paths["logo"]=$pathBene.$id."/logo/".$beneEntity["logo"];              
        }
        if($beneEntity["img_principal"]!=null){
            $paths["img_principal"]=$pathBene.$id."/imgP/".$beneEntity["img_principal"];              
        }
        if($beneEntity["img_sec1"]!=null){
            $paths["img_sec1"]=$pathBene.$id."/imgS1/".$beneEntity["img_sec1"];              
        }
        if($beneEntity["img_sec2"]!=null){
            $paths["img_sec2"]=$pathBene.$id."/imgS2/".$beneEntity["img_sec2"];              
        }
        return $paths;     
       
    }
?>