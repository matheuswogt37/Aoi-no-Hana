<?php
    include "topo.php";
    require_once "src/ProdutoDAO.php";
?>

<?php

    $produtoDAO = new ProdutoDAO();

    $produtoDAO->atualizar($_POST);
    
?>

<h3 class="text-center">Dados atualizados com sucesso!</h3>

<?php
    include "rodape.php";
?>