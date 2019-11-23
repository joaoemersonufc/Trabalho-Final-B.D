<?php

session_start();

require_once('../database/banco.php');

$data = date('d/m/y');
$id_usuario = $_SESSION['matricula'];
$cod_livro = $_GET['codigo'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " update livro SET reservado = '1' WHERE cod = $cod_livro";
mysqli_query($link, $sql);

$sql = " insert into reserva(data, id_usuario, cod_livro) values ('$data', '$id_usuario', '$cod_livro') ";

//executar a query
if (mysqli_query($link, $sql)) {
    redirect(); 
} else {
    echo 'Erro ao reservar o livro!';
}

function redirect()
{
    header("refresh: 3;livros.php");
        
    echo "<head><link rel='shortcut icon' href='../img/logoico.png'><title>Redirecionando...</title></head> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;padding-top:30px;'><center>Livro reservado com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='../img/logo.png' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;padding-top:30px;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>