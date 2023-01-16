<?php
    include "topo.php";
    require_once "src/ProdutoDAO.php";
?>

<?php

    $produtoDAO = new ProdutoDAO();

    $produtoDAO->cadastrar($_POST);
    
?>

<h3 class="text-center">Dados cadastrados com sucesso!</h3>

<?php
    include "rodape.php";
?>