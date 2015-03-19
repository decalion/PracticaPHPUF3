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
              
       
       
        
        if($del_file==null){
            
            echo"<br>No has selecionado ningun fichero";
        }else{
             echo "Estas seguro de que deseas eliminar esta copia?";

        $_SESSION['restore']=$del_file;
        echo "<br><h3>$restore_file</h3>";
        echo "<a href='index.php?id=".RESTORE."'><button>Yes</button></a>";
        echo "<a href='index.php?id=".NORESTORE."'><button>No</button></a>";
        
        }
        ?>
    </body>
</html>
