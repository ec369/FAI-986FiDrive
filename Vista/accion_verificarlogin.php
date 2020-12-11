<?php 
include_once '../configuracion.php';
// include_once '../Control/session.php';
// include_once '../Control/abmusuario.php';
$datos = data_submitted();
//verEstructura($datos);
$resp = false;
$objTrans = new session();
    
$clave=$datos['usclave'];
$datos['usclave']=md5($clave);

    if($datos['accion']=='Iniciar Sesion'){
       
        $usnombre=$datos['usnombre'];
        //echo $usnombre;
        $usclave=$datos['usclave'];
     
        $objTrans->iniciar($usnombre,$usclave);
        if($objTrans->validar()){
            
            echo "entra validacion";
            header("Location:../Vista/contenido.php");
        }else{
            
        }
        
    }
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
        //header("Location:../Vista/login.php");
    }
    


?>
<!-- Crear una nueva página php con un formulario HTML de login en la que solicitan el usuario
y la password para loguearse. Los datos del formulario son enviados a un script
verificaPass.php en el que contienen un arreglo asociativo por cada usuario del sistema. El
arreglo asociativo tiene como claves: “usuario” y “clave”. El script debe visualizar un mensaje
de bienvenida si los datos ingresados coinciden con alguno de los almacenados en el arreglo
y en caso contrario un mensaje de error.
b) Realizar la validación de este formulario. Chequear no solo que se hayan cargado el
usuario y la contraseña antes de ser enviados al servidor sino que también debe
realizar un control de contraseña segura (La contraseña debe tener como mínimo 8
caracteres, no puede ser igual que el nombre de usuario ingresado y debe contener
letras y números). -->

<?php
//include_once "./estructura/cabecera.php";
?>
<html>

<head>
    <!-- Required meta tags -->
    <!-- <a href="./cerrar_session.php">Cerrar Sesion </a> -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link href="./css/4.5.2/bootstrap.min.css" rel="stylesheet"></link>
    <link href="./css/4.5.2/bootstrapValidator.min.css" rel="stylesheet"></link>
    <link href="./css/4.5.2/estilo_tablas.css" rel="stylesheet"></link>
    <link href="./css/4.5.2/estilo_login.css" rel="stylesheet"></link>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet"></link>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></link>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <!-- Me CSS -->
    <link href="./css/4.5.2/estilo_pass.css" rel="stylesheet"></link>
    <link href="./css/4.5.2/CheckPassword.css" rel="stylesheet"></link>

    

</head>

<div id="contenido" style="height: 100%; margin-left: auto; border: 0px solid green; border-radius:3px;">




	<form id="loginForm" name="loginForm" method="post" data-toggle="validator" action="./accion_verificarlogin.php" >

	

	  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="./img/login.png"    id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form>
      <input type="text" id="" name="" class="fadeIn second" name="login" placeholder="USUARIO DESHABILITADO O CONTRASEÑA INCORRECTA">

    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="../Vista/nuevousuario.php">Registrarse</a>
      <a class="underlineHover" href="../Vista/login.php">Reintentar</a>
    </div>

  </div>
</div>

		<!-- <div class="form-group">

			<div class="col-md-5 col-md-offset-3">

			<input id="btn_eje4" class="btn btn-primary" name="accion" id="accion" type="submit" value="login">
			<a href="../Vista/nuevousuario.php">Crear cuenta</a>

			</div>
		</div> -->




	</form>



