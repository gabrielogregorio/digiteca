<?php
# Impede que usuários acessem a página se não estiverem logados
include('../../seguranca/seguranca.php');
session_start();
if(administrador_logado() == false) {header("location: /Digiteca/index.php"); exit;}

require_once("../../conexao/conexao.php");

$tituloDoLivro = filter_input(INPUT_POST, "tituloDoLivro",FILTER_SANITIZE_STRING);
$autorPrincipal = filter_input(INPUT_POST, "autorPrincipal",FILTER_SANITIZE_STRING);
$descricaoDoLivro = filter_input(INPUT_POST, "descricaoDoLivro",FILTER_SANITIZE_STRING);
$generoPrincipal = filter_input(INPUT_POST, "generoPrincipal",FILTER_SANITIZE_STRING);
$nomeDaEditora = filter_input(INPUT_POST, "nomeDaEditora",FILTER_SANITIZE_STRING);
$anoDePublicacao = filter_input(INPUT_POST, "anoDePublicacao",FILTER_SANITIZE_STRING);
$codigoISBN = filter_input(INPUT_POST, "codigoISBN",FILTER_SANITIZE_STRING);
$unidadesDisponiveis = filter_input(INPUT_POST, "unidadesDisponiveis",FILTER_SANITIZE_STRING);

try {
    $comando = $conexao->prepare(
        "INSERT INTO
        LIVROS (
            TITULO,
            AUTOR,
            DESCRICAO,
            GENERO,
            EDITORA,
            ANO_PUBLICACAO,
            ISBN,
            UNIDADES_DISPONIVEIS
        )
        VALUES (
        :tituloDoLivro,
        :autorPrincipal,
        :descricaoDoLivro,
        :generoPrincipal,
        :nomeDaEditora,
        :anoDePublicacao,
        :codigoISBN,
        :unidadesDisponiveis
        )"
    );

    $comando->execute(array(
        ':tituloDoLivro' => $tituloDoLivro,
        ':autorPrincipal'=> $autorPrincipal,
        ':descricaoDoLivro'=> $descricaoDoLivro,
        ':generoPrincipal' => $generoPrincipal,
        ':nomeDaEditora' => $nomeDaEditora,
        ':anoDePublicacao' => $anoDePublicacao,
        ':codigoISBN' => $codigoISBN,
        ':unidadesDisponiveis' => $unidadesDisponiveis
    ));

    if($comando->rowCount() > 0)
    {
        header('location: /Digiteca/views/livros/visualizar.php');
    }
    else
    {
        echo "Ops, Erro ao gravar os dados";
    }

} catch (PDOException $e) {
    echo("Erro ao gravar a informação. \n\n".$e->getMessage());
}

$conexao = null;
