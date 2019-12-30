<?php

        try{
        session_start(); 
        if(isset($_SESSION['loginuser'])){
            header('Location: ./index.php');
        }
        if (isset($_POST['gosesion'])) {
            $dwes = new PDO("mysql:host=localhost;dbname=alquiler_juegos;charset=utf8", "dwes", "abc123."); 
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $contra=$_POST['contra'];
            $consulta=$dwes->query("Select * FROM cliente WHERE DNI='".$_POST['usuario']."' AND Clave='".$contra."'"); 
            $comprobado=$consulta->fetchObject();
            if($comprobado!=null){
                $_SESSION['loginuser']=$_POST['usuario'];
                $_SESSION['loginpassword']=$contra;
                $_SESSION['rango']=$comprobado->Tipo;
                setcookie("PHPSESSID", $_COOKIE['PHPSESSID'],time()*2);                
                header('Location: ./index.php');
            }else{
                echo "<div class='bg-warning text-center'>Datos incorrectos</div>";
                echo "<a href='index.php'>Atrás</>";
            }

        }
        
    } catch (PDOException $p) {
        echo "Error ".$p->getMessage()."<br />";
    }
    


?>
</body>
</html>



