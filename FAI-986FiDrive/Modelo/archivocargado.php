<?php 
include_once "../Modelo/conector/BaseDatos.php";
include_once "../Modelo/archivocargado.php";
class archivocargado {
    private $idarchivocargado;
    private $acnombre;
    private $acdescripcion;
    private $acicono;
    private $idusuario;
    private $aclinkacceso;
    private $accantidaddescarga;
    private $accantidadusada;
    private $acfechainiciocompartir;
    private $acefechafincompartir;
    private $acprotegidoclave;
    private $mensajeoperacion;
   											
   
    public function __construct(){
        
        $this->idarchivocargado="";
        $this->acnombre="";
        $this->acdescripcion="";
        $this->acicono="";
        $this->idusuario="";
        $this->aclinkacceso="";
        $this->accantidaddescarga="";
        $this->accantidadusada="";
        $this->acfechainiciocompartir="";
        $this->acefechafincompartir="";
        $this->acprotegidoclave="";
        $this->mensajeoperacion ="";
    }
    public function setear($idarchivocargado, $acnombre, $acdescripcion, $acicono, $idusuario, $aclinkacceso, $accantidaddescarga, $accantidadusada, $acfechainiciocompartir, $acefechafincompartir,$acprotegidoclave)    {
        $this->setidarchivocargado($idarchivocargado);
        $this->setacnombre($acnombre);
        $this->setacdescripcion($acdescripcion);
        $this->setacicono($acicono);
        $this->setidusuario($idusuario);
        $this->setaclinkacceso($aclinkacceso);
        $this->setaccantidaddescarga($accantidaddescarga);
        $this->setaccantidadusada($accantidadusada);
        $this->setacfechainiciocompartir($acfechainiciocompartir);
        $this->setacefechafincompartir($acefechafincompartir);
        $this->setacprotegidoclave($acprotegidoclave);
    }
       
        
    public function getidarchivocargado(){
        return $this->idarchivocargado;
        
    }
    public function setidarchivocargado($valor){
        $this->idarchivocargado = $valor;
        
    }
    
    public function getacnombre(){
        return $this->acnombre;
        
    }
    public function setacnombre($valor){
        $this->acnombre = $valor;
        
    }

 
    public function getacdescripcion(){
        return $this->acdescripcion;
        
    }
    public function setacdescripcion($valor){
        $this->acdescripcion = $valor;
        
    }

     
    public function getacicono(){
        return $this->acicono;
        
    }
    public function setacicono($valor){
        $this->acicono = $valor;
        
    }



    public function getidusuario(){
        return $this->idusuario;
        
    }
    public function setidusuario($valor){
        $this->idusuario= $valor;
        
    }




    public function getaclinkacceso(){
        return $this->aclinkacceso;
        
    }
    public function setaclinkacceso($valor){
        $this->aclinkacceso= $valor;
        
    }



    public function getaccantidaddescarga(){
        return $this->accantidaddescarga;
        
    }
    public function setaccantidaddescarga($valor){
        $this->accantidaddescarga= $valor;
        
    }

  

    public function getaccantidadusada(){
        return $this->accantidadusada;
        
    }
    public function setaccantidadusada($valor){
        $this->accantidadusada= $valor;
        
    }



    public function getacfechainiciocompartir(){
        return $this->acfechainiciocompartir;
        
    }
    public function setacfechainiciocompartir($valor){
        $this->acfechainiciocompartir= $valor;
        
    }



    public function getacefechafincompartir(){
        return $this->acefechafincompartir;
        
    }
    public function setacefechafincompartir($valor){
        $this->acefechafincompartir= $valor;
        
    }

     
    public function getacprotegidoclave(){
        return $this->acprotegidoclave;
        
    }
    public function setacprotegidoclave($valor){
        $this->acprotegidoclave= $valor;
        
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargado WHERE idarchivocargado = ".$this->getidarchivocargado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idarchivocargado'], $row['acnombre'], 
                    $row['acdescripcion'], $row['acicono'], $row['idusuario'], 
                    $row['aclinkacceso'], $row['accantidaddescarga'], 
                    $row['accantidadusada'], $row['acfechainiciocompartir'], 
                    $row['acefechafincompartir'], $row['acprotegidoclave']);
                    								
                }
            }
        } else {
            $this->setmensajeoperacion("fidrive->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        
        $sql="INSERT INTO archivocargado (acnombre,acdescripcion,acicono,idusuario,aclinkacceso,accantidaddescarga,accantidadusada,acfechainiciocompartir,acefechafincompartir,acprotegidoclave) 
         VALUES('".$this->getacnombre()."','".$this->getacdescripcion()."','".$this->getacicono()."','".$this->getidusuario()."','".$this->getaclinkacceso()."','".$this->getaccantidaddescarga()."','".$this->getaccantidadusada()."','".$this->getacfechainiciocompartir()."','".$this->getacefechafincompartir()."','".$this->getacprotegidoclave()."')";
       
       //echo $sql;
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setidarchivocargado($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("archivocargado->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivocargado->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
     
        $sql="UPDATE archivocargado SET acnombre='".$this->getacnombre()."', acdescripcion='".$this->getacdescripcion()."' WHERE idarchivocargado='".$this->getidarchivocargado()."'";
      //echo $sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("fidrive->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("fidrive->modificar: ".$base->getError());
        }
        return $resp;
    }
    

    

    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM archivocargado WHERE idarchivocargado='".$this->getidarchivocargado()."'";
        
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("archivocargado->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivocargado->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargado "; 
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
          //  echo $sql;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                										
                while ($row = $base->Registro()){
                    $obj= new archivocargado();
                    $archivocargado= new archivocargado();
                    $archivocargado->setidarchivocargado($row['idarchivocargado']);
                    $archivocargado->cargar();
                    //$idarchivocargado=$archivocargado->getidarchivocargado();
                    $obj->setear($row['idarchivocargado'],$row['acnombre'], 
                    $row['acdescripcion'], $row['acicono'], $row['idusuario'], 
                    $row['aclinkacceso'], $row['accantidaddescarga'], 
                    $row['accantidadusada'], $row['acfechainiciocompartir'], 
                    $row['acefechafincompartir'], $row['acprotegidoclave']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
           // $this->setmensajeoperacion("archivocargado->listar: ".$base->getError());
        }
 
        return $arreglo;
    }

    public static function listar2($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargado "; 
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
       //     echo $sql;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                										
                while ($row = $base->Registro()){
                    $obj= new archivocargado();
                    $archivocargado= new archivocargado();
                    $archivocargado->setidarchivocargado($row['idarchivocargado']);
                    $archivocargado->cargar();
                    $idarchivocargado=$archivocargado->getidarchivocargado();
                    $obj->setear($row['idarchivocargado'],$row['acnombre'], 
                    $row['acdescripcion'], $row['acicono'], $idarchivocargado, 
                    $row['aclinkacceso'], $row['accantidaddescarga'], 
                    $row['accantidadusada'], $row['acfechainiciocompartir'], 
                    $row['acefechafincompartir'], $row['acprotegidoclave']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
           // $this->setmensajeoperacion("archivocargado->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
}
        
?>