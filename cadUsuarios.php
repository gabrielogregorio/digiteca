<?php 
    include('seguranca/seguranca.php');
    
    session_start();

    if (administrador_logado() == false){
       header("location:index.php");
       exit;
    }
 ?>

 <?php include('layout/header.html');?>
<?php include('layout/navbar.php'); ?>

<div class="container form-cad-usuario">
    <div class="content-wrap">
        <div class="card card-header" id="card-style">

			<form class="form-group" action="cadUsuariosBD.php" method="post">
				<div class="form-group">
			    	<label>CPF</label>
			    	<input type="text" class="form-control" name="txtCPF" placeholder="Informe o CPF">
			  	</div>

			  	<div class="form-group">
			    	<label>Nome</label>
			    	<input type="text" class="form-control" name="txtNOME" placeholder="Informe o nome">
			  	</div>

			  	<div class="form-group">
			    	<label>Sobrenome</label>
			    	<input type="text" class="form-control" name="txtSOBRENOME" placeholder="Informe o sobrenome">
			  	</div>

			  	<div class="form-group">
			  	  	<label>Endereço de email</label>
			  	  	<input type="email" class="form-control" name="txtEMAIL" placeholder="Informe o e-mail">
			  	</div>

			  	<div class="form-group">
			    	<label>Celular principal</label>
			    	<input type="text" class="form-control" name="txtTELEFONE" placeholder="Informe o celular">
			  	</div>

			  	<div class="form-group">
			    	<label>Data de nascimento</label>
			    	<input type="text" class="form-control" name="txtDATA_NASCIMENTO" placeholder="Informe a data de nascimento">
				</div>
				  
			  <button type="button" class="btn btn-danger" onclick="history.go(-1)">Cancelar</button>
			  <button type="submit" class="btn btn-success">Cadastrar</button>

			</form>
		</div>
	</div>
</div>

<?php include('layout/footer.html');?>