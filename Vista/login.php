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


<div id="contenido" style="height: 100%; width: 100%; border: 2px solid red; border-radius:3px;">




	<form id="loginForm" name="loginForm" method="post" data-toggle="validator" action="./accion_verificarlogin.php" >

	<div class="imgcontainer">
    <img src="./img/login_logo.png" alt="Avatar" class="avatar">
  	</div>

		<div class="form-group">

			<label class="col-md-3 control-label">Nombre de Usuario</label>

			<div class="col-md-7">

				<input type="text" class="form-control" id="usnombre" name="usnombre" required>

			</div>

		</div>

		<div class="form-group">

			<label class="col-md-3 control-label">Contraseña</label>

			<div class="col-md-7">

				<input type="password" class="form-control" id="usclave" name="usclave"  required>

			</div>

		</div>

		<div class="form-group">

			<div class="col-md-5 col-md-offset-3">

			<input id="btn_eje4" class="btn btn-primary" name="accion" id="accion" type="submit" value="login">
			<a href="../Vista/nuevousuario.php">Crear cuenta</a>

			</div>
		</div>




	</form>


</div>





<?php
include_once "./estructura/pie.php";
?>