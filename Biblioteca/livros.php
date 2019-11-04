<?php
    
    session_start();

    if(!isset($_SESSION['matricula'])){
        header('Location: logar.php?erro=1');
    }
?>
<title>Livros</title>
<link rel="stylesheet" href="css/livros.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/3822b36004.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src='js/bootstrap.min.js'></script>
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
<div class="container-fluid">

    <div class="row" style="padding-top: 25px">
        <div class="col-xl-12 mx-auto actions">
                <a href="./home.php" class="btn btn-outline-dark" style="border-radius: 30px"><i class="fa fa-arrow-circle-left">
                </i> Voltar</a>
        </div>
        <div class="col-xl-12 mt-3 mx-auto actions" style="padding-top: 20px">
            <h1 class="font-weight-lighter title-second" style="border: bold;">Livros</h1>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="dropdown nav">
                        <button class="btn btn-outline-dark dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="border-radius: 30px;">
                            Ordenar Por <i class="fa fa-filter"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Ordem Crescente</a>
                            <a class="dropdown-item" href="#">Ordem Decrescente</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="dropdown">
                        <a href="#modal" data-toggle="modal" class="btn btn-outline-dark btn-sm" style="border-radius: 30px;"><i class="fa fa-plus"></i> Cadastrar Livros</a>

                        <button class="btn btn-outline-dark dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="border-radius: 30px;">
                        <i class="fa fa-bookmark"></i> Editoras dos Livros
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#modal2" data-toggle="modal">Cadastrar Editora</a>
                            <!--<a class="dropdown-item" href="#modal2" data-toggle="modal">Ver Editoras</a>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-right mt-2">
                    <div class="input-group">
                        <input type="text" class="form-control" name="input-search" placeholder="Pesquisar Livro.." style="border-top-left-radius: 20px; border-bottom-left-radius: 20px">
                        <div class="input-group-append">
                            <button class="btn btn-dark-purple" type="button" id="show-form"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
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
        <hr>
    </div>
</div>

<!-- Modal Cadastrar Livro-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Livro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="cadastrarLivro.php" id="formCadastroLivro" >
        <div class="modal-body">
            <label class="label-input" for="">
                <br>Código:
                <input id="campo_codigoEditora"  class="form-control" name="campo_codigoEditora" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="text" placeholder="Código da Editora"  onkeypress='return SomenteNumero(event)'>
            </label>
            <span>
                <?php
                    $verificarURL = $_SERVER['REQUEST_URI'];
                    if(strstr($verificarURL, 'erro_codigoEditora=1&')){
                        echo "<h6 style='padding-left:35px; color:red'>Editora já cadastrada</h6>";
                    }
                ?>
            </span>
                                
            <label class="label-input" for="">
                <br>Título:
                <input id="campo_titulo" class="form-control" name="campo_titulo" oninvalid="InvalidMsg2(this);" oninput="InvalidMsg2(this);" required="required" type="text" placeholder="Título">
            </label>
            <span>
                <?php
                    $verificarURL = $_SERVER['REQUEST_URI'];
                    if(strstr($verificarURL, 'erro_titulo=1&')){
                        echo "<h6 style='padding-left:35px; color:red'>Este livro já está cadastrado</h6>";
                    }
                ?>
            </span>
            <label class="label-input" for="">
                <br>Edição:
                <input id="campo_edicaoLivro"  class="form-control" name="campo_edicaoLivro" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="text" placeholder="Edição do Livro"  onkeypress='return SomenteNumero(event)'>
            </label>

            <label class="label-input" for="">
                <br>Sinopse:
                <textarea cols="30" rows="5" id="campo_sinopse" style="width: 465px;height: 340px;resize: none;" class="form-control" name="campo_sinopse" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="text"></textarea>
            </label>

            <label class="label-input" for="">
                <br>Genero:
                <input id="campo_genero"  class="form-control" name="campo_genero" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="text" placeholder="Gênero do Livro">
            </label>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="button" type="submit" value="cadastro" class="btn btn-success">Salvar mudanças</button>
            </div>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal Cadastrar Editora-->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Editora</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="cadastrarEditora.php" id="formCadastroEditora" >
            <div class="modal-body">
                <label class="label-input" for="">
                    <br>Código:
                    <input id="campo_codigo"  class="form-control" name="campo_codigo" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="text" placeholder="Código Editora"  onkeypress='return SomenteNumero(event)'>
                </label>
                <span>
                    <?php
                        $verificarURL = $_SERVER['REQUEST_URI'];
                        if(strstr($verificarURL, 'erro_codigoEditora=1&')){
                            echo "<h6 style='padding-left:35px; color:red'>Editora já cadastrada</h6>";
                        }
                    ?>
                    
                </span>
                                
                <label class="label-input" for="">
                    <br>Nome:
                    <input id="campo_nome" class="form-control" name="campo_nome" oninvalid="InvalidMsg2(this);" oninput="InvalidMsg2(this);" required="required" type="text" placeholder="Nome">
                </label>
                <span>
                    <?php
                        $verificarURL = $_SERVER['REQUEST_URI'];
                        if(strstr($verificarURL, 'erro_nomeEditora=1&')){
                            echo "<h6 style='padding-left:35px; color:red'>Esta editora já está cadastrada</h6>";
                        }
                    ?>
                </span>
                <label class="label-input"  for="">
                    Contato:
                    <input id="campo_contato" class="form-control" name="campo_contato" oninvalid="InvalidMsg3(this);" oninput="InvalidMsg3(this);" required="required" type="text" placeholder="Telefone"  onkeypress='return SomenteNumero(event)'>
                </label>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="button" type="submit" value="cadastro" class="btn btn-success">Salvar mudanças</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>