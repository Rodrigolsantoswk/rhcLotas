<?php 
//TRATAMENTO DE ERROS RECEBIDOS VIA GET
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 1:
        ?>
        <div id="erro" class="alert alert-warning" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Por favor, digite todos os dados necessários.</p>
        </div>
        <?php
        break;
        case 2:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Este nome de usuário já existe. Coloque outro.</p>
        </div>
        <?php
        break;
        case 3:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">As senhas digitadas não são iguais.</p>
        </div>
        <?php
        break;
        case 4:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">A extensão do arquivo não corresponde a uma imagem png, jpg, jpeg ou gif</p>
        </div>
        <?php
        break;
        case 5:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">O tamanho da imagem excede 5mb.</p>
        </div>
        <?php
        break;
        case 6:
        ?>
        <div id="erro" class="alert alert-success" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Solicitação de cadastro enviada com sucesso!</p>
        </div>
        <?php
        break;
        case 7:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Erro ao fazer upload do arquivo, contate um administrador!</p>
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

<script>
  //CONTROLE DE ERROS--TEMPO
    setTimeout(function() {
        $('#erro').fadeOut('linear');
    }, 2000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<body id="index">
	<header id="index">
		<!--<img src="imgL/principal.png" id="imgIndex">-->
	</header>
	<section id="index" style="height: 520px">
		<form action="solicitacao.php" method="post" id="formLogin" enctype="multipart/form-data" >
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CRIE SEU USUÁRIO</p>
			<hr width="300px" align="left" color="green">
			<label for="login">Digite seu login:</label>
			<input type="text" name="login" id="login" class="form-control" size="10" style="width:300px">
			<label for="nomeUsuario">Digite seu usuário no jogo:</label>
			<input type="text" maxlength="50" name="nomeUsuario" id="nomeUsuario" class="form-control" style="width:300px">
			<label for="password">Digite sua senha: </label>
			<input type="password" name="password" id="password" class="form-control" style="width:300px">
			<label for="password">Digite sua senha novamente: </label>
			<input type="password" name="password2" id="password2" class="form-control" style="width:300px">
			<label for="Imagem">Escolha uma imagem para o perfil (Seu avatar): </label>
			<div id="inputImgusuario"><input type="file" name="arquivo" id="arquivo"></div>
			<br><br><br>
			<button type="submit" class="btn btn-primary" style="margin-left:120px">Entrar</button>
		</form>
		<p><a href="index.php">Fazer login</a> <a href="recuperarSenha.php" style="margin-left:120px;">Recuperar senha</a></p>
		<p></p>
	</section>
</body>
</html>