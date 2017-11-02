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
    function getImagesPath($restaurantEntity)
    {
        $id = $restaurantEntity["id_restaurant"];        
        $pathRest='../../media/restaurantes/';
        $paths=array();
        if($restaurantEntity["img_price"]!=null){
            $paths["restImgPrecio"]=$pathRest.$id."/imgPrecio/".$restaurantEntity["img_price"];              
        }
        if($restaurantEntity["logo"]!=null){
            $paths["restLogo"]=$pathRest.$id."/logo/".$restaurantEntity["logo"];              
        }
        if($restaurantEntity["imagen_principal"]!=null){
            $paths["restImgp"]=$pathRest.$id."/imgP/".$restaurantEntity["imagen_principal"];              
        }
        if($restaurantEntity["imagen_2"]!=null){
            $paths["restImg2"]=$pathRest.$id."/img2/".$restaurantEntity["imagen_2"];              
        }
        if($restaurantEntity["imagen_3"]!=null){
            $paths["restImg3"]=$pathRest.$id."/img3/".$restaurantEntity["imagen_3"];              
        }
        if($restaurantEntity["logo_editorial"]!=null){
            $paths["restLogoEdit"]=$pathRest.$id."/logoE/".$restaurantEntity["logo_editorial"];              
        }
        return $paths;     
       
    }
?>