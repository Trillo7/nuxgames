<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author DWES
 */
class Conexion extends PDO {
    private $dbtype="mysql";
    private $host="localhost";
    private $dbname="alquiler_juegos";
    private $charset="utf8";
    private $user="dwes";
    private $pass="abc123.";
  
   // PDO("mysql:host=localhost;dbname=dwes;charset=utf8", "dwes", "abc123.");

    public function __construct() {
        parent:: __construct($this->dbtype.":host=".$this->host.";dbname=".$this->dbname.";charset=".$this->charset,$this->user,$this->pass);
    }
    
}
