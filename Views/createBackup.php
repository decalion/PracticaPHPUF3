<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $backup_file = $_SESSION['db']."_" . date("Ymd_His") . '.sql';
        $file=new File("Backups/".$_SESSION['db']."/".$backup_file);
        
        //Open File and Write date "r+" read+write
        $file->obrirFitxer("r+");
        
        
        
        //DORP DATABASE
        $stringdrop="DROP DATABASE ".$_SESSION['db'].";\n";
        $file->afegirContingutV1($stringdrop);
        
        //CREATE DATABASE
        $stringdb="CREATE DATABASE ".$_SESSION['db'].";\n";
        $file->afegirContingutV1($stringdb);
        
        //USE DATABASE
        $stringuse="USE ".$_SESSION['db'].";\n";
        $file->afegirContingutV1($stringuse);
        
        
        //CREATE TABLE
       $tableList=$facade->GenericDescribeTables();
       foreach($tableList as $table){
           
           $stringTables=$table['Create Table'];
           $stringTables.=";\n";
           
           $file->afegirContingutV1($stringTables);
           
       }
       
       //INSERTS
       
      /* $select=$facade->genericSelect();
       
       $i=0;
       $insert="INSERT INTO ";
       foreach($select as $camp){
       
       
       }
       
       */
     
        
        ?>
    </body>
</html>
