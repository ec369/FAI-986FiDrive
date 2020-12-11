<?php

class abmusuariorol{
    //Espera como parametro un arreglo asociativo donde las claves coincidusuarioen con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincidusuarioen con los nombres de las variables instancias del objeto
     * @param array $param
     * @return usuariorol
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idusuario',$param) and array_key_exists('idrol',$param)){
            $obj = new usuariorol();
            $obj->setear($param['idusuario'], $param['idrol']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincidusuarioen con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return usuariorol
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idusuario']) ){
            $obj = new usuariorol();
            $obj->setear($param['idusuario'],null);
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
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['idusuario'] =null;
        $elObjtusuariorol = $this->cargarObjeto($param);
//        verEstructura($elObjtusuariorol);
        if ($elObjtusuariorol!=null and $elObjtusuariorol->insertar()){
            $resp = true;
        }
        return $resp;
        
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        echo print_r($param);
        if ($this->seteadosCamposClaves($param)){
            echo "entraaaaa";
            $elObjtusuariorol = $this->cargarObjetoConClave($param);
            if ($elObjtusuariorol!=null and $elObjtusuariorol->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            
            $elObjtusuariorol = $this->cargarObjeto($param);
          
            if($elObjtusuariorol!=null and $elObjtusuariorol->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    


    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
    
        $where = " true ";
        if ($param<>NULL){
          
            if  (isset($param['usnombre']))
                $where.=" and usnombre ='".$param['usnombre']."'";
           
        }
        $arreglo = usuariorol::listar($where);  
        return $arreglo;
            
            
      
        
    }
}