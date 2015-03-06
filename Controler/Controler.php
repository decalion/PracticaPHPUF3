<?php

require_once './Models/Classes/Utils/GlobalConstant.php';
require_once './Models/Classes/Facade.php';

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
        
        default: include './Views/start.php'; break;
    }
    
    
    
    
}else{
    
 $list=Facade::selectServerFromGenesisDB();
  include './Views/start.php';
}




?>
