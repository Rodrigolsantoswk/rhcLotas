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
    <title>Administrativo</title>    
</head>

<script type="text/javascript">
  function mostra1(){
    document.getElementById('frame1').style.display ="block";
    document.getElementById('frame2').style.display ="none";
    document.getElementById('frame3').style.display ="none";
    document.getElementById('frame4').style.display ="none";
    document.getElementById('frame5').style.display ="none";
  }
  function mostra2(){
    document.getElementById('frame2').style.display ="block";
    document.getElementById('frame1').style.display ="none";
    document.getElementById('frame3').style.display ="none";
    document.getElementById('frame4').style.display ="none";
    document.getElementById('frame5').style.display ="none";
  }
  function mostra3(){
    document.getElementById('frame2').style.display ="none";
    document.getElementById('frame1').style.display ="none";
    document.getElementById('frame3').style.display ="block";
    document.getElementById('frame4').style.display ="none";
    document.getElementById('frame5').style.display ="none";
  }
  function mostra4(){
    document.getElementById('frame2').style.display ="none";
    document.getElementById('frame1').style.display ="none";
    document.getElementById('frame3').style.display ="none";
    document.getElementById('frame4').style.display ="block";
    document.getElementById('frame5').style.display ="none";
  }
  function mostra5(){
    document.getElementById('frame2').style.display ="none";
    document.getElementById('frame1').style.display ="none";
    document.getElementById('frame3').style.display ="none";
    document.getElementById('frame4').style.display ="none";
  	document.getElementById('frame5').style.display ="block";
  }
  
  
</script>


<style>
	.disabled{
		margin-left:30px;
		margin-right: 35px;
		display: none;
	}
	.gerenciar{
		margin-left:13%;
		margin-top: 10px;
		margin-bottom: 10px;
		width: 1050px;
		height: 600px;
		border-radius:10px;
	}

	label[for="btmenu"]{
		padding: 5px;
		background-color: #222;
		color: white;
		font-family: "Arial";
		text-align: center;
		font-size: 30px;
		cursor: pointer;
		width: 50px;
		height: 50px;
	}
	#btmenu{
		display: none;
	}
	#label{
		display: none;
	}
    
    nav#adm{
        margin:10px;
        background-color: black;
        height: 50px;
        margin-right: 45px;
        margin-left: 30px;
        border-radius: 10px;
    }

    #adm ul{
        list-style: none;
        position: relative;
    }

    nav#adm li{
        display: inline;
    }

    nav#adm button#menuAdmin{
        margin-top:5px;
        margin-left: 20px;
        display: inline;
    }
	@media only screen and (max-width: 1100px){
		nav#adm ul li{
			width: 100%;
			display: block;
		}

		#btmenu:checked ~ nav#adm{
			margin-left: 10;
			display: block;
		}
		nav#adm{ 
			margin-left: -100%;
			margin-top:0px;
			transition: all 0.5s;
			height: 262px;
			width:100%;
			position: absolute;
		}

		span#deslogar{
			float:left;
			margin-left: 30px;
		}

		#btmenu{
			display: none;
		}

		#label{
			margin-left: 20px;
			display: block;
			border-radius: 10px;
		}

		.gerenciar{
			width:520px;
			margin-left: 0px;
            margin-right:0px;
		}

	}


</style>

<body>
	<div id="container">
	<header>
	</header>
	<input type="checkbox" id="btmenu">
	<label id="label" for="btmenu">&#9776;</label>
		<nav id="adm">
			<ul>
				<li><button id="menuAdmin" class="btn btn-secondary" onclick="mostra1()">Aceitar solicitação</button></li>
			   <li> <button id="menuAdmin" class="btn btn-secondary" onclick="mostra2()">Apagar Usuários</button></li>
			    <li><button id="menuAdmin" class="btn btn-secondary" onclick="mostra3()">Fazer Limpeza</button></li>
			    <li><button id="menuAdmin" class="btn btn-secondary" onclick="mostra4()">Exibir resultados</button></li>
			    <li><button id="menuAdmin" class="btn btn-secondary" onclick="mostra5()">Recuperações</button></li></li>
			    <li><span id="deslogar"><a align="center" id="deslogar" href="?deslogar">SAIR</a></span></li>
		</nav>
	<section id="frame1" class="disabled" >
  		<iframe class="gerenciar" src="aceitarSolicitacoes.php"></iframe>
	</section>
	<section id="frame2" class="disabled" >
  		<iframe class="gerenciar" src="apagarUsuarios.php"></iframe>
	</section>
	<section id="frame3" class="disabled" >
  		<iframe class="gerenciar" src="LimparRegistros.php"></iframe>
	</section>
	<section id="frame4" class="disabled" >
  		<iframe class="gerenciar" src="resultados.php"></iframe>
	</section>
	<section id="frame5" class="disabled" >
  		<iframe class="gerenciar" src="aceitarRecuperacao.php"></iframe>
	</section>
</div>
</body>
</html>