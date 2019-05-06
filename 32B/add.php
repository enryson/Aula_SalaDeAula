<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);	
	$p_nome = mysqli_real_escape_string($mysqli, $_POST['p_nome']);
	$p_sobrenome = mysqli_real_escape_string($mysqli, $_POST['p_sobrenome']);
	$p_nascimento = mysqli_real_escape_string($mysqli, $_POST['p_nascimento']);
		
	// checking empty fields
	if(empty($cpf) || empty($p_nome) || empty($p_sobrenome) || empty($p_nascimento)) {		
		if(empty($cpf)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}	
		if(empty($p_nome)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
		
		if(empty($p_sobrenome)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
		
		if(empty($p_nascimento)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}		
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO pessoas VALUES(444444444,'Ronaldso','mariano','2011-01-01')");
			
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
