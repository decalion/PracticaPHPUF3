<?php

require_once './Models/Classes/Utils/GlobalConstant.php';
require_once './Models/Classes/Facade.php';
require_once './Models/Classes/BD/AbstractBD.php';
require_once './Models/Classes/BD/IGenericDb.php';
require_once './Models/Classes/BD/IGenesis.php';
require_once './Models/Classes/BD/impl/GenericDbImplMysql.php';
require_once './Models/Classes/BD/impl/GenesisImplMysql.php';
require_once './Models/Classes/Utils/UConnection.php';

if(!isset($_SESSION['test'])){
    session_start();
    $_SESSION['test']="test";
}


if(isset($_GET['id'])){
    
    $getid=$_GET['id'];
    
    switch ($getid){
        
        case STARTVIEW: 
            //$list=Facade::selectServerFromGenesisDB();
            include './Views/start.php';
            
            break;
    }
    
}
else if(isset($_POST['id'])){
    
    $id=$_POST['id'];
    
    switch($id){
        
        case AUTHENTICATION:   
            include './Controler/Authentication.php';
            break;
        case SELECTDB:
            $_SESSION['db']=$_POST['database'];
            include'./Views/SelectTable.php';
            break;
        
        default: include './Views/start.php'; break;
    }
    
    
    
    
}else{
    
 $list=Facade::selectServerFromGenesisDB();
  include './Views/start.php';
}




?>
