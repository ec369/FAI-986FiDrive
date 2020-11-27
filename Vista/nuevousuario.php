<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Tabla</h3>
<!-- se puede usar readonly, para que el input no sea modificado -->
<form method="post" action="accion_nuevoregistro.php">
	<label>Nombre</label><br/>
	<input id="usnombre" name="usnombre"><br/>	
	<label>Apellido</label><br/>
	<input id="usapellido"  name ="usapellido" width="80" type="text" ><br/>
	<label>Login</label><br/>
	<input id="uslogin"  name="uslogin" width="80" type="text" ><br/>
    <label>Pass</label><br/>
    <input width="80" type="text" id="usclave" name="usclave"></input><br/> 	
    <label>Usactivo hidden 1</label><br/>
    <input width="80" type="hidden" value="1" id="usactivo" name="usactivo"></input><br/> 	
	<input id="accion" name ="accion" value="nuevo" type="hidden">
	<input type="submit">
    </form>
<br><br>
<a href="listarusuario.php">Volver</a>
</body>
</html>