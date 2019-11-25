<?php

session_start();

require_once('../database/banco.php');

$codigo_livro = trim($_GET['codigo']);
$codigo_devolucao = trim($_GET['codigo2']);

$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = " update livro SET alugado = '0' WHERE cod = '$codigo_livro' ";
mysqli_query($link, $sql);

$sql = " delete from devolucao where cod = '$codigo_devolucao' ";

//executar a query
if (mysqli_query($link, $sql)) {
    redirect(); 
} else {
    echo 'Erro ao excluir a devolução!';
}

function redirect()
{
    header("refresh: 3;devolucoes.php");
        
    echo "<head><link rel='shortcut icon' href='../img/logoico.png'><title>Redirecionando...</title></head> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;padding-top:30px;'><center>Devolução excluída com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='../img/logo.png' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;padding-top:30px;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>