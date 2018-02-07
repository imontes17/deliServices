<?php
require '../Connection.php';
$pathRest=__DIR__.'/../../media/noticias/';

$notiId  = $_POST["notiId"]? $_POST["notiId"] : null;
try{
   $database = new Connection();
   $db = $database->openConnection();
   $sql = "DELETE FROM deli_noticia WHERE id = $notiId LIMIT 1" ;
   $db->exec($sql);
   echo "Se ha eliminado la noticia con exito!!!";                
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>