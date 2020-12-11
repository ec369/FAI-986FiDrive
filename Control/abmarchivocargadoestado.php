<?php
include_once "../Modelo/archivocargadoestado.php";
class abmarchivocargadoestado{
    //Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto
     * @param array $param
     * @return archivocargadoestado
     */
    private function cargarObjeto($param){
        $obj = null;
          // echo print_r($param);
        if( array_key_exists('idarchivocargadoestado',$param) and array_key_exists('idestadotipos',$param)){
            $obj = new archivocargadoestado();
          //  $param['acefechaingreso']="1992-05-27";
          //  $param['acefechafin']="1994-05-27";
            $obj->setear($param['idarchivocargadoestado'], $param['idestadotipos'], $param['acedescripcion'], $param['idusuario'], $param['acefechaingreso'], $param['acefechafin'], $param['idarchivocargado']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return archivocargadoestado
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idarchivocargadoestado']) ){
            $obj = new archivocargadoestado();
            $obj->setear($param['idarchivocargadoestado'], null, null, null,null,null,null,null);
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
      
        if (isset($param['idarchivocargadoestado']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        echo "acaaa parametros";
        //echo print_r($param);

        $resp = false;
        $param['idarchivocargadoestado'] =null;
        
        $elObjtarchivocargadoestado = $this->cargarObjeto($param);
     //        verEstructura($elObjtarchivocargadoestado);
        if ($elObjtarchivocargadoestado!=null and $elObjtarchivocargadoestado->insertar()){
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
      //  echo print_r($param);
        if ($this->seteadosCamposClaves($param)){
            echo "entraaaaa";
            $elObjtarchivocargadoestado = $this->cargarObjetoConClave($param);
            if ($elObjtarchivocargadoestado!=null and $elObjtarchivocargadoestado->eliminar()){
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
            
            $elObjtarchivocargadoestado = $this->cargarObjeto($param);
          
            if($elObjtarchivocargadoestado!=null and $elObjtarchivocargadoestado->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

    public function modificacion_estado($param){
        //echo "Estoy en modificacion";
      //  echo print_r($param);
        $resp = false;
        
        if ($this->seteadosCamposClaves($param)){
           // echo "setea campos claveeee";
          $elObjtarchivocargado = $this->cargarObjeto($param);
          //echo print_r($elObjtarchivocargado);
            if($elObjtarchivocargado!=null and $elObjtarchivocargado->modificar_estado()){
                $resp = true;
            }
       }
        return $resp;
    }

    public function modificacion_fechafin($param){
        //echo "Estoy en modificacion";
      //  echo print_r($param);
        $resp = false;
        
        if ($this->seteadosCamposClaves($param)){
           // echo "setea campos claveeee";
          $elObjtarchivocargado = $this->cargarObjeto($param);
          //echo print_r($elObjtarchivocargado);
            if($elObjtarchivocargado!=null and $elObjtarchivocargado->modificar_fechafin()){
                $resp = true;
            }
       }
        return $resp;
    }
    
    public function modificacion_clave($param){
        echo "Estoy en modificacion";
      //  echo print_r($param);
        $resp = false;
        
        if ($this->seteadosCamposClaves($param)){
            echo "setea campos claveeee";
          $elObjtarchivocargado = $this->cargarObjeto($param);
          //echo print_r($elObjtarchivocargado);
            if($elObjtarchivocargado!=null and $elObjtarchivocargado->modificar_estado()){
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
    public function buscar2($param){
    
        $where = " true ";
        if ($param<>NULL){
          
            if  (isset($param['idarchivocargado']))
                $where.=" and idarchivocargado='".$param['idarchivocargado']."'";
           
        }
        $arreglo = archivocargadoestado::listar($where);  
        return $arreglo;
            
    }

    public function buscar($param){
    
        $where = " true ";
        if ($param<>NULL){
         // echo "no es nulo";
            if  (isset($param['idarchivocargado']))
                $where.=" and idarchivocargado ='".$param['idarchivocargado']."'";
           
        }
        $arreglo = archivocargadoestado::listar($where);  
        return $arreglo;
         
    }

    

} 
?>