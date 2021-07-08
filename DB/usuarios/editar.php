<?php
# Impede que usuários acessem a página se não estiverem logados
include('../../seguranca/seguranca.php');
session_start();
if(administrador_logado() == false) {header("location: /Digiteca/index.php"); exit;}

require_once("../../conexao/conexao.php");
/*
$testeCPF = $_POST[""];
$testeNOME = $_POST[""];
$testeSOBRENOME = $_POST[""];
$testeEMAIL = $_POST[""];
$testeTELEFONE = $_POST[""];
$testeDATA_NASCIMENTO = $_POST[""];
*/

$testeCPF = campo_e_valido("txtCPF", "CPF");
$testeCPFAtualizar = campo_e_valido("txtCPFAtualizar", "CPF");
$testeNOME = campo_e_valido("txtNOME", "Nome");
$testeSOBRENOME = campo_e_valido("txtSOBRENOME", "Sobrenome");
$testeEMAIL = campo_e_valido("txtEMAIL", "E-mail");
$testeTELEFONE = campo_e_valido("txtTELEFONE", "Telefone");
$testeDATA_NASCIMENTO = campo_e_valido("txtDATA_NASCIMENTO", "Data de Nascimento");

if ($testeCPF[0] == false) { exit; }
if ($testeCPFAtualizar[0] == false) { exit; }
if ($testeNOME[0] == false) { exit; }
if ($testeSOBRENOME[0] == false) { exit; }
if ($testeEMAIL[0] == false) { exit; }
if ($testeTELEFONE[0] == false) { exit; }
if ($testeDATA_NASCIMENTO[0] == false) { exit; }

$txtCPF = $testeCPF[1];
$txtCPFAtualizar = $testeCPFAtualizar[1];
$txtNOME = $testeNOME[1];
$txtSOBRENOME = $testeSOBRENOME[1];
$txtEMAIL = $testeEMAIL[1];
$txtTELEFONE = $testeTELEFONE[1];
$txtDATA_NASCIMENTO = $testeDATA_NASCIMENTO[1];

try {
    $comando = $conexao->prepare("UPDATE USUARIOS SET
        CPF = '$txtCPF',
        NOME = '$txtNOME',
        SOBRENOME = '$txtSOBRENOME',
        EMAIL = '$txtEMAIL',
        TELEFONE = '$txtTELEFONE',
        DATA_NASCIMENTO = '$txtDATA_NASCIMENTO'

    WHERE
        CPF = :CPF;'
    ");

    $comando->execute(array(
        ':CPF' => $txtCPFAtualizar
    ));

    if($comando->rowCount() > 0) {
        header('location: /Digiteca/views/usuarios/visualizar.php');
    } else {
        $mensagem_erro = "Nenhuma informação atualizada!";
        $url = "location: /Digiteca/views/usuarios/editar.php?CPF=$txtCPFAtualizar&mensagem_erro=$mensagem_erro";
        header($url);
    }

} catch (PDOException $e) {
    $mensagem_erro = $e->getMessage();
    $url = "location: /Digiteca/views/usuarios/editar.php?CPF=$txtCPFAtualizar&mensagem_erro=$mensagem_erro";
    header($url);
}

$conexao = null;
