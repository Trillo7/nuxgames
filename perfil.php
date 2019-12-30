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
        }
    </style>
    <body>
        <div class="container">

            <?php
                if(!isset($_SESSION['loginuser'])){
                    header('Location: ./index.php');
                }   
                try{
                    
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
                        <div class="" id="juegos">
                            <div class="row">
                        <?php
                        try{
                                $clientes=Cliente::recuperarClientes();
                                foreach($clientes as $cliente){
                                    if($cliente->DNI==$_SESSION['loginuser']){
                                        
                                        ?>
                                        <div class='shadow p-3 mb-5 bg-white rounded'>
                                            <form method='POST'>
                                                <div class='row'>
                                                    <div id='infojuego' class="container" style="padding-left: -30px;">
                                                        <div class="row bg-light shadow-sm pb-2 mr-1 ml-1">
                                                            <div class="col-12 infojuego">
                                                                <small>DNI</small><br>
                                                                <?php echo $cliente->DNI; ?>
                                                            </div>
                                                            <div class="col-12 infojuego">
                                                                <small>Nombre</small><br>
                                                                <?php echo $cliente->Nombre; ?>
                                                            </div>
                                                            <div class="col-12 infojuego">
                                                                <small>Apellidos</small><br>
                                                                <?php echo $cliente->Apellidos; ?>
                                                            </div>
                                                            <div class="col-12 infojuego" >
                                                                <small>Direccion</small><br>
                                                                <?php echo $cliente->Direccion; ?>
                                                            </div>
                                                            <div class="col-12 infojuego" style="border: 3px solid lightgray;">
                                                                <small>Localidad</small><br>
                                                                <?php echo $cliente->Localidad; ?>
                                                            </div>
                                                            <div class="col-12 mt-2" >
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

