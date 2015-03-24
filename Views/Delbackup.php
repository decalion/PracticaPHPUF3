<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $file = new File("Backups/" . $_SESSION['db'] . "/" . $_SESSION['del_file']);
            $file->eliminarFitxer();
            
            
             echo "<br><a href='index.php?id=".BACK."'><button>Volver</button></a>";
        ?>
    </body>
</html>
