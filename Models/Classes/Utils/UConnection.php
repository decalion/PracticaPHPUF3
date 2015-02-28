<?php

/**
 * Description of UConnection
 *
 * @author Ismael
 */
class UConnection {
      private $conection;


    function __construct($host, $user, $pass, $dataBase) {

        $this->conection = new mysqli($host, $user, $pass, $dataBase);


        if ($this->conection->connect_errno) {

            echo "Connexió fallida: " . $this->conection->connect_error;
            exit();
        }
    }


    function closeConection() {
        $this->conection->close();
    }
    

    function alliberarMemoria($consulta){
        $consulta->free();
    }


    function consultar($sentenciSql) {
        return $this->conection->query($sentenciSql);
    }


    function obtenirRegistres($consulta) {
        return $consulta->fetch_array(MYSQLI_ASSOC);
    }

}
