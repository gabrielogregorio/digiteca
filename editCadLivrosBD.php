<?php  


    include('seguranca/seguranca.php');
    
    session_start();
    if(administrador_logado() == false) {
        header("location: index.php");
        exit;
    }



 	require_once("conexao/conexao.php");

 	$tituloDoLivro = $_POST["tituloDoLivro"];
 	$autorPrincipal = $_POST["autorPrincipal"];
 	$descricaoDoLivro = $_POST["descricaoDoLivro"];
    $generoPrincipal = $_POST["generoPrincipal"];
    $nomeDaEditora = $_POST["nomeDaEditora"];
    $anoDePublicacao = $_POST["anoDePublicacao"];
    $codigoISBN = $_POST["codigoISBN"];
    $unidadesDisponiveis = $_POST["unidadesDisponiveis"];

    try {
        $comando = $conexao->prepare("UPDATE LIVROS SET 
        
            TITULO = '$tituloDoLivro',
            AUTOR = '$autorPrincipal',
            DESCRICAO = '$descricaoDoLivro',
            GENERO = '$generoPrincipal',
            EDITORA = '$nomeDaEditora',
            ANO_PUBLICACAO = '$anoDePublicacao',
            ISBN = '$codigoISBN',
            UNIDADES_DISPONIVEIS = '$unidadesDisponiveis' 
        
        WHERE 
            ISBN = :codigoISBN;'
        ");

        $comando->execute(array(
			':codigoISBN' => $codigoISBN
		));
         
        if($comando->rowCount() > 0) {
            header('location: visLivros.php');
        } else {
            echo "Ops, Erro ao gravar os dados";
        }
 
    } catch (PDOException $e) {
        echo("Erro ao gravar a informação. \n\n".$e->getMessage());
    }
 
    $conexao = null;