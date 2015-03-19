<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" action="index.php">
            <h1>Lista de Copias de Seguridad </h1>
         <?php
            $dir = $facade->GenericDirectoriData();


            if (count($dir) == 0) {

                echo "No hay copias de Seguridad de esta Base de datos";
            } else {

                echo"<table border='2'>";
                echo"<tr>";
                echo"<td> File </td>";
                echo"<td> Restore </td>";
                echo"<td> Deleled</td>";
                echo"</tr>";
                foreach ($dir as $index => $data) {
                    echo"<tr>";
                    
                    echo"<td>$data</td>";
                    echo"<td><input type=\"button\" name=\"acceptar\" value=\"Restaurar\" onClick=location.href=\"./index.php?id=".CONFRESTOREBP."&action=$index\"></td>";
                    echo"<td><input type=\"button\" name=\"acceptar\" value=\"Deleted\" onClick=location.href=\"./index.php?id=".CONFDELBACKUP."&action=$index\"></td>";
                    //echo"<td> <a href='index.php?id=".BACK."'><button>volver</button></a> </td>";
                   // echo"<td> <a href='index.php?id=".CONFDELBACKUP."&action='$index'><button>Deleted Backup</button></a> </td>";
            
                    echo"</tr>";
                }
                
                
                echo"</table>";
            }
                
            ?>
            
        </form>
        
        
        <?php
        echo "<a href='index.php?id=".CREATEBACKUP."'><button>Create Backup</button></a>";
        echo "<a href='index.php?id=".BACK."'><button>volver</button></a>";
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
