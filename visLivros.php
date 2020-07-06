<?php include('layout/header.html'); ?>
<?php include('layout/navbar.php'); ?>

    <div class="container">

        <!-- Cabecalho da Pagina -->
        <div class="card text-white bg-primary mb-2" style="margin-top: 2.5rem;">
            <div class="card-body">
                <div class="text-center" style="font-size: 1.2em;">Visualizar Livros Cadastrados</div>
            </div>        
        </div>

        <!-- Aqui comeca a nossa tabela -->
        <div class="table table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th> 
                        <th>ISBN</th>
                        <th>Titulo</th>
                        <th>Editora</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                        require_once('conexao/conexao.php');

                        $sql = "SELECT * FROM LIVROS";

                        $sqlResposta = mysqli_query($conexao, $sql);
                        
                        $sqlContador = mysqli_num_rows($sqlResposta);

                        if ($sqlContador > 0) { 
                        
                            for($x = 0; $x < $sqlContador; $x++) {
                            
                            $dados = mysqli_fetch_assoc($sqlResposta); 
                    ?>
                    
                            <tr>
                                <td><?php echo "$dados[ID]"; ?></td>
                                <td><?php echo "$dados[ISBN]"; ?></td>
                                <td><?php echo "$dados[EDITORA]"; ?></td>
                                <td><a href="altLivros.php?id=<?php echo "$dados[ID];" ?>"><img src="assets/imgages/editar.png"></a></td>
                                <td><a href="excLivros.php?id=<?php echo "$dados[ID];" ?>"><img src="assets/img/excluir.png"></a></td>
                            </tr>
                    <?php 
                            }
                        } else {
                            echo '<div class="alert-danger text-center p-2 rounded" role="alert"> Ops, não encontramos nenhum registro! </div>';
                        }
                    ?>            
                </tbody>
            </table>
        </div>
    
    </div>

<?php include('layout/footer.html'); ?>