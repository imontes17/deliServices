<?php
require '../Connection.php';

$restId  = $_POST["restId"]? $_POST["restId"] : null;
try{
   $database = new Connection();
   $db = $database->openConnection();
   $sql = "DELETE FROM deli_restaurant WHERE id_restaurant = $restId" ;
   $db->exec($sql);
   echo "Se ha eliminado el restaurante con exito!!!";          
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>