<?php
    include "header.php";
    require_once "adm/src/CompraDAO.php";

    $compraDAO = new CompraDAO();
    $compraDAO->finalizarCompra($_SESSION);
    var_dump ($_SESSION);

?>

<main>
    <section class="container">
        <h2>Compra finalizada!</h2>
    </section>
</main>

<?php
    include "footer.php";
?>