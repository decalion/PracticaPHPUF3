<?php

/**
 * Generic Abstract Class for make a CRUD
 *
 * @author Ismael
 */
abstract class AbstractBD {

    
    protected $conection;
    
    public function __construct(UConnection $connection) {
        $this->conection=$connection;
        
    }
    
    
    
    public abstract function add($sql);
    public abstract function select($sql);
    public abstract function deleted($sql);
    public abstract function modify($sql);
    public abstract function close();
    
    
    
    
}
?>