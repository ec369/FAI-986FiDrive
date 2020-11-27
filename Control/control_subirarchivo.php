<?php

class control_subirarchivo
{

    // >>>><<<<<<<<<<<<<<<<<<>>>>>>SUBIR ARCHIVOS<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<

    public function subir_archivo()
    {
        $dir = '../archivos/'; // Definimos Directorio donde se guarda el archivo
        $target_file = $dir . basename($_FILES["miArchivo"]["name"]);
 
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Comprobamos que no se hayan producido errores
        // Allow certain file formats
        if ($imageFileType != "txt") {

            $uploadOk = 0;
        } else {
            $uploadOk = 0;
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
            if (!copy($_FILES['miArchivo']['tmp_name'], $dir  . $_FILES['miArchivo']['name'])) {
            

                $texto .= "ERROR: no se pudo cargar el archivo ";
            } else {
                $texto .= "El archivo " . $_FILES["miArchivo"]["name"] . " se ha copiado con Éxito <br />";
            }
        } else {
            $texto .= "ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";
        }
        return $texto;
    }
}
