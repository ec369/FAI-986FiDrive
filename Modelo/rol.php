<?php

class rol{
    
    //atributos
    
    private $idrol;
    private $rodescripcion;
    private $mensajeOperacion;
    
    //metodo construct
    
    public function __construct() {
        $this->idrol = "";
        $this->rodescripcion = "";
    }
    
    //funcion de setear
    
    public function setear ($idrol, $rodescripcion){
        $this->setidrol ($idrol);
        $this->setrodescripcion ($rodescripcion);
    }
    
    //funciones de get y set
    
    public function getidrol() {
        return $this->idrol;
    }

    public function getrodescripcion() {
        return $this->rodescripcion;
    }

    public function getmensajeoperacion() {
        return $this->mensajeOperacion;
    }

    public function setidrol($idrol) {
        $this->idrol = $idrol;
    }

    public function setrodescripcion($rodescripcion) {
        $this->rodescripcion = $rodescripcion;
    }

    public function setmensajeoperacion($mensajeOperacion) {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    
    //funciones de cargar, insertar, modificar, eliminar y listar
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM rol  WHERE idrol = ".$this->getidrol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idrol'], $row['rodescripcion']);
                }
            }
        } else {
            $this->setmensajeoperacion("rol->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO `rol` (`rodescripcion`)  VALUES('".$this->getrodescripcion()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setidrol($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("rol->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("rol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE rol SET idrol='".$this->getidrol()."',rodescripcion='".$this->getrodescripcion()."' WHERE idrol='".$this->getidrol()."'";
        echo $sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("rol->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("rol->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM rol WHERE idrol=".$this->getidrol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("rol->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("rol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM rol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new rol();
                    $obj->setear($row['idrol'], $row['rodescripcion']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("rol->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}