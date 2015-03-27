<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" action="index.php">
            <?php
            foreach ($data as $valor) {

                echo"$valor[0] : <input type='text' name='$valor[0]'/> Type $valor[1]<br>";
            }
            echo "<input type='text'  name='ids'  value='114' hidden />";
            ?>
            <input type="submit" value="insertar" />
        </form>
        <?php
        echo "<a href='index.php?ids=" . BACK . "'><button>Volver</button></a>";
        ?>
    </body>
</html>
