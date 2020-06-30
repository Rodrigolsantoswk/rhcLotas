<?php
	include "conexao.php";
	$diretorio="fotos/";
	$total=0;
	if(empty($_POST['idUsuario'])){
		header("location: envioLotas.php?msg=1");
		exit();
	}

	$idUsuario= $_POST['idUsuario'];

	if(!is_dir($diretorio)){
		die("Diretório '$diretorio' não existe.");
		exit();
	}else{
		//armazenando na variável arquivo um vetor dos arquivos recebidos via repetição.
		$arquivo= isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

		//MEDIDAS DE SEGURANÇA
		for($i= 0; $i<count($arquivo['name']); $i++){
			//Objeto _UP contendo todos os parametros de upload
			$_UP['pasta'] ='fotos/'; //Dir
			$_UP['tamanho'] = 1024*1024*100; //tamanho máximo 5mb
			$_UP['extensao'] = array('png', 'jpg', 'jpeg', 'gif'); //extensões permitidas
			$_UP['renomeia']=true; //true = renomeia o arquivo aleatoriamente.
			$_UP['erros'][0]= 'Não houveram erros.';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite permitido. (PHP)';
			$_UP['erros'][2] = 'O arquivo no upload é maior que o limite permitido. (HTML)';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

			//verificação padrão da metodologia de upload $_FILES
			if($arquivo['error'][$i] !=0){
			    die("Não foi possível fazer o upload da imagem. Erro: ". $_UP['erros'][$arquivo['error'][$i]]);
			    exit();
			}

			//Verificando se a extensão está dentro do requisitdado no objeto _UP.
			$explode= explode('.', $arquivo['name'][$i]);
			$extensao= strtolower(end($explode));
			if(array_search($extensao, $_UP['extensao']) === false){
				die("Extensão não corresponde ao requisitado.");
				exit();
			//Verificando se o tamanho é menor que o requisitado. 
			}else if($_UP['tamanho'] < $arquivo['size'][$i]){
				die("Tamanho da imagem muito grande"); 
				exit();
			}
			$total++;
			//echo $arquivo['name'][$i]."<br>";
		}//end for
	
		//Inserindo lota na tabela lotas
		$query= "INSERT INTO lotas (idUsuario, quantidade) VALUES ({$idUsuario}, {$total})";
		$result= mysqli_query($conexao, $query) or die (mysqli_error($conexao));

		//pegando lota que acabou de ser inserido
		$query2= "SELECT max(idLotas) as lotaAtual from lotas";
		$result2= mysqli_query($conexao, $query2) or die (mysqli_error($conexao));

		while($reg1= mysqli_fetch_array($result2)){
			$idLota= $reg1['lotaAtual'];
		}

		//Contador para varrer o Array até finalizar as imagens.
		for($i= 0; $i<count($arquivo['name']); $i++){
			//renomeando arquivo "aleatoriamente".
			$nomeFinal= time().".". $extensao;
			usleep(2500000);
			//$nomeFinal= $arquivo['name'][$i];
			$destino = $diretorio."/".$nomeFinal;
			//$destino = $diretorio."/".$arquivo['name'][$i];
			if(move_uploaded_file($arquivo['tmp_name'][$i], $destino)){
				//inserindo os valores na tabela imagens a partir do idLotas que acabou de ser gerado
				echo "upload realizado com sucesso <br>";
				$query3= "INSERT INTO imagens (nomeImagem, idLotas) VALUES ('$nomeFinal', {$idLota})";
				$result3= mysqli_query($conexao, $query3) or die (mysqli_error($conexao));
				header("location: envioLotas.php?msg=2");
			}else{
				die("Erro ao fazer Upload do arquivo");
				exit();
			}
		}
	}
?>