<?php
	
    session_start();

    if(!isset($_SESSION['matricula'])){
        header('Location: logar.php?erro=1');
    }
?>

<head>
    <meta charset="UTF-8">

    <!-- Compatibilidade -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteca</title>

    <link rel="stylesheet" href="css/home.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3822b36004.js" crossorigin="anonymous"></script>

    <style type="text/css">
    	.title-second {
    		color: #9457A1;
		}

		.title {
    		font-weight: bold;
    		text-transform: capitalize;
		}
    </style>

</head> 
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 mt-3 mx-auto text-center">
            <h1 class=" title title-second">Painel Administrativo</h1>
            <hr>
        </div>
    </div>
    <div class="row cards px-lg-5">

        <div class="col-lg-3 mb-2">
            <a href="./livros.php">
                <div class="card h-100 px-0 border-left-info card-categorias" style="color: #9457A1">
                    <div class="card-body text-center">
                        <i class="fas fa-book fa-5x"></i>
                        <hr>
                        <h3 class="mt-2 font-weight-lighter">Livros</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-2">
            <a href="/sis/noticias">
                <div class="card h-100 px-0 border-left-info card-categorias" style="color: #9457A1">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar-alt fa-5x"></i>
                        <hr>
                        <h3 class="mt-2 font-weight-lighter">Reservas</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-2">
            <a href="/sis/associados">
                <div class="card h-100 px-0 border-left-info card-categorias" style="color: #9457A1">
                    <div class="card-body text-center">
                        <i class="fas fa-retweet fa-5x"></i>
                        <hr>
                        <h3 class="mt-2 font-weight-lighter">Devoluções</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-2">
            <a href="/sis/noticias">
                <div class="card h-100 px-0 border-left-info card-categorias" style="color: #9457A1">
                    <div class="card-body text-center">
                        <i class="fas fa-hand-holding-heart fa-5x"></i>
                        <hr>
                        <h3 class="mt-2 font-weight-lighter">Empréstimos</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-2">
            <a href="/sis/dados">
                <div class="card h-100 px-0 border-left-info card-categorias" style="color: #9457A1">
                    <div class="card-body text-center">
                        <i class="fa fa-user fa-5x"></i>
                        <hr>
                        <h3 class="mt-2 font-weight-lighter">Perfil</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-2">
            <a href="/sis/midia">
                <div class="card h-100 px-0 border-left-info card-categorias" style="color: #9457A1">
                    <div class="card-body text-center">
                        <i class="fas fa-history fa-5x"></i>
                        <hr>
                        <h3 class="mt-2 font-weight-lighter">Histórico</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-2">
            <a href="/sis/associados">
                <div class="card h-100 px-0 border-left-info card-categorias" style="color: #9457A1">
                    <div class="card-body text-center">
                        <i class="fas fa-question-circle fa-5x"></i>
                        <hr>
                        <h3 class="mt-2 font-weight-lighter">Ajuda</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-2">
            <a href="index.php" onclick="event.preventDefault();window.location.href='index.php'">
                <div class="card h-100 px-0 border-left-info card-categorias" style="color: #9457A1">
                    <div class="card-body text-center">
                        <i class="fa fa-sign-out fa-5x"></i>
                        <hr>
                        <h3 class="mt-2 font-weight-lighter">Sair</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
