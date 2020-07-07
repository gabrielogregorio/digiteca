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

    $teste_CPF = campo_e_valido("txtCPF", "cpf");
    $teste_NOME = campo_e_valido("txtNOME", "nome");
    $teste_SOBRENOME = campo_e_valido("txtSOBRENOME", "sobrenome");
    $teste_EMAIL = campo_e_valido("txtEMAIL", "E-mail");
    $teste_TELEFONE = campo_e_valido("txtTELEFONE", "telefone");
    $teste_DATA_NASCIMENTO = campo_e_valido("txtDATA_NASCIMENTO", "Data de Nascimento");

	if ($teste_CPF[0] == false) { exit; }
	if ($teste_NOME[0] == false) { exit; }
	if ($teste_SOBRENOME[0] == false) { exit; }
	if ($teste_EMAIL[0] == false) { exit; }
	if ($teste_TELEFONE[0] == false) { exit; }
	if ($teste_DATA_NASCIMENTO[0] == false) { exit; }

	$txtNOME = $teste_NOME[1];
	$txtSOBRENOME = $teste_SOBRENOME[1];
	$txtCPF = $teste_CPF[1];
	$txtEMAIL = $teste_EMAIL[1];
	$txtTELEFONE = $teste_TELEFONE[1];
	$txtDATA_NASCIMENTO = $teste_DATA_NASCIMENTO[1];


	try {
		$comando = $conexao->prepare(
			"INSERT INTO USUARIOS
			(CPF, NOME, SOBRENOME, EMAIL, TELEFONE, DATA_NASCIMENTO)
			VALUES (:txtCPF, :txtNOME, :txtSOBRENOME, :txtEMAIL, :txtTELEFONE, :txtDATA_NASCIMENTO)"
		);

		$comando->execute(array(
			':txtCPF' => $txtCPF,
			':txtNOME' => $txtNOME,
			':txtSOBRENOME' => $txtSOBRENOME,
			':txtEMAIL' => $txtEMAIL,
			':txtTELEFONE' => $txtTELEFONE,
			':txtDATA_NASCIMENTO' => $txtDATA_NASCIMENTO
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