<?php
include_once("config.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $id = $res['id'];
    $name = $res['name'];
    $age = $res['age'];
    $email = $res['email'];
}

if(isset($_POST['update']))
{
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	if(empty($id) || empty($name) || empty($age) || empty($email)) {		
		if(empty($id)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}	
		if(empty($name)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE pessoas SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>

<html>
<body>
    <h3>id</h3>
    <input type="text" name="id" value="<?php echo $id?>">
    <h3>name</h3>
    <input type="text" name="name" value="<?php echo $name?>">
    <h3>age</h3>
    <input type="text" name="age" value="<?php echo $age?>">
    <h3>email</h3>
    <input type="text" name="email" value="<?php echo $email?>">

    <input type="submit" name="update" value="Update">
</body>
</html>