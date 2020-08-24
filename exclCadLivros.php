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
    if(!filter_input(INPUT_GET, "ISBN", FILTER_SANITIZE_STRING)) {
        echo "ISBN é inválido!";

    } else {

        $ISBN = filter_input(INPUT_GET, "ISBN", FILTER_SANITIZE_STRING);
        $consulta = $conexao->query("SELECT * FROM LIVROS WHERE ISBN='$ISBN'");
        $linha = $consulta->fetch(PDO::FETCH_ASSOC);
    }
?>

    <div class="container" style="margin-top: 1.4rem;">

        <!-- Cabecalho da Pagina -->
         <div class="card text-white bg-danger mb-2">
            <div class="card-body">
                <div class="text-center" style="font-size: 1.2em;">Deseja mesmo excluir esse livro?</div>
            </div>        
        </div>

        <?php 
            if ( isset($_GET["mensagem_erro"]) == true ) {
                $mensagem_erro = $_GET["mensagem_erro"];
                print_r ("<div class=\"alert alert-danger\" role=\"alert\">Erro ao tentar executar atualização: $mensagem_erro</div>");
            } 

        ?>

        <div class="card bg-light">
            <div class="card-body">
                <!-- Aqui começa o nosso formulario -->
                <form action="exclCadLivrosBD.php" method="post">

                    <input type="hidden" name="ISBN" value="<?php echo $ISBN ?>">

                    <!-- Título -->
                    <div class="form-group mb-3">
                        <label for="tituloCompleto">Título</label>
                        <input type="text" class="form-control" placeholder="Título" 
                        value="<?php echo $linha["TITULO"]; ?>" disabled>
                    </div>

                    <!-- Autor -->
                    <div class="form-group mb-3">
                        <label for="autorPrincipal">Autor Principal</label>
                        <input type="text" class="form-control" placeholder="Autor Principal" 
                        value="<?php echo $linha["AUTOR"]; ?>" disabled>
                    </div>

                    <!-- Descrição -->
                    <div class="form-group mb-3">
                        <label for="descricaoDoLivro">Descrição</label>
                         <textarea type="text" class="form-control" rows="3" disabled value="<?php echo $linha["DESCRICAO"]; ?>"><?php echo $linha["DESCRICAO"]; ?></textarea>
                    </div>

                    <!-- Gênero -->
                    <div class="form-group mb-3">
                        <label for="generoPrincipal">Gênero</label>
                        <input type="text" class="form-control"
                        value="<?php echo $linha["GENERO"]; ?>" disabled>
                    </div>

                    <!-- Editora -->
                    <div class="form-group mb-3">
                        <label for="nomeDaEditora">Editora</label>
                        <input type="text" class="form-control" placeholder="Editora" 
                        value="<?php echo $linha["EDITORA"]; ?>" disabled>
                    </div>
                        
                    <!-- Ano de Publicação -->
                    <div class="form-group mb-3">
                        <label for="anoDePublicacao">Ano de Publicação</label>
                        <input type="date" disabled class="form-control" placeholder="Publicação" 
                        value="<?php echo $linha["ANO_PUBLICACAO"]; ?>">
                    </div>

                    <!-- ISBN -->
                    <div class="form-group mb-3">
                        <label for="codigoISBN">Código ISBN</label>
                        <input type="text" class="form-control" placeholder="Código ISBN" 
                        value="<?php echo $linha["ISBN"]; ?>" disabled>
                    </div>

                    <!-- Unidades Disponíveis -->
					<div class="form-group mb-3">
						<label for="unidadesDisponiveis">Unidades Disponiveis</label>
						<input type="number" class="form-control" name="unidadesDisponiveis" placeholder="Unidades Disponiveis" 
                        value="<?php echo $linha["UNIDADES_DISPONIVEIS"]; ?>" disabled>
					</div>

                    <button class="btn btn-danger btn-lg btn-block" type="sumbit">Confirmar Exclusão
                    </button>

                </form>
            </div>
        </div>
    </div>

<?php include('layout/footer.html'); ?>
