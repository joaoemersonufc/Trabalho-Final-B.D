<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Painel Login</title>
    <link rel="shortcut icon" href="img/logoico.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

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
                textbox.setCustomValidity('Preencha com sua matrícula');
            }
            else {
                textbox.setCustomValidity('');
            }
            return true;
        }
        function InvalidMsg2(textbox) {
            
            if (textbox.value == '') {
                textbox.setCustomValidity('Preencha com sua senha');
            }
            else {
                textbox.setCustomValidity('');
            }
            return true;
        }</script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- font-awesome-ícones -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3822b36004.js" crossorigin="anonymous"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
</head>

<body>
	<div class="center-container">
		<div class="container">
			<div class = "second-column"  style="background-color: white; border-radius: 20px; width: 60%;">
	        <h2 class="title title-second" style="margin-top: 20px;" >Painel Login</h2>
	        <p class="description description-second">Faça seu login :)</p>
	           	<form class="form" method="post" action="validarAcesso.php" id="formCadastro" >
	                <label class="label-input" for="">
	                    <i style="font-size: 23.5px ;" class="fa fa-address-card-o icon-modify" ></i>
	                    <input  id="campo_matricula" name="campo_matricula" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="text" placeholder="  Matrícula" onkeypress='return SomenteNumero(event)'>
	                </label>

	                <label class="label-input" for="">
	                    <i style="font-size: 23.5px ; padding-left:10px;" class="fas fa-lock icon-modify"></i>
	                    <input  id="campo_senha" name="campo_senha" oninvalid="InvalidMsg2(this);" oninput="InvalidMsg2(this);" required="required" type="password" placeholder="  Senha">
	                </label>
	                <span>
                       	<?php
                            $verificarURL = $_SERVER['REQUEST_URI'];
                            if(strstr($verificarURL, 'erro_login=1&')){
                                echo "<h6 style='padding-left:45px; color:red'>Matrícula e/ou Senha inválido(s)</h6>";
                           	}
                        ?>    
                    </span>

	                <div class="col-xg-4" align="center">

	                	<button class="btn btn-second" style="margin-bottom: 20px;margin-left:40px" onclick="window.location.href='index.php'">Voltar</button>

	                  	<button id="btn-login" type="submit" class="btn btn-second" style="margin-bottom: 20px; margin-left: 40px" value="login">Logar</button>
	            	</div>
	            </form>
	        </div>
	    </div>
    </div>
</body>
</html>