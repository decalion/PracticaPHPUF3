<?php
/**
 * Description of Facade
 *
 * @author Ismael
 */
require './Models/Classes/BD/impl/GenesisImplMysql.php';
require './Models/Classes/Utils/UConnection.php';

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
}


?>