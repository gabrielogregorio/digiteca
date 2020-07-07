<?php
	function obter_data_dd_mm_yyyy(){
		$today = getdate();

		$dia = $today['mday'];
		$mes = $today['mon'];
		$ano = $today['year'];

        if ($dia < 10){
        	$dia = "0$dia";
        }

        if ($mes < 10){
        	$mes = "0$mes";
        }

        $dia = strval($dia);
        $mes = strval($mes);
        $ano = strval($ano);

		print_r("$ano$mes$dia" );
	}
?>