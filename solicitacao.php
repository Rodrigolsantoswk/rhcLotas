	<?php
	include "conexao.php";
	
	if(empty($_POST['login']) || empty($_POST['nomeUsuario']) || empty($_POST['password']) || empty($_POST['password2'])){
		header("location: criarConta.php?msg=1");
		exit();
	}

	$login= mysqli_real_escape_string($conexao, $_POST['login']);
	$nomeU= mysqli_real_escape_string($conexao, $_POST['nomeUsuario']);
	$senha1= $_POST['password'];
	$senha2= $_POST['password2'];
	$imgPerfil= $_FILES['arquivo']['name'];
	$acesso= "usuario";

	$query= "SELECT login from usuario where login='$login'";
	$result= mysqli_query($conexao, $query) or die ("Erro ao selecionar dados: ".mysqli_error($conexao));
	$row= mysqli_num_rows($result);
	if($row != 0){
		header("location: criarConta.php?msg=2");
		exit();
	}

	$query= "SELECT login from solicitacoes where login='$login'";
	$result= mysqli_query($conexao, $query) or die ("Erro ao selecionar dados: ".mysqli_error($conexao));
	$row= mysqli_num_rows($result);
	if($row != 0){
		header("location: criarConta.php?msg=2");
		exit();
	}

	if($senha1 != $senha2){
		header("location: criarConta.php?msg=3");
		exit();
	}


	//ABAIXO REFERENTE AO ARQUIVO!
	$_UP['pasta'] ='imagemSolicitacao/';
	$_UP['tamanho'] = 1024*1024*100;
	$_UP['extensao'] = array('png', 'jpg', 'jpeg', 'gif');
	$_UP['renomeia']=true;
	$_UP['erros'][0]= 'Não houveram erros.';
	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite permitido. (PHP)';
	$_UP['erros'][2] = 'O arquivo no upload é maior que o limite permitido. (HTML)';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

	if($_FILES['arquivo']['error'] !=0){
	    die("Não foi possível fazer o upload da imagem. Erro: ". $_UP['erros'][$_FILES['arquivo']['error']]);
	    exit();
  	}

  	$extensao= strtolower(end(explode('.', $_FILES['arquivo']['name'])));
	if(array_search($extensao, $_UP['extensao']) === false){
		header("location: criarConta.php?msg=4"); 
	}else if($_UP['tamanho'] < $_FILES['arquivo']['size']){
		header("location: criarConta.php?msg=5"); 
	}else{
    if($_UP['renomeia']==true){
      $nomeFinal= time().'.jpg';
    }else{
      $nomeFinal= $_FILES['arquivo']['name'];
    }
    
    $senhaF= password_hash($senha1, PASSWORD_DEFAULT);

    if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nomeFinal)){
      $query="INSERT INTO solicitacoes(login, nomeUsuario, imagemUsuario, senha, acesso) values ('$login','$nomeU', '$nomeFinal', '{$senhaF}', '$acesso')";
      $result= mysqli_query($conexao, $query) or die ("ERRO AO INSERIR VALORES NO BANCO DE DADOS: ".mysqli_error($conexao));
      header("location: criarConta.php?msg=6");
    }else{
      header("location: criarConta.php?msg=7");
    }
  }
?>