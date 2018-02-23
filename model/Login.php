<?php
session_start();
$_SESSION['user']=true;
header("Location: http://".$_SERVER['HTTP_HOST']);
?>