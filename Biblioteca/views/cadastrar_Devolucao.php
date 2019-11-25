<?php

session_start();

require_once('../database/banco.php');

$data = date('d/m/y');
$cod_emprestimo = trim($_GET['codigo']);
$cod_livro = trim($_GET['codigo2']);
$id_usuario = $_SESSION['matricula'];

$multa = "0.00";

$objDb = new db();
$link = $objDb->conecta_mysql();

$devolucao_existe = false;

$sql = " update livro SET alugado = '0' WHERE cod = $cod_livro";
mysqli_query($link, $sql);


$sql = " insert into devolucao(data, multa, cod_emprestimo, id_usuario) values ('$data', '$multa', '$cod_emprestimo', '$id_usuario') ";

//executar a query
if (mysqli_query($link, $sql)) {
    redirect(); 
} else {
    echo 'Erro ao fazer a devolução do livro!';
}

function redirect()
{
    header("refresh: 3;emprestimos.php");
        
    echo "<head><link rel='shortcut icon' href='../img/logoico.png'><title>Redirecionando...</title></head> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;padding-top:30px;'><center>Livro devolvido com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='../img/logo.png' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;padding-top:30px;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>