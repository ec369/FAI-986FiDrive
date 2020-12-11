
<?php
include_once "../Vista/estructura/cabecera.php";
// include_once "../Control/control_archivos.php";
?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

<?php
$obj = new control_archivos();

$msg=$obj->subir_carpeta($_POST);
?>


<div class="alert alert-success col-md-3 offset-md-2" role="alert">
    <h1></h1>
<?php echo $msg ?>
</div>

</div>
<?php
include_once "./estructura/pie.php";
?>