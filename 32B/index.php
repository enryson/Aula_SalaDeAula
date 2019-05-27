<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM pessoas ORDER BY cpf ASC");
?>

<html>

<head>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<div class="container position-relative">
		<?php
		echo "<a href=\"edit.php\">adicionar</a>";
		?>
		<table class="table table-striped table-dark">
			<thead class="thead-dark">
				<tr scope="row">
					<td>cpf</td>
					<td>nome</td>
					<td>sobrenome</td>
					<td>nascimento</td>
					<td>Update</td>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($res = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . $res['cpf'] . "</td>";
					echo "<td>" . $res['p_nome'] . "</td>";
					echo "<td>" . $res['p_sobrenome'] . "</td>";
					echo "<td>" . $res['p_nascimento'] . "</td>";
					echo "<td>
		<a href=\"edit.php?cpf=$res[cpf]\">Edit</a></td>";
				}
				?>
			</tbody>
		</table>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>