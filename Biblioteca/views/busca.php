<?php

session_start();

include_once('../database/banco.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

$livros = $_POST['pesquisa'];

$livros = "SELECT * FROM livro WHERE titulo LIKE '%$livros%' ";

$resultado_livros = mysqli_query($link,$livros);

if(mysqli_num_rows($resultado_livros) <= 0){
	echo "Nenhum livro encontrado";
}else{
	while ($rows = mysqli_fetch_assoc($resultado_livros)) {
		echo "<li>".$rows['titulo']."<li>";
	}
}

?>