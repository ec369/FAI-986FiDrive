<!-- Etiqueta que muestra nombre del archivo compartido (Colocar valor por defecto 1234.png)
Etiqueta que muestra la cantidad de veces que se compartió
Motivo de ya no compartir el Archivo
Usuario que lo carga (Seleccionar desde un Combo, los usuarios posibles son: admin, visitante, y usted)
 -->
<?php
include_once "./estructura/cabecera.php";
// include_once "../Control/abmusuario.php";
?>
<div id="contenido" style="height: 100%; width: 90%; margin-left: auto; border: 0px solid green; border-radius:3px;">

  <form id="form" name="form" action="accion_dejarcompartir.php" method="get" data-toggle="validator">


    <div class="row">
      <!-- fila -->

      <?php
$edad = $_GET["idarchivocargado"]; 
//echo "Tu edad: $edad<p>"; 
?>
  <div class="col-md-0 mb-1">
        <label for="clave" class="control-label"> </label>
        <input id="idarchivocargado" name="idarchivocargado" type="hidden" value="<?php echo$_GET["idarchivocargado"]?>">
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-0 mb-1">
        <label for="clave" class="control-label"> </label>
        <input id="idestadotipos" name="idestadotipos" type="hidden" value="3">
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-0 mb-1">
        <label for="clave" class="control-label"> </label>
        <input id="acedescripcion" name="acedescripcion" type="hidden" value="No Compartido">
        <div class="invalid-feedback">
        </div>
      </div>

      <?php
      $objarchivocargado = new abmarchivocargado();
      foreach ($sesion->getUsuario2() as $unObjeto1) {
        $id = $unObjeto1->getidusuario();
       
      }
      // $objuser=$asd[0];
      foreach ($objarchivocargado->buscar_compartido($id) as $unObjeto1) {
        $cantusada = $unObjeto1->getaccantidadusada();
       // echo "acaaa". $cantusada;
       // echo "<input id='accantidadusada' name='accantidadusada' type='hidden' value='" . $cantusada . "'>";
      }

      ?>

      <div class="col-md-2 mb-3">
        <label for="compartio">Cantidad de veces que se compartio</label>
        <input type="number" class="form-control" id="accantidadusada" name="accantidadusada" value="<?php echo $cantusada ?>">
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <label for="nocompartir" class="control-label">Motivo de ya no compartir el Archivo</label>
        <textarea class="form-control text-wrap" id="acdescripcion" name="acdescripcion">
          </textarea>
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-3 mb-3">
      <?php
         foreach($sesion->getUsuario2() as $unObjeto1){
          $id=$unObjeto1->getidusuario();
         echo "<input id='idusuario' name='idusuario' type='hidden' value='".$id."'>";
           }
      //  $select = new abmusuario();
        //$objSelect = $select->buscar(null);

       // echo  " <select class='form-control' name='idusuario' id='idusuario'>";
       // echo  " <option value=' '>Seleccion un Usuario</option>";
        //foreach ($objSelect as $unObjeto) {
          //echo  " <option name='idusuario' id='idusuario' value='" . $unObjeto->getidusuario() . "'>" . $unObjeto->getusapellido() . "</option>";
        //}
        //echo  " </select>";
        ?>
        <div class="invalid-feedback">

        </div>
      </div>



     

    </div>

    <div class="row">

      <div class="col-md-5 mb-3">

      </div>
      <div class="">
        <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Dejar de Compartir">
        <!-- <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="reset" value="Borrar"> -->

      </div>
    </div>


  </form>
</div>


<?php
include_once "./estructura/pie.php";
?>