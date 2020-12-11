<?php
include_once '../configuracion.php';
$objabmrol = new abmrol();
$datos = data_submitted();
$obj =NULL;
if (isset($datos['idrol'])){
    echo "entra editar";
    $listarol = $objabmrol->buscar($datos);
    if (count($listarol)==1){
        $obj= $listarol[0];
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
<form method="post" action="accionactualizarrol.php">
    
<label>ID ROL</label><br/>
    <textarea  id="idrol" name="idrol"><?php echo $obj->getidrol()?></textarea><br/>
	<label>Rol Descripcion</label><br/>
    <textarea  id="rodescripcion" name="rodescripcion"><?php echo $obj->getrodescripcion()?></textarea><br/>
    
		<input id="accion" name ="accion" value="editar" type="hidden">
	<input type="submit">
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="listarrol.php">Volver</a>
</body>
</html>