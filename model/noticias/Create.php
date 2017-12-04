<?php
$pathRest=__DIR__.'/../../media/noticias/';
require '../Connection.php';
//error_log("¡Lo echaste a perder!", 3, "/var/tmp/my-errors.log");
//Get vars 
$notiName  = $_POST["notiName"]? $_POST["notiName"] : null;
$notiCat   = $_POST["notiCat"]? $_POST["notiCat"] : null;
$notiImgAutor = $_FILES["notiImgAutor"] ? $_FILES["notiImgAutor"]['name'] : null;
$notiAutor  = $_POST["notiAutor"]? $_POST["notiAutor"] : null;
$notiSub  = $_POST["notiSub"]? $_POST["notiSub"] : null;
$notiFecha  = $_POST["notiFecha"]? $_POST["notiFecha"] : null;
$notiIntro  = $_POST["notiIntro"]? $_POST["notiIntro"] : null;
$notiEnca  = $_POST["notiEnca"]? $_POST["notiEnca"] : null;
$notiP1  = $_POST["notiP1"]? $_POST["notiP1"] : null;
$notiP2  = $_POST["notiP2"]? $_POST["notiP2"] : null;
$notiP3  = $_POST["notiP3"]? $_POST["notiP3"] : null;
$notiP4  = $_POST["notiP4"]? $_POST["notiP4"] : null;
$notiLogo = $_FILES["notiLogo"] ? $_FILES["notiLogo"]['name'] : null;
$notiImgP = $_FILES["notiImgP"] ? $_FILES["notiImgP"]['name'] : null;
$notiVideo  = $_POST["notiVideo"]? $_POST["notiVideo"] : null;
$notiImgSec1 = $_FILES["notiImgSec1"] ? $_FILES["notiImgSec1"]['name'] : null;
$notiImgSec2 = $_FILES["notiImgSec2"] ? $_FILES["notiImgSec2"]['name'] : null;
$notiImgSec3 = $_FILES["notiImgSec3"] ? $_FILES["notiImgSec3"]['name'] : null;
$notiDesc1  = $_POST["notiDesc1"]? $_POST["notiDesc1"] : null;
$notiDesc2  = $_POST["notiDesc2"]? $_POST["notiDesc2"] : null;
$notiDesc3  = $_POST["notiDesc3"]? $_POST["notiDesc3"] : null;
$notiFrase  = $_POST["notiFrase"]? $_POST["notiFrase"] : null;
$notiEdit  = $_POST["notiEdit"]? $_POST["notiEdit"] : null;
$notiLogoEdit = $_FILES["notiLogoEdit"] ? $_FILES["notiLogoEdit"]['name'] : null;
$notiSuge  = $_POST["notiSuge"]? $_POST["notiSuge"] : null;

//copy($_FILES['restLogoEdit']['tmp_name'],$pathRest. $_FILES["restLogoEdit"]['name']);

try{
   $database = new Connection();
   $db = $database->openConnection();
   $stm = $db->prepare("
        INSERT INTO deli_noticia 
        (id,name,categoria,img_autor,autor,subtitulo,fecha,introduccion,encabezado,p1,p2,p3,p4,logo,img_p,video,img_sec1,img_sec2,img_sec3,desc_img_sec1,desc_img_sec2,desc_img_sec3,frase,editorial,logo_editorial,sugeridos) 
        VALUES 
        (:id,:name,:cat,:imgA,:aut,:sub,:fecha,:intro,:enca,:p1,:p2,:p3,:p4,:logo,:imgP,:vid,:imgS1,:imgS2,:imgS3,:descImgS1,:descImgS2,:descImgS3,:frase,:edit,:logoE,:sug)");
    $stm->execute(array(":id"=>null,":name"=>$notiName,":cat"=>$notiCat,":imgA"=>$notiImgAutor,":aut"=>$notiAutor,":sub"=>$notiSub,":fecha"=>$notiFecha,":intro"=>$notiIntro,":enca"=>$notiEnca,":p1"=>$notiP1,":p2"=>$notiP2,":p3"=>$notiP3,":p4"=>$notiP4,":logo"=>$notiLogo,":imgP"=>$notiImgP,":vid"=>$notiVideo,":imgS1"=>$notiImgSec1,":imgS2"=>$notiImgSec2,":imgS3"=>$notiImgSec3,":descImgS1"=>$notiDesc1,":descImgS2"=>$notiDesc2,":descImgS3"=>$notiDesc3,":frase"=>$notiFrase,":edit"=>$notiEdit,":logoE"=>$notiLogoEdit,":sug"=>$notiSuge)); 
    
    $lastRegister=$db->lastInsertId();
    $directory=$pathRest.$lastRegister;

    //if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
        mkdir($directory."/autor", 0777, true);
        mkdir($directory."/imgP", 0777, true);
        mkdir($directory."/logo", 0777, true);
        mkdir($directory."/imgS1", 0777, true);
        mkdir($directory."/imgS2", 0777, true);        
        mkdir($directory."/imgS3", 0777, true);
        mkdir($directory."/logoE", 0777, true);
    //}

    if($notiImgAutor != null){
        copy($_FILES['notiImgAutor']['tmp_name'],$directory."/autor/". $_FILES["notiImgAutor"]['name']);        
    }
    if($notiImgP != null){
        copy($_FILES['notiImgP']['tmp_name'],$directory."/imgP/". $_FILES["notiImgP"]['name']);        
    }
    if($notiLogo != null){
        copy($_FILES['notiLogo']['tmp_name'],$directory."/logo/". $_FILES["notiLogo"]['name']);        
    }
    if($notiImgSec1 != null){
        copy($_FILES['notiImgSec1']['tmp_name'],$directory."/imgS1/". $_FILES["notiImgSec1"]['name']);        
    }
    if($notiImgSec2 != null){
        copy($_FILES['notiImgSec2']['tmp_name'],$directory."/imgS2/". $_FILES["notiImgSec2"]['name']);        
    }
    if($notiImgSec3 != null){
        copy($_FILES['notiImgSec3']['tmp_name'],$directory."/imgS3/". $_FILES["notiImgSec3"]['name']);        
    }
    if($notiLogoEdit != null){
        copy($_FILES['notiLogoEdit']['tmp_name'],$directory."/logoE/". $_FILES["notiLogoEdit"]['name']);        
    }
    
    
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    //Permisos
    foreach($iterator as $item) {
        chmod($item, 0777);
    }
    echo "Se ha agregado forma correcta !!!";
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>