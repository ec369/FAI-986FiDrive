<?php

class abmrol{
    //Espera como parametro un arreglo asociativo donde las claves coincidrolen con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincidrolen con los nombres de las variables instancias del objeto
     * @param array $param
     * @return rol
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idrol',$param)){
            $obj = new rol();
            $obj->setear($param['idrol'], $param['rodescripcion']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincidrolen con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return rol
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idrol']) ){
            $obj = new rol();
            $obj->setear($param['idrol'], null);
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
      
        if (isset($param['idrol']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['idrol'] =null;
        $elObjtrol = $this->cargarObjeto($param);
//        verEstructura($elObjtrol);
        if ($elObjtrol!=null and $elObjtrol->insertar()){
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
            $elObjtrol = $this->cargarObjetoConClave($param);
            if ($elObjtrol!=null and $elObjtrol->eliminar()){
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
            echo "entra seteo";
            $elObjtrol = $this->cargarObjeto($param);
          
            if($elObjtrol!=null and $elObjtrol->modificar()){
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
          
            if  (isset($param['idrol']))
                $where.=" and idrol ='".$param['idrol']."'";
           
        }
        $arreglo = rol::listar($where);  
        return $arreglo;
            
            
      
        
    }
}