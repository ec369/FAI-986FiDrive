<?php
// include_once '../configuracion.php';
// include_once "../Control/abmarchivocargado.php";
include_once "../Vista/estructura/cabecera.php";

$objabmarchivocargado = new abmarchivocargado();
$datos = data_submitted();
$obj =NULL;
if (isset($datos['idarchivocargado'])){
    $listaTabla = $objabmarchivocargado->buscar($datos);
    if (count($listaTabla)==1){
        $obj= $listaTabla[0];
      //  echo "lista tablaaa";
      //  echo print_r($obj);
    }
}

?>	
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Tabla</h3> -->
<?php if ($obj!=null){?>

<!-- se puede usar readonly, para que el input no sea modificado -->
<form method="post" action="accion_editar.php">
  
	<label>ID Archivo</label><br/>
    <input readonly id="idarchivocargado"  name ="idarchivocargado" width="80" type="text" value="<?php echo $obj->getidarchivocargado()?>"><br/>
    <label>Nombre</label><br/>
	<input readonly id="acnombre" name="acnombre" type="text" value="<?php echo $obj->getacnombre()?>"><br/>
    <label>Descripcion</label><br/>
	<input type="text" id="acdescripcion" name="acdescripcion" value="<?php echo $obj->getacdescripcion()?>"><br/>
    <label>Formato</label><br/>
    <input id="acicono"  name ="acicono" type="text" value="<?php echo $obj->getacicono()?>"><br/>
    <!-- <label>ID Usuario</label><br/>
	<input readonly id="idusuario" name="idusuario" type="text" value="<?php //echo $obj->getidusuario()?>"><br/>
    <label>ID Usuario</label><br/>
	<input id="idusuario"  name ="idusuario" type="text" value="<?php// echo $obj->getidusuario()?>"><br/> -->
	<label>Link acceso</label><br/>
	<input type="text" id="aclinkacceso" name="aclinkacceso" value="<?php echo $obj->getaclinkacceso()?>"><br/>
    <label>Cantidad Descarga</label><br/>
	<input type="text" id="accantidaddescarga" name="accantidaddescarga" value="<?php echo $obj->getaccantidaddescarga()?>"><br/>
    <label>Cantidad Usada</label><br/>
	<input type="text" id="accantidadusada" name="accantidadusada" value="<?php echo $obj->getaccantidadusada()?>"><br/>
    <label>Clave</label><br/>
	<input  id="acprotegidoclave" name="acprotegidoclave" type="hidden" value="<?php echo $obj->getacprotegidoclave()?>"><br/>
	<input id="accion" name ="accion" value="editar" type="hidden">
    <input type="submit" class="btn btn-primary" value="Subir" name="submit" >
    
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="../Vista/contenido.php">Volver</a>

<?php
include_once "./estructura/pie.php";
?>