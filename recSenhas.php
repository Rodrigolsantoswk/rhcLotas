<?php
include "conexao.php";

if(empty($_POST['login'])){
	header("location: recuperarSenha.php?msg=1");
	exit();
}

$login= mysqli_real_escape_string($conexao, $_POST['login']);
$senha= $_POST['password'];

$query= "SELECT idUsuario FROM usuario WHERE login= '$login' ";
$result= mysqli_query($conexao, $query) or die ("Erro ao consultar usuário".mysqli_error($conexao));
$row= mysqli_num_rows($result);
if($row==0){
	header("location: recuperarSenha.php?msg=2");
	exit();
}

while($reg= mysqli_fetch_array($result)){
	$id= $reg['idUsuario'];
}

$query2= "SELECT * FROM recuperarsenhas WHERE idUsuario = {$id} ";
$result2= mysqli_query($conexao, $query2) or die(mysqli_error($conexao));
$row2= mysqli_num_rows($result2);

if($row2>0){
	header("location: recuperarSenha.php?msg=3");
	exit();
}

$senhaHash= password_hash($senha, PASSWORD_DEFAULT);

$query3= "INSERT into recuperarsenhas (idUsuario, novaSenha) values ({$id}, '$senhaHash')";
$result3= mysqli_query($conexao, $query3) or die("Erro ao inserir solicitação: ".mysqli_error($conexao)); 
header("location: recuperarSenha.php?msg=4");
?>