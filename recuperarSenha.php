<?php
session_start();
if(isset($_SESSION['usuario'])){
    header("location: painel.php");
}

//tratamento de exceção:
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 1:
        ?>
        <div id="erro" class="alert alert-warning" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Digite usuário e senha para solicitar recuperação</p>
        </div>
        <?php
        break;
        case 2:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Este usuário não foi encontrado. Verifique se digitou corretamente.</p>
        </div>
        <?php
        break;
        case 3:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Solicitação já foi enviada. Aguarde!</p>
        </div>
        <?php
        break;
        case 4:
        ?>
        <div id="erro" class="alert alert-success" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Solicitação foi enviada. Aguarde!</p>
        </div>
        <?php
    }
}


?>

<DOCTYPE! html> 
<head>
	<meta charset="UTF-8">
	<meta name="Author" content="Rodrigo Lima dos Santos">
	<link rel="stylesheet" href="estiloLota.css">
	<meta name="viewport" content="width=600px, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body id="index">
	<header id="index">
		<!--<img src="imgL/principal.png" id="imgIndex">-->
	</header>
	<section id="index">
		<form action="recSenhas.php" method="post" id="formLogin">
			<p>&nbsp;RECUPERE SUA SENHA ABAIXO: </p>
			<hr width="300px" align="left" color="green">
			<label for="login">Digite seu login:</label>
			<input type="text" name="login" id="login" class="form-control" size="10" style="width:300px">
			<br>
            <label for="password">Digite sua nova senha: </label>
            <input type="password" name="password" id="password" class="form-control" style="width:300px">
            <br>
			<button type="submit" class="btn btn-primary" style="margin-left:120px">Enviar</button>
		</form>
		<p><a href="criarConta.php">Criar conta</a> <a href="index.php" style="margin-left:130px;">Fazer Login</a></p>
		<p></p>
	</section>
</body>
</html>
