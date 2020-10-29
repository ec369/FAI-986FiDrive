<?php
include_once "../Modelo/usuario.php";
class abmusuario{
    //Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coincpatenteen con los nombres de las variables instancias del objeto
     * @param array $param
     * @return estadotipos
     */

    public function buscar($param){
    
   
        
        $arreglo=usuario::listar2();  
        return $arreglo;
            
            
      
        
    }
    
} 
?>