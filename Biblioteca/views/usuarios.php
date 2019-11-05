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

<title>Usuários</title>
<link rel="shortcut icon" href="../img/logoico.png">
<link rel="stylesheet" href="../css/livros.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/3822b36004.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src='js/bootstrap.min.js'></script>
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
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 mx-auto actions" style="padding-top: 25px">
            <a href="./home.php" class="btn btn-outline-dark" style="border-radius: 30px"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
        </div>
        <div class="col-xl-12 mt-3 mx-auto" style="padding-top: 20px">
            <h1 class="font-weight-lighter" style="border:bold;color: #9457A1;">Usuários</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12 text-right">
                    <a href="#modal_criar"  data-toggle="modal" class="btn btn-outline-dark btn-sm" style="border-radius: 30px;"><i class="fa fa-plus"></i> Novo Usuário</a>
                </div>
                <div class="col-2 mx-auto text-center">
                   <!-- <h1><i class="fa fa-users" style="color: #9457A1;padding-top: 30px; margin-top: 20px"></i></h1>
                    <hr class="my-1">-->
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-3 py-5 card-news">
                    <img src='../img/brasaoUFC.jpg' class="img-assoc image" style="border-radius:30px;width: 280px;height: 360px;" alt="">
                    <div class="middle">
                        <div class="text" style="padding-right: 30px">
                            <h5 class="text-dark" align="center"></h5>
                            <a href="#modal_excluir" data-toggle="modal" align="center" class="btn btn-outline-danger my-1">
                                Excluir Usuário
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                <hr>
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
                <!--<div class="row mt-4">
                    <div class="col-12 text-center">
                        <h2 class="font-weight-lighter">Sem Associados para visualizar</h2>

                    </div>
                </div>
            -->
        </div>
    </div>
</div>
<div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="tituloModalBase" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <h2 class="text-center">Deseja realmente excluir este Usuário ?</h2>
                    <p class="text-center text-danger"><b>OBS:</b> A ação não poderá ser desfeita</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Confirmar e Excluir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#modal_excluir").on("show.bs.modal", function(e) {
        var link = $(e.relatedTarget);
        var id = link.attr('id');

        // alert(JSON.stringify(data[id].data))
        if(link.attr("modal-size")!= undefined){
            $(this).find(".modal-dialog").attr('class', 'modal-dialog '+link.attr("modal-size"))
        } else{
            $(this).find(".modal-dialog").attr('class', 'modal-dialog')
        }

        $(this).find('[name=id]').val(id)

    });

    $("#modal_excluir").on("hidden.bs.modal", function(e) {

        $(this).find('[name=id]').val('')

    });
</script>

<div class="modal" id="modal_criar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Novo Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="cadastrarUsuario.php" id="formCadastroUsuario" >
        <div class="modal-body">
            <label class="label-input" for="">
                    <br>Nome:
                    <input id="campo_nome"  class="form-control" name="campo_nome" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="text" style="color:black" placeholder="Nome">
                </label>
                <span>
                    <?php
                        $verificarURL = $_SERVER['REQUEST_URI'];
                        if(strstr($verificarURL, 'erro_nomeUsuario=1&')){
                            echo "<h6 style='padding-left:35px; color:red'>Usuário já cadastrado</h6>";
                        }
                    ?>
                    
                </span>
                                
                <label class="label-input" for="">
                    <br>Matrícula:
                    <input id="campo_matricula" class="form-control" name="campo_matricula" oninvalid="InvalidMsg2(this);" oninput="InvalidMsg2(this);" required="required" type="text" placeholder="Matrícula" style="color:black" onkeypress='return SomenteNumero(event)'>
                </label>
                <span>
                    <?php
                        $verificarURL = $_SERVER['REQUEST_URI'];
                        if(strstr($verificarURL, 'erro_matricula=1&')){
                            echo "<h6 style='color:red'>Esta matricula já está cadastrada</h6>";
                        }
                    ?>
                </span>
                <div>
                    Senha:
                    <input id="campo_senha" class="form-control" name="campo_senha" oninvalid="InvalidMsg3(this);" oninput="InvalidMsg3(this);" required="required" type="text" placeholder="Senha" style="width: 230px;color:black"><br>
                </div>
        </div><hr>
        <span style="padding-left:235px">
            <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-success">Salvar Mudanças</button>
        </span>
      </form>
    </div>
  </div>
</div>
<script>
    $('#formCadastroUsuario').submit(function(){
        $(this)[0].reset();
    });
</script>