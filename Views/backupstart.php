<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "effjñaf´ñkfp´kfq";
        $dir=$facade->createGenericDirectori();
        $backup_file = $_SESSION['db']."_" . date("Ymd_His") . '.sql';
        $file=new File("Backups/".$_SESSION['db']."/".$backup_file);
        echo "<br>";
        $dir->obrirDirectori();
        echo "<br>";
       $dir->mostrarContingut();
        ?>
    </body>
</html>
