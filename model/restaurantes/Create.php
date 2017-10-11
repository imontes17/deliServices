<?php

require '../Connection.php';

try{
    $database = new Connection();    
    $db = $database->openConnection();    
    // inserting data into create table using prepare statement to prevent from sql injections
    $stm = $db->prepare("INSERT INTO tabla1 (ID,c1,c2,c3) VALUES ( :id, :name, :lastname, :email)") ;
    // inserting a record
    $stm->execute(array(':id' => 0 , ':name' => 'Saquib' , ':lastname' => 'Rizwan' , ':email' => 'saquib.rizwan@cloudways.com'));
    return true;
}
catch (PDOException $e)
{
    return false;
}

?>