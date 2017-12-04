<?php
require '../Connection.php';
$pathRest=__DIR__.'/../../media/noticias/';

$notiId  = $_POST["notiId"]? $_POST["notiId"] : null;
try{
   $database = new Connection();
   $db = $database->openConnection();
   $sql = "DELETE FROM deli_noticia WHERE id = $notiId" ;
   $db->exec($sql);
   $pathRest=$pathRest.$restId;
   if(!system('rm -rf ' . escapeshellarg($pathRest))){//Borra las fotos
    echo "Se ha eliminado la noticia con exito!!!";             
   }else{
       echo "No se ha terminado el proceso!!!";
   }
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>