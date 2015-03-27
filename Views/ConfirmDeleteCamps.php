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
       echo "¿Estas seguro de que quieres eliminar el campos de la tabla ".$_SESSION['table']."?";

        echo "<br>";
     
        echo "<td><a href='index.php?id=".DELETESI."'><button>Si</button></a></td>";
        echo "<td><a href='index.php?id=".DELETENO."'><button>No</button></a></td>";
        ?>
    </body>
</html>
