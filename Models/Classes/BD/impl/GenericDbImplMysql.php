<?php
/**
 * Generic CRUD For ALL Databases
 *
 * @author Ismael
 */
class GenericDbImplMysql extends AbstractBD implements IGenericDb {
    
    public function add($sql) {
        
    }

    public function deleted($sql) {
        
    }

    public function modify($sql) {
        
    }

    public function select($sql) {
        
    }
    
    
        /**
     * Select all database
     * @return databaseList
     */
    public function showDatabases(){
         $query = $this->conection->query("show databases");
        $result = array();
        while ($rst = $this->conection->result($query)) {
            $db=$rst['Database'];
            array_push($result, $db);
        }

        $this->conection->free($query);
        //$this->conection->closeConection();

        return $result;
        
    }

    
    /**
     * Show Tables For all DataBses
     * @return table List
     */
    public function showTables(){
        $query = $this->conection->query("show tables");
        $tblname="Tables_in_".$_SESSION['db'];
        $result = array();
        while ($rst = $this->conection->result($query)) {
            $tbl=$rst[$tblname];
            array_push($result, $tbl);
        }

        $this->conection->free($query);
        //$this->conection->closeConection();

        return $result;
        
        
        
    }

}
