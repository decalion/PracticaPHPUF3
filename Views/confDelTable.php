<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo"Seguro que desea Borrar la Tabla ".$_SESSION['deltable']." ? <br>";
            
            echo "<a href='index.php?id=".DELETEDTABLE."'><button>Yes</button></a>";
            echo "<a href='index.php?id=".BACK."'><button>No</button></a>";
        ?>
    </body>
</html>
