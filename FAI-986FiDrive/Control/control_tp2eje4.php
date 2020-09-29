<?php

class control_tp2eje4 {

    public function verInformacion($datos){
        $titulo=$datos["titulo"];
        $actores= $datos["actores"];
        $guion=$datos["guion"];
        $director=$datos["director"];
        $guion=$datos["guion"];
        $produccion=$datos["produccion"];
        $año=$datos["año"];
        $nacionalidad=$datos["nacionalidad"];
        $genero=$datos["genero"];
        $duracion=$datos["duracion"];
        $restriccion=$datos["seleccion"];
        
        $texto= "<b>Titulo:</b> ".$titulo."<br>".
                "<b>Actores:</b> ".$actores." <br> ".
                "<b>Director:</b> ".$director." <br> ".
                "<b>Guion:</b> ".$guion." <br> ".
                "<b>Produccion:</b> ".$produccion." <br> ".
                "<b>Año:</b> ".$año." <br> ".
                "<b>Nacionalidad:</b> ".$nacionalidad." <br> ".
                "<b>Genero:</b> " .$genero." <br> ".
                "<b>Duracion:</b> ".$duracion."<br> ".
                "<b>Restricciones de edad:</b> ".$restriccion;

        return $texto;
    }

}
?>