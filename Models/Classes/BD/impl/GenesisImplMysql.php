<?php
use AbstractBD;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenesisImplMysql
 *
 * @author Ismael
 */
class GenesisImplMysql extends AbstractBD implements IGenesis{
    
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
        
    }

    /**
     * return the server list
     */
    public function selectServers() {
        
    }

}
