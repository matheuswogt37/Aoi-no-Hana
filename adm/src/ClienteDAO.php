<?php
require_once "ConexaoBD.php";

class ClienteDAO {

    public function consultarCliente($email) {
        $conn = ConexaoBD::getConexao();
        $sql = "select id_cliente, name, email, address, phone, complement from clientes where email='$email'";
        $result = $conn->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
        
    }








}

?>