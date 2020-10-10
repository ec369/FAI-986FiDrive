<!-- Etiqueta que muestra nombre del archivo compartido (Colocar valor por defecto 1234.png)
Etiqueta que muestra la cantidad de veces que se compartió
Motivo de ya no compartir el Archivo
Usuario que lo carga (Seleccionar desde un Combo, los usuarios posibles son: admin, visitante, y usted)
 -->
<?php
include_once "./estructura/cabecera.php";
?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

  <form id="form" name="form" action="accion.php" method="get" data-toggle="validator">


    <div class="row">
      <!-- fila -->

  

      <div class="col-md-2 mb-3">
        <label for="compartio">Cantidad de veces que se compartio</label>
        <input type="number" class="form-control" id="compartio" name="compartio" >
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <label for="nocompartir" class="control-label">Motivo de ya no compartir el Archivo</label>
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

      <div class="col-md-5 mb-3">

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