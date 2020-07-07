<?php 
    //include('seguranca/seguranca.php');
    
    //session_start();

    //if (administrador_logado() == false){
      // header("location:index.php");
       //exit;
    //}
 ?>

 <?php
    include('layout/header.html');
    include('layout/navbar.php');

    require_once("conexao/conexao.php");

    if(!filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING)) {
        
        echo "ID é inválido!";
    } else {

        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);

        $consulta = $conexao->query("SELECT * FROM login WHERE idLogin=$id");

        $linha = $consulta->fetch(PDO::FETCH_ASSOC);
    }
?>
    <div class="container">

        <!-- Cabecalho da Pagina -->
        <div class="card text-white bg-primary mb-2" style="margin-top: 10rem;">
            <div class="card-body">
                <div class="text-center" style="font-size: 1.2em;">Alterar Dados Cadastrais</div>
            </div>        
        </div>

        <div class="row">
            <form class="col-12" action="altLivrosBD.php" method="post">
                <input type="hidden" name="txtID" value="<?php echo $ID; ?>">

            </form>
        </div>









    </div>


<?php include('layout/navbar.php'); ?>