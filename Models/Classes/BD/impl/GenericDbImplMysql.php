<?php

/**
 * Generic CRUD For ALL Databases
 *
 * @author Ismael
 */
class GenericDbImplMysql extends AbstractBD implements IGenericDb {

    public function add($sql) {

        $this->conection->query($sql);
    }

    public function deleted($sql) {
        
    }

    public function modify($sql) {
        
    }

    public function select() {
        $query = $this->conection->query("SELECT * FROM " . $_SESSION['table']);

        $descripcion = $this->getDescribeField($_SESSION['table']);
        $ncamp = count($descripcion);

        $result = array();

        array_push($result, $descripcion);

        while ($rst = $this->conection->result($query)) {
            $temp = array();
            for ($i = 0; $i < $ncamp; $i++) {

                $temp[$i] = $rst[$descripcion[$i]];
                /* $rst[$descripcion[$i]];
                  array_push($temp,$rst); */
            }
            array_push($result, $temp);
        }
        return $result;
    }

    public function selectTableData($data) {
        $query = $this->conection->query("SELECT * FROM " . $data);

        $descripcion = $this->getDescribeField($data);
        $ncamp = count($descripcion);

        $result = array();

        array_push($result, $descripcion);

        while ($rst = $this->conection->result($query)) {
            $temp = array();
            for ($i = 0; $i < $ncamp; $i++) {

                $temp[$i] = $rst[$descripcion[$i]];
                /* $rst[$descripcion[$i]];
                  array_push($temp,$rst); */
            }
            array_push($result, $temp);
        }
        return $result;
    }

    /**
     * Select all database
     * @return databaseList
     */
    public function showDatabases() {
        $query = $this->conection->query("show databases");
        $result = array();
        while ($rst = $this->conection->result($query)) {
            $db = $rst['Database'];
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
    public function showTables() {
        $query = $this->conection->query("show tables");
        $tblname = "Tables_in_" . $_SESSION['db'];
        $result = array();
        while ($rst = $this->conection->result($query)) {
            $tbl = $rst[$tblname];
            array_push($result, $tbl);
        }

        $this->conection->free($query);
        //$this->conection->closeConection();

        return $result;
    }

    public function showCreateTables() {


        $tableList = $this->showTables();
        $n = count($tableList);
        $result = array();

        for ($i = 0; $i < $n; $i++) {

            $query = $this->conection->query("SHOW CREATE TABLE " . $tableList[$i]);

            while ($rst = $this->conection->result($query)) {

                array_push($result, $rst);
            }
        }



        return $result;
    }

    public function close() {

        $this->conection->closeConection();
    }

    private function getDescribeField($table) {
        $query = $this->conection->query("DESCRIBE " . $table);

        $result = array();
        while ($rst = $this->conection->result($query)) {
            $tbl = $rst['Field'];
            array_push($result, $tbl);
        }

        return $result;
    }

    
    public function getTableDefinition($table){
        $query = $this->conection->query("DESCRIBE " . $table);
         $result = array();
         $tbl=array();
        while ($rst = $this->conection->result($query)) {
            $tbl[0] = $rst['Field'];
            $tbl[1] = $rst['Type'];
            array_push($result, $tbl);
        }
      return $result;
    }
    
    
    
    
    
    
    
    
    public function checkTable($table) {
        $this->conection->query('SELECT * FROM ' . $table);
        if ($this->conection->getErrorNum() == 0) {
            return true;
        }
        return false;
    }

    private function createTable($data) {
        $query = 'CREATE TABLE ' . $_SESSION['ctable'] . '(';
        for ($i = 0; $i < $_SESSION['fields']; $i++) {
            $query .= $data['name' . $i] . " " . $data['type' . $i] . '(' . $data['size' . $i] . ') ';
            if ($data['pKey'] == $i) {
                $query .= 'PRIMARY KEY ';
            }
            if (isset($data['notNull' . $i])) {
                $query .= 'NOT NULL ';
            }
            $query.= ', ';
        }
        $query = substr($query, 0, strlen($query) - 2);
        $query .= ')';
        return $query;
    }

    public function addTable($data) {

        $this->conection->query($this->createTable($data));
        if ($this->conection->getErrorNum() == 0) {
            return 0;
        }
        return 1;
    }

    public function createDatabase($db) {

        $query = "CREATE DATABASE IF NOT EXISTS $db;";

        $this->conection->query($query);
        if ($this->conection->getErrorNum() == 0) {
            return 0;
        }
        return 1;
    }

    public function dropDB($db) {

        $query = "DROP DATABASE $db";

        $this->conection->query($query);
        if ($this->conection->getErrorNum() == 0) {
            return 0;
        }
        return 1;
    }

    public function deleteTable($tbl) {

        $query = "DROP TABLE $tbl";

        $this->conection->query($query);
        if ($this->conection->getErrorNum() == 0) {
            return 0;
        }
        return 1;
    }

    
    
    
    public function deleteCampsTable($tableCamp,$nomTabla,$contenido){
      

      $this->conection->query("DELETE FROM $tableCamp WHERE $nomTabla=$contenido;");

  }
}
