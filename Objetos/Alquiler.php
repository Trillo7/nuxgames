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
class Alquiler {
    private $Cod_juego;
    private $DNI_cliente;
    private $Fecha_alguiler;
    private $Fecha_devol;
    
    function __construct($Cod_juego, $DNI_cliente, $Fecha_alguiler, $Fecha_devol) {
        $this->Cod_juego = $Cod_juego;
        $this->DNI_cliente = $DNI_cliente;
        $this->Fecha_alguiler=$Fecha_alguiler;
        $this->Fecha_devol=$Fecha_devol;
    }
    
    //Metodos 
    public function __get($name)    {        
        return  $this->$name;
    }
    public function __set($name, $value)    {        
        $this->$name = $value;    
    }

    public static function recuperarAlquileres(){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                $consulta=$conex->query("SELECT * FROM alquiler");
                while($registro=$consulta->fetch(PDO::FETCH_OBJ)){
                    $p=new self($registro->Cod_juego, $registro->DNI_cliente, $registro->Fecha_alguiler, $registro->Fecha_devol);
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
    
}
