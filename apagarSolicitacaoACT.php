<?php
include "conexao.php";
if(empty($_POST['idSoli'])){
	header("location: aceitarSolicitacoes.php?msg=8");
	exit();
}
$id= $_POST['idSoli'];

$query = "SELECT imagemUsuario FROM solicitacoes where idSolicitacoes = {$id}";
$result = mysqli_query($conexao, $query) or die ("Erro ao selecionar nome da imagem do usuário".mysqli_error($conexao));
while($reg = mysqli_fetch_array($result)){
	$nomeImagem = $reg['imagemUsuario'];
}
$query2 = "DELETE FROM solicitacoes WHERE idSolicitacoes = {$id}";
$result2 = mysqli_query($conexao, $query) or die ("NÃO FOI POSSÍVEL DELETAR A SOLICITAÇÃO: ".mysqli_error($conexao));
if(is_file('imagemSolicitacao/'.$nomeImagem)){
	$deletar = unlink('imagemSolicitacao/'.$nomeImagem);
	header("location: aceitarSolicitacoes.php?msg=9");
}else{
	header("location: aceitarSolicitacoes.php?msg=10");
}

?>