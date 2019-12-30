<?php
require_once 'Objetos/Juego.php';
session_start();
    
    if($_SESSION['rango']!="admin"){
        header('Location: ./index.php');
    }
    if(isset($_POST['borrar'])){
        $juegost=Juego::recuperarProductos();
        foreach($juegost as $juego){
            if($juego->Codigo==$_POST['idjuego']){
                $juego->borrar();
            }
        }
        echo "Juego borrado <a href='index.php'>Atrás</a>";
    }
    
    if(isset($_POST['guardar'])){
        $juegost=Juego::recuperarProductos();
        foreach($juegost as $juego){
            if($juego->Codigo==$_POST['idjuego']){
                $juego->editar($_POST['nombre'], $_POST['plataforma'], $_POST['anno'], $_POST['precio']);
            }
        }
        echo "<br>Juego guardado <a href='index.php'>Atrás</a>";
    }
    
    if(isset($_POST['editar'])){
        //Pagina editar?>
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
                        try{
                            $juegos=Juego::recuperarProductos();

                            ?>
                                <div class="" id="juegos">
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
                                                        <div class="col-3">
                                                            <?php
                                                                $_SESSION['juego']=$juego;
                                                                if($juego->Alquilado=="SI"){
                                                                    echo "<img src='".$juego->Imagen."' style='filter: grayscale(100%);' class='img-fluid'>";
                                                                }else{
                                                                    echo "<img src='".$juego->Imagen."' class='img-fluid'>";
                                                                }
                                                            ?>

                                                        </div>
                                                        <div id='infojuego' class='col-9'>
                                                            <div class="row bg-light shadow-sm pb-2 mr-1">
                                                                <input type="hidden" name="idjuego" value='<?php echo $juego->Codigo; ?>'>
                                                                <div class="col-12 infojuego">
                                                                    <small>Nombre</small><br>
                                                                    <input type="text" class="form-control" name="nombre" value='<?php echo $juego->Nombre_juego; ?>'>
                                                                </div>
                                                                <div class="col-12 infojuego">
                                                                    <small>Plataforma</small><br>
                                                                    <input type="text" name="plataforma" value='<?php echo $juego->Nombre_consola; ?>'>
                                                                </div>
                                                                <div class="col-12 infojuego">
                                                                    <small>Año de lanzamiento</small><br>
                                                                    <input type="text" name="anno" value='<?php echo $juego->Anno; ?>'>
                                                                </div>
                                                                <div class="col-12 infojuego" style="border: 3px solid lightgray;">
                                                                    <small>Precio</small><br>
                                                                    <input type="text" name="precio" value='<?php echo $juego->Precio; ?>'>
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




        <?php
    }