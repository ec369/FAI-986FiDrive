<html>

<head>
    <!-- Required meta tags -->
  

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


<!-- se puede usar readonly, para que el input no sea modificado -->
<form method="post" action="accion_nuevoregistro.php">
	<label>Nombre</label><br/>
	<input id="usnombre" name="usnombre"  type="text"><br/>	
	<label>Apellido</label><br/>
	<input id="usapellido"  name ="usapellido"  type="text" ><br/>
	<label>Login</label><br/>
	<input id="uslogin"  name="uslogin"  type="text" ><br/>
    <label>Pass</label><br/>
    <input  type="text" id="usclave" name="usclave"></input><br/> 	
    <label></label><br/>
    <input  type="hidden" value="1" id="usactivo" name="usactivo"></input><br/> 	
	<input id="accion" name ="accion" value="nuevo" type="hidden">
	<input type="submit">
    </form>
<br><br>
<a href="./login.php">Volver</a>
</body>
</html>