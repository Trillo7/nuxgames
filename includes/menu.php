<?php

            if(isset($_REQUEST["filtro"])){
                if($_REQUEST["filtro"]=="salir"){
                    header('Location: ./logoff.php');
                }
            }
            
?>
<div style="margin-bottom:65px;">
    <form action='' method="GET" ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm" >
            <a class="navbar-brand" href="index.php">Inicio <span class="sr-only">(current)</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?filtro=noalquilados">Mostrar juegos no alquilados</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?filtro=alquilados">Mostrar juegos alquilados </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="misjuegos.php">Mis juegos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="perfil.php">Mi perfil</a>
                </li>
                <?php
                if($_SESSION['rango']=="admin"){
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="addjuego_admin.php">Añadir juego [ADMIN]</a>
                </li>
                <?php
                }
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?filtro=salir">Salir </a>
                </li>
              </ul>
            </div>
        </nav>
    </form>
</div>