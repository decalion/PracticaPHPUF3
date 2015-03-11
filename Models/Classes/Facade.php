<?php
/**
 * Description of Facade
 *
 * @author Ismael
 */
class Facade {
    
    public function __construct() {
        
    }
    
    public  function selectServerFromGenesisDB(){
        $connection=new UConnection(HOST,USER,PASS,DATABASE);
        $db=new GenesisImplMysql($connection);
        $result=$db->selectServers();  
        $db->close();
        return $result;
    }
    
    
    public  function selectIpsFromGenesisDB(){
        $connection=new UConnection(HOST,USER,PASS,DATABASE);
        $db=new GenesisImplMysql($connection);
        $result=$db->SelectIPS();  
        $db->close();
        return $result;
        
    }
    
    
    public function selectAdminsFromGenesisDB(){
        $connection=new UConnection(HOST,USER,PASS,DATABASE);
        $db=new GenesisImplMysql($connection);
        $result=$db->SelectCredencials();
        $db->close();
        return $result;
        
    }
    
    public function genericShowDatabases(){
        $connection=new UConnection(HOST,USER,PASS,DATABASE);
        $db=new GenericDbImplMysql($connection);
        $result=$db->showDatabases();
        $db->close();
        return $result;
        
    }
    
    public function genericShowTables(){
        $connection=new UConnection($_SESSION['server'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['db']);
        $db=new GenericDbImplMysql($connection);
        $result=$db->showTables();
        $db->close();
        return $result;
        
    }
    
    public function genericSelect(){
        $connection=new UConnection($_SESSION['server'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['db']);
        $db=new GenericDbImplMysql($connection);
        $result=$db->select($sql);
        $db->close();
        return $result;
        
    }
    
    
}


?>