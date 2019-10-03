<?php

class db
{

    //host
    private $host = 'localhost';

    //usuario
    private $usuario = 'root';

    //senha
    private $senha = '';

    //banco de dados
    private $database = 'biblioteca';

    public function conecta_mysql()
    {

        try {
            //criar a conexao
            $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

            //ajustar o charset de comunicação entre a aplicação e o banco de dados
            mysqli_set_charset($con, 'utf8');

            //verficar se houve erro de conexão
        }catch(mysqli_sql_exception $e) {
            echo "Erro ao tentar se conectar com o BD MySQL: " . $e;
        }

        return $con;
    }

}

?>