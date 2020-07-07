<?php 
    //include('seguranca/seguranca.php');
    
    //session_start();

    //if (administrador_logado() == false){
      // header("location:index.php");
       //exit;
    //}
 ?>

 <?php

    include('seguranca/seguranca.php');
    
    session_start(); //iniciando um sessão

    if (administrador_logado() == false){
       header("location:index.php");
       exit;
    }

    require_once("conexao/conexao.php");

    $teste_LIVRO_ISBN = campo_e_valido("txtLIVRO_ISBN", "Livro");
    $teste_PF_PESSOA = campo_e_valido("txtCPF_PESSOA", "Pessoa");
    $teste_DATA_EMPRESTADO = campo_e_valido("txtDATA_EMPRESTADO", "Data emprestimo");
    $teste_EMPO_EMPRESTIMO = campo_e_valido("txtTEMPO_EMPRESTIMO", "Tempo do emprestimo");

	if ($teste_LIVRO_ISBN[0] == false) { exit; }
	if ($teste_PF_PESSOA[0] == false) { exit; }
	if ($teste_DATA_EMPRESTADO[0] == false) { exit; }
	if ($teste_EMPO_EMPRESTIMO[0] == false) { exit; }

	$txtLIVRO_ISBN = $teste_LIVRO_ISBN[1];
	$txtCPF_PESSOA = $teste_PF_PESSOA[1];
	$txtDATA_EMPRESTADO = $teste_DATA_EMPRESTADO[1];
	$txtTEMPO_EMPRESTIMO = $teste_EMPO_EMPRESTIMO[1];

	$txtSTATUSLIVRO = "A DEVOLVER";

	try {
		$comando = $conexao->prepare(
			"INSERT INTO EMPRESTIMO
			(LIVRO_ISBN, CPF_PESSOA, DATA_EMPRESTADO, TEMPO_EMPRESTIMO, STATUS_LIVRO)
			VALUES
			(:txtLIVRO_ISBN, :txtCPF_PESSOA, :txtDATA_EMPRESTADO, :txtTEMPO_EMPRESTIMO, :txtSTATUSLIVRO)"
		);

		$comando->execute(array(
			':txtLIVRO_ISBN' => $txtLIVRO_ISBN,
			':txtCPF_PESSOA' => $txtCPF_PESSOA,
			':txtDATA_EMPRESTADO' => $txtDATA_EMPRESTADO,
			':txtTEMPO_EMPRESTIMO' => $txtTEMPO_EMPRESTIMO,
			':txtSTATUSLIVRO' => $txtSTATUSLIVRO
		));

		if($comando->rowCount() > 0)
		{
			header('location:home.php');
		}
		else
		{
			echo "Erro ao gravar os dados";
		}

	} catch (PDOException $e) {
		echo("Erro ao gravar informação no banco de dados. \n\n".$e->getMessage());
	}

	$conexao = null;