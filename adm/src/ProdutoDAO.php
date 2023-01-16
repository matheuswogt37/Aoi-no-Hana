<?php

use function PHPSTORM_META\type;

    require_once "ConexaoBD.php";
    require_once "funcoes.php";

    class ProdutoDAO{

        function consultar() {
            $conexao = ConexaoBD::getConexao();
            $sql = "SELECT * from products";

            $result = $conexao->query($sql);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);

            return $products;
        }

        function consultarProdutosPromocao($qtd) {
            $conexao = ConexaoBD::getConexao();
            $sql = "SELECT products.*, promotions.promotion from products, promotions where products.id_promotion_fk=promotions.id_promotion AND id_promotion_fk!=0 limit 0,$qtd";

            $result = $conexao->query($sql);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);

            return $products;
        }

        function consultarProdutosCategoria($id_category) {
            $conexao = ConexaoBD::getConexao();
            $sql = "select * from products, categories where products.id_product=products_categories.id_product_fk and products_categories.id_category_fk=categories.id_category and id_promotion_fk!=0";

            $result = $conexao->query($sql);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);

            return $products;
        }

        function consultarPorId($id_product) {
            $conexao = ConexaoBD::getConexao();
            echo gettype($id_product);
            echo "</br>";
            echo (strlen($id_product));
            echo "</br>";
            $sql = "SELECT products.*, promotions.* from aoinohana.products, aoinohana.promotions WHERE products.id_product='$id_product' AND products.id_promotion_fk=promotions.id_promotion";
            $result = $conexao->query($sql);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);
            var_dump ($products);
            $product = $products[0];
            return $product;
        }

        function listarCategorias($id_product) {
            $produtoDAO = new ProdutoDAO();
            $conexao = ConexaoBD::getConexao();

                $sql = "SELECT categories.category FROM products_categories, categories WHERE products_categories.id_product_fk='$id_product' AND products_categories.id_category_fk=categories.id_category";
                $result = $conexao->query($sql);
                $categories = $result->fetchAll(PDO::FETCH_ASSOC);
                $message = "";
                if (!is_null($categories)) {
                    foreach ($categories as $category):
                        $message .= $category['category'].";<br/>";
                    endforeach;
                    $message = substr($message, 0, -6);
                }
            return $message;
        }

        function listarTipos ($id_type_fk) {
            $produtoDAO = new ProdutoDAO();
            $conexao = ConexaoBD::getConexao();

            $sql ="SELECT types.type FROM types WHERE '$id_type_fk' = types.id_type";
            $result = $conexao->query($sql);
            $type = $result->fetchAll(PDO::FETCH_ASSOC);
            $message = "";
            if (sizeof($type)>=1) {
                $message = $type[0]['type'];    
            }
            return $message;
        }

        function cadastrar($dados){
        
            $conexao = ConexaoBD::getConexao();

            if (!isset($dados['id_promotion_fk'])) {
                $dados['id_promotion_fk'] = 0;
            }

            if (!isset($dados['id_type_fk'])) {
                $dados['id_type_fk'] = 0;
            }

            if (isset($dados['promotion']) and $dados['promotion']=="promotion_yes") {
                $id_promotion_fk = $dados['promotion_value'];
            } else {
                $id_promotion_fk = 0;
            }


            $imagem = pegarImagem($_FILES);

            $sql = "insert into products (name, volume, description, image, value, id_promotion_fk, id_type_fk) values ('{$dados['name']}', '{$dados['volume']}','{$dados['description']}','$imagem','{$dados['value']}','$id_promotion_fk','{$dados['id_type_fk']}')";

            $conexao->exec($sql);
            $last_id = $conexao->lastInsertId();
            

            if (isset($dados['id_category_fk'])) {
                $id_category_fk = $dados['id_category_fk'];
                foreach ($id_category_fk as $id_category) {
                    $sql = "insert into products_categories (id_product_fk, id_category_fk) values ($last_id, $id_category)";
                    $result = $conexao->query($sql);
                }
            }

        }

        function atualizar($dados) {
        
            $conexao = ConexaoBD::getConexao();

            if (!isset($dados['id_promotion_fk'])) {
                $dados['id_promotion_fk'] = 0;
            }

            if (!isset($dados['id_type_fk'])) {
                $dados['id_type_fk'] = 0;
            }

            if (isset($dados['promotion']) and $dados['promotion']=="promotion_yes") {
                $id_promotion_fk = $dados['promotion_value'];
            } else {
                $id_promotion_fk = 0;
            }
            if (empty($_FILES)) { 
                $imagem = pegarImagem($_FILES);
                $sql = "UPDATE products SET name='{$dados['name']}', volume='{$dados['volume']}', description='{$dados['description']}', image='$imagem', value='{$dados['value']}', id_promotion_fk='$id_promotion_fk', id_type_fk='{$dados['id_type_fk']}' WHERE id_product='{$dados['id_product']}'";
            } else {
                $sql = "UPDATE products SET name='{$dados['name']}', volume='{$dados['volume']}', description='{$dados['description']}', value='{$dados['value']}', id_promotion_fk='$id_promotion_fk', id_type_fk='{$dados['id_type_fk']}' WHERE id_product='{$dados['id_product']}'";
            }

            $conexao->exec($sql);
            
            $sqlDelCategory = "DELETE FROM products_categories WHERE id_product_fk = '{$dados['id_product']}'";
            $conexao->exec($sqlDelCategory);
            if (isset($dados['id_category_fk'])) {
                $id_category_fk = $dados['id_category_fk'];
                foreach ($id_category_fk as $id_category) {
                    $sql = "insert into products_categories (id_product_fk, id_category_fk) values ({$dados['id_product']}, $id_category)";
                    $result = $conexao->query($sql);
                }
            }
    
        }

        function remover($idproduct) {
            $conexao = ConexaoBD::getConexao();

            $sql = "delete from products where id_product='$idproduct'";

            $result = $conexao->query($sql);
        }

        function search($product) {
            $conexao = ConexaoBD::getConexao();
            $sql = "select * from products WHERE (name LIKE '%$product%')";
            $result = $conexao->query($sql);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }

        function consultarIdProdutosCategorias($categories_id) {
            $conexao = ConexaoBD::getConexao();
            $sql = "SELECT DISTINCT id_product_fk FROM products_categories WHERE id_category_fk in ($categories_id)";
            $result = $conexao->query($sql);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }

        function consultarProdutosPorId($id_produtos) {
            $conexao = ConexaoBD::getConexao();
            $sql = "SELECT * FROM products WHERE id_product in ($id_produtos)";
            $result = $conexao->query($sql);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }

        function consultarProdutosPorCategoria($categories) {
            $conexao = ConexaoBD::getConexao();
            $msg_sql = "";

            foreach ($categories as $category):
                $msg_sql += "'$category' AND id_category_fk=";
            endforeach;
            $msg_sql -= substr($msg_sql, 0, 20);
            $sql = "SELECT DISTINCT id_product_fk FROM products_categories WHERE id_category_fk=$msg_sql";
            $result = $conexao->query($sql);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }

        function consultarProdutosPorNome($name) {
            $conexao = ConexaoBD::getConexao();
            $sql = "SELECT id_product FROM products WHERE (name like '%$name%')";
            $result = $conexao->query($sql);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $p):
                $return_products[] = $p['id_product'];
            endforeach;
            return $return_products;
        }

        function consultarProdutosPorFiltros($msg_sql) {
            $conexao = ConexaoBD::getConexao();
            $sql = "SELECT DISTINCT products.* FROM products, aoinohana.products_categories, editora WHERE products.id_product=products_categories.id_product_fk AND products.id_editora_fk=editora.id_editora AND $msg_sql";
            $result = $conexao->query($sql);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }

        function editoraConsult() {
            $conexao = ConexaoBD::getConexao();
            $sql = "select * from editora";
            $resultado = $conexao->query($sql);
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>