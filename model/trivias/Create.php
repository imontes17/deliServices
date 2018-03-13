<?php
$pathRest=__DIR__.'/../../media/trivias/';
require '../Connection.php';
//error_log("¡Lo echaste a perder!", 3, "/var/tmp/my-errors.log");
//Get vars 
$trivName  = $_POST["trivName"]? $_POST["trivName"] : null;
$trivFecha  = $_POST["trivFecha"]? $_POST["trivFecha"] : null;
$trivInclu  = $_POST["trivInclu"]? $_POST["trivInclu"] : null;
$trivVig  = $_POST["trivVig"]? $_POST["trivVig"] : null;
$trivPremio  = $_POST["trivPremio"]? $_POST["trivPremio"] : null;


$trivLogoN  = $_FILES["trivLogoN"] ? $_FILES["trivLogoN"]['name'] : null;
$trivLogoB  = $_FILES["trivLogoB"] ? $_FILES["trivLogoB"]['name'] : null;
$trivImgP  = $_FILES["trivImgP"] ? $_FILES["trivImgP"]['name'] : null;

$trivCont  = $_POST["trivCont"]? $_POST["trivCont"] : null;
$trivAnsw  = $_POST["answers"]? $_POST["answers"] : null;
//copy($_FILES['restLogoEdit']['tmp_name'],$pathRest. $_FILES["restLogoEdit"]['name']);

try{
   $database = new Connection();
   $db = $database->openConnection();
   $stm = $db->prepare("
        INSERT INTO deli_trivia
        (id,name,status,fecha,incluye,vigencia,premio,logoB,logoN,imgP,content,answers) 
        VALUES 
        (:id,:name,:status,:fecha,:inclu,:vig,:prem,:logoB,:logoN,:imgP,:cont,:answ)");
    $stm->execute(array(":id" =>null,':name' => $trivName ,':status'=>"Disponible",':fecha' =>$trivFecha , ':inclu' =>$trivInclu,':vig'=> $trivVig,':prem'=> $trivPremio,':logoB'=> $trivLogoB,':logoN'=>$trivLogoN,':imgP'=>$trivImgP,':cont'=>$trivCont,':answ'=>$trivAnsw)); 
    
    $lastRegister=$db->lastInsertId();
    $directory=$pathRest.$lastRegister;

    //if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
        mkdir($directory."/logoB", 0777, true);
        mkdir($directory."/imgP", 0777, true);
        mkdir($directory."/logoN", 0777, true);
    //}

    if($trivLogoB != null){
        copy($_FILES['trivLogoB']['tmp_name'],$directory."/logoB/". $_FILES["trivLogoB"]['name']);        
    }
    if($trivLogoN != null){
        copy($_FILES['trivLogoN']['tmp_name'],$directory."/logoN/". $_FILES["trivLogoN"]['name']);        
    }
    if($trivImgP != null){
        copy($_FILES['trivImgP']['tmp_name'],$directory."/imgP/". $_FILES["trivImgP"]['name']);        
    }
    
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    //Permisos
    foreach($iterator as $item) {
        chmod($item, 0777);
    }
    echo "Se ha agregado la trivia de forma correcta !!!";
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>