<?php include('layout/header.html');?>
<?php include('layout/navbar.php'); ?>
<?php include("recursos.php"); ?>

<div class="container mx-auto mt-4">
   <div class="alert alert-info" role="alert">Vsializar Emprestimos</div>


<form id="search-form" name="pesquisa" action="visEmprestimos.php" method="get">

    <div class="input-group">
        <div class="input-group-prepend col-md-8">
            <input type="text" name="search" class="form-control" placeholder="Recipiente para nickname" aria-label="Recipiente para nickname" aria-describedby="basic-addon2">
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
         require_once("conexao/conexao.php");

         if (isset($_GET["search"]) == false){
             $select = $conexao->query("SELECT EMPRESTIMO.STATUS_LIVRO, USUARIOS.NOME, EMPRESTIMO.DATA_EMPRESTADO, LIVROS.TITULO
                 FROM EMPRESTIMO
                 INNER JOIN LIVROS
                 ON EMPRESTIMO.LIVRO_ISBN = LIVROS.ISBN
                 INNER JOIN USUARIOS
                 ON EMPRESTIMO.CPF_PESSOA = USUARIOS.CPF
                 GROUP BY EMPRESTIMO.DATA_EMPRESTADO");


        } else {

             $ITEM_TIPO = $_GET["search"];            

             $ITEM_PESQUISA = $_GET["tipobusca"];

             if ($ITEM_PESQUISA == "Nome do livro"){
                 $select = $conexao->query("SELECT EMPRESTIMO.STATUS_LIVRO, USUARIOS.NOME, EMPRESTIMO.DATA_EMPRESTADO, LIVROS.TITULO FROM EMPRESTIMO INNER JOIN LIVROS ON EMPRESTIMO.LIVRO_ISBN = LIVROS.ISBN INNER JOIN USUARIOS ON EMPRESTIMO.CPF_PESSOA = USUARIOS.CPF WHERE LIVROS.TITULO LIKE '%$ITEM_TIPO%' GROUP BY EMPRESTIMO.DATA_EMPRESTADO");
             }
             else if ($ITEM_PESQUISA == "Nome da pessoa"){
                 $select = $conexao->query("SELECT EMPRESTIMO.STATUS_LIVRO, USUARIOS.NOME, EMPRESTIMO.DATA_EMPRESTADO, LIVROS.TITULO FROM EMPRESTIMO INNER JOIN LIVROS ON EMPRESTIMO.LIVRO_ISBN = LIVROS.ISBN INNER JOIN USUARIOS ON EMPRESTIMO.CPF_PESSOA = USUARIOS.CPF WHERE USUARIOS.NOME LIKE '%$ITEM_TIPO%' GROUP BY EMPRESTIMO.DATA_EMPRESTADO");
             }
             else if ($ITEM_PESQUISA == "CPF"){
                 $select = $conexao->query("SELECT EMPRESTIMO.STATUS_LIVRO, USUARIOS.NOME, EMPRESTIMO.DATA_EMPRESTADO, LIVROS.TITULO FROM EMPRESTIMO INNER JOIN LIVROS ON EMPRESTIMO.LIVRO_ISBN = LIVROS.ISBN INNER JOIN USUARIOS ON EMPRESTIMO.CPF_PESSOA = USUARIOS.CPF WHERE USUARIOS.CPF LIKE '%$ITEM_TIPO%' GROUP BY EMPRESTIMO.DATA_EMPRESTADO");
             }
             else if ($ITEM_PESQUISA == "ISBN"){
                 $select = $conexao->query("SELECT EMPRESTIMO.STATUS_LIVRO, USUARIOS.NOME, EMPRESTIMO.DATA_EMPRESTADO, LIVROS.TITULO FROM EMPRESTIMO INNER JOIN LIVROS ON EMPRESTIMO.LIVRO_ISBN = LIVROS.ISBN INNER JOIN USUARIOS ON EMPRESTIMO.CPF_PESSOA = USUARIOS.CPF WHERE LIVROS.ISBN LIKE '%$ITEM_TIPO%' GROUP BY EMPRESTIMO.DATA_EMPRESTADO");
             } 

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




                    <?php

                       

                       $DATA = $linha["DATA_EMPRESTADO"];
                       
                       if ($linha["STATUS_LIVRO"] == "A DEVOLVER"){
                           echo("<p class=\"card-text\">Prazo: $DATA<span class=\"badge badge-danger\">A devolver</span></p>");
                       }
                       elseif ($linha["STATUS_LIVRO"] == "DEVOLVIDO") {
                           echo("<p class=\"card-text\">Prazo: $DATA</p>");
                       }
                       elseif ($linha["STATUS_LIVRO"] == "NÃO DEVOLVIDO") {
                          echo("<p class=\"card-text\">Prazo: $DATA<span class=\"badge badge-warning\">Não devolvido</span></p>");
                       }
                       echo( "<button type=\"submit\" class=\"btn btn-success\">Success</button>" );
                    ?>


                 </div>
              </div>
            <?php 
        }
    }

    echo("<div class=\"alert alert-secondary\" role=\"alert\">Nenhum resultado</div>");

    ?>

   </div>
</div>

<?php include('layout/footer.html');?>