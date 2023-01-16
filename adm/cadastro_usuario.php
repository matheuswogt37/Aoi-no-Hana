<?php
    require_once "src/UserDAO.php";
    
    $userDAO = new UserDAO();

    echo "Usuário cadastrado com sucesso!";

    if (isset($_POST['email'])){
        if ($_POST['password'] == $_POST['password2']) {
            if (!$userDAO->consultUser($_POST['email'])){
            
                $userDAO->cadastrar($_POST);
                header("Location:index.php?msg=Usuário cadastrado com sucesso.");
            }
            
            else {
                header("Location:form_cadastro_usuario.php?msg=Usuário existente.");
            }
        }
    
        else {
            header("Location:form_cadastro_usuario.php?msg=Senhas diferentes.");
        }
    }

    else {
        header("Location:form_cadastro_usuario.php");
    }
?>