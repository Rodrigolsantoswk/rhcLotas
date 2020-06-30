<?php
	include "conexao.php";
	$query= "DELETE FROM lotas";
	$query2= "SELECT * FROM imagens";

	$result2= mysqli_query($conexao, $query2) or die("NÃO FOI POSSÍVEL SELECIONAR AS IMAGENS: ".mysqli_error($conexao));
	while($reg= mysqli_fetch_array($result2)){
		$imagem= $reg['nomeImagem'];
		$idImagem= $reg['idImagem'];

		if(is_file("fotos/".$imagem)){
			$delete= unlink("fotos/".$imagem);
			if($delete){
				$query3= "DELETE FROM imagens WHERE idImagem={$idImagem}";
				$result3= mysqli_query($conexao, $query3) or die("NÃO FOI POSSÍVEL DELETAR A IMAGEM: ".mysqli_error($conexao));
			}
		}else{
			header("location: LimparRegistros.php?msg=1");
			exit();
		}
	}
	$result=mysqli_query($conexao, $query) or die("ERRO AO DELETAR OS LOTAS: ".mysqli_error($conexao));
	header("location: LimparRegistros.php?msg=2");
?>