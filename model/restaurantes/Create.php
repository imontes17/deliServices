<?php
$pathRest=__DIR__.'/../../media/restaurantes/';
require '../Connection.php';
//error_log("¡Lo echaste a perder!", 3, "/var/tmp/my-errors.log");
//Get vars 
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
$restImgPrice  = $_FILES["restImgPrecio"] ? $_FILES["restImgPrecio"]['name'] : null;
$restInclu = $_POST["restInclu"]? $_POST["restInclu"] : null;
$restIntro = $_POST["restIntro"]? $_POST["restIntro"] : null;
$restP1    = $_POST["restP1"]? $_POST["restP1"] : null;
$restP2    = $_POST["restP2"]? $_POST["restP2"] : null;
$restP3    = $_POST["restP3"]? $_POST["restP3"] : null;
$restLogo  = $_FILES["restLogo"]? $_FILES["restLogo"]['name'] : null;
$restImgp  = $_FILES["restImgp"] ? $_FILES["restImgp"]['name'] : null;
$restVideo = $_POST["restVideo"]? $_POST["restVideo"] : null;
$restImg2  = $_FILES["restImg2"]? $_FILES["restImg2"]['name'] : null;
$restImg3  = $_FILES["restImg3"]? $_FILES["restImg3"]['name'] : null;
$restFrase = $_POST["restFrase"]? $_POST["restFrase"] : null;
$restEdit  = $_POST["restEdit"]? $_POST["restEdit"] : null;
$restLogoEdit = $_FILES["restLogoEdit"]? $_FILES["restLogoEdit"]['name'] : null;
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
        INSERT INTO deli_restaurant 
        (id_restaurant,name_restaurant,category,zona,direccion,tipo_comida,precio,img_price,incluye,introduccion,p1,p2,p3,logo,imagen_principal,link_video,imagen_2,imagen_3,frase,editorial,logo_editorial,sugeridos,cordenadas,no_ordenes_deli,no_ordenes_adicionales,deli_categories_id_category,days,hours) 
        VALUES 
        (:id,:name,:cat,:zone,:addr,:tcom,:precio,:imgPrice,:inclu,:intro,:p1,:p2,:p3,:logo,:imgP,:video,:img2,:img3,:frase,:edit,:ledit,:sug,:coord,:ordD,:ordA,:catId,:days,:hours)");
    $stm->execute(array(":id" =>null,':name' => $restName , ':cat' =>$restCat[1]  , ':zone' =>$restZone,':addr'=> $restAddr,':tcom'=> $restTcom,':precio'=> $restPrice,':imgPrice'=>$restImgPrice,':inclu'=>$restInclu,':intro'=>$restIntro,':p1'=>$restP1,':p2'=>$restP2,':p3'=>$restP3,':logo'=>$restLogo,':imgP'=>$restImgp,':video'=>$restVideo,':img2'=>$restImg2,':img3'=>$restImg3,':frase'=>$restFrase,':edit'=>$restEdit,':ledit'=>$restLogoEdit,':sug'=>$restSug,':coord'=>$restCoord,':ordD'=>$restOrdDeli,':ordA'=>$restOrdAdi,':catId'=>$restCat[0],':days'=>$restDays,':hours'=>$restHours)); 
    
    $lastRegister=$db->lastInsertId();
    $directory=$pathRest.$lastRegister;

    //if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
        mkdir($directory."/logo", 0777, true);
        mkdir($directory."/imgP", 0777, true);
        mkdir($directory."/img2", 0777, true);
        mkdir($directory."/img3", 0777, true);
        mkdir($directory."/logoE", 0777, true);
        mkdir($directory."/imgPrecio", 0777, true);        
    //}

    if($restLogo != null){
        copy($_FILES['restLogo']['tmp_name'],$directory."/logo/". $_FILES["restLogo"]['name']);        
    }
    if($restImgPrice != null){
        copy($_FILES['restImgPrecio']['tmp_name'],$directory."/imgPrecio/". $_FILES["restImgPrecio"]['name']);        
    }
    if($restImgp != null){
        copy($_FILES['restImgp']['tmp_name'],$directory."/imgP/". $_FILES["restImgp"]['name']);        
    }
    if($restImg2 != null){
        copy($_FILES['restImg2']['tmp_name'],$directory."/img2/". $_FILES["restImg2"]['name']);        
    }
    if($restImg3 != null){
        copy($_FILES['restImg3']['tmp_name'],$directory."/img3/". $_FILES["restImg3"]['name']);        
    }
    if($restLogoEdit != null){
        copy($_FILES['restLogoEdit']['tmp_name'],$directory."/logoE/". $_FILES["restLogoEdit"]['name']);        
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    //Permisos
    foreach($iterator as $item) {
        chmod($item, 0777);
    }
    echo "Se ha agregado el restaurante de forma correcta !!!";
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>