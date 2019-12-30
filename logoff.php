        <?php
            session_start();
                session_unset();
                session_destroy();
                setcookie("PHPSESSID", false,-1);
                header('Location: ./index.php');
            
        ?>
    </body>
</html>
