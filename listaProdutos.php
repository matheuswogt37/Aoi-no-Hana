<?php
    include('header.php');
    require_once('adm/src/ProdutoDAO.php');
    require_once('adm/src/CategoryDAO.php');

    
    /* if ($_GET)
    $link_now =  */
?>
<body>
    <main>
        <section class="container my-4">
            <div class="row">
                <section class="col-3 collapseMenu">
                    <div class="bg-collapseMenu">
                        <div class="mx-2 pt-3 pb-4">
                        <form action="listaProdutos.php" method="GET">
                                <div class="bd-highlight mb-2">
                                    <div class="position-relative input-group">
                                        <label for="searchBarNav" class="form-label">Nome</label>
                                        <input type="search" id="searchBarNav" placeholder="Pesquisar" name="nome" class="w-100" style="border-radius: 5px; border: none;">
                                    </div>
                                </div>
                                <div>
                                    <h6 class="titCategorias" data-bs-toggle="collapse" data-bs-target="#collapseEditora"
                                        aria-expanded="false" aria-controls="collapseEditora">
                                        Editoras</h6>
                                    <div class="collapse" id="collapseEditora">
                                        <?php
                                            $produtoDAO = new ProdutoDAO();
                                            $editora = $produtoDAO->editoraConsult();
                                            foreach ($editora as $ed):
                                                ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="<?=$ed['id_editora']?>" name="editora" id="id_<?=$ed['id_editora']?>">
                                                        <label class="form-check-label" for="id_<?=$ed['id_editora']?>">
                                                            <?=$ed['editora']?>
                                                        </label>
                                                    </div>
                                                <?php
                                            endforeach;
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h6 class="titCategorias" data-bs-toggle="collapse" data-bs-target="#collapseGeneros"
                                        aria-expanded="false" aria-controls="collapseGeneros">
                                        Gêneros</h6>
                                    <div class="collapse" id="collapseGeneros">
                                        <?php
                                            $produtoDAO = new CategoryDAO();
                                            $categorys = $produtoDAO->categoryConsult();

                                            foreach ($categorys as $category) {
                                                ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="<?=$category['category']?>" name="categories[]" value="<?=$category['id_category']?>">
                                                        <label class="form-check-label" for="<?=$category['category']?>">
                                                            <?=$category['category']?>
                                                        </label>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h6 class="titCategorias" data-bs-toggle="collapse" data-bs-target="#collapseVolume"
                                        aria-expanded="false" aria-controls="collapseVolume">
                                        Volumes</h6>
                                    <div class="collapse" id="collapseVolume">
                                        <div class="col-7">
                                            <input type="text" class="form-control" name="volume" id="nome" placeholder="4">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="submited" class="btn" style="background-color: #301C41; color: #6F95FF;">Aplicar filtro</button>
                            </form>
                        </div>
                    </div>
                </section>

                <section class="col-9 row ms-2" style="min-height: 20vw;"> <!-- parte dos cards -->
                    

                    <?php
                        $produtoDAO = new produtoDAO();
                        $products_id = [];
                        $msg_sql = '';
                        if (isset($_GET['categories'])) {
                            $categories_id = $_GET['categories'];
                            echo ("é variavel");
                            if (is_array($categories_id)) {
                                $categories_id = implode(',',$categories_id);
                            }
                            $msg_sql .= "products_categories.id_category_fk in ($categories_id) AND ";
                        
                            /* if(!is_string($categories_id)) {
                                echo ("é variavel");
                                $categories_id = implode(',',$categories_id);
                                $msg_sql .= "products_categories.id_category_fk in ($categories_id) AND ";
                            } else {
                                echo ("é str");
                                $msg_sql .= "products_categories.id_category_fk='$categories_id' AND ";
                            } */
                        }
                        if (isset($_GET['nome'])) {
                            if (strlen($_GET['nome'])!=0) {
                                $name = $_GET['nome'];
                                $msg_sql .= "products.name like '%$name%' AND ";
                            }
                        }
                        if (isset($_GET['volume'])) {
                            if (strlen($_GET['volume'])!=0) {
                                $vol = $_GET['volume'];
                                $msg_sql .= "products.volume='$vol' AND ";
                            }
                        }
                        if (isset($_GET['editora'])) {
                            $editora = $_GET['editora'];
                            $msg_sql .= "editora.id_editora='$editora' AND ";
                        }
                        

                        if (strlen($msg_sql)!=0) {
                            $msg_sql = substr($msg_sql, 0, -5);
                            $products = $produtoDAO->consultarProdutosPorFiltros($msg_sql);
                            ?>
                            <h3>Produtos encontrados pelo filtro</h3>
                            <small class="mb-4"><?=count($products)?> produtos encontrados</small>
                            <?php
                            foreach ($products as $p):
                                $link_id = $p['id_product'];
                            ?>
            
                                <div class="col-4 mb-3">
                                    <div class="card h-100" style="max-width: 250px;">
                                        <div class="img-container">
                                            <a href="http://localhost:3000/infoProduto.php?id_product=<?=$link_id?>">
                                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p['image']);?>" class="card-img-top img-card-width" alt="..." style="max-width: 100%;"></a>
                                        </div>
                                        <div class="card-body pt-1 pb text-center">
                                            <a href="http://localhost:3000/infoProduto.php?id_product=<?=$link_id?>" class="ancoraCard">
                                                <p class="card-text mb-0"><?=$p['name']?></p>
                                                <p class="mb-3">Volume <?=$p['volume']?></p>
                                                <p class="card-text position-absolute bottom-0 start-50 translate-middle-x mb-1">R$ <?=number_format($p['value'], 2, ",", ".")?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            endforeach; 
                        } else {
                        
                            $products = $produtoDAO->consultar();

                            ?>
                                <h3>Resultados para Mangás</h3>
                                <small class="mb-4"><?=count($products)?> produtos encontrados</small>
                            <?php
        
        
                                foreach ($products as $p):
                                    $link_id = $p['id_product'];
                            ?>
        
                                <div class="col-4 mb-3">
                                    <div class="card h-100" style="max-width: 250px;">
                                        <div class="img-container">
                                            <a href="http://localhost:3000/infoProduto.php?id_product=<?=$link_id?>">
                                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p['image']);?>" class="card-img-top img-card-width" alt="..." style="max-width: 100%;"></a>
                                        </div>
                                        <div class="card-body pt-1 pb text-center">
                                            <a href="http://localhost:3000/infoProduto.php?id_product=<?=$link_id?>" class="ancoraCard">
                                                <p class="card-text mb-0"><?=$p['name']?></p>
                                                <p class="mb-3"><?=$p['volume']?></p>
                                                <p class="card-text position-absolute bottom-0 start-50 translate-middle-x mb-1">R$ <?=number_format($p['value'], 2, ",", ".")?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
        
                            <?php
                                endforeach;
                        }


