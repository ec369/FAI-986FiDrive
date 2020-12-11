<?php

class usuariorol{
    
    //atributos
    
    private $objusuario;
    private $objrol;
    private $mensajeoperacion;
    
    //metodo construct
    
    public function __construct() {
        $this->objusuario = "";
        $this->objrol = "";
    }
    
    //funcion de setear
    
    public function setear ($objusuario, $objrol){
        $this->setobjusuario ($objusuario);
        $this->setobjrol ($objrol);
    }
    
    //funciones de get y set
    
    public function getobjusuario() {
        return $this->objusuario;
    }

    public function getobjrol() {
        return $this->objrol;
    }

    public function getmensajeoperacion() {
        return $this->mensajeoperacion;
    }

    public function setobjusuario($objusuario) {
        $this->objusuario = $objusuario;
    }

    public function setobjrol($objrol) {
        $this->objrol = $objrol;
    }

    public function setmensajeoperacion($mensajeoperacion) {
        $this->mensajeoperacion = $mensajeoperacion;
    }

    
    //funciones de cargar, insertar, modificar, eliminar y listar
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol WHERE idusuario = ".$this->getobjusuario()." AND idrol = ".$this->getobjrol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objusuario = new usuario();
                    $objusuario->setidusuario($row['idusuario']);
                    $objusuario->cargar();
                    $objrol = new rol();
                    $objrol->setidrol($row['idrol']);
                    $objrol->cargar();
                    $this->setear($objusuario, $objrol);
                }
            }
        } else {
            $this->setmensajeoperacion("usuariorol->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO usuariorol (idusuario, idrol)  VALUES('".$this->getobjusuario()."','".$this->getobjrol()."');";
       echo $sql;
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                //$this->setidUnidad($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("usuariorol->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuariorol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE usuariorol SET `idrol`=".$this->getobjrol()." WHERE idusuario=".$this->getobjusuario()."";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("usuariorol->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuariorol->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM usuariorol WHERE idusuario='".$this->getobjusuario()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("usuariorol->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuariorol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol inner join usuario on usuariorol.idusuario=usuario.idusuario ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
            echo $sql;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new usuariorol();
                    $objusuario = new usuario();
                    $objusuario->setidusuario($row['idusuario']);
                    $objusuario->cargar();
                    $objrol = new rol();
                    $objrol->setidrol($row['idrol']);
                    $objrol->cargar();
                    $obj->setear($objusuario, $objrol);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            //$this->setmensajeoperacion("usuariorol->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
    
}