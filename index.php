<?php
session_start();

require_once 'Objetos/Juego.php';

?>

<!DOCTYPE html PUBLIC>

<html lang="es">
    <?php
        include 'includes/header.php';
    ?>
    <body>
        <div class="container">
            <?php

                try{
                    $juegos=Juego::recuperarProductos();
                    
                    ?>
                    <div id="encabezado">
                        <?php
                        
                        if(!isset($_SESSION['loginuser'])){ 
                                include 'includes/caja_login.php';
                                $_SESSION['rango']="cliente"; // para warning de los botones editar, borrar al no haber iniciado sesion da error ya que no existe la sesion
                        }else{
                            require_once 'includes/menu.php';;
                        }
                        
                        ?>

                    </div>
                    <div id="juegos" style="padding-left:25px; padding-top:10px;" class="bg-light">
                        <div class="row">
                        <?php
                        try{
                        if($juegos!=null){
                            foreach($juegos as $juego){
                                if(isset($_GET['filtro'])){
                                    
                                    if($_GET['filtro']=="alquilados"){
                                        if($juego->Alquilado=="SI"){
                                            include 'includes/caja_juego.php';
                                        }
                                    }
                                    if($_GET['filtro']=="noalquilados"){
                                        if($juego->Alquilado=="NO"){
                                            include 'includes/caja_juego.php';
                                        }
                                    }
                                    
                                }else{
                                    //Mostramos todos los juegos
                                    include 'includes/caja_juego.php';
                                }
                            }  
                        }else{
                            echo "Ahora mismo no disponemos de ningún juego";
                        }
                        } catch (PDOException $p) {
                            echo "Error ".$p->getMessage()."<br />";
                        }
                } catch (PDOException $p) {
                        echo "Error ".$p->getMessage()."<br />";
                }

            ?>
                            </div>      
                    </div>
        </div>

    
    
    
</body>
</html>

