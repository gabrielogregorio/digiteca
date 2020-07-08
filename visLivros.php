<?php
    include('seguranca/seguranca.php');
    
    session_start();
    if(administrador_logado() == false) {
        header("location: index.php");
        exit;
    }

 ?>

<?php include('layout/header.html');?>
<?php include('layout/navbar.php'); ?>
    
    <div class="container">
    
        <!-- Cabecalho da Pagina -->
        <div class="card text-white bg-primary mb-2" style="margin-top: 10rem;">
            <div class="card-body">
                <div class="text-center" style="font-size: 1.2em;">Visualizar Livros Cadastrados</div>
            </div>        
        </div>

        <?php 
            require_once('conexao/conexao.php');

            $comandoSQL = "SELECT * FROM LIVROS";

            $select = $conexao->query($comandoSQL);

            $resultado = $select->fetchAll();

            if($resultado) {
        ?>
                <!-- Aqui comeca a nossa tabela -->
                <div class="table table-responsive-sm">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <!--<th scope="col">ID</th>-->
                                <th scope="col">Título</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Editora</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php   foreach ($resultado as $linha) {    ?>
                                    <tr>
                                        <!--<td><php echo $linha["ID"]; ?></td>-->
                                        <td><?php echo $linha["TITULO"]; ?></td>
                                        <td><?php echo $linha["ISBN"]; ?></td>
                                        <td><?php echo $linha["EDITORA"]; ?></td>
                                        
                                        <?php 
                                            $ISBN = $linha["ISBN"];
                                            $ISBN_LINK_EXCL = "editCadLivros.php?ISBN=$ISBN";
                                            $ISBN_LINK_EDIT = "exclCadLivros.php?ISBN=$ISBN";



                                        ?>

                                        <td><a href="<?php echo $ISBN_LINK_EXCL; ?>"><img src="assets/images/editar.png" width="36"></a></td>
                                        <td><a href="<?php echo $ISBN_LINK_EDIT; ?>"><img src="assets/images/excluir.png" width="36"></a></td>
                                    </tr>
                        <?php   }   ?>
                        </tbody>      
                    </table>
    <?php   }   ?> 
                </div>
    </div>

<?php include('layout/footer.html'); ?>