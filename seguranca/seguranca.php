<?php 

    function administrador_logado(){

       // Se as variáveis de seção existem
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
 ?>


