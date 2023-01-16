<?php
    require_once "ConexaoBD.php";

class UserDAO{
    function cadastrar($dados){
        $conexao = ConexaoBD::getConexao();
            
        $password = md5($dados['password']);

        $sql = "insert into user (email, password) values ('{$dados['email']}','{$password}')";

        $conexao->exec($sql);
    }

    function consultUser($email){
        $conexao = ConexaoBD::getConexao();

        $sql = "select * from user where email='$email'";

        $resultado = $conexao->query($sql);

        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    function consultLogin($dados){
        $conexao = ConexaoBD::getConexao();

        $password = md5($dados['password']);

        $sql = "select * from user where email='{$dados['email']}' and password='{$password}'";

        $resultado = $conexao->query($sql);

        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}

?>