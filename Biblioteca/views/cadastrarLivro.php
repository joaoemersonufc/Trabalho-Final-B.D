<?php

session_start();

require_once('../database/banco.php');

$codigoEditora = $_POST['campo_codigoEditora'];
$titulo = $_POST['campo_titulo'];
$autor = $_POST['campo_autor'];
$edicao = $_POST['campo_edicaoLivro'];
$sinopse = $_POST['campo_sinopse'];
$genero = $_POST['campo_genero'];


$objDb = new db();
$link = $objDb->conecta_mysql();

$editora_existe = true;
$livro_existe = false;

//verificar se a editora já existe
$sql = " Select * from editora where cod = '$codigoEditora' ";
if ($resultado_cod = mysqli_query($link, $sql)) {

    $dados_editora = mysqli_fetch_array($resultado_cod);
    
    if (!isset($dados_editora['cod'])) {
        $editora_existe = false;
    }
} else {
    echo 'Erro ao tentar localizar o registro de editora';
}

//verificar se o título do livro já existe
$sql = " Select * from livro where titulo = '$titulo' ";
if ($resultado_titulo = mysqli_query($link, $sql)) {

    $dados_livro = mysqli_fetch_array($resultado_titulo);

    if (isset($dados_livro['titulo'])) {
        $livro_existe = true;
    }
} else {
    echo 'Erro ao tentar localizar o registro do livro';
}


if (!($editora_existe) || $livro_existe) {

    $retorno_get = '';

    if (!($editora_existe)) {
        $retorno_get .= "erro_editora2=1&";
    }

    if ($livro_existe) {
        $retorno_get .= "erro_titulo=1&";
    }
    header('Location: livros.php?' . $retorno_get);
    die();
}

$sql = " insert into livro(cod_editora, titulo, autor, edicao, sinopse, genero) values ('$codigoEditora', '$titulo', '$autor', '$edicao', '$sinopse', '$genero') ";

//executar a query
if (mysqli_query($link, $sql)) {
    redirect(); 
} else {
    echo 'Erro ao registrar o livro!';
}

function redirect()
{
    header("refresh: 3;livros.php");
        
    echo "<head><link rel='shortcut icon' href='../img/logoico.png'><title>Redirecionando...</title></head> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;padding-top:30px;'><center>Livro registrado com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='../img/logo.png' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;padding-top:30px;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>