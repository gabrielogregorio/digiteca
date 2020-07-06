<?php include('layout/header.html'); ?>
<?php include('layout/navbar.php'); ?>


 <div class="container mt-4">

	<table class="table">
		<thead class="table-light">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">ISBN</th>
				<th scope="col">Título</th>
				<th scope="col"></th>
				<th scope="col"></th>

				
			</tr>			
		</thead>

		<tbody>
			<tr>
				<td scope="row">0000</td>
				<td>0000</td>
				<td>ffff</td>
				<td><a href="altFilmes.php?id=<?php echo "$dados[id_filme]"; ?>"><img src="assets/images/editar.png" width="30"></a></td>
                <td><a href="excFilmes.php?id=<?php echo "$dados[id_filme]"; ?>"><img src="assets/images/excluir.png" width="30"></a></td>

			</tr>
			
		</tbody>		
	</table>
</div>

































<?php include('layout/footer.html'); ?>