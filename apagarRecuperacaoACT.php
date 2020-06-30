<?php
include "conexao.php";

$id= $_POST['idSoli'];

$query= "DELETE FROM recuperarsenhas WHERE idRecuperar= {$id}";
$result= mysqli_query($conexao, $query) or die("ERRO AO APAGAR SOLICITAÇÃO: ".mysqli_error($conexao));
header("location: aceitarRecuperacao.php?msg=2");
?>