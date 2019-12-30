<?php
require_once 'Objetos/Juego.php';
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. productos.php -->
<html>
    <?php
        include 'includes/header.php';
    ?>
    <style>
        .infojuego{
            border: 3px solid lightgray;
            border-bottom: 0px;
        }
    </style>
    <body>
        <div class="container">

            <?php
            if(isset($_POST['alquilar'])){
                $_SESSION['juego']->alquilar($_SESSION['loginuser']);
                header('Location: ./misjuegos.php');
            }
                try{
                    $juegos=Juego::recuperarProductos();
                    
                    ?>
                    <div id="encabezado">
                        <?php
                        if(!isset($_SESSION['loginuser'])){ 
                                include 'includes/caja_login.php';
                        }else{
                            require_once 'includes/menu.php';;
                        }
                        
                        
                        ?>

                    </div>
                        <div id="juegos">
                            <div class="row">
                        <?php
                        try{
                        if($juegos!=null){

                            foreach($juegos as $juego){
                                if($juego->Codigo==$_POST["idjuego"]){
                                    ?>
                                    <div class='shadow p-3 mb-5 bg-white rounded'>
                                        <form method='POST'>
                                            <div class='row'>
                                                <div class="col-lg-3 col-xs-12">
                                                    <?php
                                                        $_SESSION['juego']=$juego;
                                                        if($juego->Alquilado=="SI"){
                                                            echo "<img src='".$juego->Imagen."' style='filter: grayscale(100%);' class='img-fluid'>";
                                                        }else{
                                                            echo "<img src='".$juego->Imagen."' class='img-fluid'>";
                                                        }
                                                    ?>
                                                    
                                                </div>
                                                <div id='infojuego' class='col-lg-9 col-xs-12'>
                                                    <div class="row bg-light shadow-sm pb-2 mr-1">
                                                        <input type="hidden" name="idjuego" value='<?php echo $juego->Codigo; ?>'>
                                                        <div class="col-12 infojuego">
                                                            <small>Juego</small><br>
                                                            <?php echo $juego->Nombre_juego; ?>
                                                        </div>
                                                        <div class="col-12 infojuego">
                                                            <small>Plataforma</small><br>
                                                            <?php echo $juego->Nombre_consola; ?>
                                                        </div>
                                                        <div class="col-12 infojuego">
                                                            <small>Año de lanzamiento</small><br>
                                                            <?php echo $juego->Anno; ?>
                                                        </div>
                                                        <div class="col-12 infojuego" style="border: 3px solid lightgray;">
                                                            <small>Precio</small><br>
                                                            <?php echo $juego->Precio; ?>
                                                        </div>
                                                        <div class="col-12 mt-2" >
                                                            <?php
                                                            if(isset($_SESSION['loginuser'])){
                                                               echo "<input type='submit' class='btn btn-success' name='alquilar' value='Alquilar'>";
                                                            }
                                                            ?>
                                                            <a href="index.php" class="btn btn-info">Atrás</a>
                                                        </div>

                                                    </div>
                                                 </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                }
                               
                            }  
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

