<?php

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM pessoas ORDER BY cpf ASC"); 

?>

<html>
<body>

      
	<?php
		echo "<a href=\"edit.php\">adicionar</a>";
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
		<a href=\"edit.php?cpf=$res[cpf]\">Edit</a></td>";		
	}
	?>
	</table>
</body>
</html>