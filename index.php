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
            <p align="center">Digite usuário e senha para fazer login</p>
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
            <p align="center">senha incorreta.</p>
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
    <link rel="icon" href="favicon.ico" />
	<link rel="shortcut icon" href="favicon.ico" type="image/png"/>
    <title>Envie seu lota - RHC</title>  
</head>

<body id="index">
	<header id="index">
		<!--<img src="imgL/principal.png" id="imgIndex">-->
	</header>
	<section id="index">
		<form action="login.php" method="post" id="formLogin">
			<p>FAÇA LOGIN NO SISTEMA DE LOTAS</p>
			<hr width="300px" align="left" color="green">
			<label for="login">Digite seu login:</label>
			<input type="text" name="login" id="login" class="form-control" size="10" style="width:300px">
			<br>
			<label for="password">Digite sua senha: </label>
			<input type="password" name="password" id="password" class="form-control" style="width:300px">
			<br>
			<button type="submit" class="btn btn-primary" style="margin-left:120px">Entrar</button>
		</form>
		<p><a href="criarConta.php">Criar conta</a> <a href="recuperarSenha.php" style="margin-left:120px;">Recuperar senha</a></p>
		<p></p>
	</section>
</body>
</html>