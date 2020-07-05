<?php

     include('seguranca/seguranca.php');

    
    session_start(); //iniciando um sessão
    echo $_SESSION["txtLOGIN"];

    if (administrador_logado() == false){
       header("location:index.php");
       exit;
    }

    require_once("conexao/conexao.php");

	if(!filter_input(INPUT_POST, "txtNOME",FILTER_SANITIZE_STRING))
	{
		echo("Este nome não é válido!");
		exit;
	}

	if(!filter_input(INPUT_POST, "txtSOBRENOME",FILTER_SANITIZE_STRING))
	{
		echo("Este sobrenome não é válido!");
		exit;
	}

	if(!filter_input(INPUT_POST, "txtCPF",FILTER_SANITIZE_STRING))
	{
		echo("Este CPF não é válido!");
		exit;
	}

	if(!filter_input(INPUT_POST, "txtEMAIL",FILTER_SANITIZE_STRING))
	{
		echo("Este e-mail não é válido!");
		exit;
	}

	if(!filter_input(INPUT_POST, "txtTELEFONE",FILTER_SANITIZE_STRING))
	{
		echo("Este telefone não é válido!");
		exit;
	}

	if(!filter_input(INPUT_POST, "txtDATA_NASCIMENTO",FILTER_SANITIZE_STRING))
	{
		echo("Este data de nascimento não é válido!");
		exit;
	}

	$txtNOME = filter_input(INPUT_POST, "txtNOME",FILTER_SANITIZE_STRING);
	$txtSOBRENOME = filter_input(INPUT_POST, "txtSOBRENOME",FILTER_SANITIZE_STRING);
	$txtCPF = filter_input(INPUT_POST, "txtCPF",FILTER_SANITIZE_STRING);
	$txtEMAIL = filter_input(INPUT_POST, "txtEMAIL",FILTER_SANITIZE_STRING);
	$txtTELEFONE = filter_input(INPUT_POST, "txtTELEFONE",FILTER_SANITIZE_STRING);
	$txtDATA_NASCIMENTO = filter_input(INPUT_POST, "txtDATA_NASCIMENTO",FILTER_SANITIZE_STRING);


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