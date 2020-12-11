<?php
include_once "../Modelo/usuario.php";
class abmusuario{
    //Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto
     * @param array $param
     * @return estadotipos
     */
    private function cargarObjeto($param){
        $obj = null;
       // echo "acaa parametros";
           //echo print_r($param);
        if( array_key_exists('idusuario',$param)){
            $obj = new usuario();
     
         
            $obj->setear($param['idusuario'], $param['usnombre'], $param['usapellido'],$param['uslogin'],$param['usclave'], $param['usactivo']);
           
        }
        return $obj;
    }
         /**
     * Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return usuario
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idusuario']) ){
            $obj = new usuario();
            $obj->setear($param['idusuario'], null, null, null,null,null);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
      
        if (isset($param['idusuario']))
            $resp = true;
        return $resp;
    }

    public function buscar($param){
    
   
        
        $arreglo=usuario::listar2();  
        return $arreglo;
                        
        
    }

    public function buscar_activo($param){
    
        $where = " true ";
        if ($param<>NULL){
          
            if  (isset($param['idusuario']))
                $where.=" and idusuario ='".$param['idusuario']."'";
           
        }
        $arreglo = usuario::listar($where);  
        return $arreglo;
 
        
    }

    public function buscarlogin($param){
    //echo $param;
        $where = " true ";
        if ($param<>NULL){
          
            if  (isset($param['usnombre']))
                $where.=" and usnombre ='".$param['usnombre']."'";
           
        }
        $arreglo = usuario::listar_ac($where);  
        return $arreglo;
            
    }

   

    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            
            $elObjtarchivocargadoestado = $this->cargarObjeto($param);
          
            if($elObjtarchivocargadoestado!=null and $elObjtarchivocargadoestado->modificar_activo()){
                $resp = true;
            }
        }
        return $resp;
    }

    
    public function alta($param){
        $resp = false;
        // echo "<br>Parametros que entran a la alta<br>";
        // echo print_r($param);
        // echo "<br>";
        $param['idusuario']=null;
        // echo "<br>Parametros que entran a la alta2<br>";
        // echo print_r($param);
        // echo "<br>";
        $elObjtusuario = $this->cargarObjeto($param);
            //verEstructura($elObjtusuario);
            //echo "Estructura cargada <br>";
            //echo print_r($elObjtusuario);
            //echo "<br>";
        if ($elObjtusuario!=null and $elObjtusuario->insertar()){
           // echo print_r($elObjtusuario);
           
            $resp = true;
        }
        return $resp;
        
    }
} 
?>