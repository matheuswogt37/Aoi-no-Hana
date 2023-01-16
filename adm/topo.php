<?php
    include "validar_sessao.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Aoi no Hana - Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">  
    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/estilo_menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
</head>

<body>    

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="index.php">
                <h3>Aoi no Hana - Admin</h3>
                <strong>Admin</strong>
                </a>
            </div>

            <ul class="list-unstyled components py-0">
                <li class="active">
                    <a href="#mangaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="background-color:#1c0b2b">
                        <i class="fas fa-book"></i>                        
                        Mangás
                    </a>
                    <ul class="collapse list-unstyled" id="mangaSubmenu">
                        <li style="background-color:#301c41">
                            <a href="form_cadastro_produto.php">Cadastrar Mangás</a>
                        </li>                       
                        <li>
                            <a href="form_lista_produtos.php">Listar Mangás</a>
                        </li>                        
                    </ul>
                </li>
                <li>
                    <a href="form_cadastro_usuario.php" style="background-color:#1c0b2b">
                        <i class="fas fa-user"></i>
                        Usuários
                    </a>
                </li>
                <li>
                    <a href="#" style="background-color:#1c0b2b">
                        <i class="fas fa-paper-plane"></i>
                        Contato
                    </a>
                </li>
                <li>
                    <a href="logout.php" style="background-color:#1c0b2b">
                        <i class="fas fa-door-closed"></i>
                        Sair
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">