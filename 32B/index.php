<?php

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM pessoas ORDER BY cpf DESC"); 

?>

<html>
<body>
	<?php
		echo "<a href=\"edit.php?new=1\">adicionar</a>";
	?>
	<table width='80%' border=0>
	<tr bgcolor='#CCCCCC'>
		<td>cpf</td>
		<td>nome</td>
		<td>sobrenome</td>
        <td>nascimento</td>
		<td>Update</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";	
		echo "<td>".$res['cpf']."</td>";
		echo "<td>".$res['p_nome']."</td>";
        echo "<td>".$res['p_sobrenome']."</td>";
        echo "<td>".$res['p_nascimento']."</td>";
		echo "<td>
		<a href=\"edit.php?cpf=$res[cpf]\">Edit</a> | 

		
		<a href=\"delete.php?id=$res[cpf]\" 
		onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>