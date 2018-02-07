<?php
require '../Connection.php';
$path=$_SERVER['DOCUMENT_ROOT'].'/media/usuarios/';

$userId  = $_POST["userId"]? $_POST["userId"] : null;
try{
   $database = new Connection();
   $db = $database->openConnection();
   $sql = "DELETE FROM deli_user WHERE id = $userId LIMIT 1" ;
   $db->exec($sql);
   system('rm -rf ' . escapeshellarg($path.$userId));      
   echo "Se ha eliminado al usuario con exito!!!";             
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>