<?php
session_start();
require_once 'Objetos/Juego.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <?php
        include 'includes/header.php';
    ?>
    <body>
        <div class="container">
            <?php
            if(!isset($_SESSION['loginuser'])){
                header('Location: ./index.php');
            }   
            if(isset($_POST['devolver'])){
                $juegost=Juego::recuperarProductos();
                foreach($juegost as $juego){
                    if($juego->Codigo==$_POST['idjuego']){
                        $juego->devolver($_SESSION['loginuser']);
                    }
                }
            }
                try{
                    $juegos=Juego::juegosAlquilados($_SESSION['loginuser']);                        
                    
                    ?>
                    <div id="encabezado">
                        <?php
                            if(!isset($_SESSION['loginuser'])){ 
                        ?>
                            <form action="login.php" METHOD="POST" >
                                <div class="row shadow pt-3 mb-3 bg-white rounded" >
                                    <div class="form-group col-5">
                                        <input type="text" class="form-control" name="usuario" placeholder="Introduce tu DNI">
                                    </div>
                                    <div class="form-group col-3">
                                        <input type="password" class="form-control" name="contra" placeholder="Introduce tu contraseña">
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" name="gosesion" class="btn btn-primary">Iniciar sesión</button>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-dark">Regístrate</button>
                                    </div>
                                </div>
                            </form>
                        <?php
                        }else{
                            require_once 'includes/menu.php';
                        }
                        ?>

                    </div>
                        <div class="" id="juegos">
                            <div class="row">
                        <?php
                        try{
                        if($juegos!=null){

                            foreach($juegos as $juego){

                                
                                    ?>
                                    
                                    <div class='shadow p-3 mb-5 bg-white rounded'>
                                        <form method='POST' action="factura.php">
                                            <div class='row'>
                                                <div class="col-3">
                                                    <?php
                                                        echo "<input type='hidden' name='idjuego' value='".$juego->Codigo."'>";
                                                        if($juego->Alquilado=="SI"){
                                                            echo "<img src='".$juego->Imagen."' style='filter: grayscale(100%);' class='img-fluid'>";
                                                        }else{
                                                            echo "<img src='".$juego->Imagen."' class='img-fluid'>";
                                                        }
                                                    ?>
                                                </div>
                                                <div id='infojuego' class='col-9'>
                                                    <div class="row bg-light shadow-sm pb-2 mr-1">
                                                        <div class="col-12">
                                                            <small>Juego</small><br>
                                                            <?php echo $juego->Nombre_juego; ?>
                                                        </div>
                                                        <div class="col-12">
                                                            <small>Plataforma</small><br>
                                                            <?php echo $juego->Nombre_consola; ?>
                                                        </div>
                                                        <div class="col-12">
                                                            <small>Año de lanzamiento</small><br>
                                                            <?php echo $juego->Anno; ?>
                                                        </div>
                                                        <div class="col-12">
                                                            <small>Precio</small><br>
                                                            <?php echo $juego->Precio; ?>
                                                        </div>
                                                        <div class="col-12">
                                                            <input type='submit' class="btn btn-warning" name='devolver' value='Devolver'>
                                                            <a href="index.php" class="btn btn-info">Atrás</a>
                                                        </div>

                                                    </div>
                                                 </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                
                               
                            }  
                        }else{
                            echo "No tienes ningún juego alquilado";
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

