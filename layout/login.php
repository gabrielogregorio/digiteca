<!-- Formulario de Login -->

<?php include('header.html'); ?>

    <div class="page-container">
        <div class="content-wrap">
            <div class="card card-header" id="card-style">
                <form class="form-signin" action="layout/loginDB.php" method="post">

                    <div class="text-center mb-4">
                        <img class="mb-4" src="http://localhost/digiteca/assets/images/digiteca_.png" alt="Digiteca" width="389" height="116">
                        <div class="alert alert-danger" role="alert">
                            Acesso permitido somente para Administradores
                        </div>
                    </div>

                    <div class="form-label-group">
                        <input type="email" name="txtEmailLogin" class="form-control" placeholder="Email" required autofocus>
                        <label for="loginEmail">Email</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" name="txtSenhaLogin" class="form-control" placeholder="Senha" required>
                        <label for="loginSenha">Senha</label>
                    </div>
                    
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="lembrar-me"> Lembrar-me
                        </label>
                        <label class="form-esqueci-minha-senha">
                            <a href="#">Esqueci minha senha</a>
                        </label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    <p class="mt-5 mb-3 text-muted text-center">Copyright &copy; DIGITECA <?php echo date('Y')?></p>
                </form>
            </card>
        </div>
    </div>

<?php include('footer.html'); ?>
