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
        <form method="POST" >
            <h1>Lista de Copias de Seguridad </h1>
         <?php
            $dir = $facade->GenericDirectoriData();


            if (count($dir) == 0) {

                echo "No hay copias de Seguridad de esta Base de datos";
            } else {

                echo"<select size='5'>";
                foreach ($dir as $index => $data) {

                    echo"<option value='$index'>$data</option>";
                }

                echo"</select>";
            }
            ?>
            
        </form>
        
        
        <?php
        echo "<br><a href='index.php?id=".CREATEBACKUP."'><button>Create Backup</button></a>";
       /* echo "effjñaf´ñkfp´kfq";
        $dir=$facade->createGenericDirectori();
        $backup_file = $_SESSION['db']."_" . date("Ymd_His") . '.sql';
        $file=new File("Backups/".$_SESSION['db']."/".$backup_file);
        echo "<br>";
        $dir->obrirDirectori();
        echo "<br>";
       $dir->mostrarContingut();*/
        ?>
    </body>
</html>
