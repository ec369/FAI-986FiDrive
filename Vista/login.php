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

<div id="contenido" style="height: 100%;  margin-left: auto; border: 0px solid green; border-radius:3px;">




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
      <input type="text" id="login" name="usnombre" class="fadeIn second" name="login" placeholder="Usuario" required>
      <input type="password" class="form-control" id="password" name="usclave"  name="login" placeholder="Contraseña" required>
      <input type="submit" name="accion" class="fadeIn fourth" value="Iniciar Sesion" >
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="../Vista/nuevousuario.php">Registrarse</a>
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


</div>



