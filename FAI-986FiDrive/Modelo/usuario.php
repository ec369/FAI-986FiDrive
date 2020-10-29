<?php 
include_once "../Modelo/conector/BaseDatos.php";

class usuario {
    private $idusuario;
    private $usnombre;
    private $usapellido;
    private $uslogin;
    private $usclave;
    private $usactivo;
       
    public function __construct(){
        
        $this->idusuario="";
        $this->usnombre="";
        $this->usapellido ="";
        $this->uslogin ="";
        $this->usclave ="";
        $this->usactivo ="";
    }
    public function setear($idusuario, $usnombre, $usapellido, $uslogin, $usclave, $usactivo)    {
        $this->setidusuario($idusuario);
        $this->setusnombre($usnombre);
        $this->setusapellido($usapellido);
        $this->setuslogin($uslogin);
        $this->setusclave($usclave);
        $this->setusactivo($usactivo);
    }
    public function setearObjeto($unaPersona){
        
    }
    
    
    
    public function getidusuario(){
        return $this->idusuario;
        
    }
    public function setidusuario($valor){
        $this->idusuario = $valor;
        
    }
    
    public function getusnombre(){
        return $this->usnombre;
        
    }
    public function setusnombre($valor){
        $this->usnombre = $valor;
        
    }
    public function getusapellido(){
        return $this->usapellido;
        
    }
    public function setusapellido($valor){
        $this->usapellido = $valor;
        
    }
    public function getuslogin(){
        return $this->uslogin;
        
    }
    public function setuslogin($valor){
        $this->uslogin = $valor;
        
    }
    public function getusclave(){
        return $this->usclave;
        
    }
    public function setusclave($valor){
        $this->usclave = $valor;
        
    }
    public function getusactivo(){
        return $this->usactivo;
        
    }
    public function setusactivo($valor){
        $this->usactivo = $valor;
        
    }
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    public function Mostrarusapellidoyusnombre()
    {
        return $this->getusapellido().' '.$this->getusnombre();
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario WHERE idusuario = ".$this->getidusuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usclave'], $row['usactivo']);
                    
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
        $sql=" SELECT * from usuario ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
         //   echo $sql;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new usuario();
                    // $obj2= new auto;
                    // $obj2->setpatente($row ['Patente']);
                    // $obj2->setmarca($row ['Marca']);
                    // $obj2->setmodelo($row ['Modelo']);
                    // $obj2->cargar();
                    // $patente=$obj2->getpatente();
                    // $marca=$obj2->getmarca();
                    // $modelo=$obj2->getmodelo();
                
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usclave'], $row['usactivo']);
                    array_push($arreglo, $obj);
                    
             
                }
               
            }
            
        } else {
        //    $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        
        }
 
        return $arreglo;
    }

    
    public static function listar2(){
        $arreglo = array();
        $base=new BaseDatos();
        $sql=" SELECT * from usuario ";
        
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new usuario();
                    // $obj2= new auto;
                    // $obj2->setpatente($row ['Patente']);
                    // $obj2->setmarca($row ['Marca']);
                    // $obj2->setmodelo($row ['Modelo']);
                    // $obj2->cargar();
                    // $patente=$obj2->getpatente();
                    // $marca=$obj2->getmarca();
                    // $modelo=$obj2->getmodelo();
                
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usclave'], $row['usactivo']);
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