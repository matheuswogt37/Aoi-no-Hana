<?php
require_once "ConexaoBD.php";

class CompraDAO {

    public function finalizarCompra($dados) {
        $conn = ConexaoBD::getConexao();
        $date_now = date('Y-m-d H-i');
        echo $date_now;
        $sql = "INSERT into compras (id_cliente_fk, date) values ('{$dados['id_cliente']}','$date_now')";
        $conn->exec($sql);
        $id_compra = $conn->lastInsertId();
        
        $carrinho = $dados['carrinho'];
        foreach ($carrinho as $item) {
            $sql = "insert into itens_compra(id_itens_compra, id_produto_fk, quantidade, value) values ('$id_compra','{$item['idproduto']}','{$item['quantidade']}','{$item['value']}')";
            $conn->exec($sql);
        }

    }

}

?>