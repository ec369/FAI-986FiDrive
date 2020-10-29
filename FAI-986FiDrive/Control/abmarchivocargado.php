<?php
include_once "../Modelo/archivocargado.php";
class abmarchivocargado{
    //Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto
     * @param array $param
     * @return archivocargado
     */
    private function cargarObjeto($param){
        $obj = null;
       // echo "acaa parametros";
           //echo print_r($param);
        if( array_key_exists('idarchivocargado',$param)){
            $obj = new archivocargado();
     
          $param['aclinkacceso']="www.prueba.com";
          $param['accantidaddescargas']=3;
          $param['accantidadusada']=3;
          $param['acfechainiciocompartir']="1992-05-27";
          $param['acfechafincompartir']="1994-05-27";
            $obj->setear($param['idarchivocargado'], $param['acnombre'], $param['acdescripcion'],$param['acicono'],$param['idusuario'], $param['aclinkacceso'], $param['accantidaddescargas'], $param['accantidadusada'], $param['acfechainiciocompartir'],$param['acfechafincompartir'], $param['acprotegidoclave']);
           
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return archivocargado
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idarchivocargado']) ){
            $obj = new archivocargado();
            $obj->setear($param['idarchivocargado'], null, null, null,null,null,null,null,null,null,null);
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
      
        if (isset($param['idarchivocargado']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        // echo "<br>Parametros que entran a la alta<br>";
        // echo print_r($param);
        // echo "<br>";
        $param['idarchivocargado']=null;
        // echo "<br>Parametros que entran a la alta2<br>";
        // echo print_r($param);
        // echo "<br>";
        $elObjtarchivocargado = $this->cargarObjeto($param);
            //verEstructura($elObjtarchivocargado);
            //echo "Estructura cargada <br>";
            //echo print_r($elObjtarchivocargado);
            //echo "<br>";
        if ($elObjtarchivocargado!=null and $elObjtarchivocargado->insertar()){
           // echo print_r($elObjtarchivocargado);
           
            $resp = true;
        }
        return $resp;
        
    }

    
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
   // DELETE from archivocargado where idarchivocargado=116
    public function baja($param){
        $resp = false;
      //  echo print_r($param);
        if ($this->seteadosCamposClaves($param)){
            echo "entraaaaa";
            $elObjtarchivocargado = $this->cargarObjetoConClave($param);
            if ($elObjtarchivocargado!=null and $elObjtarchivocargado->eliminar()){
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
        echo "Estoy en modificacion";
        //echo print_r($param);
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            echo "setea campos clave";
          $elObjtarchivocargado = $this->cargarObjeto($param);
          //echo print_r($elObjtarchivocargado);
            if($elObjtarchivocargado!=null and $elObjtarchivocargado->modificar()){
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
         // echo "no es nulo";
            if  (isset($param['idarchivocargado']))
                $where.=" and idarchivocargado ='".$param['idarchivocargado']."'";
           
        }
        $arreglo = archivocargado::listar($where);  
        return $arreglo;
         
    }

    public function buscar2($param){
    
        $where = " true ";
        if ($param<>NULL){
       //   echo "no es nulo";
            if  (isset($param['acnombre']))
                $where.=" and acnombre ='".$param['acnombre']."'";
           
        }
        $arreglo = archivocargado::listar($where);  
        return $arreglo;
         
    }

}