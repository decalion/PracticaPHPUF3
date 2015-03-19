<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $backup_file = $_SESSION['db'] . "_" . date("Ymd_His") . '.sql';
        $file = new File("Backups/" . $_SESSION['db'] . "/" . $backup_file);

        //Open File and Write date "r+" read+write
        $file->obrirFitxer("r+");



        //DORP DATABASE
        $stringdrop = "DROP DATABASE " . $_SESSION['db'] . ";\n";
        $file->afegirContingutV1($stringdrop);

        //CREATE DATABASE
        $stringdb = "CREATE DATABASE " . $_SESSION['db'] . ";\n";
        $file->afegirContingutV1($stringdb);

        //USE DATABASE
        $stringuse = "USE " . $_SESSION['db'] . ";\n";
        $file->afegirContingutV1($stringuse);


        //CREATE TABLE
        $tableList = $facade->GenericDescribeTables();
        foreach ($tableList as $table) {

            $stringTables = $table['Create Table'];
            $stringTables.=";\n";

            $file->afegirContingutV1($stringTables);
        }

        //INSERTS


        $table = $facade->genericShowTables();


        $ntables = count($table);

        for ($l = 0; $l < $ntables; $l++) {
            $select = $facade->genericSelectTableData($table[$l]);
            $i = 0;
            $insert = "INSERT INTO ". $table[$l]." (";
            $nt = count($select[0]);
            foreach ($select[0] as $camp) {
                $i++;

                if ($i == $nt) {

                    $insert.="$camp)";
                } else {
                    $insert.="$camp,";
                }
            }

            $insert.=" VALUES(";

            $j = 0;
            foreach ($select as $camp) {
                $i = 0;
                $nt = count($camp);
                $temp = $insert;

                if ($j != 0) {

                    foreach ($camp as $valor) {
                        $i++;
                        if ($i == $nt) {

                            $temp.="'$valor');\n";
                        } else {
                            $temp.="'$valor',";
                        }
                    }
                    //echo "<br>" . $temp;
                    $file->afegirContingutV1($temp);
                }

                $j++;
            }
        }
        echo "<br><a href='index.php?id=".BACK."'><button>volver</button></a>";

        //echo $insert;
        ?>
    </body>
</html>
