<?php
require_once("../database/banco.php"); // caminho do seu arquivo de conexão ao banco de dados
    $consulta = "SELECT * FROM usuario";
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $con      = mysqli_query($link,$consulta) or die();
?>

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
        <div class="col-xl-12 mt-3 mx-auto" style="padding-top: 20px;">
            <h1 class="font-weight-lighter" style="border:bold;color: #9457A1;">Usuários</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12 text-right">
                    <style type="text/css">
                    </style>
                    <a href="#modal_criar"  data-toggle="modal" class="btn btn-outline-dark btn-sm" style="border-radius: 30px;"><i class="fa fa-plus"></i> Novo Usuário</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php while($dado = $con->fetch_array()) { ?>
    <style type="text/css">
        div{
            display: inline-block;
        }
    </style>
        <div style="width:auto; padding-left:60px" class="col-lg-3 py-5 card-news">
            <img src='../img/avatar.png' style="width:250px;height:250px" class="img-assoc image" alt="">
            <div style="padding-left:50px" class="middle">
                <div class="text">
                    <h5 class="text-dark" align="center"></h5>
                    <tr>
                      <td><?php echo "<b><font color=\"#9457A1\">" . $dado['nome'] . "</font></b>"?></td>
                      <td><?php echo "<b><font color=\"#000000\">" . $dado['matricula'] . "</font></b>"?></td>
                    </tr>
                    <br>
                    <a href="excluir_Usuario.php?codigo=<?php echo $dado['id']; ?>" align="center" class="btn btn-outline-danger my-1">
                            Excluir Usuário
                    <i class="fa fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
<?php } ?>
<hr>
<div class="modal" id="modal_criar" tabindex="-1" role="dialog" >
  <div  style="display: flex" class="modal-dialog" role="document">
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
                            echo "<script>
                                $(document).ready(function() {
                                    $('#modal_criar').modal('show');
                                })
                            </script><h6 style='padding-left:35px; color:red'>Usuário já cadastrado</h6>";
                        }
                    ?>
                    
                </span>
                                
                <label class="label-input" for="">
                    <br>Matrícula:
                    <input id="campo_matricula" class="form-control" name="campo_matricula" oninvalid="InvalidMsg2(this);" oninput="InvalidMsg2(this);" required="required" type="text" maxlength="6" placeholder="Matrícula" style="color:black" onkeypress='return SomenteNumero(event)'>
                </label>
                <span>
                    <?php
                        $verificarURL = $_SERVER['REQUEST_URI'];
                        if(strstr($verificarURL, 'erro_matricula=1&')){
                            echo "<script>
                                $(document).ready(function() {
                                    $('#modal_criar').modal('show');
                                })
                            </script><h6 style='color:red'>Esta matricula já está cadastrada</h6>";
                        }
                    ?>
                </span>
                <label>
                    Senha:
                    <input id="campo_senha" class="form-control" name="campo_senha" oninvalid="InvalidMsg3(this);" oninput="InvalidMsg3(this);" required="required" type="text" placeholder="Senha" style="width: 230px;color:black"><br>
                </label>
        </div><hr>
        <span style="padding-left:235px">
            <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="submit" id="salvar" value="cadastro" class="btn btn-success">Salvar Mudanças</button>
        </span>
      </form>
    </div>
  </div>
</div>