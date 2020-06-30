<?php
session_start();

if(!isset($_SESSION['usuario'])){
	header("location: index.php");
	session_destroy();
}

include "conexao.php";

//dar include na conexão do banco da RHC

//INDICAR VARIÁVEL DE SESSÃO CORRETAMENTE ABAIXO:
/*
if(!isset($_SESSION['usuario'])){
  	header("location: https://rhccorporation.forumeiros.com/h1-");
  	session_destroy();
}
*/
//adicionar o nome e atributo corretos da tabela usuário do banco de dados da RHC
$query= "SELECT lotas.idLotas, usuario.imagemUsuario, usuario.login, usuario.nomeUsuario, lotas.horapostagem, lotas.quantidade FROM lotas LEFT JOIN usuario ON usuario.idUsuario = lotas.idUsuario";
//TESTANDO PASSAGEM DE PARÂMETRO PARA INPUT POR getELementById() DESSA VARIÁVEL DE SESSÃO ESPECÍFICA
$usuario= $_SESSION['usuario'];

$query2="SELECT idUsuario FROM usuario WHERE login = '$usuario'";
$result2= mysqli_query($conexao, $query2) or die(mysqli_error($conexao));

$idUsuario=$_SESSION['usuario'];
while($reg2= mysqli_fetch_array($result2)){
	$idUsuario= $reg2['idUsuario'];
}

$result= mysqli_query($conexao, $query) or die ("ERRO AO SELECIONAR: ".mysqli_error());

//TRATAMENTO DE ERROS RECEBIDOS VIA GET
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 1:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Ocorreu algum erro ao receber informação de usuário. Contate um administrador.</p>
        </div>
        <?php
        break;
        case 2:
        ?>
        <div id="erro" class="alert alert-success" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Upload realizado com sucesso!</p>
        </div>
        <?php
    }
}
 if (isset($_GET['deslogar'])){
  	session_destroy();
  	header("location: index.php");
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
    <title>Envie seu lota</title>  
</head>

<script>
  //CONTROLE DE ERROS--TEMPO
    setTimeout(function() {
        $('#erro').fadeOut('linear');
    }, 2000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style type="text/css">
	@media only display and (max-width: 1280px){
        header{
            margin-bottom: 0px;
        }
    }
</style>

<body>
	<div id=container>
		<header>
			<!--<div id="img"><img src="imgL/logo.png" alt="Logo RHC"></div>
			<div id="title"><h3>POSTE SEU LOTA!</h3></div>-->
		</header>
		<span id="deslogar" align="center"><a id="botao" href="?deslogar">Sair</a></span> 
		<br>
		<hr color="white" width="93%" style="margin-right: 56px"></hr>
		<section id="Lotas">
			<h3>&nbsp;&nbsp;Relatório de lotas da RHC</h3>
 
			<hr color="black" style="margin-top:-3px">
			<h3>&nbsp;&nbsp;Aviso:</h3>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;1- Abaixo, selecione as imagens do seu lota contendo o nickname do jogador trazido enquanto ele estiver na sentinela ou imagens do seu lota divulgativo / clássico.</p>
			<hr color="black">
			<!--FORMULÁRIO DE ENVIO DE IMAGENS-->
			<form id="envia" action="uploadImg.php" method="post" enctype="multipart/form-data" style="text-align: center">
				<div class="form-group">
					<label for="arquivo">Carregar imagens do seu lota:</label>
					<br><input class="form-control" type="file" name="arquivo[]" multiple="multiple" style="width: 350px"><br>
				</div>
				<!--INPUT RECEBE VALOR VIA JS-->
				<input type="hidden" name="idUsuario" id="idUsuario"><br>
				<button type="submit" class="btn btn-info" style="margin-top:0px; margin-left:0%">Enviar</button>
			</form>
			<br>
		</section>
		<section id="lotas2">
			<!--CHAMANDO REPETIÇÃO PARA EXIBIR TODOS OS LOTAS-->
			<?php
				while($reg= mysqli_fetch_array($result)){
					$idLotas= $reg['idLotas'];
					$imgUsuario= $reg['imagemUsuario'];
					$loginUsuario= $reg['login'];
					$nomeUsuario= $reg['nomeUsuario'];
					$horapostagem= $reg['horapostagem'];
					$quantLota= $reg['quantidade'];
			?>
			<div id="regLotas">
				<img id="imgPerfil" src= <?php echo"'fotoPerfil/$imgUsuario'"; ?>>
			
			<span id="nomeUsuario"><p>Lotador: <?php echo "$nomeUsuario"; ?> </p></span>
			<span id="login"><p>Login do usuário: <?php echo "$loginUsuario"; ?> </p></span>
			<span id="horapostagem"><p>Horário da postagem: <?php echo "$horapostagem"; ?> </p></span>
			<span id="quant"><p>quantidade de pessoas trazidas: <?php echo "$quantLota"; ?> </p></span>
			<br><br>
			<hr color="black">
			
			<?php
					//BUSCANDO PELAS IMAGENS REFERENTE AO LOTA ATUAL
					$query2= "SELECT nomeImagem FROM imagens WHERE idLotas = {$idLotas}";
					$result2= mysqli_query($conexao, $query2) or die (myslqi_error());	
					while($registro2 =mysqli_fetch_array($result2)){
						$imagemLota= $registro2	['nomeImagem'];
				?>
					<div id="imagensRegLota">
						<img src=<?php echo "'fotos/$imagemLota'"; ?> >
					</div>
			<?php } ?>
			</div>
			<?php } ?>
		</section>
	</div>
	<script type="text/javascript">
		//COLOCAR O NOME RESPECTIVO DA VARIÁVEL QUE CONTÉM O NOME DE USUÁRIO
		document.getElementById('idUsuario').value = <?php echo $idUsuario; ?>;
	</script>

</body> 
</html>