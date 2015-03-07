<?php
/**
 * Description of GenesisImplMysql
 *
 * @author Ismael
 */
class GenesisImplMysql extends AbstractBD implements IGenesis{
    
    
    public function __construct(UConnection $connection) {
        parent::__construct($connection);
    }
    
    /**
     * Add new data
     * @param type $sql
     */
    public function add($sql) {
        $this->conection->query($sql);
        
    }

    /**
     * Delete Data
     * @param type $sql
     */
    public function deleted($sql) {
        $this->conection->query($sql);
    
    }

    /**
     * Modifi data
     * @param type $sql
     */
    public function modify($sql) {
        $this->conection->query($sql);
    }

    /**
     * Generic query
     * @param type $sql
     */
    public function select($sql) {
        //need impl
    }

    /**
     * return the credencial list usr,passw,ip
     */
    public function SelectCredencials() {
        
        $query = $this->conection->query("SELECT nuser,npass,ip FROM Admin");
        $result = array();
         while ($rst = $this->conection->result($query)) {

            $temp=null;
            $user = $rst["nuser"];  
            $pass = $rst["npass"]; 
            $ip = $rst["ip"]; 
            $temp=new Admin($user, $pass, $ip);
            
            array_push($result, $temp);
        }
        
        $this->conection->free($query);
        return $result;

        
    }

    /**
     * return the server list
     */
    public function selectServers() {
        
       $query = $this->conection->query("SELECT nameserver FROM Servidor");
        $result = array();
        while ($rst = $this->conection->result($query)) {

            $name = $rst["nameserver"];  
            array_push($result, $name);
        }

        $this->conection->free($query);
        //$this->conection->closeConection();
        return $result;
    }
    
    
    
    /**
     * 
     * @return ip list
     */
    public function SelectIPS() {
        $query = $this->conection->query("SELECT ip FROM Servidor");
        $result = array();
        while ($rst = $this->conection->result($query)) {

            $ip=$rst["ip"];  
            array_push($result, $ip);
        }

        $this->conection->free($query);
        //$this->conection->closeConection();

        return $result;        
    }
    

}
?>