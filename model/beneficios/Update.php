<?php
$pathRest=__DIR__.'/../../media/beneficios/';
require '../Connection.php';
$beneId  = $_POST["beneId"]? $_POST["beneId"] : null;
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

$beneLogo  = $_FILES["beneLogo"]['size'] > 0 ? $_FILES["beneLogo"]['name'] : $_POST["logoOld"];
$beneImgP  = $_FILES["beneImgP"]['size'] > 0 ? $_FILES["beneImgP"]['name'] : $_POST["imgPOld"];

$beneLink  = $_POST["beneLink"]? $_POST["beneLink"] : null;
$beneFrase  = $_POST["beneFrase"]? $_POST["beneFrase"] : null;
$beneLat  = $_POST["beneLat"]? $_POST["beneLat"] : null;
$beneLon  = $_POST["beneLon"]? $_POST["beneLon"] : null;
$beneHora  = $_POST["beneHora"]? $_POST["beneHora"] : null;
$beneTele  = $_POST["beneTele"]? $_POST["beneTele"] : null;
$beneSitio  = $_POST["beneSitio"]? $_POST["beneSitio"] : null;
$beneRedes  = $_POST["beneRedes"]? $_POST["beneRedes"] : null;

$beneImgSec1  = $_FILES["beneImgSec1"]['size'] > 0 ? $_FILES["beneImgSec1"]['name'] : $_POST["imgS1Old"];
$beneImgSec2  = $_FILES["beneImgSec2"]['size'] > 0 ? $_FILES["beneImgSec2"]['name'] : $_POST["imgS2Old"];
$beneDesc1  = $_POST["beneDesc1"]? $_POST["beneDesc1"] : null;
$beneDesc2  = $_POST["beneDesc2"]? $_POST["beneDesc2"] : null;

try{
   $database = new Connection();
   $db = $database->openConnection();
   $stm = $db->prepare("
        UPDATE deli_beneficios
        SET nombre=:name,tipo=:tipo,categoria=:cat,zona=:zone,direccion=:addr,beneficio=:bene,correo=:email,beneficio1=:bene1,beneficio2=:bene2,nosotros=:nos,p1=:p1,p2=:p2,logo=:logo,img_principal=:imgP,video=:video,img_sec1=:img_sec1,img_sec2=:img_sec2,desc_img_sec1=:desc1,desc_img_sec2=:desc2,frase=:frase,latitud=:lat,longitud=:long,horario=:hor,telefonos=:tel,website=:website,social=:social WHERE id=:id LIMIT 1");
        $stm->execute(array(":id"=>$beneId,":name"=>$beneName,":tipo"=>$beneTipo,":cat"=>$beneCat,":zone"=>$beneZona,":addr"=>$beneDir,":bene"=>$beneBen,":email"=>$beneEmail,":bene1"=>$beneBene1,":bene2"=>$beneBene2,":nos"=>$beneNos,":p1"=>$beneP1,":p2"=>$beneP2,":logo"=>$beneLogo,":imgP"=>$beneImgP,":video"=>$beneLink,":img_sec1"=>$beneImgSec1,":img_sec2"=>$beneImgSec2,":desc1"=>$beneDesc1,":desc2"=>$beneDesc2,":frase"=>$beneFrase,":lat"=>$beneLat,":long"=>$beneLon,":hor"=>$beneHora,":tel"=>$beneTele,":website"=>$beneSitio,":social"=>$beneRedes)); 
        
    $directory=$pathRest.$beneId;

    if($_FILES["beneLogo"]['size'] > 0){
        copy($_FILES['beneLogo']['tmp_name'],$directory."/logo/". $_FILES["beneLogo"]['name']);        
    }
    if($_FILES["beneImgP"]['size'] > 0){
        copy($_FILES['beneImgP']['tmp_name'],$directory."/imgP/". $_FILES["beneImgP"]['name']);        
    }
    if($_FILES["beneImgSec1"]['size'] > 0){
        copy($_FILES['beneImgSec1']['tmp_name'],$directory."/imgS1/". $_FILES["beneImgSec1"]['name']);        
    }
    if($_FILES["beneImgSec2"]['size'] > 0){
        copy($_FILES['beneImgSec2']['tmp_name'],$directory."/imgS2/". $_FILES["beneImgSec2"]['name']);        
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    //Permisos
    foreach($iterator as $item) {
        chmod($item, 0777);
    }
    echo "Se ha actualizado el beneficio de forma correcta !!!";
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>