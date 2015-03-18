<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirm Resotore</title>
    </head>
    <body>
        <?php
       
        echo "Estas seguro de que deseas restaurar esta copia?";
        
        if($restore_file==null){
            
            echo"<br>No has selecionado ningun fichero";
        }else{

        $_SESSION['restore']=$restore_file;
        echo "<br><h3>$restore_file</h3>";
        echo "<a href='index.php?id=".RESTORE."'><button>Yes</button></a>";
        echo "<a href='index.php?id=".NORESTORE."'><button>No</button></a>";
        
        }
        ?>
    </body>
</html>
