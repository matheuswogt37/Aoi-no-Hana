<?php
    include "topo.php";
    require_once "src/ProdutoDAO.php";
    require_once "src/CategoryDAO.php";
    require_once "src/PromotionDAO.php";
    require_once "src/Product_CategoryDAO.php";
    $produtoDAO = new ProdutoDAO();
    $product = $produtoDAO ->consultarPorId($_GET['idproduct']);

?>

    <form method="POST" enctype="multipart/form-data" action="atualiza_produto.php" class="container w-75 p-4 bg-light">

        <input type="hidden" name="id_product" value="<?=$product['id_product']?>">

        <h3 class="mb-4">Editar produto</h3>
        <div class="mb-3">
            <label for="idname" class="form-label">Título</label>
            <input type="text" name="name" id="idname" class="form-control" value="<?=$product['name']?>" required>
        </div>
        
        <div class="mb-3">
            <label for="idvolume" class="form-label">Volume</label>
            <input type="text" name="volume" id="idvolume" class="form-control" value="<?=$product['volume']?>" required>
        </div>

        <div class="mb-3">
            <label for="id_category_fk" class="form-label">Categorias</label>
            <?php
                $categoryDAO = new CategoryDAO();
                $categories = $categoryDAO->categoryConsult();               
                $prod_cateDAO = new Product_CategoryDAO();
                $prod_cate = $prod_cateDAO->consultaPorId($product['id_product']);
                $inv = 1;
                foreach ($categories as $category) {
                    foreach ($prod_cate as $pr_ca) {
                        if (in_array($category['id_category'], $pr_ca)) {
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?=$category['id_category']?>" id="<?=$category['category']?>" name="id_category_fk[]" checked>
                                <label class="form-check-label" for="<?=$category['category']?>">
                                    <?=$category['category']?>
                                </label>
                            </div>
                            <?php 
                            $inv = 0;
                            break;
                        } else {
                            $inv = 1;
                        }
                    }
                    if ($inv == 1) {
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?=$category['id_category']?>" id="<?=$category['category']?>" name="id_category_fk[]">
                                <label class="form-check-label" for="<?=$category['category']?>">
                                    <?=$category['category']?>
                                </label>
                            </div>
                            <?php
                    }
                }

            ?>

        </div>

        <div class="mb-3">
            <label for="iddescription" class="form-label">Descrição</label>
            <textarea name="description" id="iddescription" class="form-control" cols="30" rows="5" required><?=$product['description']?></textarea>
        </div>

        <div class="mb-3">
            <label for="idvalue" class="form-label">Preço</label>
            <input type="text" name="value" id="idvalue" class="form-control" value="<?=$product['value']?>" required>
        </div>

        <div class="mb-3">
            <label for="idimage" class="form-label">Imagem</label>
            <input type="file" name="image" id="idimage" class="form-control">
            <small>Caso não queira alterar a imagem não adicione nada neste campo</small>
        </div>

        <div>
            <label for="">Promoção</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="promotion" value="promotion_yes" id="promotion_yes" onclick="show_promotions()">
                <label class="form-check-label" for="promotion_yes">Sim</label>

                <div id="div_promotion" style="display: none">
                    <?php
                    $promotionDAO = new PromotionDAO();
                    $promotion = $promotionDAO->promotionConsult();               
                    $containPromotion = 0;
                    foreach ($promotion as $promotions) {
                        if ($product['id_promotion_fk']==$promotions['id_promotion']) {
                            $containPromotion = 1;
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promotion_value" id="" value="<?=$promotions['id_promotion']?>" checked>
                                <label class="form-check-label" for=""><?=$promotions['promotion']?>%</label>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promotion_value" id="" value="<?=$promotions['id_promotion']?>">
                                <label class="form-check-label" for=""><?=$promotions['promotion']?>%</label>
                            </div>
                            <?php
                        }
                    }
                    ?>
                
                
                </div>
            </div>

            

            <div class="form-check">
                <input class="form-check-input" type="radio" name="promotion" value="promotion_no" id="promotion_no" onclick="not_show_promotions()" checked>
                <label class="form-check-label" for="promotion_no">Não</label>
            </div>

            <?php
                if ($containPromotion == 1) {
            ?>
            <script type="text/javascript">
                var div = document.getElementById("div_promotion");
                div.style.display = "block";
                document.getElementById("promotion_yes").click();
            </script>
            <?php
                }
            ?>
            
        </div>

       <button class="border rounded text-light mt-5 mx-auto w-25" type="submit" style="background-color:#301c41">Salvar alterações</button>
            
    </form>

    <script type="text/javascript">
        function show_promotions() {
            var div = document.getElementById("div_promotion");
            div.style.display = "block";
        };

        function not_show_promotions() {
            var div = document.getElementById("div_promotion");
            div.style.display = "none";
        }

    </script>

<?php
    include "rodape.php";
?>