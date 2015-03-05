<?php

require './Models/Classes/Utils/GlobalConstant.php';
require './Models/Classes/Facade.php';
require './Models/Classes/Utils/Errors.php';


if(isset($_GET['id'])){
    
    $getid=$_GET['id'];
    $error=$_GET['errors'];
    
    switch ($getid){
        
        case STARTVIEW: include './Views/start.php';;
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
