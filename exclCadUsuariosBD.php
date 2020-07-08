<?php

    require_once("conexao/conexao.php");

    include('seguranca/seguranca.php');
    
    session_start();
    if(administrador_logado() == false) {
        header("location: index.php");
        exit;
    }

    
    try {

	    $CPF = filter_input(INPUT_POST, "CPF", FILTER_SANITIZE_STRING);

		$comando = $conexao->prepare("DELETE FROM USUARIOS WHERE CPF = :CPF");

		$comando->bindParam(":CPF", $CPF);
		$comando->execute();

		if($comando->rowCount() > 0) {
			header("location: visUsuarios.php");
		} else {

            $mensagem_erro = "Nenhuma informação atualizada!";
            $url = "location: editCadUsuarios.php?CPF=$CPF&mensagem_erro=$mensagem_erro";

            header($url);
		}

    } catch (PDOException $e) {
        $mensagem_erro = $e->getMessage();
        $url = "location: exclCadUsuarios.php?CPF=$CPF&mensagem_erro=$mensagem_erro";
        header($url);    	
  }
  
	$conexao = null;
?>





 