<?php 
include_once '../configuracion.php';
$datos = data_submitted();
//verEstructura($datos);
$resp = false;
$objusuario = new abmusuario();
$buscado=$objusuario->buscarlogin($datos);
$clave=$datos['usclave'];
$datos['usclave']=md5($clave);
    if($datos['accion']=='nuevo'){
        if (count($buscado)>0){

        }else{
        if($objusuario->alta($datos))
            $resp =true;
        }


    }
 
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse. Nombre de usuario no disponible";
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
<br><a href="../Vista/nuevousuario.php">Volver</a><br>

<?php	
echo $mensaje;
?>

</body>
</html>



