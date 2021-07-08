<?php
# Impede que usuários acessem a página se não estiverem logados
include('../../seguranca/seguranca.php');
session_start();
if(administrador_logado() == false) {header("location: /Digiteca/index.php"); exit;}

include('../../layout/header.html');
include('../../layout/navbar.php');
include("../../recursos.php");
?>


<div class="container mx-auto mt-4">
   <div class="alert alert-info" role="alert">
       Visualizar Usuários
    </div>
    <form id="search-form" name="pesquisa" action="/Digiteca/views/usuarios/visualizar.php" method="get">
        <div class="input-group">
            <div class="input-group-prepend col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Digite sua pesquisa" aria-describedby="basic-addon2">
            </div>

            <select name="tipobusca" class="">
                <option value="Nome">Nome</option>
                <option value="Sobrenome">Sobrenome</option>
                <option value="CPF">CPF</option>
            </select>

            <button type="submit" class="btn btn-info">Pesquisar</button>
        </div>
    </form>
   <div class="form-group">
        <label></label>

        <?php
        require_once("../../conexao/conexao.php");

        if (isset($_GET["search"]) == false){
            $select = $conexao->query("SELECT NOME, SOBRENOME, DATA_NASCIMENTO, CPF FROM USUARIOS");
        } else {
            $ITEM_TIPO = $_GET["search"];
            $ITEM_PESQUISA = $_GET["tipobusca"];

            echo "$ITEM_PESQUISA";

            if ($ITEM_PESQUISA == "Nome"){
                $FILTRO_BUSCA = "NOME";
            } else if ($ITEM_PESQUISA == "Sobrenome"){
                $FILTRO_BUSCA = "SOBRENOME";
            } else if ($ITEM_PESQUISA == "CPF"){
                $FILTRO_BUSCA = "CPF";
            }

            $select = $conexao->query("SELECT NOME, SOBRENOME, DATA_NASCIMENTO, CPF FROM USUARIOS WHERE $FILTRO_BUSCA LIKE '%$ITEM_TIPO%'");
        }

        $resultado = $select->fetchAll();

        if($resultado)
        {
            foreach ($resultado as $linha)
            {
              $CPF = $linha["CPF"];
            ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $linha["NOME"]; echo " "; echo $linha["SOBRENOME"]; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">CPF <?php echo $linha["CPF"]; ?></h6>

                <form action="/Digiteca/views/usuarios/editar.php" method="get">
                    <input type="hidden" name="CPF" value="<?php echo $CPF?>">
                    <button type="submit" class="btn btn-secondary">Editar</button>
                </form>

                <form action="/Digiteca/views/usuarios/excluir.php" method="get">
                    <input type="hidden" name="CPF" value="<?php echo $CPF?>">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
            <?php
            }
            } else {
                echo("<div class=\"alert alert-secondary\" role=\"alert\">Nenhum resultado</div>");
            }
            ?>
   </div>
</div>

<?php include('../../layout/footer.html');?>
