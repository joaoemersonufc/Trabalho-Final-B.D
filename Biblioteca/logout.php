<?php
	session_start();
	unset($_SESSION['matricula']);
	unset($_SESSION['senha']);
	session_destroy();
	header('Location: logar.php');
?>