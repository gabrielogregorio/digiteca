<?php

    require_once("conexao/conexao.php");

    include('seguranca/seguranca.php');
    
    session_start();
    if(administrador_logado() == false) {
        header("location: index.php");
        exit;
    }

    
    $ISBN = filter_input(INPUT_POST, "ISBN", FILTER_SANITIZE_STRING);

    try {
		$comando = $conexao->prepare("DELETE FROM LIVROS WHERE ISBN = :ISBN");
		$comando->bindParam(":ISBN", $ISBN);
		$comando->execute();

		if($comando->rowCount() > 0) {
			header("location: visLivros.php");

		} else {
            $mensagem_erro = "Nenhuma informação atualizada!";
            $url = "location: exclCadLivros.php?ISBN=$ISBN&mensagem_erro=$mensagem_erro";
            header($url);
		}

    } catch (PDOException $e) {
    	$mensagem_erro = $e->getMessage();
        $url = "location: exclCadLivros.php?ISBN=$ISBN&mensagem_erro=$mensagem_erro";
        header($url);
    }



	$conexao = null;
?>





 