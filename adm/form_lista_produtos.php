<?php
    include "topo.php";   
    require_once "src/ConexaoBD.php";
    require_once "src/ProdutoDAO.php"; 
?>  
    <div class="">
        <form action="form_lista_produtos.php" method="GET" class="d-flex justify-content-between w-100 p-2 m-3 mt-0 mx-0 border-0">
            <div class="p-2 flex-grow-1 mt-2">
                <input class="form-control" type="search" name="search" placeholder="Nome do produto" aria-label="Search">
            </div>
            <div class="p-2">
                <button class="ms-auto text-light btn btn-sm py-2" style="background-color:#301c41" type="submit">Pesquisar</button>
            </div>
        </form>
    </div>
    <table>
        <tr>            
            <th>Imagem</th>
            <th>Título</th>
            <th>Volume</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Categorias</th>
            <th></th>
        </tr>

        <?php
            $produtoDAO = new ProdutoDAO();
            $conexao = ConexaoBD::getConexao();

            if (isset($_GET['acao']) && $_GET['acao']=='remover') {
                $produtoDAO->remover($_GET['idproduct']);
            }

            if (isset($_GET['search'])){
                $products = $produtoDAO->search($_GET['search']);
            }

            else {
                $products = $produtoDAO->consultar();
            }

            foreach ($products as $product):

        ?>
            <tr>                    
                <td><img class="w-100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>"/></td>
                <td><?=$product['name']?></td>
                <td>Volume <?=$product['volume']?></td>
                <td><?=$product['description']?></td>
                <td>R$<?=$product['value']?></td>
                <td>
                    <?= $produtoDAO->listarCategorias($product['id_product']) ?>
                </td>
                <td>
                    <a href="form_editar_produto.php?idproduct=<?=$product['id_product']?>" class="btn btn-sm text-light" style="background-color:#301c41">Editar</a>
                    <a href="form_lista_produtos.php?acao=remover&idproduct=<?=$product['id_product']?>" class="btn btn-danger btn-sm my-1">Remover</a>
                </td>
            </tr>
        <?php
            endforeach;
        ?>

    </table>    


<?php
    include "rodape.php";
?>