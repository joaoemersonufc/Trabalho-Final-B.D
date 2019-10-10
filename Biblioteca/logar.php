<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Painel Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<script>
	        $(document).ready( function(){

	            //verificar se os campos de usuário e senha foram devidamente preenchidos
	            $('#btn-login').click(function(){

	                var campo_vazio = false;

	                if($('#campo_matricula').val() === ''){
	                    $('#campo_matricula').css({'border-color': '#A94442', 'border-width' : '3px'});
	                    campo_vazio = true;
	                }else{
	                    $('#campo_matricula').css({'border-color': '#CCC', 'border-width' : '1px'})
	                }

	                if($('#campo_senha').val() === ''){
	                    $('#campo_senha').css({'border-color': '#A94442', 'border-width' : '3px'});
	                    campo_vazio = true;
	                } else {
	                    $('#campo_senha').css({'border-color': '#CCC', 'border-width' : '1px'});
	                }


	                if(campo_vazio) return false;
	            });
	        });
	</script>

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
	                    <input id="campo_matricula" name="campo_matricula" type="text" placeholder="  Matrícula">
	                </label>

	                <label class="label-input" for="">
	                    <i style="font-size: 23.5px ; padding-left:10px;" class="fas fa-lock icon-modify"></i>
	                    <input id="campo_senha" name="campo_senha" type="password" placeholder="  Senha">
	                </label>

	                   <button id="btn-login" type="submit" class="btn btn-second" style="margin-bottom: 20px;" value="login">Logar</button>
	            </form>
	        </div>
	    </div>
    </div>
</body>
</html>