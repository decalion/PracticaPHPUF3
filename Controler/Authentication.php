<?php

$check =false;
$error;


if($_POST['user']==NULL){
    
   
    
    $_SESSION['errors']=ERRORUSERNULL;
    $_GET['id']=ERRORSTARTVIEW;
   // header("Location:./index.php"); 
    include './index.php';
    


}else{
    
    $credencials=$facade->selectAdminsFromGenesisDB();
    $ipLists=$facade->selectIpsFromGenesisDB();
    
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $ip=$_POST['server'];
    
    
    //print_r($credentials);
  
    
    //Check if the credencials USER ,PASS AND SERVER are Correct
    foreach ($credencials as $identified){
        //print_r($identified);
        
        if($identified->getUser()===$user){
            
            if($identified->getPass()==$pass){
                
                 if($identified->getIp()===$ipLists[$ip]){
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
        
        $_SESSION['user']=$user;
        $_SESSION['pass']=$pass;
        $_SESSION['server']=$ipLists[$ip];
        include './Views/SelectDB.php';
        
    }else{
        
       
       $_SESSION['errors']=$error;
       $_GET['id']=ERRORSTARTVIEW;
       include './index.php';
       
      // header("Location:./index.php"); 
        
    }
    
    
    
}




?>