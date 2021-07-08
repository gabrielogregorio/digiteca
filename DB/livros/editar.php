<?php
# Impede que usuários acessem a página se não estiverem logados
include('../../seguranca/seguranca.php');
session_start();
if(administrador_logado() == false) {header("location: /Digiteca/index.php"); exit;}

require_once("../../conexao/conexao.php");

$tituloDoLivro = $_POST["tituloDoLivro"];
$autorPrincipal = $_POST["autorPrincipal"];
$descricaoDoLivro = $_POST["descricaoDoLivro"];
$generoPrincipal = $_POST["generoPrincipal"];
$nomeDaEditora = $_POST["nomeDaEditora"];
$anoDePublicacao = $_POST["anoDePublicacao"];
$codigoISBN = $_POST["codigoISBN"];
$unidadesDisponiveis = $_POST["unidadesDisponiveis"];
$ISBN = $_POST["ISBN"];

try {
    $comando = $conexao->prepare("UPDATE LIVROS SET
        TITULO = '$tituloDoLivro',
        AUTOR = '$autorPrincipal',
        DESCRICAO = '$descricaoDoLivro',
        GENERO = '$generoPrincipal',
        EDITORA = '$nomeDaEditora',
        ANO_PUBLICACAO = '$anoDePublicacao',
        ISBN = '$codigoISBN',
        UNIDADES_DISPONIVEIS = '$unidadesDisponiveis'

    WHERE
        ISBN = :ISBN;'
    ");

    $comando->execute(array(
        ':ISBN' => $ISBN
    ));

    if($comando->rowCount() > 0) {
        header('location: /Digiteca/views/livros/visualizar.php');
    } else {
        $mensagem_erro = "Nenhuma informação atualizada!";
        $url = "location: /Digiteca/views/livros/editar.php?ISBN=$ISBN&mensagem_erro=$mensagem_erro";
        header($url);
    }

} catch (PDOException $e) {

    $mensagem_erro = $e->getMessage();
    $url = "location: /Digiteca/views/livros/editar.php?ISBN=$ISBN&mensagem_erro=$mensagem_erro";
    header($url);
}

$conexao = null;
