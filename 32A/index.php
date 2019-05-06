<?php
include_once("config.php");

$result = mysqli_query($mysqli,
 "SELECT * FROM users ORDER BY id DESC");
?>

<html>
<body>
	<table width='80%' border=0>
	<tr bgcolor='#CCCCCC'>
		<td>id</td>
		<td>name</td>
		<td>age</td>
        <td>email</td>
		<td>Update</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";	
		echo "<td>".$res['id']."</td>";
		echo "<td>".$res['name']."</td>";
        echo "<td>".$res['age']."</td>";
        echo "<td>".$res['email']."</td>";   	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a></td>";
		echo "</tr>";			
	}
	?>
	</table>
</body>
</html>