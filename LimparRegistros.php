<?php
session_start();

if (isset($_GET['deslogar'])){
	session_destroy();
	header("location: index.php");
}

if(!isset($_SESSION['usuario'])){
	header("location: index.php");
	session_destroy();
}

//TRATAMENTO DE EXCEÇÃO PARA ERROS.
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 1:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Não foi encontrado alguma imagem no diretório atual.</p>
        </div>
        <?php
        break;
        case 2:
        ?>
        <div id="erro" class="alert alert-success" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Tudo foi apagado.</p>
        </div>
        <?php        
    }
}



?>

<DOCTYPE! html> 
<head>
	<meta charset="UTF-8">
	<meta name="Author" content="Rodrigo Lima dos Santos">
	<meta name="viewport" content="width=600px, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<style>
	header#limpeza{
		padding: 20px;
	}

</style> 

<body>
	<header id="limpeza">
		<br><br>
		<br><br>
		<br><br>
		<h3 align="center">Limpeza de registros</h3>
		<p align="center">A limpeza de registros é recomendada após a análise semanal ou quinzenal dos lotas devido a imensa quantidade de imagens que serão alocadas no servidor. Depois de deterinada quantidade de armazenamento ser utilizada no servidor, será impossível fazer upload de novas imagens!</p>
	</header>
	<section>
		<form action="fazerLimpeza.php" method="post" enctype="multipart/form-data">
			<div id="btnalign" style="margin-left: 43%;"><button class="btn btn-danger">FAZER LIMPEZA</button></div>
		</form>
	</section>
	
</body>