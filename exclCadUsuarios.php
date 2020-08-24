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
         <div class="card text-white bg-danger mb-2">
            <div class="card-body">
                <div class="text-center" style="font-size: 1.2em;">Deseja mesmo excluir esse usuário?</div>
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

                <form action="exclCadUsuariosBD.php" method="post">

                    <input type="hidden" name="CPF" value="<?php echo $CPF ?>">

                    <div class="form-group mb-3">
                        <label>CPF</label>
                        <input type="text" class="form-control"
                        value="<?php echo $linha["CPF"]; ?>" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label>NOME</label>
                        <input type="text" class="form-control"  
                        value="<?php echo $linha["NOME"]; ?>" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label>SOBRENOME</label>
                        <input type="text" class="form-control"
                        value="<?php echo $linha["SOBRENOME"]; ?>" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label>EMAIL</label>
                        <input type="text" class="form-control"
                        value="<?php echo $linha["EMAIL"]; ?>" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label>TELEFONE</label>
                        <input type="text" class="form-control"
                        value="<?php echo $linha["TELEFONE"]; ?>" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label>DATA_NASCIMENTO</label>
                        <input type="date" class="form-control" 
                        value="<?php echo $linha["DATA_NASCIMENTO"]; ?>" disabled>
                    </div>

                    <a href="visUsuarios.php"><button class="btn btn-secondary btn-lg" type="button">Voltar</button></a>

                    <button class="btn btn-danger btn-lg" type="sumbit">Confirmar Exclusão
                    </button>

                </form>
            </div>
        </div>
    </div>

<?php include('layout/footer.html'); ?>

