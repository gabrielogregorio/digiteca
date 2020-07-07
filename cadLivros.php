<?php 
    //include('seguranca/seguranca.php');
    
    //session_start();

    //if (administrador_logado() == false){
      // header("location:index.php");
       //exit;
    //}
 ?>

 <?php include('layout/header.html'); ?>
<?php include('layout/navbar.php'); ?>

	<div class="container mx-auto mt-4">

		<div class="alert alert-primary text-center">
			<h1>Cadastro de Livros</h1>		
		</div>
		
			
			<form action="cadLivrosBD.php" method="post">

				<div class="form-group">
					<label>Título do Livro</label>
					<input type="text" class="form-control" name="titulolivro" placeholder="Informe o título do livro">
				</div>

				<div class="form-group">
					<label>Gênero do livro</label>
					<input type="text" class="form-control" name="generolivro" placeholder="Informe o gênero do livro">
				</div>

				<div class="form-group">
					<label>Autor</label>
					<input type="text" class="form-control" name="autorlivro" placeholder="Informe o autor do livro">
				</div>

				<div class="form-group">
					<label>Editora</label>
					<input type="text" class="form-control" name="editoralivro" placeholder="Informe a editora do livro">
				</div>

				<div class="form-group">
					<label>Ano de Publicação</label>
					<input type="text" class="form-control" name="anolivro" placeholder="Informe o ano de publicação do livro">
				</div>

				<div class="form-group">
					<label>ISBN</label>
					<input type="text" class="form-control" name="isbnlivro" placeholder="Informe o código ISBN do livro">
				</div>

				<div>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar livro</button>
				</div>
			
			</form>

		</div>
	</div>















<?php include('layout/footer.html'); ?>