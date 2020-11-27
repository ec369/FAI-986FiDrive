
<?php
include_once "../Vista/estructura/cabecera.php";
include_once "../Control/control_archivos.php";
include_once "../Control/abmarchivocargado.php";
?>

<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">
<?php
  $objabmarchivocargado = new abmarchivocargado();
  $listaarchivocargado = $objabmarchivocargado->buscar_disponibles(null);
  $obj = new control_archivos();
  $msg = $obj->verInformacion($_POST);
  ?>

  <form id="form" name="form" data-toggle="validator" method="post" action="accion_eliminar.php">
    <table border="1">
      <?php
      if (count($listaarchivocargado) > 0) {
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
</form>

<input type="button" value="Subir archivo" class="button_active" onclick="location.href='amarchivo.php';" />
<input type="button" value="Eliminar archivo" class="button_active" onclick="location.href='eliminararchivo.php';" />
<input type="button" value="Compartir archivo" class="button_active" onclick="location.href='compartirarchivo.php';" />


</div>
<?php
include_once "./estructura/pie.php";
?>