<?php
/**
 * Description of Facade
 *
 * @author Ismael
 */
class Facade {
    
    public static function selectServerFromGenesisDB(){
        $connection=new UConnection(HOST,USER,PASS,DATABASE);
        $db=new GenesisImplMysql($connection);
        return $db->selectServers();  
    }
    
    
    public static function selectIpsFromGenesisDB(){
        $connection=new UConnection(HOST,USER,PASS,DATABASE);
        $db=new GenesisImplMysql($connection);
        return $db->SelectIPS();  
        
    }
    
    
    public static function selectAdminsFromGenesisDB(){
        $connection=new UConnection(HOST,USER,PASS,DATABASE);
        $db=new GenesisImplMysql($connection);
        return $db->SelectCredencials();
        
    }
    
    public static function genericShowDatabases(){
        $connection=new UConnection(HOST,USER,PASS,DATABASE);
        $db=new GenericDbImplMysql($connection);
        return $db->showDatabases();
        
    }
    
    public static function genericShowTables(){
        $connection=new UConnection($_SESSION['server'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['db']);
        $db=new GenericDbImplMysql($connection);
        
        return $db->showTables();
        
    }
    
    
}


?>