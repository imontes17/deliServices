<?php
    require_once __DIR__."/../Connection.php";

    function getRestaurants()
    {
        try{
            $database = new Connection();
            $db = $database->openConnection();
            $stm = $db->prepare("SELECT id_restaurant,name_restaurant,category,tipo_comida,precio FROM deli_restaurant");
            $stm->execute();
            $stm->setFetchMode(PDO::FETCH_ASSOC); 
            return $stm->fetchAll();
         }
         catch (PDOException $e)
         {
             return $e->getMessage();
         }
    }
    function getSingleRestaurant($restId)
    {
        try{
            $database = new Connection();
            $db = $database->openConnection();
            $stm = $db->prepare("SELECT * FROM deli_restaurant WHERE id_restaurant = $restId LIMIT 1");
            $stm->execute();
            $stm->setFetchMode(PDO::FETCH_ASSOC); 
            return $stm->fetch();
         }
         catch (PDOException $e)
         {
             return $e->getMessage();
         }
    }
?>