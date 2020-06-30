<?php
session_start();

include "conexao.php";

if (isset($_GET['deslogar'])){
	session_destroy();
	header("location: index.php");
}

if(!isset($_SESSION['usuario'])){
	header("location: index.php");
	session_destroy();
}

$query= "SELECT usuario.nomeUsuario, sum(lotas.quantidade) as total from lotas join usuario on usuario.idUsuario= lotas.idUsuario group by usuario.nomeUsuario order by total desc";
$result= mysqli_query($conexao, $query) or die("ERRO AO SOLICITAR INFORMAÇÕES DO DB. Contacte um administrador: ".mysqli_error($conexao));
?>

<DOCTYPE! html> 
<head>
	<meta charset="UTF-8">
	<meta name="Author" content="Rodrigo Lima dos Santos">
	<meta name="viewport" content="width=600px, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<style>

	header#result{
		padding: 20px;
	}
	#resultados{
		margin-left: 330px;
		width: 400px;
	}
    @media only screen and (max-width: 900px){
       #resultados{
            margin-left:15%;
	    } 
    }
</style> 

<body>
	<header id="result">
		<br><br>
		<h3 align="center">Resultados por jogador: </h3>
		<p align="center">Abaixo serão exibidos os resultados das lotações por jogador: </p>
	</header>
	<section id="SectionResultados">
		<div id="resultados">
			
			<table id="resultado" class="table table-striped table-dark">
				<tr>
					<th scope="col">Nome do jogador</th>
					<th scope="col">Total de recrutas registrados</th>
				</tr>
				<?php
				while($reg= mysqli_fetch_array($result)){
					$nome= $reg['nomeUsuario'];
					$qnt= $reg['total'];
				?>
				<tr>
					<td><span id="nome"><p> <?php echo $nome; ?></p></span></td>
					<td align="center"><span id="total"><p> <?php echo $qnt; ?></p></span></td>
				</tr>
				<?php 
				}
			?>
		</div>
	</section>
	
</body>