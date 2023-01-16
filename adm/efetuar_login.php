<?php
    session_start();
    require_once "src/UserDAO.php";

    $userDAO = new UserDAO();

    if ($userDAO->consultLogin($_POST)) {
        $_SESSION['email'] = $_POST['email'];
        header("Location:index.php");
    }

    else {
        header("Location:login.php?msg=Usuário ou senha incorretos.");
    }
?>