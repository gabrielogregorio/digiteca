 <?php

    include('../seguranca/seguranca.php');
    
    session_start(); //iniciando um sessão

    require_once("../conexao/conexao.php");

    $teste_SenhaLogin = campo_e_valido("txtSenhaLogin", "Senha");
    $teste_EmailLogin = campo_e_valido("txtEmailLogin", "Email");

	if ($teste_SenhaLogin[0] == false) { exit; }
	if ($teste_EmailLogin[0] == false) { exit; }

	$txtSenhaLogin = $teste_SenhaLogin[1];
	$txtEmailLogin = $teste_EmailLogin[1];

	print_r("$txtSenhaLogin");
	print_r("$txtEmailLogin");


	try {

            $comandoSQL = "SELECT * FROM ADMINISTRADOR WHERE LOGIN = \"$txtEmailLogin\" AND SENHA = \"$txtSenhaLogin\"";

            $select = $conexao->query($comandoSQL);

            $resultado = $select->fetchAll();

            if($resultado) {
			    $_SESSION["txtLOGIN"] = false;
			    $_SESSION["txtSENHA"] = false;

				header('location:../home.php');
            }

			else
			{
				header('location:../index.php');
			}

	} catch (PDOException $e) {
		echo("Erro ao gravar informação no banco de dados. \n\n".$e->getMessage());
	}

	$conexao = null;