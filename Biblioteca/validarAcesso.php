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

        if (isset($dados_usuario['matricula']) && isset($dados_usuario['senha'])) {

            $_SESSION['senha'] = $dados_usuario['senha'];
            $_SESSION['matricula'] = $dados_usuario['matricula'];

            redirect();

        }
        else if (!isset($dados_usuario['senha'])) {
            header('Location: logar.php?erro_login=1&');
            die();
        }

    }
}catch(mysqli_sql_exception $e) {
    echo 'Erro na execução da consulta, favor entrar em contato com o admin do site' . $e;
}


function redirect()
{
    header("refresh: 3;home.php");
        
    echo "<title>Redirecionando...</title> <body style='padding-top:30px' bgcolor='#eeeeee'><font color='#9457A1' style='border:bold; text-transform:uppercase;'><center>Login realizado com sucesso!<br><hr>Aguarde, redirecionando em 3 segundos...<br><img src='https://' width='284' heigth='284' style='opacity:0.7;filter:alpha(opacity=70);border:bold;'><br><hr>Se o redirecionamento não funcionar automaticamente, retorne a página inicial e tente novamente...";

    exit;
}

?>