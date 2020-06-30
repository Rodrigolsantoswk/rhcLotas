<?php
include "conexao.php";

$id= $_POST['idSoli'];
$login= $_POST['nomeSoli'];
$senha= $_POST['passSoli'];

$query="SELECT idUsuario FROM usuario WHERE login= '$login'";
$result= mysqli_query($conexao, $query) or die("ERRO AO SELECIONAR USUÁRIO: ".mysqli_error($conexao)); 

while($reg= mysqli_fetch_array($result)){
	$idUsuario= $reg['idUsuario'];
}

$query2= "UPDATE usuario SET senha = '$senha' where idUsuario= {$idUsuario}";
$result2= mysqli_query($conexao, $query2) or die("ERRO AO ALTERAR A SENHA: ".mysqli_error($conexao));

$query3= "DELETE FROM recuperarsenhas WHERE idRecuperar= {$id}";
$result3= mysqli_query($conexao, $query3) or die('ERRO AO APAGAR SOLICITAÇÃO APÓS SER ACEITA'.mysqli_error($conexao));
header("location: aceitarRecuperacao.php?msg=1");

?>