<?php

    include('layout/header.html');
    include('layout/navbar.php');

    include('seguranca/seguranca.php');
    
    session_start();

    if(administrador_logado() == false) {

        header("location: index.php");
        
        exit;
    }

    require_once("conexao/conexao.php");

    if(!filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING)) {
        
        echo "ID é inválido!";

    } else {

        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);

        $consulta = $conexao->query("SELECT * FROM LIVROS WHERE id=$id");

        $linha = $consulta->fetch(PDO::FETCH_ASSOC);
    }
?>

    <div class="container" style="margin-top: 1.4rem;">

        <!-- Cabecalho da Pagina -->
         <div class="card text-white bg-primary mb-2">
            <div class="card-body">
                <div class="text-center" style="font-size: 1.2em;">Editar Livros Cadastrados</div>
            </div>        
        </div>

        <div class="card bg-light">

            <div class="card-body">
                
                <!-- Aqui começa o nosso formulario -->
                <form action="exclCadLivrosBD.php" method="post">

                    <input type="hidden" name="id" value="<?php echo $id ?>">

                    <!-- Título -->
                    <div class="form-group mb-3">
                        <label for="tituloCompleto">Título</label>
                        <input type="text" class="form-control" name="tituloDoLivro" id="tituloDoLivro" placeholder="Título" 
                        value="<?php echo $linha['TITULO']; ?>" required>
                    </div>

                    <!-- Autor -->
                    <div class="form-group mb-3">
                        <label for="autorPrincipal">Autor Principal</label>
                        <input type="text" class="form-control" name="autorPrincipal" id="autorPrincipal" placeholder="Autor Principal" 
                        value="<?php echo $linha['AUTOR']; ?>" required>
                    </div>

                    <!-- Descrição -->
                    <div class="form-group mb-3">
                        <label for="descricaoDoLivro">Descrição</label>
                        <input type="text" class="form-control" name="descricaoDoLivro" id="descricaoDoLivro" placeholder="Descrição" 
                        value="<?php echo $linha['DESCRICAO']; ?>" required>
                    </div>

                    <!-- Gênero -->
                    <div class="form-group mb-3">
                        <label for="generoPrincipal">Gênero</label>
                        <input type="text" class="form-control" name="generoPrincipal" id="generoPrincipal" placeholder="Gênero" 
                        value="<?php echo $linha['GENERO']; ?>" required>
                    </div>

                    <!-- Editora -->
                    <div class="form-group mb-3">
                        <label for="nomeDaEditora">Editora</label>
                        <input type="text" class="form-control" name="nomeDaEditora" id="nomeDaEditora" placeholder="Editora" 
                        value="<?php echo $linha['TITULO']; ?>" required>
                    </div>
                        
                    <!-- Ano de Publicação -->
                    <div class="form-group mb-3">
                        <label for="anoDePublicacao">Ano de Publicação</label>
                        <input type="number" class="form-control" name="anoDePublicacao" id="anoDePublicacao" placeholder="Publicação" 
                        value="<?php echo $linha['ANO_PUBLICACAO']; ?>" required>
                    </div>

                    <!-- ISBN -->
                    <div class="form-group mb-3">
                        <label for="codigoISBN">Código ISBN</label>
                        <input type="text" class="form-control" name="codigoISBN" id="codigoISBN" placeholder="Código ISBN" 
                        value="<?php echo $linha['ISBN']; ?>" required>
                    </div>

                    <!-- Unidades Disponíveis -->
					<div class="form-group mb-3">
						<label for="unidadesDisponiveis">Unidades Disponiveis</label>
						<input type="number" class="form-control" name="unidadesDisponiveis" id="unidadesDisponiveis" placeholder="Unidades Disponiveis" 
                        value="<?php echo $linha['UNIDADES_DISPONIVEIS']; ?>" required>
					</div>

                    <button class="btn btn-danger btn-lg btn-block" type="sumbit">Confirmar Exclusão</button>

                </form>

            </div>

        </div>

    </div>

<?php include('layout/footer.html'); ?>