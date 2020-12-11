<?php
include_once "../configuracion.php";

$objabmrol = new abmrol();

$listarol = $objabmrol->buscar(null);

?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>ABM - ROL</h3>
<a href="nuevorol.php">nuevo</a>
<table border="1">
<?php	

 if(count($listarol)>0){
    foreach ($listarol as $objrol) { 
        
        echo '<tr>.<td style="width:100px;">'.$objrol->getidrol().
        '<td style="width:100px;">'.$objrol->getrodescripcion().'</td>';
        
        
        echo '<td><a href="editarrol.php?accion=editar&idrol='.$objrol->getidrol().'">editar</a></td>';
        echo '<td><a href="accioneliminarrol.php?accion=borrar&idrol='.$objrol->getidrol().'">borrar</a></td></tr>'; 
	}
}

?>
</table>
</body>
</html>