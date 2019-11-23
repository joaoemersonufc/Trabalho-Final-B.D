<?php

session_start();

require_once('../database/banco.php');

$codigo = $_GET['codigo'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$livro_existe = true;

//verificar se o usuário já existe
$sql = " Select * from livro where cod = '$codigo' ";
if ($resultado_cod = mysqli_query($link, $sql)) {

    $dados_livro = mysqli_fetch_array($resultado_cod);

    if (!isset($dados_livro['cod'])) {
        $livro_existe = false;
    }
} else {
    echo 'Erro ao tentar localizar o registro do livro';
}


if (!($livro_existe)) {

    $retorno_get = '';

    if ($livro_existe) {
        $retorno_get .= "erro_livro=1&";
    }

    header('Location: livros.php?' . $retorno_get);
    die();
}

$sql = " delete from livro where cod = '$codigo' ";

//executar a query
if (mysqli_query($link, $sql)) {
    redirect(); 
} else {
    echo 'Erro ao excluir o livro!';
}

function redirect()
{
    header("refresh: 3;livros.php");
        
    echo "<head><link rel='shortcut icon' href='../img/logoico.png'><title>Redirecionando...</title></head> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;padding-top:30px;'><center>Livro excluido com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='../img/logo.png' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;padding-top:30px;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>