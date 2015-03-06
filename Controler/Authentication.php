<?php

$check =false;
$error;


if($_POST['user']==NULL){
    
   
    
    $_SESSION['errors']=ERRORUSERNULL;
    header("Location:./index.php"); 
    
   /*Con include da Error
   include './index.php';*/

}else{
    
    $credencials=Facade::selectAdminsFromGenesisDB();
    $ipLists=Facade::selectIpsFromGenesisDB();
    
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $ip=$_POST['server'];
    
    
    //print_r($credentials);
  
    
    //Check if the credencials USER ,PASS AND SERVER are Correct
    foreach ($credencials as $identified){
        //print_r($identified);
        
        if($identified[0]==$user){
            
            if($identified[1]==$pass){
                
                 if($identified[2]==$ipLists[$ip]){
                     $check=true;
                     
                 }else{
                     $error=ERRORPERMISION;
                 }
                
            }else{
                
                $error=ERRORPASS;
            }
            
           
        }else{
            $error=ERRORUSERNOTMATCH;
        }
        
     
    }
    
    
    //If all correct go to next page
    if($check){
        
        include './Views/SelectDB.php';
        
    }else{
        
       
       $_SESSION['errors']=$error;
       header("Location:./index.php"); 
        
    }
    
    
    
}




?>