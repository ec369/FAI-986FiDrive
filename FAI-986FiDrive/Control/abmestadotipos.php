<?php
class abmestadotipos{
    //Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto
     * @param array $param
     * @return estadotipos
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idestadotipos',$param) and array_key_exists('etdescripcion',$param)){
            $obj = new estadotipos();
            $obj->setear($param['idestadotipos'], $param['etdescripcion'], $param['etactivo']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return estadotipos
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idestadotipos']) ){
            $obj = new estadotipos();
            $obj->setear($param['idestadotipos'], null, null);
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
      
        if (isset($param['idestadotipos']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
  
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
   
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
    
        $where = " true ";
        if ($param<>NULL){
          
            if  (isset($param['idestadotipos']))
                $where.=" and idestadotipos ='".$param['idestadotipos']."'";
           
        }
        $arreglo = estadotipos::listar($where);  
        return $arreglo;
            
            
      
        
    }
    
} 
?>