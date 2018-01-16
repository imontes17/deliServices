<?php
require '../Connection.php';
$pathRest=__DIR__.'/../../media/beneficios/';

$beneId  = $_POST["beneId"]? $_POST["beneId"] : null;
try{
   $database = new Connection();
   $db = $database->openConnection();
   $sql = "DELETE FROM deli_beneficios WHERE id = $beneId LIMIT 1" ;
   $db->exec($sql);
   $pathRest=$pathRest.$beneId;
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