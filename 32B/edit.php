<?php
//inclui o aruivo de conexao
include_once("config.php");
/*
//jeito errado de verificar se exite um cpf ou nao
//receber o valor do ID enviado pela pagina index
$cpf = $_GET['cpf'];

if empty($cpf) { 
	//se não enviamos um ID siginifica que queremos criar uma nova entrada
	//para isso limpamos as variaveis para que o nosso forumario fique em branco.
	$cpf = '';
	$p_nome = '';
	$p_sobrenome = '';
	$p_nascimento = '';
} else {
	//se exiistir um ID ele irá fazer uma consulta para preencher os dados recebidos
	$result = mysqli_query($mysqli, "SELECT * FROM pessoas WHERE cpf=$cpf");
	//um loop para separar o objeto em cada variavel com seus dados.
	while ($res = mysqli_fetch_array($result)) {
		$cpf = $res['cpf'];
		$p_nome = $res['p_nome'];
		$p_sobrenome = $res['p_sobrenome'];
		$p_nascimento = $res['p_nascimento'];
	}
}
*/

//essa é a forma mais correta de fazer.
//veja se um ID foi enviado para essa pagina
if (isset($_GET['cpf'])) {
	//se sim, vamos capturar o valor desse ID
	$cpf = $_GET['cpf'];
	//Agora ele irá fazer uma consulta para preencher os dados recebidos
	$result = mysqli_query($mysqli, "SELECT * FROM pessoas WHERE cpf=$cpf");
	//um loop para separar o objeto em cada variavel com seus dados.
	while ($res = mysqli_fetch_array($result)) {
		$cpf = $res['cpf'];
		$p_nome = $res['p_nome'];
		$p_sobrenome = $res['p_sobrenome'];
		$p_nascimento = $res['p_nascimento'];
	}
} else {
	//se não enviamos um ID siginifica que queremos criar uma nova entrada
	//para isso limpamos as variaveis para que o nosso forumario fique em branco.
	$cpf = '';
	$p_nome = '';
	$p_sobrenome = '';
	$p_nascimento = '';
}


//se clicamos no botao adicionar
if (isset($_POST['add'])) {
	//verifica se existem as rowns na nossa tabela
	$cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
	$p_nome = mysqli_real_escape_string($mysqli, $_POST['p_nome']);
	$p_sobrenome = mysqli_real_escape_string($mysqli, $_POST['p_sobrenome']);
	$p_nascimento = mysqli_real_escape_string($mysqli, $_POST['p_nascimento']);

	// verificando se deixamos algo em branco
	if (empty($cpf) || empty($p_nome) || empty($p_sobrenome) || empty($p_nascimento)) {
		//bla bla bla.... verifica se deixamos algo em branco
		if (empty($cpf)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
		if (empty($p_nome)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}

		if (empty($p_sobrenome)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}

		if (empty($p_nascimento)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
	} else {
		// agora sim! ele captura os dados das variaveis e as insere no banco de dados.
		$result = mysqli_query($mysqli, "INSERT INTO pessoas VALUES('$cpf','$p_nome','$p_sobrenome','$p_nascimento')");
		//redireciona para a index
		header("Location: index.php");
		//echo  "<script>alert('dados Inseridos com sucesso!');</script>";
	}
}

//se clicamos no botao editar
if (isset($_POST['update'])) {
	//verifica se existem as rowns na nossa tabela
	$cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
	$p_nome = mysqli_real_escape_string($mysqli, $_POST['p_nome']);
	$p_sobrenome = mysqli_real_escape_string($mysqli, $_POST['p_sobrenome']);
	$p_nascimento = mysqli_real_escape_string($mysqli, $_POST['p_nascimento']);
	// verificando se deixamos algo em branco
	if (empty($cpf) || empty($p_nome) || empty($p_sobrenome) || empty($p_nascimento)) {
		//bla bla bla.... verifica se deixamos algo em branco
		if (empty($cpf)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
		if (empty($p_nome)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}

		if (empty($p_sobrenome)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}

		if (empty($p_nascimento)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
		$new = 0;
	} else {
		// agora sim! ele captura os dados das variaveis e as atualiza no banco de dados.
		$result = mysqli_query($mysqli, "UPDATE pessoas SET p_nome='$p_nome',p_sobrenome='$p_sobrenome',p_nascimento='$p_nascimento' WHERE cpf=$cpf");
		//redireciona para a index
		header("Location: index.php");
	}
}
//se clicamos no botao para deletar uma entrada no banco
if (isset($_POST['delete'])) {
	//faz a leitura do ID
	$cpf = $_POST['cpf'];
	//Usa o ID para deletar a entrada com o codigo SQL
	$result = mysqli_query($mysqli, "DELETE FROM pessoas WHERE cpf=$cpf");
	//redireciona para a index
	header("Location: index.php");
}
?>

<html>

<head>

</head>

<body>
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>CPF</td>
				<td><input type="text" name="cpf" value="<?php echo $cpf ?>"></td>
			</tr>
			<tr>
				<td>Nome</td>
				<td><input type="text" name="p_nome" value="<?php echo $p_nome ?>"></td>
			</tr>
			<tr>
				<td>Sobrenome</td>
				<td><input type="text" name="p_sobrenome" value="<?php echo $p_sobrenome ?>"></td>
			</tr>
			<tr>
				<td>Nascimento</td>
				<td><input type="text" name="p_nascimento" value="<?php echo $p_nascimento ?>"></td>
			</tr>
			<tr>
				<td>
					<?php
					//simples logica para criar botoes diferentes caso estamos editando ou criando um dado
					if (empty($cpf)) {
						echo '<input type="submit" name="add" value="ADD">';
					} else {
						echo '<input type="submit" name="update" value="UPDATE">';
						echo '<input type="submit" name="delete" value="Delete">';
					}
					?>
				</td>
			</tr>
		</table>
	</form>
</body>

</html>