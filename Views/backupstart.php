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

                echo "<input type='text' name='id' value=".RESTOREBACKUP." hidden/>";
                echo"<select size='5' name='backup'>";
                foreach ($dir as $index => $data) {

                    echo"<option value='$data'>$data</option>";
                }

                echo"</select>";
                
                echo "<br><input type='submit' value='Restore'/>";
            }
            ?>
            
        </form>
        
        
        <?php
        echo "<a href='index.php?id=".CREATEBACKUP."'><button>Create Backup</button></a>";
        echo "<a href='index.php?id=".DELETEDBACKUP."'><button>Create Backup</button></a>";
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
