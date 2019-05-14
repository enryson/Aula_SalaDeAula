<?php
include_once("config.php");

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

	while ($res = mysqli_fetch_array($result)) {
		$id = $res['id'];
		$name = $res['name'];
		$age = $res['age'];
		$email = $res['email'];
	}
} else{
	$id = '';
	$name = '';
	$age = '';
	$email = '';
}

if (isset($_POST['add'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	if (empty($id) || empty($name) || empty($age) || empty($email)) {
		if (empty($id)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
		if (empty($name)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}

		if (empty($age)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}

		if (empty($email)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
	} else {
		//updating the table
		$id=null;
		$result = mysqli_query($mysqli, "INSERT INTO users VALUES(null,'$name','$age','$email')");
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}

if (isset($_POST['update'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	if (empty($id) || empty($name) || empty($age) || empty($email)) {
		if (empty($id)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
		if (empty($name)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}

		if (empty($age)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}

		if (empty($email)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");

		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}

if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");

	header("Location: index.php");
}
?>

<html>

<body>
	<form name="form1" method="post" action="edit.php">
		<h3>id</h3>
		<input type="text" name="id" value="<?php echo $id ?>">
		<h3>name</h3>
		<input type="text" name="name" value="<?php echo $name ?>">
		<h3>age</h3>
		<input type="text" name="age" value="<?php echo $age ?>">
		<h3>email</h3>
		<input type="text" name="email" value="<?php echo $email ?>">

		<?php
		if (empty($id)) {
			echo '<input type="submit" name="add" value="ADD">';
		} else {
			echo '<input type="submit" name="update" value="Update">';
			echo '<input type="submit" name="delete" value="Delete">';
		}
		?>
	</form>
</body>

</html>