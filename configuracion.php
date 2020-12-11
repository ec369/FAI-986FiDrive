<!--  header('Content-Type: text/html; charset=utf-8');
header ("Cache-Control: no-cache, must-revalidate "); -->
<?php
/////////////////////////////
// CONFIGURACION APP//
/////////////////////////////

$PROYECTO ='/xampp/FAI-986FiDrive';

//variable que almacena el directorio del proyecto
$ROOT=$_SERVER['DOCUMENT_ROOT']."/$PROYECTO/";
//echo $ROOT;
include_once($ROOT.'/util/funciones.php');


// Variable que define la pagina de autenticacion del proyecto
$INICIO = "Location:http://".$_SERVER['HTTP_HOST']."/$PROYECTO/vista/login/login.php";

// variable que define la pagina principal del proyecto (menu principal)
$PRINCIPAL = "Location:http://".$_SERVER['HTTP_HOST']."/$PROYECTO/principal.php";


$GLOBALS['ROOT']=$ROOT;

?>