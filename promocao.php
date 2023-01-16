<?php
    include "header.php";
    require_once('adm/src/ProdutoDAO.php');
?>

<section class="container card-produtos">
            <h2 class="mt-3">Promoção</h2>
            <div class="row mt-3 mx-auto g-2">

            <?php
                $produtoDAO = new produtoDAO();
                $products = $produtoDAO->consultarProdutosPromocao(50);
                foreach ($products as $p):
                    $val = $p['value']*((100-$p['promotion'])/100);
                    
                $link_id = $p['id_product'];
            ?>

                <div class="col-2">
                    <div class="card h-100" style="max-width: 250px;">
                        <div class="img-container">
                            <a href="http://localhost:3000/infoProduto.php?id_product=<?=$link_id?>">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p['image']);?>" class="card-img-top img-card-width" alt="..." style="max-width: 100%;"></a>
                        </div>
                        <div class="card-body pt-1 pb text-center">
                            <a href="http://localhost:3000/infoProduto.php?id_product=<?=$link_id?>" class="ancoraCard">
                                <p class="card-text mb-1"><?=$p['name']?></p>
                                <p class="card-text mb-1">Volume <?=$p['volume']?></p>
                                <p class="card-text mb-1 text-decoration-line-through">R$ <?=number_format($p['value'], 2, ",", ".")?>
                                <p class="card-text position-absolute bottom-0 start-50 translate-middle-x mb-1">R$ <?=number_format($val, 2, ",", ".")?>
                            </a>
                        </div>
                    </div>
                </div>

            <?php
                endforeach;
            ?>

            </div>
        </section>

<?php
    include "footer.php"
?>