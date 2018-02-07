<?php
require '../Connection.php';
$path=$_SERVER['DOCUMENT_ROOT'].'/media/beneficios/';

$beneId  = $_POST["beneId"]? $_POST["beneId"] : null;
try{
   $database = new Connection();
   $db = $database->openConnection();
   $sql = "DELETE FROM deli_beneficios WHERE id = $beneId LIMIT 1" ;
   $db->exec($sql);
   $pathRest=$pathRest.$beneId;
   system('rm -rf ' . escapeshellarg($path.$beneId));   
   echo "Se ha eliminado el beneficio con exito!!!";             
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>