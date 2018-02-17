<?php
require '../Connection.php';
$path=$_SERVER['DOCUMENT_ROOT'].'/media/trivias/';

$trivId  = $_POST["trivId"]? $_POST["trivId"] : null;
try{
   $database = new Connection();
   $db = $database->openConnection();
   $sql = "DELETE FROM deli_trivia WHERE id = $trivId LIMIT 1" ;
   $db->exec($sql);
   system('rm -rf ' . escapeshellarg($path.$trivId));      
   echo "Se ha eliminado la trivia con exito!!!";             
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>