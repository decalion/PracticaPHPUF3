<?php

/**
 * Description of AbstractBD
 *
 * @author Ismael
 */
abstract class AbstractBD {

    
    protected $conection;
    
    public function __construct() {
        
    }
    
    
    
    public abstract function add();
    public abstract function select();
    public abstract function deleted();
    
    
    
    
}
