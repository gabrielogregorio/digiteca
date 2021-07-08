<?php
//iniciando um sessão
session_start();

//remover todas as variável de sessão
session_unset();

//destruir a sessão
session_destroy();

// Carregamento dos layouts
include('layout/header.html');
include('layout/login.php');
include('layout/footer.html');
?>
