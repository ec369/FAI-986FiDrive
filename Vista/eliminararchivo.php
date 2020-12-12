<!-- Creamos el archivo eliminararchivo.php para eliminar un Archivo. Este archivo debe incluir los archivos: cabedera.php, pie.php y menu.php
Etiqueta que muestra nombre del archivo compartido (Colocar valor por defecto 1234.png)
Motivo de Eliminación
Usuario que lo carga (Seleccionar desde un Combo, los usuarios posibles son: admin, visitante, y usted)-->
<?php
include_once "./estructura/cabecera.php";
// include_once "../Control/control_archivos.php";
// include_once "../Control/abmarchivocargado.php";
// include_once "../Control/abmusuario.php";

?>
<div id="contenido" style=" margin-left: auto; border: 0px solid green; border-radius:3px;">

  <?php
  $objabmarchivocargado = new abmarchivocargado();
  foreach ($sesion->getUsuario2() as $unObjeto1) {
    $id = $unObjeto1->getidusuario();
    echo "<input id='idusuario' name='idusuario' type='hidden' value='" . $id . "'>";
  }

  foreach ($sesion->getrol() as $unObjetorol) {
    //echo "acaaaa objeto";
      //echo print_r($unObjeto1);
      $rol = $unObjetorol->getobjrol();
     //echo "acaaaa objeto rolopoooooooooooooo";
     //echo print_r ($rol);
     $idrol=$rol->getidrol();
  
     echo "acaaaa id rolaso". $idrol;
  
      //echo "<input id='idusuario' name='idusuario' type='hidden' value='" . $id . "'>";
   
    }

  if (($idrol==1) or ($id==1)){
   // echo "entra admin";
    $listaarchivocargadoadmin = $objabmarchivocargado->buscar_compartido_admin();
    $obj = new control_archivos();
    $msg = $obj->verInformacion($_POST);
  }elseif ($idrol=2){
   
    $listaarchivocargado = $objabmarchivocargado->buscar_compartido($id);
        $obj = new control_archivos();
  $msg = $obj->verInformacion($_POST);
}


  ?>
  
  <h3>Mostrando contenido archivos/</h3>
  <strong><?php //echo $msg ?></strong>
  <form id="form" name="form" data-toggle="validator" method="post" action="accion_eliminar.php">
  <div class="table-responsive">
    <table class="table" border="0">
      <?php
      if (count($listaarchivocargadoadmin) > 0) {

        echo '<thead> <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Formato</th>
   
        <th>Acceso Link</th>
        <th>Cantidad de Descargas Habilitadas</th>
        <th>Cantidad de descargas Usadas</th>
        <th>Fecha Inicio Compartir</th>
        <th>Fecha Fin Compartir</th>
        <th>Protegido con Clave</th>
        <th></th>
        </tr>
        </thead>';
        foreach ($listaarchivocargadoadmin as $objarchivocargado) {

          echo '<tr><td value="' . $objarchivocargado->getacnombre() . '" style="width:100px;">' . $objarchivocargado->getacnombre() .
            '<td style="width:100px;">' . $objarchivocargado->getacdescripcion() .
            '<td style="width:100px;">' . $objarchivocargado->getacicono() .
            //'<td style="width:100px;">' . $objarchivocargado->getidusuario() .
            '<td style="width:100px;">' . $objarchivocargado->getaclinkacceso() .
            '<td style="width:100px;">' . $objarchivocargado->getaccantidaddescarga() .
            '<td style="width:100px;">' . $objarchivocargado->getaccantidadusada() .
            '<td style="width:100px;">' . $objarchivocargado->getacfechainiciocompartir() .
            '<td style="width:100px;">' . $objarchivocargado->getacefechafincompartir() .
            '<td style="width:100px;">' . $objarchivocargado->getacprotegidoclave() .
            '</td>';

          echo '<td><input type=radio onchange=capturar_radio() id=datos name=acnombre value="' . $objarchivocargado->getacnombre() .'"><b>ELIMINAR<b></td></tr>';


          // echo '<td><a href="./accion_eliminar.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'&acnombre='.$objarchivocargado->getacnombre().'">borrar</a></td></tr>'; 
         // echo '<td> <button type=submit class="btn btn-success"> <a href="./accion_eliminar.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'&acnombre='.$objarchivocargado->getacnombre().'" class="btn btn-success">¿Soy un botón o un enlace?</a></td></tr>'; 

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
          <th></th>
         
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

  echo '<td> <input type="radio" onchange="capturar_radio()" id="datos" name="acnombre" value="' . $objarchivocargado->getacnombre() .'"><b>ELIMINAR<b></td></tr>';


  // echo '<td><a href="./accion_eliminar.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'&acnombre='.$objarchivocargado->getacnombre().'">borrar</a></td></tr>'; 
  // echo '<td> <button type=submit class="btn btn-success"> <a href="./accion_eliminar.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'&acnombre='.$objarchivocargado->getacnombre().'" class="btn btn-success">¿Soy un botón o un enlace?</a></td></tr>'; 

}
      }
      ?>

    </table>
    </div>
    <div class="row">
      <!-- fila -->

      <!--<div class="col-md-3 mb-3"> -->
      <!-- grupo de control para todas las pantallas medianas y large mide 6, mb es margen b es botton -3 -->
      <!-- <label for="ruta" class="control-label">Ingrese archivo o a eliminar</label>
        <input class="form-control" id="ruta" name="ruta" placeholder="1234.png" type="text" required>
        <div class="invalid-feedback">
        </div>
      </div>  -->

      <div class="col-md-1 mb-3">
        <label for="clave" class="control-label"> </label>
        <input id="idestadotipos" name="idestadotipos" type="hidden" value="4">
        <div class="invalid-feedback">
        </div>
      </div>


      <div class="col-md-3 mb-3">
        <label for="nocompartir" class="control-label">Motivo de eliminacion</label>
        <textarea class="form-control text-wrap" id="acedescripcion" name="acedescripcion" required>
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

      <div class="col-md-6 mb-3">

      </div>
      <div class="">
        <input id="eliminar" class="btn btn-primary" name="eliminar" type="hidden" value="Enviar">
        <input type="submit" class="btn btn-primary"  value="eliminar"></input>

      </div>
    </div>


  </form>
</div>


<?php
include_once "./estructura/pie.php";
?>