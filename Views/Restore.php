<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $file = new File("Backups/" . $_SESSION['db'] . "/" . $_SESSION['restore']);

        //Open File and Write date "r+" read+write
        $file->obrirFitxer("r");
        
       // $file->mostrarLinies();
       
       $sql= $file->getScript();
       echo $sql;
       $result=$facade->restoreBackup($sql);
       
       
       if($result){
           echo" Correcto";
           
       }else{
           echo"incorrecto";
       }
       
       
       

        ?>
    </body>
</html>
