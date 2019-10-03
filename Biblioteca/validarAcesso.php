<?php

session_start();

require_once('database/banco.php');

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = " SELECT id, usuario, matricula FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

try {
    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if (isset($dados_usuario['usuario'])) {

            $_SESSION['id_usuario'] = $dados_usuario['id'];
            $_SESSION['usuario'] = $dados_usuario['usuario'];
            $_SESSION['matricula'] = $dados_usuario['matricula'];

            header('Location: index.php');

        } else {
            header('Location: index.php?erro=1');
        }
    }
}catch(mysqli_sql_exception $e) {
    echo 'Erro na execução da consulta, favor entrar em contato com o admin do site' . $e;
}

?>