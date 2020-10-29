
<?php

include_once '../configuracion.php';
include_once '../Control/abmarchivocargado.php';
$datos = data_submitted();

//verEstructura($datos);
$resp = false;
include_once "../Vista/estructura/cabecera.php";
include_once "../Control/control_subirarchivo.php";
include_once "../Control/abmarchivocargado.php";
?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

<?php
$obj = new control_subirarchivo();
$objarchivo_cargado= new abmarchivocargado;
$objarchivo_cargadoestado= new abmarchivocargadoestado;
$resp=false;

if (isset($datos['acnombre'])){
   // echo "entraaaa won";
    $listaTabla = $objarchivo_cargado->buscar2($datos);
    if (count($listaTabla)>0){
      echo "YA EXISTE";
    }else{
        if($objarchivo_cargado->alta($datos)){
            echo "Entro la alta";
            echo print_r($datos);
            //$datos['acnombre'];
            $buscado=$objarchivo_cargado->buscar2($datos);
            // echo print_r($buscado);
            //[0] => archivocargado Object ( [idarchivocargado:archivocargado:private]
          //  $asd=$archivocargado->getidarchivocargado());
            // echo "ACAAAA ID";
            
             $archivocargado=$buscado[0];
             $id=$archivocargado->getidarchivocargado();
            // echo "seeeee por fin";
            // echo $asd;
             $datos['idarchivocargado']=$id;
            //$datos['idarchivocargado']=$id;
           if($objarchivo_cargadoestado->alta($datos)){
                echo "Estado Cargado";
                 $resp =true;
                    $respuesta2 = $obj->subir_archivo($_POST);
            
        }
        }
    }
}
if($resp){
    $mensaje = "La accion se realizo correctamente.";
    }else {
    $mensaje = "La accion no pudo concretarse.";

    
}




?>


<div class="alert alert-success col-md-3 offset-md-2" role="alert">
<h1>Archivo</h1>
<?php // echo $respuesta2 ?>
</div>

</div>
<?php	
echo $mensaje;
?>
<?php
include_once "./estructura/pie.php";
?>