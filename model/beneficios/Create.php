<?php
$pathRest=__DIR__.'/../../media/beneficios/';
require '../Connection.php';

$beneName  = $_POST["beneName"]? $_POST["beneName"] : null;
$beneTipo  = $_POST["beneTipo"]? $_POST["beneTipo"] : null;
$beneCat  = $_POST["beneCat"]? $_POST["beneCat"] : null;
$beneZona  = $_POST["beneZona"]? $_POST["beneZona"] : null;
$beneDir  = $_POST["beneDir"]? $_POST["beneDir"] : null;
$beneBen  = $_POST["beneBen"]? $_POST["beneBen"] : null;
$beneEmail  = $_POST["beneEmail"]? $_POST["beneEmail"] : null;
$beneBene1  = $_POST["beneBene1"]? $_POST["beneBene1"] : null;
$beneBene2  = $_POST["beneBene2"]? $_POST["beneBene2"] : null;
$beneNos  = $_POST["beneNos"]? $_POST["beneNos"] : null;
$beneP1  = $_POST["beneP1"]? $_POST["beneP1"] : null;
$beneP2  = $_POST["beneP2"]? $_POST["beneP2"] : null;

$beneLogo  = $_FILES["beneLogo"] ? $_FILES["beneLogo"]['name'] : null;
$beneImgP  = $_FILES["beneImgP"] ? $_FILES["beneImgP"]['name'] : null;

$beneLink  = $_POST["beneLink"]? $_POST["beneLink"] : null;
$beneFrase  = $_POST["beneFrase"]? $_POST["beneFrase"] : null;
$beneLat  = $_POST["beneLat"]? $_POST["beneLat"] : null;
$beneLon  = $_POST["beneLon"]? $_POST["beneLon"] : null;
$beneHora  = $_POST["beneHora"]? $_POST["beneHora"] : null;
$beneTele  = $_POST["beneTele"]? $_POST["beneTele"] : null;
$beneSitio  = $_POST["beneSitio"]? $_POST["beneSitio"] : null;
$beneRedes  = $_POST["beneRedes"]? $_POST["beneRedes"] : null;

$beneImgSec1  = $_FILES["beneImgSec1"] ? $_FILES["beneImgSec1"]['name'] : null;
$beneImgSec2  = $_FILES["beneImgSec2"] ? $_FILES["beneImgSec2"]['name'] : null;
$beneDesc1  = $_POST["beneDesc1"]? $_POST["beneDesc1"] : null;
$beneDesc2  = $_POST["beneDesc2"]? $_POST["beneDesc2"] : null;

try{
   $database = new Connection();
   $db = $database->openConnection();
   $stm = $db->prepare("
        INSERT INTO deli_beneficios
        (id,nombre,tipo,categoria,zona,direccion,beneficio,correo,beneficio1,beneficio2,nosotros,p1,p2,logo,img_principal,video,img_sec1,img_sec2,desc_img_sec1,desc_img_sec2,frase,latitud,longitud,horario,telefonos,website,social) 
        VALUES 
        (:id,:name,:tipo,:cat,:zone,:addr,:bene,:mail,:bene1,:bene2,:nos,:p1,:p2,:logo,:imgP,:video,:img_sec1,:img_sec2,:desc1,:desc2,:frase,:lat,:long,:hor,:tel,:website,:social)");
        $stm->execute(array(":id"=>null,":name"=>$beneName,":tipo"=>$beneTipo,":cat"=>$beneCat,":zone"=>$beneZona,":addr"=>$beneDir,":bene"=>$beneBen,":mail"=>$beneEmail,":bene1"=>$beneBene1,":bene2"=>$beneBene2,":nos"=>$beneNos,":p1"=>$beneP1,":p2"=>$beneP2,":logo"=>$beneLogo,":imgP"=>$beneImgP,":video"=>$beneLink,":img_sec1"=>$beneImgSec1,":img_sec2"=>$beneImgSec2,":desc1"=>$beneDesc1,":desc2"=>$beneDesc2,":frase"=>$beneFrase,":lat"=>$beneLat,":long"=>$beneLon,":hor"=>$beneHora,":tel"=>$beneTele,":website"=>$beneSitio,":social"=>$beneRedes)); 
        
    $lastRegister=$db->lastInsertId();
    $directory=$pathRest.$lastRegister;

    //if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
        mkdir($directory."/logo", 0777, true);
        mkdir($directory."/imgP", 0777, true);
        mkdir($directory."/imgS1", 0777, true);
        mkdir($directory."/imgS2", 0777, true);
    //}

    if($beneLogo != null){
        copy($_FILES['beneLogo']['tmp_name'],$directory."/logo/". $_FILES["beneLogo"]['name']);        
    }
    if($beneImgP != null){
        copy($_FILES['beneImgP']['tmp_name'],$directory."/imgP/". $_FILES["beneImgP"]['name']);        
    }
    if($beneImgSec1 != null){
        copy($_FILES['beneImgSec1']['tmp_name'],$directory."/imgS1/". $_FILES["beneImgSec1"]['name']);        
    }
    if($beneImgSec2 != null){
        copy($_FILES['beneImgSec2']['tmp_name'],$directory."/imgS2/". $_FILES["beneImgSec2"]['name']);        
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    //Permisos
    foreach($iterator as $item) {
        chmod($item, 0777);
    }
    echo "Se ha agregado el beneficio de forma correcta !!!";
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>