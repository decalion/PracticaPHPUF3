<?php
/**
 * 
 *
 * @author Ismael
 */
class File {
    private $fitxer; //atribut amb el nom (ruta) del fitxer
    private $fitxerObert; //atribut que li assignem el $fitxer obert
    
    //Mètode que ens construeix un fitxer

    function __construct($rutaFitxer) {		
		//Assignem el nom al fitxer i el creem.
        $this->setFitxer($rutaFitxer);         
        //Assignem un valor null al fitxer obert
        $this->fitxerObert=null;
    }
    
    //Obrim fitxer per lectura, escriptura eliminant el contingut del fitxer o 
    //escriptura mantenint el contingut del fitxer, segons el modificador passat
    // els posibles modificadors els trobareu a http://php.net/manual/es/function.fopen.php
    function obrirFitxer($modificador){
        //Obrim fitxer per lectura. Si no es pot retornarà error
        $this->fitxerObert = fopen($this->fitxer, $modificador) or die("El fitxer no s'ha obert.");
    }    
    
    //retornem el fitxer
    function getFitxer() {
        return $this->fitxer;
    }

    //Modifiquem el fitxer
    function setFitxer($rutaFitxer) {
        $this->fitxer = $rutaFitxer; //assignació valor a l'atribut
        
        if (!file_exists($this->fitxer)) { //Si el fitxer no existeix...
			//la funció touch comprova si existeix un fitxer. Si no existeix el crea.
			//Per poder crear-lo, el directori on s'ha de guardar el fitxer ha d'existir.
			//Creem el fitxer. Si no es pot crear per qualsevol problema, avisem i sortim del sistema.
			touch($this->fitxer)or die("El fitxer no s'ha creat."); 
			echo "<p>El fitxer s'ha creat amb exit</p>";
        } else { //Si el fitxer existeix...
            echo "<p>El fitxer ja existeix</p>";
        }
    }

    //Mètode que tanca el fitxer obert.
    function tancarFitxer() {
        fclose($this->fitxerObert);
    }

    //Mètode que mostra les propietats del fitxer assignat a l'atribut
    function mostrarPropietats() {
        if (!file_exists($this->fitxer)) {
            echo "<p>$this->fitxer no exiteix</p>";
            return;
        }
        echo "<p>$this->fitxer " . (is_file($this->fitxer) ? "" : "no ") . "és un fitxer.</p>";
        echo "<p>$this->fitxer " . (is_dir($this->fitxer) ? "" : "no ") . "és un directori.</p>";
        echo "<p>$this->fitxer " . (is_readable($this->fitxer) ? "" : "no ") . "és de lectura</p>";
        echo "<p>$this->fitxer " . (is_writable($this->fitxer) ? "" : "no ") . "és d'escriptura</p>";
        echo "<p>$this->fitxer " . (is_executable($this->fitxer) ? "" : "no ") . "és executable</p>";
        echo "<p>$this->fitxer té una grandària de " . (filesize($this->fitxer)) . " bytes</p>";
        echo "<p>L'últim accés a $this->fitxer ha estat el " . date("D d M Y g:i A", fileatime($this->fitxer)) . "</p>";
        echo "<p>L'última modificació del contingut de $this->fitxer ha estat el " . date("D d M Y g:i A", filemtime($this->fitxer)) . "</p>";
        echo "<p>L'últim canvi en els permisos de $this->fitxer ha estat el " . date("D d M Y g:i A", filectime($this->fitxer)) . "</p>";
    }

    //Métode que llegeix línia per línia el contingut d'un fitxer i les mostra
    function mostrarLinies() {
        //Mentres no arrivem al final del fitxer obert
        while (!feof($this->fitxerObert)) {
            //Llegim línia per línia el fitxer fins arribar al final o si hem llegit 1024 bytes
            $linia = fgets($this->fitxerObert, 1024);
            //Mostrem linia llegida
            echo $linia . "<br/>";
        }
    }

    //Métode que llegeix la meitad del contingut del fitxer i els mostra
    function mostrarMeitadContingut() {
        //Obtenim grandària fitxer
        $grandariaFitxer = filesize($this->fitxer);
        //Obtenim la meitad de la grandària del fitxer
        $meitadGrandaria = $grandariaFitxer / 2;
        echo "<p>La meitad del fitxer es troba en la posició " . $meitadGrandaria . "<p/>";
        //En situem en la posició de la meitad del fitxer
        fseek($this->fitxerObert, $meitadGrandaria);
        //LLegim la meitad del fitxer
        $lectura = fread($this->fitxerObert, ($grandariaFitxer - $meitadGrandaria));
        //Mostrem la meitad del fitxer llegida
        echo "<p>" . $lectura . "</p>";
    }

    //Métode que llegeix el contingut del fitxer caràcter a caràcter i els mostra
    function mostrarCaracters() {
        //Mostrem els caràcter del fitxer
        while (!feof($this->fitxerObert)) { //mentres no final fitxer...
            //Lectura del caràcter actual del fitxer i desplaçament al següent caràcter
            $caracter = fgetc($this->fitxerObert);
            //Mostrem caracter actual
            echo $caracter . "<br/>";
        }
    }

    //Mètode que obre, llegeix tot el contingut del fitxer i el tanca
    function obtenirContingut() {
        //Llegim i guardem el contingut del fitxer en una cadena
        $contingut = file_get_contents($this->fitxer);
        //Retornem contingut
        return $contingut;
    }

    //Mètode per afegirContingut a un fitxer
    function afegirContingutV1($nouContingut) {
        //afegim el contingut al final del fitxer, és a dir, a continuació del caràcter finaldel fitxer.
        fwrite($this->fitxerObert,$nouContingut);
    }
    
    //Mètode que obre el fitxer, elimina tot el seu contingut, afegeix el nou contingut i tanca el fitxer
    function sobreescriureContingut($nouContingut){
        file_put_contents ($this->fitxer, $nouContingut);
    }
    
    //Mètode que obre el fitxer, afegeix el nou contingut al final del contingut ja existent i tanca el fitxer
    function afegirContingutV2($nouContingut){
        file_put_contents ($this->fitxer, $nouContingut, FILE_APPEND);
    }
    
    //Mètode per eliminar un fitxer
    function eliminarFitxer(){
        unlink($this->fitxer)or die("<p>El fitxer $this->fitxer no s'ha pogut eliminar</p>");
    }
    
    //Descarregar Fitxer d'un servidor
    function descarregarFitxer(){
        
        if (is_file($this->fitxer)) { //Si el fitxer existeix i és un fitxer...
            
            /*Capçaleres obligatories*/
            
            //Comuniquem al navegador tipus MIME del fitxer
            header("Content-Type: application/force-download"); 
            //Suggerim al navegador que processi el fitxer com un document adjunt.
            //El mètode basename retorna l'últim component d'una ruta
            header("Content-Disposition: attachment; filename=" . basename($this->fitxer)); 
            
            /*Capçaleres opcionals*/
            
            //Comuniquem al navegador la codificació del fitxer
            header("Content-Transfer-Encoding: binary");
            //Comuniquem al navegador la grandària del fitxer
            header("Content-Length: " . filesize($this->fitxer));

            //Llegim el fitxer i l'escrivim en el buffer de sortida, perquè l'usuari
            //el pugui obrir o guardar.
            readfile($this->fitxer);
        } else {
            echo"<p>El fitxer no existeix</p>";
            exit();
        }
    }
    
}
