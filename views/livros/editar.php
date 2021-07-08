<?php
# Impede que usuários acessem a página se não estiverem logados
include('../../seguranca/seguranca.php');
session_start();
if(administrador_logado() == false) {header("location: /Digiteca/index.php"); exit;}

include('../../layout/header.html');
include('../../layout/navbar.php');
require_once("../../conexao/conexao.php");

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
         <div class="card text-white bg-primary mb-2">
            <div class="card-body">
                <div class="text-center" style="font-size: 1.2em;">Editar Livros Cadastrados</div>
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
                <form action="/Digiteca/DB/livros/editar.php" method="post">

                    <input type="hidden" name="ISBN" value="<?php echo $ISBN ?>">

                    <!-- Título -->
                    <div class="form-group mb-3">
                        <label for="tituloCompleto">Título</label>
                        <input type="text" class="form-control" name="tituloDoLivro"
                        value="<?php echo $linha["TITULO"]; ?>" required>
                    </div>

                    <!-- Autor -->
                    <div class="form-group mb-3">
                        <label for="autorPrincipal">Autor Principal</label>
                        <input type="text" class="form-control" name="autorPrincipal"  placeholder="Autor Principal" value="<?php echo $linha["AUTOR"]; ?>" required>
                    </div>

                    <!-- Descrição -->
                    <div class="form-group mb-3">
                        <label for="descricaoDoLivro">Descrição</label>
                         <textarea type="text" name="descricaoDoLivro" class="form-control" rows="3" required value="<?php echo $linha["DESCRICAO"]; ?>"><?php echo $linha["DESCRICAO"]; ?></textarea>
                    </div>

                    <!-- Gênero -->
                    <div class="form-group mb-3">
                        <label for="generoPrincipal">Gênero</label>
                        <input type="text" class="form-control" name="generoPrincipal"
                        value="<?php echo $linha["GENERO"]; ?>" required>
                    </div>

                    <!-- Editora -->
                    <div class="form-group mb-3">
                        <label for="nomeDaEditora">Editora</label>
                        <input type="text" class="form-control" name="nomeDaEditora"
                        value="<?php echo $linha["EDITORA"]; ?>" required>
                    </div>

                    <!-- Ano de Publicação -->
                    <div class="form-group mb-3">
                        <label for="anoDePublicacao">Ano de Publicação</label>
                        <input type="date" class="form-control" name="anoDePublicacao"
                        value="<?php echo $linha["ANO_PUBLICACAO"]; ?>">
                    </div>

                    <!-- ISBN -->
                    <div class="form-group mb-3">
                        <label for="codigoISBN">Código ISBN</label>
                        <input type="text" class="form-control" name="codigoISBN"  placeholder="Código ISBN" value="<?php echo $linha["ISBN"]; ?>" required>
                    </div>

                    <!-- Unidades Disponíveis -->
					<div class="form-group mb-3">
						<label for="unidadesDisponiveis">Unidades Disponiveis</label>
						<input type="number" class="form-control" name="unidadesDisponiveis"  placeholder="Unidades Disponiveis" value="<?php echo $linha["UNIDADES_DISPONIVEIS"]; ?>" required>
					</div>

                    <button class="btn btn-secondary btn-lg" type="reset" onclick="history.go(-1)">Voltar</button>
                    <button class="btn btn-primary btn-lg" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>

<?php include('../../layout/footer.html'); ?>
