<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $backup_file = $_SESSION['db']."_" . date("Ymd_His") . '.sql';
        $file=new File("Backups/".$_SESSION['db']."/".$backup_file);
        
        $string="CREATE DATABASE ".$_SESSION['db'].";";
        //Open File and Write date "r+" read+write
        $file->obrirFitxer("r+");
        $file->afegirContingutV1($string);
        ?>
    </body>
</html>
