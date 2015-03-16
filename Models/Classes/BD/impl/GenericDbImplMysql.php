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

    public function select() {
        $query=$this->conection->query("SELECT * FROM ".$_SESSION['table']);
        
        $descripcion=$this->getDescribeField();
        $ncamp=count($descripcion);
        
        $result=array();
        
        array_push($result,$descripcion);
        
         while ($rst = $this->conection->result($query)) {
             $temp=array();
            for($i=0;$i<$ncamp;$i++){
                
                $temp[$i]=$rst[$descripcion[$i]];
               /* $rst[$descripcion[$i]];
                array_push($temp,$rst);*/
            }
            array_push($result, $temp);
            
           
        }
         return $result;
 
        
        
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
     * @return table Listde
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
    
    
    public function showCreateTables(){
        
        
        $tableList=$this->showTables();
        $n=count($tableList);
        $result = array();
        
        for($i=0;$i<$n;$i++){
            
            $query = $this->conection->query("SHOW CREATE TABLE ".$tableList[$i]);
            
           while ($rst = $this->conection->result($query)) {
           
                array_push($result, $rst);
             }
   
            
        }
        


        return $result;
        
        
        
    }

    public function close() {
        
        $this->conection->closeConection();
        
    }
    
    
    
    
    private function getDescribeField(){
       $query=$this->conection->query("DESCRIBE ".$_SESSION['table']);
        
        $result = array();
        while ($rst = $this->conection->result($query)) {
            $tbl=$rst['Field'];
            array_push($result, $tbl);
        }
        
        return $result;
    }

}
