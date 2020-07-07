<?php 
    include('layout/header.html');
    include('layout/navbar.php');

    include('seguranca/seguranca.php');
    
    session_start();

    // if(administrador_logado() == false) {
    //     header("location: index.php");
    //     exit;
    // }
 ?>

    <div class="container">

		<div class="home">
            <!-- <div title="Sistema de biblioteca Online">Sistema de biblioteca Online</div> -->
        </div>


<?php include('layout/footer.html'); ?>