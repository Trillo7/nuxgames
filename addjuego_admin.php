<?php
require_once 'Objetos/Juego.php';
session_start();
    
    if($_SESSION['rango']!="admin"){
        header('Location: ./index.php');
    }
    if(isset($_POST['guardar'])){
        $juegost=Juego::recuperarProductos();
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                $fich_unico=time()."-".$_FILES['file']['name'];
                $ruta="imagenes/".$fich_unico;
                move_uploaded_file($_FILES['file']['tmp_name'], $ruta);
                Juego::addjuego($_POST['codigo'],$_POST['nombre'], $_POST['plataforma'], $_POST['anno'], $_POST['precio'],$ruta);
                echo "<br>Juego añadido <a href='index.php'>Atrás</a>";
                header('Location: ./index.php');
            }else{
                return false;
            }
    }
    
        ?>
        <html>
            <head>
    <?php
        include 'includes/header.php';
    ?>
            </head>
            <style>
                .infojuego{
                    border: 3px solid lightgray;
                    border-bottom: 0px;
                    padding-bottom: 7px;
                }
            </style>
            <body>
                <div class="container">
                    <div id="encabezado">
                        <?php
                        if(!isset($_SESSION['loginuser'])){ 
                                include 'includes/caja_login.php';
                        }else{
                            require_once 'includes/menu.php';;
                        }
                        
                        ?>

                    </div>
                    <?php
                        try{
                            ?>
                                <div class="" id="juegos">
                                    <div class="row">
                                <?php
                                try{

                                            ?>
                                            <div class='shadow p-3 mb-5 bg-white rounded'>
                                                <form method='POST' enctype="multipart/form-data">
                                                    <div class='row'>
                                                        <div class="col-3">
                                                            <?php
                                                                echo "<img src='' class='img-fluid'>";
                                                            ?>
                                                            Fichero: <input type="file" name="file"><br>
                                                        </div>
                                                        <div id='infojuego' class='col-9'>
                                                            <div class="row bg-light shadow-sm pb-2 mr-1">
                                                                <input type="hidden" name="idjuego" value=''>
                                                                <div class="col-12 infojuego">
                                                                    <small>Codigo</small><br>
                                                                    <input type="text" name="codigo" value=''>
                                                                </div>
                                                                <div class="col-12 infojuego">
                                                                    <small>Nombre</small><br>
                                                                    <input type="text" class="form-control" name="nombre" value=''>
                                                                </div>
                                                                <div class="col-12 infojuego">
                                                                    <small>Plataforma</small><br>
                                                                    <input type="text" name="plataforma" value=''>
                                                                </div>
                                                                <div class="col-12 infojuego">
                                                                    <small>Año de lanzamiento</small><br>
                                                                    <input type="text" name="anno" value=''>
                                                                </div>
                                                                <div class="col-12 infojuego" style="border: 3px solid lightgray;">
                                                                    <small>Precio</small><br>
                                                                    <input type="text" name="precio" value=''>
                                                                </div>
                                                                <div class="col-12 mt-2" >
                                                                    <input type='submit' class="btn btn-success" name='guardar' value='Guardar'>
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