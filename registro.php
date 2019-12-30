<?php
require_once 'Objetos/Cliente.php';
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <?php
        include 'includes/header.php';
    ?>
    <style>
        .infojuego{
            border: 3px solid lightgray;
            border-bottom: 0px;
            padding-bottom: 7px;
        }
    </style>
    <body>
        <div class="container">

      
            <?php
                try{
                    
                    ?>
                    <div id="encabezado">
                        <?php
                        if(!isset($_SESSION['loginuser'])){ 
                                include 'includes/caja_login.php';
                        }else{
                            require_once 'includes/menu.php';;
                        }
                        if(isset($_POST['registrar'])){
                            $Cliente=new Cliente($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['localidad'], $_POST['contra'], 'cliente');
                            var_dump($Cliente);
                            Cliente::addCliente($Cliente);
                            header('Location: ./index.php');
                        }
                        ?>

                    </div>
                        <div class="" id="juegos">
                            <div class="row">
                        <?php
                        try{
                                $clientes=Cliente::recuperarClientes();
                                  
                                        ?>
                                        <div class='shadow p-3 mb-5 bg-white rounded'>
                                            <form method='POST'>
                                                <div class='row'>
                                                    <div class="col-3">
                                                        <?php
                                                            echo "<img src='http://socieux.eu/wp-content/uploads/2017/10/JoinUs_v1.png' class='img-fluid'>";
                                                        ?>
                                                    </div>
                                                    <div id='infojuego' class='col-9'> 
                                                        <div class="row bg-light shadow-sm pb-2 mr-1">
                                                            <div class="col-12 infojuego">
                                                                <small>DNI</small><br>
                                                                <input type="text" class="form-control" name="dni">
                                                            </div>
                                                            <div class="col-12 infojuego">
                                                                <small>Nombre</small><br>
                                                                <input type="text" class="form-control" name="nombre">
                                                            </div>
                                                            <div class="col-12 infojuego">
                                                                <small>Apellidos</small><br>
                                                                <input type="text" class="form-control" name="apellidos">
                                                            </div>
                                                            <div class="col-12 infojuego" style="border: 3px solid lightgray;">
                                                                <small>Direccion</small><br>
                                                                <input type="text" class="form-control" name="direccion">
                                                            </div>
                                                            <div class="col-12 infojuego" style="border: 3px solid lightgray;">
                                                                <small>Localidad</small><br>
                                                                <input type="text" class="form-control" name="localidad">
                                                            </div>
                                                            <div class="col-12 infojuego" style="border: 3px solid lightgray;">
                                                                <small>Contraseña</small><br>
                                                                <input type="password" class="form-control" name="contra">
                                                            </div>
                                                            <div class="col-12 mt-2" >
                                                                <input type='submit' class="btn btn-success" name='registrar' value='Regístrate'>
                                                                <a href="index.php" class="btn btn-info">Atrás</a>
                                                            </div>

                                                        </div>
                                                     </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                               
                      
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

