<!-- Creamos el archivo amarchivo.php para alta o modificación de un Archivo. Este archivo debe incluir los archivos: cabecera.php, pie.php y menu.php
Nombre del Archivo (Colocar valor por defecto 1234.png)
Descripción del Archivo
 Usuario que lo carga (Seleccionar desde un Combo, los usuarios posibles son: admin, visitante, y usted)
 Seleccionar Icono que se va a utilizar (Imagen, Zip, Doc, PDF, XLS). Usar CheckBox.
Clave del Archivo a modificar. (Este debe ser un campo Oculto. -->
<?php
include_once "./estructura/cabecera.php";
?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

  <form id="form" name="form" action="accion.php" method="post" data-toggle="validator" enctype="multipart/form-data">

    <div class="row">
      <!-- fila -->

      <div class="col-md-3 mb-3">
        <!-- grupo de control para todas las pantallas medianas y large mide 6, mb es margen b es botton -3 -->
        <label for="nombre" class="control-label">Nombre del Archivo</label>
        <input class="form-control" id="nombre" name="nombre" placeholder="1234.png" type="text" required>
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <label for="descripcion" class="control-label">Descripcion del Archivo</label>
        <textarea class="form-control text-wrap" id="descripcion" name="descripcion" placeholder="Esta es una descripcion generica,si lo necesita la puede cambiar" required>
          </textarea>
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-6 offset-md-0 mb-3">
        <label for="carga" class="control-label">Usuario que lo carga</label><br>
        <select name="carga" required>
          <option value="">Elige una opción</option>
          <option>Admin</option>
          <option>Visitante</option>
          <option>Usted</option>
        </select>
        <div class="invalid-feedback">
        </div>
      </div>

      <div class="col-md-9 mb-3 ">
        <label for="edad">Formato</label>
        Si se bloquea el boton, destildar y volver a tildar (proximamente mejorado xD) <br>
        <input type="checkbox" id="seleccion[]" name="seleccion[]" value="Imagen" >
        <label for="Imagen">Imagen</label>
        <input type="checkbox" id="seleccion[]" name="seleccion[]" value="Zip" >
        <label for="Zip">Zip</label>
        <input type="checkbox" id="seleccion[]" name="seleccion[]" value="Doc" >
        <label for="Doc">Doc</label>
        <input type="checkbox" id="seleccion[]" name="seleccion[]" value="PDF" >
        <label for="PDF">PDF</label>
        <input type="checkbox" id="seleccion[]" name="seleccion[]" value="XLS" >
        <label for="XLS">XLS</label>
        <div class="invalid-feedback">
        </div>


      </div>


      <div class="col-md-6 mb-3">
        <label for="clave" class="control-label"> Clave del archivo a modificar (oculto)</label>
        <input id="clave" name="clave" type="hidden" value="xm234jq">
        <div class="invalid-feedback">
        </div>
      </div>


    </div>

    <div class="row">

      <div class="col-md-6 mb-3">

      </div>
      <div class="">
        <!-- <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
        <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="reset" value="Borrar"> -->

        <input type="file" name="miArchivo" id="miArchivo" >
        <input type="submit" id="btn_eje4" class="btn btn-primary" value="Subir" name="submit">


      </div>
    </div>


  </form>



</div>


<?php
include_once "./estructura/pie.php";
?>