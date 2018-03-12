<?php
require '../Connection.php';
$restOld   = $_POST["old"]? $_POST["old"] : null;
$restNew   = $_POST["new"]? $_POST["new"] : null;

try{
   $database = new Connection();
   $db = $database->openConnection();
   $stm = $db->prepare("
        UPDATE deli_restaurant 
        SET destacado=0 WHERE id_restaurant=:id");
    $stm->execute(array(":id" =>$restOld)); 
    $stm = $db->prepare("
        UPDATE deli_restaurant 
        SET destacado=1 WHERE id_restaurant=:id");
    $stm->execute(array(":id" =>$restNew));     
    echo "Se ha actualizado el restaurante destacado !!!";
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>