
<?php
include_once "../Vista/estructura/cabecera.php";
include_once "../Control/control_archivos.php";
?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

<?php
$obj = new control_archivos();

$respuesta2 = $obj->subir_archivo($_POST);

?>


<div class="alert alert-success col-md-3 offset-md-2" role="alert">
<h1>Archivo</h1>
<?php echo $respuesta2 ?>
</div>

</div>

<?php
include_once "./estructura/pie.php";
?>