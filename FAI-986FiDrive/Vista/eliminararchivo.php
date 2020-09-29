<!-- Creamos el archivo eliminararchivo.php para eliminar un Archivo. Este archivo debe incluir los archivos: cabedera.php, pie.php y menu.php
Etiqueta que muestra nombre del archivo compartido (Colocar valor por defecto 1234.png)
Motivo de Eliminación
Usuario que lo carga (Seleccionar desde un Combo, los usuarios posibles son: admin, visitante, y usted)-->
<?php
include_once "./estructura/cabecera.php";
?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid red; border-radius:3px;">

  <form id="form" name="form" action="accion.php" method="get" data-toggle="validator">


    <div class="row">
      <!-- fila -->

      <div class="col-md-3 mb-3">
        <!-- grupo de control para todas las pantallas medianas y large mide 6, mb es margen b es botton -3 -->
        <label for="nombre" class="control-label">Nombre del archivo compartido</label>
        <input class="form-control" id="nombre" name="nombre" placeholder="1234.png" type="text" required>
        <div class="invalid-feedback">
        </div>
      </div>
  
 
      <div class="col-md-3 mb-3">
        <label for="nocompartir" class="control-label">Motivo de eliminacion</label>
        <textarea class="form-control text-wrap" id="nocompartir" name="nocompartir">
          </textarea>
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-6 offset-md-0 mb-3">
        <label for="carga" class="control-label">Usuario que lo carga</label><br>
        <select name="carga">
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
        <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
        <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="reset" value="Borrar">

      </div>
    </div>


  </form>
</div>


<?php
include_once "./estructura/pie.php";
?>