<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Tabla</h3>
<!-- se puede usar readonly, para que el input no sea modificado -->
<form method="post" action="accionnuevorol.php">
	<label>Rol Descripcion</label><br/>
	<input id="rodescripcion" name="rodescripcion"><br/>	

	<input id="accion" name ="accion" value="nuevo" type="hidden">
	<input type="submit">
    </form>
<br><br>
<a href="listarusuario.php">Volver</a>
</body>
</html>