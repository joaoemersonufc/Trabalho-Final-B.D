<?php

session_start();

require_once('database/banco.php');

$usuario = $_POST['campo_usuario'];
$matricula = $_POST['campo_matricula'];
$senha = ($_POST['campo_senha']);


$objDb = new db();
$link = $objDb->conecta_mysql();

$usuario_existe = false;
$matricula_existe = false;

//verificar se o usuário já existe
$sql = " Select * from usuario where nome = '$usuario' ";
if ($resultado_id = mysqli_query($link, $sql)) {

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['usuario'])) {
        $usuario_existe = true;
    }
} else {
    echo 'Erro ao tentar localizar o registro de usuário';
}

//verificar se a matricula já existe
$sql = " Select * from usuario where matricula = '$matricula' ";
if ($resultado_id = mysqli_query($link, $sql)) {

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['matricula'])) {
        $matricula_existe = true;
    }
} else {
    echo 'Erro ao tentar localizar o registro de matricula';
}


if ($usuario_existe || $matricula_existe) {

    $retorno_get = '';

    if ($usuario_existe) {
        $retorno_get .= "erro_usuario=1&";
    }

    if ($matricula_existe) {
        $retorno_get .= "erro_matricula=1&";
    }
    header('Location: index.php?' . $retorno_get);
    die();
}

$sql = " insert into usuario(nome, matricula, senha) values ('$usuario', '$matricula', '$senha') ";

//executar a query
if (mysqli_query($link, $sql)) {
    redirect(); 
} else {
    echo 'Erro ao registrar o usuário!';
}

function redirect()
{
    header("refresh: 3;index.php");
        
    echo "<head><link rel='shortcut icon' href='img/logoico.png'><title>Redirecionando...</title></head> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;padding-top:30px;'><center>Usuário registrado com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='img/logo.png' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;padding-top:30px;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>