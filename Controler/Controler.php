<?php

require './Models/Classes/Utils/GlobalConstant.php';
require './Models/Classes/Facade.php';


if(isset($_POST['id'])){
    
    
    
    
    
    
}else{
    
 $list=  Facade::selectServerFromGenesisDB();
  include './Views/start.php';
}




?>
