    <?php
    include "topo.php";
    require_once "src/CategoryDAO.php";
    require_once "src/PromotionDAO.php";
    ?>
    <form method="POST" enctype="multipart/form-data" action="cadastro_produto.php" class="container w-75 p-4 bg-light">
        <h3 class="mb-4">Cadastro de Mangás</h3>
        <div class="mb-3">
            <label for="idname" class="form-label">Título</label>
            <input type="text" name="name" id="idname" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="idvolume" class="form-label">Volume</label>
            <input type="text" name="volume" id="idvolume" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="id_category_fk" class="form-label">Categorias</label>
            <?php
                $categoryDAO = new CategoryDAO();
                $categories = $categoryDAO->categoryConsult();               

                foreach ($categories as $category) {
                    
            ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="<?=$category['id_category']?>" id="<?=$category['category']?>" name="id_category_fk[]">
                    <label class="form-check-label" for="<?=$category['category']?>">
                        <?=$category['category']?>
                    </label>
                </div>
            <?php
                }

            ?>

        </div>


        <div class="mb-3">
            <label for="iddescription" class="form-label">Descrição</label>
            <textarea name="description" id="iddescription" class="form-control" cols="30" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="idvalue" class="form-label">Preço</label>
            <input type="text" name="value" id="idvalue" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="idimage" class="form-label">Imagem</label>
            <input type="file" name="image" id="idimage" class="form-control" required>
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
    
                    foreach ($promotion as $promotions) {
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="promotion_value" id="" value="<?=$promotions['id_promotion']?>">
                        <label class="form-check-label" for=""><?=$promotions['value']?>%</label>
                    </div>
                    <?php
                    }
                    ?>
                
                
                </div>
            </div>

            

            <div class="form-check">
                <input class="form-check-input" type="radio" name="promotion" value="promotion_no" id="promotion_no" onclick="not_show_promotions()" checked>
                <label class="form-check-label" for="promotion_no">Não</label>
            </div>
            
            
        </div>

       <button class="border rounded text-light mt-5 mx-auto w-25" type="submit" style="background-color:#301c41">Cadastrar</button>
            
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