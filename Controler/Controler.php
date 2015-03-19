<?php

require_once './Models/Classes/Utils/GlobalConstant.php';
require_once './Models/Classes/Facade.php';
require_once './Models/Classes/BD/AbstractBD.php';
require_once './Models/Classes/BD/IGenericDb.php';
require_once './Models/Classes/BD/IGenesis.php';
require_once './Models/Classes/BD/impl/GenericDbImplMysql.php';
require_once './Models/Classes/BD/impl/GenesisImplMysql.php';
require_once './Models/Classes/Utils/UConnection.php';
require_once './Models/Classes/BD/DTO/Admin.php';
require_once './Models/Classes/Files/Directoris.php';
require_once './Models/Classes/Files/File.php';



//Check if session start
if(!isset($_SESSION['test'])){
    session_start();
    $_SESSION['test']="test";
}

$facade=new Facade();


if (isset($_GET['id'])) {

    $getid = $_GET['id'];

    switch ($getid) {
        
        case CONFRESTOREBP:
            
            $restore_file=$_GET['action'];
            
            include './Views/ConfirmRestore.php';
            break;

        case ERRORSTARTVIEW:
            include './Views/start.php';
            break;
        
        case SELECTDATABASE:
            $position = $_GET['action'];
            $dblist = $facade->genericShowDatabases();
            $_SESSION['db'] = $dblist[$position];
            include'./Views/SelectTable.php';
            break;
        
        case SELECTABLE:
            $p = $_GET['action'];
            $tbl = $facade->genericShowTables();
            $_SESSION['table'] = $tbl[$p];
            include './Views/SelectCamps.php';
            break;
        
        case BACKUPSVIEW:
            $position = $_GET['action'];
            $dblist = $facade->genericShowDatabases();
            $_SESSION['db'] = $dblist[$position];
            include './Views/backupstart.php';
            break;
        
        case CREATEBACKUP:
            include './Views/createBackup.php';
            break;
        
        case RESTORE:
            include './Views/Restore.php';
            break;
        
        case NORESTORE:
            include './Views/SelectDB.php';
            break;
        
        case BACK:
            include './Views/SelectDB.php';
            break;
        
    }
    
}
else if(isset($_POST['id'])){
    
    $id=$_POST['id'];
    
    switch($id){
        
        case AUTHENTICATION:   
            include './Controler/Authentication.php';
            break;

        
        default: include './Views/start.php'; break;
    }
   
}else{
  include './Views/start.php';
}




?>
