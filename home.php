<?php
# Impede que usuários acessem a página se não estiverem logados
include('seguranca/seguranca.php');
session_start();
if(administrador_logado() == false) {header("location: /Digiteca/index.php"); exit;}

// Inclui o código HTML
include('layout/header.html');
include('layout/navbar.php');
?>
    <div class="home"></div>

<?php include('layout/footer.html'); ?>
