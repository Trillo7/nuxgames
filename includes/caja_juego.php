<div class='shadow p-3 mb-5 bg-white rounded text-center' style='width:240px; margin-right:25px;'>
    <form action="ver_juego.php" method='POST'>
        <input type="hidden" name="idjuego" value='<?php echo $juego->Codigo; ?>'>
        <?php
        if($juego->Alquilado=="SI"){
            echo "<img src='".$juego->Imagen."' style='filter: grayscale(100%);height: 300px;width: 215px;' class='img-fluid'>";
        }else{
            echo "<img src='".$juego->Imagen."' style='height: 300px;width: 215px;' class='img-fluid'>";
        }
        ?>
        <div id='infojuego' class=''><?php echo $juego->Nombre_juego; ?> <br> Consola: <?php echo $juego->Nombre_consola; ?></div>
        <input type='submit' class='btn btn-primary mt-2' value='Mostrar'>
    </form>

    <?php
    if($_SESSION['rango']=="admin"){
        ?>
        <form action="editar_admin.php" method="POST">
            <input type="hidden" name="idjuego" value='<?php echo $juego->Codigo; ?>'>
            <input type='submit' class='btn btn-success mt-2' name='editar' value='Editar'>
            <input type='submit' class='btn btn-danger mt-2' name='borrar' value='Borrar'>
        </form>

        <?php
    }
    ?>
</div>