<?php

session_start();

require_once('../database/banco.php');

$id = $_GET['codigo'];


$objDb = new db();
$link = $objDb->conecta_mysql();

$usuario_existe = true;

//verificar se o usuário já existe
$sql = " Select * from usuario where id = '$id' ";
if ($resultado_id = mysqli_query($link, $sql)) {

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (!isset($dados_usuario['id'])) {
        $usuario_existe = false;
    }
} else {
    echo 'Erro ao tentar localizar o registro de usuário';
}


if (!($usuario_existe)) {

    $retorno_get = '';

    if ($usuario_existe) {
        $retorno_get .= "erro_usuario=1&";
    }

    header('Location: usuarios.php?' . $retorno_get);
    die();
}

$sql = " delete from usuario where id = '$id' ";

//executar a query
if (mysqli_query($link, $sql)) {
    redirect(); 
} else {
    echo 'Erro ao excluir o usuário!';
}

function redirect()
{
    header("refresh: 3;usuarios.php");
        
    echo "<head><link rel='shortcut icon' href='../img/logoico.png'><title>Redirecionando...</title></head> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;padding-top:30px;'><center>Usuário excluido com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='../img/logo.png' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;padding-top:30px;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>