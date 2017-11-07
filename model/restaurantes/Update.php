<?php
$pathRest=__DIR__.'/../../media/restaurantes/';
require '../Connection.php';
//error_log("¡Lo echaste a perder!", 3, "/var/tmp/my-errors.log");
//Get vars 
$restId  = $_POST["restId"]? $_POST["restId"] : null;
$restName  = $_POST["restName"]? $_POST["restName"] : null;
$restCat   = $_POST["restCat"]? $_POST["restCat"] : null;

 if($restCat != null){
    $restCat = explode( '-', $restCat);
 }else{
     $restCat[0]=null;
     $restCat[1]=null;     
 }

$restZone  = $_POST["restZone"]? $_POST["restZone"] : null;
$restAddr  = $_POST["restAddr"]? $_POST["restAddr"] : null;
$restTcom  = $_POST["restTcom"]? $_POST["restTcom"] : null;
$restPrice = $_POST["restPrice"]? $_POST["restPrice"] : null;
$restImgPrice  = $_FILES['restImgPrecio']['size'] > 0 ? $_FILES["restImgPrecio"]['name'] : $_POST["imgPrecioOld"];
$restInclu = $_POST["restInclu"]? $_POST["restInclu"] : null;
$restIntro = $_POST["restIntro"]? $_POST["restIntro"] : null;
$restP1    = $_POST["restP1"]? $_POST["restP1"] : null;
$restP2    = $_POST["restP2"]? $_POST["restP2"] : null;
$restP3    = $_POST["restP3"]? $_POST["restP3"] : null;
$restLogo  = $_FILES['restLogo']['size'] > 0? $_FILES["restLogo"]['name'] : $_POST["logoOld"];
$restImgp  = $_FILES['restImgp']['size'] > 0 ? $_FILES["restImgp"]['name'] : $_POST["imgpOld"];
$restVideo = $_POST["restVideo"]? $_POST["restVideo"] : null;
$restImg2  = $_FILES['restImg2']['size'] > 0? $_FILES["restImg2"]['name'] : $_POST["img2Old"];
$restImg3  = $_FILES['restImg3']['size'] > 0? $_FILES["restImg3"]['name'] : $_POST["img3Old"];
$restFrase = $_POST["restFrase"]? $_POST["restFrase"] : null;
$restEdit  = $_POST["restEdit"]? $_POST["restEdit"] : null;
$restLogoEdit = $_FILES['restLogoEdit']['size'] > 0? $_FILES["restLogoEdit"]['name'] : $_POST["logoEditOld"];
$restSug   = $_POST["restSug"]? $_POST["restSug"] : null;
$restCoord = $_POST["restCoord"]? $_POST["restCoord"] : null;
$restOrdDeli = $_POST["restOrdDeli"]? $_POST["restOrdDeli"] : null;
$restOrdAdi = $_POST["restOrdAdi"] ? $_POST["restOrdAdi"] : null ;
$restDays  = $_POST["restDays"];
$restHours  = $_POST["restHours"];
//copy($_FILES['restLogoEdit']['tmp_name'],$pathRest. $_FILES["restLogoEdit"]['name']);

try{
   $database = new Connection();
   $db = $database->openConnection();
   $stm = $db->prepare("
        UPDATE deli_restaurant 
        SET id_restaurant=:id,name_restaurant=:name,category=:cat,zona=:zone,direccion=:addr,tipo_comida=:tcom,precio=:precio,img_price=:imgPrice,incluye=:inclu,introduccion=:intro,p1=:p1,p2=:p2,p3=:p3,logo=:logo,imagen_principal=:imgP,link_video=:video,imagen_2=:img2,imagen_3=:img3,frase=:frase,editorial=:edit,logo_editorial=:ledit,sugeridos=:sug,cordenadas=:coord,no_ordenes_deli=:ordD,no_ordenes_adicionales=:ordA,deli_categories_id_category=:catId,days=:days,hours=:hours WHERE id_restaurant=:id");
    $stm->execute(array(":id" =>$restId,':name' => $restName , ':cat' =>$restCat[1]  , ':zone' =>$restZone,':addr'=> $restAddr,':tcom'=> $restTcom,':precio'=> $restPrice,'imgPrice'=>$restImgPrice,':inclu'=>$restInclu,':intro'=>$restIntro,':p1'=>$restP1,':p2'=>$restP2,':p3'=>$restP3,':logo'=>$restLogo,':imgP'=>$restImgp,':video'=>$restVideo,':img2'=>$restImg2,':img3'=>$restImg3,':frase'=>$restFrase,':edit'=>$restEdit,':ledit'=>$restLogoEdit,':sug'=>$restSug,':coord'=>$restCoord,':ordD'=>$restOrdDeli,':ordA'=>$restOrdAdi,':catId'=>$restCat[0],':days'=>$restDays,':hours'=>$restHours)); 

    
    $directory=$pathRest.$restId;
    if($_FILES['restImgPrecio']['size'] > 0){
        copy($_FILES['restImgPrecio']['tmp_name'],$directory."/imgPrecio/". $_FILES["restImgPrecio"]['name']);        
    }
    if($_FILES['restLogo']['size'] > 0){
        copy($_FILES['restLogo']['tmp_name'],$directory."/logo/". $_FILES["restLogo"]['name']);        
    }
    if($_FILES["restImgp"]['size'] > 0){
        copy($_FILES['restImgp']['tmp_name'],$directory."/imgP/". $_FILES["restImgp"]['name']);        
    }
    if($_FILES["restImg2"]['size'] > 0){
        copy($_FILES['restImg2']['tmp_name'],$directory."/img2/". $_FILES["restImg2"]['name']);        
    }
    if($_FILES["restImg3"]['size'] > 0){
        copy($_FILES['restImg3']['tmp_name'],$directory."/img3/". $_FILES["restImg3"]['name']);        
    }
    if($_FILES["restLogoEdit"]['size'] > 0){
        copy($_FILES['restLogoEdit']['tmp_name'],$directory."/logoE/". $_FILES["restLogoEdit"]['name']);        
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    //Permisos
    foreach($iterator as $item) {
        chmod($item, 0777);
    }
    echo "Se ha actualizado el restaurante de forma correcta !!!";
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>