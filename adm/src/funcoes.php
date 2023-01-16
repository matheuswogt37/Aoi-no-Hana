<?php

function pegarImagem(Array $files):string{
    $nome_img = $files['image']['name'];
    $tipo_img = $files['image']['type'];
    $tam_img = $files['image']['size'];
    $imagem = $files['image']['tmp_name'];

    $fp = fopen($imagem, "rb");
    $imagem = fread($fp, $tam_img);
    $imagem = addslashes($imagem);
    fclose($fp);

    return $imagem;
}