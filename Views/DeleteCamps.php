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
        echo "<br>";
        
        $result=$facade->genericSelectTableData($_SESSION["table"]);
       
       $facade->deleteCamps();
       
       
       echo" Campo Eliminado Correctamente";
       echo "<br><a href='index.php?ids=".BACK."'><button>No</button></a>";
        
        
        
        
        ?>
    </body>
</html>
