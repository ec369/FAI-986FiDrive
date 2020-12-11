<?php 
include_once '../../configuracion.php';
$datos = data_submitted();
//verEstructura($datos);
$resp = false;
$objrol = new abmrol();

//$objTrans = new Abmauto();
if (isset($datos['accion'])){
    echo "entra";
    if($datos['accion']=='editar'){
        echo "epa";
        if($objrol->modificacion($datos)){
            $resp = true;
        }
    }
  

}
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.".'<a href="../nuevaPersona.php">REGISTRARSE</a>';
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
<br><a href="../listarrol.php">Volver</a><br>

<?php	
echo $mensaje;
?>

</body>
</html>


