<!-- Creamos el archivo amarchivo.php para alta o modificación de un Archivo. Este archivo debe incluir los archivos: cabecera.php, pie.php y menu.php
Nombre del Archivo (Colocar valor por defecto 1234.png)
Descripción del Archivo
 Usuario que lo carga (Seleccionar desde un Combo, los usuarios posibles son: admin, visitante, y usted)
 Seleccionar Icono que se va a utilizar (Imagen, Zip, Doc, PDF, XLS). Usar CheckBox.
Clave del Archivo a modificar. (Este debe ser un campo Oculto. -->
<?php
include_once "./estructura/cabecera.php";
// include_once "../Control/abmusuario.php";
// include_once "../Control/abmarchivocargado.php";
// include_once "../Control/abmarchivocargadoestado.php";
// include_once "../Control/control_archivos.php";
// include_once "../Control/session.php";

?>
<div id="contenido" style="margin-left: auto; border: 0px solid green; border-radius:3px;">

  <form id="form" name="form" action="accion.php" method="post" data-toggle="validator" enctype="multipart/form-data">

    <div class="row">
      <!-- fila -->

      <div class="col-md-3 mb-3">
        <!-- grupo de control para todas las pantallas medianas y large mide 6, mb es margen b es botton -3 -->
        <label for="acnombre" class="control-label">Nombre del Archivo</label>
        <input class="form-control" id="acnombre" name="acnombre" type="text" required>
        <div class="invalid-feedback">
        </div>
      </div>



      <div class="col-md-3 mb-3">
        <label for="descripcion" class="control-label">Descripcion del Archivo</label>
        <textarea id="summernote" name="acdescripcion"></textarea>
        <div class="invalid-feedback">

        </div>
      </div>



      <?php
      //$obj = new session();

      // $objuser=$asd[0];
      foreach ($sesion->getUsuario2() as $unObjeto1) {
        $id = $unObjeto1->getidusuario();
        echo "<input id='idusuario' name='idusuario' type='hidden' value='" . $id . "'>";
      }

      ?>


      <div class="col-md-9 mb-3 ">
        <label for="formato">Formato</label>
        <br>
        <input type="checkbox" id="imagen" name="acicono" value="imagen">
        <label for="Imagen">Imagen</label>
        <input type="checkbox" id="zip" name="acicono" value="zip">
        <label for="Zip">Zip</label>
        <input type="checkbox" id="doc" name="acicono" value="doc">
        <label for="Doc">Doc</label>
        <input type="checkbox" id="pdf" name="acicono" value="pdf">
        <label for="PDF">PDF</label>
        <input type="checkbox" id="xls" name="acicono" value="xls">
        <label for="XLS">XLS</label>
        <div class="invalid-feedback">
        </div>


      </div>

      <div class="col-md-6 mb-3">
        <label for="clave" class="control-label"> </label>
        <input id="idestadotipos" name="idestadotipos" type="hidden" value="1">
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="clave" class="control-label"> </label>
        <input id="acedescripcion" name="acedescripcion" type="hidden" value="Cargado">
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="clave" class="control-label"> Clave del archivo a modificar (oculto)</label>
        <input id="acprotegidoclave" name="acprotegidoclave" type="hidden" value="xm234jq">
        <div class="invalid-feedback">
        </div>
      </div>


    </div>

    <div class="row">


      <div class="col-7">
        <!-- <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
        <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="reset" value="Borrar"> -->

        <input type="file" onchange="capturar()" name="miArchivo" id="miArchivo">
        <input type="submit" id="submit" class="btn btn-primary" value="Subir" name="submit"></input>


      </div>


    </div>


  </form>

  <?php
  $objabmarchivocargado = new abmarchivocargado();

  if ($id==1){
    $listaarchivocargadoadmin = $objabmarchivocargado->buscar(true);
    $obj = new control_archivos();
    $msg = $obj->verInformacion($_POST);

  }else{
  $listaarchivocargado = $objabmarchivocargado->buscar_disponibles($id);
  $obj = new control_archivos();
  //$msg = $obj->verInformacion($_POST);
}
  ?>
  <h1>Archivos Cargados</h1>
  <strong><?php //echo $msg  ?></strong>
  <!-- <form id="form" name="form"  data-toggle="validator" method="post" action="accion_eliminar.php"> -->
  <div class="table-responsive">
    <table class="table" border="0">
      <?php
      if (count($listaarchivocargadoadmin) > 0) {

        echo '<thead> <tr>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Formato</th>
      <th>ID Usuario</th>
      <th>Acceso Link</th>
      <th>Cantidad de Descargas Habilitadas</th>
      <th>Cantidad de descargas Usadas</th>
      <th>Fecha Inicio Compartir</th>
      <th>Fecha Fin Compartir</th>
      <th></th>
    
      </tr>
      </thead>';
        foreach ($listaarchivocargadoadmin as $objarchivocargado) {

          echo '<tr><td style="width:100px;">' . $objarchivocargado->getacnombre() .
            '<td style="width:100px;">' . $objarchivocargado->getacdescripcion() .
            '<td style="width:100px;">' . $objarchivocargado->getacicono() .
           // '<td style="width:100px;">' . $objarchivocargado->getidusuario() .
            '<td style="width:100px;">' . $objarchivocargado->getaclinkacceso() .
            '<td style="width:100px;">' . $objarchivocargado->getaccantidaddescarga() .
            '<td style="width:100px;">' . $objarchivocargado->getaccantidadusada() .
            '<td style="width:100px;">' . $objarchivocargado->getacfechainiciocompartir() .
            '<td style="width:100px;">' . $objarchivocargado->getacefechafincompartir() .
            '</td>';

          echo '<td><a href="./amarchivo_editar.php?idarchivocargado=' . $objarchivocargado->getidarchivocargado() . '"><b>EDITAR</b></a></td>';
        }
      }else{
    
        echo '<thead> <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Formato</th>
        <th>ID Usuario</th>
        <th>Acceso Link</th>
        <th>Cantidad de Descargas Habilitadas</th>
        <th>Cantidad de descargas Usadas</th>
        <th>Fecha Inicio Compartir</th>
        <th>Fecha Fin Compartir</th>
       
        </tr>
        </thead>';
//USUARIOOOSS-------------------------
foreach ($listaarchivocargado as $objarchivocargado) {

echo '<tr><td value="' . $objarchivocargado->getacnombre() . '" style="width:100px;">' . $objarchivocargado->getacnombre() .
  '<td style="width:100px;">' . $objarchivocargado->getacdescripcion() .
  '<td style="width:100px;">' . $objarchivocargado->getacicono() .
 '<td style="width:100px;">' . $objarchivocargado->getidusuario() .
  '<td style="width:100px;">' . $objarchivocargado->getaclinkacceso() .
  '<td style="width:100px;">' . $objarchivocargado->getaccantidaddescarga() .
  '<td style="width:100px;">' . $objarchivocargado->getaccantidadusada() .
  '<td style="width:100px;">' . $objarchivocargado->getacfechainiciocompartir() .
  '<td style="width:100px;">' . $objarchivocargado->getacefechafincompartir() .
  // '<td style="width:100px;">' . $objarchivocargado->getacprotegidoclave() .
  '</td>';

//echo '<td> <input type="radio" onchange="capturar_radio()" id="datos" name="acnombre" value="' . $objarchivocargado->getacnombre() .'"><b>ELIMINAR<b></td></tr>';


// echo '<td><a href="./accion_eliminar.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'&acnombre='.$objarchivocargado->getacnombre().'">borrar</a></td></tr>'; 
// echo '<td> <button type=submit class="btn btn-success"> <a href="./accion_eliminar.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'&acnombre='.$objarchivocargado->getacnombre().'" class="btn btn-success">¿Soy un botón o un enlace?</a></td></tr>'; 

}
    }
      ?>
    </table>
  </div>

  
</div>

<?php
include_once "./estructura/pie.php";
?>