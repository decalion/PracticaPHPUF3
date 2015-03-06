<?php

/**
 * Class to Connect to DataBase
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
    

    function free($consulta){
        $consulta->free();
    }


    function query($sentenciSql) {
        return $this->conection->query($sentenciSql);
    }


    function result($consulta) {
        return $consulta->fetch_array(MYSQLI_ASSOC);
    }

}
?>