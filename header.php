<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <title>Aoi no Hana</title>
</head>


<header>
        <div class="d-flex bd-highlight ms-3">
            <div class="p-2 bd-highlight">
                <a href="home.php"><img src="img/florazul.svg" alt="Icone de flor azul"></a>
            </div>
            <div class="p-2 bd-highlight">
                <h2 class="mb-0 mt-3">AOI NO HANA</h2>
                <P>Top 10 lojas de anime</P>
            </div>
            <div class="ms-auto p-2 bd-highlight my-auto">
                <form action="listaProdutos.php" method="GET">
                    <div class="input-group">
                        <input type="search" id="searchBar" placeholder="Pesquisar" name="nome" class="" style="border-radius: 5px; border: none; width: 30vmax">
                        <button class="btn btn-outline-light">
                            <img src="img/search.svg" alt="" width="20px"></a>
                        </button>
                    </div>
                </form>
            </div>
            <a href="/login.php" class="my-auto me-4"><img src="img/user.svg" alt="" class="ms-2" width="30px"></a>
            <a href="/carrinho.php" class="my-auto me-4" id="cart">
                <img src="img/cartAzulFraco.svg" alt="" class="" width="30px">
                <span class="label label-danger border rounded-pill px-1 border-danger">
                <?php
                $qtd_cart = count($_SESSION['carrinho']??[]);
                echo $qtd_cart;
                ?>
                </span>
            </a>
            
        </div>
    </header>
    <section class="bgNavBar">
        <nav class="container navbar navbar-expand-lg">

            <a class="navbar-toggler collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"
                style="text-decoration: none; box-shadow: none;">Categorias</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Destaques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="promocao.php">Promoções</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                                require_once "adm/src/CategoryDAO.php";
                                $CategoryDAO = new CategoryDAO;
                                $category = $CategoryDAO->categoryConsult();

                                foreach ($category as $c):
                            ?>
                                <li><a class="dropdown-item" href="listaProdutos.php?categories=<?=$c['id_category']?>"><?=$c['category']?></a></li>
                            <?php
                                endforeach;
                            ?>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
    </section>

    