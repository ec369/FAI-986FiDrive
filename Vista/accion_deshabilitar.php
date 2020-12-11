<?php
include_once "./estructura/cabecera.php";
// include_once "../Control/control_archivos.php";
// include_once "../Control/abmarchivocargado.php";
// include_once '../configuracion.php';
$datos = data_submitted();
//echo "data_sbumitedd";
echo print_r($datos);
?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

<?php
$resp=false;
$obj = new control_archivos();
$objusuario=new abmusuario;
$objusuariorol=new abmusuariorol;

if ($datos['idrol']=='Admin'){
    $datos['idrol']=1;
    if($objusuariorol->modificacion($datos)){
        echo "entro modificacion activo";
        $resp=true;
       // $msg=$obj->editar_dir($datos);
       //echo "acaaaa respuesta";
      // echo $resp;
    }
}else{
    $datos['idrol']=2;
    if($objusuariorol->modificacion($datos)){
        echo "entro modificacion activo";
        $resp=true;
       // $msg=$obj->editar_dir($datos);
       //echo "acaaaa respuesta";
      // echo $resp;
    }
}


//echo print_r($objarchivo_editar);
if($objusuario->modificacion($datos)){
    echo "entro modificacion activo";
    $resp=true;
   // $msg=$obj->editar_dir($datos);
   //echo "acaaaa respuesta";
  // echo $resp;
}

if($resp){
    $msg = "La accion se realizo correctamente.";
    }else {
    $msg = "La accion no pudo concretarse.";
}
// $msg=$obj->editar_dir3($_POST);
// $msg2=$obj->editar_dir2($_POST);
// $msg3=$obj->deleteDir($_POST);

?>

<div class="alert alert-success col-md-3 offset-md-2" role="alert">
    <h1></h1>
<?php echo $msg ?>
</div>



</div>


<?php
include_once "./estructura/pie.php";
?>