<?php 
include_once '../configuracion.php';
include_once '../Control/session.php';
include_once '../Control/abmusuario.php';
$datos = data_submitted();
//verEstructura($datos);
$resp = false;
$objTrans = new session();
    
    
    if($datos['accion']=='login'){
       
        $usnombre=$datos['usnombre'];
        //echo $usnombre;
        $usclave=$datos['usclave'];
        //echo $uspass;
        $objTrans->iniciar($usnombre,$usclave);
        if($objTrans->validar()){
            echo "entra validacion";
            header("Location:../Vista/contenido.php");
        }
        
    }
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
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



