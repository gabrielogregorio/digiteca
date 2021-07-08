<?php
# Impede que usuários acessem a página se não estiverem logados
include('../../seguranca/seguranca.php');
session_start();
if(administrador_logado() == false) {header("location: /Digiteca/index.php"); exit;}

require_once("../../conexao/conexao.php");


$testeIDEMPRESTIMO = campo_e_valido("txtIDEMPRESTIMO", "ID");
if ($testeIDEMPRESTIMO[0] == false) { exit; }

$txtIDEMPRESTIMO = $testeIDEMPRESTIMO[1];

try {
    $comando = $conexao->prepare(
        "UPDATE EMPRESTIMO
            SET STATUS_LIVRO = 'NÃO DEVOLVIDO'
            WHERE ID = :txtIDEMPRESTIMO;"
    );

    $comando->execute(array(
        ':txtIDEMPRESTIMO' => $txtIDEMPRESTIMO
    ));

    if($comando->rowCount() > 0)
    {
        header('location:/Digiteca/views/emprestimos/visualizar.php');
    }
    else
    {
        echo "Erro ao gravar os dados";
    }

} catch (PDOException $e) {
    echo("Erro ao gravar informação no banco de dados. \n\n".$e->getMessage());
}

$conexao = null;
