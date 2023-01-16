<?php
    require_once "ConexaoBD.php";

    class PromotionDAO{
        function promotionConsult() {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from promotions";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>