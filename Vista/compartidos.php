<!-- Creamos el archivo compartirarchivo.php para compartir un archivos. Este archivo debe incluir los archivos: cabecera.php, pie.php y menu.php
Etiqueta que muestra nombre del archivo compartido (Colocar valor por defecto 1234.png)
Ingresar cantidad de días que se comparte (Si queda vació quiere decir que no expira) 
Ingresar cantidad de descargar posibles (Si queda vació quiere decir que no hay limites) 
Usuario que lo carga (Seleccionar desde un Combo, los usuarios posibles son: admin, visitante, y usted)
CheckBox para seleccionar que se debe proteger con contraseña
Un Campo para cargar la contraseña en caso que se seleccione esta opción. 
Etiqueta para mostrar el link de compartir generado
Botón que permite generar un hash que sera el acceso para compartir el archivo -->
<?php
include_once "./estructura/cabecera.php";
// include_once "../Control/abmusuario.php";
// include_once "../Control/abmarchivocargado.php";
// include_once "../Control/abmarchivocargadoestado.php";
// include_once "../Control/control_archivos.php";
?>
<div id="contenido" style=" margin-left: auto; border: 0px solid green; border-radius:3px;">

<?php
  $objabmarchivocargado = new abmarchivocargado();

  foreach($sesion->getUsuario2() as $unObjeto1){
   $id=$unObjeto1->getidusuario();
echo "acaaa id". $id;
  echo "<input id='idusuario' name='idusuario' type='hidden' value='".$id."'>";
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

    if ($idrol==1){
     // echo "entra admin";
      $listaarchivocargadoadmin = $objabmarchivocargado->buscar_compartido_admin();
      $obj = new control_archivos();
      $msg = $obj->verInformacion($_POST);
    }elseif ($idrol=2){
     
      $listaarchivocargado = $objabmarchivocargado->buscar_compartido($id);
          $obj = new control_archivos();
    $msg = $obj->verInformacion($_POST);
  }

  
  $obj = new control_archivos();
  //$msg = $obj->verInformacion($_POST);
  ?>
  <h3><p>Mostrando Archivos Compartidos</p></h3>
  <!-- <strong><?php echo $msg ?></strong> -->

  <form id="form" name="form" action="accion_compartir.php" method="get" data-toggle="validator">

  <div class="table-responsive">
  <table  class="table" border="0">
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
        <th></th>
        </tr>
        </thead>';
        //ADMIN-------------------------------
        
        foreach ($listaarchivocargadoadmin as $objarchivocargado) {


      
          echo '<tr><td value="' . $objarchivocargado->getacnombre() .
           '" style="width:100px;">' . $objarchivocargado->getacnombre() .
            '<td style="width:100px;">' . $objarchivocargado->getacdescripcion() .
            '<td style="width:100px;">' . $objarchivocargado->getacicono() .
           // '<td style="width:100px;">' . $objarchivocargado->getidusuario() .

            '<td><a href="../archivos/'.$objarchivocargado->getacnombre().'">'.$objarchivocargado->getaclinkacceso().'</a></td>'.
            '<td style="width:100px;">' . $objarchivocargado->getaccantidaddescarga() .
            '<td style="width:100px;">' . $objarchivocargado->getaccantidadusada() .
            '<td style="width:100px;">' . $objarchivocargado->getacfechainiciocompartir() .
            '<td style="width:100px;">' . $objarchivocargado->getacefechafincompartir() .
          //  '<td style="width:100px;">' . $objarchivocargado->getacprotegidoclave() .
            '</td>';

         // echo '<td> <input type="radio" onchange="capturar_radio()" id="datos" name="acnombre" value="' . $objarchivocargado->getacnombre() .'"><b>DEJAR DE COMPARTIR<b></td></tr>';
          echo '<td><a href="./eliminararchivocompartido.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'"><b>Dejar de compartir</b></a></td>';

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
        <th>Protegido con Clave</th>
        <th>Other</th>
        </tr>
        </thead>';
        foreach ($listaarchivocargado as $objarchivocargado) {
      
          echo '<tr><td value="' . $objarchivocargado->getacnombre() .
           '" style="width:100px;">' . $objarchivocargado->getacnombre() .
            '<td style="width:100px;">' . $objarchivocargado->getacdescripcion() .
            '<td style="width:100px;">' . $objarchivocargado->getacicono() .
            '<td style="width:100px;">' . $objarchivocargado->getidusuario() .

            '<td><a href="../archivos/'.$objarchivocargado->getacnombre().'">'.$objarchivocargado->getaclinkacceso().'</a></td>'.
            
            '<td style="width:100px;">' . $objarchivocargado->getaccantidaddescarga() .
            '<td style="width:100px;">' . $objarchivocargado->getaccantidadusada() .
            '<td style="width:100px;">' . $objarchivocargado->getacfechainiciocompartir() .
            '<td style="width:100px;">' . $objarchivocargado->getacefechafincompartir() .
            '<td style="width:100px;">' . $objarchivocargado->getacprotegidoclave() .
            '</td>';

         // echo '<td> <input type="radio" onchange="capturar_radio()" id="datos" name="acnombre" value="' . $objarchivocargado->getacnombre() .'"><b>DEJAR DE COMPARTIR<b></td></tr>';
          echo '<td><a href="./eliminararchivocompartido.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'"><b>Dejar de compartir</b></a></td>';

          // echo '<td><a href="./accion_eliminar.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'&acnombre='.$objarchivocargado->getacnombre().'">borrar</a></td></tr>'; 
          // echo '<td> <button type=submit class="btn btn-success"> <a href="./accion_eliminar.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'&acnombre='.$objarchivocargado->getacnombre().'" class="btn btn-success">¿Soy un botón o un enlace?</a></td></tr>'; 

        }
      }
      ?>

    </table>
  </div>
    <div class="row">
      <!-- fila -->

      
      <div class="col-md-0 mb-1">
        <label for="clave" class="control-label"> </label>
        <input id="idestadotipos" name="idestadotipos" type="hidden" value="2">
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-0 mb-1">
        <label for="clave" class="control-label"> </label>
        <input id="acedescripcion" name="acedescripcion" type="hidden" value="Compartido">
        <div class="invalid-feedback">
        </div>
      </div>

      <!-- <div class="col-md-3 mb-3"> -->
        <!-- grupo de control para todas las pantallas medianas y large mide 6, mb es margen b es botton -3 -->
        <!-- <label for="nombre" class="control-label">Nombre del Archivo</label>
        <input class="form-control" id="acnombre" name="acnombre" placeholder="1234.png" type="text" required>
        <div class="invalid-feedback">
        </div>
      </div> -->
<!-- 
      <div class="col-md-2 mb-3">
        <label for="comparte">Cantidad de dias que se comparte</label>
        <input type="number" class="form-control" id="comparte" name="comparte" required>
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-2 mb-3">
        <label for="descargas">Cantidad de descargas posibles</label>
        <input type="number" class="form-control" id="descargas" name="descargas" required>
        <div class="invalid-feedback">
        </div>
      </div> -->

      <!-- <div class="col-md-3 mb-3">

        <div class="invalid-feedback">

        </div>
      </div> -->
      
       <!-- //$obj = new session(); -->
  
     <!-- // $objuser=$asd[0]; -->
     
     

     


          <!-- <div class="col-md-3 mb-3">
        <b>Proteger con contraseña?</b>
        <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />

        <div class="input-group">
          <input type="Password" placeholder="Contraseña" class="form-control" id="content" name="content" style="display: none;" />
          <input type="Password" placeholder="Confirmar" class="form-control" id="content2" name="content2" style="display: none;" /></input>

          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-lock"></i></span>

          </div>

        </div> -->




        <div id="strengthMessage">

        </div>
      </div>

      <div class="invalid-feedback">
      </div>



      <div class="col-md-3 mb-3">
      <!-- <label for="compartir" class="control-label">Link para compartir generado</label>
      <input type="text" class="form-control text-wrap" id="compartir" name="compartir">
      </input> -->
      <input id="btn_eje4" class="btn btn-primary" name="confirm" id="confirm" type="submit" value="Confirmar">
      <div class="invalid-feedback">
      </div>
    </div>




    </div>



 

    <div class="row">

      <div class="col-md-7 mb-3">

      </div>
      <div class="">
        <!-- <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
        <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="reset" value="Borrar"> -->

      </div>
    </div>



    

  </form>
</div>


<?php
include_once "./estructura/pie.php";
?>