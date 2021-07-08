<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "digiteca";

try
{
    $conexao = new PDO("mysql:host=$host;dbname=$banco", $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    echo "Erro durante a conexão com o banco de dados.\n\n".$e->getMessage();
}

