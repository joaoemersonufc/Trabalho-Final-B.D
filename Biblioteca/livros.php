<?php
    
    session_start();

    if(!isset($_SESSION['matricula'])){
        header('Location: logar.php?erro=1');
    }
?>
<link rel="stylesheet" href="css/livros.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/3822b36004.js" crossorigin="anonymous"></script>

<style>
    .title-second {
       color: #9457A1;
    }

    .title {
        font-weight: bold;
        text-transform: capitalize;
    }
    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .card-news:hover .image {
        opacity: 0.1;
    }

    .card-news:hover .middle {
        opacity: 1;
    }

    .text {
        /* background-color: #4CAF50; */
        color: white;
        font-size: 16px;
        /* padding: 16px 32px; */
    }

    .text .btn{
        border-radius: 20px;
    }
</style>
<div class="container-fluid">

    <div class="row" style="padding-top: 25px">
        <div class="col-xl-12 mx-auto actions">
                <a href="./home.php" class="btn btn-outline-dark" style="border-radius: 30px"><i class="fa fa-arrow-circle-left">
                </i> Voltar</a>
        </div>
        <div class="col-xl-12 mt-3 mx-auto actions" style="padding-top: 20px">
            <h1 class="font-weight-lighter" style="color: #9457A1;border: bold;">Livros</h1>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="border-radius: 30px;">
                            Ordenar Por <i class="fa fa-filter"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="">Mais lidas</a>
                            <a class="dropdown-item" href="">Ordem Crescente</a>
                            <a class="dropdown-item" href="">Ordem Decrescente</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="dropdown">
                        <a href="/sis/noticias/new" class="btn btn-outline-dark btn-sm" style="border-radius: 30px;"><i class="fa fa-plus"></i> Cadastrar Livros</a>
                        <button class="btn btn-outline-dark dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="border-radius: 30px;">
                        <i class="fa fa-bookmark"></i> Categorias de Livros
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="">Nova Categoria de Livros</a>
                            <a class="dropdown-item" href="">Ver Categorias de Livros</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-right mt-2">
                    <div class="form-group form-search" style="display: none">
                        <div class="input-group">
                            <input type="text" class="form-control" name="input-search" placeholder="Pesquisar Livro.." style="border-top-left-radius: 20px; border-bottom-left-radius: 20px">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button" id="button-search" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-dark-purple" type="button" id="show-form"><i class="fa fa-search"></i></button>
                </div>
                <div class="col-2 mx-auto text-center" style="padding-top: 40px">
                    <h1><i class="fas fa-book" style="color: #9457A1"></i></h1>
                    <hr class="my-1">
                </div>
            </div>
            <div class="row align-items-center">
            </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <h2 class="font-weight-lighter">Sem livros para visualizar. Que tal cadastrar alguns?</h2>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Cadastrar Livro</button>
        </div>
    </div>
</div>