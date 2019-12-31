<?php

class Conexion extends PDO {
    private $dbtype="mysql";
    private $host="localhost";
    private $dbname="alquiler_juegos";
    private $charset="utf8";
    private $user="";
    private $pass="";
  
    public function __construct() {
        parent:: __construct($this->dbtype.":host=".$this->host.";dbname=".$this->dbname.";charset=".$this->charset,$this->user,$this->pass);
    }
    
}
