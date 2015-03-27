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
        <?php //$camps=$facade->genericSelect(); print_r($camps); ?>
        <table border="2">
        <?php
      $camps=$facade->genericSelect();
      $i=0;
        foreach($camps as $camp){
            
            echo "<tr>";
            foreach($camp as $tbl){
                
                echo"<td>$tbl</td>";
            }
            if($i==0){
                echo"<td>Modifi</td>";
                echo"<td>Deleted</td>";
                
            }else{
                echo "<td><a href='index.php?ids=".BACK."'><button>Modificar</button></a></td>";
                echo "<td><a href='index.php?ids=".DELETECAMPS."&action=$i'><button>Borrar</button></a></td>";
            }
            echo"</tr>";
            $i++;
        }
         
        ?>
       </table>
        <?php
            echo "<td><a href='index.php?ids=".INSERTFCAMPSFORM."'><button>Insertar</button></a></td>";
            echo "<td><a href='index.php?ids=".BACK."'><button>Volver</button></a></td>";
        ?>
    </body>
</html>
