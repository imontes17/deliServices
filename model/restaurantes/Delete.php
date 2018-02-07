<?php
require '../Connection.php';
$pathRest=__DIR__.'/../../media/restaurantes/';

$restId  = $_POST["restId"]? $_POST["restId"] : null;
try{
   $database = new Connection();
   $db = $database->openConnection();
   $sql = "DELETE FROM deli_restaurant WHERE id_restaurant = $restId LIMIT 1" ;
   $db->exec($sql);
   $pathRest=$pathRest.$restId;
   if(!system('rm -rf ' . escapeshellarg($pathRest))){//Borra las fotos
    echo "Se ha eliminado el restaurante con exito!!!";             
   }else{
       echo "No se ha terminado el proceso!!!";
   }
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>