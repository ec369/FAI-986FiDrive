
<?php
include_once "../Vista/estructura/cabecera.php";
include_once "../Control/control_archivos.php";
?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

<?php
$obj = new control_archivos();
$msg = $obj->verInformacion($_POST);
?>

<h3>Archivos Compartidos</h3>
<strong><?php echo $msg ?></strong>

<input type="button" value="Dejar de compartir archivo" class="button_active" onclick="location.href='eliminararchivocompartido.php';" />

</div>
<?php
include_once "./estructura/pie.php";
?>