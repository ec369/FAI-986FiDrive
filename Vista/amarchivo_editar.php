<?php
include_once '../configuracion.php';
include_once "../Control/abmarchivocargado.php";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Tabla</h3>
<?php if ($obj!=null){?>

<!-- se puede usar readonly, para que el input no sea modificado -->
<form method="post" action="accion_editar.php">
	<label>ID Archivo</label><br/>
	<input readonly id="idarchivocargado"  name ="idarchivocargado" width="80" type="text" value="<?php echo $obj->getidarchivocargado()?>"><br/>
	<label>Nombre</label><br/>
    <textarea  id="acnombre" name="acnombre"><?php echo $obj->getacnombre()?></textarea><br/>
    <label>Descripcion</label><br/>
	<textarea  id="acdescripcion" name="acdescripcion"><?php echo $obj->getacdescripcion()?></textarea><br/>
    <label>Formato</label><br/>
    <input id="acicono"  name ="acicono" width="80" type="text" value="<?php echo $obj->getacicono()?>"><br/>
	<label>ID Usuario</label><br/>
	<input id="idusuario"  name ="idusuario" width="80" type="text" value="<?php echo $obj->getidusuario()?>"><br/>
	<label>Link acceso</label><br/>
	<textarea  id="aclinkacceso" name="aclinkacceso"><?php echo $obj->getaclinkacceso()?></textarea><br/>
	<label>Cantidad Descarga</label><br/>
	<textarea  id="accantidaddescarga" name="accantidaddescarga"><?php echo $obj->getaccantidaddescarga()?></textarea><br/>
    <label>Cantidad Usada</label><br/>
	<textarea  id="accantidadusada" name="accantidadusada"><?php echo $obj->getaccantidadusada()?></textarea><br/>
    <label>Clave</label><br/>
	<input  id="acprotegidoclave" name="acprotegidoclave" type="hidden" value="<?php echo $obj->getacprotegidoclave()?>"><br/>

	<input id="accion" name ="accion" value="editar" type="hidden">
    <input type="submit" >
    
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="ftabla.php">Volver</a>
</body>
</html>