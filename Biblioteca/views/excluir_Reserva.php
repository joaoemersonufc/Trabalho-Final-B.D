<?php

session_start();

require_once('../database/banco.php');

$codigo = $_GET['codigo'];

$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = " Select * from reserva WHERE cod = $codigo";
$con = mysqli_query($link, $sql);
$codigo_livro = $con->fetch_array();
$cod_livro = $codigo_livro['cod_livro'];


$sql = " update livro SET reservado = '0' WHERE cod = '$cod_livro' ";
mysqli_query($link, $sql);

$sql = " delete from reserva where cod = '$codigo' ";

//executar a query
if (mysqli_query($link, $sql)) {
    redirect(); 
} else {
    echo 'Erro ao excluir a reserva!';
}

function redirect()
{
    header("refresh: 3;reservas.php");
        
    echo "<head><link rel='shortcut icon' href='../img/logoico.png'><title>Redirecionando...</title></head> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;padding-top:30px;'><center>Reserva excluida com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='../img/logo.png' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;padding-top:30px;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>