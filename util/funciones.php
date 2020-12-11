<?php 

function data_submitted() {
    $_AAux= array();
    if (!empty($_POST))
        $_AAux =$_POST;
        else
            if(!empty($_GET)) {
                $_AAux =$_GET;
            }
        if (count($_AAux)){
            foreach ($_AAux as $indice => $valor) {
                if ($valor=="")
                    $_AAux[$indice] = 'null' ;
            }
        }
        return $_AAux;
        
}
function verEstructura($e){
    echo "<pre>";
    print_r($e);
    echo "</pre>"; 
}

function __autoload($class_name){
    //echo "class ".$class_name ;
    //echo "entraa";
    $directorys = array(
        $GLOBALS['ROOT'].'util/',
        $GLOBALS['ROOT'].'Modelo/',  
        $GLOBALS['ROOT'].'Modelo/conector/',
        $GLOBALS['ROOT'].'Control/',
        $GLOBALS['ROOT'].'Vista/',
        $GLOBALS['ROOT'].'Vista/js/',
        $GLOBALS['ROOT'].'Vista/js/bootstrap/',
        $GLOBALS['ROOT'].'Vista/js/4.5.2/',
      //  $GLOBALSS['ROOT'].'util/class/',
        
    );
    //echo print_r ($directorys);
    //print_object($directorys) ;
    foreach($directorys as $directory){
        if(file_exists($directory.$class_name . '.php')){
           //  echo "se incluyo".$directory.$class_name . '.php';
            require_once($directory.$class_name . '.php');
            return;
        }
    }
}

?>