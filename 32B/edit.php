<?php
include_once("config.php");
$cpf = $_GET['cpf'];

$new = $_GET['new'];

if ($new == 1) {
	$cpf = '';
	$p_nome = '';
	$p_sobrenome = '';
	$p_nascimento = '';
	$new = 1;
} else {
	$result = mysqli_query($mysqli, "SELECT * FROM pessoas WHERE cpf=$cpf");
	while ($res = mysqli_fetch_array($result)) {
		$cpf = $res['cpf'];
		$p_nome = $res['p_nome'];
		$p_sobrenome = $res['p_sobrenome'];
		$p_nascimento = $res['p_nascimento'];
	}
}

if (isset($_POST['update'])) {
	$cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
	$p_nome = mysqli_real_escape_string($mysqli, $_POST['p_nome']);
	$p_sobrenome = mysqli_real_escape_string($mysqli, $_POST['p_sobrenome']);
	$p_nascimento = mysqli_real_escape_string($mysqli, $_POST['p_nascimento']);

	if (empty($cpf) || empty($p_nome) || empty($p_sobrenome) || empty($p_nascimento)) {
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
	} else if ($new == 1) {
		$result = mysqli_query($mysqli, "INSERT INTO pessoas VALUES(444444444,'Ronaldso','mariano','2011-01-01')");
		echo "<font color='red'>GRAVADO COM SuCESSO</font><br/>";
	} else {
		$result = mysqli_query($mysqli, "UPDATE pessoas SET p_nome='$p_nome',p_sobrenome='$p_sobrenome',p_nascimento='$p_nascimento' WHERE cpf=$cpf");
		header("Location: index.php");
	}
}


if (isset($_POST['delete'])) {
	$cpf = $_POST['cpf'];
	$result = mysqli_query($mysqli, "DELETE FROM pessoas WHERE cpf=$cpf");

	header("Location: index.php");
}
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
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
					if ($new == 1) {
						echo '<input type="submit" name="update" value="ADD">';
					} else {
						echo '<input type="submit" name="update" value="Update">';
						echo '<input type="submit" name="delete" value="Delete">';
					}
					?>
				</td>
			</tr>
		</table>
	</form>
</body>

</html>