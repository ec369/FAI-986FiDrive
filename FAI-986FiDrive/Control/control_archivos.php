<?php

class control_archivos
{
// >>>><<<<<<<<<<<<<<<<<<>>>>>>VER ARCHIVOS<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<

    public function verInformacion()
    {
        $listar = null;
        $directorio = opendir("../archivos/");

        while ($elemento = readdir($directorio)) {
            if ($elemento != '.' && $elemento != '..') {

                if (is_dir("../archivos/" . $elemento)) {
                    $listar .= "<a class='col-md-6' href='../archivos/$elemento' target='_blank'>$elemento</a>
            <br><br>";
                    // print_r($listar);
                } else {
                    $listar .= "<a class='col-md-6' href='../archivos/$elemento' target='_blank'> $elemento</a>
            <br><br>";
                }
            }
        }
        return $listar;
    }
// >>>><<<<<<<<<<<<<<<<<<>>>>>>CREAR CARPETA<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<

    public function subir_carpeta()
    {

        $msg = null;
        if (isset($_POST["directorio"])) {
            $carpeta = htmlspecialchars($_POST["carpeta"]);
            $ruta = htmlspecialchars($_POST["ruta"]);
            $directorio = "../archivos/" . $ruta . $carpeta;

            if (!is_dir($directorio)) {
                $crear = mkdir($directorio, 0777, true);

                if ($crear) {
                    $msg = "Directorio $directorio creado correctamente";
                } else {
                    $msg = "Ha ocurrido un error al crear el directorio";
                }
            } else {
                $msg = "El directorio que intentas crear ya existe";
            }
        }
        return $msg;
    }

    /* public function crear_archivo(){
    
    $msg = null;
    if (isset($_POST["escribir"]))
    {
        $nombre = htmlspecialchars($_POST["nombre"]);
        $extension = htmlspecialchars($_POST["extension"]);
        $contenido = $_POST["contenido"];
        $ruta="../archivos/".$nombre.$extension;

        $manejador=fopen($ruta, 'a');
        if (fwrite ($manejador, $contenido))    
        {
            $msg="archivo creado con exito";
            $msg .="puedes ver en ...<a href='$ruta' target='_blank'> $ruta</a>";
        }
        else 
        {
        
                $msg = "Ha ocurrido un error al crear el archivo";
            }
       
    }
    return $msg;
} */

// >>>><<<<<<<<<<<<<<<<<<>>>>>>SUBIR ARCHIVOS<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<

    public function subir_archivo()
    {
        $dir = '../archivos/'; // Definimos Directorio donde se guarda el archivo
        $target_file = $dir . basename($_FILES["miArchivo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Comprobamos que no se hayan producido errores
        // Allow certain file formats
        if ($imageFileType != "txt") {
            
            $uploadOk = 1;
        } else {
            $uploadOk = 1;
        }
        // Check file size
        // if ($_FILES["miArchivo"]["size"] > 2200000) {
        //   $texto= "Su documento es demasiado pesado, maximo 2MB.";
        //   $uploadOk = 1;
        // }else{
        //   $uploadOk = 0;
        // }
        $texto = "";
        if ($_FILES['miArchivo']["error"] <= 0  &&  $uploadOk != 1) {
            $texto .= "Nombre: " . $_FILES['miArchivo']['name'] . "<br />";
            $texto .= "Tipo: " . $_FILES['miArchivo']['type'] . "<br />";
            $texto .= "Tamaño: " . ($_FILES['miArchivo']["size"] / 1024) . " kB<br />";
            $texto .= "Carpeta temporal: " . $_FILES['miArchivo']['tmp_name'] . " <br />";

            $homepage = file_get_contents($_FILES['miArchivo']['tmp_name']);
            $texto .= $homepage;

            // Intentamos copiar el archivo al servidor.
            if (!copy($_FILES['miArchivo']['tmp_name'], $dir . $_FILES['miArchivo']['name'])) {
                $texto .= "ERROR: no se pudo cargar el archivo ";
            } else {
                $texto .= "El archivo " . $_FILES["miArchivo"]["name"] . " se ha copiado con Éxito <br />";
            }
        } else {
            $texto .= "ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";
        }
        return $texto;
    }



 
// >>>>><<<<<<<<<<<<<<<<<<>>>>>ELIMINAR DIRECTORIO Y ARCHIVOS<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<<<

function eliminar_dir() {
    $texto="";
    $path="../archivos/".$_POST['ruta'];
    $files = glob($path.'/*');

    if (!is_dir($path)){
        unlink($path);
        $texto= "Archivo eliminado con exito";
    }else{
	foreach ($files as $file) {
        is_dir($file) ? eliminar_dir($file) : unlink($file);
      
    }
    $texto= "Directorio eliminado con exito";
    rmdir($path);   
    return $texto;
}
}





}







?>