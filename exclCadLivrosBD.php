<?php

    require_once("conexao/conexao.php");

    include('seguranca/seguranca.php');
    
    session_start();

    // if (administrador_logado() == false){
    //    header("location:index.php");
    //    exit;
    // }
    
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);

	$comando = $conexao->prepare("DELETE FROM LIVROS WHERE ID = :id");

	$comando->bindParam(":id", $id);
	$comando->execute();

	if($comando->rowCount() > 0) {
		header("location: visLivros.php");
	} else {
		echo "Erro ao executar o comando";
	}

	$conexao = null;
?>





 