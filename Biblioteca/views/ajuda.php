<style>
    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        width: 100%;
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

    .img-assoc{
        width: 100%;
        min-height: 250px;
    }
</style>

<title>Ajuda</title>
<link rel="shortcut icon" href="../img/logoico.png">
<link rel="stylesheet" href="../css/livros.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/3822b36004.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src='js/bootstrap.min.js'></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 mx-auto actions" style="padding-top: 25px">
            <a href="./home.php" class="btn btn-outline-dark" style="border-radius: 30px"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
        </div>
        <div class="col-xl-12 mt-3 mx-auto" style="padding-top: 20px">
            <h1 class="font-weight-lighter" style="border:bold;color: #9457A1;">Ajuda</h1>
            <hr>
            <div class="row">
                <div align="center">
                <h1 style="padding-left: 20px;padding-top: 50px">O que sou?</h1>
                <h4>Olá! Me chamo Bibliotech e basicamente sou um sistema desenvolvido por dois alunos do curso de Engenharia de Software da UFC campus
                de Russas. Meu intuito é facilitar o cadastro, empréstimo e devolução dos mais variados tipos de livros (Biblioteca Virtual), sou um sistema em fase Alfa então demais melhorias ocorrerão com o tempo e com as requisições dos meus usuários :D. Espero que eu possa ser bastante útil durante o uso e caso tenha sugestões ou não estou funcionando corretamente contate os desenvolvedores.</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                </div>
                <div class="col-3 ml-auto">
                    <div class="float-right">
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>