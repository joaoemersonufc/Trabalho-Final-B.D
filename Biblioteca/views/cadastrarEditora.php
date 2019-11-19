<?php

session_start();

require_once('../database/banco.php');

$codigo = $_POST['campo_codigo'];
$nome = $_POST['campo_nome'];
$telefone = $_POST['campo_contatoTelefone'];
$email = $_POST['campo_contatoEmail'];


$objDb = new db();
$link = $objDb->conecta_mysql();

$editora_existe = false;
$codigo_existe = false;

//verificar se a editora já existe
$sql = " Select * from editora where nome = '$nome' ";
if ($resultado_nome = mysqli_query($link, $sql)) {

    $dados_editora = mysqli_fetch_array($resultado_nome);
    if (isset($dados_editora['nome'])) {
        $editora_existe = true;
    }
} else {
    echo 'Erro ao tentar localizar o registro de editora';
}

//verificar se o código da editora já existe
$sql = " Select * from editora where cod = '$codigo' ";
if ($resultado_cod = mysqli_query($link, $sql)) {

    $dados_editora = mysqli_fetch_array($resultado_cod);

    if (isset($dados_editora['codigo'])) {
        $codigo_existe = true;
    }
} else {
    echo 'Erro ao tentar localizar o registro de editora';
}


if ($editora_existe || $codigo_existe) {

    $retorno_get = '';

    if ($editora_existe) {
        $retorno_get .= "erro_editora=1&";
    }

    if ($codigo_existe) {
        $retorno_get .= "erro_codigo=1&";
    }
    header('Location: livros.php?' . $retorno_get);
    die();
}

$sql = " insert into editora(cod, nome, telefone, email) values ('$codigo', '$nome', '$telefone', '$email') ";

//executar a query
if (mysqli_query($link, $sql)) {
    redirect(); 
} else {
    echo 'Erro ao registrar o editora!';
}

function redirect()
{
    header("refresh: 3;livros.php");
        
    echo "<head><link rel='shortcut icon' href='../img/logoico.png'><title>Redirecionando...</title></head> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;padding-top:30px;'><center>Editora registrada com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='../img/logo.png' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;padding-top:30px;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>