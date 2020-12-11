<?php
include_once '../configuracion.php';
$sesion=new session();
$varsesion=$sesion->validar2();
$rol=$sesion->getRol();
//$admin=$rol->getusnombre();

//echo $admin;
//echo print_r($rol);
if ($varsesion==false){
  
    header("Location:../Vista/login.php");
}else{
    $objuser=$sesion->getUsuario2();
    $user=$objuser[0];
    $unuser=$user->getusnombre();
    echo "<p class=''><b>BIENVENIDO ".$unuser."</p>";
   
 }

//echo "<a href='".$sesion->cerrar()."'>Cerrar Sesion </a>";
?>
<html>

<head>
    <!-- Required meta tags -->
    <!-- <a href="./cerrar_session.php">Cerrar Sesion </a> -->
    <p>
    <a href='./cerrar_session.php' class='btn btn-info btn-lg'>
      <span class='glyphicon glyphicon-log-out'></span> Cerrar Sesion
    </a>
  </p> 
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

<body>
<?php
// Esto devolverá todos los archivos de esa carpeta
$archivos = scandir("../archivos");
$num=0;
for ($i=2; $i<count($archivos); $i++)
{$num++;
?>
<!-- Visualización del nombre del archivo !-->
         
    <tr>
      <th scope="row"><?php echo $num;?></th>
      <td><?php echo $archivos[$i]; ?></td>
      <td><a title="Descargar Archivo" href="../archivos/<?php echo $archivos[$i];?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a></td>
    </tr>
 <?php }?>
    <header>

        <p></p>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/xampp/FAI-986FiDrive/Vista/contenido.php">MENU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li> -->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="http://localhost/xampp/FAI-986FiDrive/Vista/contenido.php">Contenido</a>
                    <a class="dropdown-item" href="http://localhost/xampp/FAI-986FiDrive/Vista/compartidos.php">Compartidos</a>
                        <a class="dropdown-item" href="http://localhost/xampp/FAI-986FiDrive/Vista/amarchivo.php">Alta o modificacion</a>
                        <a class="dropdown-item" href="http://localhost/xampp/FAI-986FiDrive/Vista/compartirarchivo.php">Compartir Archivos</a>
                        <!-- <a class="dropdown-item" href="http://localhost/xampp/FAI-986FiDrive/Vista/eliminararchivocompartido.php">Eliminar opcion compartir</a> -->
                        <a class="dropdown-item" href="http://localhost/xampp/FAI-986FiDrive/Vista/eliminararchivo.php">Eliminar archivo</a>

                        <!--     <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div> -->
                </li>

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Trabajo Practico Nº2
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="http://localhost/xampp/TP2_EJERCICIOS/TP2_Ejercicio3/Vistas/">Ejercicio 3</a>
                        <a class="dropdown-item" href="http://localhost/xampp/TP2_EJERCICIOS/TP2_Ejercicio4/Vista/">Ejercicio 4</a>
                                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
                <!--  <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
            </ul>
            <!--          <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>

    <!--   <div style="height: 80px; width:100%; border:2px solid red; border-radius:5px;"></div> -->


    <?php
    include_once "./estructura/lateral.php";
    ?>