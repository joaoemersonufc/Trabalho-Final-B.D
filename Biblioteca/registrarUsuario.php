<?php

session_start();

require_once('database/banco.php');

$usuario = $_POST['campo_usuario'];
$matricula = $_POST['campo_matricula'];
$senha = md5($_POST['campo_senha']);


$objDb = new db();
$link = $objDb->conecta_mysql();

$usuario_existe = false;
$matricula_existe = false;

//verificar se o usuário já existe
$sql = " select * from usuarios where usuario = '$usuario' ";
if ($resultado_id = mysqli_query($link, $sql)) {

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['usuario'])) {
        $usuario_existe = true;
    }
} else {
    echo 'Erro ao tentar localizar o registro de usuário';
}

//verificar se a matricula já existe
$sql = " Select * from usuarios where matricula = '$matricula' ";
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

$sql = " insert into usuarios(usuario, matricula, senha) values ('$usuario', '$matricula', '$senha') ";

//executar a query
if (mysqli_query($link, $sql)) {
    echo 'Usuário registrado com sucesso!';
} else {
    echo 'Erro ao registrar o usuário!';
}


?>