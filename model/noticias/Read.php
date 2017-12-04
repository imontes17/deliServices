<?php
    require_once __DIR__."/../Connection.php";

    function getNotices()
    {
        try{
            $database = new Connection();
            $db = $database->openConnection();
            $stm = $db->prepare("SELECT * FROM deli_noticia");
            $stm->execute();
            $stm->setFetchMode(PDO::FETCH_ASSOC); 
            return $stm->fetchAll();
         }
         catch (PDOException $e)
         {
             return $e->getMessage();
         }
    }
    
?>