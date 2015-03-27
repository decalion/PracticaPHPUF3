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
        echo "Estas Seguro de que deseas Borrar la base de datos ".$_SESSION['dropdb']." ?<br>";
        
        echo "<a href='index.php?id=".DROPDB."'><button>Yes</button></a>";
        echo "<a href='index.php?id=".BACK."'><button>No</button></a>";
        
        
        
        ?>
    </body>
</html>
