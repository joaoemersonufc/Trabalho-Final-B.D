<?php

session_start();

require_once('database/banco.php');

$matricula = $_POST['campo_matricula'];
$senha = $_POST['campo_senha'];

$sql = " SELECT matricula, senha FROM usuarios WHERE matricula = '$matricula' AND senha = '$senha' ";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

try {
    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if (isset($dados_usuario['matricula'])) {

            $_SESSION['senha'] = $dados_usuario['senha'];
            $_SESSION['matricula'] = $dados_usuario['matricula'];

            header('Location: home.php');

        } else {
            header('Location: index.php');
        }
    }
}catch(mysqli_sql_exception $e) {
    echo 'Erro na execução da consulta, favor entrar em contato com o admin do site' . $e;
}

?>