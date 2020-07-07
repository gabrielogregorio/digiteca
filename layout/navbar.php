<!-- Barra de Menu -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4">
    <a class="navbar-brand" id="digiteca" href="#">DIGITECA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home</a>
            </li>

             <li class="nav-item active">
                <a class="nav-link" href="index.php">Login</a>
            </li>





            <li class="nav-item dropdown active" >
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Livros
                </a>
                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="cadLivros.php">Cadastrar Livros</a>
                    <a class="dropdown-item" href="visLivros.php">Visualizar Livros</a>
              </div>
            </li>

           

            <li class="nav-item dropdown active" >
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuários
                </a>
                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="cadUsuarios.php">Cadastrar Usuários</a>
                    <a class="dropdown-item" href="visUsuarios.php">Visualizar Usuários</a>
              </div>
            </li>


            <li class="nav-item dropdown active" >
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Emprestimos
                </a>
                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="cadEmprestimos.php">Emprestar um livro</a>
                    <a class="dropdown-item" href="visEmprestimos.php">Visualizar Livros Emprestados</a>
              </div>
            </li>


        </ul>
    </div>
</nav>