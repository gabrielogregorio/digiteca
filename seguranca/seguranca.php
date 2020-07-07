<?php 

    if (function_exists("administrador_logado") == false) {
	    function administrador_logado(){

	       // Se as variáveis não existirem
		    if((isset($_SESSION["txtLOGIN"]) == false) or (isset($_SESSION["txtSENHA"]) == false))
		    {
		        //remover todas as variável de sessão
		        session_unset();

		        //destruir a sessão
		        session_destroy();

		        return false;
		    }
		    return true;
	   }
    }

    if (function_exists("campo_e_valido") == false) {
	    function campo_e_valido($variavel_teste, $nome_variavel){
	    	$valor_tratado = filter_input(INPUT_POST, "$variavel_teste", FILTER_SANITIZE_STRING);

			if (!$valor_tratado )
			{
	        	echo("Este $nome_variavel não é válido!\n" );
	        	return [false, ""];
			}

			return [true, $valor_tratado];
	    }
	}


 ?>


