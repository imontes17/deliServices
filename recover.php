<?php
require 'vendor/autoload.php';
require 'model/Connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_GET["auth"])){
    $passDefault=password_hash("DELI_A.kp098", PASSWORD_DEFAULT);
    try{
        $token=$_GET["auth"];
        $database=initConnection();
        $stm = $database->prepare("UPDATE deli_user SET password=:pass WHERE token=:token LIMIT 1");
        $stm->execute(array(":pass" =>$passDefault,':token' => $token));
        $queryCount = $stm->rowCount();
            if($queryCount == 1) {
                $stm = $database->prepare("SELECT * FROM deli_user WHERE token='$token' LIMIT 1");
                $stm->execute();
                $stm->setFetchMode(PDO::FETCH_ASSOC); 
                $user=$stm->fetch();        
                $mail = new PHPMailer();
                $mail ->IsSmtp();
                $mail ->SMTPDebug = 0;
                $mail ->SMTPAuth = true;
                $mail ->SMTPSecure = 'ssl';
                $mail ->Host = "smtp.gmail.com";
                $mail ->Port = 465; // or 587
                $mail->CharSet = 'UTF-8';
                $mail ->IsHTML(true);
                $mail ->Username = "imontes.tecinfo@gmail.com";
                $mail ->Password = "Poketod0";
                $mail ->SetFrom("imontes.tecinfo@gmail.com");
                $mail ->Subject = "Tu Contraseña ha sido reestablecida";
                $mail ->Body = "Tu nueva contraseña es: DELI_A.kp098";
                $mail ->AddAddress($user["email"]);
                $mail->Send();
            }
            
    }catch(PDOException $e){}
    
}
function initConnection(){
    try
    {
        $database = new Connection();
        $db = $database->openConnection();
        return $db;
    }catch(PDOException $e){
        //return $e->getMessage();
    }
}
?>
<script>
    window.close();
</script>