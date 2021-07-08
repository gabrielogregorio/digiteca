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
    <div class="alert alert-info" role="alert">Visualizar Emprestimos</div>
    <form id="search-form" name="pesquisa" action="/Digiteca/views/emprestimos/visualizar.php" method="get">
        <div class="input-group">
            <div class="input-group-prepend col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Digite sua pesquisa" aria-describedby="basic-addon2">
            </div>

            <select name="tipobusca" class="">
                <option value="Nome do livro">Nome do livro</option>
                <option value="Nome da pessoa">Nome da pessoa</option>
                <option value="CPF">CPF</option>
                <option value="ISBN">ISBN</option>
            </select>

            <button type="submit" class="btn btn-info">Pesquisar</button>
        </div>
    </form>

   <div class="form-group">
      <label></label>
      <?php
         require_once("../../conexao/conexao.php");

         if (isset($_GET["search"]) == false){
             $select = $conexao->query("SELECT EMPRESTIMO.ID, EMPRESTIMO.STATUS_LIVRO, USUARIOS.NOME, USUARIOS.SOBRENOME, EMPRESTIMO.DATA_EMPRESTADO, EMPRESTIMO.TEMPO_EMPRESTIMO, LIVROS.TITULO
                FROM EMPRESTIMO
                INNER JOIN LIVROS
                ON LIVROS.ISBN = EMPRESTIMO.LIVRO_ISBN
                INNER JOIN USUARIOS
                ON USUARIOS.CPF = EMPRESTIMO.CPF_PESSOA
                GROUP BY ID
                ORDER BY EMPRESTIMO.DATA_EMPRESTADO DESC");
        } else {
            $ITEM_TIPO = $_GET["search"];
            $ITEM_PESQUISA = $_GET["tipobusca"];

            if ($ITEM_PESQUISA == "Nome do livro"){ $FILTRO_BUSCA = "LIVROS.TITULO"; }
            else if ($ITEM_PESQUISA == "Nome da pessoa"){ $FILTRO_BUSCA = "USUARIOS.NOME"; }
            else if ($ITEM_PESQUISA == "CPF"){ $FILTRO_BUSCA = "USUARIOS.CPF"; }
            else if ($ITEM_PESQUISA == "ISBN"){ $FILTRO_BUSCA = "LIVROS.ISBN"; }

            $select = $conexao->query("SELECT EMPRESTIMO.ID, EMPRESTIMO.STATUS_LIVRO, USUARIOS.NOME, USUARIOS.SOBRENOME, EMPRESTIMO.DATA_EMPRESTADO, EMPRESTIMO.TEMPO_EMPRESTIMO, LIVROS.TITULO
              FROM EMPRESTIMO
              INNER JOIN LIVROS
              ON LIVROS.ISBN = EMPRESTIMO.LIVRO_ISBN
              INNER JOIN USUARIOS
              ON USUARIOS.CPF = EMPRESTIMO.CPF_PESSOA
              WHERE $FILTRO_BUSCA LIKE '%$ITEM_TIPO%'
              GROUP BY ID
              ORDER BY EMPRESTIMO.DATA_EMPRESTADO DESC
              ");
        }

        $resultado = $select->fetchAll();

        if($resultado)
        {
            foreach ($resultado as $linha)
            {
            ?>
              <div class="card">
                 <div class="card-body">
                    <h5 class="card-title"><?php echo $linha["TITULO"];?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Emprestado para o <a href="#"><?php echo $linha["NOME"]; ?> <?php echo $linha["SOBRENOME"]; ?></a></h6>

                    <?php
                       $DATA = $linha["DATA_EMPRESTADO"];
                       $TEMPO_EMPRESTIMO = $linha["TEMPO_EMPRESTIMO"];
                       $DATA_VENCIMENTO = date('Ymd', strtotime($DATA. " + $TEMPO_EMPRESTIMO days"));

                       if ($linha["STATUS_LIVRO"] == "NÃO DEVOLVIDO") {
                        if ($DATA_VENCIMENTO < obter_data_dd_mm_yyyy()){

                          echo("<p class=\"card-text\"><span class=\"badge badge-danger\">Venceu em $DATA</span></p>");
                        } else if  ($DATA_VENCIMENTO == obter_data_dd_mm_yyyy()){
                            echo("<p class=\"card-text\"><span class=\"badge badge-warning\">Vecimento Hoje</span></p>");
                        }
                       }
                       $ID = $linha["ID"];

                       if ($linha["STATUS_LIVRO"] == "DEVOLVIDO") {
                            $texto_botao = "Devolvido";
                            $tipo_botao = "success";
                            $link_botao = "/Digiteca/DB/emprestimos/MarcarPendencia.php";
                        }
                        else
                        {
                            $texto_botao = "Marcar Devolvido";
                            $tipo_botao = "info";
                            $link_botao = "/Digiteca/DB/emprestimos/MarcarDevolvido.php";
                        }

                        echo( "
                           <form name=\"pendencia\" action=\"$link_botao\" method=\"post\">
                              <input type=\"hidden\" name=\"txtIDEMPRESTIMO\" value=\"$ID\">
                              <button type=\"submit\" class=\"btn btn-$tipo_botao\">$texto_botao</button>
                           </form>
                       ");
                    ?>

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
