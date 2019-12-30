<?php
 require_once 'Conexion.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Juegos
 *
 * @author DWES
 */
class Cliente {
    private $DNI;
    private $Nombre;
    private $Apellidos;
    private $Direccion;
    private $Localidad;
    private $Clave;
    private $Tipo;
    
    function __construct($DNI,$Nombre,$Apellidos,$Direccion,$Localidad,$Clave,$Tipo) {
        $this->DNI = $DNI;
        $this->Nombre = $Nombre;
        $this->Apellidos=$Apellidos;
        $this->Direccion=$Direccion;
        $this->Localidad=$Localidad;
        $this->Clave=$Clave;
        $this->Tipo=$Tipo;
    }
    
    //Metodos 
    public function __get($name)    {        
        return  $this->$name;
    }
    public function __set($name, $value)    {        
        $this->$name = $value;    
    }

    public static function recuperarClientes(){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                $consulta=$conex->query("SELECT * FROM cliente");
                while($registro=$consulta->fetch(PDO::FETCH_OBJ)){
                    $p=new self($registro->DNI, $registro->Nombre, $registro->Apellidos, $registro->Direccion,$registro->Localidad,$registro->Clave,$registro->Tipo);
                    $productos[]=$p;
                }

                return $productos;
            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }
    
    public static function addCliente($Cliente){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                
                $fechaac=date('Y-m-d');
                $consulta=$conex->query("INSERT INTO cliente VALUES ('$Cliente->DNI', '$Cliente->Nombre', '$Cliente->Apellidos', '$Cliente->Direccion','$Cliente->Localidad','$Cliente->Clave','$Cliente->Tipo')");

            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }
    
}
