<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Directoris
 *
 * @author decalion
 */
class Directoris {
    
    private $directori; //Ruta del directori
    private $dirObert; //Directori obert

	//Construim directori

    function __construct($rutaDirectori, $permisos) {

        if (!file_exists($rutaDirectori)) { //Si el directori no existeix
		//Creem directori. Els permisos només afecten al propietari
            mkdir($rutaDirectori, $permisos)or die("El directori no s'ha pogut crear.");
        }

		//Assignem ruta a l'atribut
        $this->directori = $rutaDirectori;
    }

	//Retornem ruta del directori
    function getDirectori() {
        return $this->directori;
    }

	//Modifiquem ruta del directori
    function setDirectori($ruta) {
        $this->directori = $ruta;
    }

	//Obrim directori
    function obrirDirectori() {
        $this->dirObert = opendir($this->directori) or die("El directori no s'ha obert.");
    }

	//Tanquem el directori
    function tancarDirectori() {
        closedir($this->dirObert);
    }

	//Mostrem contingut del directori
    function mostrarContingut() {
		//Mostrem contingut del directori
		//Mentres hi hagi contingut per llegir.
		//readir accedeix al contingut per ordre d'emmagatzematge del sistema de fitxers
        while (!(($contingut = readdir($this->dirObert)) === false)) {
		//Si és un directori
            if (is_dir("$contingut")) {
               // echo "(D) "; //Indiquem que és un directori
            }
			//Mostrem contingut actual
            echo $contingut . "<br/>";
        }
    }

	//Afegim un fitxer al directori
    function afegirContingut($contingut) {
		//Concatenem el fitxer al directori        
        if (!file_exists($this->directori . "/" . $contingut)) { //Si el fitxer no existeix...
			//la funció touch comprova si existeix un fitxer. Si no existeix el crea.
			//Per poder crear-lo, el directori on s'ha de guardar el fitxer ha d'existir.
			//Creem el fitxer. Si no es pot crear per qualsevol problema, avisem i sortim del sistema.
			touch($this->directori . "/" . $contingut)or die("El fitxer no s'ha creat."); 
			echo "<p>El fitxer s'ha creat amb exit</p>";
        } else { //Si el fitxer existeix...
            echo "<p>El fitxer ja existeix</p>";
        }
    }

	//Eliminar directori
    function eliminarDirectori($directori) {
        $dirObert = opendir($directori);
        while ($contingut = readdir($dirObert)) { //Mentre tingui contingut
            if ($contingut != "." && $contingut != "..") {
                if (is_dir($directori . "/" . $contingut)) { //Si és un directori...
                    //Tornem a crida a la funció. Recursivitat.
                    $this->eliminarDirectori($directori . "/" . $contingut);
                } else {//si no és un directori....
                    //Eliminem el fitxer
                    unlink($directori . "/" . $contingut);
                    echo $directori . "/" . $contingut . " Eliminat!<br/>";
                }
            }
        }
        closedir($dirObert);
        rmdir($directori);  //Eliminem el directori
        echo $directori . " Eliminat!<br/>";
    }
}
