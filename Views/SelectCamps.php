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
        foreach($camps as $camp){
            
            echo "<tr>";
            foreach($camp as $tbl){
                
                echo"<td>$tbl</td>";
            }
            echo"</tr>";
        }
         
        ?>
       </table>
    </body>
</html>
