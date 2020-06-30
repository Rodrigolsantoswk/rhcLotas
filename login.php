<?php
include "conexao.php";
session_start();

if(empty($_POST['login']) || empty($_POST['password'])){
	header("location: index.php?msg=1");
	exit();
}

$login = mysqli_real_escape_string($conexao, $_POST['login']);
$senhaC = mysqli_real_escape_string($conexao, $_POST['password']);

$query = "SELECT * FROM usuario WHERE login='$login'";
$result = mysqli_query($conexao, $query) or die("Erro ao consultar usuário: ".mysqli_error($conexao));
$rows= mysqli_num_rows($result);

if($rows>1 || $rows==0){
	header("location: index.php?msg=2");
	exit();
}

while($reg = mysqli_fetch_array($result)){
	$senhaquery = $reg['senha'];
	$acesso = $reg['acesso'];
	$_SESSION['acesso']= $acesso;
}

if(strcmp($acesso, "usuario")==0){
	$_SESSION['pagina'] = "envioLotas.php";
}else if(strcmp($acesso, "administrador")==0){
	$_SESSION['pagina'] = "administrativo.php";
}

if(password_verify($senhaC, $senhaquery)){
	$_SESSION['usuario'] = $login;
	$_SESSION['senha'] = $senhaquery;
	header("location: painel.php");
}else{
	header("location: index.php?msg=3");
}
?>