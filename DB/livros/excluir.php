<?php
# Impede que usuários acessem a página se não estiverem logados
include('../../seguranca/seguranca.php');
session_start();
if(administrador_logado() == false) {header("location: /Digiteca/index.php"); exit;}

require_once("../../conexao/conexao.php");

$ISBN = filter_input(INPUT_POST, "ISBN", FILTER_SANITIZE_STRING);

try {
    $comando = $conexao->prepare("DELETE FROM LIVROS WHERE ISBN = :ISBN");
    $comando->bindParam(":ISBN", $ISBN);
    $comando->execute();

    if($comando->rowCount() > 0) {
        header("location: /Digiteca/views/livros/visualizar.php");
    } else {
        $mensagem_erro = "Nenhuma informação atualizada!";
        $url = "location: /Digiteca/views/livros/excluir.php?ISBN=$ISBN&mensagem_erro=$mensagem_erro";
        header($url);
    }
} catch (PDOException $e) {
    //$mensagem_erro = $e->getMessage();
    $mensagem_erro = "Esse livro possui emprestimo por isso não pode ser removido";
    $url = "location: /Digiteca/views/livros/excluir.php?ISBN=$ISBN&mensagem_erro=$mensagem_erro";
    header($url);
}

$conexao = null;
