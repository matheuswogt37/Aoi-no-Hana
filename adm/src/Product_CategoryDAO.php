<?php
    require_once "ConexaoBD.php";

    class Product_CategoryDAO{
        function consulta() {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from products_categories";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultaPorId($id_product) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select id_category_fk from products_categories WHERE id_product_fk='$id_product'";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>