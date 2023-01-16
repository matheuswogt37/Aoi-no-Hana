<?php
    session_start();
    
    if (!isset($_SESSION['email'])) {
        header("Location:login.php?msg=Você precisa estar logado para acessar esta página!");
    }
?>