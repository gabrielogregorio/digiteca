<?php 

	include('layout/header.html');
	include('layout/navbar.php');

    include('seguranca/seguranca.php');
    
    session_start();

    if (administrador_logado() == false){
       header("location:index.php");
       exit;
    }
 ?>

	<div class="container" style="margin-top: 1.4rem;">

		<!-- Cabecalho da Pagina -->
 		<div class="card text-white bg-primary mb-2">
			<div class="card-body">
				<div class="text-center" style="font-size: 1.2em;">Efetuar Cadastro de Livros</div>
			</div>        
		</div>

		<div class="card bg-light">

			<div class="card-body">
		
				<!-- Aqui começa o nosso formulario -->
				<form action="cadLivrosBD.php" method="post">

					<!-- Título -->
					<div class="form-group mb-3">
						<label for="tituloCompleto">Título</label>
						<input type="text" class="form-control" name="tituloDoLivro" placeholder="Título" required>
					</div>

					<!-- Autor -->
					<div class="form-group mb-3">
						<label for="autorPrincipal">Autor Principal</label>
						<input type="text" class="form-control" name="autorPrincipal" placeholder="Autor Principal" required>
					</div>

					<!-- Descrição -->
					<div class="form-group mb-3">
						<label for="descricaoDoLivro">Descrição</label>
						<input type="text" class="form-control" name="descricaoDoLivro" placeholder="Descrição" required>
					</div>

					<!-- Gênero -->
					<div class="form-group mb-3">
						<label for="generoPrincipal">Gênero</label>
						<input type="text" class="form-control" name="generoPrincipal" placeholder="Gênero" required>
					</div>

					<!-- Editora -->
					<div class="form-group mb-3">
						<label for="nomeDaEditora">Editora</label>
						<input type="text" class="form-control" name="nomeDaEditora" placeholder="Editora" required>
					</div>

					<!-- Ano de Publicação -->
					<div class="form-group mb-3">
						<label for="anoDePublicacao">Ano de Publicação</label>
						<input type="number" class="form-control" name="anoDePublicacao" placeholder="Publicação" required>
					</div>

					<!-- ISBN -->
					<div class="form-group mb-3">
						<label for="codigoISBN">Código ISBN</label>
						<input type="text" class="form-control" name="codigoISBN" placeholder="Código ISBN" required>
					</div>

					<!-- Unidades Disponíveis -->
					<div class="form-group mb-3">
						<label for="unidadesDisponiveis">Unidades Disponiveis</label>
						<input type="number" class="form-control" name="unidadesDisponiveis" placeholder="Unidades Disponiveis" required>
					</div>

					<button type="reset" class="btn btn-secondary btn-lg"  onclick="history.go(-1)">Voltar</button>
					<button type="submit" class="btn btn-primary btn-lg">Salvar</button>

				</form>
		</div>

	</div>

<?php include('layout/footer.html'); ?>