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

<title>Criadores</title>
<link rel="stylesheet" href="css/livros.css">
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
            <h1 class="font-weight-lighter" style="border:bold;color: #9457A1;">Criadores</h1>
            <hr>
            <div class="row align-items-center" align="center">
                <div class="col-lg-3 py-5 card-news">
                    <img src='img/joao.jpg' class="img-assoc image" style="border-radius:30px" alt="">
                    <div class="middle">
                        <div class="text">
                            <h5 class="text-dark"></h5>
                                <a href="https://www.facebook.com/joao.emerson.908"><i class="fab fa-facebook-square fa-5x" style="color: #9457A1"></i></a>
                                <a href="https://www.instagram.com/joaoemerson._/"><i class="fab fa-instagram fa-5x" style="padding-left: 20px;color: #9457A1;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
                <span>
                    <h1 style="font-size: 25px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h1>
                </span>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 py-5 card-news">
                    <img src='img/davi.jpeg' class="img-assoc image" style="border-radius:30px" alt="">
                    <div class="middle">
                        <div class="text">
                            <h5 class="text-dark"></h5>
                              <a href="https://www.instagram.com/davi_maia_andrade/"><i class="fab fa-instagram fa-5x" style="padding-left: 20px;color: #9457A1;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
                <span>
                    <h1 style="font-size: 25px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h1>
                </span>
            <hr>
        </div>
    </div>
</div>