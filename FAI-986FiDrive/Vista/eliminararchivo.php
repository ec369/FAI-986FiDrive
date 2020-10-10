<!-- Creamos el archivo eliminararchivo.php para eliminar un Archivo. Este archivo debe incluir los archivos: cabedera.php, pie.php y menu.php
Etiqueta que muestra nombre del archivo compartido (Colocar valor por defecto 1234.png)
Motivo de Eliminación
Usuario que lo carga (Seleccionar desde un Combo, los usuarios posibles son: admin, visitante, y usted)-->
<?php
include_once "./estructura/cabecera.php";
include_once "../Control/control_archivos.php";

?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

<?php
$obj = new control_archivos();
$msg = $obj->verInformacion($_POST);
?>
<h3>Mostrando contenido directorio archivos/</h3>
<strong><?php echo $msg ?></strong>
<form id="form" name="form"  data-toggle="validator" method="post" action="accion_eliminar.php">



    <div class="row">
      <!-- fila -->

      <div class="col-md-3 mb-3">
        <!-- grupo de control para todas las pantallas medianas y large mide 6, mb es margen b es botton -3 -->
        <label for="ruta" class="control-label">Ingrese archivo o directorio a eliminar</label>
        <input class="form-control" id="ruta" name="ruta" placeholder="1234.png" type="text" required>
        <div class="invalid-feedback">
        </div>
      </div>
  
 
      <div class="col-md-3 mb-3">
        <label for="nocompartir" class="control-label">Motivo de eliminacion</label>
        <textarea class="form-control text-wrap" id="nocompartir" name="nocompartir" required>
          </textarea>
        <div class="invalid-feedback">
        </div>
      </div>



      <div class="col-md-6 offset-md-0 mb-3">
        <label for="carga" class="control-label">Usuario que lo carga</label><br>
        <select name="carga" required="" data-bv-field="carga">
          <option value="">Elige una opción</option>
          <option>Admin</option>
          <option>Visitante</option>
          <option>Usted</option>
        </select>
        <div class="invalid-feedback">
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-md-6 mb-3">

      </div>
      <div class="">
        <input id="eliminar_directorio" class="btn btn-primary" name="eliminar_directorio" type="hidden" value="Enviar">
        <input class="btn btn-primary"  type="submit" value="Borrar">

      </div>
    </div>


  </form>
</div>


<?php
include_once "./estructura/pie.php";
?>