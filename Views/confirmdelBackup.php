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
              
       
       

        echo "Estas seguro de que deseas eliminar esta copia?";
        $dir = $facade->GenericDirectoriData();
        $_SESSION['del_file']=$dir[$del_file];
        echo "<br><h3>$dir[$del_file]</h3>";
        echo "<a href='index.php?ids=".DELBACKUP."'><button>Yes</button></a>";
        echo "<a href='index.php?ids=".BACK."'><button>No</button></a>";
  
        ?>
    </body>
</html>
