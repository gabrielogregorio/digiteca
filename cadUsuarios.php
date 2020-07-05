<?php include('layout/header.html');?>

<form action="cadUsuariosBD.php" method="post">


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

  <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>

<?php include('layout/footer.html');?>