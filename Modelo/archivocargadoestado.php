<?php 
class archivocargadoestado {
    private $idarchivocargadoestado;
    private $idestadotipos;
    private $acedescripcion;
    private $idusuario;
    private $acefechaingreso;
    private $acefechafin;
    private $idarchivocargado;
    private $mensajeoperacion;
   											
   
    public function __construct(){
        
        $this->idarchivocargadoestado="";
        $this->idestadotipos="";
        $this->acedescripcion="";
        $this->idusuario="";
        $this->acefechaingreso="";
        $this->acefechafin="";
        $this->accantidadusada="";
        $this->idarchivocargado="";
          $this->mensajeoperacion ="";
    }
    public function setear($idarchivocargadoestado, $idestadotipos, $acedescripcion, $idusuario, $acefechaingreso, $acefechafin, $idarchivocargado)    {
        $this->setidarchivocargadoestado($idarchivocargadoestado);
        $this->setidestadotipos($idestadotipos);
        $this->setacedescripcion($acedescripcion);
        $this->setidusuario($idusuario);
        $this->setacefechaingreso($acefechaingreso);
        $this->setacefechafin($acefechafin);
        $this->setidarchivocargado($idarchivocargado);
     
    }
       
        
    public function getidarchivocargadoestado(){
        return $this->idarchivocargadoestado;
        
    }
    public function setidarchivocargadoestado($valor){
        $this->idarchivocargadoestado = $valor;
        
    }
    
    public function getidestadotipos(){
        return $this->idestadotipos;
        
    }
    public function setidestadotipos($valor){
        $this->idestadotipos = $valor;
        
    }

 
    public function getacedescripcion(){
        return $this->acedescripcion;
        
    }
    public function setacedescripcion($valor){
        $this->acedescripcion = $valor;
        
    }

    public function getidusuario(){
        return $this->idusuario;
        
    }
    public function setidusuario($valor){
        $this->idusuario= $valor;
        
    }




    public function getacefechaingreso(){
        return $this->acefechaingreso;
        
    }
    public function setacefechaingreso($valor){
        $this->acefechaingreso= $valor;
        
    }



    public function getacefechafin(){
        return $this->acefechafin;
        
    }
    public function setacefechafin($valor){
        $this->acefechafin= $valor;
        
    }

  

    public function getaccantidadusada(){
        return $this->accantidadusada;
        
    }
    public function setaccantidadusada($valor){
        $this->accantidadusada= $valor;
        
    }



    public function getidarchivocargado(){
        return $this->idarchivocargado;
        
    }
    public function setidarchivocargado($valor){
        $this->idarchivocargado= $valor;
        
    }



    public function getacefechafincompartir(){
        return $this->acefechafincompartir;
        
    }
    public function setacefechafincompartir($valor){
        $this->acefechafincompartir= $valor;
        
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
        $sql="SELECT * FROM archivocargadoestado WHERE idarchivocargadoestado = ".$this->getidarchivocargadoestado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objusuario=new usuario();
                    $objusuario->setidusuario($row['idusuario']);
                    $objusuario->cargar();
                    $objestadotipo=new estadotipos();
                    $objestadotipo->setidestadotipos($row['idestadotipos']);
                    $objestadotipo->cargar();
                    $objarchivocargado=new archivocargado();
                    $objarchivocargado->setidarchivocargado($row['idarchivocargado']);
                    $objarchivocargado->cargar();
                    $this->setear($row['idarchivocargadoestado'], $objestadotipo , $row['acedescripcion'], $objusuario, $row['acefechaingreso'],
                     $row['acefechafin'],$objarchivocargado);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO archivocargadoestado (idestadotipos,acedescripcion,idusuario,acefechaingreso,acefechafin,idarchivocargado) 
         VALUES('".$this->getidestadotipos()."',
         '".$this->getacedescripcion()."',
         '".$this->getidusuario()."',
         '".$this->getacefechaingreso()."',
         '".$this->getacefechafin()."',
         '".$this->getidarchivocargado()."')";
         echo $sql;
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setidarchivocargadoestado($elid);
                $resp = true;
            } else {
              //  $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
            }
        } else {
           // $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
     
        $sql="UPDATE archivocargadoestado SET idestadotipos='".$this->getidestadotipos()."', acedescripcion='".$this->getacedescripcion()."' WHERE DniDuenio='".$this->getidusuario()."'";
      echo $sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("archivocargadoestado->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivocargadoestado->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar_estado(){
        $resp = false;
        $base=new BaseDatos();
     
        $sql="UPDATE archivocargadoestado SET idestadotipos='".$this->getidestadotipos()."' WHERE idarchivocargado='".$this->getidarchivocargado()."'";
     echo $sql;
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
        $sql="DELETE FROM archivocargadoestado WHERE idarchivocargadoestado='".$this->getidarchivocargadoestado()."'";
        
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("archivocargadoestado->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivocargadoestado->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargadoestado ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new archivocargadoestado();
                    $archivocargadoestado= new archivocargadoestado();
                    $archivocargadoestado->setidarchivocargadoestado($row['idarchivocargadoestado']);
                    $archivocargadoestado->cargar();
                    $objusuario=new usuario();
                    $objusuario->setidusuario($row['idusuario']);
                    $objusuario->cargar();
                    $objestadotipo=new estadotipos();
                    $objestadotipo->setidestadotipos($row['idestadotipos']);
                    $objestadotipo->cargar();
                    $objarchivocargado=new archivocargado();
                    $objarchivocargado->setidarchivocargado($row['idarchivocargado']);
                    $objarchivocargado->cargar();
                   // $dniarchivocargadoestado=$archivocargadoestado->getnrodni();
                    $obj->setear($row['idarchivocargadoestado'],$objestadotipo, $row['acedescripcion'], $objusuario, $row['acefechaingreso'], $row['acefechafin'], $objarchivocargado );
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
           // $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
}
}
?>