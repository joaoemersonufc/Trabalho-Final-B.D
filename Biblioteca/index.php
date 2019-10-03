<?php

	$erro_usuario	= isset($_GET['erro_usuario'])	? $_GET['erro_usuario'] : 0;
	$erro_matricula	= isset($_GET['erro_matricula'])	? $_GET['erro_matricula']	: 0;

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <!-- Compatibilidade -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Biblioteca</title>

    <!-- Adicionando CSS e ícones -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3822b36004.js" crossorigin="anonymous"></script>

    <!-- Script em Jquery -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>
        $(document).ready( function(){

            //verificar se os campos de usuário e senha foram devidamente preenchidos
            $('#btn-registrar').click(function(){

                var campo_vazio = false;

                if($('#campo_usuario').val() === ''){
                    $('#campo_usuario').css({'border-color': '#A94442'});
                    campo_vazio = true;
                } else {
                    $('#campo_usuario').css({'border-color': '#CCC'});
                }

                if($('#campo_matricula').val() === ''){
                    $('#campo_matricula').css({'border-color': '#A94442'});
                }else{
                    $('#campo_matricula').css({'border-color': '#CCC'})
                }

                if($('#campo_senha').val() === ''){
                    $('#campo_senha').css({'border-color': '#A94442'});
                    campo_vazio = true;
                } else {
                    $('#campo_senha').css({'border-color': '#CCC'});
                }

                if(campo_vazio) return false;
            });
        });
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
                                <input id="campo_usuario"  name="campo_usuario" type="text" placeholder="  Nome">
                                <?php
                                    if($erro_usuario){
                                        echo '<style= "color: #FF0000 ">Usuário já existe</style>';
                                    }
                                ?>
                            </label>

                            <label class="label-input" for="">
                                <span style="font-size: 13.5px ;"><i class="fa fa-address-card-o icon-modify" ></i></span>
                                <input id="campo_matricula" name="campo_matricula" type="text" placeholder="  Matrícula">
                                <?php
                                    if($erro_matricula){
                                        echo 'style="color:#FF0000"Matricula já existe';
                                    }
                                ?>
                            </label>

                            <label class="label-input" for="">
                                <i class="fas fa-lock icon-modify"></i>
                                <input id="campo_senha" name="campo_senha" type="password" placeholder="  Senha">
                            </label>

                        <button id="btn-registrar" type="submit" class="btn btn-second " value="cadastro">Cadastrar</button>
                    </form>
            </div><!--Segunda coluna-->
        </div><!-- Primeira coluna -->
    </div>
</body>
</html>