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
class Juego {
    private $Codigo;
    private $Nombre_juego;
    private $Nombre_consola;
    private $Anno;
    private $Precio;
    private $Alquilado;
    private $Imagen;
    
    function __construct($Codigo, $Nombre_juego, $Nombre_consola, $Anno, $Precio, $Alquilado, $Imagen) {
        $this->Codigo = $Codigo;
        $this->Nombre_juego = $Nombre_juego;
        $this->Nombre_consola = $Nombre_consola;
        $this->Anno = $Anno;
        $this->Precio = $Precio;
        $this->Alquilado = $Alquilado;
        $this->Imagen = $Imagen;
    }
    
    //Metodos 
    public function __get($name)    {        
        return  $this->$name;
    }
    public function __set($name, $value)    {        
        $this->$name = $value;    
    }

    public static function recuperarProductos(){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                $consulta=$conex->query("SELECT * FROM juegos");
                while($registro=$consulta->fetch(PDO::FETCH_OBJ)){
                    $p=new self($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alquilado, $registro->Imagen);
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
    
    public function alquilar($DNI){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                
                $fechaac=date('Y-m-d');
                $consulta=$conex->query("UPDATE juegos SET Alquilado='SI' WHERE Codigo='$this->Codigo'");
                $consulta=$conex->query("INSERT INTO alquiler VALUES ('$this->Codigo','$DNI','$fechaac',null)");

            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }
    
    public function devolver($DNI){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                
                $fechaac=date('Y-m-d');
                $consulta=$conex->query("UPDATE juegos SET Alquilado='NO' WHERE Codigo='$this->Codigo'");
                $consulta=$conex->query("UPDATE alquiler SET Fecha_devol='$fechaac' WHERE Cod_juego='$this->Codigo' AND DNI_Cliente='$DNI'");

            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }
    
    public function editar($Nombre_juego, $Nombre_consola, $Anno, $Precio){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                
                $fechaac=date('Y-m-d');
                $consulta=$conex->query("UPDATE juegos SET Nombre_juego='$Nombre_juego', Nombre_consola='$Nombre_consola', Anno='$Anno', Precio='$Precio' WHERE Codigo='$this->Codigo'");

            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }
    public static function addjuego($Codigo, $Nombre_juego, $Nombre_consola, $Anno, $Precio,$Ruta){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                
                $fechaac=date('Y-m-d');
                $consulta=$conex->query("INSERT INTO juegos VALUES ('$Codigo', '$Nombre_juego', '$Nombre_consola', '$Anno', '$Precio','NO','$Ruta')");

            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }
    
    public function borrar(){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                $consulta=$conex->query("DELETE FROM juegos WHERE Codigo='$this->Codigo'");
            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        }  
    }
    public static function juegosAlquilados($DNI){
        try{
            $conex=new Conexion();
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                $consulta=$conex->query("SELECT * FROM juegos, alquiler WHERE alquiler.DNI_cliente='$DNI' AND juegos.Alquilado='SI' AND juegos.Codigo=alquiler.Cod_juego");
                $productos=null;
                while($registro=$consulta->fetch(PDO::FETCH_OBJ)){
                    $p=new self($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alquilado, $registro->Imagen);
                    $productos[]=$p;
                }

                if($productos!=null){
                    return $productos;
                }else{
                    return false;
                }
            }catch (PDOException $p) {
                echo "Error ".$p->getMessage()."<br />";
            }  

        } catch (PDOException $p) {
            echo "Error ".$p->getMessage()."<br />";
        } 
    }
    
}
