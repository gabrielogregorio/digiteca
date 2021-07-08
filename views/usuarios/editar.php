<?php
# Impede que usuários acessem a página se não estiverem logados
include('../../seguranca/seguranca.php');
session_start();
if(administrador_logado() == false) {header("location: /Digiteca/index.php"); exit;}

include('../../layout/header.html');
include('../../layout/navbar.php');
require_once("../../conexao/conexao.php");

if(!filter_input(INPUT_GET, "CPF", FILTER_SANITIZE_STRING)) {
    echo "CPF é inválido!";
} else {

    $CPF = filter_input(INPUT_GET, "CPF", FILTER_SANITIZE_STRING);
    $consulta = $conexao->query("SELECT * FROM USUARIOS WHERE CPF='$CPF'");
    $linha = $consulta->fetch(PDO::FETCH_ASSOC);
}
?>

    <div class="container" style="margin-top: 1.4rem;">
         <div class="card text-white bg-primary mb-2">
            <div class="card-body">
                <div class="text-center" style="font-size: 1.2em;">Editar Usuarios Cadastrados</div>
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
                <form action="/Digiteca/DB/usuarios/editar.php" method="post">
                    <input type="hidden" name="txtCPFAtualizar" value="<?php echo $CPF ?>">
                    <div class="form-group mb-3">
                        <label>CPF</label>
                        <input type="text" class="form-control" name="txtCPF"
                        value="<?php echo $linha["CPF"]; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>NOME</label>
                        <input type="text" class="form-control"  name="txtNOME"
                        value="<?php echo $linha["NOME"]; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>SOBRENOME</label>
                        <input type="text" class="form-control" name="txtSOBRENOME"
                        value="<?php echo $linha["SOBRENOME"]; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>EMAIL</label>
                        <input type="text" class="form-control" name="txtEMAIL"
                        value="<?php echo $linha["EMAIL"]; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>TELEFONE</label>
                        <input type="text" class="form-control" name="txtTELEFONE"
                        value="<?php echo $linha["TELEFONE"]; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>DATA_NASCIMENTO</label>
                        <input type="date" class="form-control"  name="txtDATA_NASCIMENTO"
                        value="<?php echo $linha["DATA_NASCIMENTO"]; ?>">
                    </div>

                    <a href="/Digiteca/views/usuarios/visualizar.php"><button class="btn btn-secondary btn-lg" type="button">Voltar</button></a>
                    <button class="btn btn-primary btn-lg" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>

<?php include('../../layout/footer.html'); ?>
