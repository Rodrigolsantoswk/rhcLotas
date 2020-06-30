<?php
include "conexao.php";
$id= $_POST['idSoli'];

$query = "SELECT imagemUsuario FROM usuario WHERE idUsuario = {$id}";

$result= mysqli_query($conexao, $query) or die(mysqli_error($conexao));

while($reg= mysqli_fetch_array($result)){
	$nomeImagem= $reg['imagemUsuario'];
}

$query2= "DELETE FROM usuario WHERE idUsuario = {$id}";
$result2= mysqli_query($conexao, $query2) or die (mysqli_error($conexao));

$dir= "fotoPerfil/".$nomeImagem;
if(is_file($dir)){
	unlink($dir);
	header("location: apagarUsuarios.php?msg=2");
}else{
	header("location: apagarUsuarios.php?msg=3");
}

?>