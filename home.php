<?php 
    include('layout/header.html');
    include('layout/navbar.php');
    include('seguranca/seguranca.php');
    
    session_start();


     if(administrador_logado() == false) {
         header("location: index.php");
         exit;
     }
 ?>
    <div class="home">
    
    </div>

<?php include('layout/footer.html'); ?>