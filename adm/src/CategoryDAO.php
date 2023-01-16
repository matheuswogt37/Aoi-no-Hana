<?php
    require_once "ConexaoBD.php";

    class CategoryDAO{
        function categoryConsult() {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from categories";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>