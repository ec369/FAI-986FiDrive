<?php
include_once "../Vista/estructura/cabecera.php";
/* include_once "../Control/control_archivos.php";
include_once "../Control/abmarchivocargado.php"; */
?>

<div id="contenido" style=" margin-left: auto; border: 0px solid green; border-radius:3px;">



  <?php
  $objabmarchivocargado = new abmarchivocargado();
  foreach ($sesion->getUsuario2() as $unObjeto1) {
    $id = $unObjeto1->getidusuario();

    echo "<input id='idusuario' name='idusuario' type='hidden' value='" . $id . "'>";
    echo "el id" . $id;
  }


  //$objabmarchivocargado = new abmarchivocargado();

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
    echo "entra if";
    $listaarchivocargadoadmin = $objabmarchivocargado->buscar(true);
    $objusuario=new abmusuario;
    $usuarios=$objusuario->buscar(null);
    $obj = new control_archivos();
    $msg = $obj->verInformacion($_POST);

  }elseif ($idrol=2){
    echo "entra elseif";
  $listaarchivocargado = $objabmarchivocargado->buscar_disponibles($id);
  
  $obj = new control_archivos();
  $msg = $obj->verInformacion($_POST);

}

  ?>

  <form id="form" name="form" data-toggle="validator" method="post" action="accion_ver.php">

  
    <div class="table-responsive">
      <table class="table" border="0">
        <?php
        if (count($listaarchivocargadoadmin)  > 0)  {

          echo '<thead> <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Formato</th>

        <th>Acceso Link</th>
        <th>Cantidad de Descargas Habilitadas</th>
        <th>Cantidad de descargas Usadas</th>
        <th>Fecha Inicio Compartir</th>
        <th>Fecha Fin Compartir</th>
       
        </tr>
        </thead>';

        //ADMIN-------------------------------
        
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
            // '<td style="width:100px;">' . $objarchivocargado->getacprotegidoclave() .
            '</td>';

          //echo '<td> <input type="radio" onchange="capturar_radio()" id="datos" name="acnombre" value="' . $objarchivocargado->getacnombre() .'"><b>ELIMINAR<b></td></tr>';


          // echo '<td><a href="./accion_eliminar.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'&acnombre='.$objarchivocargado->getacnombre().'">borrar</a></td></tr>'; 
          // echo '<td> <button type=submit class="btn btn-success"> <a href="./accion_eliminar.php?idarchivocargado='.$objarchivocargado->getidarchivocargado().'&acnombre='.$objarchivocargado->getacnombre().'" class="btn btn-success">¿Soy un botón o un enlace?</a></td></tr>'; 

        }

        echo '<thead> <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Formato</th>

        </tr>
        </thead>';

        foreach ($usuarios as $objusuario) {

          echo '<tr><td value="' . $objusuario->getusnombre() . '" style="width:100px;">' . $objusuario->getusnombre() .
          '<td style="width:100px;">' . $objusuario->getusapellido() .
          '<td style="width:100px;">' . $objusuario->getuslogin() .
         //'<td style="width:100px;">' . $objarchivocargado->getidusuario() .
      
          // '<td style="width:100px;">' . $objarchivocargado->getacprotegidoclave() .
          '</td>';
          echo '<td><a href="./usuario_editar.php?idusuario='.$objusuario->getidusuario() . '"><b>HABILITAR/DESHABILITAR</b></a></td>';


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
    <?php

    $obj = new control_archivos();
    $msg = $obj->verInformacion($_POST);
    ?>

    <!-- <h3>Mostrando contenido directorio archivos/</h3>
 <strong><?php echo $msg ?></strong> -->
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
      <input type="button" value="Subir archivo" class="button_active" onclick="location.href='amarchivo.php';" />
<input type="button" value="Eliminar archivo" class="button_active" onclick="location.href='eliminararchivo.php';" />
<input type="button" value="Compartir archivo" class="button_active" onclick="location.href='compartirarchivo.php';" />
</div>

</form>




</div>
<?php
include_once "./estructura/pie.php";
?>