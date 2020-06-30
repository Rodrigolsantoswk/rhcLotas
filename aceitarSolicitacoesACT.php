<?php
include "conexao.php";
if(empty($_POST['idSoli']) || empty($_POST['nomeSoli'])){
	header("location: aceitarSolicitacoes.php?msg=1");
	exit();
}

$id = $_POST['idSoli'];
$senha= $_POST['passSoli'];
$query = "SELECT * FROM solicitacoes WHERE idSolicitacoes={$id}";
$result = mysqli_query($conexao, $query) or die("ERRO AO SOLICITAR DADOS".mysqli_error($conexao));

while($reg = mysqli_fetch_array($result)){
	$login = $reg['login'];
	$nomeUsuario = $reg['nomeUsuario'];
	$imagemUsuario = $reg['imagemUsuario'];
	$acesso = $reg['acesso'];
}

$origem = "imagemSolicitacao/$imagemUsuario";
$destino = "fotoPerfil/$imagemUsuario";

if(is_file($origem)){
	if(rename($origem, $destino)){
	$query = "INSERT into usuario (login, nomeUsuario, imagemUsuario, senha, acesso) values ('$login', '$nomeUsuario', '$imagemUsuario', '$senha', '$acesso')";
	$result = mysqli_query($conexao, $query) or die ("ERRO AO INSERIR DADOS NO BANCO DE DADOS: ".mysqli_error($conexao));
	$query = "DELETE FROM solicitacoes WHERE idSolicitacoes= {$id}";
	$result = mysqli_query($conexao, $query) or die ("ERRO AO DELETAR SOLICITAÇÃO DO BANCO DE DADOS".mysqli_error($conexao));
	//$delete = unlink($origem);
	header("location: aceitarSolicitacoes.php?msg=4");
	}else{
		header("location: aceitarSolicitacoes.php?msg=2");
	}
}else{
	header("location: aceitarSolicitacoes.php?msg=3");
}


?> 