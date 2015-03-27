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
        case CONFDROPDATABASE:
            
            $dbid=$_GET['action'];
            $dblist = $facade->genericShowDatabases();
            $_SESSION['dropdb'] = $dblist[$dbid];
            
            include './Views/confDropDB.php';
            
            break;
        
        case DROPDB:
            $result = $facade->dropDatabase($_SESSION['dropdb']);
            if ($result == 0) {
                $message = "Base de datos " . $_SESSION['dropdb'] . " Borrada Correctamente";
            } else {

                $message = "Error al Borrar la Base de datos";
            }

            include './Views/dropDatabase.php';
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
        
        
        case CONFDELETETABLE:
            $del=$_GET['action'];
            $tbl = $facade->genericShowTables();
            $_SESSION['deltable'] = $tbl[$del];
            include './Views/confDelTable.php';
            break;
        
        case DELETEDTABLE:
          $result = $facade->dropTable($_SESSION['deltable']);
            if ($result == 0) {
                $message = "Tabla " . $_SESSION['deltable'] . " Borrada Correctamente";
            } else {

                $message = "Error al Borrar la Tabla ".$_SESSION['deltable']."";
            }

            include './Views/deleteTable.php';
            break;
        case BACKUPSVIEW:
            $position = $_GET['action'];
            $dblist = $facade->genericShowDatabases();
            $_SESSION['db'] = $dblist[$position];
            include './Views/backupstart.php';
            break;
        
        case CREATETABLE:
            include './Views/CreateTable.php';
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
        case CONFDELBACKUP:
            $del_file=$_GET['action'];
            include './Views/confirmdelBackup.php';
            break;
        case DELBACKUP:
            include './Views/Delbackup.php';
            break;
        
        
        case INSERTFCAMPSFORM:
            
            $data=$facade->insertForm($_SESSION['table']);
            include './Views/insertCampsForm.php';
            break;
        
        
        case DELETECAMPS:

            $_SESSION["DECAMPO"] = $_GET["action"];

            include './Views/ConfirmDeleteCamps.php';
            break;

        case DELETENO:

            include './Views/SelectCamps.php';

            break;

        case DELETESI:

            include './Views/DeleteCamps.php';

            break;
        
    }
    
}
else if(isset($_POST['id'])){
    
    $id=$_POST['id'];
    
    switch($id){
        
        case AUTHENTICATION:   
            include './Controler/Authentication.php';
            break;
        
        case CREATEDATABASE:
            if (isset($_POST['cdb']) && ($_POST['cdb'] != null)) {

                $db = $_POST['cdb'];
                //echo $db;

                $testcon = new mysqli($_SESSION['server'], $_SESSION['user'], $_SESSION['pass'], $db);


                if ($testcon->connect_errno) {
                    $result = $facade->createDatabase($db);

                    if ($result == 0) {
                        $message = "Base de datos " . $_POST['cdb'] . " Creada Correctamente";
                    } else {

                        $message = "Error al Crear la Base de datos";
                    }
                } else {

                    $message = "La base de datos que intentas crear ya existe";
                }
            } else {


                $message = "Error campo en blanco";
            }

            include './Views/createDatabase.php';
            break;

        case ADDTABLE:
                if (isset($_POST['ctable']) && $_POST['ctable'] != null && $_SESSION['db'] != null){
                if ($facade->checkTable($_POST['ctable'])){
                    $message = "Error, la tabla ya existe";
                    include './Views/CreateTable.php';
                } else {
                    if (!isset($_POST['fields']) || $_POST['fields'] == null){
                        $message = "Error, debe introducir el numero de campos";
                        include './Views/CreateTable.php';
                    } else {
                       $_SESSION['ctable']=$_POST['ctable'];
                       $_SESSION['fields']=$_POST['fields'];
                        include './Views/addTable.php';
                    }
                }
            } else {
                $message = "Debe introducir un nombre para la tabla";
               include './Views/CreateTable.php';
            }
            break;
        case ADDFIELDS:
            $query = $facade->createTable($_POST);

            if ($query == 0){
                $message = "La tabla " . $_SESSION['ctable'] ." se ha creado correctamente";
                include './Views/finalTableCreated.php';
            } else {
                $message = "Error en la creación de la tabla: ";
                include './Views/addTable.php';
            }
            break;
            
         case BACK:
            include './Views/SelectDB.php';
            break;
        
        default: include './Views/start.php'; break;
    }
   
}else{
  include './Views/start.php';
}




?>
