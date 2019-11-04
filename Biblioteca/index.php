<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/logoico.png">

    <!-- Compatibilidade -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteca</title>

    <!-- Adicionando CSS e ícones -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3822b36004.js" crossorigin="anonymous"></script>

    <!-- Script em Jquery -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    
    <script>
        function SomenteNumero(e){
            var tecla=(window.event)?event.keyCode:e.which;   
            if((tecla>47 && tecla<58)) return true;
            else{
                if (tecla==8 || tecla==0) return true;
            else  return false;
            }
        }
    </script>

    <script>
        function InvalidMsg(textbox) {
            
            if (textbox.value == '') {
                textbox.setCustomValidity('Preencha com seu nome');
            }
            else {
                textbox.setCustomValidity('');
            }
            return true;
        }
        function InvalidMsg2(textbox) {
            
            if (textbox.value == '') {
                textbox.setCustomValidity('Preencha com sua matrícula');
            }
            else {
                textbox.setCustomValidity('');
            }
            return true;
        }
        function InvalidMsg3(textbox) {
            
            if (textbox.value == '') {
                textbox.setCustomValidity('Preencha com sua senha');
            }
            else {
                textbox.setCustomValidity('');
            }
            return true;
        }
    </script>

</head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem-vindo</h2>
                <p class="description description-primary" style="color: azure;"><b>Agora consulte seus livros online!</b></p>
                <button id="entrar" class="btn btn-primary" onclick="window.location = 'logar.php'" >Entrar</button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Crie sua conta</h2>
                    <p class="description description-second">É rapido, prometo :)</p>
                    <form class="form" method="post" action="registrarUsuario.php" id="formCadastro" >
                            <label class="label-input" for="">
                                <i class="far fa-user icon-modify"></i>
                                <input id="campo_usuario"  name="campo_usuario" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="text" placeholder="  Nome">
                            </label>
                            <span>
                                <?php
                                    $verificarURL = $_SERVER['REQUEST_URI'];
                                    if(strstr($verificarURL, 'erro_usuario=1&')){
                                        echo "<h6 style='padding-left:35px; color:red'>Nome de usuário já cadastrado</h6>";
                                    }
                                ?>    
                            </span>
                            
                            <label class="label-input" for="">
                                <i style="font-size: 13.5px ; padding-left:4px;" class="fa fa-address-card-o icon-modify" ></i>
                                <input id="campo_matricula" name="campo_matricula" oninvalid="InvalidMsg2(this);" oninput="InvalidMsg2(this);" required="required" type="text" placeholder="  Matrícula" onkeypress='return SomenteNumero(event)'>
                            </label>
                            <span>
                                <?php
                                    $verificarURL = $_SERVER['REQUEST_URI'];
                                    if(strstr($verificarURL, 'erro_matricula=1&')){
                                        echo "<h6 style='padding-left:35px; color:red'>Esta matrícula já está cadastrada</h6>";
                                    }
                                ?>    
                            </span>
                            <label class="label-input" for="">
                                <i class="fas fa-lock icon-modify"></i>
                                <input id="campo_senha" name="campo_senha" oninvalid="InvalidMsg3(this);" oninput="InvalidMsg3(this);" required="required" type="password" placeholder="  Senha">
                            </label>

                        <button id="btn-registrar" type="submit" class="btn btn-second " value="cadastro">Cadastrar</button>
                    </form>
            </div><!--Segunda coluna-->
        </div><!-- Primeira coluna -->
    </div>
</body>
</html>