<?php
    
    session_start();

    if(!isset($_SESSION['matricula'])){
        header('Location: logar.php?erro=1');
    }

     require_once("../database/banco.php"); // caminho do seu arquivo de conexão ao banco de dados
    $consulta = "SELECT * FROM emprestimo  ORDER BY data ASC";
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $con      = mysqli_query($link,$consulta) or die();

    $VERIFICADOR = false;
?>

<title>Empréstimos</title>
<link rel="shortcut icon" href="../img/logoico.png">
<link rel="shortcut icon" href="img/logoico.png">
<link rel="stylesheet" href="../css/livros.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/3822b36004.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src='js/bootstrap.min.js'></script>
<style>

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
            <h1 class="font-weight-lighter title-second" style="border:bold;color: #9457A1;">Empréstimos</h1>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="border-radius: 30px;">
                            Ordenar Por <i class="fa fa-filter"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="emprestimoscrescente.php">Ordem Crescente</a>
                            <a class="dropdown-item" href="emprestimosdecrescente.php">Ordem Decrescente</a>
                        </div>
                    </div>
                </div>
                <!--<div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" class="form-control" name="input-search" placeholder="Pesquisar Empréstimo.." style="border-top-left-radius: 20px; border-bottom-left-radius: 20px"/>
                        <div class="input-group-append">
                            <button class="btn btn-dark-purple" type="button" id="show-form"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>-->
            </div>
                        <?php while($dado = $con->fetch_array()) { ?>
                            <style type="text/css">
                                div{
                                    display: inline-block;
                                }
                            </style>
                        <?php
                            
                            $dadinho = $dado['cod'];
                            $const = " Select * from emprestimo WHERE cod = '$dadinho'";
                            $con2 = mysqli_query($link, $const);
                            $codigo_livro = $con2->fetch_array();
                            $cod_livro = $codigo_livro['cod_exemplar'];

                            $const2 = " select * from livro WHERE cod = '$cod_livro' ";
                            $con3 = mysqli_query($link,$const2);
                            $dado2 = $con3->fetch_array();

                            if($dado2['alugado'] == 1){ 

                        ?>
                        <div style="width:auto; padding-left:60px" class="col-lg-3 py-5 card-news">
                            <img src="../img/livroroxo.png" style="width:250px;height:250px" class="img-assoc image" alt="">
                            <div style="padding-left:50px" class="middle">
                                <div class="text">
                                    <h5 class="text-dark" align="center"></h5>
                                    <tr>
                                      <td><?php echo "<b><font color=\"#9457A1\">" . $dado['data'] . "</font></b>"?></td>
                                      <td><?php echo "<b><font color=\"#9457A1\"> Até o dia: " . $dado['prazo'] . "</font></b>"?></td>
                                      <td><?php echo "<b><font color=\"#000000\">" . $dado['id_usuario'] . "</font></b>"?></td>
                                    </tr>
                                    <br>
                                    <a class="btn btn-outline-primary my-1"  href="#modal-<?php echo $dado['cod']; ?>"data-toggle="modal">Ver informações
                                    <i class="fa fa-info-circle"></i>
                                    </a>
                                    <a href="cadastrar_Devolucao.php?codigo=<?php echo $dado['cod']; ?>&codigo2=<?php echo $dado2['cod']; ?>" align="center" class="btn btn-outline-success my-1">
                                            Realizar Devolução
                                    <i class="fa fa-retweet"></i>
                                    </a>
                                    <a href="excluir_Emprestimo.php?codigo=<?php echo $dado2['cod']; ?>&codigo2=<?php echo $dado['cod'] ?>" align="center" class="btn btn-outline-danger my-1">
                                            Excluir Empréstimo
                                    <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-<?php echo $dado['cod']; ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document" style="display: flex">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Autor:</h5>
                               
                                <?php echo " <b><font color=\"#0000\"> " . $dado2['autor'] . " </font></b>"?>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Sinopse:</p>
                                <?php echo " <b><font color=\"#0000\"> " . $dado2['sinopse'] . " </font></b>"?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <?php $VERIFICADOR = true; } }?>
                <?php if(!($VERIFICADOR)) { ?>   
                    <div class="col-xl-12 mt-3 mx-auto actions" style="padding-top: 20px">
                        <div class="row">   
                            <div class='col-2 mx-auto text-center' style='padding-top: 40px'>
                                <h1><i class='fas fa-hand-holding-heart' style='color: #9457A1'></i></h1>
                                <hr class='my-1'>
                            </div>
                        </div>
                        <div class='row align-items-center'>
                        </div>

                        <div class='row mt-4'>
                            <div class='col-12 text-center'>
                                <h2 class='font-weight-lighter'>Sem empréstimos até o momento.</h2>
                                <br>
                            </div>
                        </div>
                    </div>

                <?php } echo "<hr>"; ?>    
            </div>
        <hr>
    </div>
</div>s