<?php 
class estadotipos {
    private $idestadotipos;
    private $etdescripcion;
    private $etactivo;
  
   
    public function __construct(){
        
        $this->idestadotipos="";
        $this->etdescripcion="";
        $this->etactivo ="";
   
    }
    public function setear($idestadotipos, $etdescripcion, $etactivo)    {
        $this->setidestadotipos($idestadotipos);
        $this->setetdescripcion($etdescripcion);
        $this->setetactivo($etactivo);
   
    }
    public function setearObjeto($unaPersona){
        
    }
    
    
    
    public function getidestadotipos(){
        return $this->idestadotipos;
        
    }
    public function setidestadotipos($valor){
        $this->idestadotipos = $valor;
        
    }
    
    public function getetdescripcion(){
        return $this->etdescripcion;
        
    }
    public function setetdescripcion($valor){
        $this->etdescripcion = $valor;
        
    }
    public function getetactivo(){
        return $this->etactivo;
        
    }
    public function setetactivo($valor){
        $this->etactivo = $valor;
        
    }
    
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    public function Mostraretactivoyetdescripcion()
    {
        return $this->getetactivo().' '.$this->getetdescripcion();
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM estadotipos WHERE idestadotipos = ".$this->getidestadotipos();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql=" SELECT DISTINCT estadotipos.etactivo, estadotipos.idestadotipos, estadotipos.etdescripcion from estadotipos";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
         //   echo $sql;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Persona();
                    // $obj2= new auto;
                    // $obj2->setpatente($row ['Patente']);
                    // $obj2->setmarca($row ['Marca']);
                    // $obj2->setmodelo($row ['Modelo']);
                    // $obj2->cargar();
                    // $patente=$obj2->getpatente();
                    // $marca=$obj2->getmarca();
                    // $modelo=$obj2->getmodelo();
                
                    $obj->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo'], $row[''], $row[''], $row['']);
                    array_push($arreglo, $obj);
                    
             
                }
               
            }
            
        } else {
        //    $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        
        }
 
        return $arreglo;
    }

    }

    
    



?>