/* 
                        if (count($_GET)==0) { # não tem nenhum filtro
                            $products = $produtoDAO->consultar();

                            ?>
                                <h3>Resultados para Mangás</h3>
                                <small class="mb-4"><?=count($products)?> produtos encontrados</small>
                            <?php
        
        
                                foreach ($products as $p):
                            ?>
        
                                <div class="col-4 mb-3">
                                    <div class="card h-100" style="max-width: 250px;">
                                        <div class="img-container">
                                            <a href="#">
                                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p['image']);?>" class="card-img-top img-card-width" alt="..." style="max-width: 100%;"></a>
                                        </div>
                                        <div class="card-body pt-1 pb text-center">
                                            <a href="#" class="ancoraCard">
                                                <p class="card-text mb-0"><?=$p['name']?></p>
                                                <p class="mb-3"><?=$p['volume']?></p>
                                                <p class="card-text position-absolute bottom-0 start-50 translate-middle-x mb-1">R$ <?=number_format($p['value'], 2, ",", ".")?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
        
                            <?php
                                endforeach;
                        } else { # se tem pelo menos 1 filtro
                            $id_products = [];
                            if ($_GET['categories']) {
                                $categories = $_GET['categories'];

                                /* $condition_category_sql += 'products.id_product = ';
                                foreach ($categories as $category) {
                                    $condition_category_sql += "$category+','";
                                }
                                $condition_category_sql = rtrim($condition_category_sql);
                                 # código para gerar uma string para colocar no sql do select distinct e pegar os ids
                                $categories = implode(", ",$categories);
                                $products_categories = $produtoDAO->consultarIdProdutosCategorias($categories);
                                # var_dump($products_categories);
                                foreach ($products_categories as $product_category) {
                                    array_push($id_products, $product_category['id_product_fk']);
                                }
                            }
                            if (count($id_products)==0) {
                                ?>
                                <h2>Nenhum produto encontrado!</h2>
                                <?php
                            } else {
                                $id_products = implode(", ",$id_products);
                                $products = $produtoDAO->consultarProdutosPorId($id_products);
                                ?>
                                    <h3>Resultados para Mangás</h3>
                                    <small class="mb-4"><?=count($products)?> produtos encontrados</small>
                                <?php
                                foreach ($products as $p):
                                    ?>
            
                                    <div class="col-4 mb-3">
                                        <div class="card h-100" style="max-width: 250px;">
                                            <div class="img-container">
                                                <a href="#">
                                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p['image']);?>" class="card-img-top img-card-width" alt="..." style="max-width: 100%;"></a>
                                            </div>
                                            <div class="card-body pt-1 pb text-center">
                                                <a href="#" class="ancoraCard">
                                                    <p class="card-text mb-0"><?=$p['name']?></p>
                                                    <p class="mb-3"><?=$p['volume']?></p>
                                                    <p class="card-text position-absolute bottom-0 start-50 translate-middle-x mb-1">R$ <?=number_format($p['value'], 2, ",", ".")?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
            
                                <?php
                                endforeach;
                            }                        
                        }

                         */
                            ?>  

                        
                </div>
                </section>


            </div>
        </section>
        <section>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a href="#" class="page-link"><img src="img/arrow-left-circle.svg" alt=""
                                class="me-2">anterior</a>
                    </li>
                    <li class="page-item ativo"><a class="page-link" href="#">1</a></li>
                    <li class="page-item">
                        <a href="#" class="page-link">
                            2
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">próximo<img src="img/arrow-right-circle.svg" alt=""
                                class="ms-2"></a>
                    </li>
            </nav>
        </section>

    </main>


    <?php
    include('footer.php');
    ?>
</body>

</html>