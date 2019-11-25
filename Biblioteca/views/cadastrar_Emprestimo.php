<?php

session_start();

require_once('../database/banco.php');

$data = date('d/m/y');
$cod_livro = $_GET['codigo'];
$id_usuario = $_SESSION['matricula'];
$data_prazo	= "24/12/19";

$objDb = new db();
$link = $objDb->conecta_mysql();

$emprestimo_existe = false;

$sql = " update livro SET alugado = '1' WHERE cod = $cod_livro";
mysqli_query($link, $sql);

$sql = " update livro SET reservado = '0' WHERE cod = $cod_livro";
mysqli_query($link, $sql);


$sql = " Select * from emprestimo where cod_exemplar = '$cod_livro' ";
if ($resultado_id = mysqli_query($link, $sql)) {

    $dados_livro = mysqli_fetch_array($resultado_id);

    if ($dados_livro['cod_exemplar'] == $cod_livro) {
        $emprestimo_existe = true;
    }
}


if($emprestimo_existe){
	redirect();
}

$sql = " insert into emprestimo(data, prazo, cod_exemplar, id_usuario) values ('$data', '$data_prazo', '$cod_livro', '$id_usuario') ";

//executar a query
if (mysqli_query($link, $sql)) {
    redirect(); 
} else {
    echo 'Erro ao fazer empréstimo do livro!';
}

function redirect()
{
    header("refresh: 3;reservas.php");
        
    echo "<head><link rel='shortcut icon' href='../img/logoico.png'><title>Redirecionando...</title></head> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;padding-top:30px;'><center>Livro alugado com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='../img/logo.png' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;padding-top:30px;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>