<?php
/**
 * DTO CLASS FOR ADMIN TABLE (Datata Tranfers Object)
 *
 * @author Ismael
 */
class Admin {
   
    
    private $user;
    private $pass;
    private $ip;
    
    function __construct($user, $pass, $ip) {
        $this->user = $user;
        $this->pass = $pass;
        $this->ip = $ip;
    }

    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function getIp() {
        return $this->ip;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setIp($ip) {
        $this->ip = $ip;
    }


    
    
}
