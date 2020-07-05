<!-- Formulario de Login -->

<?php include('header.html'); ?>

    <div class="page-container">
        <div class="content-wrap">
            <div class="card card-header" id="card-style">
                <form class="form-signin">
                    <div class="text-center mb-4">
                        <img class="mb-4" src="../assets/images/digiteca_.png" alt="Digiteca" width="389" height="116">
                        <div class="alert alert-danger" role="alert">
                            Acesso permitido somente para Administradores
                        </div>
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="loginEmail" class="form-control" placeholder="Email" required autofocus>
                        <label for="loginEmail">Email</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="loginSenha" class="form-control" placeholder="Senha" required>
                        <label for="loginSenha">Senha</label>
                    </div>
                    
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Lembrar-me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    <p class="mt-5 mb-3 text-muted text-center">Copyright &copy; DIGITECA <?php echo date('Y')?></p>
                </form>
            </card>
        </div>
    </div>

<?php include('footer.html'); ?>
