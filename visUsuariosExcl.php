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

    if(!filter_input(INPUT_GET, "CPF", FILTER_SANITIZE_STRING)) {
        
        echo "CPF é inválido!";

    } else {

        $CPF = filter_input(INPUT_GET, "CPF", FILTER_SANITIZE_STRING);
        $consulta = $conexao->query("SELECT * FROM USUARIOS WHERE CPF = '$CPF'");
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
                    <input type="hidden" name="ISBN" value="<?php echo $ISBN ?>">

                    <!-- Título -->
                    <div class="form-group mb-3">
                        <label for="CPF">CPF</label>
                        <input type="text" class="form-control" name="CPF" placeholder="CPF" 
                        value="<?php echo $linha["CPF"]; ?>" required>
                    </div>

                    <!-- Autor -->
                    <div class="form-group mb-3">
                        <label for="NOME">NOME</label>
                        <input type="text" class="form-control" name="NOME" placeholder="Autor Principal" 
                        value="<?php echo $linha["NOME"]; ?>" required>
                    </div>

                    <!-- Descrição -->
                    <div class="form-group mb-3">
                        <label for="SOBRENOME">SOBRENOME</label>
                        <input type="text" class="form-control" name="SOBRENOME" placeholder="SOBRENOME" 
                        value="<?php echo $linha["SOBRENOME"]; ?>" required>
                    </div>

                    <!-- Gênero -->
                    <div class="form-group mb-3">
                        <label for="EMAIL">EMAIL</label>
                        <input type="text" class="form-control" name="EMAIL"  placeholder="EMAIL" 
                        value="<?php echo $linha["EMAIL"]; ?>" required>
                    </div>

                    <!-- Editora -->
                    <div class="form-group mb-3">
                        <label for="TELEFONE">TELEFONE</label>
                        <input type="text" class="form-control" name="TELEFONE" id="TELEFONE" placeholder="TELEFONE" 
                        value="<?php echo $linha["TELEFONE"]; ?>" required>
                    </div>
                        
                    <!-- Ano de Publicação -->
                    <div class="form-group mb-3">
                        <label for="DATA_NASCIMENTO">DATA_NASCIMENTO</label>
                        <input type="date" class="form-control" name="DATA_NASCIMENTO"
                        value="<?php echo $linha["DATA_NASCIMENTO"]; ?>">
                    </div>

                    <button class="btn btn-danger btn-lg btn-block" type="sumbit">Confirmar Exclusão
                    </button>

                </form>
            </div>
        </div>
    </div>

<?php include('layout/footer.html'); ?>

