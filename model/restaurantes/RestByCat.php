<?php
require '../Connection.php';
$restCat  = $_POST["cat"]? $_POST["cat"] : null;
try{
   $database = new Connection();
   $db = $database->openConnection();
   $stm = $db->prepare("SELECT id_restaurant,name_restaurant FROM deli_restaurant WHERE category='$restCat'");
   $stm->execute();
   $stm->setFetchMode(PDO::FETCH_ASSOC); 
   $result = json_encode($stm->fetchAll(),JSON_UNESCAPED_UNICODE);
   echo $result;
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>