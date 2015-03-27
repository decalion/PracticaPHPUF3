<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $file = new File("Backups/" . $_SESSION['db'] . "/" . $_SESSION['restore']);

        //Open File and Write date "r+" read+write
        $file->obrirFitxer("r");

        // $file->mostrarLinies();

        $sql = $file->getScript();
        // echo $sql;


        $arrayResult = array();
        // echo"<br><br>";
        $delimitador = ";";
        $resultat = strtok($sql, $delimitador);
        $i=0;
        while (is_string($resultat)) {
            if ($resultat) {

               
                $resultat.=";";
                //trim($resultat);
                echo"$resultat<br>";
                $rst = $facade->restoreBackup($resultat,$i);

                if ($rst) {
                    array_push($arrayResult, "OK");
                } else {
                    array_push($arrayResult, "ERROR");
                }
            }
            $i++;
            $resultat = strtok($delimitador);
        }


        echo"<br><br>";

       // print_r($arrayResult);


        echo"<h3> BACKUP DONE! </h3>";
        echo "<br><a href='index.php?ids=".BACK."'><button>volver</button></a>";
        ?>
    </body>
</html>
