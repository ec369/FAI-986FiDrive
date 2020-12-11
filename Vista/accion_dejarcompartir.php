<?php
include_once "./estructura/cabecera.php";
// include_once "../Control/control_archivos.php";
// include_once "../Control/abmarchivocargado.php";
// include_once "../Control/abmarchivocargadoestado.php";
// include_once '../configuracion.php';
$datos = data_submitted();
//echo "data_sbumitedd";
//echo print_r($datos);
?>
<div id="contenido" style="height: 100%; width: 90%; margin-left: auto; border: 0px solid green; border-radius:3px;">

<?php
$resp=false;
$obj = new control_archivos();
$objarchivo_cargado=new abmarchivocargado;
$objarchivo_estado=new abmarchivocargadoestado;

$hash=md5(serialize($datos));


$buscado=$objarchivo_estado->buscar2($datos);
$archivocargadoestado=$buscado[0];
$idestado=$archivocargadoestado->getidarchivocargadoestado();
$fechaingreso=$archivocargadoestado->getacefechaingreso();
$fechafin=$archivocargadoestado->getacefechafin();
$datos['idarchivocargadoestado']=$idestado;
$datos['acefechaingreso']=$fechaingreso;
$datos['acefechafin']=$fechafin;

if($objarchivo_estado->modificacion_estado($datos)){
    echo "entro modificacion estado";
    $resp=true;
    //$objarchivo_eliminar->baja($datos);
   // $msg=$obj->eliminar_dir($datos);
   
}

//modifico fecha fin compartir

//$fechafin=$archivocargadoestado->getacefechafin();
//$datos['acefechafin']=$fechafin;

$buscado=$objarchivo_cargado->buscar2($datos);
$archivocargado=$buscado[0];
$id=$archivocargado->getidarchivocargado();

$acdescripcion=$archivocargado->getacdescripcion();
$acicono=$archivocargado->getacicono();
$datos['acdescripcion']=$acdescripcion;
$datos['acicono']=$acicono;
$datos['acnombre']=$archivocargado->getacnombre();
$datos['aclinkacceso']=$archivocargado->getaclinkacceso();
$datos['accantidaddescarga']=$archivocargado->getaccantidaddescarga();
$datos['acfechainiciocompartir']=$archivocargado->getacfechainiciocompartir();
$datos['accantidadusada']=0;
$datos['acprotegidoclave']=$archivocargado->getacprotegidoclave();
$hora=date('Y-m-d H:i:s');
$datos['acefechafincompartir']=$hora;
if($objarchivo_cargado->modificacion_fechafincompartir($datos)){
    echo "entro modificacion fin compartir";
    $resp=true;
    //$objarchivo_eliminar->baja($datos);
   // $msg=$obj->eliminar_dir($datos);
   
}

if($resp){
    $msg = "La accion se realizo correctamente.";
    }else {
    $msg = "La accion no pudo concretarse.";
}
// $msg=$obj->eliminar_dir3($_POST);
// $msg2=$obj->eliminar_dir2($_POST);
// $msg3=$obj->deleteDir($_POST);

?>

<div class="alert alert-success col-md-3 offset-md-2" role="alert">
    <h1></h1>
<?php echo $msg  ?><br>
<?php// echo "HASH GENERADO: ". $hash ?>


</div>



</div>


<?php
include_once "./estructura/pie.php";
?>