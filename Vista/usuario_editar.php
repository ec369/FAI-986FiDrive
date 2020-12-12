<?php

// include_once "../Control/abmarchivocargado.php";
include_once "../Vista/estructura/cabecera.php";

$objabmarchivocargado = new abmarchivocargado();
foreach ($sesion->getUsuario2() as $unObjeto1) {
  $id = $unObjeto1->getidusuario();

  echo "<input id='idusuario' name='idusuario' type='hidden' value='" . $id . "'>";
  echo "el id" . $id;
}

foreach ($sesion->getrol() as $unObjetorol) {
    //echo "acaaaa objeto";
      //echo print_r($unObjeto1);
      $rol = $unObjetorol->getobjrol();
     //echo "acaaaa objeto rolopoooooooooooooo";
     //echo print_r ($rol);
     $idrol=$rol->getidrol();
  
     echo "acaaaa id rolaso". $idrol;
  
      //echo "<input id='idusuario' name='idusuario' type='hidden' value='" . $id . "'>";
   
    }
  

if (($idrol==1) or ($id==1)){
    

$objusuario = new abmusuario();
$objusuariorol = new abmusuariorol();
$datos = data_submitted();
$obj =NULL;
if (isset($datos['idusuario'])){
    echo "entraaa";
    $listaTabla = $objusuario->buscar_activo($datos);
   // $listaTablarol = $objusuariorol->buscar($datos);
   //   $obj2=$listaTablarol[0];
   
  //  echo print_r ($obj2);
  //  foreach ($obj2 as $clave => $valor) {
  //    print "$clave => $valor\n";
 

    if (count($listaTabla)==1){
        $obj= $listaTabla[0];
        $obj2= $listaTablarol[0];
        foreach ($obj2 as $unObjeto1) {
            "entra2";
           echo print_r($unObjeto1);
         }
      //  echo "lista tablaaa";
    // echo print_r($obj);
     //echo print_r($obj3);

   // echo $obj2->getobjrol();

    }
}
}else{
    header("Location:../Vista/login.php");
}


?>	
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Tabla</h3> -->
<?php if ($obj!=null){?>

<!-- se puede usar readonly, para que el input no sea modificado -->
<form method="post" action="accion_deshabilitar.php">
  

    <label>Nombre</label><br/>
	<input readonly id="usnombre" name="usnombre" type="text" value="<?php echo $obj->getusnombre()?>"><br/>
    <label>Apellido</label><br/>
	<input readonly id="usapellido" name="usapellido" type="text" value="<?php echo $obj->getusapellido()?>"><br/>
    <label>Apellido</label><br/>
    <input readonly id="uslogin" name="uslogin" type="text" value="<?php echo $obj->getuslogin()?>"><br/>
    <label>Usuario activo</label><br/>
	<input  id="usactivo" name="usactivo" type="text" value="<?php echo $obj->getusactivo()?>"><br/>
    <label>Usuario Rol</label><br/>
    <!-- <input  id="idrol" name="idrol" type="text" value="<?php //echo $obj2->getidrol()?>"><br/> -->
    <select id="idrol" name="idrol">
        <option>Admin</option>

        <option>Visitante</option>
</select>
	<input  id="usclave" name="usclave" type="hidden" value="<?php echo $obj->getusclave()?>"><br/>
    <input  id="idusuario" name="idusuario" type="hidden" value="<?php echo $obj->getidusuario()?>"><br/>
    <input id="accion" name ="accion" value="deshabilitar" type="hidden">
    <input type="submit" class="btn btn-primary" value="Confirmar" name="submit" >
    
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="../Vista/contenido.php">Volver</a>

<?php
include_once "./estructura/pie.php";
?>