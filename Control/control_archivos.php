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




 
// >>>>><<<<<<<<<<<<<<<<<<>>>>>ELIMINAR DIRECTORIO Y ARCHIVOS<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<<<

function eliminar_dir($datos) {
    echo "entran datos;";
    echo print_r($datos);
    $nombre=$datos["acnombre"];
    $texto="";
    $path="../archivos/".$nombre;
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