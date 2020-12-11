<?php
include_once "./estructura/cabecera.php";
// include_once "../Control/control_archivos.php";
// include_once "../Control/abmarchivocargado.php";
// include_once "../Control/abmarchivocargadoestado.php";
// include_once '../configuracion.php';
$datos = data_submitted();
echo "data_sbumitedd";
echo print_r($datos);
?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

<?php
$resp=false;
$obj = new control_archivos();
$objarchivo_cargado=new abmarchivocargado;
$objarchivo_estado=new abmarchivocargadoestado;


$hash=md5(serialize($datos['acnombre']));
$hashresuelto=md5(unserialize($hash));
echo "lalala".$hashresuelto;

//modifico archivo cargado
$buscado=$objarchivo_cargado->buscar2($datos);
$archivocargado=$buscado[0];
$id=$archivocargado->getidarchivocargado();
$acdescripcion=$archivocargado->getacdescripcion();
$acicono=$archivocargado->getacicono();
$datos['idarchivocargado']=$id;
$datos['acdescripcion']=$acdescripcion;
$datos['acicono']=$acicono;
$datos['aclinkacceso']=$hash;
$datos['accantidadusada']=$archivocargado->getaccantidadusada();
$datos['acefechafincompartir']=$archivocargado->getacefechafincompartir();
$hora=date('Y-m-d H:i:s');
$datos['acfechainiciocompartir']=$hora;
if($objarchivo_cargado->modificacion_cantdescargas($datos)){
    echo "entro modificacion cantidad descargas";
    $resp=true;
    //$objarchivo_cargado->baja($datos);
   // $msg=$obj->eliminar_dir($datos);
 
}

//modifico estado
$buscado=$objarchivo_estado->buscar2($datos);
$archivocargadoestado=$buscado[0];
$idestado=$archivocargadoestado->getidarchivocargadoestado();
$fechaingreso=$archivocargadoestado->getacefechaingreso();
//$acefechafin=$archivocargadoestado->getacefechafin();
$datos['idarchivocargadoestado']=$idestado;
$datos['acefechaingreso']=$fechaingreso;
$datos['acefechafin']=$archivocargadoestado->getacefechafin();
//$datos['acefechafin']=$acefechafin;


if($objarchivo_estado->modificacion_estado($datos)){
    echo "entro modificacion estado";
    $resp=true;
    //$objarchivo_cargado->baja($datos);
   // $msg=$obj->eliminar_dir($datos);
 
}

if($objarchivo_cargado->modificacion_contraseña($datos)){
    echo "entro modificacion contraseña";
    $resp=true;
    //$objarchivo_cargado->baja($datos);
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
<?php echo "HASH GENERADO: ". $hash ?>


</div>



</div>


<?php
include_once "./estructura/pie.php";
?>