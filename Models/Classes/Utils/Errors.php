<?php

/**
 * Description of GenericsErrors
 *
 * @author Ismael
 */
class Errors {
    
    
    private static $ERROR = array(
     "",
     "El usuario es Incorrecto",
     "La Contrasenya es Incorrecta",
     "Este usuario no tiene permisos para acceder a este server"       
    );
    
    private function __construct() {
        
    }
    
    
    
    public static function showErrors($id){
        if($id==null){
            $id=0;
        }
        
        //print_r(self::$ERROR);
        
        return self::$ERROR[$id];
    }
    
    
    
}
?>