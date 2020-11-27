<?php
include_once '../configuracion.php';
$sesion=new session();
$sesion->cerrar();
header("Location:../Vista/login.php");
?>