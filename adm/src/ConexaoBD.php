<?php

class ConexaoBD{


    public  static function getConexao():PDO{
        $conexao = new PDO("mysql:host=172.16.6.82;dbname=aoinohana","aluno","pinguim");
        return $conexao;
    }
}

ConexaoBD::getConexao();