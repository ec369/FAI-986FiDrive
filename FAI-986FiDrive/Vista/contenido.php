
<?php
include_once "../Vista/estructura/cabecera.php";
include_once "../Control/control_archivos.php";
?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

<?php
$obj = new control_archivos();
$msg = $obj->verInformacion($_POST);
?>

<h3>Mostrando contenido directorio archivos/</h3>
<strong><?php echo $msg ?></strong>
<form method="post" action="accion_ver.php">
<h3>Crear directorios en archivos/</h3>
    <table>
        <tr>
            <td>Directorio/s:</td>
            <td><input type="text" name="carpeta"></td>
        </tr>
         <tr>
            <!-- <td>Guardar en la ruta:</td>
            <td><input type="text" name="ruta"></td> -->
        </tr>
    </table>
    <input type="hidden" name="directorio">
    <input type="submit" value="Crear directorio">
</form>

<input type="button" value="Subir archivo" class="button_active" onclick="location.href='amarchivo.php';" />
<input type="button" value="Eliminar archivo" class="button_active" onclick="location.href='eliminararchivo.php';" />
<input type="button" value="Compartir archivo" class="button_active" onclick="location.href='compartirarchivo.php';" />


</div>
<?php
include_once "./estructura/pie.php";
?>