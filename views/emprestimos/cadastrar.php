<?php
# Impede que usuários acessem a página se não estiverem logados
include('../../seguranca/seguranca.php');
session_start();
if(administrador_logado() == false) {header("location: /Digiteca/index.php"); exit;}

include("../../recursos.php");
include('../../layout/header.html');
include('../../layout/navbar.php');

 ?>

	<div class="container mx-auto mt-4">
        <div class="alert alert-info" role="alert">
			Emprestar um Livro
		</div>

		<form action="/Digiteca/DB/emprestimos/cadastrar.php" method="post">

		    <div class="form-group">
			    <label>ISBN</label>
			    <input type="text" class="form-control" name="txtLIVRO_ISBN" placeholder="Informe o ISBN do livro" >
			</div>

			<div class="form-group">
			    <label>CPF</label>
			    <input type="text" class="form-control" name="txtCPF_PESSOA" placeholder="Informe o CPF do usuário" id="cpf_usuario" onblur="">
			</div>

			<div class="form-group">
			    <label >Data do Empréstimo</label>
    			<input class="form-control" id="data_emprestimo" name= "txtDATA_EMPRESTADO" type="text" value="<?php echo obter_data_dd_mm_yyyy(); ?>">
			</div>

		    <div class="form-group">
			    <label>Dias que o livro permanecerá emprestado</label>
			    <input class="form-control" name="txtTEMPO_EMPRESTIMO" type="text" placeholder="Quantos dias o livro ficará emprestado">
			</div>

		    <button type="submit" class="btn btn-primary btn-lg btn-block">Emprestar</button>

		</form>
	</div>

<?php include('../../layout/footer.html');?>
