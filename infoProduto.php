<?php
    include('header.php');
    require_once "adm/src/ProdutoDAO.php";

    $produtoDAO = new ProdutoDAO();

    $id = $_GET['id_product'];

    $p = $produtoDAO->consultarPorId($id);
    if ($p['id_promotion_fk']!=0) {
        $val = $p['value']*((100-$p['promotion'])/100);
        $val_old = $p['value'];
    } else {
        $val_old = '';
        $val = $p['value'];
    }
?>
<body>
    <main>
        <section class="container">
            <form action="carrinho.php" method="POST">
                <input type="hidden" name="idproduto" value="<?=$p['id_product']?>">
                <input type="hidden" name="operacao" value="inserir">
                <div class="row">
                    <div class="py-4"> <!-- descrição na parte de cima -->
                        <h3><?=$p['name']?></h3>
                    </div>
                    <div class="mb-3 row"> 
                        <div class="col-md-6 p-2 ms-auto"> <!-- imagem central -->
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p['image']);?>" class="" style="max-width: 75%;">
                        </div>
                        <div class="col-md-3 ms-auto p-2"> <!-- informações do lado direito -->
                            <h5><?=$p['name']?></h5>
                            <p class="text-decoration-line-through" style="color: #c4c4c4;">R$ <?=$val_old?></p>
                            <h4>R$ <?=$val?></h4>
                            <div class="py-4">
                                <button type="submit" class="btn" style="color: #6f95ff;
                                        background-color: #301c41;
                                        border-color: #301c41;"><a href="#" class="text-decoration-none"><b>Adicionar ao
                                            carrinho</b></a></button>
                            </div>
                            <h5>Calcule o frete</h5>
                            <input type="text" class="form-control" id="" placeholder="CEP">
                            <div class="py-4">
                                <button type="button" class="btn" style="color: #6f95ff;
                                        background-color: #301c41;
                                        border-color: #301c41;"><a href="#"
                                        class="text-decoration-none"><b>Calcular</b></a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <section class="container">
            <div class="row">
                <h3>Informações do produto</h3>
                <p class="fw-bold"><?=$p['name']?></p>
                <p><?=$p['description']?></p>
            </div>
        </section>
    </main>

    <?php
    include('footer.php');
    ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>