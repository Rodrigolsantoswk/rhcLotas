<?php
include "conexao.php";

session_start();

if (isset($_GET['deslogar'])){
  session_destroy();
  header("location: index.php");
}

if(!isset($_SESSION['usuario'])){
  header("location: index.php");
  session_destroy();
}

$query= "SELECT * FROM usuario";
$result= mysqli_query($conexao, $query) or die(mysqli_error($conexao));

//TRATAMENTO DE EXCEÇÃO PARA ERROS.
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 1:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Algum dos dados necessários não foi repassado para o arquivo de processamento, contate um administrador.</p>
        </div>
        <?php
        break;
        case 2:
        ?>
        <div id="erro" class="alert alert-success" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Usuário deletado com sucesso!</p>
        </div>
        <?php
        break;
        case 3:
        ?>
        <div id="erro" class="alert alert-danger" role="alert" style="position: absolute; width: 100%; font-size:13pt">
            <p align="center">Não foi possível encontrar a imagem do usuário no diretório, mesmo assim o registro foi apagado</p>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<script>
  //CONTROLE DE ERROS--TEMPO
  setTimeout(function() {
      $('#erro').fadeOut('linear');
  }, 2000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<body>
	<div class="container theme-showcase" role="manin">
		<div class="page-header">
			<h1 align="center">Lista de usuários cadastrados no sistema</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thread>
						<tr>
							<th>#</th>
							<th>Login</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>Nick</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>Opções</th>
						</tr>
					</thread>
					<tbody>
					<?php while($rows= mysqli_fetch_assoc($result)) { ?>
  					<tr>
  					<td><?php echo $rows['idUsuario']; ?></td>
  					<td><?php echo $rows['login']; ?></td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td><?php echo $rows['nomeUsuario']; ?></td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td>

  					<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $rows['idUsuario']; ?> ">Apagar</button>
  					</td>
  					</tr>
					<?php } ?>
				</tbody>
		    </table>	
		</div>
	</div>
</div>


<!-- início modal apagar-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<div class="alert-danger"><h4 class="modal-title" id="exampleModalLabel">Apagar</h4></div>
  			</div>
  			<div class="modal-body">
  				<form method="post" action="apagarUsuariosACT.php" enctype="multipart/form-data">
  						<label for="recipient-name" class="control-label">Id da solicitação: </label>
  						<input type="text" name="idSoli" class="form-control" id="idSoli" readonly="true">
  				<div class="modal-footer">
  					<button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
  					<button type="submit" class="btn btn-danger">Apagar</button>
  				</div>
  				</form>
  			</div>
  		</div>
  	</div>
  </div>
<!-- fim modal apagar-->

   <!-- Importando o jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <!-- Importando o js do bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
   $('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
 
  var modal = $(this)
  modal.find('.modal-title').text('CUIDADO! Ao clicar no botão apagar irá excluir a solicitação: ' + recipient)
  modal.find('#idSoli').val(recipient)

  })
</script>


</body>
</html>