<?php include('layout/header.html');?>
<?php include('layout/navbar.php'); ?>
<?php include("recursos.php"); ?>

<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Faça uma busca" aria-describedby="basic-addon1"> <button type="button" class="btn btn-info">Pesquisar</button>
</div>

<label class="custom-control-label" for="customCheckDisabled">Filtrar por</label>

<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline1">Pendências</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline2">Devolvidos</label>
</div>


<div class="form-group">
  <label>Livro</label>

    <?php
        require_once("conexao/conexao.php");

        $select = $conexao->query("SELECT * FROM EMPRESTIMO");
        $resultado = $select->fetchAll();

        if($resultado)
        {
            foreach ($resultado as $linha) 
            {
            ?>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $linha["LIVRO_ISBN"]; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Emprestado para o <a href="#"><?php echo $linha["CPF_PESSOA"]; ?></a></h6>
                        <?php
                            if ($linha["STATUS_LIVRO"] == "A DEVOLVER"){
                                print_r("<p class=\"card-text\">Prazo: 20 de julho de 2020​<span class=\"badge badge-danger\">A devolver</span></p>");
                            }
                            elseif (($linha["STATUS_LIVRO"] == "DEVOLVIDO")) {
                                print_r("<p class=\"card-text\">Prazo: 20 de julho de 2020​<span class=\"badge badge-success\">Devolvido</span></p>");
                            }
                            elseif (($linha["STATUS_LIVRO"] == "NÃO DEVOLVIDO")) {
                                print_r("<p class=\"card-text\">Prazo: 20 de julho de 2020​<span class=\"badge badge-warning\">Não devolvido</span></p>");
                            }
                        ?>
                    </div>
                </div>


        <?php 
        }
        }?>

  </select>
</div>


<?php include('layout/footer.html');?>