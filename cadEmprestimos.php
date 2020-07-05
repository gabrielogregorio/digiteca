<?php include('layout/header.html');?>
<?php include('layout/navbar.php'); ?>

<div class="page-container"  class="mx-auto">
    <div class="content-wrap">
        <div class="card card-header" id="card-style">

			<form action="cadEmprestimosBD.php" method="post">

			    <div class="form-group">
			      <label>Livro</label>
			      <select nome="txtLIVRO_ISBN" class="form-control">
			        <option selected>Livro</option>

					<?php
					require_once("conexao/conexao.php");

					$select = $conexao->query("SELECT TITULO, ISBN FROM LIVROS ORDER BY TITULO");
					$resultado = $select->fetchAll();

					if($resultado)
					{
					     foreach ($resultado as $linha) 
					     {
					?>

    			        <option value="<?php echo $linha["ISBN"]; ?>" > <?php echo $linha["TITULO"]; ?> </option>
					<?php }} ?>

			      </select>
			    </div>


			  <div class="form-group">
			    <label>CPF</label>
			    <input type="text" class="form-control" name="txtCPF" placeholder="Informe o CPF do usuário">
			  </div>


			  <div class="form-group">
			    <label>Nome</label>
			  <input class="form-control" id="disabledInput" type="text" placeholder="Gabriel Gregório da Silva" disabled>
			</div>


			  <div class="form-group">
			    <label>Data do Empréstimo</label>
			  <input class="form-control" id="disabledInput" type="text" placeholder="22/02/2020" disabled>
			</div>

			  <div class="form-group">
			    <label>Dias que o livro permanecerá emprestado</label>
			  <input class="form-control" id="disabledInput" type="text" placeholder="5" disabled>
			</div>


				  <button type="button" class="btn btn-danger" onclick="history.go(-1)">Cancelar</button>
				  <button type="submit" class="btn btn-success">Emprestar</button>

			</form>
		</div>
	</div>
</div>

<?php include('layout/footer.html');?>